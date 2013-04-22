<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class project_property extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Project.Content.View');
		$this->load->model('project_property_model', null, true);
		$this->load->model('project_property_gallery_model');
		$this->load->model('project_model');
		$this->load->model('project_type_model');
		$this->load->model('project_developer_model');
		$this->load->model('project_location_model');
		$this->load->model('marketing/marketing_model');
		$this->lang->load('project_property');
		
		Template::set_block('sub_nav', 'project_property/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->project_property_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('project_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('project_delete_failure') . $this->project_property_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(6);

		$records = $this->project_property_model->order_by('category_id', 'asc')->order_by('title', 'asc')->limit($this->limit, $offset)->find_all();
        
        // Pagination
		$this->load->library('pagination');

		$total_article = $this->project_property_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/project/project_property/index');
		$this->pager['total_rows'] 		= $total_article;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 6;

		$this->pagination->initialize($this->pager);

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Project Property');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Project object.
	*/
	public function create()
	{
		$this->auth->restrict('Project.Content.Create');

		$category = $this->project_model->order_by('title','asc')->find_all();
		if (is_array($category) && count($category)) 
		{
			foreach($category as $record)
			{
				$data["category"][$record->id] = $record;

				$data["category"][$record->id]->type = $this->project_type_model->order_by('title','asc')->find_all_by('project_type.category_id', $record->id);
			}
		}  

		$developer = $this->project_developer_model->order_by('title','asc')->find_all();
		if (is_array($developer) && count($developer)) 
		{
			foreach($developer as $record)
			{
				$data["developer"][$record->id] = $record;
			}
		}  

		$location = $this->project_location_model->order_by('title','asc')->find_all();
		if (is_array($location) && count($location)) 
		{
			foreach($location as $record)
			{
				$data["location"][$record->id] = $record;
			}
		}  

		$marketing = $this->marketing_model->order_by('name','asc')->find_all();
		if (is_array($marketing) && count($marketing)) 
		{
			foreach($marketing as $record)
			{
				$data["marketing"][$record->id] = $record;
			}
		}  
		Template::set("data", $data);


		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_project())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/project/project_property');
			}
			else
			{
				Template::set_message(lang('project_create_failure') . $this->project_property_model->error, 'error');
			}
		}
		Assets::add_module_js('project', 'project.js');

		Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('project', 'project.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
														Template::theme_url('js/admin.js'),
														Template::theme_url('js/jquery/jquery.plugin.chosen.js'),
														Template::theme_url('js/jquery/jquery.plugin.livequery.js'),
														Template::theme_url('js/jquery/jquery.tagsinput.min.js'),
														Template::theme_url('js/editors/ckeditor/ckeditor.js'),
														Template::theme_url('js/editors/ckeditor/adapters/jquery.js'),
														Template::theme_url('js/my_wysiwyg.js'),
													),
										'external',
										true
									);
        
        Assets::add_js($this->load->view('project_property/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('project_create') . ' Project Property');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Project data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(6);

		if (empty($id))
		{
			Template::set_message(lang('project_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/project/project_property');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Project.Content.Edit');

			if ($this->save_project('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('project_edit_failure') . $this->project_property_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Project.Content.Delete');

			if ($this->project_property_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_delete_success'), 'success');

				redirect(SITE_AREA .'/content/project/project_property');
			} else
			{
				Template::set_message(lang('project_delete_failure') . $this->project_property_model->error, 'error');
			}
		}

		$category = $this->project_model->order_by('title','asc')->find_all();
		if (is_array($category) && count($category)) 
		{
			foreach($category as $record)
			{
				$data["category"][$record->id] = $record;

				$data["category"][$record->id]->type = $this->project_type_model->order_by('title','asc')->find_all_by('project_type.category_id', $record->id);
			}
		}  

		$developer = $this->project_developer_model->order_by('title','asc')->find_all();
		if (is_array($developer) && count($developer)) 
		{
			foreach($developer as $record)
			{
				$data["developer"][$record->id] = $record;
			}
		} 

		$location = $this->project_location_model->order_by('title','asc')->find_all();
		if (is_array($location) && count($location)) 
		{
			foreach($location as $record)
			{
				$data["location"][$record->id] = $record;
			}
		} 

		$marketing = $this->marketing_model->order_by('name','asc')->find_all();
		if (is_array($marketing) && count($marketing)) 
		{
			foreach($marketing as $record)
			{
				$data["marketing"][$record->id] = $record;
			}
		}  
		Template::set("data", $data);

		$project = $this->project_property_model->find($id);
		if (isset($project))
		{
			$project->image_gallery = $this->project_property_gallery_model->find_all_by('property_id',$project->id);
		}
		Template::set('project', $project);


		Assets::add_module_js('project', 'project.js');

		Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('project', 'project.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
														Template::theme_url('js/admin.js'),
														Template::theme_url('js/jquery/jquery.plugin.chosen.js'),
														Template::theme_url('js/jquery/jquery.plugin.livequery.js'),
														Template::theme_url('js/jquery/jquery.tagsinput.min.js'),
														Template::theme_url('js/editors/ckeditor/ckeditor.js'),
														Template::theme_url('js/editors/ckeditor/adapters/jquery.js'),
														Template::theme_url('js/my_wysiwyg.js'),
													),
										'external',
										true
									);
        
        Assets::add_js($this->load->view('project_property/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('project_edit') . ' Project Property');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Project data.
	*/
	public function delete()
	{
		$this->auth->restrict('Project.Content.Delete');

		$id = $this->uri->segment(6);

		if (!empty($id))
		{

			if ($this->project_property_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('project_delete_failure') . $this->project_property_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/project/project_property');
	}

	//--------------------------------------------------------------------
	//--------------------------------------------------------------------

	/*
		Method: delete_image()
		
		Allows deleting of Project Property image data.
	*/
	public function delete_image($id=NULL) 
	{  
        $this->output->enable_profiler(false);
        
		if (!empty($id))
		{	
            if($this->project_property_model->update_where('project_property.id', $id, array('project_property.image_id' => NULL)))
            {
                $return['success'] = 1;
            }
            else
            {
                $return['success'] = 0;
            }
            echo json_encode($return);
		}
        
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete_gallery()
		
		Allows deleting of Project Property gallery data.
	*/
	public function delete_gallery($id=NULL) 
	{  
        $this->output->enable_profiler(false);
        
		if (!empty($id))
		{	
            if($this->project_property_gallery_model->delete_gallery($id))
            {
                $return['success'] = 1;
            }
            else
            {
                $return['success'] = 0;
            }
            echo json_encode($return);
		}
        
	}
	
	//--------------------------------------------------------------------

	/**
	 * Callback method that checks the title of an post
	 * @access public
	 * @param string title The Title to check
	 * @return bool
	 */
	public function _check_title($title, $id = null)
	{
		$this->form_validation->set_message('_check_title', sprintf('Title already exist', 'Title'));
		return $this->project_property_model->check_exists('title', $title, $id);
	}
	
	/**
	 * Callback method that checks the slug of an post
	 * @access public
	 * @param string slug The Slug to check
	 * @return bool
	 */
	public function _check_slug($slug, $id = null)
	{
		$this->form_validation->set_message('_check_slug', sprintf('Slug already exist', 'Slug'));
		return $this->project_property_model->check_exists('slug', $slug, $id);
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_project()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_project($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('type_id','Type','required|trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('developer_id','Developer','required|trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('location_id','Location','required|trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('marketing_id','Marketing Agent','required|trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]|callback__check_title['.$id.']');
		$this->form_validation->set_rules('slug', 'Slug', 'required|trim|xss_clean|max_length[255]|alpha_dot_dash|callback__check_slug['.$id.']');
		$this->form_validation->set_rules('address','Address','trim|xss_clean');
		$this->form_validation->set_rules('size', 'Size', 'trim|xss_clean|max_length[255]|');
		$this->form_validation->set_rules('bedroom','Bedroom','trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('facility','Facility','trim|xss_clean');
		$this->form_validation->set_rules('condition', 'Condition', 'trim|xss_clean|max_length[255]|');
		$this->form_validation->set_rules('additional','Additional','trim|xss_clean');
		$this->form_validation->set_rules('youtube', 'Youtube ID', 'trim|xss_clean|max_length[255]|');
		$this->form_validation->set_rules('vimeo', 'Vimeo ID', 'trim|xss_clean|max_length[255]|');
		$this->form_validation->set_rules('image_id','Image','required|trim');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
        
		$gallery_id 	= $this->input->post('gallery_id');
		$images 		= $this->input->post('images');
		$caption 		= $this->input->post('caption');
		
		$data = array();
		$data['type_id']          	  	= $this->input->post('type_id');
		$data['developer_id']          	= $this->input->post('developer_id');
		$data['location_id']          	= $this->input->post('location_id');
		$data['marketing_id']          	= $this->input->post('marketing_id');
		$data['title']                	= $this->input->post('title');
		$data['address']          		= $this->input->post('address');
		$data['size']          			= $this->input->post('size');
		$data['facility']          		= $this->input->post('facility');
		$data['condition']          	= $this->input->post('condition');
		$data['additional']          	= $this->input->post('additional');
		$data['youtube']          		= $this->input->post('youtube');
		$data['vimeo']          		= $this->input->post('vimeo');
		$data['image_id']             	= $this->input->post('image_id');
		$data['slug']             	  	= $this->input->post('slug');

		if($this->input->post('bedroom') == "")
		{
			$data['bedroom']          	= 0;
		}
		else
		{
			$data['bedroom']          	= $this->input->post('bedroom');
		}


		if ($type == 'insert')
		{
			$id = $this->project_property_model->insert($data);

			if (is_numeric($id) && $images != '')
			{
                foreach($images as $file_id)
                {                    
                    $data_gallery = array();
            		$data_gallery['property_id']  	= $id;
            		$data_gallery['file_id']  		= $file_id;
            		$data_gallery['caption']  		= $caption;
                    
                    $this->project_property_gallery_model->insert($data_gallery);
                }
             
				$return = $id;
			}
            elseif(is_numeric($id) && $images == '')
            {
                $return = $id;
            } 
            else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
            $check = $this->project_property_gallery_model->find_by('id', $id);

			if($check != '')
            {
	            foreach($gallery_id as $key=>$gallery_id_list)
	            {    			
                    $data_gallery = array();
            		$data_gallery['caption']  = $caption[$key];
                
                    $this->project_property_gallery_model->update_where('id', $gallery_id_list, $data_gallery);
                }
            }

			$return = $this->project_property_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
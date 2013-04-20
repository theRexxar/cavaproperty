<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class project_location extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Project.Content.View');
		$this->load->model('project_location_model', null, true);
		$this->lang->load('project_location');
		
		Template::set_block('sub_nav', 'project_location/_sub_nav');
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
					$result = $this->project_location_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('project_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('project_delete_failure') . $this->project_location_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(6);

		$records = $this->project_location_model->order_by('title', 'asc')->limit($this->limit, $offset)->find_all();
        
        // Pagination
		$this->load->library('pagination');

		$total_article = $this->project_location_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/project/project_location/index');
		$this->pager['total_rows'] 		= $total_article;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 6;

		$this->pagination->initialize($this->pager);

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Project Location');
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

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_project())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/project/project_location');
			}
			else
			{
				Template::set_message(lang('project_create_failure') . $this->project_location_model->error, 'error');
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
        
        Assets::add_js($this->load->view('project_location/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('project_create') . ' Project Location');
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
			redirect(SITE_AREA .'/content/project/project_location');
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
				Template::set_message(lang('project_edit_failure') . $this->project_location_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Project.Content.Delete');

			if ($this->project_location_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_delete_success'), 'success');

				redirect(SITE_AREA .'/content/project/project_location');
			} else
			{
				Template::set_message(lang('project_delete_failure') . $this->project_location_model->error, 'error');
			}
		}

		Template::set('project', $this->project_location_model->find($id));

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
        
        Assets::add_js($this->load->view('project_location/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('project_edit') . ' Project Location');
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

			if ($this->project_location_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('project_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'project');

				Template::set_message(lang('project_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('project_delete_failure') . $this->project_location_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/project/project_location');
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
		return $this->project_location_model->check_exists('title', $title, $id);
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
		return $this->project_location_model->check_exists('slug', $slug, $id);
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_project()

		Does the actual validation and saving of form data.

		Parameters:
			$location	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_project($location='insert', $id=0)
	{
		if ($location == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]|callback__check_title['.$id.']');
		$this->form_validation->set_rules('slug', 'Slug', 'required|trim|xss_clean|max_length[255]|alpha_dot_dash|callback__check_slug['.$id.']');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']                = $this->input->post('title');
		$data['slug']             	  = $this->input->post('slug');

		if ($location == 'insert')
		{
			$id = $this->project_location_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} 
			else
			{
				$return = FALSE;
			}
		}
		else if ($location == 'update')
		{
			$return = $this->project_location_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Banner.Content.View');
		$this->load->model('banner_model', null, true);
		$this->load->model('banner_group_model', 'banner_group');
		$this->lang->load('banner');
		
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.8.min.js');
		
		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if ($action = $this->input->post('delete'))
		{
			if ($action == 'Delete')
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$result = $this->banner_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('banner_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('banner_delete_failure') . $this->banner_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('banner_delete_error') . $this->banner_model->error, 'error');
				}
			}
		}
        
        $data = array();
        
        $banner_items = $this->banner_model->order_by('banner.group_id, banner.position')->find_all();
		if (is_array($banner_items) && count($banner_items)) 
		{
			foreach($banner_items as $record)
			{
				$data["records"][$record->id] = $record;
			}
		}
        
        $groups = $this->banner_group->find_all('id');
		if (is_array($groups) && count($groups)) 
		{
			foreach($groups as $record)
			{
				$data["groups"][$record->id] = $record;
			}
		}
        
		Assets::add_js($this->load->view('content/js', null, true), 'inline');

        //print_r($data);exit();

		Template::set("data", $data);
		Template::set('toolbar_title', 'Manage Banner');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Banner object.
	*/
	public function create()
	{
		$this->auth->restrict('Banner.Content.Create');
                
		$data['groups'] = array();
        
        $groups = $this->banner_group->find_all('id');
		if (is_array($groups) && count($groups))
		{
			foreach($groups as $group_id => $record)
			{
				$data['groups'][$group_id] = $record->title;
			}
		}
        Template::set("data", $data);

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_banner())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('banner_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'banner');

				Template::set_message(lang('banner_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/banner');
			}
			else
			{
				Template::set_message(lang('banner_create_failure') . $this->banner_model->error, 'error');
			}
		}
		Assets::add_module_js('banner', 'banner.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('banner', 'banner.css');
        
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
        
        Assets::add_js($this->load->view('content/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('banner_create') . ' Banner');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Banner data.
	*/
	public function edit()
	{
		$this->auth->restrict('Banner.Content.Edit');

		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('banner_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/banner');
		}

		if ($this->input->post('submit'))
		{
			if ($this->save_banner('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('banner_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'banner');

				Template::set_message(lang('banner_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('banner_edit_failure') . $this->banner_model->error, 'error');
			}
		}
        
        $groups = $this->banner_group->find_all('id');
		foreach($groups as $group_id => $record)
		{
			$data['groups'][$group_id] = $record->title;
		}
        Template::set("data", $data);

		Template::set('banner', $this->banner_model->find($id));
        
        
		Assets::add_module_js('banner', 'banner.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('banner', 'banner.css');
        
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
        
        Assets::add_js($this->load->view('content/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('banner_edit') . ' Banner');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Banner data.
	*/
	public function delete()
	{
		$this->auth->restrict('Banner.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->banner_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('banner_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'banner');

				Template::set_message(lang('banner_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('banner_delete_failure') . $this->banner_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/banner');
	}

	//--------------------------------------------------------------------

	/*
		Method: delete_image()
		
		Allows deleting of Banner image data.
	*/
	public function delete_image($banner_id=NULL) 
	{  
        $this->output->enable_profiler(false);
        
		if (!empty($banner_id))
		{	
            if($this->banner_model->update_where('banner.id', $banner_id, array('banner.image_id' => NULL)))
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


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_banner()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_banner($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('group_id','Banner Group','required|trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('summary','Summary','trim|xss_clean');
		$this->form_validation->set_rules('image_id','Image ID','required|trim|xss_clean|is_numeric|max_length[11]');
		$this->form_validation->set_rules('url','URL','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('publish','Publish','required|trim|xss_clean|max_length[1]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['group_id']         = $this->input->post('group_id');
		$data['title']            = $this->input->post('title');
		$data['summary']          = $this->input->post('summary');
		$data['image_id']         = $this->input->post('image_id');
		$data['url']              = $this->input->post('url');
		$data['publish']          = $this->input->post('publish');

		if ($type == 'insert')
		{
            $data['position'] = 99;
            
			$id = $this->banner_model->insert($data);

			if (is_numeric($id))
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
			$return = $this->banner_model->update($id, $data);
		}

		return $return;
	}
    
    
    public function ajax_update_positions()
	{
		// Create an array containing the IDs
		$ids = explode(',', $this->input->post('order'));

		// Counter variable
		$pos = 1;

		foreach($ids as $id)
		{
			// Update the position
			$data['position'] = $pos;
			$this->banner_model->update($id, $data);
			++$pos;
		}

	}

	//--------------------------------------------------------------------



}
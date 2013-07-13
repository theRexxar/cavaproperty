<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Banner.Content.View');
		$this->load->model('banner_group_model', null, true);
		$this->load->model('banner_model');
		$this->lang->load('banner_group');
		
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.8.min.js');
		
		Template::set_block('sub_nav', 'groups/_sub_nav');
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
						$result = $this->banner_group_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('banner_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('banner_delete_failure') . $this->banner_group_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('banner_delete_error') . $this->banner_group_model->error, 'error');
				}
			}
		}
        
        $records = $this->banner_group_model->find_all();

		Template::set('records', $records);
		Template::set_view('groups/index');
		Template::set('toolbar_title', 'Manage Banner Group');
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
        
        if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_banner_group())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('banner_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'banner');

				Template::set_message(lang('banner_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/banner/groups');
			}
			else
			{
				Template::set_message(lang('banner_create_failure') . $this->banner_group_model->error, 'error');
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
        
		Template::set_view('groups/create');
		Template::set('toolbar_title', lang('banner_create') . ' Banner Group');
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

		$id = $this->uri->segment(6);

		if (empty($id))
		{
			Template::set_message(lang('banner_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/banner/groups');
		}

		if ($this->input->post('submit'))
		{
			if ($this->save_banner_group('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('banner_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'banner');

				Template::set_message(lang('banner_edit_success'), 'success');
                redirect(SITE_AREA .'/content/banner/groups');
			}
			else
			{
				Template::set_message(lang('banner_edit_failure') . $this->banner_group_model->error, 'error');
			}
		}

		Template::set('banner', $this->banner_group_model->find($id));
        
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
        
		Template::set_view('groups/edit');
		Template::set('toolbar_title', lang('banner_edit') . ' Banner Group');
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

		$id = $this->uri->segment(6);

		if (!empty($id))
		{

			if ($this->banner_group_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('banner_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'banner');
                
                // Delete all banner in the group
				$this->banner_model->delete_where(array('banner.group_id' => $id));
                
				Template::set_message(lang('banner_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('banner_delete_failure') . $this->banner_group_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/banner/groups');
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
	private function save_banner_group($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('abbr','Abbreviation','required|trim|xss_clean|max_length[20]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        = $this->input->post('title');
		$data['abbr']         = $this->input->post('abbr');

		if ($type == 'insert')
		{
			$id = $this->banner_group_model->insert($data);

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
			$return = $this->banner_group_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('About.Content.View');
		$this->load->model('about_model', null, true);
		$this->lang->load('about');
		
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
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->about_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('about_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('about_delete_failure') . $this->about_model->error, 'error');
				}
			}
		}

		$records = $this->about_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage About Landing Page');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a About object.
	*/
	public function create()
	{
		$this->auth->restrict('About.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_about())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('about_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'about');

				Template::set_message(lang('about_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/about');
			}
			else
			{
				Template::set_message(lang('about_create_failure') . $this->about_model->error, 'error');
			}
		}
		Assets::add_module_js('about', 'about.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('about', 'about.css');
        
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

		Template::set('toolbar_title', lang('about_create') . ' About Landing Page');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of About data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('about_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/about');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('About.Content.Edit');

			if ($this->save_about('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('about_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'about');

				Template::set_message(lang('about_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('about_edit_failure') . $this->about_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('About.Content.Delete');

			if ($this->about_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('about_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'about');

				Template::set_message(lang('about_delete_success'), 'success');

				redirect(SITE_AREA .'/content/about');
			} else
			{
				Template::set_message(lang('about_delete_failure') . $this->about_model->error, 'error');
			}
		}
		Template::set('about', $this->about_model->find($id));

		Assets::add_module_js('about', 'about.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('about', 'about.css');
        
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

		Template::set('toolbar_title', lang('about_edit') . ' About Landing Page');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of About data.
	*/
	public function delete()
	{
		$this->auth->restrict('About.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->about_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('about_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'about');

				Template::set_message(lang('about_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('about_delete_failure') . $this->about_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/about');
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_about()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_about($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('description','Description','required|trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        	= $this->input->post('title');
		$data['description']	= $this->input->post('description');

		if ($type == 'insert')
		{
			$id = $this->about_model->insert($data);

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
			$return = $this->about_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
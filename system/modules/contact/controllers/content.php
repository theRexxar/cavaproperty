<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Contact.Content.View');
		$this->load->model('contact_model', null, true);
		$this->lang->load('contact');
		
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
					$result = $this->contact_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('contact_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('contact_delete_failure') . $this->contact_model->error, 'error');
				}
			}
		}

		$records = $this->contact_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Contact Office');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Contact object.
	*/
	public function create()
	{
		$this->auth->restrict('Contact.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_contact())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contact_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'contact');

				Template::set_message(lang('contact_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/contact');
			}
			else
			{
				Template::set_message(lang('contact_create_failure') . $this->contact_model->error, 'error');
			}
		}
		Assets::add_module_js('contact', 'contact.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('contact', 'contact.css');
        
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

		Template::set('toolbar_title', lang('contact_create') . ' Contact Office');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Contact data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('contact_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/contact');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Contact.Content.Edit');

			if ($this->save_contact('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contact_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contact');

				Template::set_message(lang('contact_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('contact_edit_failure') . $this->contact_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Contact.Content.Delete');

			if ($this->contact_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contact_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contact');

				Template::set_message(lang('contact_delete_success'), 'success');

				redirect(SITE_AREA .'/content/contact');
			} else
			{
				Template::set_message(lang('contact_delete_failure') . $this->contact_model->error, 'error');
			}
		}
		Template::set('contact', $this->contact_model->find($id));

		Assets::add_module_js('contact', 'contact.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('contact', 'contact.css');
        
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

		Template::set('toolbar_title', lang('contact_edit') . ' Contact Office');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Contact data.
	*/
	public function delete()
	{
		$this->auth->restrict('Contact.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->contact_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contact_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contact');

				Template::set_message(lang('contact_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('contact_delete_failure') . $this->contact_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/contact');
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_contact()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_contact($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('address','Address','required|trim|xss_clean');
		$this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('fax','Fax','required|trim|xss_clean|max_length[255]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        	= $this->input->post('title');
		$data['address']        = $this->input->post('address');
		$data['phone']        	= $this->input->post('phone');
		$data['fax']        	= $this->input->post('fax');

		if ($type == 'insert')
		{
			$id = $this->contact_model->insert($data);

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
			$return = $this->contact_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
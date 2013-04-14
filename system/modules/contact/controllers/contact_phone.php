<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_phone extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Contact.Content.View');
		$this->load->model('contact_phone_model', null, true);
		$this->lang->load('contact_phone');
		
		Template::set_block('sub_nav', 'contact_phone/_sub_nav');
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
					$result = $this->contact_phone_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('contact_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('contact_delete_failure') . $this->contact_phone_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(5);

		$records = $this->contact_phone_model->limit($this->limit, $offset)->find_all();

                
        // Pagination
		$this->load->library('pagination');

		$total_article = $this->contact_phone_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/contact/contact_phone/index');
		$this->pager['total_rows'] 		= $total_article;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 5;

		$this->pagination->initialize($this->pager);

		$vars = array(
						'records' 	=> $records,
					);  
                    
        //print_r($vars);exit();   

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Contact Phone Form');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: detail()

		View detail from selected data.
	*/
	public function detail()
	{
		$id = $this->uri->segment(6);

		if (empty($id))
		{
			Template::set_message(lang('contact_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/contact/contact_phone');
		}
        
        $form_detail = $this->contact_phone_model->find_by("id", $id);
                
        Assets::add_module_css('contact', 'contact.css');                                                

		Template::set('form_detail', $form_detail);
		Template::set('toolbar_title', 'Detail Phone Form');
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
				Template::redirect(SITE_AREA .'/content/contact/contact_phone');
			}
			else
			{
				Template::set_message(lang('contact_create_failure') . $this->contact_phone_model->error, 'error');
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
        
        Assets::add_js($this->load->view('contact_phone/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('contact_create') . ' Contact Phone Form');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Contact data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(6);

		if (empty($id))
		{
			Template::set_message(lang('contact_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/contact/contact_phone');
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
				Template::set_message(lang('contact_edit_failure') . $this->contact_phone_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Contact.Content.Delete');

			if ($this->contact_phone_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contact_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contact');

				Template::set_message(lang('contact_delete_success'), 'success');

				redirect(SITE_AREA .'/content/contact/contact_phone');
			} else
			{
				Template::set_message(lang('contact_delete_failure') . $this->contact_phone_model->error, 'error');
			}
		}
		Template::set('contact', $this->contact_phone_model->find($id));

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
        
        Assets::add_js($this->load->view('contact_phone/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('contact_edit') . ' Contact Phone Form');
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

		$id = $this->uri->segment(6);

		if (!empty($id))
		{

			if ($this->contact_phone_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('contact_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'contact');

				Template::set_message(lang('contact_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('contact_delete_failure') . $this->contact_phone_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/contact/contact_phone');
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

		
		$this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|is_numeric|max_length[20]');
		$this->form_validation->set_rules('other_phone','Other Phone','required|trim|xss_clean|is_numeric|max_length[20]');
		$this->form_validation->set_rules('subject','Subject','required|trim|xss_clean|max_length[255]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['name']        		= $this->input->post('name');
		$data['phone']        		= $this->input->post('phone');
		$data['other_phone']        = $this->input->post('other_phone');
		$data['subject']        	= $this->input->post('subject');

		if ($type == 'insert')
		{
			$id = $this->contact_phone_model->insert($data);

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
			$return = $this->contact_phone_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
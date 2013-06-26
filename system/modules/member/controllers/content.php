<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Member.Content.View');
		$this->load->model('member_model', null, true);
		$this->lang->load('member');

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
					$result = $this->member_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('member_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('member_delete_failure') . $this->member_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(5);

		$records = $this->member_model->order_by('created_on', 'desc')->limit($this->limit, $offset)->find_unblock();
        
        // Pagination
		$this->load->library('pagination');

		$total_member = $this->member_model->count_unblock();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/project/index');
		$this->pager['total_rows'] 		= $total_member;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 5;

		$this->pagination->initialize($this->pager);

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Member');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: blocked()

		Displays a list of form data.
	*/
	public function blocked()
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
					$result = $this->member_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('member_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('member_delete_failure') . $this->member_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(5);

		$records = $this->member_model->order_by('created_on', 'desc')->limit($this->limit, $offset)->find_block();
        
        // Pagination
		$this->load->library('pagination');

		$total_member = $this->member_model->count_block();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/project/blocked');
		$this->pager['total_rows'] 		= $total_member;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 5;

		$this->pagination->initialize($this->pager);

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Blocked Member');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: detail()

		View detail from selected data.
	*/
	public function detail()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('member_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/member');
		}
        
        $member_detail = $this->member_model->find_by("id", $id);
                
        Assets::add_module_css('member', 'member.css');                                                

		Template::set('member_detail', $member_detail);
		Template::set('toolbar_title', 'Detail Member');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Member object.
	*/
	public function create()
	{
		$this->auth->restrict('Member.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_member())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('member_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'member');

				Template::set_message(lang('member_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/member');
			}
			else
			{
				Template::set_message(lang('member_create_failure') . $this->member_model->error, 'error');
			}
		}
		Assets::add_module_js('member', 'member.js');

		Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('member', 'member.css');
        
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

		Template::set('toolbar_title', lang('member_create') . ' Member');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Member data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('member_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/member');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Member.Content.Edit');

			if ($this->save_member('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('member_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'member');

				Template::set_message(lang('member_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('member_edit_failure') . $this->member_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Member.Content.Delete');

			if ($this->member_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('member_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'member');

				Template::set_message(lang('member_delete_success'), 'success');

				redirect(SITE_AREA .'/content/member');
			} else
			{
				Template::set_message(lang('member_delete_failure') . $this->member_model->error, 'error');
			}
		}
		Template::set('member', $this->member_model->find($id));

		Assets::add_module_js('member', 'member.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/bootstrap-datepicker.css'),
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('member', 'member.css');
        
        Assets::add_js(	array	(
														Template::theme_url('js/jquery-ui-1.8.13.min.js'),
														Template::theme_url('js/jquery-iframedialog.js'),
														Template::theme_url('js/bootstrap-datepicker.js'),
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

		Template::set('toolbar_title', lang('member_edit') . ' Member');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Member data.
	*/
	public function delete()
	{
		$this->auth->restrict('Member.Content.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->member_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('member_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'member');

				Template::set_message(lang('member_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('member_delete_failure') . $this->member_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/member');
	}

	//--------------------------------------------------------------------

	/*
		Method: block()
		
		Allows block Member.
	*/
	public function block() 
	{	
		$this->auth->restrict('Member.Content.Block');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->member_model->block($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('member_act_block_record').': ' . $id . ' : ' . $this->input->ip_address(), 'member');
					
				Template::set_message(lang('member_block_success'), 'success');
			} else
			{
				Template::set_message(lang('member_block_failure') . $this->member_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/member/blocked');
	}
	
	//--------------------------------------------------------------------

	/*
		Method: unblock()
		
		Allows unblock Member.
	*/
	public function unblock() 
	{	
		$this->auth->restrict('Member.Content.Block');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->member_model->unblock($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('member_act_unblock_record').': ' . $id . ' : ' . $this->input->ip_address(), 'member');
					
				Template::set_message(lang('member_unblock_success'), 'success');
			} else
			{
				Template::set_message(lang('member_unblock_failure') . $this->member_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/member');
	}
	
	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_member()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_member($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('member_title','Title','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('member_first_name','First Name','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('member_last_name','Last Name','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('member_dob','Date of Birth','required|trim|xss_clean');
		$this->form_validation->set_rules('member_address','Address','required|trim|xss_clean');
		$this->form_validation->set_rules('member_city','City','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('member_postal_code','Postal Code','required|trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('member_email','Email','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('member_phone','Phone','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('member_mobile_phone','Mobile Phone','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('member_password','Password','required|trim|xss_clean|max_length[255]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['title']        = $this->input->post('member_title');
		$data['first_name']        = $this->input->post('member_first_name');
		$data['last_name']        = $this->input->post('member_last_name');
		$data['dob']        = $this->input->post('member_dob') ? $this->input->post('member_dob') : '0000-00-00';
		$data['address']        = $this->input->post('member_address');
		$data['city']        = $this->input->post('member_city');
		$data['postal_code']        = $this->input->post('member_postal_code');
		$data['email']        = $this->input->post('member_email');
		$data['phone']        = $this->input->post('member_phone');
		$data['mobile_phone']        = $this->input->post('member_mobile_phone');
		$data['password']        = $this->input->post('member_password');

		if ($type == 'insert')
		{
			$id = $this->member_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->member_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
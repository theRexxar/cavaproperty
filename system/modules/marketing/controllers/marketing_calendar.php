<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Marketing_calendar extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Marketing.Content.View');
		$this->load->model('marketing_calendar_model', null, true);
		$this->lang->load('marketing_calendar');
		
		Template::set_block('sub_nav', 'marketing_calendar/_sub_nav');
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
					$result = $this->marketing_calendar_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('marketing_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('marketing_delete_failure') . $this->marketing_calendar_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(6);

		$records = $this->marketing_calendar_model->order_by('date','asc')->limit($this->limit, $offset)->find_by_status('confirm');

                
        // Pagination
		$this->load->library('pagination');

		$total_calendar = $this->marketing_calendar_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/marketing/marketing_calendar/index');
		$this->pager['total_rows'] 		= $total_calendar;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 6;

		$this->pagination->initialize($this->pager);

		$total_confirmed    = $this->marketing_calendar_model->count_by_status('confirm');
        $total_rejected   	= $this->marketing_calendar_model->count_by_status('reject');
        $total_pending    	= $this->marketing_calendar_model->count_by_status('pending');

		$vars = array(
						'records' 	            => $records,
						'total_confirmed'       => $total_confirmed,
						'total_rejected'      	=> $total_rejected,
						'total_pending' 		=> $total_pending,
					);   
                    
        //print_r($vars);exit();     

		Template::set('data', $vars);
		Template::set('toolbar_title', 'Manage Confirmed Calendar');
		Template::set('page_title', 'Confirmed Calendar List');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: rejected()

		Displays a list of form data.
	*/
	public function rejected()
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
					$result = $this->marketing_calendar_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('marketing_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('marketing_delete_failure') . $this->marketing_calendar_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(6);

		$records = $this->marketing_calendar_model->limit($this->limit, $offset)->find_by_status('reject');

                
        // Pagination
		$this->load->library('pagination');

		$total_calendar = $this->marketing_calendar_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/marketing/marketing_calendar/rejected/index');
		$this->pager['total_rows'] 		= $total_calendar;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 6;

		$this->pagination->initialize($this->pager);

		$total_confirmed    = $this->marketing_calendar_model->count_by_status('confirm');
        $total_rejected   	= $this->marketing_calendar_model->count_by_status('reject');
        $total_pending    	= $this->marketing_calendar_model->count_by_status('pending');

		$vars = array(
						'records' 	            => $records,
						'total_confirmed'       => $total_confirmed,
						'total_rejected'      	=> $total_rejected,
						'total_pending' 		=> $total_pending,
					);   
                    
        //print_r($vars);exit();     

		Template::set('data', $vars);
		Template::set('toolbar_title', 'Manage Rejected Calendar');
		Template::set('page_title', 'Rejected Calendar List');
		Template::set_view('marketing_calendar/index');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: pending()

		Displays a list of form data.
	*/
	public function pending()
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
					$result = $this->marketing_calendar_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('marketing_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('marketing_delete_failure') . $this->marketing_calendar_model->error, 'error');
				}
			}
		}

		$offset = $this->uri->segment(6);

		$records = $this->marketing_calendar_model->limit($this->limit, $offset)->find_by_status('pending');

                
        // Pagination
		$this->load->library('pagination');

		$total_calendar = $this->marketing_calendar_model->count_all();

		$this->pager['base_url'] 		= site_url(SITE_AREA .'/content/marketing/marketing_calendar/pending/index');
		$this->pager['total_rows'] 		= $total_calendar;
		$this->pager['per_page'] 		= $this->limit;
		$this->pager['uri_segment']		= 6;

		$this->pagination->initialize($this->pager);

		$total_confirmed    = $this->marketing_calendar_model->count_by_status('confirm');
        $total_rejected   	= $this->marketing_calendar_model->count_by_status('reject');
        $total_pending    	= $this->marketing_calendar_model->count_by_status('pending');

		$vars = array(
						'records' 	            => $records,
						'total_confirmed'       => $total_confirmed,
						'total_rejected'      	=> $total_rejected,
						'total_pending' 		=> $total_pending,
					);   
                    
        //print_r($vars);exit();     

		Template::set('data', $vars);
		Template::set('toolbar_title', 'Manage Pending Calendar');
		Template::set('page_title', 'Pending Calendar List');
		Template::set_view('marketing_calendar/index');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: detail()

		View detail from selected data.
	*/
	public function detail($id)
	{
		if (empty($id))
		{
			Template::set_message(lang('marketing_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/marketing/marketing_calendar');
		}
        
        $calendar_detail = $this->marketing_calendar_model->find_detail($id);
        
        //print_r($calendar_detail);exit();
        
        Assets::add_module_css('marketing', 'marketing.css');                                                

		Template::set('calendar_detail', $calendar_detail);
		Template::set('toolbar_title', 'Detail Name');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Marketing object.
	*/
	public function create()
	{
		$this->auth->restrict('Marketing.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_marketing())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/marketing/marketing_calendar');
			}
			else
			{
				Template::set_message(lang('marketing_create_failure') . $this->marketing_calendar_model->error, 'error');
			}
		}
		Assets::add_module_js('marketing', 'marketing.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('marketing', 'marketing.css');
        
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
        
        Assets::add_js($this->load->view('marketing_calendar/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('marketing_create') . ' Marketing Calendar');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Marketing data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(6);

		if (empty($id))
		{
			Template::set_message(lang('marketing_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/marketing/marketing_calendar');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Marketing.Content.Edit');

			if ($this->save_marketing('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('marketing_edit_failure') . $this->marketing_calendar_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Marketing.Content.Delete');

			if ($this->marketing_calendar_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_delete_success'), 'success');

				redirect(SITE_AREA .'/content/marketing/marketing_calendar');
			} else
			{
				Template::set_message(lang('marketing_delete_failure') . $this->marketing_calendar_model->error, 'error');
			}
		}
		Template::set('marketing', $this->marketing_calendar_model->find($id));

		Assets::add_module_js('marketing', 'marketing.js');
        
        Assets::add_css(array	(
														Template::theme_url('css/jquery.ui.datepicker.css'),
														Template::theme_url('css/jquery-iframedialog.css'),
														Template::theme_url('css/jquery/jquery.plugin.chosen.css'),
														Template::theme_url('css/jquery/jquery.tagsinput.css'),
													),
										'screen');
                                        									
		Assets::add_module_css('marketing', 'marketing.css');
        
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
        
        Assets::add_js($this->load->view('marketing_calendar/form_js', null, true), 'inline'); 

		Template::set('toolbar_title', lang('marketing_edit') . ' Marketing Calendar');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of Marketing data.
	*/
	public function delete()
	{
		$this->auth->restrict('Marketing.Content.Delete');

		$id = $this->uri->segment(6);

		if (!empty($id))
		{

			if ($this->marketing_calendar_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('marketing_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				Template::set_message(lang('marketing_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('marketing_delete_failure') . $this->marketing_calendar_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/content/marketing/marketing_calendar');
	}

	//--------------------------------------------------------------------

	/*
		Method: confirm()
		
		Allows confirm data.
	*/
	public function confirm($id) 
	{		
		if (!empty($id))
		{	
			if ($this->marketing_calendar_model->change_status($id, 'confirm'))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('marketing_act_confirm_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');

				$check_calendar = $this->marketing_calendar_model->find_by('marketing_calendar.id', $id);

				$member_name 		= $check_calendar->title_member.". ".$check_calendar->first_name_member." ".$check_calendar->last_name_member;
				$member_email 		= $check_calendar->email_member;
				$marketing_name 	= $check_calendar->name_marketing;
				$marketing_email 	= $check_calendar->email_marketing;
				$marketing_phone 	= $check_calendar->phone_marketing;
				$property_name 		= $check_calendar->title_property;
				$date 				= date('d F Y',strtotime($check_calendar->date));


				//email setting to user
	            $this->email->from('admin@cavaproperty.com', 'Cava Property');
	            $this->email->to($member_email); 
	            //$this->email->cc('andhika.novandi@xmgravity.com'); 
	            //$this->email->bcc('them@their-example.com'); 
	            
	            $this->email->subject('Your Appointment Confirmation for '.$property_name);
	            $this->email->message("Dear ".$member_name.", \r\n\r\n Your appointment on ".$date." has been Confirmed. Please contact ".$marketing_name." (Email: ".$marketing_email." / Phone: ".$marketing_phone.") for further information. \r\n\r\n Thank you. \r\n\r\n\r\n Cava Property \r\n CityLofts Sudirman, #26 Floor, Unit #2623 \r\n Jl. KH. Mas Mansyur No. 121 Jakarta 10220, Indonesia \r\n Ph: 021 2555 8994 / 021 2991 2845 \r\n Fax: 021 2991 2844 \r\n www.cavaproperty.com");

					
				Template::set_message(lang('marketing_confirm_success'), 'success');
			} else
			{
				Template::set_message(lang('marketing_confirm_failure') . $this->marketing_calendar_model->error, 'error');
			}
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//--------------------------------------------------------------------

	/*
		Method: reject()
		
		Allows reject data.
	*/
	public function reject($id) 
	{		
		if (!empty($id))
		{	
			if ($this->marketing_calendar_model->change_status($id, 'reject'))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('marketing_act_confirm_record').': ' . $id . ' : ' . $this->input->ip_address(), 'marketing');


				$check_calendar = $this->marketing_calendar_model->find_by('marketing_calendar.id', $id);

				$member_name 		= $check_calendar->title_member.". ".$check_calendar->first_name_member." ".$check_calendar->last_name_member;
				$member_email 		= $check_calendar->email_member;
				$marketing_name 	= $check_calendar->name_marketing;
				$marketing_email 	= $check_calendar->email_marketing;
				$marketing_phone 	= $check_calendar->phone_marketing;
				$property_name 		= $check_calendar->title_property;
				$date 				= date('d F Y',strtotime($check_calendar->date));


				//email setting to user
	            $this->email->from('admin@cavaproperty.com', 'Cava Property');
	            $this->email->to($member_email); 
	            //$this->email->cc('andhika.novandi@xmgravity.com'); 
	            //$this->email->bcc('them@their-example.com'); 
	            
	            $this->email->subject('Your Appointment Confirmation for '.$property_name);
	            $this->email->message("Dear ".$member_name.", \r\n\r\n Your appointment on ".$date." has been Rejected. Please make another appointment or contact ".$marketing_name." (Email: ".$marketing_email." Phone: ".$marketing_phone.") for further information. \r\n\r\n Thank you. \r\n\r\n\r\n Cava Property \r\n CityLofts Sudirman, #26 Floor, Unit #2623 \r\n Jl. KH. Mas Mansyur No. 121 Jakarta 10220, Indonesia \r\n Ph: 021 2555 8994 / 021 2991 2845 \r\n Fax: 021 2991 2844 \r\n www.cavaproperty.com");

					
				Template::set_message(lang('marketing_reject_success'), 'success');
			} else
			{
				Template::set_message(lang('marketing_reject_failure') . $this->marketing_calendar_model->error, 'error');
			}
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_marketing()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_marketing($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|max_length[255]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['name']        	= $this->input->post('name');
		$data['phone']        	= $this->input->post('phone');
		$data['email']        	= $this->input->post('email');

		if ($type == 'insert')
		{
			$id = $this->marketing_calendar_model->insert($data);

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
			$return = $this->marketing_calendar_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}
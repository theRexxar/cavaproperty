<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class contact extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{
		$this->load->model('contact_model');
		$this->load->model('contact_mail_model');
		$this->load->model('contact_phone_model');

        $office = $this->contact_model->order_by('created_on','desc')->find_all();


        if ($this->input->post('submit_mail'))
		{
			if ($this->submit_mail_form())
			{              
                $mail_message = "Your message just send, Thank You";
			}
			else
			{
				$mail_error = validation_errors();
			}
		}
		elseif ($this->input->post('submit_phone'))
		{
			if ($this->submit_phone_form())
			{              
                $phone_message = "Your message just send, Thank You";
			}
			else
			{
				$phone_error = validation_errors();
			}
		}


        $vars = array(
						'office' 			=> $office,
						'mail_message' 		=> $mail_message,
						'mail_error' 		=> $mail_error,
						'phone_message' 	=> $phone_message,
						'phone_error' 		=> $phone_error,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
		Template::set('toolbar_title', "Contact");
        Template::set_view('front_page/index');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: submit_mail_form()

		Displays a list of mail form data.
	*/
	public function submit_mail_form()
	{
		$this->load->model('contact_mail_model');

		$error = array();
        
		$this->load->library('form_validation');  
	    $this->form_validation->CI =& $this;
	    
	    $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|max_length[255]');
	    $this->form_validation->set_rules('email','Email','required|trim|xss_clean|max_length[255]');
	    $this->form_validation->set_rules('subject', 'Subject', 'required|trim|xss_clean|max_length[255]');
	    $this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean');
	    
	    $this->form_validation->set_error_delimiters('<p>', '</p>');
	            
	    if($this->form_validation->run() === FALSE)
	    {
	        return FALSE;
		}

		$data = array();
		$data['name'] 		= $this->input->post('name');
		$data['email']    	= $this->input->post('email');
		$data['subject']  	= $this->input->post('subject');
		$data['message']  	= $this->input->post('message');

		$submit = $this->contact_mail_model->insert($data);
	        
        if($submit)
        {
            $return = $submit;
        }
        else
        {
            $return = FALSE;
        }

        return $return;   
	}

	//--------------------------------------------------------------------



	/*
		Method: submit_phone_form()

		Displays a list of phone form data.
	*/
	public function submit_phone_form()
	{
		$this->load->model('contact_phone_model');

		$error = array();
        
		$this->load->library('form_validation');  
	    $this->form_validation->CI =& $this;
	    
	    $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|max_length[255]');
	    $this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|is_numeric|max_length[20]');
	    $this->form_validation->set_rules('other_phone','Other Phone','required|trim|xss_clean|is_numeric|max_length[20]');
	    $this->form_validation->set_rules('subject', 'Subject', 'required|trim|xss_clean|max_length[255]');
	    
	    $this->form_validation->set_error_delimiters('<p>', '</p>');
	            
	    if($this->form_validation->run() === FALSE)
	    {
	        return FALSE;
		}

		$data = array();
		$data['name'] 			= $this->input->post('name');
		$data['phone']    		= $this->input->post('phone');
		$data['other_phone']  	= $this->input->post('other_phone');
		$data['subject']  		= $this->input->post('subject');

		$submit = $this->contact_phone_model->insert($data);
	        
        if($submit)
        {
            $return = $submit;
        }
        else
        {
            $return = FALSE;
        }

        return $return;   
	}

	//--------------------------------------------------------------------




}
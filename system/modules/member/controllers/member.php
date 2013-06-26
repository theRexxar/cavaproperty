<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class member extends Front_Controller {

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
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: profile()

		Displays profile page.
	*/
	public function profile()
	{
		$this->load->model('member_model');  
		$this->load->model('project/project_type_model');  
		$this->load->model('project/project_property_model');  

		$data_user = $this->session->userdata('data_user');

		$user = "";

		if($data_user)
		{
			$user = $this->member_model->find_by('id', $data_user['user_id']);

			if($user)
			{
				$types = explode(",", $user->property_type);
			}
		}
		else
		{
			show_404();
		}

		$property_type = $this->project_type_model->find_all();


		$message = "";

		if ($this->input->post('edit_profile'))
		{
			if ($this->submit_edit_profile())
			{
				$message = "Edit Profile Success";
			}
			else
			{
				Template::set_message('Edit Profile Failed' . $this->member_model->error, 'error');
			}
		}


		$vars = array(
						'user' 				=> $user,
						'property_type' 	=> $property_type,
						//'related_property' 	=> $related_property,
						'message'   		=> $message,
					);

		//print_r($vars);exit();

		Template::set('data', $vars);
        Template::set('toolbar_title', $user->first_name." ".$user->last_name." ~ Member Profile");
        Template::set_view('front_page/profile');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: schedule()

		Displays schedule page.
	*/
	public function schedule()
	{
		$this->load->model('member_model');  
		$this->load->model('marketing/marketing_calendar_model');  

		$data_user = $this->session->userdata('data_user');

		$user = "";

		if($data_user)
		{
			$user = $this->member_model->find_by('id', $data_user['user_id']);

			if($user)
			{
				$calendar = $this->marketing_calendar_model->find_all_by('marketing_calendar.member_id', $user->id);
			}
		}
		else
		{
			show_404();
		}

		$vars = array(
						'user' 		=> $user,
						'calendar' 	=> $calendar,
					);

		//print_r($vars);exit();

		Template::set('data', $vars);
        Template::set('toolbar_title', $user->first_name." ".$user->last_name." ~ Member Schedule");
        Template::set_view('front_page/schedule');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: submit_sign_up()
		
		Submit sign up form.
	*/
	public function submit_sign_up() 
	{
		$this->load->model('member_model');  
        
		$this->load->library('form_validation');  
        $this->form_validation->CI =& $this;
        
        $this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('first_name','First Name','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('last_name','Last Name','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('address','Address','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('city','City','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('postal_code','Postal Code','required|trim|xss_clean|is_numeric|max_length[10]');
		$this->form_validation->set_rules('email','Email','callback_email_check|required|trim|xss_clean|valid_email|max_length[255]');
        $this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|is_numeric|max_length[20]');
        $this->form_validation->set_rules('mobile_phone','Mobile Phone','required|trim|xss_clean|is_numeric|max_length[20]');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');			
		$this->form_validation->set_rules('re_password','Password Confirmation','required|trim|xss_clean|matches[password]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        
        if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
        
        $data = array();
		$data['title']                	= $this->input->post('title');
		$data['first_name']             = $this->input->post('first_name');
		$data['last_name']              = $this->input->post('last_name');
		$data['dob']              		= $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
		$data['address']                = $this->input->post('address');
		$data['city']                	= $this->input->post('city');
		$data['postal_code']          	= $this->input->post('postal_code');
		$data['email']                	= $this->input->post('email');
		$data['phone']                	= $this->input->post('phone');
		$data['mobile_phone']         	= $this->input->post('mobile_phone');


		if($this->input->post('password') != "")
		{
			$data['password']           = md5($this->input->post('password'));
		}


		if($this->input->post('property_type') != "")
		{
			$type = implode(",", $this->input->post('property_type'));

			$data['property_type']  		= $type;
		}


		$new_code 	= get_random_string(4,2,2);
		$check_code = $this->member_model->find_all_by('forgot_code', $new_code);

		if($check_code != "")
		{
			$data['forgot_code']        = get_random_string(4,2,2);
		}
		else
		{
			$data['forgot_code']        = $new_code;
		}


		$submit = $this->member_model->insert($data);
    
        if($submit)
        {
        	$data_user['user_id']  	= $submit;
        	$data_user['name'] 		= $data['first_name'].' '.$data['last_name'];
        	$data_user['email'] 	= $data['email'];

            $this->session->set_userdata('data_user',$data_user);

            Template::redirect(base_url());
        }
	}
	
	//--------------------------------------------------------------------



	/*
		Method: check data()
		
		Check username and email from database.
	*/    
	public function email_check($email)
	{
        $this->load->model('member_model');  
        
        $check = $this->member_model->find_all_by('email', $email);
        
		if($check != "")
		{
			$this->form_validation->set_message('email_check', 'Email already registered');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//--------------------------------------------------------------------



	/*
		Method: submit_edit_profile()
		
		Submit edit profile form.
	*/
	public function submit_edit_profile() 
	{
		$this->load->model('member_model');  
        
		$this->load->library('form_validation');  
        $this->form_validation->CI =& $this;
        
        $this->form_validation->set_rules('title','Title','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('first_name','First Name','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('last_name','Last Name','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('address','Address','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('city','City','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('postal_code','Postal Code','required|trim|xss_clean|is_numeric|max_length[10]');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|max_length[255]');
        $this->form_validation->set_rules('phone','Phone','required|trim|xss_clean|is_numeric|max_length[20]');
        $this->form_validation->set_rules('mobile_phone','Mobile Phone','required|trim|xss_clean|is_numeric|max_length[20]');
        $this->form_validation->set_rules('password','Password','trim|xss_clean');			
		$this->form_validation->set_rules('re_password','Password Confirmation','trim|xss_clean|matches[password]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        
        if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
        
        $data = array();
		$data['title']                	= $this->input->post('title');
		$data['first_name']             = $this->input->post('first_name');
		$data['last_name']              = $this->input->post('last_name');
		$data['dob']              		= $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
		$data['address']                = $this->input->post('address');
		$data['city']                	= $this->input->post('city');
		$data['postal_code']          	= $this->input->post('postal_code');
		$data['email']                	= $this->input->post('email');
		$data['phone']                	= $this->input->post('phone');
		$data['mobile_phone']         	= $this->input->post('mobile_phone');


		if($this->input->post('property_type') != "")
		{
			$type = implode(",", $this->input->post('property_type'));

			$data['property_type']  		= $type;
		}


		if($this->input->post('password') != "")
		{
			$data['password']           = md5($this->input->post('password'));
		}


		$id = $this->input->post('user_id');

		$submit = $this->member_model->update($id, $data);

		if($submit)
        {
        	$this->session->unset_userdata('data_user');

        	$data_user['user_id']  	= $id;
        	$data_user['name'] 		= $data['first_name'].' '.$data['last_name'];
        	$data_user['email'] 	= $data['email'];

            $this->session->set_userdata('data_user',$data_user);

            Template::redirect(base_url('member/profile'));
        }  

        return $submit;
	}
	
	//--------------------------------------------------------------------



	/*
		Method: submit_login()
		
		Submit login form.
	*/
	public function submit_login() 
	{
        $this->load->model('member_model');  
        
		$this->load->library('form_validation');  
        $this->form_validation->CI =& $this;
        
        $this->form_validation->set_rules('email','Email','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('password','Password','callback_password_check|required|trim|xss_clean');	
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        
        if($this->form_validation->run() === FALSE)
		{
			Template::set_message($this->member_model->error, 'error');
            Template::redirect(base_url());
		}
        else
        {
            Template::redirect(base_url());
        }             
	}
	
	//--------------------------------------------------------------------



	/*
		Method: check data()
		
		Check password from database.
	*/
	public function password_check($password)
	{
        $this->load->model('member_model');  
        
        $email = $this->input->post('email');
        
        $data = array('email'=>$email,'password'=>md5($password));
        
        $check = $this->member_model->find_by($data, '', 'and');
        
		if(! $check)
		{
			$this->form_validation->set_message('password_check', 'Invalid Username or Password');
			return FALSE;
		}
		else
		{   
            if($check->block == "Y") //cek user di block apa gak
            {
                $this->form_validation->set_message('password_check', 'Your account has been blocked by administrator');
                return FALSE;
            }
            else
            {
                $data_user = array();
        		$data_user['user_id']  	= $check->id;
	        	$data_user['name'] 		= $check->first_name.' '.$check->last_name;
	        	$data_user['email'] 	= $check->email;
                
                $this->session->set_userdata('data_user',$data_user);
                
    			return TRUE;
            }
		}
	}
	
	//--------------------------------------------------------------------



	/*
		Method: logout()
		
		Logout from website.
	*/
	public function logout() 
	{
        $this->session->unset_userdata('data_user');
       
		Template::redirect(base_url());
	}
	
	//--------------------------------------------------------------------



	/*
		Method: forgot_password()
		
		Submit forgot password form.
	*/
	public function forgot_password() 
	{
        $this->load->model('member_model');  
        
		$this->load->library('form_validation');  
        $this->form_validation->CI =& $this;
        
        $this->form_validation->set_rules('email','Email','callback_forgot_email_check|required|trim|xss_clean|max_length[255]');
        
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        
        if($this->form_validation->run() === FALSE)
		{
			Template::set_message($this->member_model->error, 'error');
		}
        else
        {
        	$new_pass 	= get_random_string(6,2,2);
        	$user_email = $this->input->post('email');

        	$check 		= $this->member_model->find_all_by('email', $user_email);
        	$conf_code 	= $check->forgot_code;

        	//email setting to user
            $this->email->from('admin@cavaproperty.com', 'Cava Property');
            $this->email->to($user_email); 
            //$this->email->cc('andhika.novandi@xmgravity.com'); 
            //$this->email->bcc('them@their-example.com'); 
            
            $this->email->subject('Forgot Password');
            $this->email->message("Please follow the link below to reset your password. \r\n\r\n\r\n http://cavaproperty.com/member/reset_password?email=".$user_email."&new_pass=".$new_pass."&conf_code=".$conf_code);
            
            $email_send = $this->email->send();

            Template::redirect(base_url());
        }             
	}
	
	//--------------------------------------------------------------------



	/*
		Method: check data()
		
		Check username and email from database.
	*/    
	public function forgot_email_check($email)
	{
        $this->load->model('member_model');  
        
        $check = $this->member_model->find_all_by('email', $email);
        
		if($check == "")
		{
			$this->form_validation->set_message('forgot_email_check', 'Email not registered');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//--------------------------------------------------------------------




}
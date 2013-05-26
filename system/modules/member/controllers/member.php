<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class member extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('member_model', null, true);
		$this->lang->load('member');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
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
		$data['password']             	= md5($this->input->post('password'));
        
        $submit = $this->member_model->insert($data);
        
        if($submit)
        {
        	$data_user['name'] 	= $data['first_name'].' '.$data['last_name'];
        	$data_user['email'] = $data['email'];

            $this->session->set_userdata('data_user',$data);

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
                $data = array();
        		$data['name']  	= $check->first_name.' '.$check->last_name;
        		$data['email']  = $check->email;
                
                $this->session->set_userdata('data_user',$data);
                
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
        	$check_user = $this->member_model->find_all_by('email', $this->input->post('email'));

        	$get_password = 

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
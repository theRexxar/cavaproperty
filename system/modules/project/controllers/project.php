<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class project extends Front_Controller {

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
		$this->load->model('project_developer_model');
		$this->load->model('project_property_model');

        $developer 			= $this->project_developer_model->order_by('title','asc')->find_all();
        $property 			= $this->project_property_model->order_by('created_on','desc')->find_all();
        $property_highlight = $this->project_property_model->order_by('created_on','desc')->find_all_by('project_property.highlight','yes');

        $vars = array(
						'developer' 			=> $developer,
						'property' 				=> $property,
						'property_highlight' 	=> $property_highlight,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
		Template::set('toolbar_title', "Our Projects");
        Template::set_view('front_page/index');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: developer_detail()

		Displays a list property per developer.
	*/
	public function developer_detail($slug=NULL)
	{
		$this->load->model('project_developer_model');
		$this->load->model('project_property_model');


        $developer_list		= $this->project_developer_model->order_by('title','asc')->find_all();
        $developer_detail 	= $this->project_developer_model->find_by('slug', $slug);
        $property 			= $this->project_property_model->order_by('created_on','desc')->find_all_by('project_property.developer_id', $developer_detail->id);
        $latest_property	= $this->project_property_model->order_by('created_on','desc')->limit(1)->find_all_by('project_property.developer_id', $developer_detail->id);
        

        $vars = array(
						'developer_list' 	=> $developer_list,
						'developer_detail' 	=> $developer_detail,
						'property' 			=> $property,
						'latest_property' 	=> $latest_property,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
		Template::set('toolbar_title', $developer_detail->title." ~ Our Projects");
        Template::set_view('front_page/_content/developer_detail');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: property_detail()

		Displays detail property.
	*/
	public function property_detail($cat_slug=NULL,$slug=NULL)
	{
		$this->load->model('member/member_model');
		$this->load->model('project_developer_model');
		$this->load->model('project_property_model');
		$this->load->model('project_property_gallery_model');


		$data_user 	= $this->session->userdata('data_user');
		$user 		= "";
		if($data_user)
		{
			$user = $this->member_model->find_by('id', $data_user['user_id']);
		}

        $developer 		= $this->project_developer_model->find_by('slug', $cat_slug);
        $property_list 	= $this->project_property_model->order_by('created_on','desc')->find_all_by('project_property.developer_id', $developer->id);

        $property 		= $this->project_property_model->find_by('project_property.slug', $slug);
        if($property)
        {
        	$property->gallery = $this->project_property_gallery_model->find_all_by('property_id', $property->id);
        }

        $vars = array(
						'user' 				=> $user,
						'developer' 		=> $developer,
						'property' 			=> $property,
						'property_list' 	=> $property_list,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
		Template::set('toolbar_title', $property->title." ~ ".$developer->title." ~ Our Projects");
        Template::set_view('front_page/_content/property_detail');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: set_calendar()
		
		Submit appointment calendar.
	*/
	public function set_calendar() 
	{
        $this->load->model('member/member_model');  
        $this->load->model('marketing/marketing_model'); 
        $this->load->model('marketing/marketing_calendar_model'); 
        $this->load->model('project/project_property_model');  
        

        $marketing_id 	= $this->input->get('marketing_id');
        $member_id 		= $this->input->get('member_id');
        $property_id 	= $this->input->get('property_id');
        $date 			= $this->input->get('date');
    	
        $data_user = $this->session->userdata('data_user');

        if($data_user)
        {
        	$data = array();
			$data['marketing_id']   	= $marketing_id;
			$data['member_id'] 			= $member_id;
			$data['property_id']  		= $property_id;
			$data['date']  				= $date;
			$data['status']  			= "pending";

			$this->marketing_calendar_model->insert($data);
        }
        else
        {
        	$return['success']   = 0;
			$return['message']   = "Please register / login to make an appointment";
        }


        if(!empty($error)) //kondisi kalo ada error alias form submit gagal
        { 
			$return['success']   = 0;
			$return['error']     = $error;
		}
		else //kalo gak ada error alias form submit sukses
        { 
			$return['success']   = 1;

			//email setting to user
            $this->email->from('admin@cavaproperty.com', 'Cava Property');
            $this->email->to($data['email']); 
            //$this->email->cc('andhika.novandi@xmgravity.com'); 
            //$this->email->bcc('them@their-example.com'); 
            
            $this->email->subject('Your Appointment Request');
            $this->email->message("Thank you for your appointment request. We'll confirmed to you soon as possible. \r\n\r\n Cava Property \r\n CityLofts Sudirman, #26 Floor, Unit #2623 \r\n Jl. KH. Mas Mansyur No. 121 Jakarta 10220, Indonesia \r\n Ph: 021 2555 8994 / 021 2991 2845 \r\n Fax: 021 2991 2844 \r\n www.cavaproperty.com");
            
            $send_mail = $this->email->send();

            if($send_mail)
            {
            	$check_marketing 	= $this->marketing_model->find_by('id', $marketing_id);
            	$check_member 		= $this->member_model->find_by('id', $member_id);
            	$check_property 	= $this->project_property_model->find_by('project_property.id', $property_id);

            	//email setting to marketing agent
                $this->email->from('admin@cavaproperty.com', 'Cava Property');
            	$this->email->to($check_marketing->email); 
                //$this->email->to('andhika.novandi@xmgravity.com'); 
                                
                $this->email->subject('Cava Property Appointment Request');
                $this->email->message("Name : ".$check_member->title." ".$check_member->first_name." ".$check_member->last_name."\r\nEmail : ".$check_member->email."\r\nPhone : ".$check_member->phone."\r\nMobile Phone : ".$check_member->mobile_phone."\r\nProperty : ".$check_property->title."\r\nDate : ".date('d F Y',strtotime($date)));
                                
                $this->email->send();
            }
		}
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($return));     
	}
	
	//--------------------------------------------------------------------




}
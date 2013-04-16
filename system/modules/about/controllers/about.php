<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class about extends Front_Controller {

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
		$this->load->model('about_model');
		$this->load->model('about_people_model');

        $landing_page 	= $this->about_model->order_by('created_on','desc')->limit(1)->find_all();
        $people 		= $this->about_people_model->order_by('ordering','asc')->find_all();

        $vars = array(
						'landing_page'	=> $landing_page,
						'people'		=> $people,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
		Template::set('toolbar_title', "About Us");
        Template::set_view('front_page/index');
		Template::render();
	}

	//--------------------------------------------------------------------




}
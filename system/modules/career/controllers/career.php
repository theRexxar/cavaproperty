<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class career extends Front_Controller {

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
		$this->load->model('career_model');

        $career = $this->career_model->order_by('created_on','desc')->find_all();

        $vars = array(
						'career' => $career,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
		Template::set('toolbar_title', "Career");
        Template::set_view('front_page/index');
		Template::render();
	}

	//--------------------------------------------------------------------




}
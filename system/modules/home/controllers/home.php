<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
    
    //--------------------------------------------------------------------
	

	/*
		Method: index()
		
		Displays homepage.
	*/
	public function index()
	{
		$this->load->model('banner/banner_model');
		$this->load->model('project/project_model');
		$this->load->model('project/project_type_model');
		$this->load->model('project/project_location_model');

        $banner 	= $this->banner_model->order_by('position','asc')->where('publish','Y')->find_all();

        $category 	= $this->project_model->order_by('title','desc')->find_all();
		foreach($category as $category_list)
		{
			$data["category"][$category_list->id] = $category_list;

			$data["category"][$category_list->id]->type = $this->project_type_model->order_by('title','asc')->find_all_by('project_type.category_id', $category_list->id);
		}

		$location = $this->project_location_model->order_by('title','asc')->find_all();

        $vars = array(
						'banner'      	=> $banner,
						'category'		=> $category,
						'location'		=> $location,
					);
        
        //print_r($vars);exit();
		
        Template::set('data', $vars);
        Template::set('toolbar_title', "Home");
        Template::set_view('front_page/index');
		Template::render();
	}
    
    //--------------------------------------------------------------------
	

	/*
		Method: member_section()
		
		Displays member section.
	*/
	public function member_section()
	{
		$this->load->model('project/project_type_model');  

        $property_type = $this->project_type_model->find_all();		

        $vars = array(
						'property_type'  => $property_type,
					);
        
        //print_r($vars);exit();
		
        $this->load->view("front_page/_content/member_section", $vars);
	}
    
    //--------------------------------------------------------------------
}
/* End of file home.php */
/* Location: ./modules/home/controllers/home.php */
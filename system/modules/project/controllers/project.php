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

        $developer 	= $this->project_developer_model->order_by('title','desc')->find_all();
        $property 	= $this->project_property_model->order_by('created_on','desc')->find_all();

        $vars = array(
						'developer' => $developer,
						'property' 	=> $property,
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


        $developer_list		= $this->project_developer_model->order_by('title','desc')->find_all();
        $developer_detail 	= $this->project_developer_model->find_by('slug', $slug);
        $property 			= $this->project_property_model->order_by('created_on','desc')->find_all_by('project_property.developer_id', $developer_detail->id);
        $latest_property	= $this->project_property_model->order_by('created_on','desc')->limit(1)->find_all();
        

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
		$this->load->model('project_developer_model');
		$this->load->model('project_property_model');
		$this->load->model('project_property_gallery_model');


        $developer 		= $this->project_developer_model->find_by('slug', $cat_slug);
        $property_list 	= $this->project_property_model->order_by('created_on','desc')->find_all_by('project_property.developer_id', $developer->id);

        $property 		= $this->project_property_model->find_by('project_property.slug', $slug);
        if($property)
        {
        	$property->gallery = $this->project_property_gallery_model->find_all_by('property_id', $property->id);
        }

        $vars = array(
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




}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Front_Controller {
	
	protected $result = array();
	
	function __construct()
	{
		parent::__construct();
        
        $this->load->model('search_model');
	}    
	
    
    //--------------------------------------------------------------------



    /*
		Method: index()
		
		Displays index from search page.
	*/
	public function index()
	{
        Template::set_view("front_page/index");
		Template::set('toolbar_title', 'Search');
		Template::render();
	}
    
    //--------------------------------------------------------------------

	

	/*
		Method: search_widget()

		Displays search form widget.
	*/
	public function search_widget()
	{		
		$this->load->model('project/project_property_model');
		$this->load->model('project/project_city_model');

		$apartment 	= $this->project_property_model->order_by('title','asc')->find_all_finder('1', 'secondary');
		$office 	= $this->project_property_model->order_by('title','asc')->find_all_finder('6', 'secondary');

		$location 	= $this->project_city_model->order_by('title', 'asc')->find_all();

        $vars = array(
						'apartment' 	=> $apartment,
						'office'  		=> $office,
						'location'  	=> $location,
					);
		

		$this->load->view('front_page/_content/search_widget', $vars);
	}

	//--------------------------------------------------------------------



    /*
		Method: result()
		
		Displays result from search.
	*/
    public function result()
    {   		
		$search_data  = $this->search();
        
        $data = array();
		
		$data['result'] = $search_data['result']; 
        
        if($data['result'] != FALSE)
        {
		  $data['number_of_rows'] = $search_data['number_of_rows']; 
        }
                        
        //print_r($data);exit();
        
        if($data['result'] != FALSE)
        {
            $this->load->view("front_page/_content/result", $data);
        }
        else
        {
            $this->load->view("front_page/_content/result_none", $data);
        }
    }
     
    
    //--------------------------------------------------------------------



    /*
		Method: search()
		
		Get search parameter from url.
	*/
    function search()
	{		
		$this->load->model('project/project_type_model');
		$this->load->model('project/project_city_model');

	    //$category       = $this->input->get('category');
	    $status       		= $this->input->get('status');
	    $name_apartment     = $this->input->get('name_apartment');
	    $name_office       	= $this->input->get('name_office');
	    $type       		= $this->input->get('type');
	    $location_house     = $this->input->get('location_house');
	    $bedroom_apartment  = $this->input->get('bedroom_apartment');
	    $size_office  		= $this->input->get('size_office');


	    //Session for back button
		$this->session->unset_userdata('search_data');


		$data_search = array();
		$data_search['status']  			= $status;
		$data_search['name_apartment']  	= $name_apartment;
		$data_search['name_office']  		= $name_office;
		$data_search['type']  				= $type;
		$data_search['location_house']  	= $location_house;
		$data_search['bedroom_apartment']  	= $bedroom_apartment;
		$data_search['size_office']  		= $size_office;
        
        $this->session->set_userdata('search_data',$data_search);
		//-----------------------


	    //Convert apartement to apartment
	    if($type == "apartement")
	    {
	    	$type = "apartment";
	    }

	    //Convert string parameter from slug to id
	    $type_id 			= $this->project_type_model->find_by('slug', $type);
	    $location_house_id 	= $this->project_city_model->find_by('slug', $location_house);

	    //Condition for bedroom apartment
	    if($bedroom_apartment == "1" OR $bedroom_apartment == "2" OR $bedroom_apartment == "3")
	    {
	    	$bedroom_apartment_count = $bedroom_apartment;
	    }
	    elseif($bedroom == "3plus")
	    {
	    	$bedroom_apartment_count = "3";
	    }

        
		$options['category']   					= "secondary";
		$options['status']   					= $status;
		$options['name_apartment']   			= $name_apartment;
		$options['name_office']   				= $name_office;
		$options['type']   						= $type_id->id;
		$options['location_house']   			= $location_house_id->id;
		$options['bedroom_apartment_count'] 	= $bedroom_apartment_count;
		$options['size_office'] 				= $size_office;
        $options['order_by']      				= "created_on";
        $options['order_method']  				= "desc";
		
        
        //Module Project
		$options['table']                            = 'project_property';
		$options['limit']                            = $limit;
		$data['number_of_rows'][$options['table']]   = $this->_insert_result($options);
		//--------------
                
                
		$data['result']       = $this->result;
	
		//print_r($options);exit();

		return $data;
	}
    
    
    //--------------------------------------------------------------------



    /*
		Method: _insert_result()
		
		Insert result from query search.
	*/
    function _insert_result($options=array())
	{
        $from_search = "?ref=search";
		
		$query = $this->search_model->retrieve_search($options);

		echo($query);
        
		if($query)
		{
			$result = $query->result_array();
            
			foreach($result as $row)
			{
				$row['link_detail'] = "";
                
				if($options['table'] === 'project_property') //Module Project
				{
					$row['link_detail']  = base_url().'project/detail/'.$row['slug'].$from_search;
					$row['module_name']  = 'Project';
					$row['archive_slug'] = 'project';
				}
                
				$this->result[$options['table']][] = $row;
			}			
            
            $this->result[$options['table']."-module_name"] = $row['module_name'];
            
			return $query->num_rows();			
		}
        
		return 0;
	}
    
    
    //--------------------------------------------------------------------



    /*
		Method: _number_of_rows()
		
		Count total result from query.
	*/
    function _number_of_rows($keyword,$table)
	{
        $row_count = 0;
        
        $optionx['keyword'] = $keyword;
        $optionx['table']   = $table;
        
		$query = $this->search_model->retrieve_search($optionx);
        
		if($query)
		{
			$row_count = $query->num_rows();
		}
        
		return $row_count;
	}
     
    
    //--------------------------------------------------------------------

}
/* End of file search.php */
/* Location: ./modules/search/controllers/search.php */
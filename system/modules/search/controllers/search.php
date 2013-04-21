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
		$this->load->model('project/project_location_model');

	    $type       	= $this->input->get('type');
	    $location       = $this->input->get('location');
	    $bedroom     	= $this->input->get('bedroom');


	    //Convert string parameter from slug to id
	    $type_id 		= $this->project_type_model->find_by('slug', $type);
	    $location_id 	= $this->project_location_model->find_by('slug', $location);

	    //Condition for bedroom
	    if($bedroom == "2" OR $bedroom == "3")
	    {
	    	$bedroom_count = $bedroom;
	    }
	    elseif($bedroom == "3plus")
	    {
	    	$bedroom_count = "3";
	    }

        
		$options['type']   			= $type_id->id;
		$options['location']   		= $location_id->id;
		$options['bedroom'] 		= $bedroom;
		$options['bedroom_count'] 	= $bedroom_count;
        $options['order_by']      	= "created_on";
        $options['order_method']  	= "desc";
		
        
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
					$row['link_detail']  = base_url().'project/detail/'.$row['slug_developer'].'/'.$row['slug'].$from_search;
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
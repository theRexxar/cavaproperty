<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Search_model extends CI_Model { 
         
    function retrieve_search($options=array()) 
    { 
        $where = array(); 

        if(isset($options['bedroom']) && $options['bedroom'] != "") 
        { 
            switch($options['bedroom'])
            {
                case '2'        : $bedroom_field  = 'project_property.bedroom'; break;
                case '3'        : $bedroom_field  = 'project_property.bedroom'; break;
                case '3plus'    : $bedroom_field  = 'project_property.bedroom >'; break;
            }
        }

        if(isset($options['table'])) 
        { 
            if($options['table'] === "project_property") 
            { 
                $this->db->select('project_property.*, project_developer.id AS id_developer, project_developer.title AS title_developer, project_developer.slug AS slug_developer');
                $this->db->join('project_developer', 'project_property.developer_id = project_developer.id', 'left');
                $this->db->where('project_property.deleted', '0');
                if(isset($options['name']) && $options['name'] != "") 
                {                     
                    $this->db->where('match(cv_project_property.title) against('.$this->db->escape($options['name']).' IN BOOLEAN MODE)',NULL,false); 
                }                            
                if(isset($options['type']) && $options['type'] != "") 
                { 
                    $this->db->where('project_property.type_id',$options['type']);
                }                            
                if(isset($options['location']) && $options['location'] != "") 
                { 
                    $this->db->where('project_property.location_id',$options['location']);
                }                            
                if(isset($options['bedroom_count']) && $options['bedroom_count'] != "") 
                { 
                    $this->db->where($bedroom_field,$options['bedroom_count']);
                }
                $this->db->where('project_property.status',$options['status']);
            }
        }         

         
        if(isset($options['limit'])) 
        { 
            if(isset($options['offset'])) 
            { 
                $this->db->limit($options['limit'],$options['offset']); 
            } 
            else 
            { 
                $this->db->limit($options['limit'],0); 
            } 
        }         
        
        if(isset($options['order_by']))
		{
			if(isset($options['order_method']))
			{
				$this->db->order_by($options['order_by'],$options['order_method']);
			}
			else
			{
				$this->db->order_by($options['order_by'],'DESC');
			}
		}
        
        $this->db->from($options['table']); 
        $this->db->where($where); 
         
        $query=$this->db->get(); 
        //echo $this->db->last_query(); 
        if($query->num_rows() > 0) 
        { 
            return $query; 
        } 
        else 
        { 
            return false; 
        } 
    }     
}
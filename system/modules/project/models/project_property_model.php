<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project_property_model extends BF_Model {

	protected $table		= "project_property";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
    
    
    public function xfind_all()
    {
        $this->db->where('deleted', '0');        
        return parent::find_all();
    } 

    public function find_all()
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*,
                            project_type.id AS id_type,
                            project_type.title AS title_type,
                            project_type.slug AS slug_type,
                            project_developer.id AS id_developer,
                            project_developer.title AS title_developer,
                            project_developer.slug AS slug_developer,
                            project_location.id AS id_location,
                            project_location.title AS title_location,
                            project_location.slug AS slug_location,
                            marketing_agent.id AS id_marketing,
                            marketing_agent.name AS name_marketing,
                            marketing_agent.phone AS phone_marketing,
                            marketing_agent.email AS email_marketing,
                            ');
        }

        $this->db->join('project_type', 'project_property.type_id = project_type.id', 'left');
        $this->db->join('project_developer', 'project_property.developer_id = project_developer.id', 'left');
        $this->db->join('project_location', 'project_property.location_id = project_location.id', 'left');
        $this->db->join('marketing_agent', 'project_property.marketing_id = marketing_agent.id', 'left');
        $this->db->where('project_property.deleted', '0');

        return parent::find_all();
    }

    public function find_by($field,$value)
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*,
                            project_type.id AS id_type,
                            project_type.title AS title_type,
                            project_type.slug AS slug_type,
                            project_developer.id AS id_developer,
                            project_developer.title AS title_developer,
                            project_developer.slug AS slug_developer,
                            project_location.id AS id_location,
                            project_location.title AS title_location,
                            project_location.slug AS slug_location,
                            marketing_agent.id AS id_marketing,
                            marketing_agent.name AS name_marketing,
                            marketing_agent.phone AS phone_marketing,
                            marketing_agent.email AS email_marketing,
                            ');
        }

        $this->db->join('project_type', 'project_property.type_id = project_type.id', 'left');
        $this->db->join('project_developer', 'project_property.developer_id = project_developer.id', 'left');
        $this->db->join('project_location', 'project_property.location_id = project_location.id', 'left');
        $this->db->join('marketing_agent', 'project_property.marketing_id = marketing_agent.id', 'left');
        $this->db->where('project_property.deleted', '0');

        return parent::find_by($field,$value);
    }
    
    public function count_all()
    {
        $this->db->where('project_property.deleted', '0');
        return parent::count_all();
    }
    
    function check_exists($field, $value = '', $id = 0)
    {
        if (is_array($field))
        {
            $params = $field;
            $id = $value;
        }
        else
        {
            $params[$field] = $value;
        }
        $params['id !='] = (int) $id;

        return parent::count_by($params) == 0;
    }
}

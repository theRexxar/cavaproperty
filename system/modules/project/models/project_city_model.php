<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project_city_model extends BF_Model {

	protected $table		= "project_city";
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
                            project_location.id AS id_location,
                            project_location.title AS title_location,
                            project_location.slug AS slug_location,
                            ');
        }

        $this->db->join('project_location', 'project_city.location_id = project_location.id', 'left');
        $this->db->where('project_city.deleted', '0');

        return parent::find_all();
    }
    
    public function count_all()
    {
        $this->db->where('deleted', '0');
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

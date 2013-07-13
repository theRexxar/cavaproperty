<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project_type_model extends BF_Model {

	protected $table		= "project_type";
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
                            project_category.id AS id_category,
                            project_category.title AS title_category,
                            project_category.description AS description_category,
                            project_category.slug AS slug_category,
                            ');
        }

        $this->db->join('project_category', 'project_type.category_id = project_category.id', 'left');
        $this->db->where('project_type.deleted', '0');

        return parent::find_all();
    }
    
    public function count_all()
    {
        $this->db->where('project_type.deleted', '0');
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

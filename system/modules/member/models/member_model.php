<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends BF_Model {

	protected $table		= "member";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
    
    
    public function find_all()
    {
        $this->db->where('deleted', '0');
        return parent::find_all();
    }
    
    public function find_unblock()
    {
        $this->db->where('deleted', '0');
        $this->db->where('block', 'N');
        return parent::find_all();
    }
    
    public function find_block()
    {
        $this->db->where('deleted', '0');
        $this->db->where('block', 'Y');
        return parent::find_all();
    }
    
    //----------------------------------------------
    
    public function count_all()
    {
        $this->db->where('deleted', '0');
        return parent::count_all();
    }
    
    public function count_unblock()
    {
        $this->db->where('deleted', '0');
        $this->db->where('block', 'N');
        return parent::count_all();
    }
    
    public function count_block()
    {
        $this->db->where('deleted', '0');
        $this->db->where('block', 'Y');
        return parent::count_all();
    }
    
    //----------------------------------------------
    
    public function block($id)
    {
        return $this->db->update($this->table, array('block' => 'Y'), array('id' => $id));
    }
    
    public function unblock($id)
    {
        return $this->db->update($this->table, array('block' => 'N'), array('id' => $id));
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

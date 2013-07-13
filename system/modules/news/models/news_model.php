<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends BF_Model {

	protected $table		= "news";
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

    public function find_news_by_date($year,$month)
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*');
        }

        $this->db->from('news');       
        $this->db->where('year', $year);
        $this->db->where('month', $month);   
        
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
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

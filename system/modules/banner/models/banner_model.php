<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends BF_Model {

	protected $table		= "banner";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
    
        
    public function find_all()
    {
        if (empty($this->selects))
        {
            $this->select($this->table .'.*, 
                            file.id AS file_id, 
                            file.filename AS file_name, 
                            banner_group.id AS group_id, 
                            banner_group.title AS group_title, 
                            banner_group.abbr AS group_abbr, 
                            ');
        }
        
        $this->db->join('file', 'banner.image_id = file.id', 'left');
		$this->db->join('banner_group', 'banner_group.id = banner.group_id', 'left');
        $this->db->where('banner.deleted', '0');
        
        return parent::find_all();
    } 
}

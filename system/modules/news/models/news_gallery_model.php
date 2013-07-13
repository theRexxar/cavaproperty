<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News_gallery_model extends BF_Model {

	protected $table		= "news_gallery";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
    
    
    public function delete_gallery($id)
    {
        return $this->db->delete($this->table, array($this->key => $id));
    }
}

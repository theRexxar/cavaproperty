<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_group_model extends BF_Model {

	protected $table		= "banner_group";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
    
        
    public function find_all($sort_field=null)
	{
		$result_array = parent::find_all();
		
		if (null != $sort_field) {
			$output_array = array();

			if (is_array($result_array) AND count($result_array))
			{
				foreach ($result_array as $key => $record)
				{
					$output_array[$record->$sort_field] = $record;
				}
			}
			
			$result_array = $output_array;
		}
		
		return $result_array;
	}
}

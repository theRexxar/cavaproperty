<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_files extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;
		
		// table files
		$this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("`folder_id` int(11) NOT NULL DEFAULT '0'");
		$this->dbforge->add_field("`user_id` int(11) NOT NULL DEFAULT '1'");
		$this->dbforge->add_field("`type` enum('a','v','d','i','o') COLLATE utf8_unicode_ci DEFAULT NULL");
		$this->dbforge->add_field("`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL");
		$this->dbforge->add_field("`filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL");
		$this->dbforge->add_field("`description` varchar(255) COLLATE utf8_unicode_ci NOT NULL");
		$this->dbforge->add_field("`extension` varchar(5) COLLATE utf8_unicode_ci NOT NULL");
		$this->dbforge->add_field("`mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL");
		$this->dbforge->add_field("`width` int(5) DEFAULT NULL");
		$this->dbforge->add_field("`height` int(5) DEFAULT NULL");
		$this->dbforge->add_field("`filesize` int(11) NOT NULL DEFAULT 0");
		$this->dbforge->add_field("`date_added` int(11) NOT NULL DEFAULT 0");
		$this->dbforge->add_field("`sort` int(11) NOT NULL DEFAULT 0");
		$this->dbforge->add_key("id", true);
		$this->dbforge->create_table("file");
		
		// table file_folders
		$this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("`parent_id` int(11) DEFAULT '0'");
		$this->dbforge->add_field("`slug` varchar(100) NOT NULL");
		$this->dbforge->add_field("`name` varchar(50) NOT NULL");
		$this->dbforge->add_field("`date_added` int(11) NOT NULL");
		$this->dbforge->add_field("`sort` int(11) NOT NULL DEFAULT 0");
		$this->dbforge->add_key("id", true);
		$this->dbforge->create_table("file_folders");
		
     $this->db->query("INSERT INTO {$prefix}file_folders VALUES(1, 0, 'default', 'Default Folder',".(time()-100000).",0)");

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('file');
		$this->dbforge->drop_table('file_folders');

	}
	
	//--------------------------------------------------------------------
	
}
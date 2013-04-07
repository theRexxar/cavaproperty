<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_news_gallery extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),            
			'news_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),           
			'file_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('news_gallery');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('news_gallery');

	}

	//--------------------------------------------------------------------

}
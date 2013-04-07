<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_news extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),            
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'description' => array(
				'type' => 'TEXT',
				
			),
			'author_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'image_id' => array(
				'type' => 'INT',
				'constraint' => 11,
                'null' => TRUE,
				 
			),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => '0',
			),
			'created_on' => array(
				'type' => 'datetime',
				'default' => '0000-00-00 00:00:00',
			),
			'modified_on' => array(
				'type' => 'datetime',
				'default' => '0000-00-00 00:00:00',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('news');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('news');

	}

	//--------------------------------------------------------------------

}
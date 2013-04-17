<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_banner_group extends Migration {

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
				'constraint' => 30,
				
			),
			'abbr' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				
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
		$this->dbforge->create_table('banner_group');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('banner_group');

	}

	//--------------------------------------------------------------------

}
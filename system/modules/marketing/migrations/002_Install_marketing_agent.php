<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_marketing_agent extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'email' => array(
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
		$this->dbforge->create_table('marketing_agent');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('marketing_agent');

	}

	//--------------------------------------------------------------------

}
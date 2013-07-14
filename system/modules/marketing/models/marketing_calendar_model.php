<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Marketing_calendar_model extends BF_Model {

	protected $table		= "marketing_calendar";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
    
    
    public function xfind_all()
    {
        $this->db->where('deleted', '0');        
        return parent::find_all();
    } 

    public function find_all()
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*,
                            project_property.id AS id_property,
                            project_property.title AS title_property,
                            project_property.slug AS slug_property,
                            marketing_agent.name AS name_marketing,
                            marketing_agent.phone AS phone_marketing,
                            marketing_agent.email AS email_marketing,
                            member.first_name AS first_name_member,
                            member.last_name AS last_name_member,
                            member.phone AS phone_member,
                            member.mobile_phone AS mobile_phone_member,
                            member.email AS email_member,
                            ');
        }

        $this->db->join('project_property', 'marketing_calendar.property_id = project_property.id', 'left');
        $this->db->join('marketing_agent', 'marketing_calendar.marketing_id = marketing_agent.id', 'left');
        $this->db->join('member', 'marketing_calendar.member_id = member.id', 'left');

        $this->db->where('marketing_calendar.deleted', '0');

        return parent::find_all();
    }

    public function find_by($field,$value)
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*,
                            project_property.id AS id_property,
                            project_property.title AS title_property,
                            project_property.slug AS slug_property,
                            marketing_agent.name AS name_marketing,
                            marketing_agent.phone AS phone_marketing,
                            marketing_agent.email AS email_marketing,
                            member.title AS title_member,
                            member.first_name AS first_name_member,
                            member.last_name AS last_name_member,
                            member.phone AS phone_member,
                            member.mobile_phone AS mobile_phone_member,
                            member.email AS email_member,
                            ');
        }

        $this->db->join('project_property', 'marketing_calendar.property_id = project_property.id', 'left');
        $this->db->join('marketing_agent', 'marketing_calendar.marketing_id = marketing_agent.id', 'left');
        $this->db->join('member', 'marketing_calendar.member_id = member.id', 'left');

        $this->db->where('marketing_calendar.deleted', '0');

        return parent::find_by($field,$value);
    }

    public function find_detail($id)
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*,
                            project_property.id AS id_property,
                            project_property.title AS title_property,
                            marketing_agent.name AS name_marketing,
                            member.title AS title_member,
                            member.first_name AS first_name_member,
                            member.last_name AS last_name_member,
                            member.phone AS phone_member,
                            member.mobile_phone AS mobile_phone_member,
                            member.email AS email_member,
                            member.city AS city_member,
                            ');
        }

        $this->db->join('project_property', 'marketing_calendar.property_id = project_property.id', 'left');
        $this->db->join('marketing_agent', 'marketing_calendar.marketing_id = marketing_agent.id', 'left');
        $this->db->join('member', 'marketing_calendar.member_id = member.id', 'left');

        $this->db->where('marketing_calendar.deleted', '0');

        return parent::find($id);
    }

    public function find_by_status($status)
    {
        if (empty($this->selects))
        {
            $this->db->select($this->table .'.*,
                            project_property.id AS id_property,
                            project_property.title AS title_property,
                            project_property.slug AS slug_property,
                            marketing_agent.name AS name_marketing,
                            marketing_agent.phone AS phone_marketing,
                            marketing_agent.email AS email_marketing,
                            member.first_name AS first_name_member,
                            member.last_name AS last_name_member,
                            member.phone AS phone_member,
                            member.mobile_phone AS mobile_phone_member,
                            member.email AS email_member,
                            ');
        }

        $this->db->join('project_property', 'marketing_calendar.property_id = project_property.id', 'left');
        $this->db->join('marketing_agent', 'marketing_calendar.marketing_id = marketing_agent.id', 'left');
        $this->db->join('member', 'marketing_calendar.member_id = member.id', 'left');

        $this->db->where('marketing_calendar.deleted', '0');
        $this->db->where('marketing_calendar.status', $status);

        return parent::find_all();
    }
    
    public function count_all()
    {
        $this->db->where('deleted', '0');
        return parent::count_all();
    }

    public function count_by_status($status)
    {
        $this->db->where('deleted', '0');
        $this->db->where('status', $status);
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


    public function change_status($id, $status)
    {
        return $this->db->update($this->table, array('status' => $status), array('id' => $id));
    }
}

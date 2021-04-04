<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Holiday_model extends MY_Model {

    function __construct() {
	   parent::__construct();
    }
   
    function add($data){
        if ($this->db->insert('holidayForm', $data)) {
	       return $this->db->insert_id();
	   }
	   return 0;
    }
    function getActiveUserForm($user_id, $email) {

        return $this->db->select()->where('user_id', $user_id)->where('email', $email)->where('active', 1)->get('holidayForm')->row_array();
        
    }

    function update($id, $data) {
		return $this->db->where('id', $id)->update('holidayForm', $data);
    }

    function getFormData($form_id) {
        return $this->db->where('id', $form_id)->get('holidayForm')->result_array();
    }
    
    function getNewForms() {
        return $this->db->where('active', 1)->where('send', 0)->get('holidayForm')->result_array();
    }

     
    function getFormsForManager($m_id) {
        
        $query = "SELECT * FROM `holidayform` as hf LEFT JOIN employeeRelationship as er ON hf.user_id = er.employee_id WHERE er.manager_id = $m_id AND hf.active=1 AND hf.send=0";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    function getAllForms($user) {
        return $this->db->where('user_id', $user)->get('holidayForm')->result_array();
    }
    


}

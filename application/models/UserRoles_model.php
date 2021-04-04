<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserRoles_model extends MY_Model {

    function __construct() {
	parent::__construct();
    }

    /**
     * Insert user roles seeds data
     * @param type $data1
     * @return int
     */
    function add($data1) {
	if ($this->db->insert('userRoles', $data1)) {
	    return $this->db->insert_id();
	}
	return 0;
    }

    /**
     * Delete user role
     * @param type $userId
     * @return type
     */
    function deleteUserRole($userId) {

	$this->db->where('user_id', $userId);
	return $this->db->delete('userRoles');
    }
	
	function getUserRole($userId) {
		$this->db->select('role_id');
	return $this->db->where('user_id', $userId)->get('userRoles')->row_array();
	}
}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_model extends MY_Model {

    function __construct() {
	parent::__construct();
    }
     /**
      * Get roles by hierarchy 
      * @param type $hierarchy
      * @return type
      */
    function getRoles($hierarchy) {
	return $this->db->where('hierarchy > ',$hierarchy)->get('roles')->result_array();
	
    }
    /**
     * Add roles data
     * @param type $data
     * @return int
     */
     function add($data) {
        if ($this->db->insert('roles', $data)) {
            return $this->db->insert_id();
        }
        return 0;
    }

}

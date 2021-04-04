<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends MY_Model {

    function __construct() {
	   parent::__construct();
    }
   
    function add($data){
        if ($this->db->insert('users', $data)) {
	       return $this->db->insert_id();
	   }
	   return 0;
    }

    function getUserByEmail($email) {
       return $this->db->select()->where('user_email', $email)->get('users')->row_array();
    }


}

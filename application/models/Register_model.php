<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_model extends MY_Model {

    function __construct() {
	parent::__construct();
    }
   
    function add($data) {
		
		if ($this->db->insert('users', $data)) {
			return $this->db->insert_id();
		}
		return 0;
    }

    function delete($user_id) {
        return $this->db->where('user_id', $user_id)->delete('users');
    }

    function verify_key($key) {
        $verified =  $this->db->select('confirm_email')->where('hash_pass', $key)->get('users')->row_array();
        if($verified['confirm_email'] == 0) {
            $data = array('confirm_email' => 1);
            if($this->db->where('hash_pass', $key)->update('users', $data)) {
                return true;
            }
        }else {
            return false;
        }
        
    }

}

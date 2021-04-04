<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends MY_Model {

    function __construct() {
	parent::__construct();
    }

  
    function can_login($email, $password) {
      
        $user =  $this->db->select()->where('user_email', $email)->get('users')->row_array();
      
        if($user) {
            if($user['confirm_email'] == 1) {
                $store_pass = $this->encryption->decrypt($user['user_pass']);
                if($store_pass == $password) {
                    
                   
                    return 'Successfully logged in';

                }else {
                    return 'Wrong password';
                }
            }else {
                return 'Please First verify your email address';
            }
        }else {
            return 'Wrong Email Address';
        }
    }

    

}
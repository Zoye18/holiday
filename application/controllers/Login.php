<?php

class Login extends MY_Controller {

    public $public_methods = array();

    function __construct() {
	    parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

    function index() {
        $data = array();
        $data['title'] = 'Login';
        $data['view'] = 'register/login';
        $this->load->view('layouts/login', $data);
    }

    function login() {
        
        $this->load->helper('form');
        $this->load->model('User_model');
        if($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('user_login_password', 'Password', 'trim|required');
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
            
            if ($this->form_validation->run()) { 
            
                $user_email = $this->input->post('user_email');
                $user_pass= $this->input->post('user_login_password');
                $login = $this->Login_model->can_login($user_email, $user_pass);
                if($login == 'Successfully logged in') {

                    $user = $this->User_model->getUserByEmail($user_email);
                    $user_data = array('id'=>$user['user_id'], 'email'=>$user['user_email']);
                    $_SESSION['user'] = $user_data;
                    return parent::json_output(array('code' => '1', 'message' => $login, 'user' => $user['user_id']));

                }else {

                    return parent::json_output(array('code' => '0', 'message' => $login));

                }
            }else {
          
                return parent::json_output(array('code' => '-1', 'message' => 'Validation error', 'data' => validation_errors()));
            }

        }else {
            return parent::json_output(array('code' => '0', 'message' => 'Validation error'));
        }
    }



}
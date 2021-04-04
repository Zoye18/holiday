<?php

class Register extends MY_Controller {

    public $public_methods = array();

    function __construct() {
	    parent::__construct();
        $this->load->model('Register_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }
    /**
     * Load index page
     */
    function index($user_id = null) {
        $data['title'] = 'Register';
        $data['view'] = 'register/register';
        $this->load->view('layouts/login', $data);
        if ($user_id) {
                  
            redirect(base_url('login/index'), 'refresh');
            return;
            
            
        }

    }

    public function validate() {
    
             
        $data = array();
        $this->load->helper('form');
        if ($this->input->post()) {
            

            $this->load->library('form_validation');
            $this->form_validation->set_rules('userFirstName', 'First Name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('userLastName', 'Last Name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
            $this->form_validation->set_rules('userName', 'Username', 'trim|required');
            $this->form_validation->set_rules('user_login_password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
            
            
            if ($this->form_validation->run()) {
                $user_firstName = $this->input->post('userFirstName');
                $user_lastName = $this->input->post('userLastName');
                $user_name = $this->input->post('userName');
                $user_email = $this->input->post('userEmail');
                $user_pass= $this->input->post('user_login_password');

                $hash_pass = md5(rand());
                $encrypted_pass = $this->encryption->encrypt($user_pass);
                $data = array (
                    'user_first_name' => $user_firstName,
                    'user_last_name' => $user_lastName,
                    'user_name' =>$user_name,
                    'user_email' =>$user_email,
                    'user_pass' =>$encrypted_pass,
                    'hash_pass' => $hash_pass

                );
                $user_id = $this->Register_model->add($data);

                if($user_id > 0) {
                    $subject = 'Please verify email from login';
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'pro.eu.turbo-smtp.com',
                        'smtp_port' => 587,
                        'smtp_user' => 'zorica@thegamesilo.com',
                        'smtp_pass' => 'wg2Uh6qh',
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
		            $from_email = "company@holiday_task.uk";
                    $email_to = $user_email;
                    $subject = "Email Verification";
                    $message = "<p> Dear " . $user_firstName . "This email is sent to verify your email address. Please first verify your email <a href='". base_url() . "register/verify_email/".$hash_pass ."'>here</a></p>";
                    $title = "Information";
                    //Load email library
		            $this->load->library('email', $config);
                    $this->email->from($from_email);
                    $this->email->to($email_to);
                    $this->email->subject($subject);
                    $this->email->message($message);

                    if($this->email->send()) {
                       
                        return parent::json_output(array('code' => '1', 'message' => "Check Your Email for email verification"));
                    }else {
                        $this->Register_model->delete($user_id);
                        return parent::json_output(array('code' => '-1', 'message' => "Something went wrong while sending verification email, please try again later"));
                    }

                }else {
                    return parent::json_output(array('code' => '-1', 'message' => "Something went wrong please try again later"));
                }

                

            }else {
                return parent::json_output(array('code' => '0', 'message' => 'Validation error', 'data' => validation_errors()));
            }
           

        }else {
            $this->index();
        }
    }

    public function verify_email($hash_pass){
        if($hash_pass) {
            if($this->Register_model->verify_key($hash_pass)) {
                redirect(base_url('login/index'), 'refresh');
                return;
            }else {
                return parent::json_output(array('code' => '0', 'message' => "Invalid Link"));
            }
        }
    }
	
    
	
	

}
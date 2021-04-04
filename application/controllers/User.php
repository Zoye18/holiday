<?php

class User extends MY_Controller {

    public $public_methods = array();

    function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('UserRoles_model');
		$this->load->model('Role_model');
	}
    
   

    /**
     * Post data of users edit/add
     * @return type
     */
    function addUser() {

	if ($this->input->post()) {

	    $this->load->library('form_validation');
	    if ($this->input->post('userId') == NULL || $this->input->post('userId') == '') {
		$this->form_validation->set_rules('userName', 'UserName', 'is_unique[users.userName]');
		$this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email|is_unique[users.userEmail]');
		$this->form_validation->set_rules('userLoginPassword', 'Login Password', 'trim|required');
	    } else {
		$this->form_validation->set_rules('userName', 'UserName', 'trim|required|edit_unique[users.userName.id.' . $this->input->post('userId') . ']');
		$this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email|edit_unique[users.userEmail.id.' . $this->input->post('userId') . ']');
		$this->form_validation->set_rules('userLoginPassword', 'Login Password', 'trim|required|edit_unique[users.userLoginPassword.id.' . $this->input->post('userId') . ']');
	    }
	    $this->form_validation->set_rules('fullName', 'FullName', 'trim|required');
	    $this->form_validation->set_rules('roleId', 'Role', 'trim');
	    $this->form_validation->set_rules('userContact', 'Contact No.', 'trim');

	    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	    if ($this->form_validation->run()) {
		$time_now = date('Y-m-d H:i:s');
        $this->load->library('encryption');
		$password = $this->checkPassword($this->input->post('userLoginPassword'));
			
		if($password === 0) {
			return parent::json_output(array('code' => '-1', 'message' => 'Password shoud contain 1 capital letter at least, 1 number at least and 1 special charater at least, and to be minimum 8 charaters long.'));
		}
			
		$data['userDetailsArray'] = $this->User_model->getUserById($this->input->post('userId'));
		$userInsertArray = array(
		    'userName' => $this->input->post('userName'),
		    'userLogin' => $this->input->post('userName'),
		    'userEmail' => $this->input->post('userEmail'),
		    'fullName' => $this->input->post('fullName'),
		    'userContact' => $this->input->post('userContact'),
			'userLoginPassword' => md5(md5($data['userDetailsArray']['userCreated']) . md5($password)),
			
		);
		
	
		//add user
		if ($this->input->post('userId') == '') {

		    $userInsertArray['userLoginSalt'] = md5($time_now);
		    $userInsertArray['userLoginPassword'] = md5(md5($time_now) . md5($this->input->post('userLoginPassword')));
		    $userInsertArray['userPasswordHash'] = md5(md5(md5($time_now) . $this->input->post('userLoginPassword')));
		    $userInsertArray['userSecurityHash'] = md5($time_now . $password);
		    $userInsertArray['userStatus'] = 0;
		    $userInsertArray['createdBy'] = $_SESSION['user']['id'];
		    $userInsertArray['userCreated'] = $time_now;
		    $userId = $this->User_model->add($userInsertArray);
		} else {
		    $this->User_model->editUserByUserId($this->input->post('userId'), $userInsertArray); //edit user
		    $userId = $this->input->post('userId');
		}

		//add or edit  user roles data
		if ($userId > 0) {
		    $this->UserRoles_model->deleteUserRole($userId);
		    $roleInsertArray = array(
			'userId' => $userId,
			'roleId' => $this->input->post('roleId'),
		    );
		}
		$roleId = $this->UserRoles_model->add($roleInsertArray);
			
		if ($roleId > 0) {
			
		    if ($this->input->post('userId') == '') {
				
				$this->send_validation_email($this->input->post('userEmail'), $userId, 'new');
				
				
			return parent::json_output(array('code' => '1', 'message' => 'User has been added successfully.'));
		    } else {
				if($userId == $_SESSION['user']['id']) {
					
					if($data['userDetailsArray']['userLoginPassword'] != md5(md5($data['userDetailsArray']['userCreated']) . md5($password)) ) {
						$this->send_identification_email($this->input->post('userEmail'), $userId);
					}
				}else {
					
					if($data['userDetailsArray']['userLoginPassword'] != md5(md5($data['userDetailsArray']['userCreated']) . md5($password)) ) {
						
						$this->send_validation_email($this->input->post('userEmail'),$userId, 'password');
					}
				}
				
			return parent::json_output(array('code' => '1', 'message' => 'User has been edited successfully.'));
		    }
		}
		return parent::json_output(array('code' => '0', 'message' => 'Something went wrong.'));
	    }
	    return parent::json_output(array('code' => '0', 'message' => validation_errors(), 'data' => validation_errors()));
	}
	return parent::json_output(array('code' => '-1', 'message' => 'Something went wrong.'));
    }
    
    
	
	function send_identification_email($email, $userId, $pass) {

//		 $config = Array(
//              'protocol' => 'smtp',
//              'smtp_host' => 'pro.eu.turbo-smtp.com',
//              'smtp_port' => 587,
//              'smtp_user' => 'zorica@thegamesilo.com',
//              'smtp_pass' => 'wg2Uh6qh',
//			  'mailtype' => 'html',
//		  	  'charset' => 'iso-8859-1',
//		  	  'wordwrap' => TRUE
//    	);
		$from_email = "support@alpaca-pro.uk";
        $email_to = $email;
        $from = "Identification Support";
        $title = "Information";
        $subject = "Email Validation";
        $message = '<p> This email is sent just to confirm your identity because of the changes made on your  account. Click here to 
        in</p><p><a href="'. base_url() . 'auth/login/' .$userId.'">Click here</a> </p>';
        
        //Load email library
		//$this->load->library('email', $config);
//        $this->load->library('email');
//        $this->email->from($from_email, 'Identification Support');
//        $this->email->to($email_to);
//        $this->email->subject('Email Validation');
//        $this->email->message('<p> This email is sent just to confirm your identity because of the changes made on your  account. Click here to 
//        in</p><p><a href="'. base_url() . 'auth/login/' .$userId.'">Click here</a> </p>');
        //Send mail
	   $send =  parent::send_email_curl($email_to, $subject, $title, $message);
        if($send) {
            return true;
        }else {
            return false;
        }
			
//       if($this->email->send()) {
//		   
//            return true;
//		}else{
//			return false;
//		}            
	
	}
    
	
	/**
     * Function for checking password strength
     */
    function checkPassword($pass) {
		$errors = [];
		$error = 0;

		if (strlen($pass) < 8) {
			$errors[] = "Password too short!";
			$error =1;
		}elseif (!preg_match("#[0-9]+#", $pass)) {
			$errors[] = "Password must include at least one number!";
			$error =1;
		}elseif (!preg_match("#[A-Z]+#", $pass)) {
			$errors[] = "Password must include at least one capital letter!";
			$error =1;
		}elseif( !preg_match("#\W+#", $pass) ) {
			$errors[] = "Password must include at least one symbol!";
			$error =1;
		}else {
			$errors=[];
		}

		if($error == 1) {
			return $password=0;
		}else {
			return $pass;
		}
		
	}
	
	
	/**
     * Function for checking password strength
     */
    function generatePassword() {
		
		$allowed = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@!#$%^&*';
		$digit = '123456890';
		$special = '@!#$&*%';
		$capital = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
    	$pass = array(); //remember to declare $pass as an array
    	$allowLength = strlen($allowed) - 1; //put the length -1 in cache
		
		$n = rand(0,strlen($capital) - 1);
		$pass[] = $capital[$n];
		$n = rand(0,strlen($special) - 1);
		$pass[] = $special[$n];
		$n = rand(0,strlen($digit) - 1);
		$pass[] = $digit[$n];
		
		for ($i = 0; $i < 6; $i++) {
			$n = rand(0, $allowLength);
			$pass[] = $allowed[$n];
		}
		
		return parent::json_output(array('code'=>'1', 'pass'=>implode($pass), 'message'=>'Random password was generated ')); //turn the array into a string
	}

	
	function getUserRole($userId) {
		$this->load->model('UserRoles_model');
		$res = $this->UserRoles_model->getUserRole($userId);
		return parent::json_output($res);
	}
	
	function getUser($user) {
		$this->load->model('User_model');
		$user = $this->User_model->getUser($user);
		return parent::json_output($user);
	}
	

		
	
	function getEmailRecipients() {
		if ($this->input->post()) {
			if(!empty($_POST["keyword"])) {
				$keyword = $_POST["keyword"];
				$this->load->model('User_model');
				$sender_id = $_SESSION['user']['id'];
				$users = $this->User_model->getRecipientEmails($keyword, $sender_id);
				return parent::json_output($users);
			}
		}
	}
	function getEmailRecipient($id) {
		$this->load->model('User_model');
		$user = $this->User_model->getRecipientEmail($id);
		return parent::json_output($user);
		
	}
	
	function send_validation_email($email, $userId, $info) {

		$from_email = "support@alpaca-pro.uk";
        $email_to = $email;
        $from = "Identification Support";
        $subject = "Email Validation";
        $title = "Information";
//        $this->load->library('email');
//        $this->email->from($from_email, 'Identification Support');
//        $this->email->to($email_to);
//        $this->email->subject('Email Validation');
		if($info === "new") {
            $message = '<p> This email is sent just to confirm your identity, please choose your own password. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'">Click here</a> </p>';
//			$this->email->message('<p> This email is sent just to confirm your identity, please choose your own password. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'">Click here</a> </p>');
		}elseif($info == "password") {
            $message = '<p> This email is sent just to inform that because of safety rules your account was update, please choose your own password to continue on the page. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'">Click here</a> </p>';
//			$this->email->message('<p> This email is sent just to inform that because of safety rules your account was update, please choose your own password to continue on the page. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'">Click here</a> </p>');
		}elseif($info == "reset"){
            $message = '<p> This email is sent to request change of user information (password change is required) because of safety reason. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'/'.$pass.'">Click here</a> </p>';
//			$this->email->message('<p> This email is sent to request change of user information (password change is required) because of safety reason. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'/'.$pass.'">Click here</a> </p>');
		}else{
            $message = '<p> This email is sent just to inform that because of safety rules your account was update, please choose your own password to continue on the page. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'/'.$pass.'">Click here</a></p>';
//			$this->email->message('<p> This email is sent just to inform that because of safety rules your account was update, please choose your own password to continue on the page. Thanks for registering with us</p><p><a href="'. base_url() . 'auth/confirm_login/' .$userId.'/'.$pass.'">Click here</a></p>');
		}
   
       //Send mail
	   $send =  parent::send_email_curl($email_to, $subject, $title, $message);
        if($send) {
            return true;
        }else {
            return false;
        }
			
//       if($this->email->send()) {
//		   
//            return true;
//		}else{
//			return false;
//		}            
	
	}

  
	
	
}


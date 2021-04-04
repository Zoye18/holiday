<?php

class Holiday extends MY_Controller {
 

    public $public_methods = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Holiday_model');
    }

    /**
     * Load index page
     */
    function index($user_id) {
        $data = array();
        $forms = $this->Holiday_model->getAllForms($user_id);
        $data['forms'] = $forms;
        $data['user'] = $user_id;
        $data['title'] = 'Holiday Forms';
        $data['view'] = 'holiday/list_form';
        $this->load->view('layouts/login', $data);
        
    }

    function create_form($form_id=null){
        $this->load->model('User_model');
        $data = array();
        if($form_id) {
          
            $form = $this->Holiday_model->getFormData($form_id);
            $data['form'] = $form[0];
        }

      
        $data['current_user'] = $_SESSION['user']['id'];
        $user = $this->User_model->getUserByEmail($_SESSION['user']['email']);
        $data['user'] = $user;
        $data['title'] = 'Holiday Form';
        $data['view'] = 'holiday/form';
        $this->load->view('layouts/login', $data);
    }

    function save() {
        $this->load->helper('form');
        $this->load->model('User_model');
        if($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_firstname', 'First Name', 'trim|required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('user_lastname', 'Last Name', 'trim|required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('user_phonenumber', 'Phone', 'trim|required');
            $this->form_validation->set_rules('startDate', 'Start Date', 'trim|required');
            $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');
            $this->form_validation->set_rules('startTime', 'Start Time', 'trim|required');
            $this->form_validation->set_rules('endTime', 'End Time', 'trim|required');
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
            
            if ($this->form_validation->run()) { 
                
                $first_name = $this->input->post('user_firstname');
                $last_name = $this->input->post('user_lastname');
                $user_email = $this->input->post('user_email');
                $user_phone = $this->input->post('user_phonenumber');
                $fromDate = str_replace('/', '-', $this->input->post('startDate'));
				$from_date =  date('Y-m-d', strtotime($fromDate));
				$toDate = str_replace('/', '-', $this->input->post('endDate'));
                $to_date = date('Y-m-d', strtotime($toDate));
                
                $start = $from_date . ' ' .$this->input->post('startTime');
                $end = $to_date . ' '. $this->input->post('endTime');

                $remarks = $this->input->post('user_remarks');
                $form_id = $this->input->post('form_id');
                 
                $user = $this->User_model->getUserByEmail($user_email);
                $user_form = $this->Holiday_model->getActiveUserForm($user['user_id'], $user_email);

                if($_SESSION['user']['id'] != $user['user_id'] || $_SESSION['user']['email'] != $user_email) {
                    return parent::json_output(array('code' => '0', 'message' => 'You have to login to create Holiday Leave Form'));
                }

                if($user_form) {
                    $this->Holiday_model->update($user_form['id'], array('active'=> 0));
                }

                $formData = array (
                    'user_id' => $user['user_id'],
                    'first_name'=> $first_name,
                    'last_name' => $last_name,
                    'email' => $user_email,
                    'phone_number' => $user_phone,
                    'start_date' => $start,
                    'end_date' => $end,
                    'remarks' => $remarks,
                    'active' => 1
                );
              
                if($form_id) {
                    $save_form = $this->Holiday_model->update($form_id, $formData);
                    $msg = "Your Form was successfully updated";
                }else {
                    $save_form = $this->Holiday_model->add($formData);
                    $msg = "Your Holiday Form was successfully created";
                }
                
                if($save_form > 0) {
                    return parent::json_output(array('code' => '1', 'message' => $msg, 'user' => $user['user_id']));
                }else {
                    return parent::json_output(array('code' => '0', 'message' => 'Your form was not saved, try again later'));
                }
            }else {
          
                return parent::json_output(array('code' => '-1', 'message' => 'Validation error', 'data' => validation_errors()));
            }

        }else {
            return parent::json_output(array('code' => '0', 'message' => 'Something went wrong'));
        }

    }

    function edit($id){

    }
    
    

}
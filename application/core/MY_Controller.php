<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Kolkata');
date_default_timezone_set('UTC');

function pr($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die;
}

class MY_Controller extends CI_Controller {

    public $public_methods = array();

    function __construct() {
	   parent::__construct();
	
    }

    function json_output($data) {
	   $this->output->enable_profiler(FALSE);
	   $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
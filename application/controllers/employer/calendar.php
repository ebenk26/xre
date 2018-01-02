<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Calendar';
        $this->load->view('employer/main/header');
        $this->load->view('employer/calendar');
        $this->load->view('employer/main/footer');
    }
}

?>
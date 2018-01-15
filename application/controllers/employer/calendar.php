<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) || ($roles !== $segment)){
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Inbox';
        $this->load->view('employer/main/header');
        $this->load->view('employer/inbox');
        $this->load->view('employer/main/footer');
    }
}

?>
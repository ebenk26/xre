<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class purchase_package extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Purchase Package';
        $this->load->view('employer/main/header');
        $this->load->view('employer/purchase_package');
        $this->load->view('employer/main/footer');
    }
}

?>
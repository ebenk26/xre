<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_Policy extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $header['page_title'] = 'Privacy Policy';
        $this->load->view('main/header', $header);
        $this->load->view('site/privacy_policy');
        $this->load->view('main/footer');
    }

}
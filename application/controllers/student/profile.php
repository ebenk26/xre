<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $header['page_title'] = 'Profile';
        $this->load->view('main/header', $header);
        $this->load->view('student/profile');
        $this->load->view('main/footer');
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $header['page_title'] = 'Dashboard';
        $this->load->view('student/main/header', $header);
        $this->load->view('student/calendar');
        $this->load->view('student/main/footer');
	}

}
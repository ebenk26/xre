<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Search_Result extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $header['page_title'] = 'Job Search Result';
        $this->load->view('main/header', $header);
        $this->load->view('site/search');
        $this->load->view('main/footer');
	}

}
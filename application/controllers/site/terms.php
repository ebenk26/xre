<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $header['page_title'] = 'Terms';
        $this->load->view('main/header', $header);
        $this->load->view('site/terms');
        $this->load->view('main/footer');
	}

}
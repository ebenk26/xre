<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $header['page_title'] = 'Inbox';
        $this->load->view('main/header', $header);
        $this->load->view('student/inbox');
        $this->load->view('main/footer');
	}

}
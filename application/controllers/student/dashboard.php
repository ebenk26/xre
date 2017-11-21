<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Dashboard';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/dashboard');
        $this->load->view('student/main/footer');
	}

}
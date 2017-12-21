<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Dashboard';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $complement['user_profile'] = $get_user_profile;
        $complement['job_post'] = $this->employer_model->get_job_post($id);
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/dashboard',$complement);
        $this->load->view('employer/main/footer');
	}
}
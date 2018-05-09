<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== $segment){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Gallery';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/gallery');
        $this->load->view('employer/main/footer');
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Search Result';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $word = $this->input->post('query');
        $search['search_result'] = $this->job_model->get_job($word);
        $search['keyword'] = $word;
        $roles = $this->session->userdata('roles');
        $this->load->view($roles.'/main/header', $profile);
        $this->load->view($roles.'/search', $search);
        $this->load->view($roles.'/main/footer');

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        if(empty($countryCheck)){
            show_404();
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
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/search', $search);
        $this->load->view('student/main/footer');

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Search_Result extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('job_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $keyword = $this->input->post('query');
        $search['keyword'] = $keyword;
        $search['search_result'] = $this->job_model->get_job($keyword);
        $search['page_title'] = 'Job Search Result';
        $search['industry'] = $this->job_model->get_array('industries', 'name', 'asc');
        $search['employment_type'] = $this->job_model->get_array('employment_types', 'name', 'asc');
        $search['position_levels'] = $this->job_model->get_array('position_levels', 'id', 'asc');
        $search['year_of_experiences'] = $this->job_model->get_array('year_of_experience', 'id', 'asc');
        $this->load->view('site/job_search', $search);
	}

    public function filter_get(){
        $id = $this->input->post('id');
        $table = $this->input->post('table');
    }

}
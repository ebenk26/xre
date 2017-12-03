<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications_history extends CI_Controller {
    
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
        $profile['page_title'] = 'Applications History';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $applications['applications_history'] = $this->job_model->get_applied_job();
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/history', $applications);
        $this->load->view('student/main/footer');
	}

    public function withdraw(){
        $job_id = $this->input->post('job_id');
        $result = $this->job_model->withdraw_job($job_id);
        if ($result == true) {
            $this->session->set_flashdata('msg_success', 'Success withdraw from the job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed withdraw from the job');
        }
        redirect(base_url().'student/applications_history/');
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Dashboard';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $job['job_positions'] = $this->student_model->get_all_job($id);
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/dashboard', $job);
        $this->load->view('student/main/footer');
	}

    public function applied(){
        $id = $this->session->userdata('id');
        $job_id = $this->input->post('job_id');
        $jobs = array(  'user_id'=> $id,
                        'job_position_id' => $job_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 'new');
        $apply_job = $this->job_model->apply($jobs);
        if ($apply_job == true) {
            $this->session->set_flashdata('msg_success', 'Success apply dream job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed apply your dream job');
        }
        redirect(base_url().'student/dashboard/');
    }

}
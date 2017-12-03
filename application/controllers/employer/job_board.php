<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Board extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $header['page_title'] = 'Job Board';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $complement['employment_type'] = $this->employer_model->get_employment();
        $complement['position_levels'] = $this->employer_model->get_position();
        $complement['year_of_experience'] = $this->employer_model->get_year_of_experience();
        $complement['job_post'] = $this->employer_model->get_job_post($id);
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/job_board', $complement);
        $this->load->view('employer/main/footer');
	}

    public function post(){
        $jobPost = array('name' => $this->input->post('job_position_name'),
                         'user_id' => $this->session->userdata('id'),
                         'position_level_id' => $this->input->post('employmentLevel'),
                         'employment_type_id' => $this->input->post('employmentType'),
                         'years_of_experience' => $this->input->post('yearOfExperience'),
                         'job_description' => $this->input->post('jobDescription'),
                         'qualifications' => $this->input->post('jobRequirement'),
                         'other_requirements' => $this->input->post('niceToHave'),
                         'additional_info'=> $this->input->post('additionalInfo'),
                         'status'=> 'post',
                         'expiry_date'=> date('Y-m-d', strtotime("+30 days")),
                         'created_at'=> date('Y-m-d H:i:s'),
                         'updated_at' => date('Y-m-d H:i:s')
                         );
        $postJob = $this->employer_model->job_post($jobPost);
        if ($postJob == true) {
            $this->session->set_flashdata('msg_success', 'Success post job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed post data');
        }
        redirect(base_url().'employer/job_board/');
    }

    public function update(){
        $jobPost = array('name' => $this->input->post('title'),
                         'id' => $this->input->post('job_id'),
                         'user_id' => $this->session->userdata('id'),
                         'position_level_id' => $this->input->post('employment_Level'),
                         'employment_type_id' => $this->input->post('employment_Type'),
                         'years_of_experience' => $this->input->post('year_Of_Experience'),
                         'job_description' => $this->input->post('job_Desc'),
                         'qualifications' => $this->input->post('job_Requirement'),
                         'other_requirements' => $this->input->post('nice_To_Have'),
                         'additional_info'=> $this->input->post('additional_Info'),
                         'status'=> 'post',
                         'updated_at' => date('Y-m-d H:i:s')
                         );
        $editJob = $this->employer_model->job_edit($jobPost);
        if ($editJob == true) {
            $this->session->set_flashdata('msg_success', 'Success edit job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed edit job');
        }
        redirect(base_url().'employer/job_board/');
    }

    public function delete(){
        $id = $this->input->post('post_id');
        $deleteJob = $this->employer_model->job_delete($id);
        if ($deleteJob == true) {
            $this->session->set_flashdata('msg_success', 'Success delete job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed delete job');
        }
        redirect(base_url().'employer/job_board/');
    }

}
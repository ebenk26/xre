<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications_history extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck)){
            redirect(base_url());
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
		
		$this->db->set('number_of_candidate', 'number_of_candidate-1', FALSE);
		$this->db->where('id', $job_id);
		$this->db->update('job_positions');
		
        $result = $this->job_model->withdraw_job($job_id);
        if ($result == true) {
            $this->session->set_flashdata('msg_success', 'Success withdraw from the job');

			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Withdraw Job Vacancy Application",
						'icon' 			=> "fa-undo",
						'label' 		=> "danger",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
			
        }else{
            $this->session->set_flashdata('msg_error', 'Failed withdraw from the job');
        }
        redirect(base_url().'student/applications_history/');
    }

    public function accept_invitation(){
        $job_id = $this->input->post('job_id');
        $session_id = $this->input->post('session_id');
        $employer_id = $this->input->post('employer_id');
        $where = array( 'job_id'=>$job_id,
                        'session_id' => $session_id,
                        'employer_id' => $employer_id);
        $data = array('status' => 'accept');

        $update = $this->global_model->update('interview_schedule_user', $where, $data);
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Accept Interview Invitation",
					'icon' 			=> "fa-calendar-check-o",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'student/calendar/');

    }

    public function reject_invitation(){
        $job_id = $this->input->post('job_id');
        $session_id = $this->input->post('session_id');
        $employer_id = $this->input->post('employer_id');
        $where = array( 'job_id'=>$job_id,
                        'session_id' => $session_id,
                        'employer_id' => $employer_id);
        $data = array('status' => 'reject');

        $this->global_model->update('interview_schedule_user', $where, $data);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Reject Interview Invitation",
					'icon' 			=> "fa-calendar-times-o",
					'label' 		=> "danger",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'student/calendar/');

    }

}
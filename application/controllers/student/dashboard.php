<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) || ($roles !== $segment)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Dashboard';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $job['last_logged_in'] = $this->student_model->get_user_history($id);
		$job['job_positions'] = $this->student_model->get_all_job($id);
		if(!empty($job['last_logged_in'][count($job['last_logged_in'])-2]['user_history'])){
			$job['job_positions_new'] 	= $this->student_model->get_all_new_job($job['last_logged_in'][count($job['last_logged_in'])-2]['user_history']);
			$job['new_join'] 			= $this->student_model->get_new_join($job['last_logged_in'][count($job['last_logged_in'])-2]['user_history']);
		}else{
			$job['job_positions_new'] 	= $this->student_model->get_all_new_job("1970-01-01");
			$job['new_join'] 			= $this->student_model->get_new_join("1970-01-01");
		}
		
        $job['users'] = $get_user_profile;
		
		//get rate
		//$this->db->select_average('rate as rate');
		$this->db->select('AVG(rate) as rate');
		$this->db->where('user_id', $id);
		$query = $this->db->get('user_rate');
		$rate = $query->row()->rate;
		$job['rate'] = round($rate, 2);
		
		//get upcoming interview
		$job['upcoming_interview'] 	= $this->student_model->get_upcoming_interview($id);
		
		//get recent activities
		$job['recent_activities'] 	= $this->user_model->get_recent_activities();
		
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/dashboard', $job);
        $this->load->view('student/main/footer');
	}

    public function applied(){
        $id 			= $this->session->userdata('id');
        $job_id 		= base64_decode($this->input->post('job_id'));
		$job_id_code 	= rtrim(base64_encode($job_id), '=');
        
		$this->db->select('*');
		$this->db->from('applieds');
		$this->db->where('user_id', $id);
		$this->db->where('job_position_id', $job_id);
		$query = $this->db->get();
		$ada = $query->num_rows();
		
		if($ada > 0){
			$apply_job = false;
		}else{
			$this->db->set('number_of_candidate', 'number_of_candidate+1', FALSE);
			$this->db->where('id', $job_id);
			$this->db->update('job_positions');
			
			$jobs = array(  'user_id'=> $id,
							'job_position_id' => $job_id,
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
							'status' => 'APPLIED',
							'employer_message_status' => 'NEW',
							'job_seeker_message_status' => 'NEW',
							'coverletter' => $this->input->post('coverletter'),
							);
			$apply_job = $this->job_model->apply($jobs);
		}
		
        if ($apply_job == true) {
            $this->session->set_flashdata('msg_success', 'Success apply dream job'); 
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Apply Job Vacancy",
						'icon' 			=> "fa-briefcase",
						'label' 		=> "info",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }else{
            $this->session->set_flashdata('msg_error', 'Failed apply your dream job');
        }
        redirect(base_url().'job/details/'.$job_id_code);
    }

}
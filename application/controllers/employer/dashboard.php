<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) || ($roles !== $segment)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Dashboard';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $complement['user_profile'] = $get_user_profile;
        $complement['job_post'] = $this->employer_model->get_job_post($id);
		$complement['interview_session'] = $this->global_model->get_where('interview_schedule', array('job_id'=>$job_id));
        $calendar_footer['invitation'] = json_encode($this->employer_model->get_interview_invitation($id));
		$this->db->select('*');
		$this->db->from('blogs');
		//$this->db->order_by('number_of_view', 'DESC');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		$complement['article'] = $query->result();
		
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/dashboard',$complement);
        $this->load->view('employer/main/footer', $calendar_footer);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Candidate';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['profile_completion'] = $this->employer_model->get_profile_completion($profile);
        $segment = $this->uri->segment(URI_SEGMENT_DETAIL);
        $job_id = base64_decode($segment);
        $complement['job'] = $this->global_model->get_by_id('job_positions', array('id'=>$job_id));
        $complement['candidates'] = $this->employer_model->get_all_candidate($job_id);
        $complement['shortlisted'] = $this->get_shortlisted_candidate($job_id);
        $complement['job_id'] = $segment;
        $complement['interview'] = $this->global_model->get_by_id('interview_schedule', array('job_id' => $job_id));
        $complement['invitation'] = $this->employer_model->get_interview_invitation($id);
        $calendar_footer['invitation'] = json_encode($this->employer_model->get_interview_invitation($id));
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/candidate',$complement);
        $this->load->view('employer/main/footer',$calendar_footer);
    }

    function get_shortlisted_candidate($job_id){
        $candidates = $this->employer_model->get_shortlisted_candidate($job_id);
        return $candidates;
    }

    function add_session(){
        $job_id = base64_decode($this->input->post('job_id'));

        $start = explode(' - ', $this->input->post('start_date'));
        $start_date = date('Y-m-d',strtotime(current($start)));
        $start_hour = date('H:i:s', strtotime(end($start)));
        $start_date_hour = implode(' ', array($start_date, $start_hour));

        $end = explode(' - ', $this->input->post('end_date'));
        $end_date = date('Y-m-d',strtotime(current($end)));
        $end_hour = date('H:i:s', strtotime(end($end)));
        $end_date_hour = implode(' ', array($end_date, $end_hour));

        $session = array('job_id'=>$job_id,
                        'title' => $this->input->post('title'), 
                        'start_date'=> date('Y-m-d H:i:s', strtotime($start_date_hour)),
                        'end_date'=> date('Y-m-d H:i:s', strtotime($end_date_hour)),
                        'description'=> $this->input->post('description'));
        $this->global_model->create('interview_schedule', $session);
        redirect(base_url().'job/candidate/'.rtrim(base64_encode($job_id),'='));
    }

    function edit_session(){
        $job_id = base64_decode($this->input->post('job_id'));

        $start = explode(' - ', $this->input->post('start_date'));
        $start_date = date('Y-m-d',strtotime(current($start)));
        $start_hour = date('H:i:s', strtotime(end($start)));
        $start_date_hour = implode(' ', array($start_date, $start_hour));

        $end = explode(' - ', $this->input->post('end_date'));
        $end_date = date('Y-m-d',strtotime(current($end)));
        $end_hour = date('H:i:s', strtotime(end($end)));
        $end_date_hour = implode(' ', array($end_date, $end_hour));
        $id = $this->input->post('id');
        $session = array('job_id'=>$job_id,
                        'title' => $this->input->post('title'), 
                        'start_date'=> date('Y-m-d H:i:s', strtotime($start_date_hour)),
                        'end_date'=> date('Y-m-d H:i:s', strtotime($end_date_hour)),
                        'description'=> $this->input->post('description'));
        $this->global_model->update('interview_schedule', array('id' => $id ) ,$session);
        redirect(base_url().'job/candidate/'.rtrim(base64_encode($job_id),'='));
    }

    function invitation(){
        
    }

}

?>
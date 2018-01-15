<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {
    
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
    	$profile['page_title'] = 'Candidate';
        $id = $this->session->userdata('id');
        $segment = $this->uri->segment(URI_SEGMENT_DETAIL);
        $job_id = base64_decode($segment);
        $get_user_profile = $this->employer_model->get_candidate($job_id);
        $complement['user_profile'] = $get_user_profile;
        $complement['job_post'] = $this->employer_model->get_job_post($id);
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/candidate',$complement);
        $this->load->view('employer/main/footer');
    }
}

?>
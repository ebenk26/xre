<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Candidate';
        $id = $this->session->userdata('id');
        $job_id = $this->uri->segment(3);
        $get_user_profile = $this->employer_model->get_candidate($id);
        $complement['user_profile'] = $get_user_profile;
        $complement['job_post'] = $this->employer_model->get_job_post($id);
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/candidate',$complement);
        $this->load->view('employer/main/footer');
    }
}

?>
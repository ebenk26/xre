<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
		$this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
    }
    
    public function index(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($roles && $this->session->userdata('id'))){
            redirect(base_url());
        }
        
        $header['page_title'] = 'Inbox';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $calendar['invitation'] = $this->student_model->get_interview_invitation($id);
        $this->load->view('student/main/header', $profile);
        $this->load->view('administrator/inbox_list',$profile);
        $this->load->view('student/main/footer', $calendar);
	}
}
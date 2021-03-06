<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== $segment){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Calendar';
        $id = $this->session->userdata('id');
        $roles = $this->session->userdata('roles');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['language']       = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $calendar['invitation'] = $this->student_model->get_interview_invitation($id);
        $calendar_footer['invitation'] = json_encode($this->student_model->get_interview_invitation($id));
        $this->load->view($roles.'/main/header', $profile);
        $this->load->view($roles.'/calendar', $calendar);
        $this->load->view($roles.'/main/footer', $calendar_footer);
	}

}
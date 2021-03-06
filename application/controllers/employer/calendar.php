<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Calendar';
		$id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $profile['user_profile'] = $get_user_profile;
        $calendar['invitation'] = $this->employer_model->get_interview_invitation($id);
        $calendar_footer['invitation'] = json_encode($this->employer_model->get_interview_invitation($id));
		$this->load->view('employer/main/header', $profile);
        $this->load->view('employer/calendar', $calendar);
        $this->load->view('employer/main/footer', $calendar_footer);
    }
}

?>
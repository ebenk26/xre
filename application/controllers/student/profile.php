<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        if(empty($countryCheck)){
            show_404();
        }
    }
    
    public function index(){
        $header['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $profile['user_profile'] = $this->student_model->get_user_profile($id);
        $this->load->view('student/main/header', $header);
        $this->load->view('student/profile', $profile);
        $this->load->view('student/main/footer');
	}

    public function post(){
        
        $profile = array(
                'gender' => $this->input->post('gender'),
                'date_of_birth' => $this->input->post('DOB'),
                'occupation' => $this->input->post('current'),
                'contact_number' => $this->input->post('phone'),
                'user_id'=> $this->session->userdata('id'),
                'location'=> $this->input->post('country')
            );
        $this->student_model->profile_post($profile);
        return $profile;
    }

}
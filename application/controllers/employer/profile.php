<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile_form['industries'] = $this->employer_model->get_industries();
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/profile', $profile_form);
        $this->load->view('employer/main/footer');
	}

    function edit_profile(){
        $social = $this->input->post('group-b');
        $id = $this->session->userdata('id');
        $check_number_of_social_link = $this->employer_model->check_social_link($id);
        if (count($social) < $check_number_of_social_link) {
            foreach ($social as $key => $value) {
                $this->employer_model->post_social($social);
            }
        }
        
        $id = $this->session->userdata('id');
        $profile = array('company_name' => $this->input->post('company_name'),
                         'company_registration_number' => $this->input->post('company_registration_number'),
                         'company_industry_id' => $this->input->post('industry'),
                         'company_description' => $this->input->post('about_company'),
                         'spoken_language' => $this->input->post('language'),
                         'url' => $this->input->post('corporate_website'));
        $checkAvailabilityProfile = $this->employer_model->check_availability_profile($id);
        if ($checkAvailabilityProfile) {
            $this->employer_model->edit_profile($profile);
        }else{
            $this->employer_model->add_profile($profile);
        }
    }

}
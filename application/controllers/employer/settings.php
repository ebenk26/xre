<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) || ($roles !== $segment)){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Setting';
        $where = array('user_id' => $this->session->userdata('id'));
        $setting['settings'] = $this->global_model->get_by_id('user_profiles', $where);
        $this->load->view('employer/main/header');
        $this->load->view('employer/setting', $setting);
        $this->load->view('employer/main/footer');
    }

    public function change_company_name(){
        $data = array('company_name' => $this->input->post('company_name'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        redirect(base_url().'employer/settings');
    }

    public function change_person_in_charge(){
        $data = array('contact_person' => $this->input->post('person_in_charge'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        redirect(base_url().'employer/settings');
    }
}

?>
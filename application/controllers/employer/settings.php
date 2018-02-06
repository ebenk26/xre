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
        $id = $this->session->userdata('id');
        $where = array('user_id' => $this->session->userdata('id'));
        $setting['settings'] = $this->global_model->get_by_id('user_profiles', $where);
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/setting', $setting);
        $this->load->view('employer/main/footer');
    }

    public function change_company_name(){
        $data = array('company_name' => $this->input->post('company_name'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        $this->session->set_userdata('name', $this->input->post('company_name'));
        redirect(base_url().'employer/settings');
    }

    public function change_person_in_charge(){
        $pic = array('pic_name' => $this->input->post('pic_name'),
                     'pic_position' => $this->input->post('pic_position'),
                     'pic_email' => $this->input->post('pic_email'));

        $data = array('contact_person' => json_encode($pic));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        redirect(base_url().'employer/settings');
    }
}

?>
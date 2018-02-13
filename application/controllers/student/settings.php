<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
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
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $settings['user_bios'] = $this->global_model->get_by_id('student_bios', array('user_id'=>$id));
        $settings['user'] = $this->global_model->get_by_id('users', array('id'=>$id));
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/setting', $settings);
        $this->load->view('student/main/footer');
    }

    public function change_fullname(){
        $data = array('fullname' => $this->input->post('fullname'));
        $where = array('id' => $this->session->userdata('id'));
        $this->global_model->update('users', $where, $data);
        $this->session->set_userdata('name', $this->input->post('fullname'));
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Full Name",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'student/settings');
    }

    public function change_phone_number(){
        $data = array('contact_number' => $this->input->post('contact_number'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('student_bios', $where, $data);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Phone Number",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'student/settings');
    }

    public function changeSearchableDetail(){
        $data = array('searchable_detail' => $this->input->post('status'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('student_bios', $where, $data);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Privacy Setting",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'student/settings');
    }

    public function changeSearchable(){
        $data = array('searchable' => $this->input->post('status'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('student_bios', $where, $data);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Privacy Setting",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'student/settings');
    }
}

?>
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

        $profile['user_profile'] 		= $get_user_profile;
        $profile['percent'] 			= $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $settings['user_bios'] 			= $this->global_model->get_by_id('student_bios', array('user_id'=>$id));
        $settings['user'] 				= $this->global_model->get_by_id('users', array('id'=>$id));
        $settings['countries'] 			= $this->student_model->get_array('countries', 'name');
        $settings['industries'] 		= $this->student_model->get_array('industries', 'name');
        $settings['employment'] 		= $this->student_model->get_array('employment_types', 'name');
        $settings['job_preferences'] 	= $this->global_model->get_by_id('job_preferences', array('user_id'=>$this->session->userdata('id')));
        $profile['language']   = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $settings['currency'] 			= $this->global_model->get_by_id('forex', array('country_id'=>$_COOKIE['country_id']));
        
        $this->load->view('jobseeker/main/header', $profile);
        $this->load->view('jobseeker/setting', $settings);
        $this->load->view('jobseeker/main/footer');
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
		
        redirect(base_url().'jobseeker/settings');
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
		
        redirect(base_url().'jobseeker/settings');
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
		
        redirect(base_url().'jobseeker/settings');
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
		
        redirect(base_url().'jobseeker/settings');
    }

    public function changeJobPreferences(){
        $data = array(
        				'user_id' 				=> $this->session->userdata('id'),
        				'keywords' 				=> $this->input->post('keywords'),
        				'work_location' 		=> $this->input->post('work_location') != NULL ? implode(';', $this->input->post('work_location')) : '',
        				'salary_range' 			=> $this->input->post('range_min') != NULL ? $this->input->post('range_min').'-'.$this->input->post('range_max') : '',
        				'position_level' 		=> $this->input->post('position_level') != NULL ? implode(';', $this->input->post('position_level')) : '',
        				'years_of_experience' 	=> $this->input->post('years_of_experience') != NULL ? implode(';', $this->input->post('years_of_experience')) : '',
        				'qualifications' 		=> $this->input->post('qualifications'),
        				'employment_type' 		=> $this->input->post('employment_type') != NULL ? implode(';', $this->input->post('employment_type')) : ''
        			);
        $where = array('user_id' => $this->session->userdata('id'));

        $checkData = $this->global_model->get_by_id('job_preferences', $where);

        if(count($checkData) > 0)
        {
        	$data['created_by'] = $this->session->userdata('id');

	        $where = array('id' => $checkData->id);

        	$this->global_model->update('job_preferences', $where, $data);
        }
        else
        {
        	$data['updated_by'] 	= $this->session->userdata('id');
        	$data['updated_date'] 	= date('Y-m-d H:i:s');
        	
        	$this->global_model->create('job_preferences', $data);
        }
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Job Preferences Setting",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'jobseeker/settings');
    }
}

?>
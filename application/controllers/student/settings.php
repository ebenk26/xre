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
        $roles = $this->session->userdata('roles');
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
        
        $this->load->view($roles.'/main/header', $profile);
        $this->load->view($roles.'/setting', $settings);
        $this->load->view($roles.'/main/footer');
    }

    public function change_fullname(){
        $roles = $this->session->userdata('roles');
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
		
        redirect(base_url().$roles.'/settings');
    }

    public function change_phone_number(){
        $data = array('contact_number' => $this->input->post('contact_number'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('student_bios', $where, $data);
		$roles = $this->session->userdata('roles');
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
		
        redirect(base_url().$roles.'/settings');
    }

    public function changeSearchableDetail(){
        $data = array('searchable_detail' => $this->input->post('status'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('student_bios', $where, $data);
		$roles = $this->session->userdata('roles');
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
		
        redirect(base_url().$roles.'/settings');
    }

    public function changeSearchable(){
        $data = array('searchable' => $this->input->post('status'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('student_bios', $where, $data);
		$roles = $this->session->userdata('roles');
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
		
        redirect(base_url().$roles.'/settings');
    }

    public function changeJobPreferences(){
        $data = array(
        				'user_id' 				=> $this->session->userdata('id'),
        				'keywords' 				=> $this->input->post('keywords') != NULL ? ','.$this->input->post('keywords').',' : NULL,
        				'work_location' 		=> !empty($this->input->post('work_location')) && $this->input->post('cbLocation') != FALSE ? ';'.implode(';', $this->input->post('work_location')).';' : '',
        				'salary_range' 			=> !empty($this->input->post('range_min')) && $this->input->post('cbSalaryRange') != FALSE ? $this->input->post('range_min').'-'.$this->input->post('range_max') : 0,
        				'position_level' 		=> !empty($this->input->post('position_level')) && $this->input->post('cbPositionLevel') != FALSE ? ';'.implode(';', $this->input->post('position_level')).';' : NULL,
        				'years_of_experience' 	=> !empty($this->input->post('years_of_experience')) && $this->input->post('cbYearOfExperience') != FALSE ? ';'.implode(';', $this->input->post('years_of_experience')).';' : NULL,
        				'qualifications' 		=> !empty($this->input->post('qualifications')) && $this->input->post('cbQualification') != FALSE ? ','.$this->input->post('qualifications').',' : NULL,
        				'employment_type' 		=> !empty($this->input->post('employment_type')) && $this->input->post('cbJobType') != FALSE ? ';'.implode(';', $this->input->post('employment_type')).';' : NULL
        			);
        $where = array('user_id' => $this->session->userdata('id'));

        $checkData = $this->global_model->get_by_id('job_preferences', $where);

        if(count($checkData) > 0)
        {
            $data['updated_by']     = $this->session->userdata('id');
            $data['updated_date']   = date('Y-m-d H:i:s');

	        $where = array('id' => $checkData->id);

        	$this->global_model->update('job_preferences', $where, $data);
        }
        else
        {
            $data['created_by'] = $this->session->userdata('id');
        	
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
		
        redirect(base_url().$roles.'/settings#tab_job');
    }

    public function postReferral(){
        $voucher = $this->input->post('referral');
        $checkVoucherExist = $this->global_model->get_where('voucher', array('code' => $voucher));
        if (empty($voucher)) {
            $this->session->set_flashdata('msg_failed', 'Please input Referral Code');
        }else{
            if (!empty($checkVoucherExist)) {
                
                $this->global_model->update('student_bios', array('user_id' => $this->session->userdata('id')), array('referral_code' => $voucher ));
                $this->global_model->create('voucher_user', array('voucher_id' => $checkVoucherExist[0]['id'], 'user_id' => $this->session->userdata('id')));
                //BEGIN : set recent activities
                $data = array(
                            'user_id'       => $this->session->userdata('id'),
                            'ip_address'    => $this->input->ip_address(),
                            'activity'      => "Insert Referral code",
                            'icon'          => "fa-edit",
                            'label'         => "success",
                            'created_at'    => date('Y-m-d H:i:s'),
                        );
                setRecentActivities($data);
                //END : set recent activities
                $this->session->set_flashdata('msg_success', 'Success insert referral code');
            }else{
                $this->session->set_flashdata('msg_failed', 'Referral code not exist');
            }
        }
        redirect(base_url().$roles.'/settings');
    }
}

?>
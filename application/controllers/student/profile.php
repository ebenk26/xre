<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        //date_default_timezone_set('Asia/Jakarta');
		$this->load->model('student_model');
        $this->load->model('employer_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);

    }
    
    public function index(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(($roles !== $segment)){
            redirect(base_url());
        }
        $profile['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['languages'] = $this->student_model->get_array('language', 'name', 'asc');
        $profile['employment_types'] = $this->student_model->get_array('employment_types', 'id', 'asc');
        $profile['industries'] = $this->student_model->get_array('industries', 'id', 'asc');
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $profile['language']   = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $this->load->view($roles.'/main/header', $profile);
        $this->load->view($roles.'/profile', $profile);
        $this->load->view($roles.'/main/footer');
	}

    public function post(){
        //IF NOT EMPTY PROFILE PICTURE
        $roles = $this->session->userdata('roles');
        if(!empty($_FILES['profile_photo']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $checkImage = $this->student_model->checkImageExist($userImageID);
            $tempFile = $_FILES['profile_photo']['tmp_name'];        
            $targetPath = "./assets/img/".$roles;

            $path = pathinfo($_FILES['profile_photo']['name']);
            $ext = $path['extension'];
            $profile_photo = 'profile_photo_'.$this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$profile_photo;
            if (isset($checkImage)) {

                // unlink("./assets/img/student/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{
                move_uploaded_file($tempFile,$targetFile);
            }
        }else{
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $userImage = $this->student_model->checkImageExist($userImageID);
            $profile_photo = isset($userImage['name']) ? $userImage['name'] : 'profile-pic.png';
        }

        //IF NOT EMPTY HEADER PICTURE
        if(!empty($_FILES['header_photo']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'header_photo');
            $checkImage = $this->student_model->checkImageExist($userImageID);
            $tempFile = $_FILES['header_photo']['tmp_name'];        
            $targetPath = "./assets/img/".$roles;

            $path = pathinfo($_FILES['header_photo']['name']);
            $ext = $path['extension'];
            $header_photo = 'header_photo_'.$this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$header_photo;
            if (isset($checkImage)) {

                // unlink("./assets/img/student/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{
                move_uploaded_file($tempFile,$targetFile);
            }
        }else{
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'header_photo');
            $userImage = $this->student_model->checkImageExist($userImageID);
            $header_photo = isset($userImage['name']) ? $userImage['name'] : '';
        }
		
        //YOUTUBE LINK
		$youtubelink = $this->input->post('youtubelink');

		if (!filter_var($youtubelink, FILTER_VALIDATE_URL)) {
			$youtubelink = "";
		}else{
			//cek apakah link youtube atau tidak
			if (strpos($youtubelink, 'youtube.com') !== false) {
				$youtubelink = str_replace("watch?v=","embed/",$youtubelink);
			}else{
				$youtubelink = "";
			}
		}

        $profile = array(
            'student_name' => $this->input->post('fullname'),
            'preferences_name' => $this->input->post('student_name'),
            'gender' => $this->input->post('gender'),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('DOB'))),
            'contact_number' => $this->input->post('phone'),
            'user_id'=> $this->session->userdata('id'),
            'country'=> $this->input->post('country'),
            'quote'=> $this->input->post('quotes'),
            'summary'=> $this->input->post('summary'),
            'youtubelink'=> $youtubelink,
            'address' => $this->input->post('address'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'occupation' => $this->input->post('occupation'),
            'postcode' => $this->input->post('post_code'),
            'expected_salary' => $this->input->post('expected_salary'),
            'profile_photo' =>  $profile_photo,
            'header_photo' =>  $header_photo,
            'language' => $this->input->post('group-b'),
            'reference' => $this->input->post('group-r')
        );
        $this->student_model->profile_post($profile);
        $this->session->set_userdata('name', $this->input->post('fullname'));
        $this->session->set_userdata('img_profile', base64_encode($profile_photo));
		$this->session->set_flashdata('tab_student', 'tab_overview');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Update Profile Information",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile/');
    }

    public function add_education(){
        $roles = $this->session->userdata('roles');
        if ($this->input->post('current_date') == 'on') {
            $education = array( 'university_name'=> $this->input->post('university_name'),
                            'qualification_level'=> $this->input->post('qualification_level'),
                            'degree_name'=> $this->input->post('field_of_study'),
                            'start_date'=> date('Y-m-d', strtotime($this->input->post('from'))),
                            'end_date'=> '0000-00-00',
                            'degree_description'=>$this->input->post('academics_description'),
                            'user_id' => $this->session->userdata('id')
                            );
        }else{                
            $education = array( 'university_name'=> $this->input->post('university_name'),
                                'qualification_level'=> $this->input->post('qualification_level'),
                                'degree_name'=> $this->input->post('field_of_study'),
                                'start_date'=> date('Y-m-d', strtotime($this->input->post('from'))),
                                'end_date' => date('Y-m-d', strtotime($this->input->post('until'))),
                                'degree_description'=>$this->input->post('academics_description'),
                                'user_id' => $this->session->userdata('id')
                                );
        }
        $table = 'academics';
        $result = $this->student_model->add($education, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Education data added') : $this->session->set_flashdata('msg_failed', 'Education data failed to update');
		
		$this->session->set_flashdata('tab_student', 'tab_education');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Add Education",
					'icon' 			=> "fa-plus",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');
    }

    public function edit_education(){
        $roles = $this->session->userdata('roles');
        if ($this->input->post('current_date') == 'on') {
            $education = array( 'university_name'=> $this->input->post('university_name'),
                            'qualification_level'=> $this->input->post('qualification_level'),
                            'degree_name'=> $this->input->post('field_of_study'),
                            'start_date'=> date('Y-m-d', strtotime($this->input->post('from'))),
                            'end_date'=> '0000-00-00',
                            'degree_description'=>$this->input->post('academics_description'),
                            'id' => $this->input->post('academic_id'),
                            'user_id' => $this->session->userdata('id')
                            );
        }else{
            $education = array( 'university_name'=> $this->input->post('university_name'),
                            'qualification_level'=> $this->input->post('qualification_level'),
                            'degree_name'=> $this->input->post('field_of_study'),
                            'start_date'=> date('Y-m-d', strtotime($this->input->post('from'))),
                            'end_date' => date('Y-m-d', strtotime($this->input->post('until'))),
                            'degree_description'=>$this->input->post('academics_description'),
                            'id' => $this->input->post('academic_id'),
                            'user_id' => $this->session->userdata('id')
                            );
        }
        
        $table = 'academics';
        $result = $this->student_model->update($education, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Education data updated') : $this->session->set_flashdata('msg_failed', 'Education data failed to update');

		$this->session->set_flashdata('tab_student', 'tab_education');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Edit Education",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');
        
    }

    public function add_experience(){
        $roles = $this->session->userdata('roles');
        $startYear   = date('Y',strtotime($this->input->post('start_date')));
        $endYear     = ($this->input->post('current_date') == 'on') ? date('Y') : date('Y',strtotime($this->input->post('end_date')));
        $startMonth  = date('m',strtotime($this->input->post('start_date')))/12;
        $endMonth    = ($this->input->post('end_date') == 'on') ? date('m') : date('m',strtotime($this->input->post('end_date')))/12;

        $startExp   = $startYear + $startMonth;
        $endExp     = $endYear + $endMonth;

        $YoE        = ceil($endExp - $startExp); // lebih dari setengah tahun, dibulatkan menjadi 1 tahun

        if ($this->input->post('current_date') == 'on') {
            $experience = array('title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'end_date'=> '0000-00-00',
                                'exp_time' => $YoE,
                                'user_id' => $this->session->userdata('id'),
                                'company_name' => $this->input->post('company_name'),
                                'employment_type_id' => $this->input->post('employment_type'),
                                'industries_id' => $this->input->post('industry'),
                                'skills' => $this->input->post('skills'),
                                'created_at' => date('Y-m-d H:i:s')
                                );
        }else{
            $experience = array('title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'end_date'=> date('Y-m-d',strtotime($this->input->post('end_date'))),
                                'exp_time' => $YoE,
                                'user_id' => $this->session->userdata('id'),
                                'company_name' => $this->input->post('company_name'),
                                'employment_type_id' => $this->input->post('employment_type'),
                                'skills' => $this->input->post('skills'),
                                'industries_id' => $this->input->post('industry'),
                                'created_at' => date('Y-m-d H:i:s')
                                );
        }
            $table = 'experiences';
            $result = $this->student_model->add($experience, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Experience data added') : $this->session->set_flashdata('msg_failed', 'Experience data failed to update');
        // }
		$this->session->set_flashdata('tab_student', 'tab_experience');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Add Experience",
					'icon' 			=> "fa-plus",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');
    }

    public function edit_experience(){
        $roles = $this->session->userdata('roles');
        $startYear   = date('Y',strtotime($this->input->post('start_date')));
        $endYear     = ($this->input->post('current_date') == 'on') ? date('Y') : date('Y',strtotime($this->input->post('end_date')));
        $startMonth  = date('m',strtotime($this->input->post('start_date')))/12;
        $endMonth    = ($this->input->post('end_date') == 'on') ? date('m') : date('m',strtotime($this->input->post('end_date')))/12;

        $startExp   = $startYear + $startMonth;
        $endExp     = $endYear + $endMonth;

        $YoE        = ceil($endExp - $startExp); // lebih dari setengah tahun, dibulatkan menjadi 1 tahun

        if ($this->input->post('current_date') == 'on') {
            $experience = array('id' => $this->input->post('experience_id'),
                                'title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'end_date'=> '0000-00-00',
                                'exp_time' => $YoE,
                                'user_id' => $this->session->userdata('id'),
                                'company_name' => $this->input->post('company_name'),
                                'employment_type_id' => $this->input->post('employment_type'),
                                'industries_id' => $this->input->post('industry'),
                                'skills' => $this->input->post('skills'),
                                'updated_at' => date('Y-m-d H:i:s')
                                );
        }else{
            $experience = array('id' => $this->input->post('experience_id'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'end_date'=> date('Y-m-d',strtotime($this->input->post('end_date'))),
                                'exp_time' => $YoE,
                                'user_id' => $this->session->userdata('id'),
                                'company_name' => $this->input->post('company_name'),
                                'employment_type_id' => $this->input->post('employment_type'),
                                'skills' => $this->input->post('skills'),
                                'industries_id' => $this->input->post('industry'),
                                'updated_at' => date('Y-m-d H:i:s')
                                );
        }
        $table = 'experiences';
        $result = $this->student_model->update($experience, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Experience data updated') : $this->session->set_flashdata('msg_failed', 'Experience data failed to update');
		$this->session->set_flashdata('tab_student', 'tab_experience');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Edit Experience",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');
    }

    public function add_skills(){
        $roles = $this->session->userdata('roles');
        $skills = array('name'=> $this->input->post('skill_name'),
                            'description'=> $this->input->post('skill_description'),
                            'level'=> $this->input->post('skill_level'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_skill_set';
        $result = $this->student_model->add($skills, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Skills data added') : $this->session->set_flashdata('msg_failed', 'skills data failed to update');
        redirect(base_url().$roles.'/profile/');
    }

    public function edit_skills(){
        $roles = $this->session->userdata('roles');
        $skills = array('id' => $this->input->post('skills_id'),
                            'name'=> $this->input->post('name'),
                            'description'=> $this->input->post('description'),
                            'level'=> $this->input->post('level'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_skill_set';
        $result = $this->student_model->update($skills, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Skills data updated') : $this->session->set_flashdata('msg_failed', 'skills data failed to update');
        redirect(base_url().$roles.'/profile/');
    }

    public function add_language(){
        $roles = $this->session->userdata('roles');
        $language = array('language'=> $this->input->post('language_name'),
                            'profieciency'=> $this->input->post('profieciency'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_language_set';
        $result = $this->student_model->add($language, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data added') : $this->session->set_flashdata('msg_failed', 'language data failed to update');
        redirect(base_url().$roles.'/profile/');
    }

    public function edit_language(){
        $roles = $this->session->userdata('roles');
        $language = array('id' => $this->input->post('language_id'),
                            'language'=> $this->input->post('language'),
                            'profieciency'=> $this->input->post('profieciency'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_language_set';
        $result = $this->student_model->update($language, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data updated') : $this->session->set_flashdata('msg_failed', 'Language data failed to update');
        redirect(base_url().$roles.'/profile/');
    }

    public function add_achievement(){
        $roles = $this->session->userdata('roles');
        if (strtotime($this->input->post('end_date')) < strtotime($this->input->post('start_date'))) {
            $this->session->set_flashdata('msg_failed', 'End date cannot smaller than start date');
        }else{  
            $achievement = array('achievement_name' => $this->input->post('achievement_name'),
                                 'achievement_description' => $this->input->post('achievement_description'),
                                 'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                 'end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
                                 'user_id' => $this->session->userdata('id'),
                                 'tag' => $this->input->post('tag'));
            $table = 'achievement';
            $result = $this->student_model->add($achievement, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Non-educational data added') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
        }
		$this->session->set_flashdata('tab_student', 'tab_non_education');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Add Non-Education",
					'icon' 			=> "fa-plus",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');
    }

    public function edit_achievement(){
        $roles = $this->session->userdata('roles');
        if (strtotime($this->input->post('end_date')) < strtotime($this->input->post('start_date'))) {
            $this->session->set_flashdata('msg_failed', 'End date cannot smaller than start date');
        }else{  
            $achievement = array('achievement_name' => $this->input->post('achievement_name'),
                                 'achievement_description' => $this->input->post('achievement_description'),
                                 'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                 'end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
                                 'user_id' => $this->session->userdata('id'),
                                 'id' => $this->input->post('achievement_id'),
                                 'tag' => $this->input->post('tag'));
            $table = 'achievement';
            $result = $this->student_model->update($achievement, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Non-educational data updated') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
        }
		$this->session->set_flashdata('tab_student', 'tab_non_education');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Edit Non-Education",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');
    }

    public function add_project(){
        $roles = $this->session->userdata('roles');
        if ($this->input->post('current_date') == 'on') {
            $project_name = array('name' => $this->input->post('project_name'),
                                    'description' => $this->input->post('project_description'),
                                    'skills_acquired' => $this->input->post('skills'),
                                    'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                    'end_date' => '0000-00-00',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'user_id' => $this->session->userdata('id')
                                );
        }else{
            $project_name = array('name' => $this->input->post('project_name'),
                                    'description' => $this->input->post('project_description'),
                                    'skills_acquired' => $this->input->post('skills'),
                                    'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                    'end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'user_id' => $this->session->userdata('id')
                                );
        }
        $table = 'user_projects';
        $result = $this->student_model->add($project_name, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Projects data added') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
		$this->session->set_flashdata('tab_student', 'tab_project');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Add Project",
					'icon' 			=> "fa-plus",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
		redirect(base_url().$roles.'/profile');
    }

    public function edit_project(){
        $roles = $this->session->userdata('roles');
        if ($this->input->post('current_date') == 'on') {
            $project_name = array('name' => $this->input->post('project_name'),
                                    'description' => $this->input->post('project_description'),
                                    'skills_acquired' => $this->input->post('skills'),
                                    'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                    'end_date' => '0000-00-00',
                                    'edited_at' => date('Y-m-d H:i:s'),
                                    'user_id' => $this->session->userdata('id'),
                                    'id' => $this->input->post('project_id'));
        }else{
            $project_name = array('name' => $this->input->post('project_name'),
                                    'description' => $this->input->post('project_description'),
                                    'skills_acquired' => $this->input->post('skills'),
                                    'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                    'end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
                                    'edited_at' => date('Y-m-d H:i:s'),
                                    'user_id' => $this->session->userdata('id'),
                                    'id' => $this->input->post('project_id'));
        }
        $table = 'user_projects';
        $result = $this->student_model->update($project_name, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Projects data updated') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
		$this->session->set_flashdata('tab_student', 'tab_project');
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Edit Project",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().$roles.'/profile');

    }
	
	public function delete(){
        $deleteData = array('id' => $this->input->post('id'), 
                            'table' => $this->input->post('table'));
        $result['data'] = $this->student_model->delete($deleteData, $deleteData['table']);
		
		if($deleteData['table'] == "academics"){
			$this->session->set_flashdata('tab_student', 'tab_education');
			$activity = "Delete Education";
		}elseif($deleteData['table'] == "achievement"){
			$this->session->set_flashdata('tab_student', 'tab_non_education');
			$activity = "Delete Non-Education";
		}elseif($deleteData['table'] == "experiences"){
			$this->session->set_flashdata('tab_student', 'tab_experience');
			$activity = "Delete Experience";
		}elseif($deleteData['table'] == "user_projects"){
			$this->session->set_flashdata('tab_student', 'tab_project');
			$activity = "Delete Project";
		}
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> $activity,
					'icon' 			=> "fa-trash",
					'label' 		=> "danger",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        return $result;
    }

    public function view_my_profile(){
        $id= base64_decode($this->uri->segment(URI_SEGMENT_DETAIL));
        $viewerId = $this->session->userdata('id');
		$profile['user_profile'] = $this->student_model->get_user_profile($id);
        $profile['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        if ($this->session->userdata('roles') == 'employer') {
            $profile['employer_profile'] = $this->employer_model->get_user_profile($this->session->userdata('id'));
        }
        $profile['student_id'] = $id;
        $roles = $this->session->userdata('roles');
        //get academy ratings and review
        $academics      = $this->global_model->get_where('academics',array('user_id'=>$id));
        $academy        = [];

        if (!empty($academics)) {
            foreach ($academics as $key => $value) {
                $rate[$key] = 0;
                $ratings = $this->global_model->get_where('ratings', array('user_id'=> $id, 'skill_id'=>$value['id']));
                $userGiveRating[$key] = count($ratings);
                $reviews = $this->global_model->get_where('reviews', array('user_id'=> $id, 'skill_id'=>$value['id']));
                $userGiveReview[$key] = count($reviews);
                foreach ($ratings as $ratingKey => $ratingValue) {
                    $userRole = $this->global_model->get_by_id('user_role', array('user_id'=>$ratingValue['endorser_id']));
                    if ($userRole->role_id == 3) {
                        $detailEndorser  = $this->employer_model->get_user_profile($ratingValue['endorser_id']);
                    }else if($userRole->role_id == 4 || $userRole->role_id == 5){
                        $detailEndorser  = $this->student_model->get_user_profile($ratingValue['endorser_id']);                        
                    }
                    $rate[$key]     += $ratingValue['rating'];
                    $academy[$key]['ratingDetail'][$ratingKey] = $detailEndorser;
                    $academy[$key]['ratingDetail'][$ratingKey]['currentUserRate'] = ($ratingValue['endorser_id'] == $viewerId) ? true : false;
                }

                foreach ($reviews as $reviewKey => $reviewValue) {
                    $userRole = $this->global_model->get_by_id('user_role', array('user_id'=>$ratingValue['endorser_id']));
                    if ($userRole->role_id == 3) {
                        $detailEndorser  = $this->employer_model->get_user_profile($ratingValue['endorser_id']);
                    }else if($userRole->role_id == 4 || $userRole->role_id == 5){
                        $detailEndorser  = $this->student_model->get_user_profile($ratingValue['endorser_id']);                        
                    }
                    $academy[$key]['reviewDetail'][$reviewKey] = $detailEndorser;    
                    $academy[$key]['reviewDetail'][$reviewKey]['currentUserRate'] = ($reviewKey['endorser_id'] == $viewerId) ? true : false;
                }
                $academy[$key]['reviews'] = $userGiveReview[$key];
                $academy[$key]['ratings'] = !empty($ratings) ? $rate[$key] / $userGiveRating[$key] : $rate[$key];
                $academy[$key]['id'] = $value['id'];
                $academy[$key]['user_id'] = $value['user_id'];
                $academy[$key]['university_name'] = $value['university_name'];
                $academy[$key]['degree_name'] = $value['degree_name'];
                $academy[$key]['degree_description'] = $value['degree_description'];
                $academy[$key]['qualification_level'] = $value['qualification_level'];
                $academy[$key]['date'] = $value['date'];
                $academy[$key]['start_date'] = $value['start_date'];
                $academy[$key]['end_date'] = $value['end_date'];

            }
        }

        $profile['academy'] = $academy;

        //get experience rating review
        $experiences    = $this->global_model->get_where('experiences',array('user_id'=>$id));
        $experience     = [];

        if (!empty($experiences)) {
            foreach ($experiences as $key => $value) {
                
                $rate[$key] = 0;
                $ratings = $this->global_model->get_where('ratings', array('user_id'=> $id, 'exp_id'=>$value['id']));
                $userGiveRating[$key] = count($ratings);
                $reviews = $this->global_model->get_where('reviews', array('user_id'=> $id, 'exp_id'=>$value['id']));
                $userGiveReview[$key] = count($reviews);
                foreach ($ratings as $ratingKey => $ratingValue) {
                    $userRole = $this->global_model->get_by_id('user_role', array('user_id'=>$ratingValue['endorser_id']));
                    if ($userRole->role_id == 3) {
                        $detailEndorser  = $this->employer_model->get_user_profile($ratingValue['endorser_id']);
                    }else if($userRole->role_id == 4 || $userRole->role_id == 5){
                        $detailEndorser  = $this->student_model->get_user_profile($ratingValue['endorser_id']);                        
                    }
                    $rate[$key]     += $ratingValue['rating'];
                    $experience[$key]['ratingDetail'][$ratingKey] = $detailEndorser;   
                    $experience[$key]['ratingDetail'][$ratingKey]['currentUserRate'] = ($ratingValue['endorser_id'] == $viewerId) ? true : false; 
                }

                foreach ($reviews as $reviewKey => $reviewValue) {
                    if ($userRole->role_id == 3) {
                        $detailEndorser  = $this->employer_model->get_user_profile($ratingValue['endorser_id']);
                    }else if($userRole->role_id == 4 || $userRole->role_id == 5){
                        $detailEndorser  = $this->student_model->get_user_profile($ratingValue['endorser_id']);                        
                    }
                    $experience[$key]['reviewDetail'][$reviewKey] = $detailEndorser;    
                    $experience[$key]['reviewDetail'][$reviewKey]['currentUserRate'] = ($reviewKey['endorser_id'] == $viewerId) ? true : false;
                }
                $experience[$key]['reviews'] = $userGiveReview[$key];
                $experience[$key]['ratings'] = !empty($ratings) ? $rate[$key] / $userGiveRating[$key] : $rate[$key];
                $experience[$key]['id'] = $value['id'];
                $experience[$key]['user_id'] = $value['user_id'];
                $experience[$key]['title'] = $value['title'];
                $experience[$key]['company_name'] = $value['company_name'];
                $experience[$key]['skills'] = $value['skills'];
                $experience[$key]['start_date'] = $value['start_date'];
                $experience[$key]['end_date'] = $value['end_date'];

            }
        }

        $profile['experience'] = $experience;

        //get Projects endorse jangan lupa flag user endorse
        $userProjects     = $this->global_model->get_where('user_projects', array('user_id'=>$id), 'id', 'DESC');
        if (!empty($userProjects)) {
            foreach ($userProjects as $key => $value) {
                $endorsesProject = $this->global_model->get_where('endorse', array('endorsed_user_id'=> $id, 'user_project_id'=>$value['id']));
                $userGiveEndorse[$key] = count($endorsesProject);
                foreach ($endorsesProject as $endorseKey => $endorseValue) {
                    $userRole = $this->global_model->get_by_id('user_role', array('user_id'=>$endorseValue['endorser_user_id']));
                    if ($userRole->role_id == 3) {
                        $detailEndorserNonEdu  = $this->employer_model->get_user_profile($endorseValue['endorser_user_id']);
                    }else if($userRole->role_id == 4 || $userRole->role_id == 5){
                        $detailEndorserNonEdu  = $this->student_model->get_user_profile($endorseValue['endorser_user_id']);
                    }
                    $userProjects[$key]['ratingDetail'][$endorseKey] = $detailEndorserNonEdu;   
                    $userProjects[$key]['ratingDetail'][$endorseKey]['currentUserRate'] = ($endorseValue['endorser_user_id'] == $viewerId) ? true : false; 
                }
            }
        }

        $profile['project'] = $userProjects;

        //get non-education endorse jangan lupa flag user endorse
        $nonEducation     = $this->global_model->get_where('achievement', array('user_id'=>$id), 'id', 'DESC');

        if (!empty($nonEducation)) {
            foreach ($nonEducation as $key => $value) {
                $endorses = $this->global_model->get_where('endorse', array('endorsed_user_id'=> $id, 'achievement_id'=>$value['id']));
                $userGiveEndorse[$key] = count($endorses);
                foreach ($endorses as $endorseKey => $endorseValue) {
                    $userRole = $this->global_model->get_by_id('user_role', array('user_id'=>$endorseValue['endorser_user_id']));
                    if ($userRole->role_id == 3) {
                        $detailEndorserNonEdu  = $this->employer_model->get_user_profile($endorseValue['endorser_user_id']);
                    }else if($userRole->role_id == 4 || $userRole->role_id == 5){
                        $detailEndorserNonEdu  = $this->student_model->get_user_profile($endorseValue['endorser_user_id']);
                    }
                    $nonEducation[$key]['ratingDetail'][$endorseKey] = $detailEndorserNonEdu;   
                    $nonEducation[$key]['ratingDetail'][$endorseKey]['currentUserRate'] = ($endorseValue['endorser_user_id'] == $viewerId) ? true : false; 
                }
            }
        }

        $profile['nonEducation'] = $nonEducation;
		
        //increase number of seen
		if($this->session->userdata('roles') != "administrator" && $this->session->userdata('id') != $id){
			$last_seen_by = $profile['user_profile']['overview']['last_seen_by'];
			$last_seen_at = $profile['user_profile']['overview']['last_seen_at'];
			
			$record = false;
			if($last_seen_by == $this->session->userdata('id')){
				$now 		= date('Y-m-d H:i:s');
				$now 		= strtotime($now);
				$last_seen 	= strtotime($last_seen_at);
				//10s
				if($now - $last_seen > 300){
					$record = true;
				}
			}else{
				$record = true;
			}
			if($record){
				$this->db->set('number_of_seen', 'number_of_seen+1', FALSE);
				$this->db->set('last_seen_by', $this->session->userdata('id'));
				$this->db->set('last_seen_at', date('Y-m-d H:i:s'));
				$this->db->where('id', $id);
				$this->db->update('users');
			}
		}

        //GALLERY
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('user_id', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $gallery = $query->result_array();

        $profile['gallery'] = $gallery;
        $this->load->view($roles.'/view_profile',$profile);
    }	
	
	public function downloadResume(){
		$roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(($roles !== $segment)){
            redirect(base_url());
        }
		$id = $_GET['id'];
		$id_res = $_GET['id_res'];
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        $this->load->library('Pdf');
        
        $candidate = $this->student_model->get_user_profile($id);
        $candidate['link'] = base_url().'profile/user/'.$id_res;
        $page = $candidate['overview']['name']." - resume";
        
		$subtable = '<table border="0" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
		// echo "<pre>";print_r($candidate);exit;
        /* $html = '
				<div style="background-color:#f5f5dc;">
					<div style="font-size:15px;font-weight:bold;text-align:center;">'.(!empty($candidate['overview']['name']) ? $candidate['overview']['name'] : 'N/A').'</div>
					<div style="font-size:9px;text-align:center;">
						Currently managing two brands under the same management. Experienced Marketing Manager with a demonstrated history of working in the telecommunications industry. Skilled in Strategic Brand Positioning, Creative Concept Design, Campaign Management, Brand Management, and Business (Marketing) Strategy. Strong marketing professional graduated from In-House Multimedia College and further my study at INTI International University.
					</div>
				</div>
				<span style="font-size:9px;">
					<table border="0" cellpadding="4" cellspacing="1">
						<tr>
							<th align="left" width="35%;">
								<br>
								<br>
								<span style="text-align:center;">
									<img src="'.base_url().'assets/img/student/Penguins.jpg" alt="test alt attribute" width="100" height="100" border="0" />
								</span>
								<br>
								
								<div>
									<div style="font-weight:bold;">PROFILE</div>
									<hr>
									<div></div>
									<div>
										<span style="background-color: grey; color: white;;">  </span> +60126307780
									</div>
									<div>
										<span style="background-color: grey; color: white;;">  </span> qunn1818@yahoo.com
									</div>

									<div>
										<span style="background-color: grey; color: white;;">  </span> Seremban, Negeri Sembilan
									</div>

									<div>
										<span style="background-color: grey; color: white;;">  </span> https://xremo.com/profile/user/MTA1NQ
									</div>
									
								</div>
								
								<div style="font-weight:bold;">LANGUAGE</div>
								<hr>
								<div></div>
								<div>
									<span style="font-weight:bold;">Malay</span><br>
									<span><i>Spoken : Intermediate</i></span><br>
									<span><i>Written : Beginner</i></span>
								</div>
								<div>
									<span style="font-weight:bold;">English</span><br>
									<span><i>Spoken : Intermediate</i></span><br>
									<span><i>Written : Beginner</i></span>
								</div>

								<div>
									<span style="font-weight:bold;">Chinese</span><br>
									<span><i>Spoken : Intermediate</i></span><br>
									<span><i>Written : Beginner</i></span>
								</div>
								<br>
								<div style="font-weight:bold;">REFERENCE</div>
								<hr>
								<div></div>
								<div>
									<span style="font-weight:bold;">Roy Goh | <span style="font-weight:normal;">Former Peer</span></span><br>
									<span><span style="background-color: grey; color: white;;">  </span> +6012 213 6043</span><br>
									<span><span style="background-color: grey; color: white;;">  </span> clark-lidgren@gmail.com</span>
								</div>
								<div>
									<span style="font-weight:bold;">English</span><br>
									<span><span style="background-color: grey; color: white;;">  </span> +6012 213 6043</span><br>
									<span><span style="background-color: grey; color: white;;">  </span> clark-lidgren@gmail.com</span>
								</div>

								<div>
									<span style="font-weight:bold;">Chinese</span><br>
									<span><span style="background-color: grey; color: white;;">  </span> +6012 213 6043</span><br>
									<span><span style="background-color: grey; color: white;;">  </span> clark-lidgren@gmail.com</span>
								</div>
								
							</th>
							<th align="left" width="65%;">
								<div style="font-weight:bold;">EDUCATION</div>
								<hr>
								<div></div>
								<div>
									<span style="font-weight:bold;">Diploma In Art / Design / Creative Multimedia</span><br>
									<span style="font-weight:bold;">INTI International University</span><br>
									<span><font face="courier">Feb 2015 - Feb 2013</font></span><br>
									<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro incidunt officiis vel adipisci sunt tempora neque, vero facere corporis accusamus iusto in ex pariatur libero quo, repudiandae, quos dignissimos eius.</span>
								</div>
								<div>
									<span style="font-weight:bold;">Diploma In Art / Design / Creative Multimedia</span><br>
									<span style="font-weight:bold;">INTI International University</span><br>
									<span><font face="courier">Feb 2015 - Feb 2013</font></span><br>
									<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro incidunt officiis vel adipisci sunt tempora neque, vero facere corporis accusamus iusto in ex pariatur libero quo, repudiandae, quos dignissimos eius.</span>
								</div>
								<br>
								
								<div style="font-weight:bold;">EXPERIENCE</div>
								<hr>
								<div></div>
								<div>
									<span style="font-weight:bold;">Elabram Systems Sdn Bhd | Marketing Manager</span><br>
									<span><font face="courier">Present - Jan 2015</font></span><br>
									<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro incidunt officiis vel adipisci sunt tempora neque, vero facere corporis accusamus iusto in ex pariatur libero quo, repudiandae, quos dignissimos eius.</span>
								</div>
								<div>
									<span style="font-weight:bold;">Elabram Systems Sdn Bhd | Marketing Manager</span><br>
									<span><font face="courier">Present - Jan 2015</font></span><br>
									<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro incidunt officiis vel adipisci sunt tempora neque, vero facere corporis accusamus iusto in ex pariatur libero quo, repudiandae, quos dignissimos eius.</span>
								</div>
								<div>
									<span style="font-weight:bold;">Elabram Systems Sdn Bhd | Marketing Manager</span><br>
									<span><font face="courier">Present - Jan 2015</font></span><br>
									<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro incidunt officiis vel adipisci sunt tempora neque, vero facere corporis accusamus iusto in ex pariatur libero quo, repudiandae, quos dignissimos eius.</span>
								</div>
								<br>
								
								<div style="font-weight:bold;">SKILL</div>
								<hr>
								<div></div>
								<div>
									<span><span style="background-color: grey; color: white;">  </span> Brand Management </span>
									<span><span style="background-color: grey; color: white;">  </span> Campaign Management  </span>
									<span><span style="background-color: grey; color: white;">  </span> Business (Marketing) Strategy </span>
									<span><span style="background-color: grey; color: white;">  </span> Channel Management </span>
									<span><span style="background-color: grey; color: white;">  </span> Budgeting and Planning </span>
									<span><span style="background-color: grey; color: white;">  </span> Graphic Design </span>
									<span><span style="background-color: grey; color: white;">  </span> Marketing Communications </span>
									<span><span style="background-color: grey; color: white;">  </span> Business Development </span>
									<span><span style="background-color: grey; color: white;">  </span> International Business </span>
								</div>
								<br>
							</th>
						</tr>
					</table>
				</span>
		'; */
		
		$photo_path = base_url()."assets/img/student/";
		$html = '
				<div style="background-color:#f5f5dc;">
					<div style="font-size:15px;font-weight:bold;text-align:center;">'.(!empty($candidate['overview']['name']) ? $candidate['overview']['name'] : 'N/A').'</div>
					<div style="font-size:9px;text-align:center;">
						'.(!empty($candidate['overview']['summary']) ? $candidate['overview']['summary'] : 'N/A').'
					</div>
				</div>
				<span style="font-size:9px;">
					<table border="0" cellpadding="4" cellspacing="1">
						<tr>
							<th align="left" width="35%;">
								<br>
								<br>
								<span style="text-align:center;">
									<img src="'.(is_file($photo_path.($candidate['overview']['profile_photo'])) ? $photo_path.$candidate['overview']['profile_photo'] : base_url()."assets/img/site/profile-pic.png").'" alt="test alt attribute" width="100" height="100" border="0" />
								</span>
								<br>
								
								<div>
									<div style="font-weight:bold;">CONTACT</div>
									<hr>
									<div></div>
									<div>
										<span style="background-color: grey; color: white;">  </span> '.(!empty($candidate['overview']['student_bios_contact_number']) ? $candidate['overview']['student_bios_contact_number'] : 'N/A').'
									</div>
									<div>
										<span style="background-color: grey; color: white;">  </span> '.(!empty($candidate['overview']['email']) ? $candidate['overview']['email'] : 'N/A').'
									</div>

									<div>
										<span style="background-color: grey; color: white;">  </span> '.(!empty($candidate['address']['states']) ? $candidate['address']['states'] : 'N/A').', '.(!empty($candidate['address']['city']) ? $candidate['address']['city'] : 'N/A').'
									</div>

									<div>
										<span style="background-color: grey; color: white;">  </span> '.$candidate['link'].'
									</div>
									
								</div>
		';
							if (!empty($candidate['language']))
                                {
									$html .='
										<div style="font-weight:bold;">LANGUAGE</div>
										<hr>
										<div></div>
									';
									foreach ($candidate['language'] as $value)
									{
										$html .= '
											<div>
												<span style="font-weight:bold;">'.$value['title'].'</span><br>
												<span><i>Spoken : '.$value['spoken'].'</i></span><br>
												<span><i>Written : '.$value['written'].'</i></span>
											</div>
										';
									}
								}
							
							if (!empty($candidate['reference']))
                                {
									$html .='
								<br>
								<div style="font-weight:bold;">REFERENCE</div>
								<hr>
								<div></div>
									';
									foreach ($candidate['reference'] as $value)
									{
										$html .='
											<div>
												<span style="font-weight:bold;">'.$value['reference_name'].' | <span style="font-weight:normal;">'.$value['reference_relationship'].'</span></span><br>
												<span><span style="background-color: grey; color: white;;">  </span> '.$value['reference_phone'].'</span><br>
												<span><span style="background-color: grey; color: white;;">  </span> '.$value['reference_email'].'</span>
											</div>
										';
									}
								}
		
		$html .='
							</th>
							<th align="left" width="65%;">
		';
							if (!empty($candidate['academics']))
                                {
									$html .='
										<div style="font-weight:bold;">EDUCATION</div>
										<hr>
										<div></div>
									';
									foreach ($candidate['academics'] as $value)
									{
										$html .='
											<div>
												<span style="font-weight:bold;">'.$value['qualification_level'].' | '.$value['degree_name'].'</span><br>
												<span style="font-weight:bold;">'.$value['university_name'].'</span><br>
												<span><font face="courier">'.date('d M Y', strtotime($value['start_date'])).' - '.date('d M Y', strtotime($value['end_date'])).'</font></span><br>
												<span>'.$value['degree_description'].'</span>
											</div>
											<br>
										';
									}
								}
							if (!empty($candidate['experiences']))
                                {
									$html .='
								<div style="font-weight:bold;">EXPERIENCE</div>
								<hr>
								<div></div>
								';
								foreach ($candidate['experiences'] as $value)
									{
										$html .='
											<div>
												<span style="font-weight:bold;">'.$value['experiences_company_name'].' | '.$value['experiences_title'].'</span><br>
												<span><font face="courier">'.date('d M Y', strtotime($value['experiences_start_date'])).' - '.date('d M Y', strtotime($value['experiences_end_date'])).'</font></span><br>
												<span>'.$value['experiences_description'].'</span>
											</div>
										';
									}
								}
								$html .='
								<br>
								';
								
							if (!empty($candidate['projects']))
                                {
									$html .='
								
									<div style="font-weight:bold;">PROJECT & SKILL</div>
									<hr>
									<div></div>
									<div>
										';
										
										foreach ($candidate['projects'] as $value)
									{
										$html .='
											<span><span style="background-color: grey; color: white;">  </span> <b>'.$value['name'].'</b> - '.$value['skills_acquired'].' </span>
										';
									}
									$html .='
										</div>
										<br>
									';
								}
								
							if (!empty($candidate['achievement']))
                                {
									$html .='
								
									<div style="font-weight:bold;">EXTRACURRICULAR ACTIVITY</div>
									<hr>
									<div></div>
									<div>
										';
										
										foreach ($candidate['achievement'] as $value)
									{
										$html .='
											<span><span style="background-color: grey; color: white;">  </span> '.$value['achievement_title'].' </span>
										';
									}
									$html .='
										</div>
										<br>
									';
								}
								
					$html .='
							</th>
						</tr>
					</table>
				</span>
		';
		
		$pdfFilePath = $page.".pdf";

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->AddPage();
        $y = $pdf->getY();
		// $html = utf8_decode($html);
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output($pdfFilePath, "D");
    }
}
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
        
        
        $profile['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['languages'] = $this->student_model->get_array('language', 'name', 'asc');
        $profile['employment_types'] = $this->student_model->get_array('employment_types', 'id', 'asc');
        $profile['industries'] = $this->student_model->get_array('industries', 'id', 'asc');
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $profile['language']   = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $this->load->view('jobseeker/main/header', $profile);
        $this->load->view('jobseeker/profile', $profile);
        $this->load->view('jobseeker/main/footer');
	}

    public function post(){
        //IF NOT EMPTY PROFILE PICTURE
        if(!empty($_FILES['profile_photo']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $checkImage = $this->student_model->checkImageExist($userImageID);
            $tempFile = $_FILES['profile_photo']['tmp_name'];        
            $targetPath = "./assets/img/student/";

            $path = pathinfo($_FILES['profile_photo']['name']);
            $ext = $path['extension'];
            $profile_photo = 'profile_photo_'.$this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$profile_photo;
            if (isset($checkImage)) {

                // unlink("./assets/img/jobseeker/".$checkImage['name']);
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
            $targetPath = "./assets/img/jobseeker/";

            $path = pathinfo($_FILES['header_photo']['name']);
            $ext = $path['extension'];
            $header_photo = 'header_photo_'.$this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$header_photo;
            if (isset($checkImage)) {

                // unlink("./assets/img/jobseeker/".$checkImage['name']);
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

		
        redirect(base_url().'jobseeker/profile/');
    }

    public function add_education(){
        
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
		
        redirect(base_url().'jobseeker/profile');
    }

    public function edit_education(){
        
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
		
        redirect(base_url().'jobseeker/profile');
        
    }

    public function add_experience(){

        if ($this->input->post('current_date') == 'on') {
            $experience = array('title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'end_date'=> '0000-00-00',
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
		
        redirect(base_url().'jobseeker/profile');
    }

    public function edit_experience(){
        if ($this->input->post('current_date') == 'on') {
            $experience = array('id' => $this->input->post('experience_id'),
                                'title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'end_date'=> '0000-00-00',
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
		
        redirect(base_url().'jobseeker/profile');
    }

    public function add_skills(){
        $skills = array('name'=> $this->input->post('skill_name'),
                            'description'=> $this->input->post('skill_description'),
                            'level'=> $this->input->post('skill_level'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_skill_set';
        $result = $this->student_model->add($skills, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Skills data added') : $this->session->set_flashdata('msg_failed', 'skills data failed to update');
        redirect(base_url().'jobseeker/profile/');
    }

    public function edit_skills(){
        $skills = array('id' => $this->input->post('skills_id'),
                            'name'=> $this->input->post('name'),
                            'description'=> $this->input->post('description'),
                            'level'=> $this->input->post('level'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_skill_set';
        $result = $this->student_model->update($skills, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Skills data updated') : $this->session->set_flashdata('msg_failed', 'skills data failed to update');
        redirect(base_url().'jobseeker/profile/');
    }

    public function add_language(){
        $language = array('language'=> $this->input->post('language_name'),
                            'profieciency'=> $this->input->post('profieciency'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_language_set';
        $result = $this->student_model->add($language, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data added') : $this->session->set_flashdata('msg_failed', 'language data failed to update');
        redirect(base_url().'jobseeker/profile/');
    }

    public function edit_language(){
        $language = array('id' => $this->input->post('language_id'),
                            'language'=> $this->input->post('language'),
                            'profieciency'=> $this->input->post('profieciency'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_language_set';
        $result = $this->student_model->update($language, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data updated') : $this->session->set_flashdata('msg_failed', 'Language data failed to update');
        redirect(base_url().'jobseeker/profile/');
    }

    public function add_achievement(){
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
		
        redirect(base_url().'jobseeker/profile');
    }

    public function edit_achievement(){
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
		
        redirect(base_url().'jobseeker/profile');
    }

    public function add_project(){
        
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
		
		redirect(base_url().'jobseeker/profile');
    }

    public function edit_project(){
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
		
        redirect(base_url().'jobseeker/profile');

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
		$profile['user_profile'] = $this->student_model->get_user_profile($id);
        $profile['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        if ($this->session->userdata('roles') == 'employer') {
            $profile['employer_profile'] = $this->employer_model->get_user_profile($this->session->userdata('id'));
        }
		$profile['student_id'] = $id;
		
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
        $this->load->view('jobseeker/view_profile',$profile);
    }
}
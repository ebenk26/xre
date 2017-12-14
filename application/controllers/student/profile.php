<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/profile', $profile);
        $this->load->view('student/main/footer');
	}

    public function post(){


        if(!empty($_FILES['newImage']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $checkImage = $this->student_model->checkImageExist($userImageID);
            $tempFile = $_FILES['newImage']['tmp_name'];        
            $targetPath = "./assets/img/student/";

            $path = pathinfo($_FILES['newImage']['name']);
            $ext = $path['extension'];
            $title = $this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY');
            $src2 = $this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$src2;
            if (!empty($checkImage)) {

                unlink("./assets/img/student/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{
                move_uploaded_file($tempFile,$targetFile);
            }
        }else{
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $userImage = $this->student_model->checkImageExist($userImageID);
            $src2 = $userImage['name'];
        }

        $profile = array(
            'student_name' => $this->input->post('fullname'),
            'preferences_name' => $this->input->post('student_name'),
            'gender' => $this->input->post('gender'),
            'date_of_birth' => date('Y-d-m', strtotime($this->input->post('DOB'))),
            'occupation' => $this->input->post('current'),
            'contact_number' => $this->input->post('phone'),
            'user_id'=> $this->session->userdata('id'),
            'country'=> $this->input->post('country'),
            'quote'=> $this->input->post('quotes'),
            'summary'=> $this->input->post('summary'),
            'youtubelink'=> $this->input->post('youtubelink'),
            'address' => $this->input->post('address'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'postcode' => $this->input->post('post_code'),
            'type'=> 'profile_photo',
            'image' =>  $src2
        );
        
        $this->student_model->profile_post($profile);
        redirect(base_url().'student/profile/');
    }

    public function add_education(){
        if (strtotime($this->input->post('until')) < strtotime($this->input->post('from'))) {
            $this->session->set_flashdata('msg_failed', 'End date cannot smaller than start date');
        }else{            
            $education = array( 'university_name'=> $this->input->post('university_name'),
                                'qualification_level'=> $this->input->post('qualification_level'),
                                'degree_name'=> $this->input->post('field_of_study'),
                                'start_date'=> date('Y-d-m', strtotime($this->input->post('from'))),
                                'end_date' => date('Y-d-m', strtotime($this->input->post('until'))),
                                'degree_description'=>$this->input->post('academics_description'),
                                'user_id' => $this->session->userdata('id')
                                );
            $table = 'academics';
            $result = $this->student_model->add($education, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Education data added') : $this->session->set_flashdata('msg_failed', 'Education data failed to update');
        }
        redirect(base_url().'student/profile/');
    }

    public function edit_education(){

        if (strtotime($this->input->post('until')) < strtotime($this->input->post('from'))) {
            $this->session->set_flashdata('msg_failed', 'End date cannot smaller than start date');
        }else{            
            $education = array( 'university_name'=> $this->input->post('university_name'),
                                'qualification_level'=> $this->input->post('qualification_level'),
                                'degree_name'=> $this->input->post('field_of_study'),
                                'start_date'=> date('Y-d-m', strtotime($this->input->post('from'))),
                                'end_date' => date('Y-d-m', strtotime($this->input->post('until'))),
                                'degree_description'=>$this->input->post('academics_description'),
                                'id' => $this->input->post('academic_id'),
                                'user_id' => $this->session->userdata('id')
                                );
            $table = 'academics';
            $result = $this->student_model->update($education, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Education data updated') : $this->session->set_flashdata('msg_failed', 'Education data failed to update');
        }
        redirect(base_url().'student/profile/');
        
    }

    public function add_experience(){

        if ($this->input->post('current_date') == 'on') {
            $experience = array('title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-d-m',strtotime($this->input->post('start_date'))),
                                'end_date'=> '0000-00-00',
                                'user_id' => $this->session->userdata('id')
                                );
        }else{
            $experience = array('title'=> $this->input->post('title'),
                                'description'=> $this->input->post('description'),
                                'start_date'=> date('Y-d-m',strtotime($this->input->post('start_date'))),
                                'end_date'=> date('Y-d-m',strtotime($this->input->post('end_date'))),
                                'user_id' => $this->session->userdata('id')
                                );
        }
            $table = 'experiences';
            $result = $this->student_model->add($experience, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Experience data added') : $this->session->set_flashdata('msg_failed', 'Experience data failed to update');
        // }
        redirect(base_url().'student/profile/');
    }

    public function edit_experience(){
        $experience = array('id' => $this->input->post('experience_id'),
                            'user_id' => $this->session->userdata('id'),
                            'title'=> $this->input->post('title'),
                            'description'=> $this->input->post('description'),
                            'start_date'=> date('Y-d-m',strtotime($this->input->post('start_date'))),
                            'end_date'=> date('Y-d-m',strtotime($this->input->post('end_date')))
                            );
        $table = 'experiences';
        $result = $this->student_model->update($experience, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Experience data updated') : $this->session->set_flashdata('msg_failed', 'Experience data failed to update');
        redirect(base_url().'student/profile/');
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
        redirect(base_url().'student/profile/');
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
        redirect(base_url().'student/profile/');
    }

    public function add_language(){
        $language = array('language'=> $this->input->post('language_name'),
                            'profieciency'=> $this->input->post('profieciency'),
                            'user_id' => $this->session->userdata('id')
                            );
        $table = 'user_language_set';
        $result = $this->student_model->add($language, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data added') : $this->session->set_flashdata('msg_failed', 'language data failed to update');
        redirect(base_url().'student/profile/');
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
        redirect(base_url().'student/profile/');
    }

    public function delete(){
        $deleteData = array('id' => $this->input->post('id'), 
                            'table' => $this->input->post('table'));
        $result['data'] = $this->student_model->delete($deleteData, $deleteData['table']);
        return $result;
    }

    public function add_achievement(){
        if (strtotime($this->input->post('end_date')) < strtotime($this->input->post('start_date'))) {
            $this->session->set_flashdata('msg_failed', 'End date cannot smaller than start date');
        }else{  
            $achievement = array('achievement_name' => $this->input->post('achievement_name'),
                                 'achievement_description' => $this->input->post('achievement_description'),
                                 'start_date' => date('Y-d-m',strtotime($this->input->post('start_date'))),
                                 'end_date' => date('Y-d-m',strtotime($this->input->post('end_date'))),
                                 'user_id' => $this->session->userdata('id'),
                                 'tag' => $this->input->post('tag'));
            $table = 'achievement';
            $result = $this->student_model->add($achievement, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Non-educational data added') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
        }
        redirect(base_url().'student/profile/');
    }

    public function edit_achievement(){
        if (strtotime($this->input->post('end_date')) < strtotime($this->input->post('start_date'))) {
            $this->session->set_flashdata('msg_failed', 'End date cannot smaller than start date');
        }else{  
            $achievement = array('achievement_name' => $this->input->post('achievement_name'),
                                 'achievement_description' => $this->input->post('achievement_description'),
                                 'start_date' => date('Y-d-m',strtotime($this->input->post('start_date'))),
                                 'end_date' => date('Y-d-m',strtotime($this->input->post('end_date'))),
                                 'user_id' => $this->session->userdata('id'),
                                 'id' => $this->input->post('achievement_id'),
                                 'tag' => $this->input->post('tag'));
            $table = 'achievement';
            $result = $this->student_model->update($achievement, $table);
            ($result == true) ? $this->session->set_flashdata('msg_success', 'Non-educational data updated') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
        }
        redirect(base_url().'student/profile/');
    }

    public function add_project(){
            
        $i = 0;
        foreach ($this->input->post('group-b') as $key => $value) {
            $skills[$i] = $value['skills'];
            $i++;
        }
        $skills_acquired = implode(',', $skills);
        $project_name = array('name' => $this->input->post('project_name'),
                                'description' => $this->input->post('project_description'),
                                'skills_acquired' => $skills_acquired,
                                'created_at' => date('Y-m-d H:i:s'),
                                'user_id' => $this->session->userdata('id')
                                );
        $table = 'user_projects';
        $result = $this->student_model->add($project_name, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Projects data added') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function edit_project(){

        $i = 0;
        foreach ($this->input->post('group-b') as $key => $value) {
            $skills[$i] = $value['skills'];
            $i++;
        }
        $skills_acquired =implode(',', $skills);
        $project_name = array('name' => $this->input->post('name'),
                                'description' => $this->input->post('description'),
                                'skills_acquired' => $skills_acquired,
                                'created_at' => date('Y-m-d H:i:s'),
                                'user_id' => $this->session->userdata('id'));
        $table = 'user_projects';
        $result = $this->student_model->add_project($project_name, $table);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Projects data updated') : $this->session->set_flashdata('msg_failed', 'Non-educational data failed to update');
        redirect(base_url().'student/profile/');

    }
}
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

        if(isset($_FILES['newImage']['tmp_name'])){
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
            if (isset($checkImage)) {

                unlink("./assets/img/student/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{

                move_uploaded_file($tempFile,$targetFile);
            }
        }

        $profile = array(
            'student_name' => $this->input->post('fullname'),
            'preferences_name' => $this->input->post('student_name'),
            'gender' => $this->input->post('gender'),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('DOB'))),
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
        $education = array( 'university_name'=> $this->input->post('university_name'),
                            'qualification_level'=> $this->input->post('qualification_level'),
                            'degree_name'=> $this->input->post('field_of_study'),
                            'start_date'=> date('Y-m-d', strtotime($this->input->post('from'))),
                            'end_date' => date('Y-m-d', strtotime($this->input->post('until'))),
                            'degree_description'=>$this->input->post('academics_description'),
                            'user_id' => $this->session->userdata('id')
                            );
        $result = $this->student_model->education_add($education);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Education data added') : $this->session->set_flashdata('msg_failed', 'Education data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function edit_education(){


        $education = array( 'university_name'=> $this->input->post('university_name'),
                            'qualification_level'=> $this->input->post('qualification_level'),
                            'degree_name'=> $this->input->post('field_of_study'),
                            'start_date'=> date('Y-m-d', strtotime($this->input->post('from'))),
                            'end_date' => date('Y-m-d', strtotime($this->input->post('until'))),
                            'degree_description'=>$this->input->post('academics_description'),
                            'id' => $this->input->post('academic_id'),
                            'user_id' => $this->session->userdata('id')
                            );

        $result = $this->student_model->education_edit($education);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Education data updated') : $this->session->set_flashdata('msg_failed', 'Education data failed to update');
        redirect(base_url().'student/profile/');
        
    }

    public function add_experience(){
        $experience = array('title'=> $this->input->post('title'),
                            'description'=> $this->input->post('description'),
                            'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                            'end_date'=> date('Y-m-d',strtotime($this->input->post('end_date'))),
                            'user_id' => $this->session->userdata('id')
                            );
        $result = $this->student_model->experience_add($experience);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Experience data added') : $this->session->set_flashdata('msg_failed', 'Experience data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function edit_experience(){
        $experience = array('id' => $this->input->post('experience_id'),
                            'user_id' => $this->session->userdata('id'),
                            'title'=> $this->input->post('title'),
                            'description'=> $this->input->post('description'),
                            'start_date'=> date('Y-m-d',strtotime($this->input->post('start_date'))),
                            'end_date'=> date('Y-m-d',strtotime($this->input->post('end_date')))
                            );
        $result = $this->student_model->experience_edit($experience);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Experience data updated') : $this->session->set_flashdata('msg_failed', 'Experience data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function add_skills(){
        $skills = array('name'=> $this->input->post('name'),
                            'description'=> $this->input->post('description'),
                            'level'=> $this->input->post('level'),
                            'user_id' => $this->session->userdata('id')
                            );
        $result = $this->student_model->skill_add($skills);
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
        $result = $this->student_model->skill_edit($skills);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Skills data updated') : $this->session->set_flashdata('msg_failed', 'skills data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function add_language(){
        $language = array('language'=> $this->input->post('language'),
                            'proficiecy'=> $this->input->post('proficiecy'),
                            'user_id' => $this->session->userdata('id')
                            );
        $result = $this->student_model->skill_add($language);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data added') : $this->session->set_flashdata('msg_failed', 'language data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function edit_language(){
        $language = array('id' => $this->input->post('language_id'),
                            'language'=> $this->input->post('language'),
                            'proficiecy'=> $this->input->post('proficiecy'),
                            'user_id' => $this->session->userdata('id')
                            );
        $result = $this->student_model->skill_edit($language);
        ($result == true) ? $this->session->set_flashdata('msg_success', 'Language data updated') : $this->session->set_flashdata('msg_failed', 'Language data failed to update');
        redirect(base_url().'student/profile/');
    }

    public function delete(){
        $deleteData = array('id' => $this->input->post('id'), 
                            'table' => $this->input->post('table'));
        $result['data'] = $this->student_model->delete($deleteData);
        return $result;
    }
}
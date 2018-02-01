<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('student_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile_form['industries'] = $this->employer_model->get('industries', 'name', 'asc');
        $profile_form['countries'] = $this->employer_model->get('countries', 'name', 'asc');
        $profile_form['detail'] = $get_user_profile;
        $profile_form['language'] = $this->employer_model->get('language', 'name', 'asc');
        $profile_form['social'] = $this->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $this->session->userdata('id') ));
        $profile_form['profile_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $this->session->userdata('id'), 'type'=>'profile_photo'));
        $profile_form['header_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $this->session->userdata('id'), 'type'=>'header_photo'));
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/profile', $profile_form);
        $this->load->view('employer/main/footer');
	}

    function edit_profile(){
        $social = $this->input->post('group-b');
        $id = $this->session->userdata('id');
        $check_number_of_social_link = $this->employer_model->check_social_link($id);
        if (!empty($social)) {
            
            $this->employer_model->delete_social($id);

            foreach ($social as $key => $value) {
                if ($value['link'] && $value['name']) {
                    $socmed = array('link' => $value['link'],
                                    'name' => $value['name'],
                                    'user_id' => $id );
                    $this->employer_model->post_social($socmed);
                }
            }
        }else{
            $this->employer_model->delete_social($id);
        }

        $profile = array('company_name' => $this->input->post('company_name'),
                         'company_registration_number' => $this->input->post('company_registration_number'),
                         'company_industry_id' => $this->input->post('industry'),
                         'company_description' => $this->input->post('about_company'),
                         'spoken_language' => $this->input->post('language'),
                         'user_id' => $id,
                         'url' => $this->input->post('corporate_website'));
        $checkAvailabilityProfile = $this->employer_model->check_availability_profile($id);
            
            if ($checkAvailabilityProfile) {
                $this->employer_model->edit_profile($profile);
            }else{
                $this->employer_model->add_profile($profile);
            }

        $this->session->set_flashdata('msg_success', 'Success Update Profile');     
        $this->session->set_flashdata('tab_profile', '#tab_edit_about');
        
        redirect(base_url().'employer/profile/');

    }

    function edit_additional_info(){
        $id = $this->session->userdata('id');
        $dress = $this->input->post('dress');
        $dresscode = '';
        $language = '';
        foreach ($dress as $key => $value) {
            $dresscode .= $value == end($dress) ? $value : $value.',';            
        }

        $languages = $this->input->post('language');
        
        if (!empty($languages)) {
            foreach ($languages as $key => $value) {
                $language .= $value == end($languages) ? $value : $value.',';
            }
        }else{
            $language = '';
        }

        $hour_start = $this->input->post('work_hour_start');
        $hour_end = $this->input->post('work_hour_end');
        $day_start = $this->input->post('day_start');
        $day_end = $this->input->post('day_end');

        $info = array(  'total_staff' => $this->input->post('company_size'),
                        'dress_code' => $dresscode,
                        'working_days' => $day_start.' - '.$day_end,
                        'working_hours' => $hour_start.' - '.$hour_end,
                        'spoken_language' => $language,
                        'benefits' => $this->input->post('benefits'),
                        'total_staff' => $this->input->post('company_size'),
                        );
        $checkAvailabilityProfile = $this->employer_model->check_availability_profile($id);
            
            if ($checkAvailabilityProfile) {
                $this->employer_model->edit_profile($info);
            }else{
                $this->employer_model->add_profile($info);
            }

        $this->session->set_flashdata('msg_success', 'Success Update additional info');   
        $this->session->set_flashdata('tab_profile', '#tab_edit_add_info');
        
        redirect(base_url().'employer/profile/');
    }

    function edit_contact_info(){
        $id = $this->session->userdata('id');
        $address = $this->input->post('contact_info');

        $contact = array('email' => $this->input->post('email'),
                         'address' => json_encode($address) );

        $checkAvailabilityProfile = $this->employer_model->check_availability_profile($id);
            
            if ($checkAvailabilityProfile) {
                $this->employer_model->edit_profile($contact);
            }else{
                $this->employer_model->add_profile($contact);
            }

        $this->session->set_flashdata('msg_success', 'Success update contact info');
        $this->session->set_flashdata('tab_profile', '#tab_edit_contact_info');
        
        redirect(base_url().'employer/profile/');
    }

    function upload_company_logo(){
        if(!empty($_FILES['company_logo']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $checkImage = $this->employer_model->checkImageExist($userImageID);
            $tempFile = $_FILES['company_logo']['tmp_name'];        
            $targetPath = "./assets/img/employer/";

            $path = pathinfo($_FILES['company_logo']['name']);
            $ext = $path['extension'];
            $profile_photo = 'profile_photo_'.$this->session->userdata('id').'_'.md5($this->session->userdata('name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$profile_photo;
            if (!empty($checkImage)) {

                // unlink("./assets/img/student/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{
                move_uploaded_file($tempFile,$targetFile);
            }
        }else{
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $userImage = $this->employer_model->checkImageExist($userImageID);
            $profile_photo = !empty($userImage['name']) ? $userImage['name'] : 'xremo-logo-blue.png';
        }

        $image = array('profile_photo' =>  $profile_photo);

        $this->employer_model->upload_image_logo($image);
        redirect(base_url().'employer/profile/');
        
    }

    function upload_company_header(){
        if(!empty($_FILES['company_header']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'header_photo');
            $checkImage = $this->employer_model->checkImageExist($userImageID);
            $tempFile = $_FILES['company_header']['tmp_name'];        
            $targetPath = "./assets/img/employer/";

            $path = pathinfo($_FILES['company_header']['name']);
            $ext = $path['extension'];
            $header_photo = 'header_photo_'.$this->session->userdata('id').'_'.md5($this->session->userdata('name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$header_photo;
            if (!empty($checkImage)) {

                // unlink("./assets/img/student/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{
                move_uploaded_file($tempFile,$targetFile);
            }
        }else{
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'header_photo');
            $userImage = $this->employer_model->checkImageExist($userImageID);
            $header_photo = !empty($userImage['name']) ? $userImage['name'] : 'xremo-logo-blue.png';
        }

        $image = array('header_photo' =>  $header_photo);

        $this->employer_model->upload_image_header($image);
        redirect(base_url().'employer/profile/');

    }

    public function company(){
        $this->session->unset_userdata('article_page');
		$this->session->set_userdata('article_page', 1);
		
		$id= base64_decode($this->uri->segment(URI_SEGMENT_DETAIL));
        if (!$id) {
            redirect(show_404());
        }
        $profile_form['job'] = $this->employer_model->get_job_post($id);
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile_form['detail'] = $get_user_profile;
        $profile_form['social'] = $this->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $id ));
        $profile_form['profile_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $id, 'type'=>'profile_photo'));
        $profile_form['header_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $id, 'type'=>'header_photo'));
        $this->load->view('employer/company_profile', $profile_form);
    }
	
	public function company_page($id,$separator,$page){
        if($page < 1 || !is_numeric($page)){
			redirect(base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL));
		}
		$this->session->set_userdata('article_page', $page);
		
		$id= base64_decode($this->uri->segment(URI_SEGMENT_DETAIL));
        if (!$id) {
            redirect(show_404());
        }
        $profile_form['job'] = $this->employer_model->get_job_post($id);
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile_form['detail'] = $get_user_profile;
        $profile_form['social'] = $this->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $id ));
        $profile_form['profile_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $id, 'type'=>'profile_photo'));
        $profile_form['header_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $id, 'type'=>'header_photo'));
        $this->load->view('employer/company_profile', $profile_form);
	}

    public function detail_profile(){
        $id = base64_decode($this->input->post('user_id'));
        $profile['user_profile'] = $this->student_model->get_user_profile($id);
        print json_encode($profile);
    }
}
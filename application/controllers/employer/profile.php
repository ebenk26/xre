<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('student_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
    }
    
    public function index(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }

        $profile['page_title'] = 'Profile';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $profile['detail'] = $get_user_profile;
        $profile_form['industries'] = $this->employer_model->get('industries', 'name', 'asc');
        $profile_form['countries'] = $this->employer_model->get('countries', 'name', 'asc');
        $profile_form['detail'] = $get_user_profile;
        $profile_form['languages'] = $this->employer_model->get('language', 'name', 'asc');
        $profile_form['social'] = $this->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $this->session->userdata('id') ));
        $profile_form['profile_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $this->session->userdata('id'), 'type'=>'profile_photo'));
        $profile_form['header_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $this->session->userdata('id'), 'type'=>'header_photo'));
        $profile_form['user_profile'] = $get_user_profile;
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/profile', $profile_form);
        $this->load->view('employer/main/footer', $profile);
	}

    function edit_profile(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }

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
                }else{
                    $this->session->set_flashdata('msg_failed', 'Please input your social media');    
                    redirect(base_url().'employer/profile');
                }
            }
        }else{
            $this->employer_model->delete_social($id);
        }

        $countryCode     = $this->session->userdata('country_code');
        $getCountryId    = $this->global_model->get_where('countries', array('country_code'=>$countryCode));

        $profile = array('company_name'                 => $this->input->post('company_name'),
                         'shipping_name'                => $this->input->post('company_name'),
                         'billing_name'                 => $this->input->post('company_name'),
						 'email'                        => $this->input->post('email'),
                         'company_registration_number'  => $this->input->post('company_registration_number'),
                         'company_industry_id'          => $this->input->post('industry'),
                         'company_description'          => $this->input->post('about_company'),
                         'country_id' => $getCountryId[0]['id'],
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
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Update Company Profile",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
        
        redirect(base_url().'employer/profile');

    }

    function edit_additional_info(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }
        $id = $this->session->userdata('id');
        $dress = $this->input->post('dress');
        $dresscode = '';
        $language = '';
        $dresscode = implode(',',$dress);

        $languages = $this->input->post('language');
        
        if (!empty($languages)) {
            $language = implode(',',$languages);
        }else{
            $language = '';
        }

        
        
        $info = array(  'total_staff' => $this->input->post('company_size'),
                        'dress_code' => $dresscode,
                        'working_days_start' => $this->input->post('day_start'),
                        'working_days_end' => $this->input->post('day_end'),
                        'working_hours_start' => $this->input->post('work_hour_start'),
                        'working_hours_end' => $this->input->post('work_hour_end'),
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
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }
        $id = $this->session->userdata('id');
        $address = $this->input->post('contact_info');
        // var_dump(json_encode($address,JSON_PRETTY_PRINT));exit();

        //BEGIN : SET SHIPPING ADDRESS AND LAT LONG
        $hq = false;$array_no = 0;$no = 0;
        foreach($address as $value){
            if(isset($value['optionsRadios']) && $value['optionsRadios'] == "HQ"){
                $hq = true;$array_no = $no;break;
            }
            $no++;
        }
        if($hq){
            $shipping = array(
                        'shipping_address'  => $address[$array_no]["building_address"],
                        'shipping_city'     => $address[$array_no]["building_city"],
                        'shipping_state'    => $address[$array_no]["building_state"],
                        'shipping_country'  => $address[$array_no]["building_country"],
                        'shipping_postcode' => $address[$array_no]["building_postcode"],
                        'shipping_phone'    => $address[$array_no]["building_phone"],
                        'shipping_fax'      => $address[$array_no]["building_fax"],
                        'latitude'          => $address[$array_no]["building_latitude"],
                        'longitude'         => $address[$array_no]["building_longitude"],
            );
            $this->employer_model->edit_profile($shipping);
        }
        //END : SET SHIPPING ADDRESS AND LAT LONG

        $contact = array('address' => json_encode($address) );

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
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }
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
        $this->session->set_userdata('img_profile', $profile_photo);

        $this->employer_model->upload_image_logo($image);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Update Company Logo",
					'icon' 			=> "fa-image",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'employer/profile/');
        
    }

    function upload_company_header(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== 'employer' && empty($this->session->userdata('id'))){
            redirect(base_url());
        }
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
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Update Company Header Image",
					'icon' 			=> "fa-image",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'employer/profile/');

    }

    public function company(){
        $this->session->unset_userdata('article_page');
		$this->session->set_userdata('article_page', 1);
		
		$id= base64_decode($this->uri->segment(URI_SEGMENT_DETAIL));
        if (!$id) {
            redirect(show_404());
        }
        $profile_form['job'] = $this->employer_model->getPostedJob($id);
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile_form['detail'] = $get_user_profile;
        $profile_form['social'] = $this->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $id ));
        $profile_form['profile_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $id, 'type'=>'profile_photo'));
        $profile_form['header_photo'] = $this->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $id, 'type'=>'header_photo'));
        $profile_form['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
		
		//BEGIN : increase number of seen
		if($this->session->userdata('roles') != "administrator" && $this->session->userdata('id') != $id){
			$last_seen_by = $get_user_profile['last_seen_by'];
			$last_seen_at = $get_user_profile['last_seen_at'];
			
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
		//END : increase number of seen
		
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
        $id             = base64_decode($this->input->post('user_id'));
        $applieds_id    = base64_decode($this->input->post('applieds_id'));
        $profile_detail = $this->student_model->get_user_profile($id);
        $applieds_detail= $this->student_model->get_applieds($applieds_id);
        
        $experiences    = array();
        $projects       = array();
        $academics      = array();
        $achievement    = array();
        
        $i=0;
        foreach ($profile_detail['experiences'] as $key => $value) {
            $experiences[$i] = array(   'experiences_user_id'       =>  $value['experiences_user_id'],
                                        'experience_id'             =>  $value['experience_id'],
                                        'experiences_start_date'    =>  date('j F Y', strtotime($value['experiences_start_date'])),
                                        'experiences_end_date'      =>  $value['experiences_end_date'] == '0000-00-00' ? 'Now' : date('j F Y', strtotime($value['experiences_end_date'])),
                                        'experiences_title'         =>  $value['experiences_title'],
                                        'experiences_description'   =>  $value['experiences_description'],
                                        'experiences_company_name'  =>  $value['experiences_company_name'],
                                        'skills'                    =>  $value['skills'],
                                        'industries_id'             =>  $value['industries_id'],
                                        'employment_type_id'        =>  $value['employment_type_id'],
                                        'employment_type'           =>  $value['employment_type'],
                                        'industry_name'             =>  $value['industry_name']);

            $i++;
        }
        foreach ($profile_detail['projects'] as $key => $value) {
            $projects[$i] = array(   'id' => $value['id'],
                                    'user_id' => $value['user_id'],
                                    'start_date' => date('j F Y', strtotime($value['start_date'])),
                                    'end_date' => $value['end_date'] == '0000-00-00' ? 'Now' : date('j F Y', strtotime($value['end_date'])),
                                    'created_at' => $value['created_at'],
                                    'edited_at' => $value['edited_at'],
                                    'skills_acquired' => $value['skills_acquired'],
                                    'name' => $value['name'],
                                    'description' => $value['description']);

            $i++;
        }
        foreach ($profile_detail['academics'] as $key => $value) {
            $academics[$i] = array( 'academic_id' => $value['academic_id'],
                                    'university_name' => $value['university_name'],
                                    'start_date' => date('j F Y', strtotime($value['start_date'])),
                                    'end_date' => $value['end_date'] == '0000-00-00' ? 'Now' : date('j F Y', strtotime($value['end_date'])),
                                    'degree_name' => $value['degree_name'],
                                    'degree_description' => $value['degree_description'],
                                    'qualification_level' => $value['qualification_level']);

            $i++;
        }
        foreach ($profile_detail['achievement'] as $key => $value) {
            $achievement[$i] = array( 'achievement_user_id' => $value['achievement_user_id'],
                                    'achievement_id' => $value['achievement_id'],
                                    'achievement_start_date' => date('j F Y', strtotime($value['achievement_start_date'])),
                                    'achievement_end_date' => $value['achievement_end_date'] == '0000-00-00' ? 'Now' : date('j F Y', strtotime($value['achievement_end_date'])),
                                    'achievement_title' => $value['achievement_title'],
                                    'achievement_description' => $value['achievement_description'],
                                    'achievement_tag' => $value['achievement_tag']);

            $i++;
        }
        $profile_detail['experiences'] = $experiences;
        $profile_detail['projects'] = $projects;
        $profile_detail['academics'] = $academics;
        $profile_detail['achievement'] = $achievement;
        $profile['user_profile'] = $profile_detail;
        $profile['applieds'] = $applieds_detail;
        print json_encode($profile);
    }

    public function newContactInfo()
    {
        $content = array(
                        'countries' => $this->employer_model->get('countries', 'name', 'asc'),
                        'key'       => $this->input->post('num')
                    );

        $data = array( 
                        'form'      => $this->load->view('employer/contactInfo', $content, true)
                    );

        echo json_encode($data);exit();
    }
}
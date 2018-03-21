<?php

class Student_Model extends CI_Model{

    //insert employee details to employee table
    public function profile_post($profile){
        $query = $this->db->get_where('user_address', array('user_id' => $this->session->userdata('id')));
        $checkUserAddressExist = $query->last_row('array');
        $queryBio = $this->db->get_where('student_bios', array('user_id' => $this->session->userdata('id')));
        $checkUserBioExist = $queryBio->last_row('array');        
        $userProfilePhotoID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
        $userHeaderPhotoID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'header_photo');
        $checkUserProfilePhotoExist = $this->checkImageExist($userProfilePhotoID);
        $checkUserHeaderPhotoExist = $this->checkImageExist($userHeaderPhotoID);
        
        if($profile['profile_photo'] != ""){
            $dataUploadsProfilePhoto = array(
                'user_id' => $this->session->userdata('id'),
                'name' => $profile['profile_photo'],
                'type' => 'profile_photo',
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        
        if($profile['header_photo'] != ""){
            $dataUploadsHeaderPhoto = array(
                'user_id' => $this->session->userdata('id'),
                'name' => $profile['header_photo'],
                'type' => 'header_photo',
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        

        $dataBios = array(
           'user_id' => $this->session->userdata('id'),
           'youtubelink' => $profile['youtubelink'],
           'quote' => $profile['quote'],
           'summary' => $profile['summary'],
           'gender' => $profile['gender'],
           'date_of_birth' => $profile['date_of_birth'],
           'expected_salary' => $profile['expected_salary'],
           'occupation' => $profile['occupation'],
           'contact_number' => $profile['contact_number'],
           'updated_at' => date('Y-m-d H:i:s')
        );

        $dataAddress = array(
           'user_id' => $this->session->userdata('id'),
           'address' => $profile['address'],
           'postcode' => $profile['postcode'],
           'city' => $profile['city'],
           'state' => $profile['state'],
           'country' => $profile['country'],
           'updated_at' => date('Y-m-d H:i:s')
        );
        
        $dataUsers = array(
           'id' => $this->session->userdata('id'),
           'fullname' => $profile['student_name'],
           'preference_name' => $profile['preferences_name'],
           'updated_at' => date('Y-m-d H:i:s')
        );

        $language_set =$this->get_where_array('user_language_set', array('user_id'=>$this->session->userdata('id')), 'id', 'asc');

        $reference_set =$this->get_where_array('user_reference', array('user_id'=>$this->session->userdata('id')), 'id', 'asc');

        try{

            //language
            if (!empty($language_set)) {
                foreach ($language_set as $key => $value) {
                        $this->db->where('id', $value['id']);
                        $this->db->delete('user_language_set'); 
                }
            }

            if (!empty($profile['language'])) {
                foreach ($profile['language'] as $key => $value) {
                    if($value['name'] != "" && $value['written'] != "" && $value['spoken'] != ""){
                        $userLanguage = array(  'user_id' => $this->session->userdata('id'),
                                                'language' => $value['name'],
                                                'written' => $value['written'],
                                                'spoken' => $value['spoken'] );

                        $this->db->insert('user_language_set', $userLanguage);
                    }                
                }
            }

            //reference
            if (!empty($reference_set)) {
                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->delete('user_reference');
            }

            if (!empty($profile['reference'])) {
                foreach ($profile['reference'] as $key => $value) {
                    $userReference = array( 'user_id' => $this->session->userdata('id'),
                                            'reference_name' => $value['reference_name'],
                                            'reference_email' => $value['reference_email'],
                                            'reference_relationship' => $value['reference_relationship'],
                                            'reference_phone' => $value['reference_phone'],
                                            'created_at' => date('Y-m-d H:i:s') );

                    $this->db->insert('user_reference', $userReference);                
                }
            }

            if($profile['profile_photo'] != ""){
                if ($checkUserProfilePhotoExist) {
                    $this->db->where($userProfilePhotoID);
                    $this->db->update('profile_uploads', $dataUploadsProfilePhoto); 
                }else{
                    $this->db->insert('profile_uploads', $dataUploadsProfilePhoto); 
                }
            }
            
            if($profile['header_photo'] != ""){
                if ($checkUserHeaderPhotoExist) {
                    $this->db->where($userHeaderPhotoID);
                    $this->db->update('profile_uploads', $dataUploadsHeaderPhoto); 
                }else{
                    $this->db->insert('profile_uploads', $dataUploadsHeaderPhoto); 
                }
            }
            

            if ($checkUserBioExist) {
                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->update('student_bios', $dataBios); 
            }else{
                $this->db->insert('student_bios', $dataBios); 
            }

            if ($this->session->userdata('id')) {
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('users', $dataUsers); 
            }

            if ($checkUserAddressExist) {
                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->update('user_address', $dataAddress); 
            }else{
                $this->db->insert('user_address', $dataAddress); 
            }
            $this->session->set_flashdata('msg_success', 'Success update your data');
        }catch(Exception $e){
            $this->session->set_flashdata('msg_failed', 'Failed update your data, please try again');
            return false;
        }

        return true;      
    }

    function get_user_profile($id){
        //experiences
        $this->db->select('experiences.user_id as experiences_user_id, experiences.id as experience_id, experiences.title as experiences_title, experiences.description as experiences_description, experiences.start_date as experiences_start_date, experiences.end_date as experiences_end_date, experiences.company_name as experiences_company_name, experiences.skills, experiences.industries_id, experiences.employment_type_id, employment_types.name as employment_type, industries.name as industry_name');
        $this->db->from('users');
        $this->db->join('experiences', 'experiences.user_id = users.id','left');
        $this->db->join('employment_types', 'employment_types.id = experiences.employment_type_id','left');
        $this->db->join('industries', 'industries.id = experiences.industries_id','left');
        $this->db->where(array('experiences.user_id' => $id));
        $experiences = $this->db->get();
        $result['experiences'] = $experiences->result_array();
        if ($experiences->result_array()) {
            $result['exp_percent'] =  0.10;
        }else{
            $result['exp_percent'] =  0;
        }
        
        //achievement
        $this->db->select('achievement.user_id as achievement_user_id, achievement.id as achievement_id, achievement.achievement_name as achievement_title, achievement.achievement_description as achievement_description, achievement.tag as achievement_tag, achievement.start_date as achievement_start_date, achievement.end_date as achievement_end_date');
        $this->db->from('users');
        $this->db->join('achievement', 'achievement.user_id = users.id','left');
        $this->db->where(array('achievement.user_id' => $id));
        $this->db->order_by('achievement_id','asc');
        $achievement = $this->db->get();
        $result['achievement'] = $achievement->result_array();
        if ($experiences->result_array()) {
            $result['achievement_percent'] =  0.10;
        }else{
            $result['achievement_percent'] =  0;
        }

        //overview
        $this->db->select('users.fullname as name, users.email as email, users.preference_name as preference_name, users.verified as verified, student_bios.youtubelink as youtubelink, student_bios.quote as quote, student_bios.summary as summary, student_bios.gender as student_bios_gender, student_bios.date_of_birth as student_bios_DOB, student_bios.occupation as student_bios_occupation, student_bios.contact_number as student_bios_contact_number, student_bios.expected_salary as expected_salary, users.number_of_seen, users.last_seen_by, users.last_seen_at, users.id as id_users, users.preference_name, profile_uploads.name as profile_photo');
        $this->db->from('users');
        $this->db->join('student_bios', 'student_bios.user_id = users.id');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"','left');
        $this->db->where(array('student_bios.user_id' => $id));
        $overview = $this->db->get();
        $result['overview'] = $overview->last_row('array');
        // var_dump($result['overview']['name']);exit;
        $overviews['name'] = !empty($result['overview']['name']) ? 0.03 : 0;
        $overviews['preference_name'] = !empty($result['overview']['preference_name']) ? 0.03 : 0;
        $overviews['youtubelink'] = !empty($result['overview']['youtubelink']) ? 0.03 : 0;
        $overviews['student_bios_gender'] = !empty($result['overview']['student_bios_gender']) ? 0.03 : 0;
        $overviews['student_bios_DOB'] = !empty($result['overview']['student_bios_DOB']) ? 0.03 : 0;
        $overviews['student_bios_contact_number'] = !empty($result['overview']['student_bios_contact_number']) ? 0.03 : 0;
        $overviews['expected_salary'] = !empty($result['overview']['expected_salary']) ? 0.03 : 0;
        $overviews['summary'] = !empty($result['overview']['summary']) ? 0.03 : 0;
        $overviews['quote'] = !empty($result['overview']['quote']) ? 0.03 : 0;
        
        if ($overviews) {
            $result['overview_percent'] =  $overviews['name'] + $overviews['preference_name'] + $overviews['youtubelink'] + $overviews['student_bios_gender'] + $overviews['student_bios_DOB'] + $overviews['student_bios_contact_number'] + $overviews['expected_salary'] + $overviews['summary'] + $overviews['quote'];
        }else{
            $result['overview_percent'] =  0;
        }


        //academics
        $this->db->select('academics.id as academic_id, academics.university_name, academics.degree_name, academics.degree_description, academics.qualification_level, academics.date, academics.start_date, academics.end_date');
        $this->db->from('users');
        $this->db->join('academics', 'academics.user_id = users.id');
        $this->db->where(array('academics.user_id' => $id));
        $academics = $this->db->get();
        $result['academics'] = $academics->result_array();
        if ($academics->result_array()) {
            $result['academic_percent'] =  0.15;
        }else{
            $result['academic_percent'] =  0;
        }

        //skills
        $this->db->select('user_skill_set.id, user_skill_set.name as title, user_skill_set.description, user_skill_set.level');
        $this->db->from('users');
        $this->db->join('user_skill_set', 'user_skill_set.user_id = users.id','left');
        $this->db->where(array('user_skill_set.user_id' => $id));
        $student_skill = $this->db->get();
        $result['skills'] = $student_skill->result_array();
        if ($student_skill->result_array()) {
            $result['student_skill_percent'] =  0;
        }else{
            $result['student_skill_percent'] =  0;
        }

        //skills
        $this->db->select('user_skill_set.id as id, user_skill_set.id as skill_id ,user_skill_set.name, user_skill_set.description, user_skill_set.level');
        $this->db->from('users');
        $this->db->join('user_skill_set', 'user_skill_set.user_id = users.id','left');
        $this->db->where(array('user_skill_set.user_id' => $id));
        $skills = $this->db->get();
        $result['skill'] = $skills->result_array();
        if ($skills->result_array()) {
            $result['skill_percent'] =  0.1;
        }else{
            $result['skill_percent'] = 0;
        }

        //address
        $this->db->select('user_address.address, user_address.postcode, user_address.city, user_address.state as states, user_address.country');
        $this->db->from('users');
        $this->db->join('user_address', 'user_address.user_id = users.id','left');
        $this->db->where(array('user_address.user_id' => $id));
        $address = $this->db->get();
        $result['address'] = current($address->result_array());  
        $address_precentage['country'] = !empty($result['address']['country']) ? 0.03 : 0;
        $address_precentage['address'] = !empty($result['address']['address']) ? 0.03 : 0;
        $address_precentage['city'] = !empty($result['address']['city']) ? 0.03 : 0;
        $address_precentage['state'] = !empty($result['address']['states']) ? 0.03 : 0;
        $address_precentage['postcode'] = !empty($result['address']['postcode']) ? 0.03 : 0;

        if ($address_precentage) {
            $result['address_percent'] =  $address_precentage['country'] + $address_precentage['address'] + $address_precentage['city'] + $address_precentage['state'] + $address_precentage['postcode'];
        }else{
            $result['address_percent'] =  0;
        }

        //image
        $this->db->select('profile_uploads.name, profile_uploads.type');
        $this->db->from('users');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id');
        $this->db->where(array('profile_uploads.user_id' => $id));
        $image = $this->db->get();
        $result['image'] = $image->result_array();
        foreach ($result['image'] as $key => $value) {
            $result[$value['type']] = $value['name'];
        }

        //image profile
        $this->db->select('profile_uploads.name, profile_uploads.type');
        $this->db->from('users');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id','left');
        $this->db->where(array('profile_uploads.user_id' => $id));
        $this->db->where(array('profile_uploads.type' => 'profile_photo'));
        $image = $this->db->get();
        $result['image_profile'] = $image->last_row('array');

        if ($result['image_profile']) {
            $result['image_profile'] =  0.08;
        }else{
            $result['image_profile'] =  0;
        }


        //image header profile
        $this->db->select('profile_uploads.name, profile_uploads.type');
        $this->db->from('users');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id','left');
        $this->db->where(array('profile_uploads.user_id' => $id));
        $this->db->where(array('profile_uploads.type' => 'header_photo'));
        $image = $this->db->get();
        $result['image_header'] = $image->last_row('array');

        if ($result['image_header']) {
            $result['image_header'] =  0.02;
        }else{
            $result['image_header'] =  0;
        }        

        $result['image_percent'] = $result['image_profile'] + $result['image_header'];


        //skills
        $this->db->select('user_skill_set.id as id, user_skill_set.id as skill_id ,user_skill_set.name, user_skill_set.description, user_skill_set.level');
        $this->db->from('users');
        $this->db->join('user_skill_set', 'user_skill_set.user_id = users.id','left');
        $this->db->where(array('user_skill_set.user_id' => $id));
        $skills = $this->db->get();
        $result['skill'] = $skills->result_array();
        if ($skills->result_array()) {
            $result['skill_percent'] =  0;
        }else{
            $result['skill_percent'] = 0;
        }


        //language
        $this->db->select('user_language_set.id as id, user_language_set.id as skill_id ,user_language_set.language as title, user_language_set.written, user_language_set.spoken');
        $this->db->from('users');
        $this->db->join('user_language_set', 'user_language_set.user_id = users.id','left');
        $this->db->where(array('user_language_set.user_id' => $id));
        $language = $this->db->get();
        $result['language'] = $language->result_array();
        if ($language->result_array()) {
            $result['language_percent'] =  0.03;
        }else{
            $result['language_percent'] = 0;
        }

        //reference
        $this->db->select('user_reference.*');
        $this->db->from('users');
        $this->db->join('user_reference', 'user_reference.user_id = users.id','left');
        $this->db->where(array('user_reference.user_id' => $id));
        $reference = $this->db->get();
        $result['reference'] = $reference->result_array();
        if ($reference->result_array()) {
            $result['reference_percent'] = 0;
        }else{
            $result['reference_percent'] = 0;
        }

        //project
        $this->db->select('*');
        $this->db->from('user_projects');
        $this->db->where(array('user_id' => $id));
        $project = $this->db->get();
        $result['projects'] = $project->result_array();
        if ($project->result_array()) {
            $result['project_percent'] =  0.1;
        }else{
            $result['project_percent'] = 0;
        }


        $result['percent'] = ( $result['exp_percent'] + $result['achievement_percent'] + $result['overview_percent'] + $result['academic_percent'] + $result['image_percent'] + $result['project_percent'] + $result['language_percent'] + $result['address_percent'] ) *100;

        return $result;
    }

    function checkImageExist($userImageID){
        $this->db->select('*');
        $this->db->from('profile_uploads');
        $this->db->where($userImageID);
        $query = $this->db->get();
        return $query->last_row('array');
    }

    function get_user_academics($id, $academic_id){
        //academics
        $this->db->select('academics.id as academic_id, academics.university_name, academics.degree_name, academics.degree_description, academics.qualification_level, academics.date, academics.start_date, academics.end_date');
        $this->db->from('users');
        $this->db->join('academics', 'academics.user_id = users.id');
        $this->db->where(array('academics.user_id' => $id, 'academics.id'=> $academic_id));
        $overview = $this->db->get();
        return $overview->last_row('array');
    }


    function get_all_job($id){
        $this->db->select('user_profiles.*, users.id as user_id, users.fullname as fullname, states.name as state_name, countries.name as country_name, industries.name as industry_name, position_levels.name as position_name, job_positions.created_at as job_created_time, job_positions.name as job_post, job_positions.id as job_id, job_positions.budget_min as min_budget, job_positions.budget_max as max_budget, employment_types.name as employment_name, profile_uploads.name as profile_photo');
        $this->db->from('users');
        $this->db->join('user_profiles', 'users.id = user_profiles.user_id', 'left');
        $this->db->join('states', 'states.id = user_profiles.state_id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('job_positions', 'job_positions.user_id = users.id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
        $this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');
		$this->db->join('profile_uploads', 'profile_uploads.user_id = job_positions.user_id', 'left');
		$this->db->where('expiry_date >=', date('Y-m-d')); 
        $this->db->where('job_positions.status', 'post');
		$this->db->where('profile_uploads.type', 'profile_photo');
        $this->db->order_by('job_positions.id', 'DESC');
        $allJob = $this->db->get();
        return $allJob->result_array();
    }
	
	function get_all_new_job($last_login){
        $this->db->select('user_profiles.*, users.id as user_id, users.fullname as fullname, states.name as state_name, countries.name as country_name, industries.name as industry_name, position_levels.name as position_name, job_positions.created_at as job_created_time, job_positions.name as job_post, job_positions.id as job_id, job_positions.budget_min as min_budget, job_positions.budget_max as max_budget, employment_types.name as employment_name');
        $this->db->from('users');
        $this->db->join('user_profiles', 'users.id = user_profiles.user_id', 'left');
        $this->db->join('states', 'states.id = user_profiles.state_id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('job_positions', 'job_positions.user_id = users.id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
        $this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');
        //$this->db->where('job_positions.created_at >=', $last_login);
		$this->db->where('job_positions.expiry_date >=', date('Y-m-d'));		
        $this->db->where('job_positions.status', 'post');
		$this->db->order_by('job_positions.id', 'DESC');
		$this->db->limit(5);
        $allJob = $this->db->get();
        return $allJob->result_array();
    }
	
	function get_new_join($last_login){
        $this->db->select('users.*, student_bios.quote, student_bios.summary, profile_uploads.name as profile_photo');
        $this->db->from('users');
        $this->db->join('student_bios', 'student_bios.user_id = users.id');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"', 'left');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where('users.created_at >=', $last_login);
		$this->db->where('users.id !=', $this->session->userdata('id'));
		$this->db->where('roles.slug', 'student');
		$this->db->order_by('users.id', 'DESC');
		$this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }

    function get_user_history($id){
        //login history
        $this->db->select('users.*, user_history.created_at as user_history');
        $this->db->from('users');
        $this->db->join('user_history', 'user_history.user_id = users.id','left');
        $this->db->where(array('user_history.user_id' => $id));
        $history = $this->db->get();
        $result = $history->result_array();
        return $result;
    }

    function add($value, $table){
        try{
            if (isset($value)) {
                $this->db->insert($table, $value); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;   
    }

    function update($value, $table){
        try{
            if (isset($value)) {
                $this->db->where(array('user_id' => $value['user_id'], 'id'=> $value['id']));
                $this->db->update($table, $value); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function delete($value, $table){
        try{
            if (isset($value)) {
                $this->db->where('id', $value['id']);
                $this->db->delete($table);
            }
        }catch(Exception $e){
            return false;
        }
        return true;   
    }

    function get_array($table, $order_by='created_at', $order='asc'){
        $this->db->order_by($order_by, $order); 
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function get_where_array($table, $where, $order_by='created_at', $order='asc'){
        $this->db->order_by($order_by, $order); 
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result_array();   
    }

    function get_last_row_array($table){
        $query = $this->db->get($table);
        return $query->last_row('array');
    }

    function get_notification($id){

        $this->db->select('interview_schedule.*, interview_schedule_user.job_id as interview_job_id, interview_schedule_user.session_id, interview_schedule_user.employer_id, interview_schedule_user.user_id, interview_schedule_user.status, job_positions.name as job_name, user_profiles.company_name');
        $this->db->from('interview_schedule');
        $this->db->join('interview_schedule_user','interview_schedule_user.session_id = interview_schedule.id', 'left' );
        $this->db->join('job_positions','job_positions.id = interview_schedule_user.job_id', 'left' );
        $this->db->join('user_profiles','user_profiles.user_id = interview_schedule_user.employer_id', 'left' );
        $this->db->join('student_bios','student_bios.user_id = interview_schedule_user.user_id', 'left' );
        $this->db->where('interview_schedule_user.user_id', $id); 
        $interview = $this->db->get();
        $result['interview'] = $interview->result_array();

        return $result;
    }

    function get_interview_invitation($id){

        $this->db->select('interview_schedule.*, interview_schedule_user.job_id as interview_job_id, interview_schedule_user.session_id, interview_schedule_user.employer_id, interview_schedule_user.user_id, interview_schedule_user.status, job_positions.name as job_name, user_profiles.company_name');
        $this->db->from('interview_schedule');
        $this->db->join('interview_schedule_user','interview_schedule_user.session_id = interview_schedule.id', 'left' );
        $this->db->join('job_positions','job_positions.id = interview_schedule_user.job_id', 'left' );
        $this->db->join('user_profiles','user_profiles.user_id = interview_schedule_user.employer_id', 'left' );
        $this->db->join('student_bios','student_bios.user_id = interview_schedule_user.user_id', 'left' );
        $this->db->where('interview_schedule_user.user_id', $id); 
        $this->db->where('interview_schedule_user.status !=', 'reject');
        $interview = $this->db->get();

        return $interview->result_array();
    }
	
	function get_upcoming_interview($id){
        //upcoming_interview
        $this->db->select('interview_schedule_user.employer_id, interview_schedule_user.job_id, interview_schedule.title, interview_schedule.description, interview_schedule.start_date, job_positions.name as position, user_profiles.company_name, profile_uploads.name as profile_photo');
        $this->db->from('interview_schedule_user');
        $this->db->join('job_positions', 'job_positions.id = interview_schedule_user.job_id','left');
        $this->db->join('interview_schedule', 'interview_schedule.id = interview_schedule_user.session_id','left');
        $this->db->join('users', 'users.id = interview_schedule_user.employer_id','left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id','left');
		$this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"','left');
        $this->db->where(array('interview_schedule_user.user_id' => $id, 'interview_schedule_user.status' => 'accept', 'interview_schedule.start_date >' => date('Y-m-d')));
        $query = $this->db->get();
        $result['upcoming_interview'] = $query->result();
        $result['upcoming_interview_number'] = $query->num_rows();
		//, 'profile_uploads.type' => 'profile_photo'
		return $result;
	}

    function get_applieds($id){
        $this->db->select('*');
        $this->db->from('applieds');
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        return $query->last_row('array');
    }
	

    function get_endorser($data){

        $this->db->select('endorse.*, users.id, users.fullname, user_profiles.company_name, profile_uploads.name as profile_photo, roles.slug as roles, profile_uploads.type');
        $this->db->from('endorse');
        $this->db->join('users', 'endorse.endorser_user_id = users.id','left');
        $this->db->join('user_profiles', 'users.id = user_profiles.user_id', 'left');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type != "header_photo"','left');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_review($data){

        $this->db->select('reviews.*, users.id, users.fullname, user_profiles.company_name as company_name, profile_uploads.name as profile_photo, roles.slug as roles, profile_uploads.type');
        $this->db->from('reviews');
        $this->db->join('users', 'reviews.endorser_id = users.id','left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type != "header_photo"','left');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_ratings($data){

        $this->db->select('ratings.*, users.id, users.fullname, user_profiles.company_name as company_name, profile_uploads.name as profile_photo, roles.slug as roles, profile_uploads.type');
        $this->db->from('ratings');
        $this->db->join('users', 'ratings.endorser_id = users.id','left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type != "header_photo"','left');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
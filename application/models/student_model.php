<?php

class Student_Model extends CI_Model{

    //insert employee details to employee table
    public function profile_post($profile){
        $query = $this->db->get_where('user_address', array('user_id' => $this->session->userdata('id')));
        $checkUserAddressExist = $query->last_row('array');
        $queryBio = $this->db->get_where('student_bios', array('user_id' => $this->session->userdata('id')));
        $checkUserBioExist = $queryBio->last_row('array');
        $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
        $checkUserImageExist = $this->checkImageExist($userImageID);

        try{

            $dataUploads = array(
                'name' => $profile['image'],
                'type' => $profile['type'],
                'updated_at' => date('Y-m-d H:i:s')
            );

            $dataBios = array(
               'youtubelink' => $profile['youtubelink'],
               'quote' => $profile['quote'],
               'summary' => $profile['summary'],
               'gender' => $profile['gender'],
               'date_of_birth' => $profile['date_of_birth'],
               'occupation' => $profile['occupation'],
               'contact_number' => $profile['contact_number'],
               'updated_at' => date('Y-m-d H:i:s')
            );

            $dataAddress = array(
               'address' => $profile['address'],
               'postcode' => $profile['postcode'],
               'city' => $profile['city'],
               'state' => $profile['state'],
               'country' => $profile['country'],
               'updated_at' => date('Y-m-d H:i:s')
            );
            
            $dataUsers = array(
               'fullname' => $profile['student_name'],
               'preference_name' => $profile['preferences_name'],
               'updated_at' => date('Y-m-d H:i:s')
            );

            if (isset($checkUserImageExist)) {
                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->update('profile_uploads', $dataUploads); 
            }else{
                $this->db->post('profile_uploads', $dataUploads); 
            }

            if (isset($checkUserBioExist)) {
                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->update('student_bios', $dataBios); 
            }else{
                $this->db->post('student_bios', $dataBios); 
            }

            if ($this->session->userdata('id')) {
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('users', $dataUsers); 
            }

            if (isset($checkUserAddressExist)) {

                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->update('user_address', $dataAddress); 
            }else{
                
                $this->db->post('user_address', $dataAddress); 
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
        $this->db->select('experiences.user_id as experiences_user_id, experiences.id as experience_id, experiences.title as experiences_title, experiences.description as experiences_description, experiences.start_date as experiences_start_date, experiences.end_date as experiences_end_date, experiences.company_name as experiences_company_name');
        $this->db->from('users');
        $this->db->join('experiences', 'experiences.user_id = users.id','left');
        $this->db->where(array('experiences.user_id' => $id));
        $experiences = $this->db->get();
        $result['experiences'] = $experiences->result_array();
        if (!empty($experiences->result_array())) {
            $result['exp_percent'] =  0.1;
        }else{
            $result['exp_percent'] =  0;
        }
        
        //achievement
        $this->db->select('achievement.user_id as achievement_user_id, achievement.id as achievement_id, achievement.achievement_name as achievement_title, achievement.achievement_description as achievement_description, achievement.start_date as achievement_start_date, achievement.end_date as achievement_end_date');
        $this->db->from('users');
        $this->db->join('achievement', 'achievement.user_id = users.id','left');
        $this->db->where(array('achievement.user_id' => $id));
        $achievement = $this->db->get();
        $result['achievement'] = $achievement->result_array();
        if (!empty($experiences->result_array())) {
            $result['achievement_percent'] =  0.1;
        }else{
            $result['achievement_percent'] =  0;
        }

        //overview
        $this->db->select('users.fullname as name, users.preference_name as preference_name, users.verified as verified, student_bios.youtubelink as youtubelink, student_bios.quote as quote, student_bios.summary as summary, student_bios.gender as student_bios_gender, student_bios.date_of_birth as student_bios_DOB, student_bios.occupation as student_bios_occupation, student_bios.contact_number as student_bios_contact_number');
        $this->db->from('users');
        $this->db->join('student_bios', 'student_bios.user_id = users.id');
        $this->db->where(array('student_bios.user_id' => $id));
        $overview = $this->db->get();
        $result['overview'] = $overview->last_row('array');
        if (!empty($overview->last_row('array'))) {
            $result['overview_percent'] =  0.3;
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
        if (!empty($academics->result_array())) {
            $result['academic_percent'] =  0.1;
        }else{
            $result['academic_percent'] =  0;
        }

        //skills
        $this->db->select('student_skills.id, student_skills.title, student_skills.description, student_skills.skills');
        $this->db->from('users');
        $this->db->join('student_skills', 'student_skills.user_id = users.id','left');
        $this->db->where(array('student_skills.user_id' => $id));
        $student_skill = $this->db->get();
        $result['skills'] = $student_skill->result_array();
        if (!empty($student_skill->result_array())) {
            $result['student_skill_percent'] =  0.1;
        }else{
            $result['student_skill_percent'] =  0;
        }

        //address
        $this->db->select('user_address.address, user_address.postcode, user_address.city, user_address.state as states, user_address.country');
        $this->db->from('users');
        $this->db->join('user_address', 'user_address.user_id = users.id','left');
        $this->db->where(array('user_address.user_id' => $id));
        $address = $this->db->get();
        $result['address'] = current($address->result_array());  
        if (!empty($address->result_array())) {
            $result['address_percent'] =  0.1;
        }else{
            $result['address_percent'] =  0;
        }

        //image
        $this->db->select('profile_uploads.name, profile_uploads.type');
        $this->db->from('users');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id','left');
        $this->db->where(array('profile_uploads.user_id' => $id));
        $image = $this->db->get();
        $result['image'] = current($image->result_array());
        if (!empty($image->result_array())) {
            $result['image_percent'] =  0.1;
        }else{
            $result['image_percent'] =  0;
        }

        //skills
        $this->db->select('user_skill_set.id as id, user_skill_set.id as skill_id ,user_skill_set.name, user_skill_set.description, user_skill_set.level');
        $this->db->from('users');
        $this->db->join('user_skill_set', 'user_skill_set.user_id = users.id','left');
        $this->db->where(array('user_skill_set.user_id' => $id));
        $skills = $this->db->get();
        $result['skill'] = $skills->result_array();
        if (!empty($skills->result_array())) {
            $result['skill_percent'] =  0.1;
        }else{
            $result['skill_percent'] = 0;
        }

        $result['percent'] = ( $result['exp_percent'] + $result['achievement_percent'] + $result['overview_percent'] + $result['academic_percent'] + $result['student_skill_percent'] + $result['address_percent'] + $result['image_percent'] + $result['skill_percent'] ) *100;

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

    function education_edit($education){
        try{
            if (isset($education)) {
                $this->db->where(array('user_id' => $education['user_id'], 'id'=> $education['id']));
                $this->db->update('academics', $education); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function education_add($education){
        try{
            if (isset($education)) {
                $this->db->insert('academics', $education); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function experience_add($experience){
        try{
            if (isset($experience)) {
                $this->db->insert('experiences', $experience); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function experience_edit($experience){
        try{
            if (isset($experience)) {
                $this->db->where(array('user_id' => $experience['user_id'], 'id'=> $experience['id']));
                $this->db->update('experiences', $experience); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }
    
    function skill_edit($skill){
        try{
            if (isset($skill)) {
                $this->db->where(array('user_id' => $skill['user_id'], 'id'=> $skill['id']));
                $this->db->update('user_skill_set', $skill); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function skill_add($skill){
        try{
            if (isset($skill)) {
                $this->db->insert('user_skill_set', $skill); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function user_language_edit($language){
        try{
            if (isset($language)) {
                $this->db->where(array('user_id' => $language['user_id'], 'id'=> $language['id']));
                $this->db->update('user_language_set', $language); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function user_language_add($language){
        try{
            if (isset($language)) {
                $this->db->insert('user_language_set', $language); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function user_project_edit($projects){
        try{
            if (isset($projects)) {
                $this->db->where(array('user_id' => $projects['user_id'], 'id'=> $projects['id']));
                $this->db->update('user_projects', $projects); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function user_project_add($projects){
        try{
            if (isset($projects)) {
                $this->db->insert('user_projects', $projects); 
            }
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function delete($deleteData){
        try{
            if (isset($deleteData)) {
                $this->db->where('id', $deleteData['id']);
                $this->db->delete($deleteData['table']);
            }
        }catch(Exception $e){
            return false;
        }
        return true;   
    }
}

?>
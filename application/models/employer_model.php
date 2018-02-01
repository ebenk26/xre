<?php

class Employer_Model extends CI_Model{

    function get_position(){
        $query = $this->db->get('position_levels');
        return $query->result_array();
    }

    function get_employment(){
        $query = $this->db->get('employment_types');
        return $query->result_array();
    }

    function get_position_specialization(){
        $query = $this->db->get('position_specializations');
        return $query->result_array();
    }

    function get_year_of_experience(){
        $query = $this->db->get('year_of_experience');
        return $query->result_array();
    }

    function get_industries(){
        $query = $this->db->get('industries');
        return $query->result_array();
    }

    function get($table, $order_by='created_at', $order='asc'){
        $this->db->order_by($order_by, $order); 
        $query = $this->db->get($table);
        return $query->result_array();   
    }

    function get_where($table, $order_by='created_at', $order='asc', $where){
        $this->db->order_by($order_by, $order); 
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result_array();   
    }

    function get_user_profile($id){
        $this->db->select('users.id as id_users, users.email as registered_email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, roles.name as roles, user_profiles.*, industries.name as industry, countries.name as country_name, countries.country_code,
            states.name as state_name');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id', 'left');
        $this->db->join('roles', 'roles.id = user_role.role_id', 'left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
        $this->db->join('states', 'states.id = user_profiles.state_id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.company_industry_id', 'left');
        $this->db->where(array('users.id' => $id));
        $query = $this->db->get();
        return $query->last_row('array');
    }

    function check_availability_profile($id){
        $query = $this->db->get_where('user_profiles', array('user_id'=>$id));
        $result = $query->num_rows() > 0 ? true : false;
        return $result;
    }

    function edit_profile($profile){
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->update('user_profiles', $profile); 
    }

    function add_profile($profile){
        try {
            $this->db->insert('user_profiles', $profile);
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed update your profile, please try again');
            return false;
        }
        return true;
    }

    function job_post($jobPost){
        try {
            $this->db->insert('job_positions', $jobPost);
            $insert_id = $this->db->insert_id();
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed post your job, please try again');
            return false;
        }
        return $insert_id;
    }

    function job_edit($jobPost){
        try {
            $this->db->where('id', $jobPost['id']);
            $this->db->update('job_positions', $jobPost);
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed post your job, please try again');
            return false;
        }
        return true;
    }

    function get_job_post($id){
        $this->db->select('job_positions.*, employment_types.name as employment_name');
		$this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');
		$this->db->where('user_id', $id);
        $query = $this->db->get('job_positions');
        return $query->result_array();
    }

    function get_job_detail($id){
        $this->db->select('job_positions.*, position_levels.name as position_name, employment_types.name as employment_name, profile_uploads.name as img');
        $this->db->from('job_positions');
        $this->db->join('position_levels', 'job_positions.position_level_id = position_levels.id', 'left');
        $this->db->join('employment_types', 'job_positions.employment_type_id = employment_types.id', 'left');
        $this->db->join('profile_uploads', 'job_positions.user_id = profile_uploads.user_id', 'left');
        $this->db->where('job_positions.id', $id);
        $query = $this->db->get();
        return $query->last_row();
    }

    function job_delete($id){
        try {
            $this->db->delete('job_positions', array('id' => $id)); 
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed post your job, please try again');
            return false;
        }
        return true;
    }

    function check_social_link($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_social');
        return $query->result_array();

    }

    function delete_social($id){
        try {
            $this->db->delete('user_social', array('user_id' => $id));
            
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed update your social media, please try again');
            return false;   
        }

        return true;
    }

    function post_social($social){
        try {
            $this->db->insert('user_social', $social);
        } catch (Exception $e) {

            $this->session->set_flashdata('msg_failed', 'Failed update your social media, please try again');
            return false;    
        }
        return true;
    }

    function checkImageExist($userImageID){
        $this->db->select('*');
        $this->db->from('profile_uploads');
        $this->db->where($userImageID);
        $query = $this->db->get();
        return $query->last_row('array');
    }

    function upload_image_logo($image){
        $userProfilePhotoID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
        $checkUserProfilePhotoExist = $this->checkImageExist($userProfilePhotoID);
        
        $dataUploadsProfilePhoto = array(
            'user_id' => $this->session->userdata('id'),
            'name' => $image['profile_photo'],
            'type' => 'profile_photo',
            'updated_at' => date('Y-m-d H:i:s')
        );

        try {
            if ($checkUserProfilePhotoExist) {
                $this->db->where($userProfilePhotoID);
                $this->db->update('profile_uploads', $dataUploadsProfilePhoto); 
            }else{
                $this->db->insert('profile_uploads', $dataUploadsProfilePhoto); 
            }

        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed update your data, please try again');
            return false;
        }
        return true;
    }

    function upload_image_header($image){
        $userHeaderPhotoID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'header_photo');
        $checkUserHeaderPhotoExist = $this->checkImageExist($userHeaderPhotoID);
        
        $dataUploadsHeaderPhoto = array(
            'user_id' => $this->session->userdata('id'),
            'name' => $image['header_photo'],
            'type' => 'header_photo',
            'updated_at' => date('Y-m-d H:i:s')
        );

        try {
            
            if ($checkUserProfileHeaderExist) {
                $this->db->where($userHeaderPhotoID);
                $this->db->update('profile_uploads', $dataUploadsHeaderPhoto); 
            }else{
                $this->db->insert('profile_uploads', $dataUploadsHeaderPhoto); 
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed update your data, please try again');
            return false;
        }
        return true;
    }



    function get_all_candidate($id){

        $this->db->select('applieds.id as application_id,
                            applieds.user_id,
                            applieds.job_position_id,
                            applieds.jobseeker_cv_id,
                            applieds.coverletter,
                            applieds.status as application_status,
                            applieds.employer_message_status,
                            applieds.job_seeker_message_status,
                            applieds.created_at as sent_at,
                            users.id as id_user, 
                            users.fullname as user_name');
        $this->db->from('users');
        $this->db->join('applieds','users.id = applieds.user_id', 'left');
        // $this->db->join('profile_uploads','users.id = profile_uploads.user_id', 'left');
        // $this->db->where(array('profile_uploads.type' => 'profile_photo'));
        $this->db->where(array('applieds.job_position_id' => $id)); //job position id
        $applicant = $this->db->get();
        $applicants = $applicant->result_array();

        

        return $applicants;
    }

    function get_shortlisted_candidate($id){
        $this->db->select('applieds.id as application_id,
                            applieds.user_id,
                            applieds.job_position_id,
                            applieds.jobseeker_cv_id,
                            applieds.coverletter,
                            applieds.status as application_status,
                            applieds.employer_message_status,
                            applieds.job_seeker_message_status,
                            applieds.created_at as sent_at,
                            users.id as id_user, 
                            users.fullname as user_name, 
                            profile_uploads.name as user_image,
                            interview_schedule_user.status as interview_status');
        $this->db->from('users');
        $this->db->join('applieds','users.id = applieds.user_id', 'left');
        $this->db->join('profile_uploads','users.id = profile_uploads.user_id', 'left');
        $this->db->join('interview_schedule_user','interview_schedule_user.user_id = users.id', 'left');
        $this->db->where(array('profile_uploads.type' => 'profile_photo'));
        $this->db->where(array('applieds.status !=' => 'APPLIED'));
        $this->db->where(array('applieds.job_position_id' => $id)); //job position id
        $applicants = $this->db->get();
        return $applicants->result_array();
    }
    // function get_detail_candidate($id){
    //     $this->db-
    // }


}

?>
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
        $this->db->select('users.id as id_users, users.email as registered_email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, users.last_seen_by, users.last_seen_at, users.number_of_seen, roles.name as roles, user_profiles.*, industries.name as industry, countries.name as country_name, countries.country_code,
            states.name as state_name,profile_uploads.name as img');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id', 'left');
        $this->db->join('roles', 'roles.id = user_role.role_id', 'left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
        $this->db->join('states', 'states.id = user_profiles.state_id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.company_industry_id', 'left');
        //$this->db->join('profile_uploads', 'profile_uploads.user_id = users.id', 'left');
		$this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"','left');
        $this->db->where(array('users.id' => $id));
        //$this->db->where(array('profile_uploads.type' => 'profile_photo'));
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
        // $this->db->where('status', 'post');
        $this->db->order_by('job_positions.expiry_date', 'desc');
        $query = $this->db->get('job_positions');
        return $query->result_array();
    }

    function getPostedJob($id){
        $this->db->select('job_positions.*, employment_types.name as employment_name');
        $this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');
        $this->db->where('user_id', $id);
        $this->db->where('status', 'post');
        $this->db->order_by('job_positions.expiry_date', 'desc');
        $query = $this->db->get('job_positions');
        return $query->result_array();
    }

    function get_job_detail($id){
        $this->db->select('job_positions.*, position_levels.name as position_name, employment_types.name as employment_name, profile_uploads.name as img');
        $this->db->from('job_positions');
        $this->db->join('position_levels', 'job_positions.position_level_id = position_levels.id', 'left');
        $this->db->join('employment_types', 'job_positions.employment_type_id = employment_types.id', 'left');
        $this->db->join('profile_uploads', 'job_positions.user_id = profile_uploads.user_id', 'left');
		//$this->db->join('forex', 'job_positions.forex = forex.id', 'left');
        $this->db->where('job_positions.id', $id);
        $query = $this->db->get();
        return $query->last_row();
    }

    function get_more_from($id, $job_id_not){
        $this->db->select('job_positions.*, employment_types.name as employment_name');
        $this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');
        $this->db->where('job_positions.user_id', $id);
        $this->db->where('job_positions.id !=', $job_id_not);
        $this->db->where('job_positions.status', 'post');
        $this->db->where('job_positions.expiry_date >=', date('Y-m-d'));
        $this->db->order_by('created_at DESC');
        $this->db->limit(5);
        $query = $this->db->get('job_positions');
        // var_dump($this->db->last_query());exit();
        return $query->result_array();
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
            
            if ($checkUserHeaderPhotoExist) {
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
                            users.fullname as user_name,
                            profile_uploads.name as img');
        $this->db->from('users');
        $this->db->join('applieds','users.id = applieds.user_id', 'left');
        $this->db->join('profile_uploads','users.id = profile_uploads.user_id AND profile_uploads.type = "profile_photo"', 'left');
        //$this->db->where(array('profile_uploads.type' => 'profile_photo'));
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
                            users.email as user_email, 
                            profile_uploads.name as img,
                            interview_schedule.title as interview_title,
                            interview_schedule_user.status as interview_status,
                            interview_schedule_user.employer_id as employer_id,
                            interview_schedule_user.candidate_reply as candidate_reply,
                            interview_schedule_user.suggested_start_date as suggested_start_date,
                            interview_schedule_user.suggested_end_date as suggested_end_date,
                            interview_schedule_user.id as interview_schedule_id,
                            interview_schedule_user.user_id as interview_schedule_user_id,
                            interview_schedule_user.session_id as session_id
                            ');
        $this->db->from('applieds');
        $this->db->join('users','users.id = applieds.user_id');
        $this->db->join('profile_uploads','profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"', 'left');
        $this->db->join('interview_schedule_user','interview_schedule_user.user_id = users.id AND interview_schedule_user.job_id = '.$id, 'left');
        $this->db->join('interview_schedule','interview_schedule.id = interview_schedule_user.session_id', 'left');
        $this->db->where('applieds.status != "APPLIED" AND applieds.status != "WITHDRAW"');
        $this->db->where(array('applieds.job_position_id' => $id)); //job position id
        $applicants = $this->db->get();
        return $applicants->result_array();
    }

    function get_profile_completion($params){
        $profile['social'] = $this->get_where('user_social', 'name', 'asc', array('user_id' => $this->session->userdata('id') ));
        $profile['profile_photo'] = $this->get_where('profile_uploads', 'name', 'asc', array('user_id' => $this->session->userdata('id'), 'type'=>'profile_photo'));
        $profile['header_photo'] = $this->get_where('profile_uploads', 'name', 'asc', array('user_id' => $this->session->userdata('id'), 'type'=>'header_photo'));

        //About Company 40%
        $About["company_name"]      = !empty($params["user_profile"]['company_name']) ? 5 : 0;
        $About["industry"]          = !empty($params["user_profile"]['industry']) ? 5 : 0;
        $About["reg_number"]        = !empty($params["user_profile"]['company_registration_number']) ? 5 : 0;
        $About["company_desc"]      = !empty($params["user_profile"]['company_description']) ? 5 : 0;
        $About["company_url"]       = !empty($params["user_profile"]['url']) ? 5 : 0;
        $About["profile_photo"]     = !empty($profile["profile_photo"]) ? 5 : 0;
        $About["header_photo"]      = !empty($profile["header_photo"]) ? 5 : 0;
        $About["social"]            = !empty($profile["social"]) ? 5 : 0;
        
        //Additional Info 30%
        $Additional   = !empty($params["user_profile"]['spoken_language']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['total_staff']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['dress_code']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['benefits']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['industry']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['working_days']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['url']) ? 3.75 : 0;
        $Additional   += !empty($params["user_profile"]['email']) ? 3.75 : 0;

        //Contact Information 30%
        $addr = json_decode($params["user_profile"]['address']);
        $Contact = 0;

        if(!empty($addr))
        {
            $addr = current($addr);

            $Contact   += !empty($addr->optionsRadios) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_address) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_city) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_postcode) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_state) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_country) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_email) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_phone) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_fax) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_latitude) ? 2.7272727273 : 0;
            $Contact   += !empty($addr->building_longitude) ? 2.7272727273 : 0;
        }

        $sum    = array_sum($About) + $Additional + $Contact;
        $total  = round($sum);
        
        return $total;
    }
    // function get_detail_candidate($id){
    //     $this->db-
    // }

    
    function get_interview_invitation($id){

        $this->db->select('interview_schedule.*, interview_schedule_user.job_id as interview_job_id, interview_schedule_user.session_id, interview_schedule_user.employer_id, interview_schedule_user.user_id, interview_schedule_user.status, job_positions.name as job_name, user_profiles.company_name, interview_schedule_user.candidate_reply as candidate_reply, users.fullname as fullname');
        $this->db->from('interview_schedule');
        $this->db->join('interview_schedule_user','interview_schedule_user.session_id = interview_schedule.id', 'left' );
        $this->db->join('job_positions','job_positions.id = interview_schedule_user.job_id', 'left' );
        $this->db->join('user_profiles','user_profiles.user_id = interview_schedule_user.employer_id', 'left' );
        $this->db->join('student_bios','student_bios.user_id = interview_schedule_user.user_id', 'left' );
        $this->db->join('users','users.id = student_bios.user_id', 'left' );
        $this->db->where('interview_schedule_user.employer_id', $id); 
        $this->db->where('interview_schedule_user.status !=', 'reject');
        $interview = $this->db->get();

        return $interview->result_array();
    }

    function get_interview_invitation_more_than_today($id){

        $this->db->select('interview_schedule.*, interview_schedule_user.job_id as interview_job_id, interview_schedule_user.session_id, interview_schedule_user.employer_id, interview_schedule_user.user_id, interview_schedule_user.status, job_positions.name as job_name, user_profiles.company_name, users.fullname as fullname');
        $this->db->from('interview_schedule');
        $this->db->join('interview_schedule_user','interview_schedule_user.session_id = interview_schedule.id', 'left' );
        $this->db->join('job_positions','job_positions.id = interview_schedule_user.job_id', 'left' );
        $this->db->join('user_profiles','user_profiles.user_id = interview_schedule_user.employer_id', 'left' );
        $this->db->join('student_bios','student_bios.user_id = interview_schedule_user.user_id', 'left' );
        $this->db->join('users','users.id = student_bios.user_id', 'left' );
        $this->db->where('interview_schedule_user.employer_id', $id); 
        $this->db->where('interview_schedule.start_date >= '.date('Y-m-d'));
        $this->db->where('interview_schedule_user.status', 'accept');
        // var_dump($this->db->last_query());exit;
        $interview = $this->db->get();

        return $interview->result_array();
    }

    function interview_reschedule($reschedule, $interview_schedule_user_id){
        $this->db->insert('interview_schedule', $reschedule);
        $new_interview_schedule_id = $this->db->insert_id();;
        $update_schedule = array(   'session_id' => $new_interview_schedule_id,
                                    'status' => 'pending');
        $this->db->where('id', $interview_schedule_user_id);
        $this->db->update('interview_schedule_user', $update_schedule);

    }

    function getSearchResult($params){
        //get candidate profile
        $candidate = [];

        if(!empty($params))
        {
            $where      = [];
            $join       = [];
            $joinTotal  = [];
            $page       = !isset($params["page"]) && empty($params["page"]) ? "" : $params["page"];
            $offset     = empty($page) ? 0 : $page;

            if(!empty($params["keywords"]))
            {
                $where[] = "f.keywords LIKE '%".$params["keywords"]."%'";
                $join[] = "LEFT JOIN job_preferences f ON f.user_id = a.id";
                $joinTotal[] = "LEFT JOIN job_preferences f ON f.user_id = a.id";
            }

            if(!empty($params["location"]))
            {
                $where[] = "LOWER(g.country) LIKE '%".strtolower($params["location"])."%'";
                $join[] = "LEFT JOIN user_address g ON g.user_id = a.id";
                $joinTotal[] = "LEFT JOIN user_address g ON g.user_id = a.id";
            }

            if(!empty($params["range_min"]) && !empty($params["range_max"]))
            {
                $where[] = "(d.expected_salary BETWEEN '".$params["range_min"]."' AND '".$params["range_max"]."')";
                $join[] = "INNER JOIN forex h ON h.country_id = a.country";
                $joinTotal[] = "LEFT JOIN student_bios d ON d.user_id = a.id";
                $joinTotal[] = "INNER JOIN forex h ON h.country_id = a.country";
            }

            if(!empty($params["position_level"]))
            {
                $where[] = "LOWER(b.title) LIKE '%".strtolower($params["position_level"])."%'";
                $joinTotal[] = "LEFT JOIN experiences b ON b.user_id = a.id";
            }

            if(!empty($params["education"]))
            {
                $where[] = "LOWER(c.qualification_level) LIKE '%".strtolower($params["education"])."%' OR LOWER(i.qualifications) LIKE '%".strtolower($params["education"])."%'";
                $join[] = "LEFT JOIN job_preferences i ON i.user_id = a.id";
                $joinTotal[] = "LEFT JOIN academics c ON c.user_id = a.id";
                $joinTotal[] = "LEFT JOIN job_preferences i ON i.user_id = a.id";
            }

            if(!empty($params["job_type"]))
            {
                $where[] = "b.employment_type_id = ".$params["job_type"];
                $joinTotal[] = !empty($params["position_level"]) ? "" : "LEFT JOIN experiences b ON b.user_id = a.id";
            }

            $wheres = !empty($where) ? "WHERE ".implode(' AND ', $where) : "";

            $joins = !empty($join) ? implode(' ', $join) : "";
            $joinsTotal = !empty($joinTotal) ? implode(' ', $joinTotal) : "";

            $getCandidate = $this->db->query("SELECT
                                                    a.fullname, 
                                                    b.title, 
                                                    b.start_date, 
                                                    MAX(b.end_date) AS end_date, 
                                                    c.university_name, 
                                                    d.expected_salary, 
                                                    d.location,
                                                    IFNULL(e.user_id,0) AS is_shortlisted
                                                FROM
                                                    users a
                                                        LEFT JOIN experiences b ON b.user_id = a.id
                                                        LEFT JOIN academics c ON c.user_id = a.id
                                                        LEFT JOIN student_bios d ON d.user_id = a.id
                                                        LEFT JOIN bookmark_candidate e ON e.user_id = a.id
                                                ".$joins." ".$wheres."
                                                GROUP BY a.id
                                                LIMIT 9
                                                OFFSET ".$offset
                                            );

            $getTotalCandidate = $this->db->query("SELECT
                                                    COUNT(a.id) as total
                                                FROM
                                                    users a
                                                ".$joinsTotal." ".$wheres
                                            );

            $candidate['result'] = $getCandidate->result();

            
            $pageParam = array(
                            'base_url'  => base_url().'employer/search_candidate/getCandidate/',
                            'total_rows'=> $getTotalCandidate->result()[0]->total,
                            'perPage'   => 9,
                            'segment'   => 4,
                            /*'suffix'    => '?'.http_build_query($params, '', "&")*/
                        );
            $candidate['pagination'] = xrPagination($pageParam);
        }

        return $candidate;
    }

    public function get_bookmarked_user($id){
        $this->db->select('     users.id, 
                                users.email,
                                users.fullname,
                                users.preference_name,   
                                users.country as country_id, 
                                countries.name as country,
                                student_bios.*, 
                                bookmark_candidate.user_id,
                                bookmark_candidate.company_id,
                                bookmark_candidate.status,
                                experiences.start_date as exp_start,
                                experiences.end_date as exp_end,
                                experiences.exp_time as exp_time,
                                experiences.company_name as company_name,
                                experiences.employment_type_id as employment_type_id,
                                experiences.industries_id as industries_id,
                                experiences.skills as skills,
                                ');
        $this->db->from('users');
        $this->db->join('student_bios','users.id = student_bios.user_id', 'left' );
        $this->db->join('countries','countries.id = users.country_id', 'left' );
        $this->db->join('bookmark_candidate','bookmark_candidate.user_id = users.id', 'left' );
        $this->db->join('experiences','experiences.user_id = users.id', 'left' );
        $this->db->where('bookmark_candidate.user_id','=', $id);
        $this->db->where('bookmark_candidate.status','=', 1);
        $candidate = $this->db->get();

        return $candidate->result_array();

    }


}

?>
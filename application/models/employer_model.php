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

    function get_user_profile($id){
        $this->db->select('users.id as id, users.email as registered_email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, roles.name as roles, user_profiles.*, industries.name as industry, countries.name as country_name, countries.country_code,
            states.name as state_name');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id');
        $this->db->join('states', 'states.id = user_profiles.state_id');
        $this->db->join('countries', 'countries.id = user_profiles.company_industry_id');
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
        $this->db->update('user_profiles', $dataAddress); 
    }

    function add_profile($profile){
        $new_profile = array();
        $this->db->insert('user_profiles', $new_profile);
    }

    function job_post($jobPost){
        try {
            $this->db->insert('job_positions', $jobPost);
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Failed post your job, please try again');
            return false;
        }
        return true;
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
        $this->db->where('user_id', $id);
        $query = $this->db->get('job_positions');
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

}

?>
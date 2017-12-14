<?php

class Job_Model extends CI_Model{

	function get_job($word){
		$this->db->select('job_positions.*, users.fullname as username, states.name as state_name, countries.name as country_name, user_profiles.company_name, industries.name as industry_name, position_levels.name as position_level');
		$this->db->from('job_positions');		
        $this->db->join('users', 'users.id = job_positions.user_id', 'left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('states', 'user_profiles.state_id = states.id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
		$this->db->like('job_positions.name', $word); 
		$this->db->or_like('users.fullname', $word);
		$this->db->or_like('industries.name', $word);
		$this->db->or_like('position_levels.name', $word);
		$query = $this->db->get();
		return $query->result_array();
	}

	function apply($job){
		try{
			$this->db->insert('applieds', $job);
		}catch(Exception $e){
			$this->session->set_flashdata('msg_failed', 'Failed apply your dream job, please try again');
            return false;
		}
		return true;
	}

	function get_applied_job(){
		$this->db->select('job_positions.*, users.fullname as username, states.name as state_name, countries.name as country_name, user_profiles.company_name, industries.name as industry_namem, applieds.id as job_id, applieds.status as applieds_status');
		$this->db->from('applieds');		
        $this->db->join('job_positions', 'job_positions.id = applieds.job_position_id', 'left');
        $this->db->join('users', 'users.id = job_positions.user_id', 'left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('states', 'user_profiles.state_id = states.id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
		$this->db->where('applieds.user_id', $this->session->userdata('id'));
		$this->db->where('applieds.status', 'new');
		$query = $this->db->get();
		return $query->result_array();
	}

	function withdraw_job($job_id){
		try{
			$data = array('status' => 'withdraw');
			$this->db->where('id', $job_id);
			$this->db->update('applieds', $data);
			
		}catch(Exception $e){
			return false;
		}
		return true;
	}
}
?>
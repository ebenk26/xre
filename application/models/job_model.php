<?php

class Job_Model extends CI_Model{

	function get_job($word,$offset,$perPage,$empType,$posLevel,$experiences,$company_industry,$country_name,$latest,$popular){
		$this->db->select('job_positions.*, states.name as state_name, countries.name as country_name, user_profiles.company_name, industries.name as industry_name, position_levels.name as position_level, employment_types.name as job_type, profile_uploads.name as company_img');
		$this->db->from('job_positions');
        $this->db->join('users', 'users.id = job_positions.user_id');
        $this->db->join('user_profiles', 'user_profiles.user_id = job_positions.user_id', 'left');
        $this->db->join('states', 'user_profiles.state_id = states.id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
        $this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = job_positions.user_id AND profile_uploads.type = "profile_photo"', 'left');

        if(!empty($empType))
        {
        	$this->db->where("job_positions.employment_type_id IN $empType");
        }

        if(!empty($posLevel))
        {
        	$this->db->where("job_positions.position_level_id IN $posLevel");
        }

        if(!empty($experiences))
        {
        	$this->db->where("job_positions.years_of_experience IN $experiences");
        }

        if(!empty($company_industry))
        {
        	$this->db->where("user_profiles.company_industry_id = $company_industry");
        }

        if(!empty($country_name))
        {
        	$this->db->where("(countries.name LIKE '%$country_name%' OR states.name LIKE '%$country_name%')");
        }

        if(!empty($latest))
        {
        	$this->db->order_by("created_at DESC");
        }

        if(!empty($popular))
        {
        	$this->db->order_by("number_of_candidate DESC");
        }

		$this->db->where("job_positions.status = 'post' AND job_positions.expiry_date >= '".date('Y-m-d')."' AND (job_positions.name LIKE '%$word%' OR industries.name LIKE '%$word%' OR position_levels.name LIKE '%$word%')");
		$this->db->limit($perPage,$offset);
		$query = $this->db->get();
		// var_dump($this->db->last_query());exit();
		return $query->result_array();
	}

	function get_total_job($word,$empType,$posLevel,$experiences,$company_industry,$country_name){
		$this->db->from('job_positions');
        $this->db->join('users', 'users.id = job_positions.user_id');
        $this->db->join('user_profiles', 'user_profiles.user_id = job_positions.user_id', 'left');
        $this->db->join('states', 'user_profiles.state_id = states.id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
        $this->db->join('employment_types', 'employment_types.id = job_positions.employment_type_id', 'left');

        if(!empty($empType))
        {
        	$this->db->where("job_positions.employment_type_id IN $empType");
        }

        if(!empty($posLevel))
        {
        	$this->db->where("job_positions.position_level_id IN $posLevel");
        }

        if(!empty($experiences))
        {
        	$this->db->where("job_positions.years_of_experience IN $experiences");
        }

        if(!empty($company_industry))
        {
        	$this->db->where("user_profiles.company_industry_id = $company_industry");
        }

        if(!empty($country_name))
        {
        	$this->db->where("(countries.name LIKE '%$country_name%' OR states.name LIKE '%$country_name%')");
        }

		$this->db->where("job_positions.status = 'post' AND job_positions.expiry_date >= '".date('Y-m-d')."' AND (job_positions.name LIKE '%$word%' OR industries.name LIKE '%$word%' OR position_levels.name LIKE '%$word%')");
		$query = $this->db->get();
		return $query->num_rows();
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
		$this->db->select('job_positions.*, users.fullname as username, states.name as state_name, countries.name as country_name, user_profiles.company_name, user_profiles.user_id as company_id, industries.name as industry_namem, applieds.id as job_id, applieds.status as applieds_status, applieds.created_at as apply_time, profile_uploads.name as profile_photo');
		$this->db->from('applieds');		
        $this->db->join('job_positions', 'job_positions.id = applieds.job_position_id', 'left');
        $this->db->join('users', 'users.id = job_positions.user_id', 'left');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->join('states', 'user_profiles.state_id = states.id', 'left');
        $this->db->join('countries', 'countries.id = user_profiles.country_id', 'left');
        $this->db->join('position_levels', 'position_levels.id = job_positions.position_level_id', 'left');
        $this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
		$this->db->join('profile_uploads', 'profile_uploads.user_id = job_positions.user_id AND profile_uploads.type = "profile_photo"', 'left');
		$this->db->where('applieds.user_id', $this->session->userdata('id'));
		//$this->db->where('profile_uploads.type', 'profile_photo');
		$this->db->order_by('applieds.id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function withdraw_job($job_id){
		try{
			$data = array('status' => 'WITHDRAW');
			$this->db->where('id', $job_id);
			$this->db->update('applieds', $data);
		}catch(Exception $e){
			return false;
		}
		return true;
	}

	function post_job($job_id, $data){
		try{
			$data = array('status' => 'post');
			$this->db->where('id', $job_id);
			$this->db->update('job_positions', $data);
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

    function shortlist($job_id){
    	try{
    		$data = array('status' => 'SHORTLISTED');
			$this->db->where('id', $job_id);
			$this->db->update('applieds', $data);
		}catch(Exception $e){
			return false;
		}
		return true;
    }

    function rejected($job_id){
    	try{
    		$data = array('status' => 'REJECTED');
			$this->db->where('id', $job_id);
			$this->db->update('applieds', $data);
		}catch(Exception $e){
			return false;
		}
		return true;
    }

    function hire($job_id){
        try{
            $data = array('status' => 'ACCEPTED');
            $this->db->where('id', $job_id);
            $this->db->update('applieds', $data);
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    function getJobById($id)
    {
        $this->db->select('job_positions.user_id as user_job, job_positions.name, user_profiles.*');
        $this->db->from('job_positions');        
        $this->db->join('user_profiles', 'job_positions.user_id = user_profiles.user_id', 'left');
        $this->db->where('job_positions.id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }
}
?>
<?php

class Student_Model extends CI_Model{

    //insert employee details to employee table
    public function profile_post($profile){
        
        $this->db->insert('student_bios',$profile);

        return true;      
    }

    function get_user_profile($id){
        //experiences
        $this->db->select('experiences.user_id as experiences_user_id, experiences.title as experiences_title, experiences.description as experiences_description, experiences.start_date as experiences_start_date, experiences.end_date as experiences_end_date, experiences.company_name as experiences_company_name');
        $this->db->from('users');
        $this->db->join('experiences', 'experiences.user_id = users.id');
        $this->db->where(array('experiences.user_id' => $id));
        $experiences = $this->db->get();
        $result['experiences'] = $experiences->result_array();
        
        //achievement
        $this->db->select('achievement.user_id as achievement_user_id, achievement.achievement_name as achievement_title, achievement.achievement_description as achievement_description, achievement.start_date as achievement_start_date, achievement.end_date as achievement_end_date');
        $this->db->from('users');
        $this->db->join('achievement', 'achievement.user_id = users.id');
        $this->db->where(array('achievement.user_id' => $id));
        $achievement = $this->db->get();
        $result['achievement'] = $achievement->result_array();
        
        //overview
        $this->db->select('users.fullname as name, users.verified as verified, student_bios.youtubelink as youtubelink, student_bios.quote as quote, student_bios.summary as summary, student_bios.gender as student_bios_gender, student_bios.location as student_bios_location, student_bios.date_of_birth as student_bios_DOB, student_bios.occupation as student_bios_occupation, student_bios.contact_number as student_bios_contact_number, student_bios.address as student_bios_address, countries.name as country, states.name as states');
        $this->db->from('users');
        $this->db->join('student_bios', 'student_bios.user_id = users.id');
        $this->db->join('countries', 'countries.id = student_bios.country_id','left');
        $this->db->join('states', 'states.id = student_bios.state_id','left');
        $this->db->where(array('student_bios.user_id' => $id));
        $overview = $this->db->get();
        $overview->last_row('array');
        $result['overview'] = current($overview->result_array);

        //academics
        $this->db->select('academics.university_name, academics.degree_name, academics.degree_description, academics.date, academics.start_date, academics.end_date');
        $this->db->from('users');
        $this->db->join('academics', 'academics.user_id = users.id');
        $this->db->where(array('academics.user_id' => $id));
        $overview = $this->db->get();
        $result['academics'] = $overview->result_array();
        
        //skills
        $this->db->select('student_skills.title, student_skills.description, student_skills.skills');
        $this->db->from('users');
        $this->db->join('student_skills', 'student_skills.user_id = users.id');
        $this->db->where(array('student_skills.user_id' => $id));
        $overview = $this->db->get();
        $result['skills'] = $overview->result_array();

        return $result;
        // $result = array('experience' => , );
    }
    
}

?>
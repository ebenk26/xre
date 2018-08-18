<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('job_model');
        $this->load->model('student_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] 		= 'Student | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
		
        $complement['employment_type'] 		= $this->employer_model->get_employment();
        $complement['position_levels'] 		= $this->employer_model->get_position();
        $complement['year_of_experience'] 	= $this->employer_model->get_year_of_experience();
        $complement['job_post'] 			= $this->employer_model->get_job_post($id);
		$job_seeker             = $this->get_data();

        $i =0;
        foreach ($job_seeker as $key => $value) {
            $profileP[$i] = $this->student_model->get_user_profile($value->id);
            $i++;
        }
        
        $complement['job_seeker'] = $profileP;


        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/student', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function export($country){
        $country_name       = $this->get_country($country);
        $data['page_title'] = 'Student_'.$country_name;
		$data['type'] 		= 'Student';
		$data['hasil'] 		= $this->get_data($country);
		
        $this->load->view('administrator/excel', $data);
	}
	
	public function get_data($country = null){
        $this->db->select('users.*, student_bios.youtubelink');
		$this->db->from('users');
		$this->db->join('user_role', 'users.id = user_role.user_id');
		$this->db->join('student_bios', 'users.id = student_bios.user_id');
		$this->db->where('user_role.role_id = 5');
        if($country != null){
            $this->db->where('users.country', $country);
        }
        $this->db->group_by('users.id');
		$this->db->order_by('users.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

    public function get_country($country){
        $country_name = "Country Not Set";
        //get country name
        if($country != 0){
            $this->db->select('*');
            $this->db->from('countries');
            $this->db->where('id', $country);
            $query = $this->db->get();
            $country_name = $query->row()->name;
        }
        return $country_name;
    }

    public function post(){
        $id 		= $this->input->post('id');
		//$password 	= md5(SALT.sha1($this->input->post('password')));
		
		/*$post_status = false;
		if($this->input->post('password') != $this->input->post('password_old')){				
			$data = array(
					'password' => $password,
			);
			$this->db->where('id', $id);
			$post_status = $this->db->update('users', $data);
		}*/
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('id !=', $id);
		$query = $this->db->get();
		
		if($query->num_rows() == 0){
			$data = array(
					'email' => $this->input->post('email'),
			);
			$this->db->where('id', $id);
			$post_status = $this->db->update('users', $data);
		}else{
			$post_status = false;
		}
		
		
        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		redirect(base_url().'administrator/student');
    }

    public function delete(){
        $id = $this->input->post('post_id');
        $deleteJob = $this->employer_model->job_delete($id);
        if ($deleteJob == true) {
            $this->session->set_flashdata('msg_success', 'Success delete job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed delete job');
        }
        redirect(base_url().'employer/job_board/');
    }

    public function details(){
        $id= base64_decode($this->uri->segment(URI_SEGMENT_DETAIL));
        if (!$id) {
            redirect(show_404());
        }

        $job_post['job'] = $this->employer_model->get_job_detail($id);
        $user_id = $job_post['job']->user_id;
        $get_user_profile = $this->employer_model->get_user_profile($user_id);
        $job_post['company_image'] = $this->employer_model->get_where('profile_uploads', 'id', 'asc', array('user_id'=>$user_id, 'type'=>'profile_photo'));
        $job_post['header_image'] = $this->employer_model->get_where('profile_uploads', 'id', 'asc', array('user_id'=>$user_id, 'type'=>'header_photo'));
        $job_post['user_profile'] = $get_user_profile;
        $this->load->view('employer/preview',$job_post);
    }

    public function set_student_bios(){
        $this->db->select('users.fullname, users.id as user_id, roles.slug, student_bios.id');
        $this->db->from('users');
        $this->db->join('student_bios', 'student_bios.user_id = users.id', 'left');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where('roles.slug', 'student');
        $this->db->order_by('users.id', 'DESC');
        $query = $this->db->get();
        $user_student = $query->result();

        //print_r($user_student);

        $no = 1;
        foreach($user_student as $row){
            if($row->id == ""){
                $data = array(
                        'user_id'               => $row->user_id,
                        'created_at'            => date('Y-m-d H:i:s'),
                );
                $post_status = $this->db->insert('student_bios', $data);
            }
        }

        
    }

}
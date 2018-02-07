<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('job_model');
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
		$complement['job_seeker'] 			= $this->get_data();
		
        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/student', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function export(){
        $data['page_title'] = 'Student';
		$data['type'] 		= 'Student';
		$data['hasil'] 		= $this->get_data();
		
        $this->load->view('administrator/excel', $data);
	}
	
	public function get_data(){
        $this->db->select('users.*, student_bios.youtubelink');
		$this->db->from('users');
		$this->db->join('user_role', 'users.id = user_role.user_id');
		$this->db->join('student_bios', 'users.id = student_bios.user_id', 'left');
		$this->db->where('user_role.role_id = 5');
		$this->db->order_by('users.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
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

    public function update(){
        $jobPost = array('name' => $this->input->post('title'),
                         'id' => $this->input->post('job_id'),
                         'user_id' => $this->session->userdata('id'),
                         'position_level_id' => $this->input->post('employment_Level'),
                         'employment_type_id' => $this->input->post('employment_Type'),
                         'years_of_experience' => $this->input->post('year_Of_Experience'),
                         'job_description' => $this->input->post('job_Desc'),
                         'qualifications' => $this->input->post('job_Requirement'),
                         'other_requirements' => $this->input->post('nice_To_Have'),
                         'additional_info'=> $this->input->post('additional_Info'),
                         'status'=> $this->input->post('status'),
                         'budget_min' => $this->input->post('budget_min'),
                         'budget_max' => $this->input->post('budget_max'),
                         'updated_at' => date('Y-m-d H:i:s')
                         );
        $editJob = $this->employer_model->job_edit($jobPost);
        if ($editJob == true) {
            $this->session->set_flashdata('msg_success', 'Success edit job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed edit job');
        }
        redirect(base_url().'employer/job_board/');
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

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {
    
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
        $profile['page_title'] 		= 'Employer | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
		
        $complement['employment_type'] 		= $this->employer_model->get_employment();
        $complement['position_levels'] 		= $this->employer_model->get_position();
        $complement['year_of_experience'] 	= $this->employer_model->get_year_of_experience();
        $complement['job_post'] 			= $this->employer_model->get_job_post($id);
		$complement['result'] 				= $this->get_data();
        $complement['countries']            = $this->get_country_list();
		
        $complement['count_new_emp_id']     = $this->employer_model->get_new_emp_today(5);
        $complement['count_new_emp_my']     = $this->employer_model->get_new_emp_today(3);
        $complement['count_new_emp_ph']     = $this->employer_model->get_new_emp_today(4);
		
		$complement['count_yes_emp_id']     = $this->employer_model->get_new_emp_yesterday(5);
        $complement['count_yes_emp_my']     = $this->employer_model->get_new_emp_yesterday(3);
        $complement['count_yes_emp_ph']     = $this->employer_model->get_new_emp_yesterday(4);
		
        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/employer', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function export($country){
        $country_name       = $this->get_country($country);
        $data['page_title'] = 'Employer_'.$country_name;
        $data['type'] 		= 'Employer';
		$data['hasil'] 		= $this->get_data($country);
		
        $this->load->view('administrator/excel', $data);
	}
	
	public function get_data($country = null){
        $this->db->select('users.*, user_profiles.company_name, user_profiles.email as company_email, user_profiles.address');
		$this->db->from('users');
		$this->db->join('user_role', 'users.id = user_role.user_id');
		$this->db->join('user_profiles', 'user_profiles.user_id = users.id');
        $this->db->where('user_role.role_id = 3');
        if($country != null){
            $this->db->where('users.country', $country);
        }
        $this->db->group_by('users.id');
		$this->db->order_by('users.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

    public function get_country_list(){
        $this->db->select('*');
        $this->db->from('countries');
         $this->db->order_by('id', 'ASC');
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
		$password 	= md5(SALT.sha1($this->input->post('password')));
		
		if($this->input->post('submit_type') == "insert"){
			$data = array(
					'email' 				=> $this->input->post('email'),
					'password' 				=> $password,
					'fullname' 				=> $this->input->post('fullname'),
					'created_at' 			=> date('Y-m-d H:i:s'),
					'verified' 				=> 1,
                    'country'               => $this->input->post('country'),
					//'verification_token' 	=> 1,
			);
			$post_status = $this->db->insert('users', $data);
			
			$user_id = $this->db->insert_id();
			
			$data1 = array(
					'email' 				=> $this->input->post('email'),
					'company_name' 			=> $this->input->post('fullname'),
					'created_at' 			=> date('Y-m-d H:i:s'),
					'user_id' 				=> $user_id,
			);
			$post_status = $this->db->insert('user_profiles', $data1);
			
			$data2 = array(
					'created_at' 			=> date('Y-m-d H:i:s'),
					'user_id' 				=> $user_id,
					'role_id' 				=> 3,
			);
			$post_status = $this->db->insert('user_role', $data2);
		}else{
			$data = array(
                    'country'  => $this->input->post('country'),
            );
            $this->db->where('id', $id);
            $post_status = $this->db->update('users', $data);

            $post_status = false;
			if($this->input->post('password') != $this->input->post('password_old')){				
				$data = array(
						'password' => $password,
				);
				$this->db->where('id', $id);
				$post_status = $this->db->update('users', $data);
			}
			
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
		}
		
        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		redirect(base_url().'administrator/employer');

        /*if ($this->input->post('status') == 'draft') {
            redirect(base_url().'job/details/'.rtrim(base64_encode($postJob),'=') );
        }else{
            redirect(base_url().'employer/job_board/');
        }*/
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

    public function post_job(){
        $id = $this->input->post('post_id');
        $this->job_model->post_job($id, array('status'=>'post'));
    }

    public function shortlist(){
        $id = base64_decode($this->input->post('post_id'));
        $shorlist_job = $this->job_model->shortlist($id);
        
        if ($shorlist_job == true) {
            $this->session->set_flashdata('msg_success', 'Added to shortlist');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed to add to shortlist');
        }
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function view($to_or_inbox_id, $type = null){
        //get login user role
		$roles = $this->session->userdata('roles');
		
		//if wrong url
		if($type != null && $type != "new"){
            redirect(base_url());
        }
		
		$profile['page_title'] 		= 'Inbox';
		
		//data for each header
		$id = $this->session->userdata('id');
        if($roles == "student"){
			$get_user_profile = $this->student_model->get_user_profile($id);
			$profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
			$profile['notification'] = $this->student_model->get_notification($id);
		}elseif($roles == "employer"){
			$get_user_profile = $this->employer_model->get_user_profile($id);
		}
        $profile['user_profile'] = $get_user_profile;
		
		$data['roles'] 	= $roles;
		$data['type'] 	= $type;
		
		//if create message
		if($type != null && $type == "new"){
			$receiver_id = base64_decode($to_or_inbox_id);
			
			//roles receiver
			$this->db->select('*');
			$this->db->from('user_role');
			$this->db->join('roles', 'roles.id = user_role.role_id', 'left');
			$this->db->where(array('user_role.user_id' => $receiver_id));
			$query = $this->db->get();
			$roles_receiver = $query->row()->slug;
			
			//get receiver info
			//$this->db->select('users.id as id_users, users.email as registered_email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, roles.name as roles, user_profiles.*, industries.name as industry, countries.name as country_name, countries.country_code,states.name as state_name,profile_uploads.name as img');
			$this->db->select('users.*, roles.slug as roles_slug, user_profiles.*');
			$this->db->from('users');
			$this->db->join('user_role', 'user_role.user_id = users.id', 'left');
			$this->db->join('roles', 'roles.id = user_role.role_id', 'left');
			//$this->db->join('student_bios', 'student_bios.user_id = users.id');
			$this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
			//$this->db->join('industries', 'industries.id = user_profiles.company_industry_id', 'left');
			//$this->db->join('states', 'states.id = user_profiles.state_id', 'left');
			//$this->db->join('countries', 'countries.id = user_profiles.company_industry_id', 'left');
			//$this->db->join('profile_uploads', 'profile_uploads.user_id = users.id', 'left');
			$this->db->where(array('users.id' => $receiver_id));
			//$this->db->where(array('profile_uploads.type' => 'profile_photo'));
			$query = $this->db->get();
			$receiver_info = $query->row();
			
			$to_name = $receiver_info->fullname;
			if($receiver_info->roles_slug == "employer"){
				$to_name = $receiver_info->company_name;
			}
			
			$data['to_name'] 		= $to_name;
			$data['receiver_id'] 	= $receiver_id;
			
			$this->load->view($roles.'/main/header', $profile);
			$this->load->view('administrator/inbox', $data);
			$this->load->view($roles.'/main/footer');
		}else{
			//cek apakah ada inbox dengan id to
		}
		
		/*$complement['result'] 		= $this->get_data();
        
		$this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/pages', $complement);
        $this->load->view('administrator/main/footer');*/
	}
	
	public function index(){
        $profile['page_title'] 		= 'Pages | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['result'] 		= $this->get_data();
        
		$this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/pages', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function get_data(){
        $this->db->select('*');
		$this->db->from('site');
		//$this->db->join('users', 'users.id = job_positions.user_id');
		//$this->db->join('user_profiles', 'user_profiles.user_id = users.id');
        $this->db->order_by('title', 'ASC');
		//$this->db->where('user_role.role_id = 3');
		$query = $this->db->get();
		return $query->result();
	}

    public function post(){
        $data = array(
				'sender_id' 				=> $this->input->post('sender_id'),
				'receiver_id' 				=> $this->input->post('receiver_id'),
				'subject' 					=> $this->input->post('subject'),
				'message' 					=> $this->input->post('message'),
				'status_sender' 			=> "SENT",
				'status_receiver' 			=> "NEW",
				'created_at' 				=> date('Y-m-d H:i:s'),
		);
		$post_status = $this->db->insert('inbox', $data);
		$user_id = $this->db->insert_id();
		
		/*$id 	= $this->input->post('id');
		$data 	= array('description' 			=> $this->input->post('description'),
                        'updated_at' 			=> date('Y-m-d H:i:s'),
                        );
        
		$this->db->where('id', $id);
		$post_status = $this->db->update('site', $data);*/

        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		$roles = $this->session->userdata('roles');
		redirect(base_url().$roles.'/inbox');
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
}
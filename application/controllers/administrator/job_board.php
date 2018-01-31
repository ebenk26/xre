<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Board extends CI_Controller {
    
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
        $profile['page_title'] 		= 'Job List | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['employment_type'] 		= $this->employer_model->get_employment();
        $complement['position_levels'] 		= $this->employer_model->get_position();
        $complement['year_of_experience'] 	= $this->employer_model->get_year_of_experience();
        $complement['job_post'] 			= $this->get_data();
        
		$this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/job_board', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function get_data(){
        $this->db->select('job_positions.*, user_profiles.company_name, user_profiles.email as company_email, user_profiles.address');
		$this->db->from('job_positions');
		$this->db->join('users', 'users.id = job_positions.user_id');
		$this->db->join('user_profiles', 'user_profiles.user_id = users.id');
        $this->db->order_by('job_positions.id', 'DESC');
		//$this->db->where('user_role.role_id = 3');
		$query = $this->db->get();
		return $query->result();
	}

    public function post(){
        $id 	= $this->input->post('job_id');
		$data 	= array('name' 					=> $this->input->post('name'),
                        'budget_min' 			=> $this->input->post('budget_min'),
                        'budget_max' 			=> $this->input->post('budget_max'),
                        'employment_type_id' 	=> $this->input->post('employment_type_id'),
                        'position_level_id' 	=> $this->input->post('position_level_id'),
                        'years_of_experience' 	=> $this->input->post('years_of_experience'),
                        'job_description' 		=> $this->input->post('job_description'),
                        'qualifications' 		=> $this->input->post('qualifications'),
                        'other_requirements' 	=> $this->input->post('other_requirements'),
                        'additional_info'		=> $this->input->post('additional_info'),
                        //'status'=> $this->input->post('status'),
                        //'expiry_date'=> date('Y-m-d', strtotime("+30 days")),
                        //'created_at'=> date('Y-m-d H:i:s'),
                        'updated_at' 			=> date('Y-m-d H:i:s'),
						//'user_id' => $this->session->userdata('id'),
                        );
        //$postJob = $this->employer_model->job_post($jobPost);
		
		$this->db->where('id', $id);
		$post_status = $this->db->update('job_positions', $data);

        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		redirect(base_url().'administrator/job_board');

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
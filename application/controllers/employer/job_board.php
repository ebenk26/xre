<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Board extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('job_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Job Board';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $complement['employment_type'] = $this->employer_model->get_employment();
        $complement['position_levels'] = $this->employer_model->get_position();
        $complement['year_of_experience'] = $this->employer_model->get_year_of_experience();
        $complement['job_post'] = $this->employer_model->get_job_post($id);
        $complement['countries'] = $this->employer_model->get('countries', 'name', 'asc');
        $complement['forex'] = $this->employer_model->get('forex', 'name', 'asc');
        $complement['invitation'] = $this->employer_model->get_interview_invitation($id);
        $calendar_footer['invitation'] = json_encode($this->employer_model->get_interview_invitation($id));
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/job_board', $complement);
        $this->load->view('employer/main/footer', $calendar_footer);
	}

    public function post(){
        $address= array('address' => $this->input->post('address'),
                        'city' => $this->input->post('city'),
                        'state' => $this->input->post('state'),
                        'postcode' => $this->input->post('postcode'),
                        'country' => $this->input->post('country'),
                        'latitude' => $this->input->post('latitude'),
                        'longitude' => $this->input->post('longitude')
                        );
        $status = $this->input->post('status');
        $jobPost = array('name' => $this->input->post('job_position_name'),
                         'user_id' => $this->session->userdata('id'),
                         'position_level_id' => $this->input->post('employmentLevel'),
                         'employment_type_id' => $this->input->post('employmentType'),
                         'years_of_experience' => $this->input->post('yearOfExperience'),
                         'job_description' => $this->input->post('jobDescription'),
                         'qualifications' => $this->input->post('jobRequirement'),
                         'other_requirements' => $this->input->post('niceToHave'),
                         'additional_info'=> $this->input->post('additionalInfo'),
                         'status'=> !empty($status) ? $status : 'post',
                         'location'=> json_encode($address),
                         'forex' => $this->input->post('currency'),
                         'budget_min' => $this->input->post('budget_min'),
                         'budget_max' => $this->input->post('budget_max'),
                         'expiry_date'=> date('Y-m-d', strtotime("+30 days")),
                         'created_at'=> date('Y-m-d H:i:s'),
                         'updated_at' => date('Y-m-d H:i:s'),
                         );
        $postJob = $this->employer_model->job_post($jobPost);

        if ($postJob == true) {
            $this->session->set_flashdata('msg_success', 'Success post job');
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Create New Job Post",
						'icon' 			=> "fa-briefcase",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }else{
            $this->session->set_flashdata('msg_error', 'Failed post data');
        }

        if ($this->input->post('status') == 'draft') {
            redirect(base_url().'job/details/'.rtrim(base64_encode($postJob),'=') );
        }else{
            redirect(base_url().'employer/job_board/');
        }
    }

    public function update(){
        $address= array('address' => $this->input->post('address'),
                        'city' => $this->input->post('city'),
                        'state' => $this->input->post('state'),
                        'postcode' => $this->input->post('postcode'),
                        'country' => $this->input->post('country'),
                        'latitude' => $this->input->post('latitude'),
                        'longitude' => $this->input->post('longitude')
                        );

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
                         'location'=> json_encode($address),
                         'forex' => $this->input->post('currency'),
                         'budget_min' => $this->input->post('budget_min'),
                         'budget_max' => $this->input->post('budget_max'),
                         'updated_at' => date('Y-m-d H:i:s')
                         );
        $editJob = $this->employer_model->job_edit($jobPost);
        if ($editJob == true) {
            $this->session->set_flashdata('msg_success', 'Success edit job');    
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Update Job Posting",
						'icon' 			=> "fa-briefcase",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
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
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Delete Job Posting",
						'icon' 			=> "fa-trash",
						'label' 		=> "danger",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
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
		
		
		$this->db->select('*');
		$this->db->from('applieds');
		$this->db->where('user_id', $this->session->userdata('id'));
		$this->db->where('job_position_id', $id);
		$query = $this->db->get();
		$applied = $query->row();
		$job_post['applied'] = $applied;

		
		
        $job_post['job'] = $this->employer_model->get_job_detail($id);		
        $user_id = $job_post['job']->user_id;
        $get_user_profile = $this->employer_model->get_user_profile($user_id);
        $job_post['company_image'] = $this->employer_model->get_where('profile_uploads', 'id', 'asc', array('user_id'=>$user_id, 'type'=>'profile_photo'));
        $job_post['header_image'] = $this->employer_model->get_where('profile_uploads', 'id', 'asc', array('user_id'=>$user_id, 'type'=>'header_photo'));
        $job_post['user_profile'] = $get_user_profile;
        $job_post['more_jobs'] = $this->employer_model->get_more_from($user_id, $id);
        $job_post['job_id'] = $this->uri->segment(URI_SEGMENT_DETAIL);
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
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Shortlist A Candidate",
						'icon' 			=> "fa-user-plus",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }else{
            $this->session->set_flashdata('msg_error', 'Failed to add to shortlist');
        }
    }

    public function reject(){
        $id = base64_decode($this->input->post('post_id'));
        $shorlist_job = $this->job_model->rejected($id);
        
        if ($shorlist_job == true) {
            $this->session->set_flashdata('msg_success', 'Successfully reject this candidate'); 
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Reject A Candidate",
						'icon' 			=> "fa-user-times",
						'label' 		=> "danger",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }else{
            $this->session->set_flashdata('msg_error', 'Failed to reject this candidate');
        }   
    }

    public function hire(){
        $id = base64_decode($this->input->post('post_id'));
        $shorlist_job = $this->job_model->hire($id);
        
        if ($shorlist_job == true) {
            $this->session->set_flashdata('msg_success', 'Successfully hire this candidate');        
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Hire A Candidate",
						'icon' 			=> "fa-user-secret",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }else{
            $this->session->set_flashdata('msg_error', 'Failed to hire this candidate');
        }   
    }

    public function single_invitation(){
        $job_id = base64_decode($this->input->post('job_id'));
        $candidate_id = base64_decode($this->input->post('candidate_id'));
        $interview_id = base64_decode($this->input->post('interview_id'));
        $candidate_name = $this->input->post('candidate_name');
        $candidate_email = $this->input->post('candidate_email');
        $employer_id = $this->session->userdata('id');

        $invite = array('session_id' => $interview_id,
                    'employer_id' => $employer_id,
                    'user_id' => $candidate_id,
                    'job_id' => $job_id,
                    'status' => 'pending');

        $invite_user_interview = $this->global_model->create('interview_schedule_user', $invite);

        if ($invite_user_interview == true) {
            $this->session->set_flashdata('msg_success', 'Success invite this candidate'); 
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Send Interview Schedule Session",
						'icon' 			=> "fa-calendar",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }else{
            $this->session->set_flashdata('msg_error', 'Failed to invite this candidate');
        }

        $from = "support@xremo.com";    //senders email address
        $subject = 'Interview Invitation';  //email subject
        
        //sending confirmEmail($receiver) function calling link to the user, inside message body

        $message = 'Congratulations '. $candidate_name .', you have been invited to interview, to see the details please check your account in xremo.com<br><br>Best Regards, <br> Xremo Team';

        $config['mailtype'] = 'html';
        $config['priority'] = 2;
        $config['wordwrap'] = TRUE;
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($candidate_email);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            return true;
        }else{
            return false;
        }

        redirect(base_url().'job/candidate/'.base64_encode($job_id));
    }

}
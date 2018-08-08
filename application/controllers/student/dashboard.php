<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(($roles !== $segment)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Dashboard';
        $id = $this->session->userdata('id');
        $jobPreferences = $this->global_model->get_where('job_preferences', array('user_id'=>$id));
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $profile['language']     = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $job['last_logged_in'] = $this->student_model->get_user_history($id);
        $jobPref = !empty($jobPreferences) ? current($jobPreferences) : '';
		// $job['job_positions'] = $this->student_model->getAllJobByJobPreference($jobPref);

        // $job['job_positions_new'] 	= $this->student_model->getAllNewJobByCountry($countryId);
        $job['job_positions'] = $this->student_model->get_all_job($id);//beautifyJson($job['job_positions']);
		$countryId = !empty($get_user_profile['overview']['country_id']) ? $get_user_profile['overview']['country_id'] : $_COOKIE['country_id'];
		$footer['invitation'] = json_encode($this->student_model->get_interview_invitation($id));

		if(!empty($job['last_logged_in'][count($job['last_logged_in'])-2]['user_history'])){
			$job['new_join'] 			= $this->student_model->get_new_join($job['last_logged_in'][count($job['last_logged_in'])-2]['user_history']);
		}else{
			$job['new_join'] 			= $this->student_model->get_new_join("1970-01-01");
		}
		
        $job['users'] = $get_user_profile;
		
		//get rate
		//$this->db->select_average('rate as rate');
		$this->db->select('AVG(rate) as rate');
		$this->db->where('user_id', $id);
		$query = $this->db->get('user_rate');
		$rate = $query->row()->rate;
		$job['rate'] = round($rate, 2);
		
		//get upcoming interview
		$job['upcoming_interview'] 	= $this->student_model->get_upcoming_interview($id);
		
		//get recent activities
		$job['recent_activities'] 	= $this->user_model->get_recent_activities();


		//get 5 latest article
		$this->db->select('*');
		$this->db->from('blogs');
		//$this->db->order_by('number_of_view', 'DESC');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		$job['article'] = $query->result();
		
		
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/dashboard', $job);
        $this->load->view('student/main/footer',$footer);
	}

    public function applied(){
        $id 			= $this->session->userdata('id');
        $job_id 		= base64_decode($this->input->post('job_id'));
		$job_id_code 	= rtrim(base64_encode($job_id), '=');
        
		$this->db->select('*');
		$this->db->from('applieds');
		$this->db->where('user_id', $id);
		$this->db->where('job_position_id', $job_id);
		$query = $this->db->get();
		$ada = $query->num_rows();
		
		if($ada > 0){
			$apply_job = false;
		}else{
			$this->db->set('number_of_candidate', 'number_of_candidate+1', FALSE);
			$this->db->where('id', $job_id);
			$this->db->update('job_positions');
			
			$jobs = array(  'user_id'=> $id,
							'job_position_id' => $job_id,
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
							'status' => 'APPLIED',
							'employer_message_status' => 'NEW',
							'job_seeker_message_status' => 'NEW',
							'coverletter' => $this->input->post('coverletter'),
							);
			$apply_job = $this->job_model->apply($jobs);
		}
		
        if ($apply_job == true) {
            $this->session->set_flashdata('msg_success', 'Success apply job vacancy'); 
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Apply Job Vacancy",
						'icon' 			=> "fa-briefcase",
						'label' 		=> "info",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities

			//BEGIN : set create notification
			$getUserCompany = $this->job_model->getJobById($job_id);

			$userMail = $this->user_model->getUserMail(
														array(
																'sender_id'=>$this->session->userdata('id'),
																'receiver_id'=>$getUserCompany['user_job']
														)
											);

			$MailContent = array(	
							"sender_name"		=> $userMail["sender_name"],
							"receiver_name"		=> $userMail["receiver_name"],
							"job_name"			=> $getUserCompany['name'],
							'url' 				=> "job/candidate/$job_id_code"
						);

			$messageHtml 	= $this->load->view("mail/apply_job",$MailContent,true);
			$subject 		= "[Job Applied] by ".$userMail["sender_name"];

			$MailData = array(	
							"sender_email"		=> EMAIL_SYSTEM,
							"receiver_email"	=> $getUserCompany["email_pic"],
							'subject' 			=> $subject,
							'message_html'		=> $messageHtml
						);

			$NotifData = array(
						'from_id' 		=> $this->session->userdata('id'),
						'user_id' 		=> $getUserCompany['user_job'],
						'subject' 		=> $subject,
						'message_html'	=> $messageHtml,
						'url' 			=> $MailContent["url"],
						'type' 			=> "apply",
						'viewed'		=> 0,
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			CreateNotif($NotifData,$MailData);
			//END : set create notification
        }else{
            $this->session->set_flashdata('msg_error', 'Failed apply job vacancy');
        }
        redirect(base_url().'job/details/'.$job_id_code);
    }

}
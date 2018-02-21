<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
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
		
		$profile['page_title'] 		= 'Message';
		
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
		//if READ
		}else{
			$inbox_id = base64_decode($to_or_inbox_id);
			
			//cek apakah ada inbox dengan id to
			$this->db->select('inbox.*, sender.fullname as sender_name, receiver.fullname as receiver_name, company1.company_name as sender_company_name, company2.company_name as receiver_company_name, sender_role.slug as sender_role, receiver_role.slug as receiver_role, profile_uploads.name as profile_photo');
			$this->db->from('inbox');
			$this->db->join('users as sender', 'sender.id = inbox.sender_id', 'left');
			$this->db->join('users as receiver', 'receiver.id = inbox.receiver_id', 'left');
			$this->db->join('user_profiles as company1', 'company1.user_id = sender.id', 'left');
			$this->db->join('user_profiles as company2', 'company2.user_id = receiver.id', 'left');		
			$this->db->join('user_role as user_role1', 'user_role1.user_id = sender.id', 'left');
			$this->db->join('user_role as user_role2', 'user_role2.user_id = receiver.id', 'left');		
			$this->db->join('roles as sender_role', 'sender_role.id = user_role1.role_id', 'left');
			$this->db->join('roles as receiver_role', 'receiver_role.id = user_role2.role_id', 'left');
			$this->db->join('profile_uploads as profile_uploads', 'profile_uploads.user_id = sender.id AND profile_uploads.type = "profile_photo"', 'left');
			
			$this->db->where('inbox.id', $inbox_id);
			//$this->db->where('profile_uploads.type', 'profile_photo');
			
			$this->db->order_by('inbox.last_reply_at_sender', 'DESC');
			$this->db->order_by('inbox.last_reply_at_receiver', 'DESC');		
			$this->db->order_by('inbox.created_at', 'DESC');
			$query = $this->db->get();
			$message = $query->row();
			$data['message'] = $message;
			
			if($message->sender_id == $this->session->userdata('id') && $message->status_sender != "TRASH"){
				$data1 	= array('status_sender' 		=> 'READ',
								);				
				$this->db->where('id', $inbox_id);
				$post_status = $this->db->update('inbox', $data1);			
			}elseif($message->sender_id != $this->session->userdata('id') && $message->status_receiver != "TRASH"){
				$data1 	= array('status_receiver' 		=> 'READ',
								);				
				$this->db->where('id', $inbox_id);
				$post_status = $this->db->update('inbox', $data1);
			}
			
			//cek apakah ada reply dengan id inbox to
			$this->db->select('inbox_reply.*, users.fullname, user_profiles.company_name, roles.slug as replier_roles, profile_uploads.name as profile_photo');
			$this->db->from('inbox_reply');
			$this->db->join('users', 'users.id = inbox_reply.user_id', 'left');
			$this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
			$this->db->join('user_role', 'user_role.user_id = users.id', 'left');
			$this->db->join('roles', 'roles.id = user_role.role_id', 'left');
			$this->db->join('profile_uploads as profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"', 'left');
			
			/*$this->db->join('users as sender', 'sender.id = inbox.sender_id', 'left');
			$this->db->join('users as receiver', 'receiver.id = inbox.receiver_id', 'left');
			$this->db->join('user_profiles as company1', 'company1.user_id = sender.id', 'left');
			$this->db->join('user_profiles as company2', 'company2.user_id = receiver.id', 'left');		
			$this->db->join('user_role as user_role1', 'user_role1.user_id = sender.id', 'left');
			$this->db->join('user_role as user_role2', 'user_role2.user_id = receiver.id', 'left');		
			$this->db->join('roles as sender_role', 'sender_role.id = user_role1.role_id', 'left');
			$this->db->join('roles as receiver_role', 'receiver_role.id = user_role2.role_id', 'left');*/
			
			$this->db->where('inbox_reply.inbox_id', $inbox_id);
			//$this->db->where('profile_uploads.type', 'profile_photo');
			
			$this->db->order_by('inbox_reply.id', 'DESC');
			$query = $this->db->get();
			$message_reply = $query->result();
			$data['message_reply'] = $message_reply;
			
			$this->load->view($roles.'/main/header', $profile);
			$this->load->view('administrator/inbox', $data);
			$this->load->view($roles.'/main/footer');
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
        $type = $this->input->post('type');
		
		//new message
		if($type == "new"){
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
			
			if ($post_status == true) {
				$this->session->set_flashdata('msg_success', 'Success');            
			}else{
				$this->session->set_flashdata('msg_error', 'Failed');
			}
			
			//BEGIN : set recent activities
			$ActivitiesData = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Send New Message",
						'icon' 			=> "fa-plus",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($ActivitiesData);
			//END : set recent activities
			
			//BEGIN : set create notification
			$inbox_id = rtrim(base64_encode($user_id), '=');

			$userMail = $this->user_model->getUserMail(
														array(
																'sender_id'=>$this->input->post('sender_id'),
																'receiver_id'=>$this->input->post('receiver_id')
														)
											);

			$MailContent = array(	
							"sender_name"		=> $userMail["sender_name"],
							"receiver_name"		=> $userMail["receiver_name"],
							'url' 				=> "message/$inbox_id"
						);

			$messageHtml 	= $this->load->view("mail/message",$MailContent,true);
			$subject 		= "You have new message from ".$userMail["sender_name"];

			$MailData = array(	
							"sender_email"		=> $userMail["sender_email"],
							"receiver_email"	=> $userMail["receiver_email"],
							'subject' 			=> $subject,
							'message_html'		=> $messageHtml
						);

			$NotifData = array(
						'from_id' 		=> $this->session->userdata('id'),
						'user_id' 		=> $this->input->post('receiver_id'),
						'subject' 		=> $subject,
						'message_html'	=> $messageHtml,
						'url' 			=> $MailContent["url"],
						'type' 			=> "message",
						'viewed'		=> 0,
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			CreateNotif($NotifData,$MailData);
			//END : set create notification
			
			$roles = $this->session->userdata('roles');
			redirect(base_url().$roles.'/inbox');
		//reply
		}else{
			
			$inbox_id = rtrim(base64_encode($this->input->post('inbox_id')), '=');
			$data = array(
					'user_id' 					=> $this->input->post('user_id'),
					'inbox_id' 					=> $this->input->post('inbox_id'),
					'message' 					=> $this->input->post('message'),
					'created_at' 				=> date('Y-m-d H:i:s'),
			);
			$post_status = $this->db->insert('inbox_reply', $data);
			$id = $this->db->insert_id();
			
			//update status message
			$user_id = $this->input->post('user_id');
			$sender_id = $this->input->post('sender_id');
			//if sender reply
			if($user_id == $sender_id){
				$data 	= array('status_receiver' 		=> 'REPLIED',
								'last_reply_at_sender' 	=> date('Y-m-d H:i:s'),
								);
				
				$this->db->where('id', $this->input->post('inbox_id'));
				$post_status = $this->db->update('inbox', $data);
			//if receiver reply
			}else{
				$data 	= array('status_sender' 		=> 'REPLIED',
								'last_reply_at_receiver'=> date('Y-m-d H:i:s'),
								);
				
				$this->db->where('id', $this->input->post('inbox_id'));
				$post_status = $this->db->update('inbox', $data);
			}
			
			if ($post_status == true) {
				$this->session->set_flashdata('msg_success', 'Success');            
			}else{
				$this->session->set_flashdata('msg_error', 'Failed');
			}
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Reply Message",
						'icon' 			=> "fa-plus",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
			
			//BEGIN : set create notification
			$inbox_id = rtrim(base64_encode($this->input->post('inbox_id')), '=');

			$userMail = $this->user_model->getUserMail(
														array(
																'sender_id'=>$this->input->post('user_id'),
																'receiver_id'=>$this->input->post('receiver_id')
														)
											);

			$MailContent = array(	
							"sender_name"		=> $userMail["sender_name"],
							"receiver_name"		=> $userMail["receiver_name"],
							'url' 				=> "message/$inbox_id"
						);

			$messageHtml 	= $this->load->view("mail/message",$MailContent,true);
			$subject 		= "You have new message from ".$userMail["sender_name"];

			$MailData = array(	
							"sender_email"		=> $userMail["sender_email"],
							"receiver_email"	=> $userMail["receiver_email"],
							'subject' 			=> $subject,
							'message_html'		=> $messageHtml
						);

			$NotifData = array(
						'from_id' 		=> $this->session->userdata('id'),
						'user_id' 		=> $this->input->post('receiver_id'),
						'subject' 		=> $subject,
						'message_html'	=> $messageHtml,
						'url' 			=> $MailContent["url"],
						'type' 			=> "message",
						'viewed'		=> 0,
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			CreateNotif($NotifData,$MailData);
			//END : set create notification
			
			$roles = $this->session->userdata('roles');
			redirect(base_url().'message/'.$inbox_id);
		}
    }
	
	public function delete(){
        $id 	= $this->input->post('id');
		$type 	= $this->input->post('type');
		$sender = $this->input->post('sender');
		
		if($sender == "true"){
			$data 	= array('status_sender' 	=> 'TRASH',
							'remove_at_sender' 	=> date('Y-m-d H:i:s'),
							);
		}else{
			$data 	= array('status_receiver' 	=> 'TRASH',
							'remove_at_receiver'=> date('Y-m-d H:i:s'),
							);
		}
		$this->db->where('id', $id);
		$delete_status = $this->db->update('inbox', $data);
		
        if ($delete_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Delete Message",
					'icon' 			=> "fa-trash",
					'label' 		=> "danger",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
		$roles = $this->session->userdata('roles');
		redirect(base_url().$roles.'/'.$type);
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
	
	public function view_list($type){
    	$roles 	= $this->session->userdata('roles');
		$id 	= $this->session->userdata('id');
		$calendar = array();
        
		if($roles == "employer"){
			$get_user_profile = $this->employer_model->get_user_profile($id);
		}elseif($roles == "student"){
			$get_user_profile = $this->student_model->get_user_profile($id);
		}
        $profile['user_profile'] = $get_user_profile;
		
		if($roles == "employer"){
			$profile['profile_completion'] = $this->employer_model->get_profile_completion($profile);
		}
		if($roles == "student"){
			$profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
			$profile['notification'] = $this->student_model->get_notification($id);
			$calendar['invitation'] = $this->student_model->get_interview_invitation($id);
		}
		
		if($type == "inbox"){
			$profile['page_title'] = 'Inbox';
		}elseif($type == "sent"){
			$profile['page_title'] = 'Sent';
		}elseif($type == "trash"){
			$profile['page_title'] = 'Trash';
		}		
		
		$message = $this->user_model->get_data_message($type);
		$data['message'] 		= $message['message'];
		$data['message_inbox'] 	= $message['message_inbox'];
		$data['new'] 			= $message['new'];
		$data['type'] 			= $type;
		$data['id'] 			= $id;
		
        $this->load->view($roles.'/main/header', $profile);
        //$this->load->view('student/inbox', $data);
		$this->load->view('administrator/inbox_list', $data);
        $this->load->view($roles.'/main/footer', $calendar);
    }
}
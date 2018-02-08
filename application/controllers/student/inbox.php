<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
		$this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) || ($roles !== $segment)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $header['page_title'] = 'Inbox';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $profile['notification'] = $this->student_model->get_notification($id);
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/inbox');
        $this->load->view('student/main/footer');
	}
	
	public function view_list($type){
    	$id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
		$profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent']; 
        $profile['notification'] = $this->student_model->get_notification($id);
        
		if($type == "inbox"){
			$profile['page_title'] = 'Inbox';
		}elseif($type == "sent"){
			$profile['page_title'] = 'Sent';
		}elseif($type == "trash"){
			$profile['page_title'] = 'Trash';
		}
		
		//get certain message as type
		$this->db->select('inbox.*, sender.fullname as sender_name, receiver.fullname as receiver_name, company1.company_name as sender_company_name, company2.company_name as receiver_company_name, sender_role.slug as sender_role, receiver_role.slug as receiver_role');
		$this->db->from('inbox');
		$this->db->join('users as sender', 'sender.id = inbox.sender_id', 'left');
		$this->db->join('users as receiver', 'receiver.id = inbox.receiver_id', 'left');
		$this->db->join('user_profiles as company1', 'company1.user_id = sender.id', 'left');
		$this->db->join('user_profiles as company2', 'company2.user_id = receiver.id', 'left');		
		$this->db->join('user_role as user_role1', 'user_role1.user_id = sender.id', 'left');
		$this->db->join('user_role as user_role2', 'user_role2.user_id = receiver.id', 'left');		
		$this->db->join('roles as sender_role', 'sender_role.id = user_role1.role_id', 'left');
		$this->db->join('roles as receiver_role', 'receiver_role.id = user_role2.role_id', 'left');
		if($type == "inbox"){
			$this->db->where('(inbox.receiver_id = '.$this->session->userdata('id').' AND inbox.status_receiver != "TRASH") OR (inbox.sender_id = '.$this->session->userdata('id').' AND inbox.last_reply_at_receiver != "0000-00-00 00:00:00")');
		}elseif($type == "sent"){
			$this->db->where('inbox.sender_id = '.$this->session->userdata('id').' AND inbox.status_sender != "TRASH"');
		}elseif($type == "trash"){
			$this->db->where('(inbox.receiver_id = '.$this->session->userdata('id').' AND inbox.status_receiver = "TRASH") OR (inbox.sender_id = '.$this->session->userdata('id').' AND inbox.status_sender = "TRASH")');
			$this->db->order_by('inbox.updated_at', 'DESC');
		}
		$this->db->order_by('inbox.last_reply_at_sender', 'DESC');
		$this->db->order_by('inbox.last_reply_at_receiver', 'DESC');
		$this->db->order_by('inbox.created_at', 'DESC');
		$query = $this->db->get();
		$data['message'] = $query->result();
		
		//get only inbox message
		$this->db->select('inbox.*, sender.fullname as sender_name, receiver.fullname as receiver_name, company1.company_name as sender_company_name, company2.company_name as receiver_company_name, sender_role.slug as sender_role, receiver_role.slug as receiver_role');
		$this->db->from('inbox');
		$this->db->join('users as sender', 'sender.id = inbox.sender_id', 'left');
		$this->db->join('users as receiver', 'receiver.id = inbox.receiver_id', 'left');
		$this->db->join('user_profiles as company1', 'company1.user_id = sender.id', 'left');
		$this->db->join('user_profiles as company2', 'company2.user_id = receiver.id', 'left');		
		$this->db->join('user_role as user_role1', 'user_role1.user_id = sender.id', 'left');
		$this->db->join('user_role as user_role2', 'user_role2.user_id = receiver.id', 'left');		
		$this->db->join('roles as sender_role', 'sender_role.id = user_role1.role_id', 'left');
		$this->db->join('roles as receiver_role', 'receiver_role.id = user_role2.role_id', 'left');
		
		$this->db->where('(inbox.receiver_id = '.$this->session->userdata('id').' AND inbox.status_receiver = "REPLIED") OR (inbox.sender_id = '.$this->session->userdata('id').' AND inbox.last_reply_at_receiver != "0000-00-00 00:00:00" AND inbox.status_sender = "REPLIED")');
		
		$this->db->order_by('inbox.last_reply_at_sender', 'DESC');
		$this->db->order_by('inbox.last_reply_at_receiver', 'DESC');		
		$this->db->order_by('inbox.created_at', 'DESC');
		$query = $this->db->get();
		$message_inbox = $query->result();
		$data['message_inbox'] = $message_inbox;
		
		$new = 0;
		foreach ($message_inbox as $row) { 
			if($row->status_receiver == "NEW" || $row->status_receiver == "REPLIED" || $row->status_sender == "REPLIED"){ $new++;}
		}
		$data['new'] = $new;
		
		$data['type'] = $type;
		
        $this->load->view('student/main/header', $profile);
        //$this->load->view('student/inbox', $data);
		$this->load->view('administrator/inbox_list', $data);
        $this->load->view('student/main/footer');
    }

}
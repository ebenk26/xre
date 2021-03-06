<?php

class User_Model extends CI_Model{

    //insert employee details to employee table
    public function signup_post($data, $role){
        
        if ($role==3) {
            $user = array(
                'fullname'      => $data['fullname'],
                'email'         => $data['email'],
                'password'      => $data['password'],
                'created_at'    => $data['created_at'],
                'country'       => $data['country'],
            );
            $users = $this->db->insert('users',$user);
            $user_id = $this->db->insert_id();

            $user_role = array( 'user_id' => $user_id,
                            'role_id' => $role);
            
            $this->db->insert('user_role',$user_role);

        }else{

            $users = $this->db->insert('users',$data);
            $user_id = $this->db->insert_id();

            $user_role = array( 'user_id' => $user_id,
                            'role_id' => $role);
            
            $this->db->insert('user_role',$user_role);
        }

        if($role == 5 || $role==4){

            $this->db->insert('student_bios', array('user_id' => $user_id));

        }elseif($role == 3){
            $pic = array(   'pic_name' => $data['fullname'],
                            'pic_position' => 'HR / Recruitment Staff',
                            'pic_email' => $data['email'] );

            $data_profiles = array(
                'contact_person'    => json_encode($pic),
                'company_name'      => $data['company_name'],
                'country_id'        => $data['country_code'],
                'created_at'        => $data['created_at'],
                'email'             => $data['email'],
                'user_id'           => $user_id,
            );

            $this->db->insert('user_profiles', $data_profiles);
        }

        return true;      
    }

    public function loginUser($email, $password){
        $this->db->select('users.id as id,users.country as country, users.password as password, users.admin_password as admin_password, users.email as email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, users.last_seen_notif, roles.slug as roles, profile_uploads.name as img_profile, profile_uploads.type as img_type');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->join('profile_uploads', 'profile_uploads.user_id = users.id AND profile_uploads.type = "profile_photo"', 'left');
        // $this->db->where(array('users.email' => $email, 'users.password' => $password));
        //$this->db->where(array('profile_uploads.type' => 'profile_photo'));
        $this->db->where(array('users.email' => $email));
        $query = $this->db->get();
        $result = $query->last_row('array');
        if (!empty($result)) {
            if (($result['password'] == $password || $result['admin_password']) && $result['verified'] == 1) {
                $user = array('user_id' => !empty($result['id']) ? $result['id'] : $this->session->userdata('id') );
                $this->db->insert('user_history', $user);
                $result['status_request'] = 200;
            }elseif ($result['verified'] == 0) {
                $result['status_request'] = 403;
            }else{
                $result['status_request'] = 422;
            }
        }else{
                $result['status_request'] = 401;
        }

        return $result;
    }

    
    //send confirm mail
    public function sendEmail($receiver){
        $from = "system@xremo.com";    //senders email address
        $subject = '[Xremo] Verify email address';  //email subject
        
        //sending confirmEmail($receiver) function calling link to the user, inside message body

        //$receiver["url"] = base_url().'site/confirm_email/confirmEmail/'.md5($receiver['email']);
        $receiver["url"] = base_url().'confirm_email/'.md5($receiver['email']);
        
        $message = $this->load->view("mail/sign_up",$receiver,true);

        $config['mailtype'] = 'html';
        $config['priority'] = 2;
        $config['wordwrap'] = TRUE;
        $config['smtp_host'] = 'mail.xremo.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'system@xremo.com';
        $config['smtp_pass'] = '}CvYhyQg4[z6';
        
        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        //$this->email->initialize($config);
        //send email
        $this->email->from('system@xremo.com');
        $this->email->to($receiver['email']);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            return true;
        }else{
            return false;
        }
    }

    function forgotPassword($email){
        $this->db->where('email', $email);
        $mail = $this->db->get('users');
        $receiver = $mail->last_row('array');

        if ($receiver) {
            $from = "Xremo";    //senders email address
            $subject = 'Reset password';  //email subject
            
            //sending confirmEmail($receiver) function calling link to the user, inside message body

            // $receiver["url"] = 'site/user/confirmForgotPassword/'.rtrim(base64_encode($email),'=');
            $receiver["url"] = 'change_password/'.rtrim(base64_encode($email),'=');

            $message = $this->load->view("mail/forgot_password",$receiver,true);


            $MailData = array(  
                            "sender_email"      => EMAIL_SYSTEM,
                            "receiver_email"    => trim($email),
                            'subject'           => $subject,
                            'message_html'      => $message
                        );
            
            try {
                
                sendEmail($MailData);
                $this->db->where('email', $email);
                $this->db->update('users', array('forgot_password_time'=> date('Y-m-d H:i:s')));
                redirect(base_url().'instructions_change_password');
            } catch (Exception $e) {
                return false;
            }

        }else{
            return false;
        }
    }
    
    //activate account
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('employee', $data);    //update status as 1 to make active user
    }
    
    function post_academic($data){
        $this->db->insert('academic', $data);
        $insert_id = $this->db->insert_id();
        $user_academic_data = array('academic_id' => $insert_id,
                                    'user_id' => $this->session->userdata['emp_id']);
        $this->db->insert('user_academic', $user_academic_data);
    }

    function user_academic(){
        
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('user_academic', 'user_academic.user_id = employee.emp_id');
        $this->db->join('academic', 'academic.id = user_academic.academic_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function check_university_email($email){
        $query = $this->db->get_where('university', array('email_format'=>$email));
        $result = $query->num_rows() > 0 ? true : false;
        return $result;
    }

    function set_token($token){
        try {            
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update( 'users', array('verification_token' => $token ));
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    function get_token($token){
        $existing_token = $this->db->get_where('users', array('verification_token'=>$token));
        return $existing_token;
    }

    function get_user($email){
        $this->db->select('users.id as id, users.email as email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, roles.slug as roles');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where(array('users.email' => $email));
        $query = $this->db->get();
        $result = $query->last_row('array');
        return $result;
    }

    function change_password($id, $password){
        $data = array(
               'password' => $password
            );
        try {

            $this->db->where('id', $id);
            $this->db->update('users', $data); 
            
            return true;

        } catch (Exception $e) {
            return false;
        }
    }
	
	public function setRecentActivities($data){
        $this->db->insert('activities', $data);
    }
	
	public function get_data_message($type){
		$id = $this->session->userdata('id');
		
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
			//harus sama dengan yg di bawah
			$this->db->where('(inbox.receiver_id = '.$id.' AND inbox.status_receiver != "TRASH") OR (inbox.sender_id = '.$id.' AND inbox.last_reply_at_receiver != "0000-00-00 00:00:00" AND inbox.status_sender != "TRASH")');
		}elseif($type == "sent"){
			$this->db->where('inbox.sender_id = '.$id.' AND inbox.status_sender != "TRASH"');

		}elseif($type == "trash"){
			$this->db->where('(inbox.receiver_id = '.$id.' AND inbox.status_receiver = "TRASH") OR (inbox.sender_id = '.$id.' AND inbox.status_sender = "TRASH")');
			$this->db->order_by('inbox.updated_at', 'DESC');
		}else{
			$this->db->where('inbox.id', 0);
		}
		
		$this->db->order_by('inbox.created_at', 'DESC');
        $this->db->order_by('inbox.last_reply_at_sender', 'DESC');
        $this->db->order_by('inbox.last_reply_at_receiver', 'DESC');
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
		
		//harus sama dengan yg di atas
		$this->db->where('(inbox.receiver_id = '.$id.' AND inbox.status_receiver != "TRASH") OR (inbox.sender_id = '.$id.' AND inbox.last_reply_at_receiver != "0000-00-00 00:00:00" AND inbox.status_sender != "TRASH")');
		
		$this->db->order_by('inbox.last_reply_at_sender', 'DESC');
		$this->db->order_by('inbox.last_reply_at_receiver', 'DESC');		
		$this->db->order_by('inbox.created_at', 'DESC');
		$query = $this->db->get();
		$message_inbox = $query->result();
		$data['message_inbox'] = $message_inbox;
		
		$new = 0;
		foreach ($message_inbox as $row) { 
			if(($id == $row->receiver_id && ($row->status_receiver == "NEW" || $row->status_receiver == "REPLIED")) || ($id == $row->sender_id && $row->status_sender == "REPLIED")){ $new++;}
		}
		$data['new'] 	= $new;
		
		return $data;
	}
	
	function get_recent_activities(){
        $this->db->select('*');
        $this->db->from('activities');
		$this->db->where('user_id', $this->session->userdata('id'));
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}

    function getUserById($id)
    {
        $this->db->select('users.id as user_id, users.email, users.fullname, users.verified, users.status, users.remember_token, roles.slug as roles');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where(array('users.id' => $id));
        $query = $this->db->get();
        $result = $query->row_array('array');
        return $result;
    }

    function getCompany($id)
    {
        $this->db->where(array('user_id' => $id));
        $query = $this->db->get('user_profiles');
        $result = $query->row_array();
        return $result;
    }

    function getUserMail($params)
    {
        $checkUserRole = $this->getUserById($params["sender_id"]);

        if($checkUserRole["roles"] == "employer")
        {
            $companyData    = $this->getCompany($params["sender_id"]);
            $data["sender_name"]    = $companyData["company_name"];
            $data["sender_email"]   = $companyData["email"];

            $receiverData   = $this->getUserById($params['receiver_id']);
            $data["receiver_name"]  = $receiverData["fullname"];
            $data["receiver_email"] = $receiverData["email"];
        }
        else
        {
            $data["sender_name"]    = $checkUserRole["fullname"];
            $data["sender_email"]   = $checkUserRole["email"];
            $receiverData   = $this->getUserById($params['receiver_id']);

            if($receiverData["roles"] == "employer")
            {
                $companyData    = $this->getCompany($params["receiver_id"]);
                $data["receiver_name"]  = $companyData["company_name"];
                $data["receiver_email"] = $receiverData["email"];
            }
            else
            {
                $data["receiver_name"]  = $receiverData["fullname"];
                $data["receiver_email"] = $receiverData["email"];
            }
        }

        return $data;
    }

}

?>
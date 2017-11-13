<?php

class User_Model extends CI_Model{

    //insert employee details to employee table
    public function signup_post($data, $role){
        
        $users = $this->db->insert('users',$data);
        $user_id = $this->db->insert_id();

        $user_role = array( 'user_id' => $user_id,
                        'role_id' => $role);
        
        $this->db->insert('user_role',$user_role);

        return true;      
    }

    public function loginUser($email, $password){
        $this->db->select('users.id as id, users.email as email, users.fullname as name, users.verified as verified, users.status as status, users.remember_token as remember_token, roles.name as roles');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.user_id = users.id');
        $this->db->join('roles', 'roles.id = user_role.role_id');
        $this->db->where(array('users.email' => $email, 'users.password' => $password));
        $query = $this->db->get();
        return $query->last_row('array');
    }

    
    //send confirm mail
    public function sendEmail($receiver){
        $from = "dearico612@gmail.com";    //senders email address
        $subject = 'Verify email address';  //email subject
        
        //sending confirmEmail($receiver) function calling link to the user, inside message body

        $message = 'Hello '.$receiver['fullname'].',<br><br> Thank you for registering with Xremo. To continue, please verify your email by clicking on the link below:<br><br>
        <a href='. base_url() .'site/user/confirmEmail/'.md5($receiver['email']).'>'. base_url() .'site/user/confirmEmail/'.md5($receiver['email']).'</a><br><br>Thanks';

        
        //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'Rico061289!';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->load->library('email', $config);
		$this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver['email']);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            return true;
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
}

?>
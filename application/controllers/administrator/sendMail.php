<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
    }
    
    public function send(){
        $email = $this->input->post('email');
        $user = $this->input->post('user');
        $userdata['email'] = $email;
        $userdata['user'] = $user;
        $params['sender_email'] = "system@xremo.com";
        $params['receiver_email'] = $email;
        $params['subject'] = "Complete Profile Invitation";
        $params['message_html'] = $this->load->view('mail/complete_profile', $userdata, true);
        sendEmail($params);
	}	
}
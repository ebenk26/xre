<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('user_model');
        $this->load->model('global_model');

        //if(empty($countryCheck)){
        //    redirect(base_url());
        //}

    }
    
    public function login(){
        $header['page_title'] = 'Login';
        $this->load->view('site/login', $header);
	}

    public function signup(){
        $header['page_title'] = 'Sign Up';
        $this->load->view('site/signup', $header);
    }

    public function login_post(){
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');

        if($this->form_validation->run() == false){
            $header['page_title'] = 'Login';
            $this->load->view('site/login', $header);
        }else{
            $user_email = $this->input->post('email');
            $password = md5(SALT.sha1($this->input->post('password')));
            $login_result = $this->user_model->loginUser($user_email, $password);
            

            if ($login_result['status_request'] == 200) {
                
                $result = array(  'id' => $login_result['id'],
                                    'email' => $login_result['email'],
                                    'name' => $login_result['name'],
                                    'verified' => $login_result['verified'],
                                    'status' => $login_result['status'],
                                    'remember_token' => $login_result['remember_token'],
                                    'roles' => $login_result['roles'],
                                    'last_seen_notif' => $login_result['last_seen_notif'],
                                    'img_profile' => base64_encode($login_result['img_profile']),
                                    'img_type' => $login_result['img_type']);

                $page = strtolower($result['roles']);
                $this->session->set_userdata($result);
                
                if ($this->input->post('remember') == 'on') {
                    $token = md5(SALT.sha1(rand(0,15)));
                    $cookie = $this->user_model->set_token($token);
                    if ($cookie) {
                        $cookie_name = "xremo_cookie";
                        $cookie_value = $token;
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    }
                }
                
                

            }elseif ($login_result['status_request'] == 422) {
                $this->session->set_flashdata('msg_failed', 'Wrong Password please try again.');
                redirect(base_url().'login');
            }elseif ($login_result['status_request'] == 403) {
                $this->session->set_flashdata('msg_failed', 'Please check your email to verify before you can login.');
                redirect(base_url().'login');
            }else{
                $this->session->set_flashdata('msg_failed', 'Email not registered yet, please register!');
                redirect(base_url().'login');                
            }


            $this->session->set_flashdata('msg_success', 'Login Successfully.');
            redirect(base_url().$page.'/dashboard');
            
        }
    }

    public function student_signup_post(){
        
        $this->form_validation->set_rules('fullname','Student fullname', 'required');
        $this->form_validation->set_rules('email','Student email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('terms','Terms and Condition', 'required');
        $this->form_validation->set_message('is_unique', 'Email already registered');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('msg_failed', 'Your Email already registered please check your email.');
            redirect(base_url().'signup');
            
            
        }else{
            //call db
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'password' => md5(SALT.sha1($this->input->post('password')))
            );

            
            $this->session->set_flashdata('name', $this->input->post('fullname'));
            $this->session->set_flashdata('email', $this->input->post('email'));

            $role = 5;
            
            try{
                $save = $this->user_model->signup_post($data, $role);
                
                if ($save == false) {
                    throw new Exception('Email Send Failed');
                }

                $this->user_model->sendEmail($data);

                $this->session->set_flashdata('msg_success', 'Registration Successfully. Please check you email to verify your account');
            }catch (Exception $e){
                $this->session->set_flashdata('msg_failed', 'Failed!! Please try again later.');
                redirect(base_url().'signup');
            }

/*          $email = explode('@', $this->input->post('email'));
            $university_email = end($email);
            $univ_email_check = $this->user_model->check_university_email($university_email);

            if ($univ_email_check == true) {
                try{
                    $save = $this->user_model->signup_post($data, $role);
                    if ($save == false) {
                        throw new Exception('Email Send Failed');
                    }
                    $this->user_model->sendEmail($data);    
                }catch (Exception $e){
                    $this->session->set_flashdata('msg_failed', 'Failed!! Please try again later.');
                    redirect(base_url().'site/user/signup');
                }
            }else{
                    $this->session->set_flashdata('msg_failed', 'Your university not registered in our system');
                    redirect(base_url().'site/user/signup');
            }*/

            //$header['page_title'] = 'Sign Up';
            //$this->load->view('site/signup', $header);
            redirect(base_url().'verify_registration');          
        }
    }

    public function jobseeker_signup_post(){

        $this->form_validation->set_rules('fullname','Jobseeker fullname', 'required');
        $this->form_validation->set_rules('email','Jobseeker email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('terms','Terms and Condition', 'required');
        $this->form_validation->set_message('is_unique', 'Email already registered');

        $this->session->set_flashdata('name', $this->input->post('fullname'));
        $this->session->set_flashdata('email', $this->input->post('email'));

        if($this->form_validation->run() == false){
            $header['page_title'] = 'Sign Up';
            $this->load->view('site/signup', $header);
            
        }else{
            //call db
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'password' => md5(SALT.sha1($this->input->post('password'))),
            );
            
            $role = 4;
            
            try{
                $save = $this->user_model->signup_post($data, $role);

                $this->user_model->sendEmail($data);

                $this->session->set_flashdata('msg_success', 'Registration Successfully. Please check you email to verify your account');
            }catch (Exception $e){
                $this->session->set_flashdata('msg_failed', 'Failed!! Please try again.');
                redirect(base_url().'signup');
                // $header['page_title'] = 'Sign Up';
                // $this->load->view('site/signup', $header);
                
            }

            //$header['page_title'] = 'Sign Up';
            //$this->load->view('site/signup', $header); 
            redirect(base_url().'login');  
        }
    }

    public function employer_signup_post(){

        $this->form_validation->set_rules('company_name','Company name', 'required');
        $this->form_validation->set_rules('fullname','Company Admin Name', 'required');
        $this->form_validation->set_rules('email','Employer email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('terms','Terms and Condition', 'required');
        $this->form_validation->set_message('is_unique', 'Email already registered');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('msg_failed', 'Your Email already registered please check your email.');
            redirect(base_url().'signup');
            
        }else{
            //call db
            
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'password' => md5(SALT.sha1($this->input->post('password'))),
                'company_name' => $this->input->post('company_name'),
                'country_code' => $_COOKIE['country_id'],
                'created_at' => date('d-M-Y h:i:s'),
            );


            $role = 3;
            
            
             try{
                $save = $this->user_model->signup_post($data, $role);
                
                $this->user_model->sendEmail($data);
                $this->session->set_flashdata('msg_success', 'Registration Successfully. Please check you email to verify your account');
            }catch (Exception $e){
                $this->session->set_flashdata('msg_failed', 'Failed!! Please try again.');
                redirect(base_url().'signup');
                
            }

            //$header['page_title'] = 'Sign Up';
            //$this->load->view('site/signup', $header);
            redirect(base_url().'verify_registration');
        }
    }

    //function confirmEmail($key, $country_code ,$country, $forex){
    function confirmEmail($key){
       /* $session = array(
                'country_code' => $country_code,
                'country' => $country,
                'forex' => $forex                
            );
        $this->session->set_userdata('country', $country);
        isset($_COOKIE['xremo_token']) ? $token_cookie = $this->user_model->get_token($_COOKIE['xremo_cookie']) : $token_cookie = false;
        $_COOKIE['country'] = $country;*/

        $data = array('verified' => 1);
        $this->db->where('md5(email)',$key);
        $this->db->update('users', $data);    //update status as 1 to make active user
        $this->session->set_flashdata('msg_success', 'Successfully verified. Please login to your account.');
        redirect(base_url().'login');
    }

    function logout(){
        $loginCheck = $this->session->userdata('id');
        if(isset($loginCheck)){
            $this->session->sess_destroy();
            redirect(base_url().'login');
        } else {
            show_404();
        }
    }

    function forgot_password(){
        $email          = $this->input->post('email');
        $checkEmail     = checkEmailExist($email);
        if ($checkEmail['status_request'] == 200) {
            $this->user_model->forgotPassword($email);
            redirect(base_url().'instructions_change_password');
        }else{
            $this->session->set_flashdata('msg_failed', 'Email not registered, please register first');
            redirect(base_url().'login');
        }
    }

    function confirmForgotPassword(){

        $email = $this->uri->segment(URI_SEGMENT_FORGOT_PASSWORD);
        $user_email = base64_decode($email);
        $user = $this->user_model->get_user($user_email);
        $this->session->set_userdata($user);

        $this->session->set_flashdata('msg_success', 'Please change your password');
		if($user['roles'] == "administrator"){
			redirect(base_url().'administrator/dashboard/');
		}
        redirect(base_url().$user['roles'].'/settings/');

    }

    function changePassword(){
        $roles = $this->session->userdata('roles');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[conf_password]');
        $this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_failed', 'Password and confirm password not match.');
        }else{            
            $email = $this->input->post('email');
            $password = md5(SALT.sha1($this->input->post('password')));
            $id = $this->session->userdata('id');
            if (!empty($id)) {
                $this->user_model->change_password($id ,$password);
            }else{
                $this->global_model->update('users', array('email'=> $email), array('password'=> $password));
                redirect(base_url().'/success_change_password');
            }
            $this->session->set_flashdata('msg_success', 'Password has been changed.');
            
            //BEGIN : set recent activities
            $data = array(
                        'user_id'       => $this->session->userdata('id'),
                        'ip_address'    => $this->input->ip_address(),
                        'activity'      => "Change Password",
                        'icon'          => "fa-lock",
                        'label'         => "success",
                        'created_at'    => date('Y-m-d H:i:s'),
                    );
            setRecentActivities($data);
            //END : set recent activities
        }
        if (!empty($roles)) {
            redirect(base_url().$roles.'/settings');
        }else{
            redirect(base_url());
        }
    }

    function change_password(){
        $email = base64_decode($this->uri->segment(2));
        $checkForgotPasswordTime = $this->global_model->get_where('users', array('email' => $email));
        $forgotTime = current($checkForgotPasswordTime);
        $checkExpiryTime = (strtotime("now") > strtotime($forgotTime['forgot_password_time'])) && (strtotime("now") <= (strtotime($forgotTime['forgot_password_time']."+1 day")));

        if ($checkExpiryTime) {
            $this->load->view('site/change_password');
        }else{
            redirect(base_url().'expired_password');
        }
    }

    function resend_registration_link(){
        $email = $this->input->post('email');
        $checkEmail     = checkEmailExist($email);
        $data = array('email' => $email);

        if ($checkEmail['status_request'] == 200) {
            $this->db->where('email',$email);
            $this->db->update('users', array('created_at' => date('Y-m-d h:i:s')));
            $this->user_model->sendEmail($data);
            redirect(base_url().'verify_registration');
        }else{
            $this->session->set_flashdata('msg_failed', 'Email not registered, please register first');
            redirect(base_url().'expired_registration');
        }        
    }

    function expired_password(){
        $this->load->view('site/expired_change_password');
    }

    function success_change_password(){
        $this->load->view('site/success_change_password');
    }

    function instructions_change_password(){
        $this->load->view('site/instructions_change_password');
    }

    function expired_registration(){
        $this->load->view('site/expired_registration');
    }

    function success_registration(){
        $this->load->view('site/success_register');
    }

    function verify_registration(){
        $this->load->view('site/instruction_check_email');
    }

}
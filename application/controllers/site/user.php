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
            $token = 
            $user_email = $this->input->post('email');
            $password = md5(SALT.sha1($this->input->post('password')));
            $login_result = $this->user_model->loginUser($user_email, $password);
            $login_result = array(  'id' => $login_result['id'],
                                    'email' => $login_result['email'],
                                    'name' => $login_result['name'],
                                    'verified' => $login_result['verified'],
                                    'status' => $login_result['status'],
                                    'remember_token' => $login_result['remember_token'],
                                    'roles' => $login_result['roles'],
                                    'last_seen_notif' => $login_result['last_seen_notif'],
                                    'img_profile' => base64_encode($login_result['img_profile']),
                                    'img_type' => $login_result['img_type']);
            if (!empty($login_result)) {
                $page = strtolower($login_result['roles']);

                if ($login_result['verified'] == 0) {
                    
                    $this->session->set_flashdata('msg_failed', 'Please check your email to verify before you can login');
                    /*$header['page_title'] = 'Login';
                    $this->load->view('site/login', $header);*/
                    redirect(base_url().'login');
                    
                }else{
                    
                    $this->session->set_userdata($login_result);
                    if ($this->input->post('remember') == 'on') {
                        $token = md5(SALT.sha1(rand(0,15)));
                        $cookie = $this->user_model->set_token($token);
                        if ($cookie) {
                            $cookie_name = "xremo_cookie";
                            $cookie_value = $token;
                            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                        }
                    }

                    redirect(base_url().$page.'/dashboard');

                }
            }else{
                $this->session->set_flashdata('msg_failed', 'Wrong username or password please check again');
                redirect(base_url().'login');                
            }
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
            $header['page_title'] = 'Sign Up';
            $this->load->view('site/signup', $header);
            
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
            redirect(base_url().'login');          
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
            $header['page_title'] = 'Sign Up';
            $this->load->view('site/signup', $header);
            
        }else{
            //call db
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'password' => md5(SALT.sha1($this->input->post('password'))),
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
            redirect(base_url().'login');
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
        redirect(base_url().'site/user/login');
    }

    function logout(){
        $loginCheck = $this->session->userdata('id');
        if(isset($loginCheck)){
            $this->session->sess_destroy();
            redirect(base_url());
        } else {
            show_404();
        }
    }

    function forgot_password(){
        $this->form_validation->set_rules('email','User email', 'trim|required|valid_email|matches[users.email]');
        $email = $this->input->post('email');
        $this->user_model->forgotPassword($email);
        $this->session->set_flashdata('msg_success', 'Please check your email to reset password');
        redirect(base_url().'login');
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
            $password = md5(SALT.sha1($this->input->post('password')));
            $id = $this->session->userdata('id');
            $this->user_model->change_password($id ,$password);
            $this->session->set_flashdata('msg_success', 'Password has been changed.');
			
			//BEGIN : set recent activities
			$data = array(
						'user_id' 		=> $this->session->userdata('id'),
						'ip_address' 	=> $this->input->ip_address(),
						'activity' 		=> "Change Password",
						'icon' 			=> "fa-lock",
						'label' 		=> "success",
						'created_at' 	=> date('Y-m-d H:i:s'),
					);
			setRecentActivities($data);
			//END : set recent activities
        }
        redirect(base_url().$roles.'/settings');
    }

}
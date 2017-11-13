<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('user_model');
        if(empty($countryCheck)){
            show_404();
        }
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
            $page = strtolower($login_result['role']);

            if ($login_result['verified'] == 0) {
                
                $this->session->set_flashdata('msg_alert', 'Please chack your email to verify before you can login');
                $header['page_title'] = 'Login';
                $this->load->view('site/login', $header);
                
            }else{
                
                $this->session->set_userdata($login_result);
                redirect(base_url().$page);

            }
        }
    }

    public function student_signup_post(){
        
        $this->form_validation->set_rules('fullname','Student fullname', 'required');
        $this->form_validation->set_rules('email','Student email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('terms','Terms and Condition', 'required');
        
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
            $email = explode('@', $this->input->post('email'));
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
            }

            $this->session->set_flashdata('msg_success', 'Successfully registered. Please confirm the mail that has been sent to your email.');

            $header['page_title'] = 'Sign Up';
            redirect(base_url().'site/user/signup');          
        }
    }

    public function jobseeker_signup_post(){

        $this->form_validation->set_rules('fullname','Jobseeker fullname', 'required');
        $this->form_validation->set_rules('email','Jobseeker email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('terms','Terms and Condition', 'required');
        
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
                if ($save == false) {
                    throw new Exception('Save failed');
                }
            }catch (Exception $e){
                $this->session->set_flashdata('msg_failed', 'Failed!! Please try again.');
                $header['page_title'] = 'Sign Up';
                $this->load->view('site/signup', $header);
                
            }

            $this->user_model->sendEmail($data);
            $this->session->set_flashdata('msg_success', 'Successfully registered. Please confirm the mail that has been sent to your email.');

            $header['page_title'] = 'Sign Up';
            $this->load->view('site/signup', $header);   
        }
    }

    public function employer_signup_post($user){

        $this->form_validation->set_rules('fullname','Jobseeker fullname', 'required');
        $this->form_validation->set_rules('email','Jobseeker email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('terms','Terms and Condition', 'required');
        
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
                if ($save == false) {
                    throw new Exception('Save failed');
                }
            }catch (Exception $e){
                $this->session->set_flashdata('msg_failed', 'Failed!! Please try again.');
                $header['page_title'] = 'Sign Up';
                $this->load->view('site/signup', $header);
                
            }

            $this->user_model->sendEmail($data);
            $this->session->set_flashdata('msg_success', 'Successfully registered. Please confirm the mail that has been sent to your email.');

            $header['page_title'] = 'Sign Up';
            $this->load->view('site/signup', $header);   
        }
    }

    function confirmEmail($key){
        $data = array('verified' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('users', $data);    //update status as 1 to make active user
    }

}
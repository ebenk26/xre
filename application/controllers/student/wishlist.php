<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
		$this->load->model('employer_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
    }
    
    public function index(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(($roles !== $segment)){
            redirect(base_url());
        }
        
        $profile['page_title']     = 'Wishlist';
        $id                        = $this->session->userdata('id');
        $get_user_profile          = $this->student_model->get_user_profile($id);
        $profile['user_profile']   = $get_user_profile;
        $profile['percent']        = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $profile['language']       = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $data['wishlist']          = $this->student_model->get_company_by_user_id(array('wishlist.student_id' => $id));
        $this->load->view('student/main/header', $profile);
        $this->load->view('student/wishlist',$data);
        $this->load->view('student/main/footer');
	}

    public function get_company(){
        $company = $this->input->get('company_name');
        $data = $this->student_model->get_company('user_profiles', array('user_profiles.company_name' => $company));
        
        print(json_encode($data));
    }

    public function addCompany(){
        $companyId = $this->input->post('companyId');
        $userId = $this->session->userdata('id');
        if (!empty($companyId)) {
            $data = array(  'student_id' => $userId, 
                            'company_id' => $companyId );
        }else{
            $data = array(  'student_id'    => $userId,
                            'company_name'  => $this->input->post('companyName'),
                            'reason'        => $this->input->post('wantToJoinReason'));
        }
        $this->global_model->create('wishlist', $data);
        redirect(base_url().'student/wishlist');
    }

    public function removeCompany(){
        $wishlistId = $this->input->post('wishlistId');
        $data = array(  'id' => $wishlistId);
        $this->global_model->remove('wishlist', $data);
    }
}
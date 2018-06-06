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
        $data['wishlist']          = $this->student_model->get_company_by_user_id(array('wishlist.student_id' => $id, 'wishlist.status'=> 1));
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
        $companyName = $this->input->post('companyName');
        if (!empty($companyId)) {
            $data = array(  'student_id' => $userId, 
                            'company_id' => $companyId,
                            'created_by' => $userId,
                            'status'     => 1 );
        }else{
            if (!empty($companyName)) {
                $data = array(  'student_id'    => $userId,
                                'company_name'  => $this->input->post('companyName'),
                                'reason'        => $this->input->post('wantToJoinReason'),
                                'created_by'    => $userId,
                                'status'        => 1);
            }else{
                redirect(base_url().'student/wishlist#modal_add_wishlist_search');
                $this->session->set_flashdata('msg_error', 'Please write down company name ');
            }
        }
        $this->global_model->create('wishlist', $data);
        redirect(base_url().'student/wishlist');
    }

    public function removeCompany(){
        $wishlistId = $this->input->post('wishlistId');
        $userId = $this->session->userdata('id');
        $where = array(  'id' => $wishlistId);
        $data = array(  'status'=> 0,
                        'deleted_by' => $userId,
                        'deleted_at' => date('Y-m-d H:i:s'));
        $this->global_model->update('wishlist', $where, $data);
    }
}
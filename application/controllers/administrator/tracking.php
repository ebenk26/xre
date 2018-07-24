<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('global_model');
        $this->load->model('student_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] 		= 'Tracking | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
		
        $complement['voucher'] 		= $this->global_model->get('voucher');
		
        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/tracking', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function export(){
        $data['page_title'] = 'Tracking_Voucher';
		$data['type'] 		= 'Voucher';
		$data['hasil'] 		= $this->student_model->get_voucher_user();
		
        $this->load->view('administrator/excel', $data);
	}	
	

    public function post(){
        
        $voucher = $this->input->post('voucher');
        $companyName = $this->input->post('company');
        $this->global_model->create('voucher', array('code'=>$voucher,'company_name'=>$companyName));
		$this->session->set_flashdata('msg_success', 'Success Insert Referral Voucher');
        redirect(base_url().'administrator/tracking');
    }

    public function update(){
        
        $voucher = $this->input->post('voucher');
        $companyName = $this->input->post('company');
        $id = $this->input->post('voucher_id');
        $this->global_model->update('voucher', array('id'=>$id) ,array('code'=>$voucher,'company_name'=>$companyName));
        $this->session->set_flashdata('msg_success', 'Success Update Referral Voucher');
        redirect(base_url().'administrator/tracking');
    }

    public function delete(){
        $obj = $this->input->post('key');

        $this->global_model->remove('voucher', array('id'=>$obj));

        $this->session->set_flashdata('msg_success', 'Success delete Referral Voucher');

        redirect(base_url().'administrator/tracking');
    }    

    public function user(){
        $profile['page_title']      = 'User Referral Code | Admin';
        $complement['voucher']      = $this->student_model->get_voucher_user();
        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/voucherUser', $complement);
        $this->load->view('administrator/main/footer');
    }

}
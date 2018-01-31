<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_item extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('job_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] 		= 'Service Item | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
		
        $complement['result'] 				= $this->get_data();
		
        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/service_item', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function export(){
        $data['page_title'] = 'Service Item';
		$data['type'] 		= 'Service Item';
		$data['hasil'] 		= $this->get_data();
		
        $this->load->view('administrator/excel', $data);
	}
	
	public function get_data(){
        $this->db->select('*');
		$this->db->from('service_items');
		//$this->db->join('user_role', 'users.id = user_role.user_id');
		//$this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        //$this->db->where('user_role.role_id = 3');
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

    public function post(){
        $id 		= $this->input->post('id');
		
		if($this->input->post('submit_type') == "insert"){
			$data = array(
					'name' 					=> $this->input->post('name'),
					'value' 				=> $this->input->post('value'),
					'operation_code' 		=> $this->input->post('operation_code'),
					'created_at' 			=> date('Y-m-d H:i:s'),
					//'verified' 				=> 1,
			);
			$post_status = $this->db->insert('service_items', $data);
			
			$user_id = $this->db->insert_id();
			
		}else{
			//if($this->input->post('password') != $this->input->post('password_old')){				
				$data = array(
						'name' 					=> $this->input->post('name'),
						'value' 				=> $this->input->post('value'),
						'operation_code' 		=> $this->input->post('operation_code'),
						'updated_at' 			=> date('Y-m-d H:i:s'),
				);
				$this->db->where('id', $id);
				$post_status = $this->db->update('service_items', $data);
			//}
		}
		
        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		redirect(base_url().'administrator/service_item');
    }

    public function delete(){
        $id = $this->input->post('post_id');
        $deleteJob = $this->employer_model->job_delete($id);
        if ($deleteJob == true) {
            $this->session->set_flashdata('msg_success', 'Success delete job');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed delete job');
        }
        redirect(base_url().'employer/job_board/');
    }
}
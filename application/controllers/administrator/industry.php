<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industry extends CI_Controller {
    
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
        $profile['page_title'] 		= 'Industry | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
		
        $complement['result'] 				= $this->get_data();
		
        $this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/industry', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function export(){
        $data['page_title'] = 'Industry';
		$data['type'] 		= 'Industry';
		$data['hasil'] 		= $this->get_data();
		
        $this->load->view('administrator/excel', $data);
	}
	
	public function get_data(){
        $this->db->select('*');
		$this->db->from('industries');
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
					'created_at' 			=> date('Y-m-d H:i:s'),
			);
			$post_status = $this->db->insert('industries', $data);
			
			$user_id = $this->db->insert_id();
			
		}else{
			//if($this->input->post('password') != $this->input->post('password_old')){				
				$data = array(
						'name' 					=> $this->input->post('name'),
						'updated_at' 			=> date('Y-m-d H:i:s'),
				);
				$this->db->where('id', $id);
				$post_status = $this->db->update('industries', $data);
			//}
		}
		
        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		redirect(base_url().'administrator/industry');
    }

    public function delete(){
        $id = $this->input->post('id');
        $delete_status = $this->db->delete('industries', array('id' => $id));
        if ($delete_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
        redirect(base_url().'administrator/industry');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endorsment extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('global_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function endorse(){
        $type = $this->input->post('endorsedType');

        if ($type == 'achievement') {
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'achievement_id'    => $this->input->post('dataId') );
        }else{
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'user_project_id'    => $this->input->post('dataId') );
        }
        try {
            $this->global_model->create('endorse', $data);
            $this->session->set_flashdata('msg_success', 'Endorse user success');
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Endorse user failed');
        }
        return json_encode($data);
	}

    public function unendorse(){
        $type = $this->input->post('endorsedType');

        if ($type == 'achievement') {
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'achievement_id'    => $this->input->post('dataId') );
        }else{
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'user_project_id'    => $this->input->post('dataId') );
        }
        try {
            $this->global_model->remove('endorse', $data);
            $this->session->set_flashdata('msg_success', 'Un-endorse user success');
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Un-endorse user failed');
        }
        return json_encode($data);
    }

}
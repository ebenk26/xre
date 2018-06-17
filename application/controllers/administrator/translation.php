<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Translation extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('job_model');
        $this->load->model('global_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] 		= 'Translation Master | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        $translation                = $this->global_model->get('translation', 'id');
        $langID = json_decode(current($translation)['name'],true);
        $langEN = json_decode($translation[1]['name'],true);
        $complement['translation'] = array_merge_recursive($langID, $langEN);
		$this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/translation', $complement );
        $this->load->view('administrator/main/footer');
	}
	
	
    public function post(){
        $obj = $this->input->post('obj');
        $eng = $this->input->post('eng');
        $ina = $this->input->post('ina');

        $translation = $this->global_model->get('translation', 'id');

        if (!empty($eng)) {
            $getTransEng = $this->global_model->get_where('translation', array('locale' => 'EN' ), 'id');
            $translationEng = json_decode(current($getTransEng)['name']);
            foreach ($translationEng as $key => $value) {
                
                $dataEng[$key] = $value;
                
                if ($key !== $obj) {
                
                    $dataEng[$obj] = $eng;
                
                }   

            }

            $this->global_model->update('translation', array('locale' => 'EN' ), array('name'=> json_encode($dataEng)));

        }


        if (!empty($ina)) {
            $getTransIna = $this->global_model->get_where('translation', array('locale' => 'ID' ), 'id');
            $translationIna = json_decode(current($getTransIna)['name']);

            foreach ($translationIna as $key => $value) {

                $dataIna[$key] = $value;

                if ($key !== $obj) {
                
                    $dataIna[$obj] = $ina;
                
                }

            }

            $this->global_model->update('translation', array('locale' => 'ID' ), array('name'=> json_encode($dataIna)));
        }
		
        $this->session->set_flashdata('msg_success', 'Success delete job');

		redirect(base_url().'administrator/translation/');
    }

    public function update(){
        
        $obj = $this->input->post('obj');
        $eng = $this->input->post('eng');
        $ina = $this->input->post('ina');

        $translation = $this->global_model->get('translation', 'id');

        if (!empty($eng)) {
            $getTransEng = $this->global_model->get_where('translation', array('locale' => 'EN' ), 'id');
            $translationEng = json_decode(current($getTransEng)['name']);
            foreach ($translationEng as $key => $value) {
                if ($key !== $obj) {
                    $dataEng[$key] = $value;
                }else{
                    $dataEng[$obj] = $eng;
                }
            }

            $this->global_model->update('translation', array('locale' => 'EN' ), array('name'=> json_encode($dataEng)));

        }


        if (!empty($ina)) {
            $getTransIna = $this->global_model->get_where('translation', array('locale' => 'ID' ), 'id');
            $translationIna = json_decode(current($getTransIna)['name']);

            foreach ($translationIna as $key => $value) {
                if ($key !== $obj) {
                    $dataIna[$key] = $value;
                }else{
                    $dataIna[$obj] = $ina;
                }
                
            }

            $this->global_model->update('translation', array('locale' => 'ID' ), array('name'=> json_encode($dataIna)));
        }

        $this->session->set_flashdata('msg_success', 'Success update translation');
        
        redirect(base_url().'administrator/translation/');
    }

    public function delete(){
        $obj = $this->input->post('key');

        $getTransEng = $this->global_model->get_where('translation', array('locale' => 'EN' ), 'id');
        $translationEng = json_decode(current($getTransEng)['name'],true);
        unset($translationEng[$obj]);

        if (!empty($translationEng)) {

            foreach ($translationEng as $key => $value) {
                if ($key !== $obj) {
                    $dataEng[$key] = $value;
                }else{
                    $dataEng[$obj] = $eng;
                }
            }

            $this->global_model->update('translation', array('locale' => 'EN' ), array('name'=> json_encode($dataEng)));
        }

        $getTransIna = $this->global_model->get_where('translation', array('locale' => 'ID' ), 'id');
        $translationIna = json_decode(current($getTransIna)['name'],true);
        unset($translationIna[$obj]);

        if (!empty($translationIna)) {

            foreach ($translationIna as $key => $value) {
                if ($key !== $obj) {
                    $dataIna[$key] = $value;
                }else{
                    $dataIna[$obj] = $ina;
                }
                
            }

            $this->global_model->update('translation', array('locale' => 'ID' ), array('name'=> json_encode($dataIna)));
        }

        $this->session->set_flashdata('msg_success', 'Success delete job');

        redirect(base_url().'administrator/translation/');
    }
}
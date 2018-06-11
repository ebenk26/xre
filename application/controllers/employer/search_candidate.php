<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_candidate extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== $segment){
            redirect(base_url());
        }
    }

    public function index(){
        $profile['page_title'] = 'Search Candidate';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $profile['user_profile'] = $get_user_profile;
        
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/search_candidate');
        $this->load->view('employer/main/footer');
    }

    public function getCandidate()
    {
        $keywords = $this->input->post('keywords');
        // var_dump($keywords);
        
        $data['searchResult'] = $this->employer_model->getSearchResult($keywords);
        $result["searchResult"] = $this->load->view('employer/search_result',$data,true);
        
        echo json_encode($result);
    }
}

?>
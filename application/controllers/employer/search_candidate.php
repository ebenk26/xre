<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_candidate extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('global_model');
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
        $profile['language']        = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $profile['user_profile']    = $get_user_profile;
        $content['currency']        = $this->employer_model->get('forex');
        $content['education']       = $this->employer_model->get('education_levels');
        $content['user_currency']   = $this->global_model->get_by_id('forex', array('country_id'=>$_COOKIE['country_id']));
        $content['position']        = $this->employer_model->get_position();
        $content['employment']      = $this->employer_model->get_employment();
        $content['yoe']             = $this->employer_model->get_year_of_experience();
        $content['location']        = $this->global_model->get('countries', 'name');
        
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/search_candidate', $content);
        $this->load->view('employer/main/footer');
    }

    public function getCandidate()
    {
        $page = $this->uri->segment(4) != NULL ? $this->uri->segment(4) : 0;

        $params = array_merge(array("page"=>$page),$this->input->post());
        
        $data['searchResult'] = $this->employer_model->getSearchResult($params);
        $result["searchResult"] = $this->load->view('employer/search_result',$data,true);
        
        echo json_encode($result);
    }

    
}

?>
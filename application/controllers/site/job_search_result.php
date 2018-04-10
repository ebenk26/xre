<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Search_Result extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('job_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
			$refer =  explode('/',$this->agent->referrer());
			if(!in_array('job',$refer) || !in_array('search',$refer))
			{
				$this->session->unset_userdata('keyword');
			}
		}

		if($this->input->post('query')){
            $keyword            = trim($this->input->post('query'));
            if($this->input->post('query') == ""){
                $this->session->unset_userdata('keyword');
                $keyword            = "";
            }
        }else{
            if($this->input->get('query')){
                $keyword            = trim($this->input->get('query'));
                if($this->input->get('query') == ""){
                    $this->session->unset_userdata('keyword');
                    $keyword            = "";
                }
            }else{
                $this->session->unset_userdata('keyword');
                $keyword            = $this->session->userdata('keyword');
            }
        }

        

        $offset             = $this->uri->segment(3);
        $perPage            = 5;
        $employment_type    = '';
        $emp_type           = '';
        $position_levels    = '';
        $pos_levels         = '';
        $experiences        = '';
        $exp                = '';
        $company_industry   = '';
        $company_industries = '';
        $country_name       = '';
        $country_names      = '';
        $latest             = '';
        $popular            = '';

        //filter : employment type
        if($this->input->get('employment_type') != NULL)
        {
            $employment_type    = array();

            foreach($this->input->get('employment_type') as $emp_type)
            {
                $employment_type[] = $emp_type;
            }

            $emp_type = '('.implode(',', $employment_type).')';
            $employment_type = '&employment_type[]='.implode('&employment_type[]=', $employment_type);
        }

        //filter : position level
        if($this->input->get('position_levels') != NULL)
        {
            $position_levels    = array();

            foreach($this->input->get('position_levels') as $pos_levels)
            {
                $position_levels[] = $pos_levels;
            }

            $pos_levels = '('.implode(',', $position_levels).')';
            $position_levels = '&position_levels[]='.implode('&position_levels[]=', $position_levels);
        }

        //filter : experiences
        if($this->input->get('experiences') != NULL)
        {
            $experiences    = array();

            foreach($this->input->get('experiences') as $exp)
            {
                $experiences[] = $exp;
            }

            $exp = '('.implode(',', $experiences).')';
            $experiences = '&experiences[]='.implode('&experiences[]=', $experiences);
        }

        //filter : company industry
        if($this->input->get('company_industry') != NULL)
        {
            $company_industry   = $this->input->get('company_industry');
            $company_industries = '&company_industry='.$company_industry;
        }

        //filter : country
        if($this->input->get('country_name') != NULL)
        {
            $country_name   = $this->input->get('country_name');
            $country_names = '&country_name='.$country_name;
        }

        if($this->input->post('clear_all_filter') != NULL)
        {
            $this->session->unset_userdata('keyword');
        }

        if($this->input->get('latest') != NULL)
        {
            $latest   = $this->input->get('latest');
        }
        elseif($this->input->get('popular') != NULL)
        {
            $popular   = $this->input->get('popular');
        }

        //if ($keyword)
        //{
            $this->session->set_userdata('keyword', $keyword);
        //}

        $keyword = $this->session->userdata('keyword');
        // $search['forex']                = $this->session->userdata('forex');
        $search['keyword']              = $keyword;
        $search['search_result']        = $this->job_model->get_job($keyword,$offset,$perPage,$emp_type,$pos_levels,$exp,$company_industry,$country_name,$latest,$popular);
        $search['total_result']         = $this->job_model->get_total_job($keyword,$emp_type,$pos_levels,$exp,$company_industry,$country_name,$popular);
        $search['page_title']           = 'Job Search Result';
        $search['industry']             = $this->job_model->get_array('industries', 'name', 'asc');
        $search['employment_type']      = $this->job_model->get_array('employment_types', 'name', 'asc');
        $search['position_levels']      = $this->job_model->get_array('position_levels', 'id', 'asc');
        $search['year_of_experiences']  = $this->job_model->get_array('year_of_experience', 'id', 'asc');
        $search['emp_type']             = $employment_type;
        $search['pos_levels']           = $position_levels;

        $queryString = $employment_type.$position_levels.$experiences.$company_industries.$country_names;
        $paging = array('base_url'=>XREMO_URL.'job/search/'.$queryString,'total_rows'=>$search['total_result'],'perPage'=>$perPage);
        $search['pagination'] = xrPagination($paging);
// var_dump($search['total_result'],$perPage,urlencode($queryString));exit;
        if($search['total_result'] <= $perPage && $offset != NULL) 
        {
            redirect('job/search?'.$queryString);
        }
        else
        {
            $this->load->view('site/job_search', $search);
        }
	}

    public function filter_get(){
        $id = $this->input->post('id');
        $table = $this->input->post('table');
    }

}
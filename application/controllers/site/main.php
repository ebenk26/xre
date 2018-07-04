<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('global_model');
        $this->load->model('employer_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function index(){
        $page = $this->uri->segment(USER_ROLE);
        $header['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $content['site'] = $this->global_model->get_where('site', array('slug'=>$page, 'locale'=> $_COOKIE['locale']));
        $header['page_title']   = $content['site'][0]['title'];
        $this->load->view('main/header', $header);
        $this->load->view('site/main', $content);
        $this->load->view('main/footer', $header);
	}

    public function downloadResume(){
        $page = base64_decode($this->uri->segment(2));
        
        $data['candidate'] = $this->employer_model->get_bookmarked_user($page);

        // var_dump($data);exit;

        $html = $this->load->view('print/print-v1', $page, true);
        $pdfFilePath = $page.".pdf";
        // $stylesheet = file_get_contents(base_url().'/assets/css/bootstrap/bootstrap.min.css');
        // $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");  

    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('global_model');
    }
    
    public function index(){
        $content['page_title'] = "Sitemap";
        $content['data'] = $this->global_model->get('site');
        $content['blogs'] =   $this->global_model->get('blogs');
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('site/sitemap', $content);
	}

    public function gVerify(){
        $this->load->view('site/gVerify');
    }
}
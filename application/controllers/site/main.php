<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('global_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    
    public function index(){
        $page = $this->uri->segment(USER_ROLE);
        $header['language'] = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : $this->cache->get('language');
        $content['site'] = $this->global_model->get_where('site', array('slug'=>$page, 'locale'=> $_COOKIE['locale']));
        $header['page_title']   = $content['site'][0]['title'];
        $this->load->view('main/header', $header);
        $this->load->view('site/main', $content);
        $this->load->view('main/footer', $header);
	}

}
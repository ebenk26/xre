<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }

    
    public function id(){
        $country = array(
                'country_code' => 'IDN',
                'country' => 'Indonesia',
                'forex' => 'IDR'                
            );

        $this->session->set_userdata($country);
        redirect(base_url().'site/home');
	}

    public function my(){
        $country = array(
                'country_code' => 'MYS',
                'country' => 'Malaysia',
                'forex' => 'MYR'
            );
        $this->session->set_userdata($country);
        redirect(base_url().'site/home');
    }

    public function ph(){
        $country = array(
                'country_code' => 'PHL',
                'country' => 'phillipines',
                'forex' => 'PHP'                
            );

        $this->session->set_userdata($country);
        redirect(base_url().'site/home');
    }

    public function sg(){
        $country = array(
                'country_code' => 'SIN',
                'country' => 'singapore',
                'forex' => 'SGD'                
            );

        $this->session->set_userdata($country);
        redirect(base_url().'site/home');
    }

    public function th(){
        $country = array(
                'country_code' => 'THD',
                'country' => 'thailand',
                'forex' => 'THB'                
            );

        $this->session->set_userdata($country);
        redirect(base_url().'site/home');
    }
}
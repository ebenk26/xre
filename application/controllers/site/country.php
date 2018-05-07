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

        $cookie_name = "country";
        $cookie_value = "id";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        $country_code = "country_code";
        $country_code_value = "IDN";
        setcookie($country_code, $country_code_value, time() + (86400 * 30), "/");

        $country_id = "country_id";
        $country_id_value = 5;
        setcookie($country_id, $country_id_value, time() + (86400 * 30), "/");

        $this->session->set_userdata($country);
        redirect(base_url().'home');
	}

    public function my(){
        $country = array(
                'country_code' => 'MYS',
                'country' => 'Malaysia',
                'forex' => 'MYR'
            );

        $cookie_name = "country";
        $cookie_value = "my";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        $country_code = "country_code";
        $country_code_value = "MYS";
        setcookie($country_code, $country_code_value, time() + (86400 * 30), "/");

        $country_id = "country_id";
        $country_id_value = 3;
        setcookie($country_id, $country_id_value, time() + (86400 * 30), "/");

        $this->session->set_userdata($country);
        redirect(base_url().'home');
    }

    public function ph(){
        $country = array(
                'country_code' => 'PHL',
                'country' => 'Phillipines',
                'forex' => 'PHP'                
            );

        $cookie_name = "country";
        $cookie_value = "ph";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        $country_code = "country_code";
        $country_code_value = "PHL";
        setcookie($country_code, $country_code_value, time() + (86400 * 30), "/");

        $country_id = "country_id";
        $country_id_value = 4;
        setcookie($country_id, $country_id_value, time() + (86400 * 30), "/");


        $this->session->set_userdata($country);
        redirect(base_url().'home');
    }

    public function sg(){
        $country = array(
                'country_code' => 'SIN',
                'country' => 'Singapore',
                'forex' => 'sg'                
            );

        $cookie_name = "country";
        $cookie_value = "sg";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        $this->session->set_userdata($country);
        redirect(base_url().'home');
    }

    public function th(){
        $country = array(
                'country_code' => 'THD',
                'country' => 'Thailand',
                'forex' => 'th'                
            );

        $cookie_name = "country";
        $cookie_value = "th";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        $this->session->set_userdata($country);
        redirect(base_url().'home');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_email extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('user_model');
        $this->load->model('global_model');
        //if(empty($countryCheck)){
        //    redirect(base_url());
        //}
    }
    
    function confirmEmail($key){
        $data = array('verified' => 1);
        $this->db->where('md5(email)',$key);
        $this->db->update('users', $data);    //update status as 1 to make active user
        $this->session->set_flashdata('msg_success', 'Successfully verified. Please login to your account.');
        redirect(base_url().'site/user/login');
    }

}
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

        $confirm = $this->global_model->get_where('users', array('md5(email)' => $key ));
        $confirmed = current($confirm);
        $checkExpiryTime = (strtotime("now") > strtotime($confirmed['created_at'])) && (strtotime("now") <= (strtotime($confirmed['created_at']."+1 day")));
        if ($checkExpiryTime) {
            try {
                $data = array('verified' => 1);
                $this->db->where('md5(email)',$key);
                $this->db->update('users', $data);    //update status as 1 to make active user
                
            } catch (Exception $e) {
                $this->session->set_flash('msg_failed', 'Your data is not complete, please try again later');
                redirect(base_url().'login');
            }
            redirect(base_url().'success_registration');
        }else{
            redirect(base_url().'expired_registration');
        }
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endorsment extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('global_model');
        $this->load->model('student_model');
        if(empty($countryCheck)){
            redirect(base_url());
        }
    }
    
    public function endorse(){
        $type = $this->input->post('endorsedType');

        if ($type == 'achievement') {
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'achievement_id'    => $this->input->post('dataId') );
        }else{
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'user_project_id'    => $this->input->post('dataId') );
        }
        try {
            $this->global_model->create('endorse', $data);
            $this->session->set_flashdata('msg_success', 'Endorse user success');
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Endorse user failed');
        }
        return json_encode($data);
	}

    public function unendorse(){
        $type = $this->input->post('endorsedType');

        if ($type == 'achievement') {
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'achievement_id'    => $this->input->post('dataId') );
        }else{
            $data = array(  'endorser_user_id'  => $this->input->post('endorserId'),
                            'endorsed_user_id'  => base64_decode($this->input->post('endorsedId')),
                            'user_project_id'    => $this->input->post('dataId') );
        }

        try {
            $this->global_model->remove('endorse', $data);
            $this->session->set_flashdata('msg_success', 'Un-endorse user success');
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Un-endorse user failed');
        }

        return json_encode($data);
    }

    public function getEndorser(){
        $type = $this->input->get('endorsedType');
         if ($type == 'achievement') {
            $data = array(  'endorsed_user_id'  => $this->input->get('user_id'),
                            'achievement_id'    => $this->input->get('data_id') );
        }else{
            $data = array(  'endorsed_user_id'  => $this->input->get('user_id'),
                            'user_project_id'    => $this->input->get('data_id') );
        }
        $endorsed_user = $this->student_model->get_endorser($data);
        $i=0;
        foreach ($endorsed_user as $key => $value) {
            $endorsed[$i] = array(      'id'                    =>  $value['id'],
                                        'endorser_user_id'      =>  $value['endorser_user_id'],
                                        'created_at'            =>  date('j F Y', strtotime($value['created_at'])),
                                        'endorsed_user_id'      =>  $value['endorsed_user_id'],
                                        'achievement_id'        =>  $value['achievement_id'],
                                        'user_project_id'       =>  $value['user_project_id'],
                                        'fullname'              =>  $value['fullname'],
                                        'company_name'          =>  $value['company_name'],
                                        'profile_photo'         =>  $value['profile_photo'],
                                        'type'                  =>  $value['type']);

            $i++;
        }
        print json_encode($endorsed);
    }

    public function getReview(){
        $type = $this->input->get('endorsedType');
         if ($type == 'experience') {
            $data = array(  'reviews.user_id'  => base64_decode($this->input->get('user_id')),
                            'reviews.exp_id'    => $this->input->get('data_id') );
        }else{
            $data = array(  'reviews.user_id'  => base64_decode($this->input->get('user_id')),
                            'reviews.skill_id'    => $this->input->get('data_id') );
        }
        $reviewed_user = $this->student_model->get_review($data);
        $i=0;
        foreach ($reviewed_user as $key => $value) {
            $reviewed[$i] = array(      'id'                    =>  $value['id'],
                                        'created_at'            =>  time_elapsed_string($value['created_at']),
                                        'fullname'              =>  $value['fullname'],
                                        'profile_photo'         =>  $value['profile_photo'],
                                        'rating'                =>  $value['rating'],
                                        'type'                  =>  $value['type']);

            $i++;
        }
        print json_encode($reviewed);
    }

    public function getRate(){
        $type = $this->input->get('endorsedType');
         if ($type == 'experience') {
            $data = array(  'ratings.user_id'  => base64_decode($this->input->get('user_id')),
                            'ratings.exp_id'    => $this->input->get('data_id') );
        }else{
            $data = array(  'ratings.user_id'  => base64_decode($this->input->get('user_id')),
                            'ratings.skill_id'    => $this->input->get('data_id') );
        }
        $rating_user = $this->student_model->get_ratings($data);
        $i=0;
        foreach ($rating_user as $key => $value) {
            $rating[$i] = array(      'id'                    =>  $value['id'],
                                        'created_at'            =>  time_elapsed_string($value['created_at']),
                                        'fullname'              =>  $value['fullname'],
                                        'profile_photo'         =>  $value['profile_photo'],
                                        'rating'                =>  $value['rating'],
                                        'type'                  =>  $value['type']);

            $i++;
        }
        print json_encode($rating);
    }

    public function rate(){

        $exp = $this->input->post('exp_id');
        if (!empty($exp)) {
            $data = array(  'rating' => $this->input->post('ratings'),
                            'exp_id' => $this->input->post('exp_id'),
                            'endorser_id' => $this->input->post('endorser_id'),
                            'user_id' => $this->input->post('endorsed_id'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s') );
        }else{
            $data = array(  'rating' => $this->input->post('ratings'),
                        'skill_id' => $this->input->post('skill_id'),
                        'endorser_id' => $this->input->post('endorser_id'),
                        'user_id' => $this->input->post('endorsed_id'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s') );
        }


        try {
            $this->global_model->create('ratings', $data);
            $this->session->set_flashdata('msg_success', 'Rating user success');
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Rating user failed');
        }
        redirect(base_url().'profile/user/'.base64_encode($this->input->post('endorsed_id')));

    }

    public function review(){

        $exp = $this->input->post('exp_id');

        if (!empty($exp)) {
            $data = array(  'rating' => $this->input->post('rating'),
                            'exp_id' => $this->input->post('exp_id'),
                            'endorser_id' => $this->input->post('endorser_id'),
                            'user_id' => $this->input->post('endorsed_id'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s') );
        }else{
            $data = array(  'rating' => $this->input->post('rating'),
                            'skill_id' => $this->input->post('skill_id'),
                            'endorser_id' => $this->input->post('endorser_id'),
                            'user_id' => $this->input->post('endorsed_id'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s') );
        }


        try {
            $this->global_model->create('reviews', $data);
            $this->session->set_flashdata('msg_success', 'Review user success');
        } catch (Exception $e) {
            $this->session->set_flashdata('msg_failed', 'Review user failed');
        }
        redirect(base_url().'profile/user/'.base64_encode($this->input->post('endorsed_id')));
    }

}
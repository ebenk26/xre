<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
		$this->load->model('employer_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
    }
    
    public function index(){
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if(($roles !== $segment)){
            redirect(base_url());
        }
        
        $profile['page_title']     = 'Wishlist';
        $id                        = $this->session->userdata('id');
        $get_user_profile          = $this->student_model->get_user_profile($id);
        $profile['user_profile']   = $get_user_profile;
        $profile['percent']        = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $profile['language']       = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $data['wishlist']          = $this->student_model->get_company_by_user_id(array('wishlist.student_id' => $id, 'wishlist.status'=> 1));

        $wishlistCount = $this->global_model->get_where('wishlist', array('student_id'=>$id, 'wishlist.status'=>1));
        $data['totalWishlist'] = count($wishlistCount);

        $this->load->view($roles.'/main/header', $profile);
        $this->load->view($roles.'/wishlist',$data);
        $this->load->view($roles.'/main/footer');
	}

    public function get_company(){
        $company = $this->input->get('company_name');
        $data = $this->student_model->get_company('user_profiles', array('user_profiles.company_name' => $company));
        $wishlist = $this->global_model->get_where('wishlist', array('company_id'=>$this->session->userdata('id')));
        // $res = array_search($this->session->userdata('id'), array_column($data,'wishlist_user_id'));
        $newData=[];
        foreach ($data as $key => $value) {
            
            $checkPhotoProfile[$key] = get_headers(IMG_EMPLOYERS.$value['profile_photo']); 
            $newData[$key] = array(   'id'=>$value['id'],
                                'company_name'=>$value['company_name'],
                                'registered_company'=> $value['registered_company'],
                                'profile_photo'=> ($checkPhotoProfile[$key][0] == 'HTTP/1.1 200 OK') && ($value['profile_photo'] !== NULL) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_EMPLOYERS.'profile-pic.png',
                                'company_id'=> $value['company_id'],
                                'wishlist_id'=> $value['wishlist_id'],
                                'wishlist_user_id'=> $value['wishlist_user_id'],
                                'status'=> $value['status'],
                                'session_id'=> $this->session->userdata('id'),
                            );
        }


        print(json_encode($newData));
    }

    public function addCompany(){
        $companyId = $this->input->post('companyId');
        $userId = $this->session->userdata('id');
        $companyName = $this->input->post('companyName');
        $roles = $this->session->userdata('roles');
        if (!empty($companyId)) {
            $data = array(  'student_id' => $userId, 
                            'company_id' => $companyId,
                            'created_by' => $userId,
                            'status'     => 1 );
        }else{
            if (!empty($companyName)) {
                $data = array(  'student_id'    => $userId,
                                'company_name'  => $this->input->post('companyName'),
                                'reason'        => $this->input->post('wantToJoinReason'),
                                'created_by'    => $userId,
                                'status'        => 1);
            }else{
                redirect(base_url().'student/wishlist#modal_add_wishlist_search');
                $this->session->set_flashdata('msg_error', 'Please write down company name ');
            }
        }
        $this->global_model->create('wishlist', $data);
        redirect(base_url().$roles.'/wishlist');
    }

    public function removeCompany(){
        $wishlistId = $this->input->post('wishlistId');
        $userId = $this->session->userdata('id');
        $where = array(  'id' => $wishlistId);
        $data = array(
                    'user_id'       => $this->session->userdata('id'),
                    'ip_address'    => $this->input->ip_address(),
                    'activity'      => "Remove Wishlist of company",
                    'icon'          => "fa-edit",
                    'label'         => "success",
                    'created_at'    => date('Y-m-d H:i:s'),
                );
        setRecentActivities($data);
        $this->global_model->update('wishlist', array('student_id'=> $userId, 'id'=>$wishlistId), array('status'=> 0));
        // $this->global_model->remove('wishlist', $where);
    }

    public function checkWishlistAvailability(){
        $companyId = $this->input->get('companyId');
        $userId = $this->session->userdata('id');
        $where = array('student_id' => $userId,
                        'company_id' => $companyId);
        $resultCheck = $this->global_model->get_where('wishlist', $where);
        $result = current($resultCheck);
        $result['response'] = !empty($resultCheck) ? 'exist' : 'empty'; 
        print json_encode($result);
    }
}
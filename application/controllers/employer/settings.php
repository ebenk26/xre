<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('employer_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== $segment){
            redirect(base_url());
        }
    }

    public function index(){
    	$profile['page_title'] = 'Setting';
        $id = $this->session->userdata('id');
        $where = array('user_id' => $this->session->userdata('id'));
        $setting['settings'] = $this->global_model->get_by_id('user_profiles', $where);
        $setting['country'] = $this->global_model->get('countries', 'name');
		$id = $this->session->userdata('id');
        $get_user_profile = $this->employer_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $this->load->view('employer/main/header', $profile);
        $this->load->view('employer/setting', $setting);
        $this->load->view('employer/main/footer');
    }

    public function change_company_name(){
        $data = array('company_name' => $this->input->post('company_name'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        $this->session->set_userdata('name', $this->input->post('company_name'));
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Company Name",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'employer/settings');
    }

    public function change_person_in_charge(){
        $pic = array('pic_name' => $this->input->post('pic_name'),
                     'pic_position' => $this->input->post('pic_position'),
                     'pic_email' => $this->input->post('pic_email'));

        $data = array('contact_person' => json_encode($pic));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
		
		//BEGIN : set recent activities
		$data = array(
					'user_id' 		=> $this->session->userdata('id'),
					'ip_address' 	=> $this->input->ip_address(),
					'activity' 		=> "Change Person in Charge",
					'icon' 			=> "fa-edit",
					'label' 		=> "success",
					'created_at' 	=> date('Y-m-d H:i:s'),
				);
		setRecentActivities($data);
		//END : set recent activities
		
        redirect(base_url().'employer/settings');
    }

    public function changeSearchableDetail(){
        $data = array('searchable_detail' => $this->input->post('status'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        redirect(base_url().'employer/settings');
    }

    public function changeSearchable(){
        $data = array('searchable' => $this->input->post('status'));
        $where = array('user_id' => $this->session->userdata('id'));
        $this->global_model->update('user_profiles', $where, $data);
        redirect(base_url().'employer/settings');
    }

    public function billing_shipping_address(){
        $id = $this->session->userdata('id');
        $billing_same_with_shipping = $this->input->post('billing_same_with_shipping');
        $billing = array(   'billing_name' => $this->input->post('billing-company'),
                            'billing_address' => $this->input->post('billing-address'),
                            'billing_postcode' => $this->input->post('billing-postcode'),
                            'billing_city' => $this->input->post('billing-city'),
                            'billing_state' => $this->input->post('billing-state'),
                            'billing_country' => $this->input->post('billing-country'),
                            'billing_phone' => $this->input->post('billing-phone'),
                            'billing_fax' => $this->input->post('billing-fax'));

        $shipping = array(  'shipping_name' => $this->input->post('shipping-company'),
                            'shipping_address' => $this->input->post('shipping-address'),
                            'shipping_postcode' => $this->input->post('shipping-postcode'),
                            'shipping_city' => $this->input->post('shipping-city'),
                            'shipping_state' => $this->input->post('shipping-state'),
                            'shipping_country' => $this->input->post('shipping-country'),
                            'shipping_phone' => $this->input->post('shipping-phone'),
                            'shipping_fax' => $this->input->post('shipping-fax'));

        if ($billing_same_with_shipping == 'on') {
            
            $shipping_billing = array(  'shipping_name' => $this->input->post('shipping-company'),
                                        'shipping_address' => $this->input->post('shipping-address'),
                                        'shipping_postcode' => $this->input->post('shipping-postcode'),
                                        'shipping_city' => $this->input->post('shipping-city'),
                                        'shipping_state' => $this->input->post('shipping-state'),
                                        'shipping_country' => $this->input->post('shipping-country'),
                                        'shipping_phone' => $this->input->post('shipping-phone'),
                                        'shipping_fax' => $this->input->post('shipping-fax'),
                                        'billing_name' => $this->input->post('shipping-company'),
                                        'billing_address' => $this->input->post('shipping-address'),
                                        'billing_postcode' => $this->input->post('shipping-postcode'),
                                        'billing_city' => $this->input->post('shipping-city'),
                                        'billing_state' => $this->input->post('shipping-state'),
                                        'billing_country' => $this->input->post('shipping-country'),
                                        'billing_phone' => $this->input->post('shipping-phone'),
                                        'billing_fax' => $this->input->post('shipping-fax')
                                        );

            $this->global_model->update('user_profiles', array('user_id' => $id), $shipping_billing );
        }else{
            $this->global_model->update('user_profiles', array('user_id' => $id), $shipping );
            $this->global_model->update('user_profiles', array('user_id' => $id), $billing );
        }

        //BEGIN : set recent activities
        $data = array(
                    'user_id'       => $this->session->userdata('id'),
                    'ip_address'    => $this->input->ip_address(),
                    'activity'      => "Change Payment Setting",
                    'icon'          => "fa-money",
                    'label'         => "success",
                    'created_at'    => date('Y-m-d H:i:s'),
                );
        setRecentActivities($data);
        //END : set recent activities

        redirect(base_url().'employer/settings#tab_payment');
    }
}

?>
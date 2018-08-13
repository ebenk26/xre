<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

	public function index()
	{
		isset($_COOKIE['xremo_token']) ? $token_cookie = $this->user_model->get_token($_COOKIE['xremo_cookie']) : $token_cookie = false;
		// $token_cookie = $this->user_model->get_token($_COOKIE['xremo_cookie']);
		if (isset($_COOKIE['country'])) {
			redirect(base_url().'site/country/'.$_COOKIE['country']);
		}else{
			$refer =  "";
			$this->load->library('user_agent');
			if ($this->agent->is_referral())
			{
			    $refer =  $this->agent->referrer();
			}
			if(strpos($refer, 'confirm_email') !== false){
				$this->session->set_flashdata('msg_success', 'Successfully verified. Please login to your account.');
        		redirect(base_url().'site/user/login');
			}else{
				
				/* edited by rizki */
				$client  = @$_SERVER['HTTP_CLIENT_IP'];
				$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
				$remote  = @$_SERVER['REMOTE_ADDR'];
				$result  = array('country'=>'', 'city'=>'');
				if(filter_var($client, FILTER_VALIDATE_IP)){
					$ip = $client;
				}elseif(filter_var($forward, FILTER_VALIDATE_IP)){
					$ip = $forward;
				}else{
					$ip = $remote;
				}
				$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
				if($ip_data && $ip_data->geoplugin_countryName != null){
					$result['country'] = $ip_data->geoplugin_countryCode;
					$result['city'] = $ip_data->geoplugin_city;
				}
				
				if($result['country']=="ID"){
					redirect(base_url().'site/country/id');
				}else if($result['country']=="PH"){
					redirect(base_url().'site/country/ph');
				}else{
					redirect(base_url().'site/country/my');
				}
				
				/* if ($_SERVER['REMOTE_ADDR']=="::1") {
					$this->load->view('welcome_message');
					// redirect(base_url().'site/country/id');
				}else{
					$this->load->view('welcome_message');
				} */
			}			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
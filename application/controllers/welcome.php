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
		var_dump($token_cookie);
		if (isset($_COOKIE['country'])) {
			redirect(base_url().'site/country/'.$_COOKIE['country']);
		}else{
			$this->load->view('welcome_message');			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
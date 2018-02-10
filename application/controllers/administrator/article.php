<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('job_model');
        $countryCheck 	= $this->session->userdata('country');
        $roles 			= $this->session->userdata('roles');
        $segment 		= $this->uri->segment(USER_ROLE);
        if(empty($countryCheck) ){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] 		= 'Article | Admin';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['employment_type'] 		= $this->employer_model->get_employment();
        $complement['position_levels'] 		= $this->employer_model->get_position();
        $complement['year_of_experience'] 	= $this->employer_model->get_year_of_experience();
        $complement['result'] 				= $this->get_data();
        
		$this->load->view('administrator/main/header', $profile);
        $this->load->view('administrator/article', $complement);
        $this->load->view('administrator/main/footer');
	}
	
	public function list_public(){
        $this->session->unset_userdata('article_page');
		$this->session->set_userdata('article_page', 1);
		
		$profile['page_title'] 		= 'Article';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['result'] 		= $this->get_data();
		$complement['popular'] 		= $this->get_data_list(1);
        $complement['recent'] 		= $this->get_data_list(2);
        
		$this->load->view('main/header', $profile);
        $this->load->view('administrator/article_list', $complement);
        $this->load->view('main/footer');
	}
	
	public function list_public_page($page){
        if($page < 1 || !is_numeric($page)){
			redirect(base_url().'article');
		}
		$this->session->set_userdata('article_page', $page);
		
		$profile['page_title'] 		= 'Article';
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['result'] 		= $this->get_data();
		$complement['popular'] 		= $this->get_data_list(1);
        $complement['recent'] 		= $this->get_data_list(2);
        
		$this->load->view('main/header', $profile);
        $this->load->view('administrator/article_list', $complement);
        $this->load->view('main/footer');
	}
	
	public function get_data(){
        $this->db->select('*');
		$this->db->from('blogs');
		//$this->db->join('users', 'users.id = job_positions.user_id');
		//$this->db->join('user_profiles', 'user_profiles.user_id = users.id');
        $this->db->order_by('id', 'DESC');
		//$this->db->where('user_role.role_id = 3');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_data_list($type){
        $this->db->select('*');
		$this->db->from('blogs');
		if($type == 1){
			$this->db->order_by('number_of_view', 'DESC');
			$this->db->order_by('created_at', 'DESC');
		}else{
			$this->db->order_by('created_at', 'DESC');
		}
		$query = $this->db->get();
		return $query->result();
	}

    public function post(){
        $id 			= $this->input->post('id');
		$slug 			= strtolower($this->input->post('title'));
		$slug 			= str_replace(" ","-",$slug);
		$featured_image = "";
		
		$upload_path 	= 	'assets/img/article/';
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0755, true);
		}
		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'jpg|jpeg|png';
		$config['max_size']			= '2048';
		$config['overwrite']  		= FALSE;
		//$config['encrypt_name']  	= TRUE;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (isset($_FILES['featured_image']['name']) && !empty($_FILES['featured_image']['name'])){
			if ( $this->upload->do_upload('featured_image'))
			{
				$detail = $this->upload->data();
				$namafile = $detail['file_name'];
				
				$featured_image = $namafile;
			}
		}
		
		if($this->input->post('submit_type') == "insert"){
			$data = array(
					'title' 				=> $this->input->post('title'),
					'slug' 					=> $slug,
					'body' 					=> $this->input->post('body'),
					'excerpt' 				=> $this->input->post('excerpt'),
					'tags' 					=> $this->input->post('tags'),
					'author' 				=> $this->input->post('author'),
					'featured_image' 		=> $featured_image,
					'created_at' 			=> date('Y-m-d H:i:s'),
			);
			$post_status = $this->db->insert('blogs', $data);
			
			$user_id = $this->db->insert_id();
			
		}else{
			//if($this->input->post('password') != $this->input->post('password_old')){				
				$data = array(
						'title' 				=> $this->input->post('title'),
						'slug' 					=> $slug,
						'body' 					=> $this->input->post('body'),
						'excerpt' 				=> $this->input->post('excerpt'),
						'tags' 					=> $this->input->post('tags'),
						'author' 				=> $this->input->post('author'),
						'updated_at' 			=> date('Y-m-d H:i:s'),
				);
				$this->db->where('id', $id);
				$post_status = $this->db->update('blogs', $data);
				
				if($featured_image != ""){
					$data = array(
							'featured_image' 		=> $featured_image,
					);
					$this->db->where('id', $id);
					$post_status = $this->db->update('blogs', $data);
				}
			//}
		}

        if ($post_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
		
		redirect(base_url().'administrator/article');
    }

    public function delete(){
        $id = $this->input->post('id');
        $delete_status = $this->db->delete('blogs', array('id' => $id));
        if ($delete_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
        redirect(base_url().'administrator/article');
    }
	
	public function view($id){
        $this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$article = $query->row();
		
		$profile['page_title'] 		= $article->title;
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['article'] 		= $article;
		$complement['popular'] 		= $this->get_data_list(1);
        $complement['recent'] 		= $this->get_data_list(2);
        
		$this->load->view('main/header', $profile);
        $this->load->view('administrator/article_view', $complement);
        $this->load->view('main/footer');
	}
	
	public function view_public($slug){
        $this->db->set('number_of_view', 'number_of_view+1', FALSE);
		$this->db->where('slug', $slug);
		$this->db->update('blogs');
		
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		$article = $query->row();
		
		$profile['page_title'] 		= $article->title;
        $id 						= $this->session->userdata('id');
        $get_user_profile 			= $this->employer_model->get_user_profile($id);
        $profile['user_profile'] 	= $get_user_profile;
        
		$complement['article'] 		= $article;
		$complement['popular'] 		= $this->get_data_list(1);
        $complement['recent'] 		= $this->get_data_list(2);
        
		$this->load->view('main/header', $profile);
        $this->load->view('administrator/article_view', $complement);
        $this->load->view('main/footer');
	}
	
	public function getArticle(){
        $this->db->select('*');
		$this->db->from('blogs');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(3);
		
		$query = $this->db->get();
		$data['article'] = $query->result_array();
		$article['article'] = $this->load->view('administrator/article_home',$data,true);

		$result = json_encode($article);

		echo $result;
	}
	
}
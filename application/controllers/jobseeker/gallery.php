<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $countryCheck = $this->session->userdata('country');
        $this->load->model('student_model');
        $this->load->model('job_model');
        $this->load->model('global_model');
        $roles = $this->session->userdata('roles');
        $segment = $this->uri->segment(USER_ROLE);
        if($roles !== $segment){
            redirect(base_url());
        }
    }
    
    public function index(){
        $profile['page_title'] = 'Gallery';
        $id = $this->session->userdata('id');
        $get_user_profile = $this->student_model->get_user_profile($id);
        $profile['user_profile'] = $get_user_profile;
        $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
        $profile['language']    = !empty($_COOKIE['locale']) ? getLocaleLanguage($_COOKIE['locale']) : getLocaleLanguage('EN');
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $gallery = $query->result_array();

        $data['gallery'] = $gallery;
        $this->load->view('jobseeker/main/header', $profile);
        $this->load->view('jobseeker/gallery', $data);
        $this->load->view('jobseeker/main/footer');
	}

    public function post(){
        $arr_old = explode("/", $this->input->post('photo_old'));$last_old = count($arr_old) - 1;
        $arr = explode("/", $this->input->post('photo'));$last = count($arr) - 1;
        //EDIT
        if ($this->input->post('id') != 0) {
            $data = array(
                'title'         => $this->input->post('title')?$this->input->post('title'):"",
                'description'   => $this->input->post('description')?$this->input->post('description'):"",
                'photo'         => $arr[$last],
                'updated_at'    => date('Y-m-d H:i:s'),
            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('gallery', $data);

            //if edit dengan photo baru maka hapus photo lama
            if($arr[$last] != $arr_old[$last_old]){
                unlink("assets/img/gallery/".$arr_old[$last_old]);
            }

            //BEGIN : set recent activities
            $data = array(
                        'user_id'       => $this->session->userdata('id'),
                        'ip_address'    => $this->input->ip_address(),
                        'activity'      => "Edit Gallery Photo",
                        'icon'          => "fa-photo",
                        'label'         => "success",
                        'created_at'    => date('Y-m-d H:i:s'),
                    );
            setRecentActivities($data);
            //END : set recent activities
        //ADD
        }else{
            if($this->input->post('photo') != ""){
                $data = array(
                    'title'         => $this->input->post('title')?$this->input->post('title'):"",
                    'description'   => $this->input->post('description')?$this->input->post('description'):"",
                    'photo'         => $arr[$last],
                    'user_id'       => $this->session->userdata('id'),
                    'created_at'    => date('Y-m-d H:i:s'),
                );
            
                $this->db->insert('gallery', $data);

                //BEGIN : set recent activities
                $data = array(
                            'user_id'       => $this->session->userdata('id'),
                            'ip_address'    => $this->input->ip_address(),
                            'activity'      => "Add Gallery Photo",
                            'icon'          => "fa-photo",
                            'label'         => "success",
                            'created_at'    => date('Y-m-d H:i:s'),
                        );
                setRecentActivities($data);
                //END : set recent activities
            }             
        }        
        
        redirect(base_url().'jobseeker/gallery');
    }

    public function get_data_array($id){
        $this->db->select('*');
        $this->db->from('gallery');
        //$this->db->join('user_role', 'users.id = user_role.user_id');
        //$this->db->join('user_profiles', 'user_profiles.user_id = users.id', 'left');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        echo json_encode($result);
    }

    public function delete(){
        $id     = $this->input->post('id');
        $photo  = $this->input->post('photo');
        unlink("assets/img/gallery/".$photo);
        $delete_status = $this->db->delete('gallery', array('id' => $id));
        if ($delete_status == true) {
            $this->session->set_flashdata('msg_success', 'Success');            
        }else{
            $this->session->set_flashdata('msg_error', 'Failed');
        }
        redirect(base_url().'jobseeker/gallery');
    }

    public function upload_image(){
        //IF NOT EMPTY PROFILE PICTURE
        if(!empty($_FILES['profile_photo']['tmp_name'])){
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $checkImage = $this->student_model->checkImageExist($userImageID);
            $tempFile = $_FILES['profile_photo']['tmp_name'];        
            $targetPath = "./assets/img/jobseeker/";

            $path = pathinfo($_FILES['profile_photo']['name']);
            $ext = $path['extension'];
            $profile_photo = 'profile_photo_'.$this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
            $targetFile =  $targetPath.$profile_photo;
            if (isset($checkImage)) {

                // unlink("./assets/img/jobseeker/".$checkImage['name']);
                move_uploaded_file($tempFile,$targetFile);                
            }else{
                move_uploaded_file($tempFile,$targetFile);
            }
        }else{
            $userImageID = array('user_id' => $this->session->userdata('id'),
                            'type' => 'profile_photo');
            $userImage = $this->student_model->checkImageExist($userImageID);
            $profile_photo = isset($userImage['name']) ? $userImage['name'] : 'profile-pic.png';
        }
    }

    public function img_save_to_file(){
        /*$tempFile = $_FILES['profile_photo']['tmp_name'];        
        $targetPath = "./assets/img/jobseeker/";

        $path = pathinfo($_FILES['profile_photo']['name']);
        $ext = $path['extension'];
        $profile_photo = 'profile_photo_'.$this->session->userdata('id').'_'.md5($this->input->post('student_name')).'_'.date('dmY').".$ext";
        $targetFile =  $targetPath.$profile_photo;
        move_uploaded_file($tempFile,$targetFile);   */             
        
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //$imagePath = base_url()."assets/global/plugins/Croppic/croppic/temp/";
        $imagePath = "./assets/img/gallery/original/";
        $imagePath1 = "assets/img/gallery/original/";

        $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
        $temp = explode(".", $_FILES["img"]["name"]);
        $extension = end($temp);
        
        //Check write Access to Directory

        if(!is_writable($imagePath)){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t upload File; no write Access'
            );
            print json_encode($response);
            return;
        }
        
        if ( in_array($extension, $allowedExts))
          {
          if ($_FILES["img"]["error"] > 0)
            {
                 $response = array(
                    "status" => 'error',
                    //"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
                    "message" => 'something went wrong, most likely file is too large for upload.'
                );          
            }
          else
            {
                
              $filename = $_FILES["img"]["tmp_name"];
              list($width, $height) = getimagesize( $filename );

              $new_name = preg_replace('/\s+/', '', $_FILES["img"]["name"]);

              //.'_'.md5($this->input->post('student_name'))
              //$profile_photo = $this->session->userdata('id').'_'.date('YmdHi').'_'.$_FILES["img"]["name"];
              $profile_photo = $this->session->userdata('id').'_'.date('YmdHi').'_'.$new_name;
              $targetFile =  $imagePath . $profile_photo;

              //move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);
              move_uploaded_file($filename,  $targetFile);

              $response = array(
                "status" => 'success',
                //"url" => $imagePath.$_FILES["img"]["name"],
                "url" => base_url().$imagePath1.$profile_photo,                
                "width" => $width,
                "height" => $height
              );
              
            }
          }
        else
          {
           $response = array(
                "status" => 'error',
                "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
            );
          }
          
          print json_encode($response);
    }

    public function img_crop_to_file(){
        //$imagePath = base_url()."assets/global/plugins/Croppic/croppic/temp/";

        $imgUrl = $_POST['imgUrl'];
        // original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
        // resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
        // offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
        // crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
        // rotation angle
        $angle = $_POST['rotation'];

        $jpeg_quality = 100;

        $rand = rand();
        $profile_photo = $this->session->userdata('id').'_'.date('YmdHis');
        $output_filename = "./assets/img/gallery/".$profile_photo;
        $output_filename1 = "assets/img/gallery/".$profile_photo;

        
        // uncomment line below to save the cropped image in the same location as the original image.
        //$output_filename = dirname($imgUrl). "/croppedImg_".rand();

        $what = getimagesize($imgUrl);

        switch(strtolower($what['mime']))
        {
            case 'image/png':
                $img_r = imagecreatefrompng($imgUrl);
                $source_image = imagecreatefrompng($imgUrl);
                $type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            case 'image/jpg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($imgUrl);
                $source_image = imagecreatefromgif($imgUrl);
                $type = '.gif';
                break;
            default: die('image type not supported');
        }


        //Check write Access to Directory

        if(!is_writable(dirname($output_filename))){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t write cropped File'
            );  
        }else{

            // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            // finally output png image
            //imagepng($final_image, $output_filename.$type, $png_quality);
            imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
            $response = Array(
                "status" => 'success',
                "url" => base_url().$output_filename1.$type,
                "imgUrl" => $imgUrl
            );

            $arr = explode("/", $imgUrl);$last = count($arr) - 1;

            unlink("assets/img/gallery/original/".$arr[$last]);
        }
        print json_encode($response);
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '' : 'just now';
	//return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function xrPagination($param=array())
{
    $CI =& get_instance();
    $CI->load->library('pagination');

    $config['base_url']         = $param["base_url"];
    $config['total_rows']       = $param["total_rows"];
    $config['per_page']         = $param["perPage"];
    $config['uri_segment']      = 3;
    $config['num_links']        = 5;
    $config['full_tag_open']    = '<li>';
    $config['full_tag_close']   = '</li>';
    $config['prev_link']        = '<i class="fa fa-angle-left"></i>';
    $config['next_link']        = '<i class="fa fa-angle-right"></i>';
    $config['cur_tag_open']     = '<li class="active"><a>';
    $config['cur_tag_close']    = '</a></li>';
    $config['next_tag_open']    = '<li>';
    $config['next_tag_close']   = '</li>';
    $config['num_tag_open']     = '<li>';
    $config['num_tag_close']    = '</li>';
    $config['first_link']       = FALSE;
    $config['last_link']        = FALSE;

    $CI->pagination->initialize($config); 

    return $CI->pagination->create_links();
}

function ProfileCompletion($params)
{
    $CI =& get_instance();
    $CI->load->model('employer_model');
    
    $profile['social'] = $CI->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $CI->session->userdata('id') ));
    $profile['profile_photo'] = $CI->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $CI->session->userdata('id'), 'type'=>'profile_photo'));
    $profile['header_photo'] = $CI->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $CI->session->userdata('id'), 'type'=>'header_photo'));

    //About Company 50%
    $About["company_name"]      = !empty($params['company_name']) ? 10 : 0;
	$About["company_email"]     = !empty($params['email']) ? 5 : 0;
    $About["industry"]          = !empty($params['industry']) ? 5 : 0;
    $About["company_desc"]      = !empty($params['company_description']) ? 5 : 0;
    $About["company_url"]       = !empty($params['url']) ? 5 : 0;
    $About["profile_photo"]     = !empty($profile["profile_photo"]) ? 10 : 0;
    $About["header_photo"]      = !empty($profile["header_photo"]) ? 5 : 0;
    $About["social"]            = !empty($profile["social"]) ? 5 : 0;
    
    //Additional Info 30%
    $Additional   = !empty($params['total_staff']) ? 5 : 0;
    $Additional   += !empty($params['dress_code']) ? 5 : 0;
    $Additional   += !empty($params['working_days_start']) ? 2.5 : 0;
    $Additional   += !empty($params['working_days_end']) ? 2.5 : 0;
    $Additional   += !empty($params['working_hours_start']) ? 2.5 : 0;
    $Additional   += !empty($params['working_hours_end']) ? 2.5 : 0;
    $Additional   += !empty($params['spoken_language']) ? 5 : 0;
    $Additional   += !empty($params['benefits']) ? 5 : 0;
    
    //Contact Information 20%
    $addr = !empty(json_decode($params['address'])) ? json_decode($params['address']) : '';
    $Contact = 0;
    if(!empty($addr))
    {
        $addr = $addr[0];

        $Contact   += !empty($addr->optionsRadios) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_address) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_city) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_postcode) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_state) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_country) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_email) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_phone) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_fax) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_latitude) ? 1.81818181818 : 0;
        $Contact   += !empty($addr->building_longitude) ? 1.81818181818 : 0;
    }

    $sum    = array_sum($About) + $Additional + $Contact;
    $total  = round($sum);
    
    return $total;
}

function StudentProfileCompletion($params)
{
    $CI =& get_instance();
    $CI->load->model('student_model');
    $id = $CI->session->userdata('id');
    $get_user_profile = $CI->student_model->get_user_profile($id);
    $profile['percent'] = $get_user_profile['percent'] > 100 ? 100 : $get_user_profile['percent'];
    return $profile;
}

function Notification($status='0')
{
    $CI =& get_instance();
    $CI->load->model('notification_model');

    $user_id            = $CI->session->userdata('id');
    $last_seen_notif    = $CI->session->userdata('last_seen_notif');

    if($status == '2'){
        $notif = $CI->notification_model->get_where('notifications','created_at','DESC',"user_id = $user_id AND viewed IN('0') AND created_at >= '$last_seen_notif'");
    }else{
        $notif = $CI->notification_model->get_where('notifications','created_at','DESC',"user_id = $user_id AND viewed IN($status)");
    }    

    return $notif;
}

function GetInterval()
{
    $CI =& get_instance();
    $CI->load->model('notification_model');

    $getInterval  = $CI->notification_model->get('notifications_setting');

    $result = $getInterval[0]["interval_second"] * 1000;

    return $result;
}

function setRecentActivities($data)
{
    $CI =& get_instance();
    $CI->load->model('user_model');

    $CI->user_model->setRecentActivities($data);
}

function CreateNotif($data,$mail)
{
    $CI =& get_instance();
    $CI->load->model('notification_model');

    $insertNotif = $CI->notification_model->insertNotif($data);

    if($insertNotif)
    {
        sendEmail($mail);
    }

    return $insertNotif;
}

function getDataMessage($type)
{
    $CI =& get_instance();
    $CI->load->model('user_model');

    $message = $CI->user_model->get_data_message($type);

    return $message;
}

function sendEmail($params)
{
    $from       = $params["sender_email"];
    $to         = $params["receiver_email"];
    $subject    = $params["subject"];
    $message    = $params["message_html"];

    $config['mailtype'] = 'html';
    $config['priority'] = 2;
    $config['wordwrap'] = TRUE;
    /*$config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_port'] = 465;
    $config['smtp_user'] = 'dearico612@gmail.com';
    $config['smtp_pass'] = 'Rico061289';*/

    $CI =& get_instance();
    
    $CI->load->library('email', $config);
    $CI->email->initialize($config);

    //send email
    $CI->email->from($from);
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    
    if($CI->email->send()){
        return true;
    }else{
        return false;
    }
}

function EndorseReviewRating($params)
{
    $CI =& get_instance();
    $CI->load->model('global_model');
    $endorseData = array('endorser_user_id'=> $params['endorser'],
                'endorsed_user_id'=> $params['endorsed']);
    $profile['endorse']= $CI->global_model->get_where('endorse', $endorseData);

    $reviewData = array('endorser_id'=> $params['endorser'],
                'user_id'=> $params['endorsed']);
    $profile['review']= $CI->global_model->get_where('reviews', $reviewData);

    $rateData = array('user_id_rater'=> $params['endorser'],
                'user_id'=> $params['endorsed']);
    $profile['rate']= $CI->global_model->get_where('user_rate', $rateData);
    return $profile;
}

function AllUserReviewer($params)
{
    $CI =& get_instance();
    $CI->load->model('global_model');
    $endorseData = array('endorsed_user_id'=> $params['endorsed']);
    $profile['endorse']= $CI->global_model->get_where('endorse', $endorseData);

    $reviewData = array('user_id'=> $params['endorsed']);
    $profile['review']= $CI->global_model->get_where('reviews', $reviewData);

    $rateData = array('user_id'=> $params['endorsed']);
    $profile['rate']= $CI->global_model->get_where('user_rate', $rateData);
    return $profile;
}

function countEndorserAchievement($params){
    $CI =& get_instance();
    $CI->load->model('global_model');
    $endorseDataAchievement = array('achievement_id'=> $params);
    $endorse['achievement']= $CI->global_model->get_where('endorse', $endorseDataAchievement);
    return $endorse;
}

function countEndorserProject($params){
    $CI =& get_instance();
    $CI->load->model('global_model');
    $endorseDataProject = array('user_project_id'=> $params);
    $endorse['project']= $CI->global_model->get_where('endorse', $endorseDataProject);
    return $endorse;
}


function countReviewerEducation($params){
    $CI =& get_instance();
    $CI->load->model('global_model');
    $reviewDataProject = array('skill_id'=> $params);
    $review['education']= $CI->global_model->get_where('reviews', $reviewDataProject);
    return $review;
}

function countReviewerExp($params){
    $CI =& get_instance();
    $CI->load->model('global_model');
    $reviewDataExperience = array('exp_id'=> $params);
    $review['experience']= $CI->global_model->get_where('reviews', $reviewDataExperience);
    return $review;
}

function countRateExp($params){
    $CI =& get_instance();
    $CI->load->model('global_model');
    $reviewDataExperience = array('exp_id'=> $params);
    $review['experience']= $CI->global_model->get_where('ratings', $reviewDataExperience);
    return $review;
}

function countRateEducation($params){
    $CI =& get_instance();
    $CI->load->model('global_model');
    $reviewDataEducation = array('exp_id'=> $params);
    $review['education']= $CI->global_model->get_where('ratings', $reviewDataEducation);
    return $review;
}
?>
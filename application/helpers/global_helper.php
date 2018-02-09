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
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
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

function profileCompletion($params)
{
    $CI =& get_instance();
    $CI->load->model('employer_model');
    
    $profile['social'] = $CI->employer_model->get_where('user_social', 'name', 'asc', array('user_id' => $CI->session->userdata('id') ));
    $profile['profile_photo'] = $CI->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $CI->session->userdata('id'), 'type'=>'profile_photo'));
    $profile['header_photo'] = $CI->employer_model->get_where('profile_uploads', 'name', 'asc', array('user_id' => $CI->session->userdata('id'), 'type'=>'header_photo'));

    //About Company 40%
    $About["company_name"]      = !empty($params['company_name']) ? 5 : 0;
    $About["industry"]          = !empty($params['industry']) ? 5 : 0;
    $About["reg_number"]        = !empty($params['company_registration_number']) ? 5 : 0;
    $About["company_desc"]      = !empty($params['company_description']) ? 5 : 0;
    $About["company_url"]       = !empty($params['url']) ? 5 : 0;
    $About["profile_photo"]     = !empty($profile["profile_photo"]) ? 5 : 0;
    $About["header_photo"]      = !empty($profile["header_photo"]) ? 5 : 0;
    $About["social"]            = !empty($profile["social"]) ? 5 : 0;
    
    //Additional Info 30%
    $Additional   = !empty($params['spoken_language']) ? 3.75 : 0;
    $Additional   += !empty($params['total_staff']) ? 3.75 : 0;
    $Additional   += !empty($params['dress_code']) ? 3.75 : 0;
    $Additional   += !empty($params['benefits']) ? 3.75 : 0;
    $Additional   += !empty($params['industry']) ? 3.75 : 0;
    $Additional   += !empty($params['working_days']) ? 3.75 : 0;
    $Additional   += !empty($params['url']) ? 3.75 : 0;
    $Additional   += !empty($params['email']) ? 3.75 : 0;

    //Contact Information 30%
    $addr = json_decode($params['address']);
    $Contact = 0;

    if(!empty($addr))
    {
        $addr = $addr[0];

        $Contact   += !empty($addr->optionsRadios) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_address) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_city) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_postcode) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_state) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_country) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_email) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_phone) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_fax) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_latitude) ? 2.7272727273 : 0;
        $Contact   += !empty($addr->building_longitude) ? 2.7272727273 : 0;
    }

    $sum    = array_sum($About) + $Additional + $Contact;
    $total  = round($sum);
    
    return $total;
}
?>
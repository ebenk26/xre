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
?>
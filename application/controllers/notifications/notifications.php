<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notifications extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('notification_model');
    }
    
    public function list()
    {
        $get_notif  = Notification('0,1');
        $unread_notif       = Notification('0');

        if(!empty($get_notif))
        {
            $data["notif"]      = $this->load->view('notification/list',array("data"=>$get_notif),true);
            $data["total"]      = '<i class="icon-bell"></i><span class="badge badge-default">'.count($unread_notif).'</span>';
            $data["total_in"]   = '<span class="bold">'.count($unread_notif).' pending</span> notifications';
            $data["message"]    = "success";
        }
        else
        {
            $data["message"]    = "error";
        }

        $result = json_encode($data);

        echo $result;
    }
    
    public function getInterval()
    {
        $getInterval  = $this->notification_model->get('notifications_setting');

        if(!empty($getInterval))
        {
            $data["interval_time"]  = $getInterval[0]["interval_second"];
            $data["message"]        = "success";
        }
        else
        {
            $data["message"]    = "error";
        }

        $result = json_encode($data);

        echo $result;
	}
}
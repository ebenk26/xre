<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notifications extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('notification_model');
    }
    
    public function notifList()
    {
        $get_notif      = Notification('0,1');
        $unread_notif   = Notification('0');

        if(!empty($get_notif))
        {
            $data["notif"]      = $this->load->view('notification/list',array("data"=>$get_notif),true);
            $data["total"]      = '<i class="icon-bell"></i><span class="badge badge-default">'.count($unread_notif).'</span>';
            $data["total_in"]   = (count($unread_notif)>0) ? '<span class="bold">'.count($unread_notif).' pending</span> notifications' : '<span class="bold">There are no pending</span> notifications';
            $data["message"]    = "success";
        }
        else
        {
            $data["notif"]      = '';
            $data["total"]      = '<i class="icon-bell"></i>';
            $data["total_in"]   = '<span class="bold">There are no pending</span> notifications';
            $data["message"]    = "success";
        }

        $result = json_encode($data);

        echo $result;
    }

    public function clearNotif()
    {
        $notif_id = $this->input->post('id');

        $checkNotif = $this->notification_model->get_where('notifications','created_at','asc',"id = $notif_id");

        $data = array();

        if($checkNotif)
        {
            $updateNotif = $this->notification_model->updateNotif(array('viewed'=>1),$checkNotif[0]["type"]);

            if($updateNotif)
            {
                $data["url"]        = base_url().$checkNotif[0]["url"];
                $data["message"]    = 'success';
            }
            else
            {
                $data["message"]    = 'error';
            }
        }
        else
        {
            $data["message"]    = 'error';
        }

        $result = json_encode($data);

        echo $result;
    }
}
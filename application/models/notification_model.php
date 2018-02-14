<?php

class Notification_Model extends CI_Model
{
    function get($table)
    {
        $query = $this->db->get($table);
        
        return $query->result_array();   
    }

    function get_where($table, $order_by='created_at', $order='asc', $where)
    {
        $this->db->order_by($order_by, $order); 
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result_array();   
    }

    function insertNotif($data)
    {
        try
        {
            $query = $this->db->insert('notifications',$data);
        }
        catch (Exception $e)
        {
            return false;
        }
        
        return $query;   
    }

    function updateNotif($data,$id)
    {
        try
        {
            $this->db->where('type',$id);
            $query = $this->db->update('notifications',$data);
        }
        catch (Exception $e)
        {
            return false;
        }
        
        return $query;   
    }
}
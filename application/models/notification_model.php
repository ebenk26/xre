<?php

class Notification_Model extends CI_Model
{
    function get_where($table, $order_by='created_at', $order='asc', $where)
    {
        $this->db->order_by($order_by, $order); 
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result_array();   
    }
}
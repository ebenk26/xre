<?php

class Global_Model extends CI_Model{

	public function get($table, $order='created_at', $order_by ='asc'){
		$this->db->order_by($order, $order_by);
		$get = $this->db->get($table);

		return $get->result_array();
	}

	public function get_where($table, $where, $order='created_at', $order_by ='asc'){
		$this->db->order_by($order, $order_by);
		$this->db->where($where);
		$get = $this->db->get($table);

		return $get->result_array();	
	}

	public function get_by_id($table, $where, $order='created_at', $order_by ='asc'){
		$this->db->order_by($order, $order_by);
		$this->db->where($where);
		$get = $this->db->get($table);

		return $get->last_row();		
	}

	public function create($table, $data){
		try {
			
			$this->db->insert($table, $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function update($table, $where, $data){
		try {
			$this->db->where($where);
			$this->db->update($table, $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function remove($table, $where){
		try {
			$this->db->where($where);
			$this->db->delete($table);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function create_return_id($table, $data){
		try {
			
			$this->db->insert($table, $data);
			$id = $this->db->insert_id();
			return $id;
		} catch (Exception $e) {
			return false;
		}
	}
}
?>
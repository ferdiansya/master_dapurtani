<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

   function insert($table = '', $data = '')
   {
      return $this->db->insert($table, $data);
	}

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_limit()
		{

			$this->db->limit(4); //100 Data yang akan muncul
	        $query =  $this->db->order_by('id_sayur','ASC')->get('t_sayur');
	        return $query->result();

		}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	public function get_sayur()
	{
			$this->db->limit(4);
			$this->db->select('*');
		  $this->db->from('t_sayur');
		  $this->db->join('t_detail_order','t_detail_order.id_sayur=t_sayur.id_sayur');
		  $query = $this->db->get();
		  return $query->result();
	}

	function update($table = null, $data = null, $where = null)
	{
		return $this->db->update($table, $data, $where);
	}

	function delete($table = null, $where = null)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function cari($keyword){
			$this->db->from('t_sayur');
			$this->db->like($keyword);
			return $this->db->get();
		}
}

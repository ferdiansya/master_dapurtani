<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
      $this->load->model('admin');
	}

   public function index()
   {
		   $this->cek_login();
		 //passing data controller ke view
		 // query memanggil function duatable di model
    $data['data'] = $this->admin->duatable();
    $this->template->admin('admin/transaksi', $data);
	}
	public function detail()
	{
		//passing data controller ke view
		// query memanggil function duatable di model
		$id_order = $this->uri->segment(3);
	  $order = $this->admin->get_where('t_detail_order', array('id_order' => $id_order));
		foreach ($order->result() as $key) {
	    $data['nama_sayur'] = $key->nama_sayur;
	    $data['qty'] = $key->qty;
	    $data['biaya'] = $key->biaya;
	   }
	 $this->template->admin('admin/detail_transaksi', $data);
	}
	public function hapus($id_order)
	{
	  $where = array('id_order' => $id_order);
	  $this->admin->hapus_data($where,'t_order');
		$this->admin->hapus_data($where,'t_detail_order');
	  redirect('transaksi/index');
	}

	function cek_login()
	{
	  if (!$this->session->userdata('admin'))
	  {
	    redirect('login');
	  }
	}
}

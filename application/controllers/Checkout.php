<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'cart', 'form_validation', 'session'));
		$this->load->model('app');
		$this->load->helper(['form','security','string']);
	}
	function index()
	{
		if (!$this->session->userdata('user_id') || !$this->cart->contents()) {
			redirect('home');
		}
		$this->load->view('user/checkout');
	}

	function tambah_aksi()
	{
		if (!$this->session->userdata('user_id') || !$this->cart->contents()) {
			redirect('home');
		}
		$get = $this->app->get_where('t_users', array('id_user' => $this->session->userdata('user_id')))->row();

		$id_order     = time();
		$id_user      = $this->session->userdata('user_id', TRUE);
		$tgl_pengirim = $this->input->post('tgl_pengiriman', TRUE);
		$nama         = $this->input->post('nama', TRUE);
		$email        = $this->input->post('email', TRUE);
		$no_hp        = $this->input->post('no_hp', TRUE);
		$kecamatan    = $this->input->post('kecamatan', TRUE);
		$alamat       = $this->input->post('alamat', TRUE);
		$tgl_pesan    = $this->input->post('inputtanggal', TRUE);
		$bts          = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));
		$sub          = $this->input->post('sub');
		$total        = $this->input->post('total');
		$pembayaran   = $this->input->post('inppembayaran');

		$table = '';
		$no = 1;
		foreach ($this->cart->contents() as $carts) {
			$table .= '<tr><td>'.$no++.'</td><td>'.$carts['name'].'</td><td>'.$carts['qty'].'</td><td style="text-align:right">'.number_format($carts['subtotal'], 0, ',', '.').'</td></tr>';
		}

		$data = array(
			'id_order' => $id_order,
			'id_user' => $id_user,
			'tgl_pengiriman' => $tgl_pengirim,
			'nama' => $nama,
			'email' => $email,
			'no_hp' => $no_hp,
			'kecamatan' => $kecamatan,
			'alamat' => $alamat,
			'tgl_pesan' => $tgl_pesan,
			'tgl_bayar' => $bts,
			'pembayaran' => $pembayaran,
			'status' => ''
			);
		if ($this->app->insert('t_order', $data)){
			foreach ($this->cart->contents() as $key) {
				$detail = [
					'id_order' => $id_order,
					'id_sayur' => $key['id'],
					'nama_sayur' => $key['name'],
					'qty' => $key['qty'],
					'biaya' => $key['price'],
					'sub' => $sub,
					'total' => $total
				];
				$this->app->insert('t_detail_order', $detail);
			}

			$this->cart->destroy();
		/*	$this->session->set_flashdata('alert', 'Terima Kasih Telah Belanja di Dapurtani');
				redirect('checkout/index');*/
		}
		$this->load->library('email');
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Dapurtani';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "400";
		$config['smtp_user']= "infodapurtani@gmail.com"; // isi dengan email kamu
		$config['smtp_pass']= "dapurtani.com2018"; // isi dengan password kamu
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		//memanggil library email dan set konfigurasi untuk pengiriman email

		$this->email->initialize($config);
		//konfigurasi pengiriman
		$this->email->from($config['smtp_user']);
		$this->email->to($email);
		$this->email->subject("Dapurtani");
		$this->email->message(
		' Terima Kasih telah melakukan pemesanan di Dapurtani, Detail pemesanan sebagai berikut :<br/><br/>
	<table border="1" style="width: 80%">
	<tr><th>#</th><th>Nama Barang</th><th>Jumlah</th><th>Harga</th></tr>
	'.$table.'
	<tr><td colspan="3">Subtotal</td><td style="text-align:right">'.$sub.'</td></tr>
	<tr><td colspan="3">Total</td><td style="text-align:right">'.$total.'</td></tr>
	</table>'
		);

		if($this->email->send())
		{
		echo '<script type="text/javascript">alert("Silahkan cek email anda untuk detail pemesanan...");window.location.replace("'.base_url('home/index2').'")</script>';
		}else
		{
		echo '<script type="text/javascript">alert("Pemesanan Berhasil");window.location.replace("'.base_url('home').'")</script>';
		}

	}
	}

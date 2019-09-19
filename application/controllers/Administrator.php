<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library(['template', 'form_validation','email','session']);
    $this->load->model('admin');
    $this->load->helper(['form','security']);
  }

	public function index()
	{
    $this->cek_login();
    $this->template->admin('admin/home', $data = null);
	}

  public function list_email()
  {
    $this->cek_login();
    $data['data'] = $this->admin->get_all('t_email');

    $this->template->admin('admin/email', $data);
  }

  public function voucher()
  {
    $this->cek_login();
    $data['data'] = $this->admin->get_all('t_voucher');

    $this->template->admin('admin/voucher', $data);
  }

  public function add_voucher()
  {
      $this->form_validation->set_rules('voucher', 'Voucher', 'required|trim|xss_clean|is_unique[t_voucher.kd_voucher]');

      if ($this->form_validation->run() == FALSE)
      {
        $this->template->admin('admin/voucher_form');
      } else {
        $this->load->library(['encryption']);
        $this->load->helper(['string']);

        $voucher = $this->input->post('voucher', TRUE);
        $data = array (
          'kd_voucher' => $voucher
        );
      $this->admin->insert('t_voucher', $data);

        echo '<script type="text/javascript">alert("Berhasil");window.location.replace("'.base_url('administrator/voucher').'")</script>';

        }
      }

      public function hapus_voucher($id_voucher)
      {
        $where = array('id_voucher' => $id_voucher);
        $this->admin->hapus_data($where,'t_voucher');
        redirect('administrator/voucher');
      }

  public function hapus($id_email)
  {
    $where = array('id_email' => $id_email);
    $this->admin->hapus_data($where,'t_email');
    redirect('administrator/list_email');
  }

  function cek_login()
  {
    if (!$this->session->userdata('admin'))
    {
      redirect('login');
    }
  }
}

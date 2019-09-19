<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller
{

  private $CI;

  function __construct()
  {
    $this->CI =& get_instance();
  }

  function admin($template, $data = '')
  {

    $data['content'] = $this->CI->load->view($template, $data, TRUE);
    $data['nav']     = $this->CI->load->view('admin/nav', $data, TRUE);

    $this->CI->load->view('admin/dashboard', $data);
  }

  function user($template, $data='')
  {

    $data['content'] = $this->CI->load->view($template, $data, TRUE);
    $data['nav']     = $this->CI->load->view('user/nav', $data, TRUE);
    $data['css']     = $this->CI->load->view('user/css', $data, TRUE);
    $data['js']      = $this->CI->load->view('user/js', $data, TRUE);

    $this->CI->load->view('user/index', $data);
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	protected $csrf;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
	}
	public function index()
	{
		$parse = array (
			'title'	    => 'Beranda',
			'main_menu' => 'beranda',
            'content'   => 'content/beranda',
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('sukses','<i class="fa fa-check"></i> Anda Berhasil Logout');
		redirect(base_url('/Login'),'refresh');
	}

	public function test()
	{
		$date = NULL;
		echo date_create_from_format('Y-m-d', FALSE)->format('Y-m-d');
	}
}

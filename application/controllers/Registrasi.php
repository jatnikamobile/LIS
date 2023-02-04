<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// protected $csrf;
	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
		$this->load->model("Master_model","mm");
		$this->load->model("Register_model","rm");
	}

	public function index()
	{
		$kategori = $this->mm->get_ktg_pasien();
		$regno = $this->input->get('regno');
		$parse = array (
			'title'	    => 'Daftar Pasien',
			'main_menu' => 'registrasi',
            'content'   => 'content/register/index',
            'kategori'	=> $kategori,
            'regno'		=> $regno,
            'role'		=> 0,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function list_pasien()
	{
		$parse = array (
			'title'	    => 'List Pasien',
			'main_menu' => 'listpasien',
            'content'   => 'content/register/list_pasien',
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function list_pasien_penunjang_klinik()
	{
		$date1 = $this->input->post('date1') ?? Date('Y-m-d');
		$date2 = $this->input->post('date2') ?? Date('Y-m-d');
		$medrec = $this->input->post('medrec');
		$list_pasien = $this->rm->list_pasien($date1, $date2, $medrec);
		$parse = array(
			'list' => $list_pasien,
			'status' => true
		);
		$this->load->view('content/register/table_registrasi', $parse);
	}

	public function pasien_by_rm()
	{
		$data = $this->input->post('medrec');
    	$up = $this->rm->get_pasien_by_rm($data);
    	$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
	}

	public function change_kategori()
	{
		$data = $this->input->post();
    	$up = $this->rm->update_kategori($data);
    	$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
	}

	public function post()
	{
		$data = $this->input->post();
    	$up = $this->rm->post_new($data);
    	// $update = $this->rm->update_registrasi($up['Regno']);
    	$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
	}

	public function print_sep()
	{
		$data = $this->input->get('Regno');
		$data_pasien = $this->rm->get_pasien_by_regno($data);
		// var_dump($data_pasien);die();
		$this->load->view('content/register/lembar_sep', $data_pasien);
	}

	public function search_regno()
	{
		$data = $this->rm->get_pasien_by_regno($this->input->get('regno'));
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($data));
	}

	public function updatelab($notrans, $regno)
	{
		$data = $this->rm->update_billing_pemeriksaan($notrans, $regno);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($data));
	}
}
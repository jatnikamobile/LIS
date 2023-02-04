<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterTarif extends CI_Controller {

	protected $csrf;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
		$this->load->model("Master_lab","ml");
		$this->load->model("Master_tarif","mt");
	}

	public function index()
	{
		$grouplab = $this->ml->group_lab();
		$parse = array (
			'title'	    => 'Nilai Normal',
			'main_menu' => 'nilainormal',
            'content'   => 'content/nilai_normal/index',
            'group_lab' => $grouplab,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function hirarki()
	{
		$grouplab = $this->ml->hirarki_lab();
		$parse = array (
			'title'	    => 'Nilai Normal',
			'main_menu' => 'nilainormal',
			'content'   => 'content/nilai_normal/hirarki',
			'groups' => $grouplab,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function lab_group_post()
    {
    	$data = $this->input->post();
    	$up = $this->ml->lab_group_post($data);
    	$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
    }

    public function lab_group_update()
    {
    	$data = $this->input->post();
    	$up = $this->ml->lab_group_update($data);
    	$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
    }

	public function lab_pemeriksaan()
	{
		$kode = $this->input->post('kdpemeriksaan');
		$pemeriksaan = $this->ml->pemeriksaan_lab($kode);
		$parse = array (
			'pemeriksaan'=> $pemeriksaan,
			'csrf'		 => $this->csrf
		);
		$this->load->view('content/nilai_normal/pemeriksaan_lab', $parse);
	}

	public function pemeriksaan_post()
	{
		$data = $this->input->post();
		$pembanding = $this->ml->pemeriksaan_post($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($pembanding));
	}

	public function pemeriksaan_update()
	{
		$data = $this->input->post();
		$pembanding = $this->ml->pemeriksaan_update($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($pembanding));
	}

	public function lab_pembanding()
	{
		$kode = $this->input->post('kdpembanding');
		$pembanding = $this->ml->pembanding_lab($kode);
		$parse = array (
			'pembanding'=> $pembanding,
			'csrf'		 => $this->csrf
		);
		$this->load->view('content/nilai_normal/pembanding_lab', $parse);
	}

	public function pembandingan_post()
	{
		$data = $this->input->post();
		$pembanding = $this->ml->pembanding_post($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($pembanding));
	}

	public function pembanding_update()
	{
		$data = $this->input->post();
		$pembanding = $this->ml->pembanding_update($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($pembanding));
	}

	public function master_tarif()
	{
		$grouplab = $this->ml->group_lab();
		$pemeriksaan = $this->ml->pemeriksaan_lab();
		$parse = array (
			'title'	    => 'Master Tarif',
			'main_menu' => 'mastertarif',
            'content'   => 'content/master_tarif/index',
            'group_lab' => $grouplab,
            'pemeriksaan'=> $pemeriksaan,
			'csrf'	    => $this->csrf
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function show_tarif()
	{
		$kode = $this->input->post('kddetail');
		$laboratorium = $this->mt->tarif_laboratorium($kode);
		$kategori = $this->mt->get_ktg_pasien();
		$parse = array (
			'tarif'=> $laboratorium,
			'kategori' => $kategori,
			'csrf'		 => $this->csrf
		);
		$this->load->view('content/master_tarif/detail-tarif', $parse);
	}

	public function tarif_post()
	{
		$data = $this->input->post();
		$post = $this->mt->tarif_lab_post($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function tarif_update()
	{
		$data = $this->input->post();
		$post = $this->mt->tarif_lab_update($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function delete_detail_pemeriksaan()
	{
		$kode = $this->input->post('kode');
		$post = $this->mt->delete_detail_pemeriksaan($kode);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function delete_sub_pemeriksaan()
	{
		$kddetail = $this->input->post('kddetail');
		$post = $this->mt->delete_sub_pemeriksaan($kddetail);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function delete_group_pemeriksaan()
	{
		$kdgroup = $this->input->post('kdgroup');
		$post = $this->mt->delete_sub_pemeriksaan($kdgroup);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function input_tarif_excel_()
	{
		$post = $this->mt->input_tarif_excel___();
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}
}

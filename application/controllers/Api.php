<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."libraries/VClaim.php";

class Api extends CI_Controller {
	
	protected $csrf;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
	}

	public function groupunit() {
		$q = $this->input->post('q');
		$kategori = $this->input->post('kategori');
		$kategori = isset($kategori) && $kategori != '' ? $kategori : '';

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_groupunit_select2( $q, $kategori, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function unit() {
		$q = $this->input->post('q');
		$groupunit = $this->input->post('groupunit');
		$groupunit = isset($groupunit) && $groupunit != '' ? $groupunit : '';

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_unit_select2( $q, $groupunit, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function dokter() {

		$q = $this->input->post('q');
		$poli = $this->input->post('kdpoli');
		$poli = isset($poli) && $poli != '' ? $poli : '';

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_dokter_select2( $q, $poli, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function dokter_pengirim() {

		$q = $this->input->post('q');

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_dokter_pengirim_select2( $q, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function poli() {

		$q = $this->input->get('q');
		$dokter = $this->input->get('dokter');
		$dokter = isset($dokter) && $dokter != '' ? $dokter : '';
		
		$limit = intval($this->input->get('limit')) ?? 20;
		$offset = intval($this->input->get('offset')) ?? 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;

		$this->load->model('Master_model', 'master');

		if($dokter){
			$data_dokter = $this->master->get_dokter($dokter);
			foreach($data_dokter as $dd){
				$poli_dokter = $dd->KdPoli;
			}
		}else{
			$poli_dokter = '';
		}

		$result = $this->master->get_poli_select2($q, $poli_dokter, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function regno_pasien() {

		$q = $this->input->get('q');
		$limit = intval($this->input->get('limit')) ?? 20;
		$offset = intval($this->input->get('offset')) ?? 0;
		$jenis = intval($this->input->get('jenis')) ?? '01';

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;

		$this->load->model('Master_model', 'master');
		$result = $this->master->get_regno_pasien_select2($q, $jenis, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function poli_tuju() {
		$q = $this->input->post('q');
		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_poli_tuju_select2($q, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function icd10() {

		$q = $this->input->post('q');
		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_icd10_select2($q, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}
	public function icd9() {

		$q = $this->input->post('q');

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_model', 'master');
		$result = $this->master->get_icd9_select2($q, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function kelas() 
	{
		$q = $this->input->post('q');

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_lab', 'master');
		$result = $this->master->kelas($q, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}

	public function pemeriksaan()
	{
		$q = $this->input->post('q');

		$limit = intval($this->input->post('limit')) ?: 20;
		$offset = intval($this->input->post('offset')) ?: 0;

		$limit = ($limit > 100) ? 100 : $limit;
		$offset = ($offset < 0) ? 0 : $offset;
        
		$this->load->model('Master_lab', 'master');
		$result = $this->master->pemeriksaan_select2($q, $limit, $offset);

		$this->output
			->set_content_type('json')
			->set_output(json_encode($result));
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."libraries/VClaim.php";

class BridgingVclaim extends CI_Controller {
	
	protected $csrf;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
		$this->load->model('Master_model', 'master');
	}

	public function faskes()
	{
		$faskes = $this->input->get('faskes');
		$term = $this->input->get('term');
		// return response()->json();
		$this->output
			->set_content_type('json')
			->set_output(json_encode(VClaim::get_faskes($faskes, $term)));
	}

	public function get_peserta_kartu_bpjs()
	{
		$term = $this->input->get('nopeserta');
		$parse = array(
			'status' => true,
			'data' => VClaim::get_peserta_bpjs($term)
		);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($parse));
	}

	public function get_peserta_by_nik()
	{
		$term = $this->input->get('nik');
		$parse = array(
			'status' => true,
			'data' => VClaim::get_peserta_nik($term, date('Y-m-d'))
		);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($parse));
	}

	public function get_rujukan_by_nomor_kartu_pcare()
	{
		$term = $this->input->get('nopeserta');
		$data = VClaim::get_rujukan_by_nomor_kartu($term);
		if ($data) {

			$data->poli_local = @$data->response->rujukan->poliRujukan->kode
			? $this->master->get_poli_bpjs($data->response->rujukan->poliRujukan->kode)
			: null;
		}
		$parse = array(
			'status' => true,
			'data' => $data
		);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($parse));
	}

	public function get_rujukan_by_nomor_kartu_rs()
	{
		$term = $this->input->get('nopeserta');
		$data = VClaim::get_rujukan_by_nomor_kartu($term, true);
		if ($data) {

			$data->poli_local = @$data->response->rujukan->poliRujukan->kode
			? $this->master->get_poli_bpjs($data->response->rujukan->poliRujukan->kode)
			: null;
		}
		$parse = array(
			'status' => true,
			'data' => $data
		);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($parse));
	}

	public function get_rujukan_by_faskes_pcare()
	{
		$term = $this->input->get('noRujukan');
		$this->input->get('faskes') == true ?  $data = VClaim::get_rujukan_by_nomor_rujukan($term, true) : $data = VClaim::get_rujukan_by_nomor_rujukan($term);
		if ($data) {

			$data->poli_local = @$data->response->rujukan->poliRujukan->kode
			? $this->master->get_poli_bpjs($data->response->rujukan->poliRujukan->kode)
			: null;
		}
		$parse = array(
			'status' => true,
			'data' => $data
		);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($parse));
	}

	public function histrori_pasien()
	{
		$nokartu = $this->input->get('no_kartu');
		$date1 = $this->input->get('tanggal_mulai');
		$date2 = $this->input->get('tanggal_akhir');
		$data = VClaim::histori_pelayanan_peserta($nokartu, $date1, $date2);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($data));	
	}

	public function get_sep_pasien()
	{
		$nosep = $this->input->get('nosep');
		$data = VClaim::get_sep($nosep);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($data));
	}

	public function create_sep()
	{
		$user = 'SIMRS';

		$noKartu = $this->input->post('noKartu');
		$tglSep = $this->input->post('tglSep');
		$ppkPelayanan = $this->input->post('ppkPelayanan');
		$jnsPelayanan = $this->input->post('jnsPelayanan');
		$klsRawat = $this->input->post('klsRawat');
		$noMR = $this->input->post('noMR');
		$asalRujukan = $this->input->post('asalRujukan');
		$tglRujukan = $this->input->post('tglRujukan');
		$noRujukan = $this->input->post('noRujukan');
		$ppkRujukan = $this->input->post('ppkRujukan');
		$catatan = $this->input->post('catatan');
		$diagAwal = $this->input->post('diagAwal');

		$tujuan = $this->input->post('tujuan');
		$poli = $this->master->get_poli_kdbpjs($tujuan);

		$eksekutif = $this->input->post('eksekutif');
		$cob = $this->input->post('cob');
		$katarak = $this->input->post('katarak');
		$lakaLantas = $this->input->post('lakaLantas');
		$penjamin = $this->input->post('penjamin');
		$tglKejadian = $this->input->post('tglKejadian');
		$keterangan = $this->input->post('keterangan');
		$suplesi = $this->input->post('suplesi');
		$noSepSuplesi = $this->input->post('noSepSuplesi');
		$kdPropinsi = $this->input->post('kdPropinsi');
		$kdKabupaten = $this->input->post('kdKabupaten');
		$kdKecamatan = $this->input->post('kdKecamatan');
		$noSurat = $this->input->post('noSurat');

		$kodeDPJP = $this->input->post('kodeDPJP');
		$dokter = $this->master->get_dokter_dpjp($kodeDPJP);
		// var_dump($dokter->KdDPJP);die();

		$noTelp = $this->input->post('noTelp');
		// esnawan 0903R005
		// hardjo 1205R002
		$data = array(
			'request' => [
				't_sep' => [
					'noKartu' => $noKartu ?? "",
					'tglSep' => $tglSep ?? "",
					'ppkPelayanan' => '0903R005',
					'jnsPelayanan' => $jnsPelayanan ?? "",
					'klsRawat' => $klsRawat ?? "3",
					'noMR' => $noMR ?? "",
					'rujukan' => [
						'asalRujukan' => $asalRujukan ?? "",
						'tglRujukan' => $tglRujukan ?? "",
						'noRujukan' => $noRujukan ?? "",
						'ppkRujukan' => $ppkRujukan ?? "",
					],
					'catatan' => $catatan ?? "",
					'diagAwal' => $diagAwal ?? "",
					'poli' => [
						'tujuan' => $poli->KdBPJS ?? "",
						'eksekutif' => $eksekutif ?? "0",
					],
					'cob' => [
						'cob' => $cob ?? "0",
					],
					'katarak' => [
						'katarak' => $katarak ?? "0",
					],
					'jaminan' => [
						'lakaLantas' => $lakaLantas ?? "0",
						'penjamin' => [
							'penjamin' => $penjamin ?? "",
							'tglKejadian' => $tglKejadian ?? "",
							'keterangan' => $keterangan ?? "",
							'suplesi' => [
								'suplesi' => $suplesi ?? "0",
								'noSepSuplesi' => $noSepSuplesi ?? "",
								'lokasiLaka' => [
									'kdPropinsi' => $kdPropinsi ?? "",
									'kdKabupaten' => $kdKabupaten ?? "",
									'kdKecamatan' => $kdKecamatan ?? "",
								]
							]
						]
					],
					'skdp' => [
						'noSurat' => $noSurat ?? "",
						'kodeDPJP' => $dokter->KdDPJP ?? "",
					],
					'noTelp' => $noTelp ?? "",
					'user' => $user ?? "",
				]
			]
		);
		// var_dump($data);die();
		$response = VClaim::insert_sep($data);
		$this->output
			->set_content_type('json')
			->set_output(json_encode($response));
	}
}
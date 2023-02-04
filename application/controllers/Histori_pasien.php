<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Histori_pasien extends CI_Controller
{
	protected $csrf;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
		$this->load->model("Master_model","mm");
		$this->load->model("Master_lab","ml");
		$this->load->model("BillingPemeriksaan_model","bpm");
		$this->load->model("HasilPemeriksaan_model","hpm");
	}

	public function index()
	{
		$parse = array (
			'title'	    => 'History Pasien Lab',
			'main_menu' => 'historipasienlab',
            'content'   => 'content/histori_pasien/index',
            'status'    => false,
			'csrf'	    => $this->csrf,
		);

		$this->load->view('layouts/wrapper', $parse);
	}

	public function show_list(){
		$params = array('nama' => $this->input->post('nama'), 'medrec' => $this->input->post('medrec'));

		$hasil = $this->hpm->get_list_histori_pasien($params);
		// print_r($hasil);
        $no=0;
        $line2 = array();
        foreach ($hasil as $value) {
            $row2['Notran'] = $value->Notran;
            $row2['Nolab'] = $value->Nolab;
            $row2['Regno'] = $value->Regno;
            $row2['MedRec'] = $value->MedRec;
            $row2['Tglhasil'] = $value->Tglhasil == null ? '' : date("d/m/Y", strtotime($value->Tglhasil));
            $row2['Firstname'] = $value->Firstname.'<i>('. $value->Umurthn .' Thn)</i>';
            $row2['NmKategori'] = $value->NmKategori;
            $row2['Catatan'] = $value->Catatan;
            $row2['NMPoli'] = $value->NMPoli;
            $row2['NmBangsal'] = $value->NmBangsal;
            $row2['NMKelas'] = $value->NMKelas;
            $row2['aksi'] = 
	            '
	            <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan?notransaksi='.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print green"></i>
		        </a>
	            '
	            ;
            $no++;
            $line2[] = $row2;
        }
        $line['data'] = $line2;            
        echo json_encode($line);
	}
}

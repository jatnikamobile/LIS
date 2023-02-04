<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_tarif extends CI_Model {
	
	protected $sv;
	function __construct(){
		parent::__construct();
        $this->sv = $this->load->database('server',true);
        $this->load->model("Master_lab","ml");
	}

	public function tarif_laboratorium($kode='')
	{
		if ($kode!='') {
			$this->sv->where('t.KDDetail', $kode);
		}
		$this->sv->select('t.*, p.NMDetail');
		$stat = $this->sv->from('fTarifLaboratorium t')->join('fPemeriksaanLab p', 'p.KDDetail = t.KDDetail', 'left')->get();
		return $stat->result();	
	}

	public function get_ktg_pasien($id='')
	{
		if ($id!='') {
			$this->sv->where('KdKategori', $id);
		}
		$stat = $this->sv->get('TBLKategoriPsn');
		return $stat->result();
	}

	public function tarif_lab_post($data)
	{
		$listing = $this->sv->where('KDDetail', $data['kddetail'])
			->where('Kategori', $data['kdkategori'])
			->where('KdKelas', $data['kdkelas'])
			->get('fTarifLaboratorium')->row();
		if (!empty($listing)) {
			$parse = array(
				'status' => false,
				'input' => false,
				'message' => 'Tarif sudah dibuat dengan kode: '.$data['kddetail'].$data['kdkategori'].$data['kdkelas']
			);
		} else {
			$input = $this->sv->insert('fTarifLaboratorium',[
				'KDTarif' => $data['kddetail'].$data['kdkategori'].$data['kdkelas'], 
				'KDDetail' => $data['kddetail'],
				'Kategori' => $data['kdkategori'],
				'KdKelas' => $data['kdkelas'],
				'NmKelas' => $data['nmkelas'],
				'Sarana' => $data['saranabaru'],
				'Pelayanan' => $data['pelayananbaru'],
				'Tarif' => $data['saranabaru'] + $data['pelayananbaru'],
				'JasaDokter' => $data['jasamedisbaru'],
				'JasaDokter1' => $data['harbaru'],
				'JasaPerawat' => $data['jasaparamedisbaru'],
				'JasaPerawat1' => $data['matbaru'],
				'JasaRumahSakit' => $data['jasanonmedisbaru'],
				'JasaRumahSakit1' => $data['opsbaru'],
				'ValidUser' => $this->session->userdata('username').' '.date('d/m/Y H:i:s')
			]);

			if ($input) {
				$parse = array(
					'status' => true,
					'input' => $input,
					'message' => 'Berhasil ditambahkan'
				);
			} else{
				$parse = array(
					'status' => false,
					'input' => $input,
					'message' => 'Gagal ditambahkan'
				);
			}
		}
		return $parse;
	}

	public function tarif_lab_update($data)
	{
		$update = $this->sv->where('KDTarif',$data['kdtarif'])->update("fTarifLaboratorium",[
            'KDDetail' => $data['kodepemeriksaan'],
			'Kategori' => $data['kdkategori'],
			'KdKelas' => $data['kdkelas'],
			'NmKelas' => $data['nmkelas'],
			'Sarana' => $data['sarana'],
			'Pelayanan' => $data['pelayanan'],
			'Tarif' => $data['sarana'] + $data['pelayanan'],
			'JasaDokter' => $data['jasamedis'],
			'JasaDokter1' => $data['har'],
			'JasaPerawat' => $data['jasaparamedis'],
			'JasaPerawat1' => $data['mat'],
			'JasaRumahSakit' => $data['jasanonmedis'],
			'JasaRumahSakit1' => $data['ops'],
			'ValidUser' => $this->session->userdata('username').' '.date('d/m/Y H:i:s')
        ]);

        if ($update) {
			$parse = array(
				'status' => true,
				'update' => $update,
				'message' => 'Berhasil diubah'
			);
		} else{
			$parse = array(
				'status' => false,
				'update' => $update,
				'message' => 'Gagal diubah'
			);
		}

		return $parse;
	}

	public function input_tarif_excel___()
	{
		$tarif = [];
		$inputan = 0;
		$ada = 0;
		$kddetail = '8037';
		// Tarif Sama
		$sarana 	= 20000;
		// Tarif Beda
		// $saranavvip	= 224000;
		// $saranavip	= 224000;
		// $sarana1	= 217000;
		// $sarana2	= 210000;
		// $sarana3	= 203000;
		// $isolasi 	= 224000;

		$pelayanan = 0;

		$kategori = $this->sv->select('*')->from('TBLKategoriPsn')->get()->result();
		$kelas = $this->sv->select('*')->from('TBLKelas')->get()->result();
		foreach ($kategori as $kdkategori) {
			foreach ($kelas as $kdkelas) {
				// Tarif Sama
				$tarif[] = $kddetail.$kdkategori->KdKategori.$kdkelas->KDKelas.' - '.$kddetail.' - '.$kdkategori->KdKategori.' - '.$kdkelas->KDKelas.' - '.$kdkelas->NMKelas.' - '.$sarana.' - '.$pelayanan.' - '.($sarana+$pelayanan).' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.'<br>';
				$data = array(
					'KDTarif' => $kddetail.$kdkategori->KdKategori.$kdkelas->KDKelas,
					'KDDetail' => $kddetail,
					'Kategori' => $kdkategori->KdKategori,
					'KdKelas' => $kdkelas->KDKelas,
					'NmKelas' => $kdkelas->NMKelas,
					'Sarana' => $sarana,
					'Tarif' => ($sarana + $pelayanan),
					'ValidUser' => 'Backup'.' '.date('d/m/Y H:i:s')
				);

				// $value = 0;
				// if (substr($kdkelas->KDKelas, 0, 1) == 1) {
				// 	$value = $saranavip;
				// } elseif (substr($kdkelas->KDKelas, 0, 1) == 2) {
				// 	$value = $sarana1;
				// } elseif (substr($kdkelas->KDKelas, 0, 1) == 3) {
				// 	$value = $sarana2;
				// } elseif (substr($kdkelas->KDKelas, 0, 1) == 4) {
				// 	$value = $sarana3;
				// } elseif (substr($kdkelas->KDKelas, 0, 1) == 7) {
				// 	$value = $saranavvip;
				// } elseif (substr($kdkelas->KDKelas, 0, 1) == 9) {
				// 	$value = $isolasi;
				// }
				// $tarif[] = $kddetail.$kdkategori->KdKategori.$kdkelas->KDKelas.' - '.$kddetail.' - '.$kdkategori->KdKategori.' - '.$kdkelas->KDKelas.' - '.$kdkelas->NMKelas.' - '.$value.' - '.$pelayanan.' - '.($value+$pelayanan).' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.' - '.' 0 '.'<br>';
				// $data = array(
				// 	'KDTarif' => $kddetail.$kdkategori->KdKategori.$kdkelas->KDKelas,
				// 	'KDDetail' => $kddetail,
				// 	'Kategori' => $kdkategori->KdKategori,
				// 	'KdKelas' => $kdkelas->KDKelas,
				// 	'NmKelas' => $kdkelas->NMKelas,
				// 	'Sarana' => $value,
				// 	'Pelayanan' => $pelayanan,
				// 	'Tarif' => ($value + $pelayanan),
				// 	'ValidUser' => 'Backup'.' '.date('d/m/Y H:i:s')
				// );

				$cek_tarif = $this->sv->select("*")->from('fTarifLaboratorium')->where('KDTarif', $kddetail.$kdkategori->KdKategori.$kdkelas->KDKelas)->get()->row();
				if (empty($cek_tarif)) {
					$input = $this->sv->insert('fTarifLaboratorium', $data);
					if ($input) {
						$inputan++;	
					}
				} else {
					$ada++;
				}
			}
		}

		$parse = array(
			'data' => $tarif,
			'inputan' => $inputan
		);
		return $parse;
	}

	public function delete_detail_pemeriksaan($kode)
	{
		$delete_detail = $this->sv->where('KodeDetail', $kode)->delete('DetailPemeriksaan');
		if ($delete_detail) {
			$parse = array(
				'status' => true,
				'message' => 'Berhasil dihapus');
		} else {
			$parse = array(
				'status' => false,
				'message' => 'Gagal dihapus');
		}

		return $parse;
		
	}

	public function delete_sub_pemeriksaan($kddetail)
	{
		$search_tarif = $this->sv->select('*')->from('fTarifLaboratorium')->where('KDDetail', $kddetail)->get()->result();
		if (!empty($search_tarif)) {
			$delete_tarif = $this->sv->where('KDDetail', $kddetail)->delete('fTarifLaboratorium');
		}

		$search_pemeriksaan = $this->sv->select('*')->from('DetailPemeriksaan')->where('KDDetail', $kddetail)->get()->result();
		if (!empty($search_pemeriksaan)) {
			$delete_detail = $this->sv->where('KDDetail', $kddetail)->delete('DetailPemeriksaan');
		}
		$delete_pemeriksaan = $this->sv->where('KDDetail', $kddetail)->delete('fPemeriksaanLab');
		
		if ($delete_pemeriksaan) {
			$parse = array(
				'status' => true,
				'message' => 'Berhasil dihapus');
		} else {
			$parse = array(
				'status' => false,
				'message' => 'Gagal dihapus');
		}

		return $parse;
	}

	public function delete_group_pemeriksaan($kode)
	{
		$delete_group = $this->sv->where('KDGroup', $kode)->delete('fGroupLab');
		if ($delete_group) {
			$parse = array(
				'status' => true,
				'message' => 'Berhasil dihapus');
		} else {
			$parse = array(
				'status' => false,
				'message' => 'Gagal dihapus');
		}

		return $parse;
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model {

	protected $sv;
	function __construct(){
		parent::__construct();
		$this->sv = $this->load->database('server',true);
		$this->load->model("BillingPemeriksaan_model","bpm");
	}

	public function get_list_pasien($filter_options)
	{
		$this->db_interface =& $this->sv;

		extract($filter_options);

		$from = [
			'Register AS r',
			'LEFT JOIN MasterPS AS ps ON r.Medrec=ps.Medrec',
			'LEFT JOIN FPPRI AS ri ON r.Regno=ri.Regno',
			'LEFT JOIN FPulang AS fp ON ri.Regno=fp.Regno',
			'LEFT JOIN POLItpp AS pol ON r.KdPoli=pol.KdPoli',
			'LEFT JOIN TBLBangsal AS bsl ON ri.KdBangsal=bsl.KdBangsal',
			'LEFT JOIN TBLKelas AS kls ON ri.KdKelas=kls.KdKelas',
			'LEFT JOIN TblKategoriPsn AS kat ON r.Kategori=kat.KdKategori',
		];

		$select = [
			'r.Regno',
			'r.Medrec',
			'r.Firstname',
			'r.Catatan',
			'r.Regdate',
			'r.KdTuju',
			'ps.Address',
			'ps.Bod',
			'r.Kategori', 'kat.NmKategori',
			'r.KdPoli', 'pol.NmPoli',
			'ri.KdBangsal', 'bsl.NmBangsal',
			'ri.KdKelas', 'kls.NmKelas',
		];

		$select[] = "(SELECT TOP 1 NoTran FROM HeadBilLab WHERE r.Regno=Regno AND CAST(Tanggal AS DATE)=CAST(GETDATE() AS DATE)) AS NoTran";

		$select[] = "CASE WHEN fp.Regno IS NOT NULL THEN 1 ELSE 0 END AS SudahPulang";
		$select[] = "
			CASE
				WHEN ri.Regno IS NOT NULL THEN 'R. Inap'
				WHEN r.KdPoli='24' THEN 'IGD'
				ELSE 'R. Jalan'
			END AS Instalasi
		";

		$where = '1=1';

		if($instalasi != 4)
		{
			$where .= $this->sv->compile_binds(' AND CAST(Regdate AS DATE) BETWEEN ? AND ?', [
				$from_date->format('Y-m-d'),
				$to_date->format('Y-m-d')
			]);
		}

		if($instalasi == 1)
		{
			$where .= " AND Instalasi='R. Jalan' AND KdTuju='PK'";
			if(!empty($poli))
			{
				$where .= $this->sv->compile_binds(' AND KdPoli=?', [$poli]);
			}
		}
		elseif($instalasi == 2 || $instalasi == 4)
		{
			$where .= " AND Instalasi='R. Inap'";
			if(!empty($ruangan))
			{
				$where .= $this->sv->compile_binds(' AND KdBangsal=?', [$ruangan]);
			}

			if($instalasi == 4)
			{
				$where .= ' AND SudahPulang=0';
			}
		}
		elseif($instalasi == 3)
		{
			$where .= " AND Instalasi='IGD'";
		}

		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where .= " AND (Regno $builded_term
				OR Medrec $builded_term
				OR Firstname $builded_term
				OR NmPoli $builded_term
				OR NmBangsal $builded_term
				OR Address $builded_term
				OR Catatan $builded_term
			)";
		}

		return $this->raw_query_pagination($select, $from, $where, $instalasi == 4 ? 'Regno DESC' : 'Regno ASC');
	}

	public function get_all_list_pasien($filter_options)
	{
		$this->db_interface =& $this->sv;

		extract($filter_options);

		$from = [
			'Register AS r',
			'LEFT JOIN MasterPS AS ps ON r.Medrec=ps.Medrec',
			'LEFT JOIN FPPRI AS ri ON r.Regno=ri.Regno',
			'LEFT JOIN FPulang AS fp ON ri.Regno=fp.Regno',
			'LEFT JOIN POLItpp AS pol ON r.KdPoli=pol.KdPoli',
			'LEFT JOIN TBLBangsal AS bsl ON ri.KdBangsal=bsl.KdBangsal',
			'LEFT JOIN TBLKelas AS kls ON ri.KdKelas=kls.KdKelas',
			'LEFT JOIN TblKategoriPsn AS kat ON r.Kategori=kat.KdKategori',
		];

		$select = [
			'r.Regno',
			'r.Medrec',
			'r.Firstname',
			'r.Catatan',
			'r.Regdate',
			'r.KdTuju',
			'ps.Address',
			'ps.Bod',
			'r.Kategori', 'kat.NmKategori',
			'r.KdPoli', 'pol.NmPoli',
			'ri.KdBangsal', 'bsl.NmBangsal',
			'ri.KdKelas', 'kls.NmKelas',
		];

		$select[] = "(SELECT TOP 1 NoTran FROM HeadBilLab WHERE r.Regno=Regno AND CAST(Tanggal AS DATE)=CAST(GETDATE() AS DATE)) AS NoTran";

		$select[] = "CASE WHEN fp.Regno IS NOT NULL THEN 1 ELSE 0 END AS SudahPulang";
		$select[] = "
			CASE
				WHEN ri.Regno IS NOT NULL THEN 'R. Inap'
				WHEN r.KdPoli='24' THEN 'IGD'
				ELSE 'R. Jalan'
			END AS Instalasi
		";

		$where = '1=1';

		if($instalasi != 4)
		{
			$where .= $this->sv->compile_binds(' AND CAST(Regdate AS DATE) BETWEEN ? AND ?', [
				$from_date->format('Y-m-d'),
				$to_date->format('Y-m-d')
			]);
		}

		if($instalasi == 1)
		{
			$where .= " AND Instalasi='R. Jalan' AND KdTuju='PK'";
			if(!empty($poli))
			{
				$where .= $this->sv->compile_binds(' AND KdPoli=?', [$poli]);
			}
		}
		elseif($instalasi == 2 || $instalasi == 4)
		{
			$where .= " AND Instalasi='R. Inap'";
			if(!empty($ruangan))
			{
				$where .= $this->sv->compile_binds(' AND KdBangsal=?', [$ruangan]);
			}

			if($instalasi == 4)
			{
				$where .= ' AND SudahPulang=0';
			}
		}
		elseif($instalasi == 3)
		{
			$where .= " AND Instalasi='IGD'";
		}

		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where .= " AND (Regno $builded_term
				OR Medrec $builded_term
				OR Firstname $builded_term
				OR NmPoli $builded_term
				OR NmBangsal $builded_term
				OR Address $builded_term
				OR Catatan $builded_term
			)";
		}
		$this->per_page = 500;
		return $this->raw_query_pagination($select, $from, $where, $instalasi == 4 ? 'Regno DESC' : 'Regno ASC');
	}

	public function list_pasien($date1 = '', $date2 = '', $medrec = '')
	{
		$list_lab = $this->sv->select("Register.Regno, Register.Medrec, Register.Firstname, Register.Regdate, Register.Regtime, Register.KdSex, Register.Sex, Register.NomorUrut, Register.KdJaminan, TBLJaminan.NMJaminan, Register.NmRujukan, Register.NoPeserta, Register.AtasNama, Register.NmKelas, Register.KdTuju, Register.KdPoli, Register.KdKelas, TBLKelas.NMKelas, Register.KdIcd, TBLICD10.DIAGNOSA, Register.NoSep, Register.Keterangan, TBLTpengobatan.NMTuju, POLItpp.NMPoli, Register.KdDoc, FtDokter.NmDoc, Register.Kategori, TblKategoriPsn.NmKategori, Register.ValidUser, Register.Bod, Register.phone, Register.kdcob, Register.KdBangsal, TBLBangsal.NmBangsal, Register.KdCBayar, TBLcarabayar.NMCbayar, Register.Prolanis, Register.StatPeserta, Register.NmRefPeserta, Register.Catatan")->from("Register")
			->join("TBLJaminan", "Register.KdJaminan = TBLJaminan.KDJaminan", "LEFT")
			->join("TBLICD10", "Register.KdICD = TBLICD10.KDICD", "LEFT")
			->join("TBLKelas", "Register.KdKelas = TBLKelas.KdKelas", "LEFT")
			->join("TBLBangsal", "Register.KdBangsal = TBLBangsal.KdBangsal", "LEFT")
			->join("TblKategoriPsn", "Register.Kategori = TblKategoriPsn.KdKategori", "LEFT")
			->join("TBLTpengobatan", "Register.KdTuju = TBLTpengobatan.KDTuju", "LEFT")
			->join("POLItpp", "Register.KdPoli = POLItpp.KDPoli", "LEFT")
			->join("FtDokter", "Register.KdDoc = FtDokter.KdDoc", "LEFT")
			->join("TBLcarabayar", "Register.KdCBayar = TBLcarabayar.KDCbayar", "LEFT")
			->where("Register.KdTuju", "PK")
			->where("Register.Regdate >=", $date1.' 00:00:00')
			->where("Register.Regdate <=", $date2.' 23:59:59');
			$where_lab = "(Register.Medrec LIKE '%$medrec%' OR Register.Firstname LIKE '%$medrec%' OR POLItpp.NMPoli LIKE '%$medrec%' OR TBLBangsal.NmBangsal LIKE '%$medrec%' OR FtDokter.NmDoc LIKE '%$medrec%' OR Register.Regno LIKE '%$medrec%')";
        	$list_lab = $list_lab->where($where_lab)->get()->result();

		$list_ugd = $this->sv->select("Register.Regno, Register.Medrec, Register.Firstname, Register.Regdate, Register.Regtime, Register.KdSex, Register.Sex, Register.NomorUrut, Register.KdJaminan, TBLJaminan.NMJaminan, Register.NmRujukan, Register.NoPeserta, Register.AtasNama, Register.NmKelas, Register.KdTuju, Register.KdPoli, Register.KdKelas, TBLKelas.NMKelas, Register.KdIcd, TBLICD10.DIAGNOSA, Register.NoSep, Register.Keterangan, TBLTpengobatan.NMTuju, POLItpp.NMPoli, Register.KdDoc, FtDokter.NmDoc, Register.Kategori, TblKategoriPsn.NmKategori, Register.ValidUser, Register.Bod, Register.phone, Register.kdcob, Register.KdBangsal, TBLBangsal.NmBangsal, Register.KdCBayar, TBLcarabayar.NMCbayar, Register.Prolanis, Register.StatPeserta, Register.NmRefPeserta, Register.Catatan")->from("Register")
			->join("TBLJaminan", "Register.KdJaminan = TBLJaminan.KDJaminan", "LEFT")
			->join("TBLICD10", "Register.KdICD = TBLICD10.KDICD", "LEFT")
			->join("TBLKelas", "Register.KdKelas = TBLKelas.KdKelas", "LEFT")
			->join("TBLBangsal", "Register.KdBangsal = TBLBangsal.KdBangsal", "LEFT")
			->join("TblKategoriPsn", "Register.Kategori = TblKategoriPsn.KdKategori", "LEFT")
			->join("TBLTpengobatan", "Register.KdTuju = TBLTpengobatan.KDTuju", "LEFT")
			->join("POLItpp", "Register.KdPoli = POLItpp.KDPoli", "LEFT")
			->join("FtDokter", "Register.KdDoc = FtDokter.KdDoc", "LEFT")
			->join("TBLcarabayar", "Register.KdCBayar = TBLcarabayar.KDCbayar", "LEFT")
			->where("Register.KdPoli", "24")
			->where("Register.Regdate >=", $date1.' 00:00:00')
			->where("Register.Regdate <=", $date2.' 23:59:59');
			$where_ugd = "(Register.Medrec LIKE '%$medrec%' OR Register.Firstname LIKE '%$medrec%' OR POLItpp.NMPoli LIKE '%$medrec%' OR TBLBangsal.NmBangsal LIKE '%$medrec%' OR FtDokter.NmDoc LIKE '%$medrec%' OR Register.Regno LIKE '%$medrec%')";
        	$list_ugd = $list_ugd->where($where_ugd)->get()->result();

		$list_rawat_inap = $this->sv->select("ri.Regno, ri.Medrec, ri.Firstname, ri.KdKelas, TBLKelas.NMKelas, ri.KdBangsal, TBLBangsal.NmBangsal, ri.KdCBayar, TBLcarabayar.NMCbayar, ri.nosep, ri.ValidUser, TblKategoriPsn.NmKategori")->from("FPPRI ri")
			->join("TBLKelas", "ri.KdKelas = TBLKelas.KdKelas", "LEFT")
			->join("TBLBangsal", "ri.KdBangsal = TBLBangsal.KdBangsal", "LEFT")
			->join("TBLcarabayar", "ri.KdCBayar = TBLcarabayar.KDCbayar", "LEFT")
			->join("TblKategoriPsn", "ri.Kategori = TblKategoriPsn.KdKategori", "LEFT")
			->where("ri.Regdate >=", $date1.' 00:00:00')
			->where("ri.Regdate <=", $date2.' 23:59:59');
			$where_ranap = "(ri.Medrec LIKE '%$medrec%' OR ri.Firstname LIKE '%$medrec%' OR TBLBangsal.NmBangsal LIKE '%$medrec%' OR ri.Regno LIKE '%$medrec%')";
        	$list_rawat_inap = $list_rawat_inap->where($where_ranap)->get()->result();

		$parse = array(
			'lab' => $list_lab,
			'ugd' => $list_ugd,
			'rawat_inap' => $list_rawat_inap
		);
		return $parse;
	}

	public function get_pasien_by_rm($medrec)
	{
		$pasien = $this->sv->select('r.*, k.NmKategori, Register.Kunjungan')->from('MasterPS r')
					->join('TblKategoriPsn k', 'r.Kategori = k.KdKategori')
					->join('Register', 'r.Medrec = Register.Medrec', 'LEFT')
					->where('r.Medrec', $medrec)->get()->row();
		if ($pasien) {
			$parse = array(
				'status' => true,
				'data' => $pasien);
		} else {
			$parse = array(
				'status' => false,
				'data' => $pasien);
		}

		return $parse;
	}

	public function get_pasien_by_regno($regno)
	{
		$pasien = $this->sv->select("Register.Regno, Register.Medrec, Register.Firstname, MasterPS.TglDaftar, Register.Regdate, Register.Regtime, Register.KdSex, Register.Sex, Register.Kunjungan, Register.NomorUrut, Register.nikktp, Register.NoKontrol, Register.NoRujuk, Register.KdJaminan, TBLJaminan.NMJaminan, Register.NmRujukan, Register.NoPeserta, Register.AtasNama, Register.NmKelas, Register.KdTuju, Register.KdPoli, FPPRI.KdKelas, Register.TglRujuk, TBLKelas.NMKelas, Register.KdIcd, TBLICD10.DIAGNOSA, Register.NoSep, Register.NotifSep, Register.Keterangan, TBLTpengobatan.NMTuju, POLItpp.NMPoli, Register.KdDoc, FtDokter.NmDoc, Register.Kategori, TblKategoriPsn.NmKategori, Register.ValidUser, Register.Bod, Register.phone, Register.kdcob, FPPRI.KdBangsal, TBLBangsal.NmBangsal, Register.KdCBayar, TBLcarabayar.NMCbayar, Register.Prolanis, Register.StatPeserta, Register.NmRefPeserta, Register.Catatan, fCetakSEP.Nomor, HeadBilLab.NoTran, HeadBilLab.NoLab, HeadBilLab.KdDokter, DokterPemeriksa.NmDoc as NmDokterPemeriksa, HeadBilLab.KdDoc as KdDokterPengirim, HeadBilLab.NmDoc as NmDokterPengirim", "LEFT")->from("Register")
			->join("FPPRI", "Register.Regno = FPPRI.Regno", "LEFT")
			->join("MasterPS", "Register.Medrec = MasterPS.Medrec", "LEFT")
			->join("TBLJaminan", "Register.KdJaminan = TBLJaminan.KDJaminan", "LEFT")
			->join("TBLICD10", "Register.KdICD = TBLICD10.KDICD", "LEFT")
			->join("TBLKelas", "FPPRI.KdKelas = TBLKelas.KdKelas", "LEFT")
			->join("TBLBangsal", "FPPRI.KdBangsal = TBLBangsal.KdBangsal", "LEFT")
			->join("TblKategoriPsn", "Register.Kategori = TblKategoriPsn.KdKategori", "LEFT")
			->join("TBLTpengobatan", "Register.KdTuju = TBLTpengobatan.KDTuju", "LEFT")
			->join("POLItpp", "Register.KdPoli = POLItpp.KDPoli", "LEFT")
			->join("FtDokter", "Register.KdDoc = FtDokter.KdDoc", "LEFT")
			->join("TBLcarabayar", "Register.KdCBayar = TBLcarabayar.KDCbayar", "LEFT")
			->join("fCetakSEP", "Register.Regno = fCetakSEP.Regno", "LEFT")
			->join("HeadBilLab", "Register.Regno = HeadBilLab.Regno", "LEFT")
			->join("FtDokter DokterPemeriksa", "HeadBilLab.KdDokter = DokterPemeriksa.KdDoc", "LEFT")
			->where("Register.Regno", $regno)->get()->row();
		if (!empty($pasien)) {
			if ($pasien->NoLab == '') {
				if ($pasien->KdBangsal != '') {
					$notran = $this->bpm->create_new_no('RI');
				} elseif ($pasien->KdPoli == '24') {
					$notran = $this->bpm->create_new_no('UGD');
				} else {
					$notran = $this->bpm->create_new_no('RJ');
				}
			}
			$parse = array(
				'data' => $pasien,
				'NomorLaboratorium' => $notran['NomorLab'] ?? $pasien->NoLab,
				'NoTransaksi' => $notran['NomorTransaksi'] ?? $pasien->NoTran,
				'status' => true
			);
		} else {
			$parse = array(
				'data' => [],
				'status' => false
			);
		}
		return $parse;
	}

	public function update_kategori($data)
	{
		$value = array(
			'Kategori' => $data['Kategori'],
			'NmUnit' => $data['NmUnit'],
			'GroupUnit' => $data['GroupUnit'],
			'AskesNo' => $data['AskesNo']);
		$update = $this->sv->set($value)->where('Medrec', $data['Medrec'])->update('MasterPS');
		if ($update) {
			$parse = array(
				'status' => true,
				'message' => 'Berhasil diupdate');
		} else {
			$parse = array(
				'status' => false,
				'message' => 'Gagal terupdate');
		}

		return $parse;
	}

	public function post_new($data)
	{
		if (strlen($data['Regno']) == 0 || $data['Regno'] == '') {
			$no_regno = $this->sv->select('*')->get('fregno')->row();
			$new_regno = $no_regno->NREGNO + 1;
			$value = array(
				'NREGNO' => $new_regno
			);
			$update = $this->sv->set($value)->where('NREGNO', $no_regno->NREGNO)->update('fregno');

			if (strlen($new_regno) == 1) {
				$new_regno = '0000000'.$new_regno;
			} elseif (strlen($new_regno) == 2) {
				$new_regno = '000000'.$new_regno;
			} elseif (strlen($new_regno) == 3) {
				$new_regno = '00000'.$new_regno;
			} elseif (strlen($new_regno) == 4) {
				$new_regno = '0000'.$new_regno;
			} elseif (strlen($new_regno) == 5) {
				$new_regno = '000'.$new_regno;
			} elseif (strlen($new_regno) == 6) {
				$new_regno = '00'.$new_regno;
			} elseif (strlen($new_regno) == 7) {
				$new_regno = '0'.$new_regno;
			}

			$check_nomor_lab = $this->sv->select('*')->from('Register')
							->where('KdTuju', 'PK')
							->where('StatusReg', '3')
							->where('Regdate >=', $data['Regdate'].' 00:00:00')
							->where('Regdate <=', $data['Regdate'].' 23:59:59')
							->order_by('NomorUrut', 'DESC')->get()->row();
			if (empty($check_nomor_lab)) {
				$nomor_urut = '1';
			} else {
				$nomor_urut = $check_nomor_lab->NomorUrut + 1;
			}

			$date = $data['Regdate'].' '.$data['Regtime'];
			$value_register = array(
				'regno' => $new_regno,
				'medrec' => $data['Medrec'],
				'firstname' => $data['Firstname'],
				'regdate' => $data['Regdate'],
				'regtime' => $date,
				'kdcbayar' => $data['KdCbayar'],
				'kdjaminan' => $data['Penjamin'],
				'kdperusahaan' => '',
				'nopeserta' => $data['noKartu'],
				'kdtuju' => 'PK',
				'kdpoli' => $data['KdPoli'],
				'kdbangsal' => '',
				'kdkelas' => '',
				'nottidur' => '',
				'kddoc' => $data['DocRS'],
				'kunjungan' => $data['Medrec'] == '' ? 'Lama' : 'Baru',
				'validuser' => $this->session->userdata('username').' '.date('d-m-Y H:i:s'),
				'sex' => $data['KdSex'] == 'L' ? 'Laki-laki' : 'Perempuan',
				'umurthn' => $data['UmurThn'],
				'umurbln' => $data['UmurBln'],
				'umurhari' => $data['UmurHari'],
				'bod' => $data['Bod'],
				'nomorurut' => $nomor_urut,
				'statusreg' => '3',
				'kategori' => $data['KategoriPasien'],
				'nosep' => $data['NoSep'],
				'kdicd' => $data['DiagAw'],
				'kdsex' => $data['KdSex'],
				'groupunit' => $data['GroupUnit'],
				'kdicdbpjs' => $data['DiagAw'],
				'bodbpjs' => $data['Bod'],
				'pisat' => $data['pisat'],
				'keterangan' => '',
				'catatan' => $data['catatan'],
				'tglrujuk' => $data['RegRujuk'],
				'nokontrol' => $data['nokontrol'],
				'norujuk' => $data['NoRujuk'],
				'kdrujukan' => $data['Ppk'],
				'nmrujukan' => $data['noPpk'],
				'kdrefpeserta' => $data['kodePeserta'],
				'nmrefpeserta' => $data['Peserta'],
				'nmkelas' => $data['JatKelas'],
				'notifsep' => $data['NotifSep'],
				'kdkasus' => '',
				'lokasikasus' => '',
				'kddpjp' => $data['KdDPJP'],
				'nikktp' => $data['NoIden'],
				'statpeserta' => $data['statusPeserta'],
				'kdstatpeserta' => '0',
				'perjanjian' => '',
				'asalrujuk' => $data['Faskes'],
				'phone' => $data['Notelp'],
				'kdcob' => $data['Cob'],
				'prolanis' => $data['Prolanis'],
				'idregold' => '',
				'nmcob' => '',
				'kdjaminanbpjs' => ''
			);

			$insert_register = $this->sv->insert('Register', $value_register);

			if ($insert_register) {
				$parse = array(
					'NomorUrut' => $nomor_urut,
					'Regno' => $new_regno,
					'Firstname' => $data['Firstname'],
					'NoSep' => $data['NoSep'],
					'message' => 'Berhasil menambahkan data!'
				);
			}
		} else {
			$check_reg_pasien = $this->sv->select('*')->from('Register')->where('Regno', $data['Regno'])->get()->row();

			$date = $data['Regdate'].' '.$data['Regtime'];
			$value_register = array(
				'regno' => $data['Regno'],
				'medrec' => $data['Medrec'],
				'firstname' => $data['Firstname'],
				'regdate' => $data['Regdate'],
				'regtime' => $date,
				'kdcbayar' => $data['KdCbayar'],
				'kdjaminan' => $data['Penjamin'],
				'kdperusahaan' => '',
				'nopeserta' => $data['noKartu'],
				'kdtuju' => 'PK',
				'kdpoli' => $data['KdPoli'],
				'kdbangsal' => '',
				'kdkelas' => '',
				'nottidur' => '',
				'kddoc' => $data['DocRS'],
				'kunjungan' => $data['Medrec'] == '' ? 'Lama' : 'Baru',
				'validuser' => $this->session->userdata('username').' '.date('d-m-Y H:i:s'),
				'sex' => $data['KdSex'] == 'L' ? 'Laki-laki' : 'Perempuan',
				'umurthn' => $data['UmurThn'],
				'umurbln' => $data['UmurBln'],
				'umurhari' => $data['UmurHari'],
				'bod' => $data['Bod'],
				'nomorurut' => $data['NomorUrut'],
				'statusreg' => '3',
				'kategori' => $data['KategoriPasien'],
				'nosep' => $data['NoSep'],
				'kdicd' => $data['DiagAw'],
				'kdsex' => $data['KdSex'],
				'groupunit' => $data['GroupUnit'],
				'kdicdbpjs' => $data['DiagAw'],
				'bodbpjs' => $data['Bod'],
				'pisat' => $data['pisat'],
				'keterangan' => '',
				'catatan' => $data['catatan'],
				'tglrujuk' => $data['RegRujuk'],
				'nokontrol' => $data['nokontrol'],
				'norujuk' => $data['NoRujuk'],
				'kdrujukan' => $data['Ppk'],
				'nmrujukan' => $data['noPpk'],
				'kdrefpeserta' => $data['kodePeserta'],
				'nmrefpeserta' => $data['Peserta'],
				'nmkelas' => $data['JatKelas'],
				'notifsep' => $data['NotifSep'],
				'kdkasus' => '',
				'lokasikasus' => '',
				'kddpjp' => $data['KdDPJP'],
				'nikktp' => $data['NoIden'],
				'statpeserta' => $data['statusPeserta'],
				'kdstatpeserta' => '0',
				'perjanjian' => '',
				'asalrujuk' => $data['Faskes'],
				'phone' => $data['Notelp'],
				'kdcob' => $data['Cob'],
				'prolanis' => $data['Prolanis'],
				'idregold' => '',
				'nmcob' => '',
				'kdjaminanbpjs' => ''
			);

			$updated = $this->sv->set($value_register)->where('Regno', $data['Regno'])->update('Register');
			if ($updated) {
				$parse = array(
					'NomorUrut' => $check_reg_pasien->NomorUrut,
					'Regno' => $check_reg_pasien->Regno,
					'Firstname' => $check_reg_pasien->Firstname,
					'NoSep' => $check_reg_pasien->NoSep,
					'message' => 'Berhasil merubah data!'
				);
			}
		}

		return $parse;
	}

	public function post($data)
	{
		$exec = $this->stpnet_AddNewRegistrasiBPJS_REGxhos(
		 	$data['Regno'],
			$data['Medrec'],
			$data['Firstname'],
			$data['Regdate'],
			$data['Regtime'],
			$data['KdCbayar'],
			$data['Penjamin'],
			'',
			$data['noKartu'],
			$data['KdTuju'],
			$data['KdPoli'],
			'',
			'',
			'',
			$data['DocRS'],
			$data['Kunjungan'],
			'',
			'',
			$data['UmurThn'],
			$data['UmurBln'],
			$data['UmurHari'],
			$data['Bod'],
			$data['NomorUrut'],
			'',
			$data['KategoriPasien'],
			$data['NoSep'],
			$data['DiagAw'],
			$data['KdSex'],
			$data['GroupUnit'],
			$data['DiagAw'],
			$data['Bod'],
			$data['pisat'],
			'',
			$data['catatan'],
			$data['RegRujuk'],
			$data['nokontrol'],
			$data['NoRujuk'],
			$data['Ppk'],
			$data['noPpk'],
			$data['kodePeserta'],
			$data['Peserta'],
			$data['JatKelas'],
			$data['NotifSep'],
			'',
			'',
			$data['KdDPJP'],
			$data['NoIden'],
			$data['statusPeserta'],
			$data['statusPeserta'],
			'',
			$data['Faskes'],
			$data['Notelp'],
			$data['Cob'],
			$data['Prolanis'],
			$data['idregold'],
			'',
			$data['Penjamin'],
			'',
			''
		);
		$data_pasien = $this->sv->select('Regno, Firstname, NomorUrut, NoSep')->from('Register')->where('Medrec', $data['Medrec'])->where('KdPoli', $data['KdPoli'])->where('Regdate', $data['Regdate'])->get()->row();

		if (!empty($data_pasien)) {

			$parse = array(
				'NomorUrut' => $data_pasien->NomorUrut,
				'Regno' => $data_pasien->Regno,
				'Firstname' => $data_pasien->Firstname,
				'NoSep' => $data_pasien->NoSep,
				'message' => 'Berhasil menambahkan data!'
			);
		}
		return $parse;
	}

	public function update_registrasi($regno)
	{
		$value = array(
			'KdTuju' => 'PK',
			'StatusReg' => '3'
		);
		$update = $this->sv->set($value)->where('Regno', $regno)->update('Register');
		return $update;
	}

	public function stpnet_AddNewRegistrasiBPJS_REGxhos($regno = '', $medrec = '', $firstname = '', $regdate = '', $regtime = '', $kdcbayar = '', $kdjaminan = '', $kdperusahaan = '', $nopeserta = '', $kdtuju = '', $kdpoli = '', $kdbangsal = '', $kdkelas = '', $nottidur = '', $kddoc = '', $kunjungan = '', $validuser = '', $sex = '', $umurthn = '', $umurbln = '', $umurhari = '', $bod = '', $nomorurut = '', $statusreg = '', $kategori = '', $nosep = '', $kdicd = '', $kdsex = '', $groupunit = '', $kdicdbpjs = '', $bodbpjs = '', $pisat = '', $keterangan = '', $catatan = '', $tglrujuk = '', $nokontrol = '', $norujuk = '', $kdrujukan = '', $nmrujukan = '', $kdrefpeserta = '', $nmrefpeserta = '', $nmkelas = '', $notifsep = '', $kdkasus = '', $lokasikasus = '', $kddpjp = '', $nikktp = '', $statpeserta = '', $kdstatpeserta = '', $perjanjian = '', $asalrujuk = '', $phone = '', $kdcob = '', $prolanis = '', $idregold = '', $nmcob = '', $kdjaminanbpjs = '', $regnumber = '', $sequalNum = '')
	{

		$sp = "spwe_AddNewRegistrasiBPJS_REGxhos @regno = ?, @medrec = ?, @firstname = ?, @regdate = ?, @regtime = ?, @kdcbayar = ?, @kdjaminan = ?, @kdperusahaan = ?, @nopeserta = ?, @kdtuju = ?, @kdpoli = ?, @kdbangsal = ?, @kdkelas = ?, @nottidur = ?, @kddoc = ?, @kunjungan = ?, @validuser = ?, @sex = ?, @umurthn = ?, @umurbln = ?, @umurhari = ?, @bod = ?, @nomorurut = ?, @statusreg = ?, @kategori = ?, @nosep = ?, @kdicd = ?, @kdsex = ?, @groupunit = ?, @kdicdbpjs = ?, @bodbpjs = ?, @pisat = ?, @keterangan = ?, @catatan = ?, @tglrujuk = ?, @nokontrol = ?, @norujuk = ?, @kdrujukan = ?, @nmrujukan = ?, @kdrefpeserta = ?, @nmrefpeserta = ?, @nmkelas = ?, @notifsep = ?, @kdkasus = ?, @lokasikasus = ?, @kddpjp = ?, @nikktp = ?, @statpeserta = ?, @kdstatpeserta = ?, @perjanjian = ?, @asalrujuk = ?, @phone = ?, @kdcob = ?, @prolanis = ?, @idregold = ?, @nmcob = ?, @kdjaminanbpjs = ?, @regnumber = ?, @sequalNum = ?";

		// $sex = $sex == 'L' ? 'Laki-laki' : 'Perempuan';
		$date = $regdate.' '.$regtime;
		$params = array(
			'regno' => $regno,
			'medrec' => $medrec,
			'firstname' => $firstname,
			'regdate' => $regdate,
			'regtime' => $date,
			'kdcbayar' => $kdcbayar,
			'kdjaminan' => $kdjaminan,
			'kdperusahaan' => '',
			'nopeserta' => $nopeserta,
			'kdtuju' => $kdtuju,
			'kdpoli' => $kdpoli,
			'kdbangsal' => '',
			'kdkelas' => '',
			'nottidur' => '',
			'kddoc' => $kddoc,
			'kunjungan' => $kunjungan,
			'validuser' => $this->session->userdata('username'),
			'sex' => $kdsex == 'L' ? 'Laki-laki' : 'Perempuan',
			'umurthn' => $umurthn,
			'umurbln' => $umurbln,
			'umurhari' => $umurhari,
			'bod' => $bod,
			'nomorurut' => $nomorurut,
			'statusreg' => '1',
			'kategori' => $kategori,
			'nosep' => $nosep,
			'kdicd' => $kdicd,
			'kdsex' => $kdsex,
			'groupunit' => $groupunit,
			'kdicdbpjs' => $kdicdbpjs,
			'bodbpjs' => $bodbpjs,
			'pisat' => $pisat,
			'keterangan' => $keterangan,
			'catatan' => $catatan,
			'tglrujuk' => $tglrujuk,
			'nokontrol' => $nokontrol,
			'norujuk' => $norujuk,
			'kdrujukan' => $kdrujukan,
			'nmrujukan' => $nmrujukan,
			'kdrefpeserta' => $kdrefpeserta,
			'nmrefpeserta' => $nmrefpeserta,
			'nmkelas' => $nmkelas,
			'notifsep' => $notifsep,
			'kdkasus' => $kdkasus,
			'lokasikasus' => '',
			'kddpjp' => $kddpjp,
			'nikktp' => $nikktp,
			'statpeserta' => $statpeserta,
			'kdstatpeserta' => '0',
			'perjanjian' => $perjanjian,
			'asalrujuk' => $asalrujuk,
			'phone' => $phone,
			'kdcob' => $kdcob,
			'prolanis' => $prolanis,
			'idregold' => $idregold,
			'nmcob' => $nmcob,
			'kdjaminanbpjs' => $kdjaminanbpjs,
			'regnumber' => '',
			'sequalNum' => ''
		);

		$result = $this->sv->query($sp,$params);
		return $result->row();
	}

	public function update_billing_pemeriksaan($notran, $regno)
	{
		$parse = [];
		$input_detail = 0;
		$input_detail_hasil = 0;
		$data = (array) $this->sv->select('*')->from('HeadBilLabAcc')->where('NoTran', $notran)->where('Tanda', 0)->get()->row();
		$pemeriksaan = $this->sv->select('KdTarif as value')->from('DetailBilLabAcc')->where('NoTran', $notran)->where('ByUmum', 'Y')->get()->result_array();
		// echo'<pre>'; print_r($pemeriksaan);die();
		
		if (!empty($pemeriksaan)) {
		$cek_poli = $this->sv->select('*')->from('POLItpp')->where('KDPoli', $data['KdPoli'])->get()->row();
			if (!empty($cek_poli)) {

				if ($data['NoTran'] != '') {
					$parse['NoTran'] = $data['NoTran'];
					$parse['NoLab'] = $data['NoLab'];
					$data['Regno'] = $regno;
					
					$pasien = $this->sv->select('*')->from('Register')->where('Regno', $data['Regno'])->get()->row();
					// Parameter
					$post_head_billing = array(
						'NoTran' => $data['NoTran'],
						'Tanggal' => $data['Tanggal'],
						'Jam' => $data['Jam'],
						'NoLab' => $data['NoLab'],
						'Regno' => $data['Regno'],
						'Regdate' => $pasien->Regdate,
						'MedRec' => $data['MedRec'],
						'Firstname' => $pasien->Firstname,
						'Sex' => $data['Sex'],
						'UmurThn' => $data['UmurThn'],
						'UmurBln' => $data['UmurBln'],
						'UmurHari' => $data['UmurHari'],
						'KdBangsal' => $data['KdBangsal'],
						'KdKelas' => $data['KdKelas'],
						'KdDoc' => $data['KdDoc'],
						'NmDoc' => $data['NmDoc'],
						'KdPoli' => $data['KdPoli'],
						'KdCbayar' => $data['KdCbayar'],
						'KdJaminan' => $data['KdJaminan'],
						'Jumlah' => $data['Jumlah'],
						'TotalBiaya' => $data['Jumlah'],
						'Shift' => '1',
						"Catatan"=> $data['Catatan'],
						'ValidUser' => 'ERM '.date('d/m/Y H:i:s'),
						'Kategori' => $pasien->Kategori,
						'nStatus' => $data['nStatus'],
						'nJenis' => $data['nJenis'],
						'Tanda' => '1'
					);
					$post_head_hasil = array(
						'Notran' => $data['NoTran'],
						'Nolab' => $data['NoLab'],
						'Regno' => $data['Regno'],
						'RegDate' => $pasien->Regdate,
						'MedRec' => $data['MedRec'],
						'Firstname' => $pasien->Firstname,
						'Sex' => $data['Sex'],
						'UmurThn' => $data['UmurThn'],
						'UmurBln' => $data['UmurBln'],
						'UmurHari' => $data['UmurHari'],
						'ValidUser' => 'ERM '.date('d/m/Y H:i:s'),
						'Otor' => '0',
						'Tanda' => '1'
					);

					$cek_transaksi = $this->sv->select('*')->from('HeadBilLabTEMP')->where('NoTran', $data['NoTran'])->get()->row();
					if (empty($cek_transaksi)) {
							$save_head_billing = $this->sv->set($post_head_billing)->insert('HeadBilLabTEMP');
							if ($save_head_billing) {
								$parse['message_head_billing'] = 'Masuk Head Billing TEMP';
								$save_head_hasil = $this->sv->set($post_head_hasil)->insert('HeadHasil');
								$parse['message_head_hasil'] = 'Masuk Head Hasil';
							}
					} 
					// else {
					// 	$update_head_billing = $this->sv->where('NoTran', $data['NoTran'])->update('HeadBilLabTEMP', $post_head_billing);
					// 	$parse['message_billing'] = 'Data Berhasil diubah!';
					// }
					$parse['alur-1'] = '-1';
					// post detail
					// $pemeriksaan = [];
					// for ($i=1; $i < count($Pemeriksaan); $i++) { 
					// 	$pemeriksaan[] = $data['Pemeriksaan'][$i];
					// }
					$parse['alur0'] = '0';
					$cek_detail = $this->sv->select('*')->from('DetailBilLab')->where('NoTran', $data['NoTran'])->get()->row();
					if (empty($cek_transaksi)) {
						foreach ($pemeriksaan as $list_pemeriksaan) {
							// lab Satuan
							$tarif_satuan = $this->sv->select('tarif.KDTarif, tarif.Sarana, tarif.Pelayanan, tarif.Tarif, tarif.KDDetail, pemeriksaan.KdGroup, grouplab.NmGroup, pemeriksaan.NMDetail, 
								pemeriksaan.Satuan,
								pemeriksaan.NilaiNormalPria, 
								pemeriksaan.NilaiNormalWanita, 
								pemeriksaan.NNAwalPria as PemeriksaanAwalPria, 
								pemeriksaan.NNAkhirPria as PemeriksaanAkhirPria, 
								pemeriksaan.NNAwalWanita as PemeriksaanAwalWanita, 
								pemeriksaan.NNAkhirWanita as PemeriksaanAkhirWanita,
								pemeriksaan.KdMappingHistori as KodeMappingHistori,
								pemeriksaan.KdInput as KdInput,
								detailpemeriksaan.KodeDetail, detailpemeriksaan.NamaDetail, 
								detailpemeriksaan.NilaiNormalPria as detailpemeriksaanNilaiNormalPria, 
								detailpemeriksaan.NilaiNormalWanita as detailpemeriksaanNilaiNormalWanita, 
								detailpemeriksaan.Satuan as detailpemeriksaanSatuan,
								detailpemeriksaan.NNAwalPria as detailpemeriksaanNNAwalPria, 
								detailpemeriksaan.NNAkhirPria as detailpemeriksaanNNAkhirPria, 
								detailpemeriksaan.NNAwalWanita as detailpemeriksaanNNAwalWanita, 
								detailpemeriksaan.NNAkhirWanita as detailpemeriksaanNNAkhirWanita,
								detailpemeriksaan.KdMappingHistori as detailpemeriksaanKodeMappingHistori,
								detailpemeriksaan.KdInput as detailpemeriksaanKdInput')
								->from('fTarifLaboratorium tarif')
								->join('fPemeriksaanLab pemeriksaan', 'tarif.KDDetail = pemeriksaan.KDDetail')
								->join('DetailPemeriksaan detailpemeriksaan', 'tarif.KDDetail = detailpemeriksaan.KDDetail', 'LEFT')
								->join('fGroupLab grouplab', 'pemeriksaan.KdGroup = grouplab.KDGroup')
								->where('tarif.KDTarif', $list_pemeriksaan['value'])->get()->row();
							$parse['alur'] = '1';

							$post_detail_billing = array(
								'NoTran' => $data['NoTran'],
								'Tanggal' => $data['Tanggal'],
								'Regno' => $data['Regno'],
								'MedRec' => $data['MedRec'],
								'KdPemeriksaan' => $tarif_satuan->KDDetail,
								'KdTarif' => $tarif_satuan->KDTarif,
								'NmTarif' => $tarif_satuan->NMDetail,
								'Sarana' => $tarif_satuan->Sarana,
								'Pelayanan' => $tarif_satuan->Pelayanan,
								'JumlahBiaya' => $tarif_satuan->Tarif,
								'nCover' => '0',
								'Shift' => '1',
								'ValidUser' => 'ERM '.date('d/m/Y H:i:s')
							);

							$post_detail_hasil = array(
								'NoTran' => $data['NoTran'],
								'Tanggal' => $data['Tanggal'],
								'NoLab' => $data['NoLab'],
								'Regno' => $data['Regno'],
								'Medrec' => $data['MedRec'],
								'KdGroup' => $tarif_satuan->KdGroup,
								'KDDetail' => $tarif_satuan->KDDetail,
								'NMDetail' => $tarif_satuan->NMDetail,
								'Satuan' => $tarif_satuan->Satuan,
								'NilaiNormal' => $data['Sex'] == 'Laki-laki' ? $tarif_satuan->NilaiNormalPria : $tarif_satuan->NilaiNormalWanita,
								'nhasila' => $data['Sex'] == 'Laki-laki' ? $tarif_satuan->PemeriksaanAwalPria : $tarif_satuan->PemeriksaanAwalWanita,
								'nhasilb' => $data['Sex'] == 'Laki-laki' ? $tarif_satuan->PemeriksaanAkhirPria : $tarif_satuan->PemeriksaanAkhirWanita,
								'keyno' => $data['NoTran'].$tarif_satuan->KDDetail.date('His'),
								'KdMappingHistori' => $tarif_satuan->KodeMappingHistori,
								'KdInput' => $tarif_satuan->KdInput
							);
							$parse['alur2'] = '2';
							
							$parse['alur3'] = '3';

								$save_detail_billing = $this->sv->set($post_detail_billing)->insert('DetailBilLab');
								$parse['message_detail_billing'] = 'Masuk Detail Billing';
								$save_detail_hasil = $this->sv->set($post_detail_hasil)->insert('DetailHasil');
								$parse['message_detail_hasil'] = 'Masuk Detail Hasil';		

							$input_detail++;
							$parse['message'] = 'Data berhasil masuk';

							if ($save_detail_hasil) {
								$parse['alur4'] = '4';
								// Paket Lab
								$tarif_paket = $this->sv->select('tarif.KDTarif, tarif.Sarana, tarif.Pelayanan, tarif.Tarif, tarif.KDDetail, pemeriksaan.KdGroup, grouplab.NmGroup, pemeriksaan.NMDetail, 
									pemeriksaan.Satuan, 
									pemeriksaan.NilaiNormalPria, 
									pemeriksaan.NilaiNormalWanita,
									pemeriksaan.KdInput, 
									detailpemeriksaan.KodeDetail, 
									detailpemeriksaan.NamaDetail, 
									detailpemeriksaan.NilaiNormalPria as detailpemeriksaanNilaiNormalPria, 
									detailpemeriksaan.NilaiNormalWanita as detailpemeriksaanNilaiNormalWanita, 
									detailpemeriksaan.NNAwalPria as detailpemeriksaanNNAwalPria, 
									detailpemeriksaan.NNAkhirPria as detailpemeriksaanNNAkhirPria, 
									detailpemeriksaan.NNAwalWanita as detailpemeriksaanNNAwalWanita, 
									detailpemeriksaan.NNAkhirWanita as detailpemeriksaanNNAkhirWanita,
									detailpemeriksaan.Satuan as detailpemeriksaanSatuan,
									detailpemeriksaan.KdMappingHistori as detailpemeriksaanKodeMappingHistori,
									detailpemeriksaan.KdInput as detailpemeriksaanKdInput')
									->from('fTarifLaboratorium tarif')
									->join('fPemeriksaanLab pemeriksaan', 'tarif.KDDetail = pemeriksaan.KDDetail')
									->join('DetailPemeriksaan detailpemeriksaan', 'tarif.KDDetail = detailpemeriksaan.KDDetail', 'LEFT')
									->join('fGroupLab grouplab', 'pemeriksaan.KdGroup = grouplab.KDGroup')
									->where('tarif.KDTarif', $list_pemeriksaan['value'])->get()->result();
								foreach ($tarif_paket as $key => $list_paket) {
									if ($list_paket->NamaDetail != '') {
										$post_detail_hasil_paket = array(
											'NoTran' => $data['NoTran'],
											'Tanggal' => $data['Tanggal'],
											'NoLab' => $data['NoLab'],
											'Regno' => $data['Regno'],
											'Medrec' => $data['MedRec'],
											'KdGroup' => $list_paket->KdGroup,
											'KDDetail' => $list_paket->KodeDetail,
											'NMDetail' => $list_paket->NamaDetail,
											'Satuan' => $list_paket->detailpemeriksaanSatuan,
											'NilaiNormal' => $data['Sex'] == 'Laki-laki' ? $list_paket->detailpemeriksaanNilaiNormalPria : $list_paket->detailpemeriksaanNilaiNormalWanita,
											'nhasila' => $data['Sex'] == 'Laki-laki' ? $list_paket->detailpemeriksaanNNAwalPria : $list_paket->detailpemeriksaanNNAwalWanita,
											'nhasilb' => $data['Sex'] == 'Laki-laki' ? $list_paket->detailpemeriksaanNNAkhirPria : $list_paket->detailpemeriksaanNNAkhirWanita,
											'keyno' => $data['NoTran'].$list_paket->KodeDetail.date('His'),
											'KdMappingHistori' => $list_paket->detailpemeriksaanKodeMappingHistori,
											'KdInput' => $list_paket->detailpemeriksaanKdInput
										);

											$save_detail_hasil_billing = $this->sv->set($post_detail_hasil_paket)->insert('DetailHasil');
											$parse['message_paket'] = 'Masuk paket';
											$input_detail_hasil++;
										
									}
								}
							}
						}
					}else{
						$parse['message'] = 'Data Udah ada Coy';
					}


				}
			} else {
				$parse['message'] = 'Poli gagal diambil, sehingga tidak dapat membuat transaksi';
			}
		}else{
			$parse['message'] = 'Tindakan di tolak';
			$parse['NoTran'] ='';
		}
		$parse['input_detail'] = $input_detail;
		$parse['input_detail_hasil'] = $input_detail_hasil;
		return $parse;
	}
}

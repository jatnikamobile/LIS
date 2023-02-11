<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilPemeriksaan_model extends MY_Model {

	protected $sv;
	function __construct(){
		parent::__construct();
        $this->sv = $this->load->database('server',true);
        $this->db = $this->load->database('default',true);
        $this->load->model("Master_lab","ml");
	}

	public function get_head_hasil_pemeriksaan($notran)
	{
		$data = $this->sv->select('head.Notran, head.Nolab, head.Regno, head.MedRec, headbilling.Tanggal as RegDate, headbilling.Jam, head.Firstname, register.KdSex, register.KdTuju, register.KdCbayar, head.Umurthn, head.Umurbln, head.Umurhari, head.Catatan, register.Sex, register.Bod, CAST(head.Tglhasil as DATE) as Tglhasil ,headbilling.JamSelesai as TglInput , head.Jamhasil, headbilling.KdDoc, headbilling.NmDoc, headbilling.KdBangsal, bangsal.NmBangsal, kelas.NMkelas, poli.NMPoli, dokter.NmDoc as dokterPemeriksa, master.Address, headbilling.Catatan, head.Analisis_dokter, headbilling.Kesan, headbilling.Saran,dokter.C_PEGAWAI')->from('HeadHasil head')
			->join('Register register', 'head.Regno = register.Regno')
			->join('MasterPS master', 'register.Medrec = master.Medrec', 'LEFT')
			->join('HeadBilLab headbilling', 'head.Notran = headbilling.NoTran')
			->join("TBLBangsal bangsal", "headbilling.KdBangsal = bangsal.KdBangsal", "LEFT")
			->join("TBLKelas kelas", "headbilling.KdKelas = kelas.KdKelas", "LEFT")
			->join("POLItpp poli", "headbilling.KdPoli = poli.KDPoli", "LEFT")
			->join("FtDokter dokter", "headbilling.KdDokter = dokter.KdDoc", "LEFT")
			->join("TblKategoriPsn kategori", "headbilling.Kategori = kategori.KdKategori", "LEFT")
			->where('head.Notran', $notran)->get()->row();
		return $data;
	}

	public function get_bangsal()
	{
		return $this->sv->select("*")
			->from('TBLBangsal')
			->order_by('NmBangsal', 'ASC')
			->get()->result();
	}

	public function get_fprofile()
	{
		return $this->sv->select("*")
			->from('fProfile')
			->get()->row();
	}

	public function get_dokter_kepala()
	{
		return $this->sv->select("*")
			->from('FtDokter')
			->where('jabatan', 'Kepala Lab')
			->get()->row();
	}

	// public function get_detail_hasil_pemeriksaan($notran)
	// {
	// 	$data = $this->sv->select("detail.NoTran, detail.Tanggal, detail.keyno, detail.NoLab, detail.KDDetail, detail.NMDetail, detail.Satuan, detail.NilaiNormal, COALESCE(detail.Hasil, '') AS Hasil, detail.nhasila, detail.nhasilb, detail.KdMappingHistori, detail.KdInput")
	// 		->from('DetailHasil detail')
	// 		->join('fPemeriksaanLab AS fp', 'fp.KDDetail=detail.KDDetail', 'LEFT')
	// 		->where('detail.NoTran', $notran)
	// 		->order_by('detail.KDDetail', 'ASC')
	// 		->get()->result();

	// 	return $data;
	// }

		public function get_detail_hasil_pemeriksaan_single($notran)
	{
		$this->load->library("VClaim");
		$head = $this->sv->select("head.NoLab ")
			->from('HeadBilLab head')->where('head.NoTran', $notran)->get()->row();
		$datas = $this->sv->select("detail.NoTran, detail.Tanggal, detail.keyno, detail.NoLab, detail.KDDetail, detail.NMDetail, detail.Satuan, detail.NilaiNormal, COALESCE(detail.Hasil, '') AS Hasil, detail.nhasila, detail.nhasilb, detail.KdMappingHistori, detail.KdInput, fp.param_lis, dp.KdMappingHistori")
			->from('DetailHasil detail')
			->join('fPemeriksaanLab AS fp', 'fp.KDDetail=detail.KDDetail', 'LEFT')
			->join('DetailPemeriksaan AS dp', 'dp.KodeDetail=detail.KDDetail', 'LEFT')
			->where('detail.NoTran', $notran)
			->order_by('detail.KDDetail', 'ASC')
			->get();
		$datalis='';
		$lis = [];
		$message='';
		// $datalis = "https://localhost"
		// $mesin = $this->unique_multidim_array($datas->result_array(),'Mesin_lab');
		$mesin = $this->sv->select("*")
					->from('Checklist_mesin')->where('notransaksi', $notran)->get()->result_array();
		 $mesin = $this->unique_multidim_array($mesin,'nm_function');

		if (!empty($head) && !empty($mesin)) {
			//$urllis = 'http://localhost:8081/api/lisdata.php?function=smartlyte&id='.$head->NoLab;
			// $mesin='xn1000';
			
				$i=0;
				foreach ($mesin as $msn) {
					$urllis = 'http://192.168.2.30:8080/api/lisdata.php?function='.$msn['nm_function'].'&id='.$head->NoLab;
					$result = $this->send_curl($urllis);
					$result = json_decode($result);
					if($result->status == 1 ){
						$datalis =$result->data;
						$lis = array_merge($datalis,$lis);
					// 	$message = 'ada';
					// }else{
					// 	$message = 'Data dari LIS belum Tersedia';
					}
				}

				 // print_r($lis); die();
			
		}

		$data=$datas->result();

		return compact("data", "lis", "message");
	}	

	public function get_detail_hasil_pemeriksaan($notran)
	{
		$this->load->library("VClaim");
		$headhasil = $this->sv->select("*")->from('HeadHasil head')->where('head.NoTran', $notran)->get()->row();
		$head = $this->sv->select("*")
			->from('HeadBilLab head')->where('head.NoTran', $notran)->get()->row();
		$datas = $this->sv->select("detail.NoTran, detail.Tanggal, detail.keyno, detail.NoLab, detail.KDDetail, detail.NMDetail, 
			detail.Satuan, detail.NilaiNormal, COALESCE(detail.Hasil, '') AS Hasil, detail.nhasila, detail.nhasilb, detail.KdMappingHistori, 
			detail.KdInput,fp.nilai_kritis, fp.param_lis,dp.Urutan,fp.NN0_1D as NN0_1D_p  ,fp.NN2_4D as NN2_4D_p  ,fp.NN5_7D as NN5_7D_p  ,fp.NN8_14D as NN8_14D_p  ,fp.NN15_30D as NN15_30D_p  ,fp.NN1_2M as NN1_2M_p  ,fp.NN3_5M as NN3_5M_p  ,fp.NN6_11M as NN6_11M_p  ,fp.NN1_3Y as NN1_3Y_p  ,fp.NN4_7Y as NN4_7Y_p  ,fp.NN8_13Y as NN8_13Y_p  , fp.NilaiNormalPria as NilaiNormalPria_p , fp.NilaiNormalWanita as NilaiNormalWanita_p, 
			dp.KodeDetail,dp.NamaDetail,dp.NNSimbol,dp.NNAwalPria,dp.NNAkhirPria,dp.NNAwalWanita,
			dp.NNAkhirWanita,
			dp.NilaiNormalPria,dp.NilaiNormalWanita,dp.Satuan,dp.KdMappingHistori,
			dp.NN0_1D, dp.NN2_4D, dp.NN5_7D, dp.NN8_14D, dp.NN15_30D, 
			dp.NN1_2M, dp.NN3_5M, dp.NN6_11M, dp.NN1_3Y, dp.NN4_7Y, dp.NN8_13Y")
			->from('DetailHasil detail')
			->join('fPemeriksaanLab AS fp', 'fp.KDDetail=detail.KDDetail', 'LEFT')
			->join('DetailPemeriksaan AS dp', 'dp.KodeDetail=detail.KDDetail', 'LEFT')
			->where('detail.NoTran', $notran)
			->order_by('fp.UrutanPrint', 'ASC')
			->order_by('detail.KdGroup', 'ASC')
			->order_by('left(detail.KDDetail,4)')
			->order_by('dp.Urutan', 'ASC')
			->get();
		$datalis='';
		$lis = [];
		$message='';
		// $mesin = $this->unique_multidim_array($datas->result_array(),'Mesin_lab');
		// $mesin = $this->sv->select("*")->from('Checklist_mesin')->where('notransaksi', $notran)->get()->result_array();
		// $mesin = $this->unique_multidim_array($mesin,'nm_function');

		// if (!empty($head) && !empty($mesin)) {
		if (!empty($head)) {
			//$urllis = 'http://localhost:8081/api/lisdata.php?function=smartlyte&id='.$head->NoLab;
			// $mesin='xn1000';
			
					// $urllis = 'http://192.168.2.30:8080/api/lisdata.php?function='.$msn['nm_function'].'&id='.$head->NoLab;
					$urllis = 'http://192.168.2.30:8080/api/lis.php?alat=all&id='.$head->NoLab;
					// $result = $this->send_curl($urllis);
					// $result = json_decode($result);
					$result = (object) array('status' => 0);
					if($result->status == 1 ){
						$datalis =$result->data;
						$lis = $datalis;
						// $lis = array_merge($datalis,$lis);
					// 	$message = 'ada';
					// }else{
					// 	$message = 'Data dari LIS belum Tersedia';
					}

				 // print_r($lis); die();
			
		}

		$data=$datas->result();

		return compact("data", "lis", "headhasil", "message");
	}	

	public function get_detail_hasil_pemeriksaan_edt($notran)
	{
		$this->load->library("VClaim");
		$head = $this->sv->select("head.NoLab ")
			->from('HeadBilLab head')->where('head.NoTran', $notran)->get()->row();
		$data = $this->sv->select("detail.NoTran, detail.Tanggal, detail.keyno, detail.NoLab, detail.KDDetail, detail.NMDetail, detail.Satuan, detail.NilaiNormal, COALESCE(detail.Hasil, '') AS Hasil, detail.nhasila, detail.nhasilb, detail.KdMappingHistori, detail.KdInput, fp.param_lis, fg.Mesin_lab")
			->from('DetailHasil detail')
			->join('fPemeriksaanLab AS fp', 'fp.KDDetail=detail.KDDetail', 'LEFT')
			->join('fGroupLab AS fg', 'fg.KDGroup=fp.KdGroup', 'LEFT')
			->where('detail.NoTran', $notran)
			->order_by('detail.KDDetail', 'ASC')
			->get()->result_array();
		$datalis='';
		// $datalis = "https://localhost"
		
		// $mesin = $this->unique_multidim_array($data,'Mesin_lab');


		if (!empty($head)) {
			//$urllis = 'http://localhost:8081/api/lisdata.php?function=smartlyte&id='.$head->NoLab;
			$mesin='xn1000';
				$urllis = 'http://192.168.2.30:8080/api/lisdata.php?function='.$mesin.'&id='.$head->NoLab;
				$resp = $this->send_curl($urllis);

			$datalis =json_decode($lis);
		}



		

		return compact("data", "datalis");
	}

	private function unique_multidim_array($array, $key) {
	    $temp_array = array();
	    $i = 0;
	    $key_array = array();
	   
	    foreach($array as $val) {
	        if (!in_array($val[$key], $key_array)) {
	            $key_array[$i] = $val[$key];
	            if ($val[$key] != '') {
		            $temp_array[$i] = $val;	            	
	            }
	        }
	        $i++;
	    }
	    return $temp_array;
	}

	private static function create_curl_header() {
		// ESNAWAN
		$cons_id = '30982';
		$secret_key = '0vQ160D794';
		// HARDJO
		// $cons_id = '15486';
		// $secret_key = 'jppGgH22Eg2fJTg';

		date_default_timezone_set('UTC');
		$timestamp = time();
		$encodedSignature = base64_encode(hash_hmac('sha256', $cons_id.'&'.$timestamp, $secret_key, TRUE));

		$headers = [
			'X-cons-id: '.$cons_id,
			'X-timestamp: '.$timestamp,
			'X-signature: '.$encodedSignature,
		];

		return $headers;
	}

	private static function send_curl($url, $method = 'GET', $data = NULL) {

		$headers = self::create_curl_header();
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		if($method != 'GET')
		{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			$headers[] =  'Content-Type: Application/x-www-form-urlencoded';
		}
		else
		{
			$headers[] =  'Content-Type: application/json; charset=UTF-8';
		}
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = curl_exec($ch);
		curl_close($ch);

		return $data;
	}

	public function get_group($kdtransaksi)
	{
		$result = [];
		$data = $this->sv->select('KDGroup, NmGroup')->order_by('KDGroup', 'ASC')->get('fGroupLab')->result();
		foreach ($data as $group) {
			$result[] = $this->get_detail_hasil_by_group($group->KDGroup, $kdtransaksi);
		}
		return $result;
	}

	public function get_detail_hasil_by_group($kdgroup = '', $notran)
	{
		$filter = [];
		$data = $this->sv->select('detail.NoTran, detail.KdGroup, detail.Tanggal, detail.keyno, detail.NoLab, detail.KDDetail, detail.NMDetail, detail.Satuan, detail.NilaiNormal, detail.Hasil')->from('DetailHasil detail')
			->where('detail.NoTran', $notran)->get()->result();
		if (!empty($data)) {
			foreach ($data as $l) {
				$kdgroup = substr($l->KdGroup, 0, 2);
				$filter[] = $l;
			}
		}
		$parse = array(
			'kdgroup' => $kdgroup,
			'data' => $data,
			'filter' => $filter
		);
		return $parse;
	}

	public function update_hasil($data)
	{
		
		// var_dump($data);die(); 

		if ($data['tgl_hasil'] == '') {
			$tgl_hasil = date('Y-m-d H:i:s');
		}else{
			$tgl_hasil = $data['tgl_hasil'];
		}

		$this->sv->trans_start();
		foreach ($data['hasil'] as $key => $list) {

			$update_detail = array(
				'Hasil' => $list,
				'tglhasil' => $tgl_hasil,
				'jamhasil' => date('Y-m-d H:i:s')
			);
			$this->sv->where('keyno', $key)->update('DetailHasil', $update_detail);

		}
		if (!empty($data['nilainormal'])){
			foreach ($data['nilainormal'] as $key => $list) {
				
				// var_dump($list);die(); 
				
				$update_detail = array(
					'NilaiNormal' =>$list
				);
				$this->sv->where('keyno', $key)->update('DetailHasil', $update_detail);

			}
		}

		// foreach ($data['hasil'] as $key => $list) {
		// 	$update_detail = array(
		// 		'Hasil' => $list,
		// 		'tglhasil' => $tgl_hasil,
		// 		'jamhasil' => date('Y-m-d H:i:s')
		// 	);
		// 	$this->sv->where('keyno', $key)->update('DetailHasil', $update_detail);
		// }
		$update_head = array(
			'Analisis_dokter' => $data['analisis'],
			'Catatan' => $data['Kesan'],
			'Saran' => $data['Saran'],
			'UmurThn' => $data['UmurThn_input'],
			'UmurBln' => $data['UmurBln_input'],
			'UmurHari' => $data['UmurHari_input'],
			'Tglhasil' => $tgl_hasil,
			'Jamhasil' => date('Y-m-d H:i:s')
		);
		$update_billing = array(
			'Catatan' => $data['Kesan'],
			'Saran' => $data['Saran'],
			'Kesan' => $data['Kesan_1'],
			'TglHasil' => $tgl_hasil,
			'JamHasil' => date('Y-m-d H:i:s')
		);
		$post_update_hasil = $this->sv->where('NoTran', $data['NoTran'])->update('HeadHasil', $update_head);
		$post_update_billing = $this->sv->where('NoTran', $data['NoTran'])->update('HeadBilLab', $update_billing);
		$parse = array(
			'message' => 'Berhasil input hasil',
			'update' => $post_update_hasil,
			'update_billing' => $post_update_billing
		);

		$this->sv->trans_complete();

		return $parse;
	}

	public function updateFlagHasil($NoTran, $flag){
		$update_head = array(
			'Publish' => $flag,
			'publish_datetime' => date('Y-m-d H:i:s')
		);
		$update = $this->sv->where('NoTran', $NoTran)->update('HeadHasil', $update_head);
		return $update;
	}

	public function get_list_hasil_pemeriksaan_page($filter_options)
	{
		$this->db_interface =& $this->sv;

		extract($filter_options);

		$sql1 = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=h.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') != ''";
		$sql2 = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=h.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') = ''";

		$select = [
			'h.*',
			'hb.TglHasil as hasilbil',
			'hb.TotalBiaya',
			'hb.Tanggal',
			'bsl.NmBangsal',
			'pol.NMPoli',
			'kls.NMKelas',
			'kat.NmKategori',
			'pas.Address',
			'reg.Catatan AS CatatanRegistrasi',
			"CASE WHEN EXISTS($sql1) THEN 1 ELSE 0 END AS HasFilledIn",
			"CASE WHEN EXISTS($sql2) THEN 1 ELSE 0 END AS HasNotFilled",
		];

		$from = [
			'HeadHasil AS h',
			'LEFT JOIN Register AS reg ON h.Regno = reg.Regno',
			'LEFT JOIN MasterPS AS pas ON h.MedRec = pas.MedRec',
			'LEFT JOIN HeadBilLab AS hb ON hb.NoTran = h.Notran',
			'LEFT JOIN TBLBangsal AS bsl ON hb.KdBangsal = bsl.KdBangsal',
			'LEFT JOIN TBLKelas AS kls ON hb.KdKelas = kls.KdKelas',
			'LEFT JOIN POLItpp AS pol ON hb.KdPoli = pol.KDPoli',
			'LEFT JOIN TblKategoriPsn AS kat ON hb.Kategori = kat.KdKategori',
		];

		$where = $this->db->compile_binds('CAST(Tanggal AS DATE) BETWEEN ? AND ?', [$from_date->format('Y-m-d'), $to_date->format('Y-m-d')]);

		// Filter belum diisi
		if($status_hasil == 1)
		{
			$where .= ' AND HasFilledIn = 0 AND HasNotFilled = 1';
		}
		// Filter belum lengkap
		elseif($status_hasil == 2)
		{
			$where .= ' AND HasFilledIn = 1 AND HasNotFilled = 1';
		}
		// Filter sudah lengkap
		elseif($status_hasil == 3)
		{
			$where .= ' AND HasFilledIn = 1 AND HasNotFilled = 0';
		}

		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where .= " AND (MedRec $builded_term
				OR NMPoli $builded_term
				OR NmBangsal $builded_term
				OR Regno $builded_term
				OR Firstname $builded_term
				OR NoLab $builded_term
			)";
		}elseif (!empty($ruangan)){
			$builded_term = "LIKE '%".$this->db->escape_like_str($ruangan)."%' ESCAPE '!'";
			$where .= " AND (MedRec $builded_term
				OR NMPoli $builded_term
				OR NmBangsal $builded_term
				OR Regno $builded_term
				OR Firstname $builded_term
				OR NoLab $builded_term
			)";
		}

		return $this->raw_query_pagination($select, $from, $where, 'NoTran ASC');
	}


	public function get_list_hasil_pemeriksaan_page2($filter_options)
	{
		$this->db_interface =& $this->sv;

		extract($filter_options);

		$where ='';

		if($status_hasil == 1)
		{
			$where = ' AND HasFilledIn = 0 AND HasNotFilled = 1';
		}
		// Filter belum lengkap
		elseif($status_hasil == 2)
		{
			$where = ' AND HasFilledIn = 1 AND HasNotFilled = 1';
		}
		// Filter sudah lengkap
		elseif($status_hasil == 3)
		{
			$where = ' AND HasFilledIn = 1 AND HasNotFilled = 0';
		}

		if(!empty($ruangan))
		{
			$sql = 'SELECT * from Hasil_micro
			where (KDPoli != ?  OR catt_bill = ? ) '.$where.' AND SUBSTRING(Notran, 1, 4) != ? AND NmBangsal = ? and CAST(Tanggal AS DATE) BETWEEN ? and ? ';
			$result = $this->sv->query($sql, array(38,"LAB UMUM RANAP","LAB",$ruangan, $from_date, $to_date))->result();
		}else {
			$sql = 'SELECT * from Hasil_micro
				where (KDPoli != ? or KDPoli is null OR catt_bill = ?  ) '.$where.' AND SUBSTRING(Notran, 1, 4) != ? and CAST(Tanggal AS DATE) BETWEEN ? and ? ';			
			$result = $this->sv->query($sql, array(38,"LAB UMUM RANAP", "LAB", $from_date, $to_date))->result();
		}

		

		return $result;
	}

	public function get_list_histori_pasien($filter_options)
	{
		$this->db_interface =& $this->sv;

		extract($filter_options);

		$where ='';

		if(!empty($medrec))
		{
			$where = "and HeadHasil.Medrec = '".$medrec."'";
		}else if(!empty($nama)){
			$where = "and HeadHasil.Firstname like '%".$nama."%' ";
		}else{
			$where = "and HeadHasil.Firstname = '-MEDIANTARA-'";
		}
		$sql = 'SELECT HeadHasil.*, c.NmKategori, p.NMPoli, b.NmBangsal, k.NMKelas  
				from HeadHasil join HeadBilLab  on HeadHasil.Notran = HeadBilLab.NoTran left join TBLBangsal b on HeadBilLab.KdBangsal = b.KdBangsal left join POLItpp p on p.KDPoli = HeadBilLab.KdPoli left join TBLKelas k on k.KDKelas = HeadBilLab.KdKelas left join TblKategoriPsn c on HeadBilLab.Kategori = c.KdKategori
				where HeadHasil.Notran is not null and HeadBilLab.KdPoli != 38 '.$where;			
		$result = $this->sv->query($sql)->result();

		return $result;
	}


	public function get_list_hasil_pemeriksaan($filter_options = [])
	{
		$this->sv
			->select([
				'head.*',
				'headbilling.TglHasil as hasilbil',
				'headbilling.TotalBiaya',
				'bangsal.NmBangsal',
				'poli.NMPoli',
				'kelas.NMKelas',
				'kategori.NmKategori',
				'mps.Address',
				'r.Catatan AS CatatanRegistrasi',
			])
			->select('ROW_NUMBER() OVER (ORDER BY head.NoTran ASC) AS row_number', FALSE);

		$sql = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=head.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') = ''";

		$this->sv->select("CASE WHEN EXISTS($sql) THEN 1 ELSE 0 END AS BelumLengkap");

		$data = $this->generic_pagination(25, $filter_options);

		return $data;
	}

	protected function get_list_hasil_pemeriksaan_query_scope($term, $filter_options)
	{
		extract($filter_options);

		$this->sv
			->from("HeadHasil AS head")
			->join("Register AS r", "head.Regno = r.Regno", "LEFT")
			->join("MasterPS AS mps", "head.MedRec = mps.MedRec", "LEFT")
			->join("HeadBilLab AS headbilling", "headbilling.NoTran = head.Notran", "LEFT")
			->join("TBLBangsal AS bangsal", "headbilling.KdBangsal = bangsal.KdBangsal", "LEFT")
			->join("TBLKelas AS kelas", "headbilling.KdKelas = kelas.KdKelas", "LEFT")
			->join("POLItpp AS poli", "headbilling.KdPoli = poli.KDPoli", "LEFT")
			->join("TblKategoriPsn AS kategori", "headbilling.Kategori = kategori.KdKategori", "LEFT")
			->where("headbilling.Tanggal >=", $from_date.' 00:00:00')
			->where("headbilling.Tanggal <=", $to_date.' 23:59:59');

		// Filter belum diprint
		if($status_print == 1)
		{
			$this->sv->where('COALESCE(head.PrintCount, 0) = 0', NULL, FALSE);
		}
		// Filter sudah diprint
		elseif($status_print == 2)
		{
			$this->sv->where('COALESCE(head.PrintCount, 0) != 0', NULL, FALSE);
		}

		// Filter belum diisi
		if($filter_type == 1)
		{
			$sql = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=head.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') != ''";
			$this->sv->where("NOT EXISTS($sql)", NULL, FALSE);
		}
		// Filter belum lengkap
		elseif($filter_type == 2)
		{
			$sql1 = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=head.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') != ''";
			$sql2 = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=head.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') = ''";
			$this->sv->where("EXISTS($sql1) AND EXISTS($sql2)", NULL, FALSE);
		}
		// Filter sudah lengkap
		elseif($filter_type == 3)
		{
			$sql = "SELECT * FROM DetailHasil AS dh WHERE dh.NoTran=head.NoTran AND dh.KdInput != 4 AND COALESCE(CONVERT(VARCHAR, dh.Hasil), '') = ''";
			$this->sv->where("NOT EXISTS($sql)", NULL, FALSE);
		}

		if(!empty($term))
		{
			$this->sv->group_start()
				->or_like('head.MedRec', $term)
				->or_like('poli.NMPoli', $term)
				->or_like('bangsal.NmBangsal', $term)
				->or_like('head.Regno', $term)
				->or_like('head.Firstname', $term)
				->or_like('head.NoLab', $term)
				->group_end();
		}
	}

	public function count_pemeriksaan_hasil($date1 = '', $date2 = '', $medrec = '')
	{
		$data = $this->sv->select("head.*, headbilling.TglHasil as hasilbil, headbilling.TotalBiaya, bangsal.NmBangsal, poli.NMPoli, kelas.NMKelas, kategori.NmKategori")->from("HeadHasil head")
		->join("HeadBilLab headbilling", "headbilling.NoTran = head.Notran", "LEFT")
		->join("TBLBangsal bangsal", "headbilling.KdBangsal = bangsal.KdBangsal", "LEFT")
		->join("TBLKelas kelas", "headbilling.KdKelas = kelas.KdKelas", "LEFT")
		->join("POLItpp poli", "headbilling.KdPoli = poli.KDPoli", "LEFT")
		->join("TblKategoriPsn kategori", "headbilling.Kategori = kategori.KdKategori", "LEFT")
		->where("headbilling.Tanggal >=", $date1.' 00:00:00')
		->where("headbilling.Tanggal <=", $date2.' 23:59:59')
		->like("head.Medrec", $medrec)->get()->num_rows();

		return $data;
	}

	public function search_group_print($notran, $custom_detail = NULL)
	{
		$result = [];
		$this->sv->select('detail.KdGroup, g.NmGroup')
			->from('DetailHasil detail')
			->join('fGroupLab g', 'substring(detail.KdGroup, 1, 2) = g.KDGroup', 'LEFT')
			->group_by('detail.KdGroup')->group_by('g.NmGroup')->group_by('g.id')->order_by('g.id ASC')
			->where('detail.NoTran', $notran);

		if(!empty($custom_detail))
		{
			$this->sv->where_in('detail.KDDetail + \'#\' + CONVERT(VARCHAR, detail.Tanggal, 120)', $custom_detail);
		}

		$data = $this->sv->get()->result();

		foreach ($data as $d) {
			$result[] = $this->search_detail_print($d->KdGroup, $d->NmGroup, $notran, $custom_detail);
		}
		return $result;
	}

	public function search_detail_print($kdgroup, $nmgroup, $notran, $custom_detail = NULL)
	{
		$this->sv->select([
			'detail.NoTran',
			'detail.Tanggal',
			'detail.keyno',
			'detail.NoLab',
			'detail.KDDetail',
			'detail.NMDetail',
			'detail.Satuan as fixSatuan',
			'detail.NilaiNormal',
			'detail.Hasil',
			'detail.nhasila',
			'detail.nhasilb',
			'detail.KdInput','pl.NoPrint'
		])
		->from('DetailHasil detail')
		->join('fPemeriksaanLab AS pl', 'detail.KDDetail=pl.KDDetail', 'LEFT')
		->join('DetailPemeriksaan AS dp', 'dp.KodeDetail=detail.KDDetail', 'LEFT')
		->where('detail.NoTran', $notran)
		->where('detail.KdGroup', $kdgroup)
		->order_by('pl.UrutanPrint', 'ASC')
		->order_by('detail.KdGroup', 'ASC')
		->order_by('left(detail.KDDetail,4)')
		->order_by('dp.Urutan', 'ASC');

		if(!empty($custom_detail))
		{
			$this->sv->where_in('detail.KDDetail + \'#\' + CONVERT(VARCHAR, detail.Tanggal, 120)', $custom_detail);
		}

		$detail = $this->sv->get()->result();

		$parse = array(
			'kdgroup' => $kdgroup,
			'nmgroup' => $nmgroup,
			'detail' => $detail
		);
		return $parse;
	}

	public function search_pemeriksaan($kdpemeriksaan = '')
	{
		if (strlen($kdpemeriksaan) > 5) {
			$pemeriksaan = $this->sv->select('*')->from('DetailPemeriksaan')->where('KodeDetail', $kdpemeriksaan)->get()->row();
			// if (empty($pemeriksaan)) {
			// 	$pemeriksaan = $this->sv->select('*')->from('fPemeriksaanLab')->where('KDDetail', $kdpemeriksaan)->get()->row();
			// }
		} else {
			$pemeriksaan = $this->sv->select('*')->from('fPemeriksaanLab')->where('KDDetail', $kdpemeriksaan)->get()->row();
			// if (empty($pemeriksaan)) {
			// 	$pemeriksaan = $this->sv->select('*')->from('DetailPemeriksaan')->where('KodeDetail', $kdpemeriksaan)->get()->row();
			// }
		}
		return $pemeriksaan;
	}

	public function histori_pemeriksaan($medrec, $nm_pemeriksaan)
	{
		$datenow = date("Y-m-d");
		$sixmonth = date("Y-m-d", strtotime("-6 months"));
		$data = $this->sv->select('detail.Medrec, detail.NoTran,detail.NoLab, detail.Tanggal, detail.tglhasil, detail.jamhasil, detail.keyno, detail.NMDetail, detail.Satuan, detail.NilaiNormal, detail.Hasil')->from('DetailHasil detail')
		->where('detail.Medrec', $medrec)
		->where('detail.NMDetail', $nm_pemeriksaan)
		->where("CAST(detail.Tanggal AS DATE) >=", $sixmonth)
		->where("CAST(detail.Tanggal AS DATE) <=", $datenow)
		->order_by("CAST(detail.Tanggal AS DATE)")
		->order_by('detail.NoTran')
		->get()->result();

		return $data;
	}

	public function api_histori_pemeriksaan_pasien($medrec, $kdmappinghistori)
	{
		$datenow = date("Y-m-d", strtotime("-1 days"));
		$sixmonth = date("Y-m-d", strtotime("-6 months"));
		$histori = $this->db->select('pemeriksaan.id_pem, pemeriksaan.nm_pem, pemeriksaan.satuan, pemeriksaan.nilai_rujukan, labhasil.tglmsk, labhasil.hasil, labhasil.norm')->from('lab_hasilpemeriksaan labhasil')
		->join('lab_pemeriksaan pemeriksaan', 'labhasil.id_pem = pemeriksaan.id_pem')
		->where('labhasil.norm', $medrec)
		->where('labhasil.id_pem', $kdmappinghistori)
		->where("labhasil.tglmsk <=", $datenow)
		->where("labhasil.tglmsk >=", $sixmonth)
		->get()->result();

		return $histori;
	}

	public function increase_print_count($notransaksi)
	{
		$sql = "UPDATE HeadHasil SET PrintCount = COALESCE(PrintCount + 1, 1) WHERE NoTran=?;";
		return $this->sv->query($sql, [$notransaksi]);
	}

	public function create_pemeriksaan_baru_hasil($data)
	{
		$input_detail = 0;
		$input_detail_hasil = 0;
		$tarif_satuan = $this->sv->select('tarif.KDTarif, tarif.Sarana, tarif.Pelayanan, tarif.Tarif, tarif.KDDetail, pemeriksaan.KdGroup, grouplab.NmGroup, pemeriksaan.NMDetail, pemeriksaan.NilaiNormalPria, pemeriksaan.NilaiNormalWanita, pemeriksaan.Satuan, detailpemeriksaan.KodeDetail, detailpemeriksaan.NamaDetail, detailpemeriksaan.NilaiNormalPria as detailpemeriksaanNilaiNormalPria, detailpemeriksaan.NilaiNormalWanita as detailpemeriksaanNilaiNormalWanita, detailpemeriksaan.NN0_1D,detailpemeriksaan.NN2_4D,detailpemeriksaan.NN5_7D,detailpemeriksaan.NN8_14D,detailpemeriksaan.NN15_30D,detailpemeriksaan.NN1_2M,detailpemeriksaan.NN3_5M,detailpemeriksaan.NN6_11M,detailpemeriksaan.NN1_3Y,detailpemeriksaan.NN4_7Y,detailpemeriksaan.NN8_13Y, detailpemeriksaan.Satuan as detailpemeriksaanSatuan')
			->from('fTarifLaboratorium tarif')
			->join('fPemeriksaanLab pemeriksaan', 'tarif.KDDetail = pemeriksaan.KDDetail')
			->join('DetailPemeriksaan detailpemeriksaan', 'tarif.KDDetail = detailpemeriksaan.KDDetail', 'LEFT')
			->join('fGroupLab grouplab', 'pemeriksaan.KdGroup = grouplab.KDGroup')
			->where('pemeriksaan.KdMapping', $data['kdmapping'])->limit(1)->get()->row();

		$parse['alur'] = '1';
		// var_dump($tarif_satuan);die();
		$pasien = $this->sv->select('*')->from('Register')->where('Regno', $data['Regno'])->get()->row();
		$dokter = $this->sv->select('*')->from('FtDokter')->where('KdDoc', $data['KdPengirim'])->get()->row();

		$post_detail_billing = array(
			'NoTran' => $data['notran'],
			'Tanggal' => date('Y-m-d'),
			'Regno' => $data['regno'],
			'MedRec' => $pasien->Medrec,
			'KdPemeriksaan' => $tarif_satuan->KDDetail,
			'KdTarif' => $tarif_satuan->KDTarif,
			'NmTarif' => $tarif_satuan->NMDetail,
			'Sarana' => $tarif_satuan->Sarana,
			'Pelayanan' => $tarif_satuan->Pelayanan,
			'JumlahBiaya' => $tarif_satuan->Tarif,
			'nCover' => '0',
			'Shift' => '1',
			'ValidUser' => $this->session->userdata('username').' '.date('d/m/Y H:i:s'),
			'KdDokter' => ''
		);

		if ($pasien->UmurThn >='14') {
			if ($pasien->KdSex == 'L') {
				$nilainormal = $tarif_satuan->NilaiNormalPria;
			}else{
				$nilainormal = $tarif_satuan->NilaiNormalWanita;
			}
		}elseif($pasien->UmurThn < '14' && $pasien->UmurThn >= '8' ){
			$nilainormal = $tarif_satuan->NN8_13Y;
		}elseif($pasien->UmurThn <= '7' && $pasien->UmurThn >= '4' ){
			$nilainormal = $tarif_satuan->NN4_7Y;
		}elseif($pasien->UmurThn <= '3' && $pasien->UmurThn >= '1' ){
			$nilainormal = $tarif_satuan->NN1_3Y;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln >= '6' ){
			$nilainormal = $tarif_satuan->NN6_11M;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln <= '5' && $pasien->UmurBln >= '3' ){
			$nilainormal = $tarif_satuan->NN3_5M;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln <= '2' && $pasien->UmurBln >= '1' ){
			$nilainormal = $tarif_satuan->NN1_2M;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln == '0' && $pasien->UmurHari >= '15' &&  $pasien->UmurHari <= '30' ){
			$nilainormal = $tarif_satuan->NN15_30D;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln == '0' && $pasien->UmurHari >= '8' && $pasien->UmurHari <= '14' ){
			$nilainormal = $tarif_satuan->NN8_14D;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln == '0' && $pasien->UmurHari >= '5' && $pasien->UmurHari <= '7' ){
			$nilainormal = $tarif_satuan->NN5_7D;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln == '0' && $pasien->UmurHari >= '2' && $pasien->UmurHari <= '4' ){
			$nilainormal = $tarif_satuan->NN2_4D;
		}elseif($pasien->UmurThn == '0' && $pasien->UmurBln == '0' && $pasien->UmurHari <= '1' ){
			$nilainormal = $tarif_satuan->NN0_1D;
		}else{
			$nilainormal=$tarif_satuan->NilaiNormalPria;
		}
		
		$post_detail_hasil = array(
			'NoTran' => $data['notran'],
			'Tanggal' => date('Y-m-d H:i:s'),
			'NoLab' => $data['kdlab'],
			'Regno' => $data['regno'],
			'Medrec' => $pasien->Medrec,
			'KdGroup' => $tarif_satuan->KDDetail,
			'KDDetail' => $tarif_satuan->KDDetail,
			'NMDetail' => $tarif_satuan->NMDetail,
			'Satuan' => $tarif_satuan->Satuan,
			'NilaiNormal' => $nilainormal,
			'keyno' => $data['notran'].$tarif_satuan->KDDetail.'0000'
		);
		$parse['alur2'] = '2';
		// $cek_detail_billing = $this->sv->select('*')->from('DetailBilLab')->where('Regno', $data['Regno'])->where('KdTarif', $tarif_satuan->KDTarif)->get()->row();

		$parse['alur3'] = '3';
		$save_detail_billing = $this->sv->set($post_detail_billing)->insert('DetailBilLab');
		$parse['message_detail_billing'] = 'Masuk Detial Billing';
		$save_detail_hasil = $this->sv->set($post_detail_hasil)->insert('DetailHasil');
		$parse['message_detail_hasil'] = 'Masuk Detial Hasil';
		$input_detail++;

		if ($save_detail_billing) {
			$parse['alur4'] = '4';
			// Paket Lab
			$tarif_paket = $this->sv->select('tarif.KDTarif, tarif.Sarana, tarif.Pelayanan, tarif.Tarif, tarif.KDDetail, pemeriksaan.KdGroup, grouplab.NmGroup, pemeriksaan.NMDetail, pemeriksaan.NilaiNormalPria, pemeriksaan.NilaiNormalWanita, pemeriksaan.Satuan, detailpemeriksaan.KodeDetail, detailpemeriksaan.NamaDetail, detailpemeriksaan.NilaiNormalPria as detailpemeriksaanNilaiNormalPria, detailpemeriksaan.NilaiNormalWanita as detailpemeriksaanNilaiNormalWanita, detailpemeriksaan.Satuan as detailpemeriksaanSatuan')
				->from('fTarifLaboratorium tarif')
				->join('fPemeriksaanLab pemeriksaan', 'tarif.KDDetail = pemeriksaan.KDDetail')
				->join('DetailPemeriksaan detailpemeriksaan', 'tarif.KDDetail = detailpemeriksaan.KDDetail', 'LEFT')
				->join('fGroupLab grouplab', 'pemeriksaan.KdGroup = grouplab.KDGroup')
				->where('tarif.KDTarif', $tarif_satuan->KDTarif)->get()->result();
			foreach ($tarif_paket as $key => $list_paket) {
				if ($list_paket->NamaDetail != '') {
					$post_detail_hasil_paket = array(
						'NoTran' => $data['notran'],
						'Tanggal' => date('Y-m-d H:i:s'),
						'NoLab' => $data['kdlab'],
						'Regno' => $data['regno'],
						'Medrec' => $pasien->Medrec,
						'KdGroup' => $list_paket->KdGroup,
						'KDDetail' => $list_paket->KodeDetail,
						'NMDetail' => $list_paket->NamaDetail,
						'Satuan' => $list_paket->detailpemeriksaanSatuan,
						'NilaiNormal' => $nilainormal,
						'keyno' => $data['notran'].$list_paket->KodeDetail.'0000'
					);
					$save_detail_hasil_billing = $this->sv->set($post_detail_hasil_paket)->insert('DetailHasil');
					$parse['message_paket'] = 'Masuk paket';
					$input_detail_hasil++;
					$parse['message'] = 'Data berhasil masuk';
				}
			}
		}

		return $parse;
	}

	public function generic_pagination($per_page = NULL, ...$params)
	{
		[$one, $caller] = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

		if(!method_exists($this, $method = $caller['function'].'_query_scope'))
		{
			throw new Exception("Missing $method method in ".$caller['class'].' class');
		}

		extract($this->input->get(['term', 'page']));

		$page = $page ?: 1;

		$this->$method($term, ...$params);

		if(is_null($per_page)) $per_page = 25;

		$from_row = ($page - 1) * $per_page + 1;
		$to_row = $from_row + $per_page;

		$raw_query  = "WITH __result__ AS (".$this->sv->get_compiled_select().") ";
		$raw_query .= "SELECT * FROM __result__ WHERE row_number BETWEEN ? AND ?;";

		$data = $this->sv->query($raw_query, [$from_row, $to_row])->result();
		$next_page = count($data) === (1 + $per_page) ? ($page + 1) : FALSE;
		$previous_page = $page > 1 ? ($page - 1) : FALSE;

		if($next_page !== FALSE) array_pop($data);

		$this->sv->select('COUNT(0) AS count');
		$this->$method($term, ...$params);

		$count = $this->sv->get()->row('count');

		$current_page = $page;

		$limit = 10;

		$first_page = 1;
		$last_page = ceil($count / $per_page);

		$paging = [ $page ];

		$limit = $limit > $last_page ? $last_page : $limit;

		for ($i = 1; $i <= $limit && $i <= $count; $i++)
		{
			if(count($paging) < $limit && ($prev = $page - $i) >= $first_page)
			{
				array_unshift($paging, $prev);
			}

			if(count($paging) < $limit && ($next = $page + $i) <= $last_page)
			{
				array_push($paging, $next);
			}
		}

		return (Object) compact(
			'data', 'next_page', 'previous_page', 'count', 'current_page', 'paging', 'first_page', 'last_page'
		);
	}
}

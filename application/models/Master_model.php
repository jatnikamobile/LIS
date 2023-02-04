<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {
	
	protected $sv;
	function __construct(){
		parent::__construct();
		$this->sv = $this->load->database('server',true);
	}

	public function create_notran($prefix='',$serial='')
	{
		$notran = "";
		$prefix = $prefix != "" ? $prefix : '';
		$serial = $serial != "" ? date("my",strtotime($serial)) : date("my");
		$index = "00000";
		$notran = $prefix.$serial.$index;
		$lastIndex = $this->sv->from("NoTransaksi")->where("NTCode", $prefix.$serial)->get()->row();
		if(!empty($lastIndex)){
			$max_index = $lastIndex->Nomor + 1;
			$this->sv->where("NTCode", $prefix.$serial)->update("NoTransaksi",["Nomor"=>$max_index]);
			$new_index = substr($index,(strlen($max_index)-strlen($index)),strlen($index)).$max_index;
			// if(strlen($index) == 1){
			// 	$index = "0000".$index;
			// }elseif(strlen($index) == 2){
			// 	$index = "000".$index;
			// }elseif(strlen($index) == 3){
			// 	$index = "00".$index;
			// }elseif(strlen($index) == 4){
			// 	$index = "0".$index;
			// }
			$notran = $prefix.$serial.$new_index;
		}else{
			$new_index = "00001";
			$notran = $prefix.$serial.$new_index;
			$this->sv->insert("NoTransaksi",["NTCode"=>$prefix.$serial,"Nomor"=>1]);
		}
		return $notran;
	}

	public function get_sex($id='')
	{
		if ($id!='') {
			$this->sv->where('KdSex',$id);
		}
		$jk = $this->sv->get('TBLSex');
		return $jk->result();
	}

	public function get_stat_kawin($id='')
	{
		if ($id!='') {
			$this->sv->where('KdKawin',$id);
		}
		$stat = $this->sv->get('TBLPerkawinan');
		return $stat->result();
	}

	public function get_kelurahan($id='')
	{
		if ($id!='') {
			$this->sv->where('KdKelurahan', $id);
		}
		$stat = $this->sv->get('TBLKelurahan');
		return $stat->result();
	}

	public function get_kecamatan($id='')
	{
		if ($id!='') {
			$this->sv->where('KdKecamatan', $id);
		}
		$stat = $this->sv->get('TBLKecamatan');
		return $stat->result();
	}

	public function get_kabupaten($id='')
	{
		if ($id!='') {
			$this->sv->where('KdKabupaten', $id);
		}
		$stat = $this->sv->get('TBLKabupaten');
		return $stat->result();
	}

	public function get_provinsi($id='')
	{
		if ($id!='') {
			$this->sv->where('KdPropinsi', $id);
		}
		$stat = $this->sv->get('TBLPropinsi');
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

	public function get_suku($id='')
	{
		if ($id!='') {
			$this->sv->where('KdSuku', $id);
		}
		$stat = $this->sv->get('TBLSuku');
		return $stat->result();
	}

	public function get_agama($id='')
	{
		if ($id!='') {
			$this->sv->where('KdAgama', $id);
		}
		$stat = $this->sv->get('TBLAgama');
		return $stat->result();
	}

	public function get_pendidikan($id='')
	{
		if ($id!='') {
			$this->sv->where('KdDidik', $id);
		}
		$stat = $this->sv->get('TBLPendidikan');
		return $stat->result();
	}

	public function get_poli($id='')
	{
		if ($id!='') {
			$this->sv->where('KDPoli', $id);
		}
		$stat = $this->sv->order_by('NMPoli','ASC')->get('POLItpp');
		return $stat->result();
	}

	public function get_poli_bpjs($kdbpjs = '')
	{
		$cek = $this->sv->where('KdBPJS', $kdbpjs)->get('POLItpp')->result();
		return $cek[0];
	}

	public function get_dokter_dpjp($kddoc = '')
	{
		$cek = $this->sv->where('KdDoc', $kddoc)->get('FtDokter')->result();
		return $cek[0];
	}

	public function get_poli_kdbpjs($kode = '')
	{
		$cek = $this->sv->where('KDPoli', $kode)->get('POLItpp')->result();
		// var_dump($cek);die();
		return $cek[0];
	}

	public function get_unit_ktg($id='')
	{
		if ($id!='') {
			$this->sv->where('KdUnit', $id);
		}
		$stat = $this->sv->get('TBLUnitKategori');
		return $stat->result();	
	}

	public function get_group_unit($id='')
	{
		if ($id!='') {
			$this->sv->where('Kategori', $id);
		}
		$stat = $this->sv->get('TBLGroupUnit');
		return $stat->result();	
	}

	public function get_dokter($id='')
	{
		if ($id!='') {
			$this->sv->where('KdDoc', $id);
		}
		$stat = $this->sv->get('FtDokter');
		return $stat->result();	
	}

	public function get_cara_bayar($id = NULL) {
		if (!empty($id)) {
			$this->sv->where('KDCbayar', $id);
		}
		$stat = $this->sv->get('TBLcarabayar');
		return $stat->result();
	}

	public function get_jenis_bayar($id = NULL) {
		if (!empty($id)) {
			$this->sv->where('KDJbayar', $id);
		}
		$stat = $this->sv->get('TBLJenisBayar');
		return $stat->result();
	}

	public function get_jenis_pelayanan($id = NULL) {
		// $this->sv->where("KdJenisPelayanan NOT IN ('05', '06')");
		if(!empty($id)) {
			$this->sv->where('KdJenisPelayanan', $id);
		}
		$stat = $this->sv->get('TBLJenisPelayanan');
		return $stat->result();
	}

	public function get_dokter_select2( $q, $poli, $limit, $offset) {
		$this->sv->select([
			'KdDoc',
			'NmDoc',
			'Kategori',
			'Spesialis',
			'Sex',
			'KdDPJP'
		]);

		$this->sv->from('FtDokter');
			if($poli != ''){
				$this->sv->where('KdPoli',$poli);
				$this->sv->group_start()
					->or_like('NmDoc', $q)
				->group_end();
			}
			else{
				$this->sv
				->or_like('NmDoc', $q);
			}
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY NmDoc) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_dokter_pengirim_select2( $q, $limit, $offset) {
		$this->sv->select([
			'KdDoc',
			'NmDoc',
			'Kategori',
			'Spesialis',
			'Sex',
			'KdDPJP'
		]);

		$this->sv->from('FtDokter');
		$this->sv->where('KdDPJP !=', NULL);
		$this->sv->group_start()
			->or_like('NmDoc', $q)
		->group_end();
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY NmDoc) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_poli_select2($q, $poli_dokter, $limit, $offset){
		
		$this->sv->select([
			'KDPoli AS id',
			'NMPoli AS text',
		]);

		$this->sv->from('POLItpp');


		if($poli_dokter != ''){
			$this->sv->where('KdPoli',$poli_dokter);
			$this->sv
			->like('NMPoli', $q);
		}
		else{
			$this->sv
			->or_like('NMPoli', $q);
		}	

		$this->sv->select("ROW_NUMBER() OVER (ORDER BY NMPoli) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE __row_num__ BETWEEN ? AND ?;";

		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}


		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_regno_pasien_select2($q, $jenis, $limit, $offset) {

		$jenis = ($jenis == '05' ? '18' : ($jenis == '06' ? '25' : ($jenis == '01' ? '01' : NULL)));

		if($jenis == '01') {

			$this->sv->select('h.Regno AS id, h.Regno AS text, h.Medrec AS MedRec, h.Firstname, CAST(h.Regdate AS DATE) AS Tanggal');
			$this->sv->from('Register AS h')->where('KdPoli','21')
				->group_start()
					->or_like('h.Regno', $q)
					->or_like('h.MedRec', $q)
					->or_like('h.Firstname', $q)
				->group_end();
		}
		elseif($jenis) {
			$this->sv->select('DISTINCT h.Regno, h.Regno AS id, h.Regno AS text, h.MedRec, h.Firstname, SUM(d.Pelayanan) AS Pelayanan, CAST(h.Tanggal AS DATE) AS Tanggal', FALSE);
			$this->sv
				->from('HeadBilIrna AS h')
				->join('DetailBilIrna AS d', 'h.NoTran=d.NoTran')
				->group_start()
					->where('h.Kategori != 1')
					->where("d.KdTarif LIKE '{$jenis}%'")
				->group_end()
				->group_start()
					->or_like('h.Regno', $q)
					->or_like('h.MedRec', $q)
					->or_like('h.Firstname', $q)
				->group_end()
				->group_by([
					'h.Regno',
					'h.MedRec',
					'h.Firstname',
					'h.Tanggal'
				]);
		}

		$this->sv->select("ROW_NUMBER() OVER (ORDER BY h.Regno) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE __row_num__ BETWEEN ? AND ?;";

		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}


		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_poli_tuju_select2($q, $limit, $offset) {
		$this->sv->select([
			'KdPoli',
			'NMPoli'
		]);

		$this->sv->from('POLItpp');
			$this->sv
				->or_like('NMPoli', $q);
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY NMPoli) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_icd10_select2( $q, $limit, $offset) {
		$this->sv->select([
			'KDICD',
			'KDDTD',
			'SUBDIAGNOSA',
			'DIAGNOSA',
		]);

		$this->sv->from('TBLICD10');
			$this->sv
				->or_like('KDICD', $q)
				->or_like('DIAGNOSA', $q);
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY KDICD) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_icd9_select2( $q, $limit, $offset) {
		$this->sv->select([
			'KDICD',
			'KDDTD',
			'Diagnosa',
		]);

		$this->sv->from('TBLicd9');
			$this->sv
				->or_like('KDICD', $q)
				->or_like('Diagnosa', $q);
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY KDICD) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_unit_select2( $q, $groupkategori, $limit, $offset) {
		$this->sv->select([
			'KdUnit',
			'NmUnit'
		]);

		$this->sv->from('TBLUnitKategori');
			if($groupkategori != ''){
				$this->sv->where('GroupKategori',$groupkategori);
				$this->sv->group_start()
					->or_like('NmUnit', $q)
				->group_end();
			}
			else{
				$this->sv
				->or_like('NmUnit', $q);
			}
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY NmUnit) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_groupunit_select2( $q, $kategori, $limit, $offset) {
		$this->sv->select([
			'Kategori',
			'GroupUnit'
		]);

		$this->sv->from('TBLGroupUnit');
			if($kategori != ''){
				$this->sv->where('Kategori',$kategori);
				$this->sv->group_start()
					->or_like('GroupUnit', $q)
				->group_end();
			}
			else{
				$this->sv
				->or_like('GroupUnit', $q);
			}
		
		$this->sv->select("ROW_NUMBER() OVER (ORDER BY GroupUnit) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";
	
		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function get_data_mesin()
	{
		$result = $this->sv->get('Mesin_lab');
		return $result->result();
	}
}

/* End of file master_model.php */
/* Location: ./application/models/master_model.php */
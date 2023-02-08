<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_lab extends CI_Model {

	protected $sv;
	function __construct(){
		parent::__construct();
		$this->sv = $this->load->database('server',true);
	}

	public function group_lab()
	{
		$stat = $this->sv->get('fGroupLab');
		return $stat->result();
	}

	public function hirarki_lab()
	{
		$stat = $this->sv->get('fGroupLab');
		$parents =  $stat->result();
		if($parents){
			foreach ($parents as $parent){
				$parent->pemeriksas = $this->sv->where('KdGroup', $parent->KDGroup)->get('fPemeriksaanLab')->result();
				if($parent->pemeriksas){
					foreach ($parent->pemeriksas as $pemeriksa){
						$pemeriksa->details = 	$this->sv->where('KDDetail', $pemeriksa->KDDetail)->get('DetailPemeriksaan')->result();
					}
				}
			}
		}
		return $parents;
	}

	public function pemeriksaan_lab($kdgroup='')
	{
		if ($kdgroup!='') {
			$this->sv->where('KdGroup', $kdgroup);
		}
		$stat = $this->sv->get('fPemeriksaanLab');
		return $stat->result();
	}

	public function pembanding_lab($kddetail='')
	{
		if ($kddetail!='') {
			$this->sv->where('KDDetail', $kddetail);
		}
		$stat = $this->sv->get('DetailPemeriksaan');
		return $stat->result();
	}

	public function lab_group_post($data)
	{
		$cek = $this->sv->order_by('CAST(KDGroup AS int)','DESC')->limit(1)->get('fGroupLab')->row();
		$cek = $cek->KDGroup+1;
		$input = $this->sv->insert('fGroupLab',['KDGroup'=> $cek, 'NmGroup'=>$data['NmGroup']]);
		if ($input) {
			$parse = array(
				'cek' => $cek,
				'insert' => $input,
				'message' => 'Berhasil ditambahkan'
			);
		} else{
			$parse = array(
				'cek' => $cek,
				'insert' => $input,
				'message' => 'Gagal ditambahkan'
			);
		}
		return $parse;
	}

	public function lab_group_update($data)
	{
		$up = $this->sv->where('KDGroup',$data['id'])->update("fGroupLab",[
            'NmGroup' => $data['NmGroup']
        ]);
        if ($up) {
			$parse = array(
				'cek' => $up,
				'message' => 'Berhasil diubah'
			);
		} else{
			$parse = array(
				'cek' => $up,
				'message' => 'Gagal diubah'
			);
		}
		return $parse;
	}

	public function pemeriksaan_post($data)
	{
		$listing = $this->sv->where('KdGroup', $data['kdgroup'])->order_by('KDDetail','DESC')->limit(1)->get('fPemeriksaanLab')->row();
		$index = "001";
		if (!empty($listing)) {
			$listing = $listing->KDDetail;
			$listing = substr($listing, strlen($data['kdgroup']));
			$listing++;
			if (strlen($listing) == 1) {
				$listing = "00".$listing;
			} elseif (strlen($listing) == 2) {
				$listing = "0".$listing;
			}
		} else{
			$listing = $index;
		}

		$input = $this->sv->insert('fPemeriksaanLab',[
			'KDDetail' => $data['kdgroup'].''.$listing,
			'KdGroup' => $data['kdgroup'],
			'NMDetail' => $data['detail'],
			'NilaiNormalPria' => $data['nilainormalpria'],
			'NNAwalPria' => $data['nnawalpria'],
			'NNAkhirPria' => $data['nnakhirpria'],
			'NilaiNormalWanita' => $data['nilainormalwanita'],
			'NNAwalWanita' => $data['nnawalwanita'],
			'NNAkhirWanita' => $data['nnakhirwanita'],
			'Satuan' => $data['satuan'],
			'nilai_kritis' => $data['nilai_kritis'],
			'KdInput' => $data['kdinput'],
			'NN0_1D' => $data['NN0_1D'],
			'NN2_4D' => $data['NN2_4D'],
			'NN5_7D' => $data['NN5_7D'],
			'NN8_14D' => $data['NN8_14D'],
			'NN15_30D' => $data['NN15_30D'],
			'NN1_2M' => $data['NN1_2M'],
			'NN3_5M' => $data['NN3_5M'],
			'NN6_11M' => $data['NN6_11M'],
			'NN1_3Y' => $data['NN1_3Y'],
			'NN4_7Y' => $data['NN4_7Y'],
			'NN8_13Y' => $data['NN8_13Y'],
			'param_lis' => $data['param_lis'],
			'KdMapping' => $data['kdmapping']
		]);
		if ($input) {
			$parse = array(
				'no' => $data['kdgroup'].''.$listing,
				'kode' => $data['kdgroup'],
				'status' => true,
				'message' => 'Berhasil menambahkan data'
			);
		} else {
			$parse = array(
				'no' => $data['kdgroup'].''.$listing,
				'kode' => $data['kdgroup'],
				'status' => false,
				'message' => 'Gagal menambahkan data'
			);
		}
		return $parse;
	}

	public function pemeriksaan_update($data)
	{
		$up = $this->sv->where('KDDetail',$data['id'])->update("fPemeriksaanLab",[
            'NMDetail' => $data['detail'],
            'Satuan' => $data['satuan'],
            'NilaiNormalPria' => $data['nilainormalpria'],
            'NilaiNormalWanita' => $data['nilainormalwanita'],
            'NNAwalPria' => $data['nnawalpria'],
			'NNAkhirPria' => $data['nnakhirpria'],
			'NNAwalWanita' => $data['nnawalwanita'],
			'NNAkhirWanita' => $data['nnakhirwanita'],
			'KdMapping' => $data['kdmapping'],
			'nilai_kritis' => $data['nilai_kritis'],
			'param_lis' => $data['param_lis'],
			'NN0_1D' => $data['NN0_1D'],
			'NN2_4D' => $data['NN2_4D'],
			'NN5_7D' => $data['NN5_7D'],
			'NN8_14D' => $data['NN8_14D'],
			'NN15_30D' => $data['NN15_30D'],
			'NN1_2M' => $data['NN1_2M'],
			'NN3_5M' => $data['NN3_5M'],
			'NN6_11M' => $data['NN6_11M'],
			'NN1_3Y' => $data['NN1_3Y'],
			'NN4_7Y' => $data['NN4_7Y'],
			'NN8_13Y' => $data['NN8_13Y'],
			'KdInput' => $data['kdinput']
        ]);
        if ($up) {
			$parse = array(
				'cek' => $up,
				'kode' => $data['kdgroup'],
				'message' => 'Berhasil diubah'
			);
		} else{
			$parse = array(
				'cek' => $up,
				'kode' => $data['kdgroup'],
				'message' => 'Gagal diubah'
			);
		}
		return $parse;
	}

	public function pembanding_post($data)
	{
		$index = "001";
		$listing = $this->sv->where('KDDetail', $data['kddetail'])->order_by('KodeDetail','DESC')->limit(1)->get('DetailPemeriksaan')->row();
		if (!empty($listing)) {
			$listing = $listing->KodeDetail;
			$listing = substr($listing, strlen($data['kddetail']));
			$listing++;
			if (strlen($listing) == 1) {
				$listing = "00".$listing;
			} elseif (strlen($listing) == 2) {
				$listing = "0".$listing;
			}
		} else{
			$listing = $index;
		}

		$input = $this->sv->insert('DetailPemeriksaan',[
			'KodeDetail' => $data['kddetail'].$listing,
			'KDDetail' => $data['kddetail'],
			'NamaDetail' => $data['detail'],
			'Satuan' => $data['satuan'],
			'NilaiNormalPria' => $data['nilainormalpria'],
			'NilaiNormalWanita' => $data['nilainormalwanita'],
			'NNAwalPria' => $data['nnawalpria'],
			'NNAkhirPria' => $data['nnakhirpria'],
			'NNAwalWanita' => $data['nnawalwanita'],
			'NNAkhirWanita' => $data['nnakhirwanita'],
			'NN0_1D' => $data['NN0_1D'],
			'NN2_4D' => $data['NN2_4D'],
			'NN5_7D' => $data['NN5_7D'],
			'NN8_14D' => $data['NN8_14D'],
			'NN15_30D' => $data['NN15_30D'],
			'NN1_2M' => $data['NN1_2M'],
			'NN3_5M' => $data['NN3_5M'],
			'NN6_11M' => $data['NN6_11M'],
			'NN1_3Y' => $data['NN1_3Y'],
			'NN4_7Y' => $data['NN4_7Y'],
			'NN8_13Y' => $data['NN8_13Y'],
			'KdInput' => $data['kdinput']
		]);
		if ($input) {
			$parse = array(
				'no' => $data['kddetail'].''.$listing,
				'kode' => $data['kddetail'],
				'status' => true,
				'message' => 'Berhasil menambahkan data'
			);
		} else {
			$parse = array(
				'no' => $data['kddetail'].''.$listing,
				'kode' => $data['kddetail'],
				'status' => false,
				'message' => 'Gagal menambahkan data'
			);
		}
		return $parse;
	}

	public function pembanding_update($data)
	{
		$up = $this->sv->where('KodeDetail',$data['id'])->update("DetailPemeriksaan",[
            'NamaDetail' => $data['nmdetail'],
            'Satuan' => $data['satuan'],
            'NilaiNormalPria' => $data['nilainormalpria'],
            'NilaiNormalWanita' => $data['nilainormalwanita'],
            'NNAwalPria' => $data['nnawalpria'],
			'NNAkhirPria' => $data['nnakhirpria'],
			'NNAwalWanita' => $data['nnawalwanita'],
			'NNAkhirWanita' => $data['nnakhirwanita'],
			'NN0_1D' => $data['NN0_1D'],
			'NN2_4D' => $data['NN2_4D'],
			'NN5_7D' => $data['NN5_7D'],
			'NN8_14D' => $data['NN8_14D'],
			'NN15_30D' => $data['NN15_30D'],
			'NN1_2M' => $data['NN1_2M'],
			'NN3_5M' => $data['NN3_5M'],
			'NN6_11M' => $data['NN6_11M'],
			'NN1_3Y' => $data['NN1_3Y'],
			'NN4_7Y' => $data['NN4_7Y'],
			'NN8_13Y' => $data['NN8_13Y'],
			'KdInput' => $data['kdinput']
        ]);
        if ($up) {
			$parse = array(
				'cek' => $up,
				'kode' => $data['id'],
				'message' => 'Berhasil diubah'
			);
		} else{
			$parse = array(
				'cek' => $up,
				'kode' => $data['id'],
				'message' => 'Gagal diubah'
			);
		}
		return $parse;
	}

	public function kelas($q, $limit, $offset)
	{
		$this->sv->select(['k.KDKelas', 'k.NMKelas', 'r.NmBangsal']);
		$this->sv->from('TBLKelas k')->join('TBLBangsal r', 'right(k.KDKelas,2) = r.KdBangsal');
		$this->sv->or_like('NMKelas', $q)
				->or_like('NmBangsal', $q);

		$this->sv->select("ROW_NUMBER() OVER (ORDER BY KDKelas) AS '__row_num__'");
		$sql  = "; WITH __result_cte__ AS (".$this->sv->get_compiled_select().")";
		$sql .= " SELECT * FROM __result_cte__ WHERE  __row_num__ BETWEEN ? AND ?;";

		$data = $this->sv->query($sql, [$offset + 1, $offset + $limit + 1])->result();

		$has_next = count($data) == (1 + $limit);
		if($has_next) {
			array_pop($data);
		}

		array_push($data, (object) array('KDKelas'=>'rj','NMKelas'=>'rawat_jalan','NmBangsal'=>'rawat_jalan') );
		array_push($data, (object) array('KDKelas'=>'MCU','NMKelas'=>'MCU','NmBangsal'=>'Medical Check Up') );
		
		return (Object) [
			'data'            => $data,
			'has_next'        => $has_next,
			'has_previous'    => $offset > 0,
			'next_offset'     => $offset + $limit,
			'previous_offset' => $offset - $limit,
		];
	}

	public function pemeriksaan_select2( $q, $limit, $offset) {
		$this->sv->select([
			'KDDetail',
			'NMDetail'
		]);

		$this->sv->from('fPemeriksaanLab');
			$this->sv
				->or_like('KDDetail', $q)
				->or_like('NMDetail', $q);

		$this->sv->select("ROW_NUMBER() OVER (ORDER BY KDDetail) AS '__row_num__'");
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
}

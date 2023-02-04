<?php

class List_order_model extends MY_Model
{
	protected $sv;

	function __construct()
	{
		parent::__construct();
		$this->sv = $this->load->database('server', TRUE);
		$this->db_interface =& $this->sv;
	}

	public function get_page($filter_options)
	{
		$this->db_interface =& $this->sv;

		extract($filter_options);

		$from = [
			'HeadBilLabTEMP AS h',
			'LEFT JOIN Register AS r ON r.Regno=h.Regno',
			'LEFT JOIN MasterPS AS ps ON r.Medrec=ps.Medrec',
			'LEFT JOIN FPPRI AS ri ON r.Regno=ri.Regno',
			'LEFT JOIN FPulang AS fp ON ri.Regno=fp.Regno',
			'LEFT JOIN POLItpp AS pol ON r.KdPoli=pol.KdPoli',
			'LEFT JOIN TBLBangsal AS bsl ON ri.KdBangsal=bsl.KdBangsal',
			'LEFT JOIN TBLKelas AS kls ON ri.KdKelas=kls.KdKelas',
			'LEFT JOIN TblKategoriPsn AS kat ON r.Kategori=kat.KdKategori',
		];

		$select = [
			'h.NoTran',
			'h.NoLab',
			'h.Tanda',
			'r.Regno',
			'r.Medrec',
			'r.Firstname',
			'h.Catatan as Catt',
			'r.Catatan',
			'r.Regdate',
			'h.Tanggal',
			'ps.Address',
			'h.TglSampel',
			'ps.Bod',
			'h.ValidUser',
			'h.Jam',
			'r.Kategori', 'kat.NmKategori',
			'r.KdPoli', 'pol.NmPoli',
			'ri.KdBangsal', 'bsl.NmBangsal',
			'ri.KdKelas', 'kls.NmKelas', 'ri.NoTTidur','ri.nokamar',
		];

		$select[] = "CASE WHEN fp.Regno IS NOT NULL THEN 1 ELSE 0 END AS SudahPulang";
		$select[] = "
			CASE
				WHEN ri.Regno IS NOT NULL THEN 'R. Inap'
				WHEN r.KdPoli='24' THEN 'IGD'
				ELSE 'R. Jalan'
			END AS Instalasi
		";

		if($tanda == 1){
			$where = 'Tanda = '.$tanda;
		}else if($tanda == 0){
			$where = 'Tanda = 0';
		}else{
			//$where = 'COALESCE(Tanda, 0) != 0';
			$where = 'NoTran is not null';
		}

		if($instalasi != 4)
		{
			$where .= $this->sv->compile_binds(' AND CAST(Tanggal AS DATE) BETWEEN ? AND ?', [
				$from_date->format('Y-m-d'),
				$to_date->format('Y-m-d')
			]);
		}

		if($instalasi == 1)
		{
			$where .= " AND Instalasi='R. Jalan'";
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

		$where .= "AND SUBSTRING ( Catt, 0, 10 ) != 'LAB MIKRO' ";

		if(!empty($term))
		{
			$builded_term = "LIKE '%".$this->db->escape_like_str($term)."%' ESCAPE '!'";
			$where .= " AND (NoTran $builded_term
				OR NoLab $builded_term
				OR Regno $builded_term
				OR Medrec $builded_term
				OR Firstname $builded_term
				OR NmPoli $builded_term
				OR NmBangsal $builded_term
				OR Address $builded_term
				OR Catatan $builded_term
			)";
		}

		return $this->raw_query_pagination($select, $from, $where, $instalasi == 4 ? 'NoTran DESC' : 'NoTran ASC');
	}

	public function hapus($no_tran)
	{
		$exists = $this->sv
			->select('1 AS exists')
			->where('COALESCE(Tanda, 0) !=', 0)
			->where('NoTran', $no_tran)
			->get('HeadBilLabTEMP')->row('exists');

		if($exists)
		{
			$this->sv->trans_start();

			$this->sv->where('NoTran', $no_tran)->delete('DetailHasil');
			$this->sv->where('NoTran', $no_tran)->delete('HeadHasil');

			$this->sv->where('NoTran', $no_tran)->delete('DetailBilLab');
			$this->sv->where('NoTran', $no_tran)->delete('HeadBilLabTEMP');

			return $this->sv->trans_complete();
		}

		return FALSE;
	}

	public function get_bangsal()
	{
		return $this->sv->select("*")
			->from('TBLBangsal')
			->order_by('NmBangsal', 'ASC')
			->get()->result();
	}

	public function get_order_lab($tgl_awal='', $tgl_akhir='', $instalasi, $tanda='')
    {
    	$date = str_replace('/', '-', $tgl_awal);
    	$date2 = str_replace('/', '-', $tgl_akhir);
    	$tgl_awal = date('Y-m-d', strtotime($date));
    	$tgl_akhir = date('Y-m-d', strtotime($date2));

    	


    	if ($instalasi == 2) {
	        $data = $this->sv->select("h.NoTran,h.NoLab, h.Validuser, h.Jam, h.TglCetakOrder, h.Tanda, r.Regno, r.Medrec, r.Firstname, r.Catatan, r.Regdate, h.Tanggal, ps.Address, ps.Bod, r.Kategori, r.KdPoli, pol.NmPoli, ri.KdBangsal,bsl.NmBangsal,ri.KdKelas,ri.nokamar, ri.Diagnosa, ri.NmDocRS, ri.NoTTidur,  kls.NmKelas, h.TglSampel, h.Pengambil_sampel")
	                         ->from("HeadBilLabTEMP h")
	                         ->join("Register AS r","r.Regno=h.Regno","LEFT")
	                         ->join("MasterPS AS ps","r.Medrec=ps.Medrec","LEFT")
	                         ->join("FPPRI AS ri","r.Regno=ri.Regno","LEFT")
	                         ->join("FPulang AS fp","ri.Regno=fp.Regno","LEFT")
	                         ->join("POLItpp AS pol","r.KdPoli=pol.KdPoli","LEFT")
	                         ->join("TBLBangsal AS bsl","ri.KdBangsal=bsl.KdBangsal","LEFT")
	                         ->join("TBLKelas AS kls","ri.KdKelas=kls.KdKelas","LEFT")
	                         ->where("CAST(h.Tanggal as DATE) >= ", $tgl_awal)
	                         ->where("CAST(h.Tanggal as DATE) <= ", $tgl_akhir)
	                         ->where("SUBSTRING ( h.Catatan, 0, 10 ) !=", "LAB MIKRO")
	                         ->where("SUBSTRING ( h.NoTran, 0, 5 ) =", "ILAB"); 
	                         	if($tanda == 0){
	                         		$data = $data->where("Tanda", $tanda);
								}elseif ($tanda == 1) {
	                         		$data = $data->where("Tanda", $tanda);
								}
	                         $data = $data->order_by("ri.KdBangsal, h.NoTran, h.Medrec")
	                         ->get()->result();
	        $i=0;
	        foreach ($data as $key ) {
	        	$data[$i]->detail = $this->get_tindakan_pasien($key->NoTran);
	        	$data[$i]->ruang = $this->sv->select("NmBangsal")
				->from('TBLBangsal')
				->where('KdBangsal', $key->KdBangsal)
				->get()->row()->NmBangsal;
	        	$i++;
	        	$updateTglCetak=array(
					'TglCetakOrder' => date('Y-m-d H:i:s')
				);
				$this->sv->where('TglCetakOrder', NULL)->where('NoTran', $key->NoTran)->update('HeadBilLabTEMP', $updateTglCetak);
	        }
	    }else{
	    	$data = $this->sv->select("h.NoTran,h.NoLab, h.Validuser, h.Jam, h.TglCetakOrder, h.Tanda, r.Regno, r.Medrec, r.Firstname, r.Catatan, r.Regdate, h.Tanggal, ps.Address, ps.Bod, r.Kategori, r.KdPoli, icd.Diagnosa, dokter. NmDoc, pol.NmPoli")
	                         ->from("HeadBilLabTEMP h")
	                         ->join("Register AS r","r.Regno=h.Regno","LEFT")
	                         ->join("MasterPS AS ps","r.Medrec=ps.Medrec","LEFT")
	                         ->join("POLItpp AS pol","r.KdPoli=pol.KdPoli","LEFT")
	                         ->join("TBLICD10 AS icd","r.KdICD=icd.KDICD","LEFT")
	                         ->join("FtDokter AS dokter","r.KdDoc=dokter.KdDoc","LEFT")
	                         ->where("CAST(h.Tanggal as DATE) >= ", $tgl_awal)
	                         ->where("CAST(h.Tanggal as DATE) <= ", $tgl_akhir)
	                         ->where("SUBSTRING ( h.Catatan, 0, 10 ) !=", "LAB MIKRO")
	                         ->where("SUBSTRING ( h.NoTran, 0, 5 ) =", "RLAB")
	                         ->order_by("r.KdPoli, h.NoTran, h.Medrec");
	                         if($tanda == 0){
	                         		$data = $data->where("Tanda", $tanda);
								}elseif ($tanda == 1) {
	                         		$data = $data->where("Tanda", $tanda);
								}
	                         $data = $data->get()->result();
	        $i=0;
	        foreach ($data as $key ) {
	        	$data[$i]->detail = $this->get_tindakan_pasien($key->NoTran);
	        	$data[$i]->poli = $this->sv->select("NmPoli")
				->from('POLItpp')
				->where('KdPoli', $key->KdPoli)
				->get()->row()->NmPoli;
	        	$i++;
	        	$updateTglCetak=array(
					'TglCetakOrder' => date('Y-m-d H:i:s')
				);
				$this->sv->where('TglCetakOrder', NULL)->where('NoTran', $key->NoTran)->update('HeadBilLabTEMP', $updateTglCetak);
	        }
	    }
        // echo "<pre>"; print_r($data); echo "</pre>";die();
        return $data;
    }
    public function get_data_order($notrans)
    {

        $head = $this->sv->select("h.NoTran,h.NoLab,h.Tanda,r.Regno,r.Medrec,r.Firstname,r.Catatan,r.Regdate,h.Tanggal,ps.Address,ps.Bod,ps.Sex, ps.Phone ,r.Kategori, r.UmurThn as usia, kat.NmKategori, r.KdPoli, pol.NmPoli,ri.KdBangsal,bsl.NmBangsal,dok.NmDoc,ri.KdKelas, kls.NmKelas, ri.Diagnosa as DiagRanap , di.DIAGNOSA as DiagRajal ")
                         ->from("HeadBilLabTEMP h")
                         ->join("Register AS r","r.Regno=h.Regno","LEFT")
                         ->join("TBLICD10 AS di","di.KDICD=r.KdICD","LEFT")
                         ->join("MasterPS AS ps","r.Medrec=ps.Medrec","LEFT")
                         ->join("FPPRI AS ri","r.Regno=ri.Regno","LEFT")
                         ->join("POLItpp AS pol","r.KdPoli=pol.KdPoli","LEFT")
                         ->join("TBLBangsal AS bsl","ri.KdBangsal=bsl.KdBangsal","LEFT")
                         ->join("TBLKelas AS kls","ri.KdKelas=kls.KdKelas","LEFT")
                         ->join("FtDokter AS dok","h.KdDoc=dok.KdDoc","LEFT")
                         ->join("TblKategoriPsn AS kat","r.Kategori=kat.KdKategori","LEFT")
                         ->where("h.NoTran", $notrans)
                         ->get()->row();
        $detail = $this->sv->select("DetailBilLab.*")
                         ->from("DetailBilLab")
                         ->where("DetailBilLab.NoTran", $notrans)
                         ->order_by('KdPemeriksaan', 'ASC')->get()->result();
       	$data = array('head' => $head, 'detail' => $detail);
 		
        return $data;
    }
    public function get_tindakan_pasien($NoTran='')
    {
        $data = $this->sv->select("DetailBilLab.*")
                         ->from("DetailBilLab")
                         ->where("DetailBilLab.NoTran", $NoTran)
                         ->order_by('KdPemeriksaan', 'ASC')->get();
        return $data->result();
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RawatJalan_model extends CI_Model {
	
	protected $sv;
	function __construct(){
		parent::__construct();
        $this->sv = $this->load->database('server',true);
        $this->load->model("Master_model","mm");
	}
    // datatable list pasien
    private function _dt_list_pasien($regdate='', $medrec='', $nama='', $regno='', $kdpoli='', $dokter='',$set='')
    {
        
        $this->column_order = array(null, "Register.Regno", "Register.Medrec", "Register.Firstname", "Register.Regdate", "Register.RegTime",
                                        "Register.KdDoc", "MasterPS.KdSex", "Register.NoPeserta", "Register.Kategori",
                                        "POLItpp.NMPoli", "Register.KdPoli", "Register.NomorUrut", "FtDokter.NmDoc", 
                                        "TblKategoriPsn.NmKategori", "Register.ValidUser");
        $this->column_search = array("Register.Regno", "Register.Medrec", "Register.Firstname", "Register.Regdate", "Register.RegTime",
                                "Register.KdDoc", "MasterPS.KdSex", "Register.NoPeserta", "Register.Kategori",
                                "POLItpp.NMPoli", "Register.KdPoli", "Register.NomorUrut", "FtDokter.NmDoc", 
                                "TblKategoriPsn.NmKategori", "Register.ValidUser");
        $this->order = array('Register.Regdate' => 'DESC', 'Register.NomorUrut' => 'ASC');

        $this->sv->select("Register.Regno, Register.Medrec, Register.Firstname, Register.Regdate, Register.RegTime,
                            Register.KdDoc, MasterPS.KdSex, Register.NoPeserta, Register.Kategori,
                            POLItpp.NMPoli, Register.KdPoli, Register.NomorUrut, FtDokter.NmDoc, 
                            TblKategoriPsn.NmKategori, Register.ValidUser")
                     ->from("Register")
                     ->join("MasterPS", "Register.Medrec = MasterPS.Medrec", "INNER")
                     ->join("POLItpp", "Register.KdPoli = POLItpp.KDPoli", "INNER")
                     ->join("FtDokter", "Register.KdDoc = FtDokter.KdDoc", "INNER")
                     ->join("TblKategoriPsn", "Register.Kategori = TblKategoriPsn.KdKategori","LEFT");
        if($set != 'riwayat'){
            if ($regdate != '') { $this->sv->where("Register.Regdate", $regdate); }
            if ($kdpoli != '') { $this->sv->where('Register.KdPoli', $kdpoli); }
            if($medrec !='' && $nama != ''){
                $this->sv->group_start()
                         ->like('Register.Medrec', $medrec)
                         ->or_like('Register.Firstname', $nama)
                         ->group_end();
            }
            elseif ($medrec != '') { $this->sv->like('Register.Medrec', $medrec); }
            elseif ($nama != '') { $this->sv->like('Register.Firstname', $nama); }
            if ($dokter != '') { $this->sv->where('Register.KdDoc', $dokter); }
            if ($regno != '') { $this->sv->where('Register.Regno', $regno); }
        }else{
            $this->sv->where('Register.Medrec', $medrec);
        }
        $this->sv->where("CAST(Register.Regdate AS DATE) <=", date('Y-m-d'));

        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->sv->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->sv->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->sv->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->sv->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->sv->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->sv->order_by(key($order), $order[key($order)]);
        }
    }

    public function list_pasien($regdate='', $medrec='', $nama='', $regno='', $kdpoli='', $dokter='',$set='')
    {
        $this->_dt_list_pasien($regdate, $medrec, $nama, $regno, $kdpoli, $dokter, $set);
        if($_POST['length'] != -1) $this->sv->limit($_POST['length'], $_POST['start']);
        $query = $this->sv->get()->result();
        return $query;
    }

    public function count_filtered_list_pasien($regdate='', $medrec='', $nama='', $regno='', $kdpoli='', $dokter='',$set='')
    {
        $this->_dt_list_pasien($regdate, $medrec, $nama, $regno, $kdpoli, $dokter,$set);
        $query = $this->sv->get();
        return $query->num_rows();
    }

    public function count_all_list_pasien($medrec='',$set='')
    {
        $this->sv->from("Register");
        if($set == 'riwayat' && $medrec != ''){
            $this->sv->where("Medrec",$medrec);
        }else{
            $this->sv->where("YEAR(Register.Regdate)", date('Y'));
        }
        return $this->sv->count_all_results();
    }

    public function get_detail_pasien($key,$set=1)
    {
        $data = $this->sv->select("Register.Regno, Register.Medrec, Register.Firstname, Register.Regdate, Register.RegTime,
                            Register.Sex, Register.KdDoc, MasterPS.Pod, MasterPS.Bod, MasterPS.KdSex, Register.UmurThn,
                            Register.NoPeserta, Register.Kategori, Register.GroupUnit, POLItpp.NMPoli, Register.KdPoli,
                            Register.NomorUrut, FtDokter.NmDoc, TblKategoriPsn.NmKategori, Register.ValidUser,
                            DetailIrjUtama.KdICD, DetailIrjUtama.Diagnosa")
                     ->from("Register")
                     ->join("MasterPS", "Register.Medrec = MasterPS.Medrec", "INNER")
                     ->join("POLItpp", "Register.KdPoli = POLItpp.KDPoli", "INNER")
                     ->join("FtDokter", "Register.KdDoc = FtDokter.KdDoc", "INNER")
                     ->join("TblKategoriPsn", "Register.Kategori = TblKategoriPsn.KdKategori","LEFT")
                     ->join("DetailIrjUtama", "Register.Regno = DetailIrjUtama.Regno","LEFT");
        $data = $set == 1 ? $data->where("Register.Regno",$key) : $data->where("MasterPS.Medrec",$key);
        $data = $data->get();
        return $set == 1 ? $data->row() : $data->result();
    }

    public function list_group_irj($KdGroup='')
    {
        $data = $this->sv->from("fGroupIRJ");
        $KdGroup != '' ? $data->where("KdGroup",$KdGroup) : '';
        $data = $data->get();
        return $data->result();
    }
    public function list_pemeriksan_irj($kd_group=null,$kd_detail=null,$kategori=null)
    {
        $data = $this->sv
                    ->distinct()
                    ->from("fPemeriksaanIRJ")
                    ->join("fTarifRawatJalan", "fPemeriksaanIRJ.KDDetail = fTarifRawatJalan.KDDetail","INNER");
        if($kd_group != null){ $data->where('fPemeriksaanIRJ.KdGroup', $kd_group); }
        if($kd_detail != null){ $data->where('fPemeriksaanIRJ.KDDetail', $kd_detail); }
        if($kategori != null){ $data->where('fTarifRawatJalan.Kategori', $kategori); }
        $data = $data->get();
        return $data->result();
    }
    public function get_tarif_irj($kd_group=null,$kd_detail=null,$kategori=null)
    {
        $data = $this->sv
                    ->distinct()
                    ->select("fPemeriksaanIRJ.KDDetail as KdDetail, KdGroup, NMDetail as NmTarif, Keterangan, KDTarif as KdTarif, Kategori,
                            KdCbayar , Sarana , Pelayanan , Tarif , JasaDokter , JasaDokter1 , JasaDokterTetap , JasaPerawat , 
                            JasaPerawat1 , JasaPerawatTetap , JasaRumahSakit , JasaRumahSakit1 , JasaRumahSakitTetap")
                            ->join("fTarifRawatJalan", "fPemeriksaanIRJ.KDDetail = fTarifRawatJalan.KDDetail","INNER")
                    ->from("fPemeriksaanIRJ");
        if($kd_group != null){ $data->where('fPemeriksaanIRJ.KdGroup', $kd_group); }
        if($kd_detail != null){ $data->where('fPemeriksaanIRJ.KDDetail', $kd_detail); }
        if($kategori != null){ $data->where('fTarifRawatJalan.Kategori', $kategori); }
        $data = $data->get();
        return $data->result();
    }

    public function post_biling($data)
    {
        $resp['stat'] = false; $resp['inf'] = 0;
        $head = $data['head'] !== null ? $data['head'] : [];
        $head2 = isset($data['head2']) ? $data['head2'] : [];
        $detail = $data['detail'] !== null ? $data['detail'] : [];
        $detail2 = isset($data['detail2'])  ? $data['detail2'] : [];
        // echo '<pre>'; print_r($detail2); echo '</pre>'; die();
        if(!empty($head) && !empty($detail)){
            $notran = $head['NoTran'] !== null ? $head['NoTran'] : '';
            $notran2 = isset($head2['NoTran']) && $head2['NoTran'] !== null ? $head2['NoTran'] : '';

            if($notran == ''){
                $notran = $this->mm->create_notran("TRJ",date('my',strtotime($head['Tanggal'])));
                $up_head = $this->sv->insert("HeadBilIrj",[
                    'Notran' => $notran,
                    'Tanggal' => $head['Tanggal'],
                    'Kategori' => $head['KdKategori'] ?? $head['Kategori'],
                    'NoKwitansi' => '',
                    'Regno' => $head['Regno'],
                    'RegDate' => $head['Regdate'],
                    'MedRec' => $head['Medrec'],
                    'Firstname' => $head['Firstname'],
                    'KdDoc' => $head['KdDoc'],
                    'KdPoli' => $head['KdPoli'],
                    'KdCbayar' => $head['KdCbayar'],
                    'KdJaminan' => $head['KdJaminan'],
                    'TotalBiaya' => $head['TotalTagihan'],
                    'TotalDinas' => 0,
                    'TotalUmum' => 0,
                    'Shift' => $head['Shift'],
                    'ValidUser' => $head['ValidUser'],
                    'Lokasi' => $head['KdPoli'],
                    'Keterangan' => '',
                    'otor' => 1,
                ]);               
            }else{
                $up_head = $this->sv->where('Notran',$notran)->update("HeadBilIrj",[
                    'Tanggal' => $head['Tanggal'],
                    'Kategori' => $head['KdKategori'] ?? $head['Kategori'],
                    'NoKwitansi' => '',
                    'Regno' => $head['Regno'],
                    'RegDate' => $head['Regdate'],
                    'MedRec' => $head['Medrec'],
                    'Firstname' => $head['Firstname'],
                    'KdDoc' => $head['KdDoc'],
                    'KdPoli' => $head['KdPoli'],
                    'KdCbayar' => $head['KdCbayar'],
                    'KdJaminan' => $head['KdJaminan'],
                    'TotalBiaya' => $head['TotalTagihan'],
                    'TotalDinas' => 0,
                    'TotalUmum' => 0,
                    'Shift' => $head['Shift'],
                    'ValidUser' => $head['ValidUser'],
                    'Lokasi' => $head['KdPoli'],
                    'Keterangan' => '',
                    'otor' => 1,
                ]);

            }
            if($up_head){
                $this->sv->where('Notran',$notran)->delete("DetailBilIrj");
                foreach($detail as $key => $d){
                    $up_detail[] = $this->sv->insert("DetailBilIrj",[
                        'Notran' => $notran, 
                        'Tanggal' => $head['Tanggal'],
                        'Regno' => $head['Regno'],
                        'KdDoc' => $head['KdDoc'],
                        'KdPoli' => $head['KdPoli'],
                        'KdTarif' => $d['KdTarif'],
                        'NmTarif' => $d['NmTarif'],
                        'Qty' => $d['Qty'] ?? 1,
                        'Sarana' => $d['Sarana'],
                        'Pelayanan' => $d['Pelayanan'],
                        'JasaRs' => $d['JasaRumahSakit'], 
                        'JasaDokter' => $d['JasaDokter'],
                        'JasaPerawat' => $d['JasaPerawat'],
                        'JumlahBiaya' => $d['JumlahBiaya'] ?? $d['Tarif'],
                        'ByDinas' => 0,
                        'ByUmum' => 0,
                        'TotalBiaya' => 0,
                        'Shift' => $head['Shift'],
                        'ValidUser' => $head['ValidUser'],
                        'Lokasi' => $head['KdPoli']
                    ]);
                }
                if( !empty($head2) && !empty($detail2)){
                    if($notran2 == ''){
                        $notran2 = $this->mm->create_notran("TRJ",date('my',strtotime($head['Tanggal'])));
                        $up_head2 = $this->sv->insert("HeadBilIrj",[
                            'Notran' => $notran2,
                            'Tanggal' => $head2['Tanggal'],
                            'Kategori' => $head2['KdKategori'] ?? $head2['Kategori'],
                            'NoKwitansi' => '',
                            'Regno' => $head2['Regno'],
                            'RegDate' => $head2['Regdate'],
                            'MedRec' => $head2['Medrec'],
                            'Firstname' => $head2['Firstname'],
                            'KdDoc' => $head2['KdDoc'],
                            'KdPoli' => $head2['KdPoli'],
                            'KdCbayar' => $head2['KdCbayar'],
                            'KdJaminan' => $head2['KdJaminan'],
                            'TotalBiaya' => $head2['TotalTagihan'],
                            'TotalDinas' => 0,
                            'TotalUmum' => 0,
                            'Shift' => $head2['Shift'],
                            'ValidUser' => $head2['ValidUser'],
                            'Lokasi' => $head2['KdPoli'],
                            'Keterangan' => '',
                            'otor' => 1,
                        ]);
                    }
                    else{
                        $up_head2 = $this->sv->where('Notran',$notran2)->update("HeadBilIrj",[
                            'Tanggal' => $head2['Tanggal'],
                            'Kategori' => $head2['KdKategori'] ?? $head2['Kategori'],
                            'NoKwitansi' => '',
                            'Regno' => $head2['Regno'],
                            'RegDate' => $head2['Regdate'],
                            'MedRec' => $head2['Medrec'],
                            'Firstname' => $head2['Firstname'],
                            'KdDoc' => $head2['KdDoc'],
                            'KdPoli' => $head2['KdPoli'],
                            'KdCbayar' => $head2['KdCbayar'],
                            'KdJaminan' => $head2['KdJaminan'],
                            'TotalBiaya' => $head2['TotalTagihan2'],
                            'TotalDinas' => 0,
                            'TotalUmum' => 0,
                            'Shift' => $head2['Shift'],
                            'ValidUser' => $head2['ValidUser'],
                            'Lokasi' => $head2['KdPoli'],
                            'Keterangan' => '',
                            'otor' => 1,
                        ]);
                    }
                    if(isset($up_head2)){
                        $this->sv->where('Notran',$notran2)->delete("DetailBilIrj");
                        foreach($detail2 as $key => $d2){
                            $up_detail[] = $this->sv->insert("DetailBilIrj",[
                                'Notran' => $notran2, 
                                'Tanggal' => $head2['Tanggal'],
                                'Regno' => $head2['Regno'],
                                'KdDoc' => $head2['KdDoc'],
                                'KdPoli' => $head2['KdPoli'],
                                'KdTarif' => $d2['KdTarif'],
                                'NmTarif' => $d2['NmTarif'],
                                'Qty' => $d2['Qty'] ?? 1,
                                'Sarana' => $d2['Sarana'],
                                'Pelayanan' => $d2['Pelayanan'],
                                'JasaRs' => $d2['JasaRumahSakit'], 
                                'JasaDokter' => $d2['JasaDokter'],
                                'JasaPerawat' => $d2['JasaPerawat'],
                                'JumlahBiaya' => $d2['JumlahBiaya'] ?? $d2['Tarif'],
                                'ByDinas' => 0,
                                'ByUmum' => 0,
                                'TotalBiaya' => 0,
                                'Shift' => $head2['Shift'],
                                'ValidUser' => $head2['ValidUser'],
                                'Lokasi' => $head2['KdPoli']
                            ]);
                        }
                    }
                }
                if(!in_array(false,$up_detail)){
                    $resp['stat'] = true;
                    $resp['NoTran'] = $notran;
                }else{
                    $resp['inf'] = 3;
                }
            }else{
                $resp['inf'] = 2;
            }
        }else{
            $resp['inf'] = 1;
        }
        return $resp;
    }
    public function delete_biling_tindakan($notran)
    {
        $this->sv->where('Notran',$notran)->delete("DetailBilIrj");
        $del = $this->sv->where('Notran',$notran)->delete("HeadBilIrj");
        return $del;
    }
    public function riwayat_biling($regno)
    {
        $filter = $this->sv->select("HeadBilIrj.Kategori,DetailBilIrj.*,fTarifRawatJalan.*,
                                    (CASE
                                        WHEN (SELECT COUNT(*) FROM DetailKasirIRJ WHERE NoFile = HeadBilIrj.Notran) > 0
                                        THEN 1
                                        ELSE 0
                                    END) as StatusKasir")
                    ->from("HeadBilIrj")
                    ->join("DetailBilIrj", "DetailBilIrj.Notran = HeadBilIrj.Notran", "INNER")
                    ->join("fTarifRawatJalan", "DetailBilIrj.KdTarif = fTarifRawatJalan.KDTarif", "INNER")
                    ->join("fPemeriksaanIRJ", "fPemeriksaanIRJ.KDDetail = fTarifRawatJalan.KDDetail", "INNER")
                    ->where('HeadBilIrj.Regno',$regno)->get();
        return $filter->result_array();
    }

    public function get_tindakan_biling($notran='')
    {
        $data = $this->sv->select("DetailBilIrj.*,fTarifRawatJalan.*")
                    ->from("DetailBilIrj")
                    ->join("fTarifRawatJalan", "DetailBilIrj.KdTarif = fTarifRawatJalan.KDTarif", "INNER")
                    ->join("fPemeriksaanIRJ", "fPemeriksaanIRJ.KDDetail = fTarifRawatJalan.KDDetail", "INNER")
                    ->where('Notran',$notran)->get();
        return $data->result_array();
    }

    public function get_diagnosa_utama($regno)
    {
        $data = $this->sv->from("DetailIrjUtama")->where("Regno",$regno)->get();
        return $data->result_array();
    }
    public function get_diagnosa_sekunder($regno)
    {
        $data = $this->sv->from("DetailIrjSekunder")->where("Regno",$regno)->get();
        return $data->result_array();
    }

    public function get_icd10($kdicd='')
    {
        $data = $this->sv->from("TBLICD10");
            $kdicd != '' ? $data->where("KDICD",$kdicd) : '';
        return $data->get()->result(); 
    }

    public function get_icd9($kdicd='')
    {
        $data = $this->sv->from("TBLicd9");
            $kdicd != '' ? $data->where("KDICD",$kdicd) : '';
        return $data->get()->result(); 
    }

    public function get_nosurat()
    {
        $index = "000001";
        $generate = $this->sv->select("*")->from("fNoSuratKonsul")->order_by("NoSurat", "DESC")->limit(1)->get()->row();
        if (!empty($generate)) {
            $nosurat = $generate->NoSurat+1;
            if (strlen($nosurat) == 1) {
                $nosurat = "00000".$nosurat;
            }elseif(strlen($nosurat) == 2){
                $nosurat = "0000".$nosurat;
            }elseif(strlen($nosurat) == 3){
                $nosurat = "000".$nosurat;
            }elseif(strlen($nosurat) == 4){
                $nosurat = "00".$nosurat;
            }elseif(strlen($nosurat) == 2){
                $nosurat = "0".$nosurat;
            }
        }else{
            $nosurat = $index;
        }
        return $nosurat;
    }

    public function post_konsul($data)
    {
        $up = false;
        $cek = $this->sv->from("AwSuratKonsul")
                        ->where("Regno",$data['Regno'])
                        ->where("TanggalSuratKonsul", $data['TglSurat'])
                        ->where('KdPoliAsal', $data['KdPoliAsal'])
                        ->where('KdPoliTuju', $data['KdPoliTuju'])
                        ->get()->row();
        if(empty($cek)){
            $up = $this->sv->insert("AwSuratKonsul",[
                'Regno'                 => $data['Regno'], 
                'NoSuratKonsul'         => $data['NoSuratKonsul'], 
                'KdPoliAsal'            => $data['KdPoliAsal'], 
                'KdICD'                 => $data['KdIcd'], 
                'TanggalSuratKonsul'    => $data['TglSurat'], 
                'Terapi'                => $data['Terapi'], 
                'Catatan'               => $data['Catatan'], 
                'KdPoliTuju'            => $data['KdPoliTuju'],
                'KdDocTuju'             => $data['KdDocTuju'],
                'TanggalKonsul'         => $data['TanggalKonsul'],
                'ValidUser'             => $this->session->userdata('username').' '.date('d/m/Y H:i:s')
            ]);
            if ($data['Kategori'] == '1') {
                $this->push_konsul($data['KdPoliTuju'], $data['Regno']);

                $pindah = $this->stpnet_addKonsulRawatJalan_IRJxhos(
                    $notran = $data['NoSuratKonsul'], 
                    $regno = $data['Regno'], 
                    $regdate = $data['TanggalKonsul'], 
                    $nokontrol = $data['NoSuratKonsul'], 
                    $tanggal = $data['TglSurat'], 
                    $medrec = $data['Medrec'], 
                    $firstname = $data['Firstname'], 
                    $kddoc = $data['KdDocTuju'], 
                    $kdpoli = $data['KdPoliTuju'], 
                    $kdcbayar = '01', 
                    $kdjaminan = '', 
                    $shift = '', 
                    $validuser = 'KONSUL '.date('d/m/Y H:i:s'), 
                    $lokasi = '', 
                    $keterangan = 'Bayar Kasir'
                );
            }
            $parse = array(
                'status' => $up,
                'message' => 'Berhasil membuat surat'
            );
        }else{
            $this->sv->where("Regno",$data['Regno'])
                        ->where("TanggalSuratKonsul", $data['TglSurat'])
                        ->where('KdPoliAsal', $data['KdPoliAsal'])
                        ->where('KdPoliTuju', $data['KdPoliTuju'])
                        ->update("AwSuratKonsul",[
                'KdICD'                 => $data['KdIcd'], 
                'TanggalSuratKonsul'    => $data['TglSurat'], 
                'Terapi'                => $data['Terapi'], 
                'Catatan'               => $data['Catatan'], 
                'KdDocTuju'             => $data['KdDocTuju'],
                'TanggalKonsul'         => $data['TanggalKonsul'],
                'ValidUser'             => $this->session->userdata('username').' '.date('d/m/Y H:i:s')
            ]);
            $parse = array(
                'status' => $up,
                'message' => 'Surat Sudah Ada..'
            );

        }
        if ($up) {
            $index = "000001";
            $cek = $this->sv->select("*")->from("fNoSuratKonsul")->order_by("NoSurat", "DESC")->limit(1)->get()->row();
            $cek = $cek->NoSurat+1;
            if (empty($cek)) {
                $cek = $index;
            }
            $updatenosurat = $this->sv->update('fNoSuratKonsul',[
                'NoSurat' => $cek
            ]);
        }
        
        return $parse;
    }

    public function get_data_konsul($kdpoli='',$tgl_awal='',$tgl_akhir='', $medrec='', $nama='')
    {
        $this->sv->select("rg.Regno, rg.Regdate, rg.Medrec, rg.Firstname, rg.Kategori, ktp.NmKategori, rg.KdDoc, fd.NmDoc as DokterAsal, fdt.NmDoc as DokterTuju,
            pta.NMPoli as PoliAsal, ptt.NMPoli as PoliTujuan, sk.*, c10.DIAGNOSA, rg.Keterangan");
        $this->sv->from("Register rg");
        $this->sv->join("AwSuratKonsul sk", "rg.Regno = sk.Regno", "INNER");
        $this->sv->join("TblKategoriPsn ktp", "rg.Kategori = ktp.KdKategori", "LEFT");
        $this->sv->join("FtDokter fd", "rg.KdDoc = fd.KdDoc", "LEFT");
        $this->sv->join("FtDokter fdt", "sk.KdDocTuju = fdt.KdDoc", "LEFT");
        $this->sv->join("POLItpp pta", "sk.KdPoliAsal = pta.KDPoli", "LEFT");
        $this->sv->join("POLItpp ptt", "sk.KdPoliTuju = ptt.KDPoli", "LEFT");
        $this->sv->join("TBLICD10 c10", "sk.KdICD = c10.KDICD", "LEFT");
        $this->sv->where("rg.Regno NOT IN (SELECT Regno FROM FPPRI)");
        if ($kdpoli != '') { $this->sv->where("sk.KdPoliAsal",$kdpoli); }
        if($medrec !='' && $nama != ''){
            $this->sv->group_start()
                     ->like('rg.Medrec', $medrec)
                     ->or_like('rg.Firstname', $nama)
                     ->group_end();
        }
        elseif ($medrec != '') { $this->sv->like('rg.Medrec', $medrec); }
        elseif ($nama != '') { $this->sv->like('rg.Firstname', $nama); }
        if ($tgl_awal != '') { $this->sv->where("rg.Regdate >=",$tgl_awal); }
        if ($tgl_akhir != '') { $this->sv->where("rg.Regdate <=",$tgl_akhir); }
        $poli = $this->sv->order_by("rg.Regdate DESC")->get();
        return $poli->result();
    }

    public function post_diagnosa($data)
    {
        $resp['stat'] = false; $resp['inf'] = 0;
        $head = $data['head'] !== null ? $data['head'] : [];
        $detail = $data['detail'] !== null ? $data['detail'] : [];
        if(!empty($head) && !empty($detail)){
            $up = false;
            $cek = $this->sv->from("medrecIRJ")->where("Regno",$head['Regno'])->get()->row();
            if(empty($cek)){
                $up = $this->sv->insert("medrecIRJ",[
                    'Regno'     => $head['Regno'], 
                    'Tanggal'   => $head['Tanggal'], 
                    'RegDate'   => $head['Regdate'], 
                    'RegTime'   => $head['RegTime'], 
                    'Medrec'    => $head['Medrec'], 
                    'Firstname' => $head['Firstname'], 
                    'Sex'       => $head['Sex'], 
                    'TglLahir'  => $head['Bod'], 
                    'UmurTahun' => $head['UmurThn'], 
                    'UmurBulan' => $head['UmurBln'], 
                    'UmurHari'  => $head['UmurHari'], 
                    'KDPoli'    => $head['KdPoli'], 
                    'KDDoc'     => $head['KdDoc'], 
                    'Kasus'     => $head['Kasus'], 
                    'Catatan'   => '', 
                    'ValidUser' => $head['ValidUser'], 
                    'NoSkp'     => $head['NoSKP']
                ]);
            }else{
                $up = $this->sv->where("Regno",$head['Regno'])->update("medrecIRJ",[
                    'Tanggal'   => $head['Tanggal'], 
                    'RegDate'   => $head['Regdate'], 
                    'RegTime'   => $head['RegTime'], 
                    'Medrec'    => $head['Medrec'], 
                    'Firstname' => $head['Firstname'], 
                    'Sex'       => $head['Sex'], 
                    'TglLahir'  => $head['Bod'], 
                    'UmurTahun' => $head['UmurThn'], 
                    'UmurBulan' => $head['UmurBln'], 
                    'UmurHari'  => $head['UmurHari'], 
                    'KDPoli'    => $head['KdPoli'], 
                    'KDDoc'     => $head['KdDoc'], 
                    'Kasus'     => $head['Kasus'], 
                    'Catatan'   => '', 
                    'ValidUser' => $head['ValidUser'], 
                    'NoSkp'     => $head['NoSKP']
                ]);
            }
            if($up){
                $this->sv->where("Regno",$head['Regno'])->delete("DetailIrjSekunder");
                $this->sv->where("Regno",$head['Regno'])->delete("DetailIrjUtama");
                $up_d = [];
                foreach($detail as $key => $d){
                    if($key == 0){
                        $up_d[] = $this->sv->insert("DetailIrjUtama",[
                            'Regno'     => $d['Regno'], 
                            'Medrec'    => $d['Medrec'], 
                            'Tanggal'   => $head['Tanggal'], 
                            'KdICD'     => $d['KdICD'], 
                            'KdDTD'     => $d['KdDTD'],
                            'Diagnosa'  => $d['Diagnosa'], 
                            'KdTDK'     => $d['KdTDK'], 
                            'Tindakan'  => $d['Tindakan'], 
                            'Kasus'     => $d['Kasus'], 
                            'ValidUser' => $d['ValidUser']
                        ]);
                    }else{
                        $up_d[] = $this->sv->insert("DetailIrjSekunder",[
                            'Regno'     => $d['Regno'], 
                            'Medrec'    => $d['Medrec'], 
                            'Tanggal'   => $head['Tanggal'], 
                            'KdICD'     => $d['KdICD'], 
                            'KdDTD'     => $d['KdDTD'],
                            'Diagnosa'  => $d['Diagnosa'], 
                            'KdTDK'     => $d['KdTDK'], 
                            'Tindakan'  => $d['Tindakan'], 
                            'Kasus'     => $d['Kasus'], 
                            'ValidUser' => $d['ValidUser']
                        ]);
                    }
                }
                if(!in_array(false,$up_d)){
                    $resp['stat'] = true;
                }else{
                    $resp['inf'] = 3;
                    $this->sv->where("Regno",$head['Regno'])->delete("DetailIrjSekunder");
                    $this->sv->where("Regno",$head['Regno'])->delete("DetailIrjUtama");
                    $this->sv->where("Regno",$head['Regno'])->delete("MedrecIRJ");
                }
            }else{
                $resp['inf'] = 2;
            }
        }else{
            $resp['inf'] = 1;
        }
        return $resp;
    }

    public function stpnet_addKonsulRawatJalan_IRJxhos($notran='', $regno='', $regdate='', $nokontrol='', $tanggal='', $medrec='', $firstname='', $kddoc='', $kdpoli='', $kdcbayar='', $kdjaminan='', $shift='', $validuser='', $lokasi='', $keterangan='')
    {
        $exec = $this->sv->query("EXEC stpnet_addKonsulRawatJalan_IRJxhos 
            @notran = '$notran',
            @regno = '$regno',
            @regdate = '$regdate',
            @nokontrol = '$nokontrol',
            @tanggal = '$tanggal',
            @medrec = '$medrec',
            @firstname = '$firstname',
            @kddoc = '$kddoc',
            @kdpoli = '$kdpoli',
            @kdcbayar = '$kdcbayar',
            @kdjaminan = '$kdjaminan',
            @shift = '$shift',
            @validuser = '$validuser',
            @lokasi = '$lokasi',
            @keterangan = '$keterangan'
        ");

        return $exec->result();
    }

    public function push_konsul($kdpoli,$regno)
    {
        $push = file_get_contents("http://192.168.136.2:81/modul_rj/api/RawatJalan/PushKonsul/$kdpoli/$regno");
        return $push;
    }
}
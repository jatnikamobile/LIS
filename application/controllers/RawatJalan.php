<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RawatJalan extends CI_Controller {

	protected $csrf;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('akses_level')) redirect('/Login');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
		$this->load->model("RawatJalan_model","rjm");
	}
	public function antrian()
	{
		$parse = array (
			'title'	    => 'Antrian Rawat Jalan',
			'main_menu' => 'antrian_irj',
            'content'   => 'content/rawat_jalan/antrian',
			'set'		=> 'list',
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
    }
    public function kunjungan()
	{
		$parse = array (
			'title'	    => 'Kunjungan Rawat Jalan',
			'main_menu' => 'kunjungan_irj',
			'content'   => 'content/rawat_jalan/kunjungan',
			'set'		=> 'kunjungan',
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}
	public function list()
	{
		$kdpoli = $this->session->userdata('kd_poli');
        $medrec = $this->input->post("rm_nama") ?? '';
        $regno = $this->input->post("regno") ?? '';
        $nama = $this->input->post("rm_nama") ?? '';
        $dokter = $this->input->post("dokter") ?? '';
        $tanggal = $this->input->post("tanggal") ?? date('Y-m-d');
        $set = $this->input->post("set") ?? '';
		$parse = array (
			'csrf'  => $this->csrf,
			'set'	=> $set,
		);
		// echo json_encode($this->input->post());
		$this->load->view('content/rawat_jalan/list', $parse);
	}

	public function ajax_list()
    {
        $kdpoli = $this->session->userdata('kd_poli');
        $medrec = $this->input->post("rm_nama") ?: '';
        $regno = $this->input->post("regno") ?: '';
        $nama = $this->input->post("rm_nama") ?: '';
        $dokter = $this->input->post("dokter") ?: '';
        $tanggal = $this->input->post("tanggal") ?: date('Y-m-d');
		$set = $this->input->post("set") ?: '';
		if($set == 'riwayat'){
			$medrec = $this->input->post("medrec") ?: '';
		}
		// echo '<pre>';print_r($regno);echo '</pre>';exit();
		$list = $this->rjm->list_pasien($tanggal, $medrec, $nama, $regno, $kdpoli, $dokter, $set);
		$no   = $_POST['start'];
		$data = [];
        foreach($list as $l){
			$row  	= array();
			if($l->Regno != $regno){
				$no++;
				$row[]	= $no;
				$row[]	= date('d-m-Y',strtotime($l->Regdate));
				$row[]	= $l->Regno;
				$row[]	= $l->Medrec;
				$row[]	= $l->Firstname;
				$row[]	= $l->NmDoc;
				$row[]	= $l->NMPoli;
				$row[]	= $l->NomorUrut;
				$row[]	= $l->NmKategori;
				$row[]	= $l->ValidUser;
				if($set != 'riwayat'){
					if($set == 'kunjungan'){
						$riwayat_tindakan = $this->rjm->riwayat_biling($l->Regno);
						if(!empty($riwayat_tindakan)){
							$tindakan = '<ul class="list-group">';
							foreach($riwayat_tindakan as $r){
								$tindakan .= '<li class="list-group-item list-group-item-info">'.$r['NmTarif'].'</li>';
							}
							$tindakan .= '</ul>';
						}else{
							$tindakan  = '<ul class="list-group"><li class="list-group-item list-group-item-info">-</li></ul>';
						}
						$row[] = $tindakan;
						$utama = $this->rjm->get_diagnosa_utama($l->Regno);
						if(!empty($utama)){
							$diagnosa = '<ul class="list-group">';
							foreach($utama as $key => $val){
								$diagnosa .= '<li class="list-group-item list-group-item-warning">'.$val['KdICD'].'-'.$val['Diagnosa'].'</li>';							
							}
							$sekunder = $this->rjm->get_diagnosa_sekunder($l->Regno);
							if(!empty($sekunder)){
								foreach($sekunder as $key => $val){
									$diagnosa .= '<li class="list-group-item">'.$val['KdICD'].'-'.$val['Diagnosa'].'</li>';
								}
							}
							$diagnosa .= '</ul>';
						}else{
							$diagnosa = '<ul class="list-group">
											<li class="list-group-item list-group-item-warning">-</li>
										</ul>';
						}
						$row[] = $diagnosa;
					}
					$row[]	= anchor(base_url('Kunjungan/Pasien/View/'.$this->cl->enkrip($l->Regno)), $title = '<i class="fa fa-eye"></i>', $attributes = 'class="btn btn-sm btn-info"').' '.anchor(base_url('Kontrol/Pasien/Form/'.$this->cl->enkrip($l->Regno)), $title = '<i class="fa fa-envelope"></i>', $attributes = 'class="btn btn-sm btn-info" title="kontrol"');
				}else{
					$riwayat_tindakan = $this->rjm->riwayat_biling($l->Regno);
					if(!empty($riwayat_tindakan)){
						$tindakan = '<ul class="list-group">';
						foreach($riwayat_tindakan as $r){
							$tindakan .= '<li class="list-group-item list-group-item-info">'.$r['NmTarif'].'</li>';
						}
						$tindakan .= '</ul>';
					}else{
						$tindakan  = '<ul class="list-group"><li class="list-group-item list-group-item-info">-</li></ul>';
					}
					$row[] = $tindakan;
					$utama = $this->rjm->get_diagnosa_utama($l->Regno);
					if(!empty($utama)){
						$diagnosa = '<ul class="list-group">';
						foreach($utama as $key => $val){
							$diagnosa .= '<li class="list-group-item list-group-item-warning">'.$val['KdICD'].'-'.$val['Diagnosa'].'</li>';							
						}
						$sekunder = $this->rjm->get_diagnosa_sekunder($l->Regno);
						if(!empty($sekunder)){
							foreach($sekunder as $key => $val){
								$diagnosa .= '<li class="list-group-item">'.$val['KdICD'].'-'.$val['Diagnosa'].'</li>';
							}
						}
						$diagnosa .= '</ul>';
					}else{
						$diagnosa = '<ul class="list-group">
										<li class="list-group-item list-group-item-warning">-</li>
									</ul>';
					}
					$row[] = $diagnosa;
					// $row[] = '';
				}
				$data[] = $row;
			}
			// ===============================
        }

        $output 	= array(
            "draw"				=> $_POST['draw'],
            "recordsFiltered"	=> $this->rjm->count_filtered_list_pasien($tanggal, $medrec, $nama, $regno, $kdpoli, $dokter,$set),
            "recordsTotal"		=> $this->rjm->count_all_list_pasien($medrec,$set),
            // "totalFromPage"     => $this->cl->formatAngka($totalPage,2,2),
            // "totalFromData"     => $this->cl->formatAngka($totalFromData->TotalTagihan,2,2),
            "data"				=> $data
		);
        echo json_encode($output);
	}
	
	public function view($regno='')
	{
		$regno = $this->cl->dekrip($regno) ?: '';
		$pasien = $this->rjm->get_detail_pasien($regno,1);
		$parse = array (
			'title'	    => 'View Pasien | Rawat Jalan',
			'main_menu' => 'kunjungan_irj',
			'content'   => 'content/rawat_jalan/view',
			'regno'		=> $regno,
			'pasien'	=> $pasien,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}
	//=========================================================
	public function form_biling()
	{
		$this->session->set_userdata('detailTindakan',[]);
		$regno = $this->input->post("regno") ?: '';
		$kategori = $this->input->post("kategori") ?: '';
		$notran = $this->input->post("notran") ?: '';
		$pasien = $this->rjm->get_detail_pasien($regno,1);
		$parse = array (
			'regno'		=> $regno,
			'kategori'	=> $kategori,
			'notran'	=> $notran,
			'pasien'	=> $pasien,
			'csrf'		=> $this->csrf,
		);
		$this->load->view('content/rawat_jalan/form_biling', $parse);
	}

	public function form_biling_riwayat()
	{
		$regno = $this->input->post('regno');
        $data = $this->rjm->riwayat_biling($regno);
        $detailRiwayat = [];    
        if(!empty($data)){
            foreach($data as $key => $val){
                array_push($detailRiwayat,$val);
            }
        }
        $parse['regno'] = $regno;;
		$parse['detailRiwayat'] = $detailRiwayat;
		$this->load->view('content/rawat_jalan/riwayat_biling', $parse);
	}

	public function form_biling_detail()
    {
        $way = $this->input->post('way');
        $regno = $this->input->post('regno');
        $parse = [];$pasien = null; $parse['notran'] = '';
		$detailTindakan = $this->session->userdata('detailTindakan');
        if($way == 'addDetail'){
			$data = $this->input->post('sender');
			array_push($detailTindakan,$data);
            $this->session->set_userdata('detailTindakan',$detailTindakan);
            $detailTindakan = $this->session->userdata('detailTindakan');
        }elseif($way == 'removeDetail'){
            $index = $this->input->post('index');
            array_splice($detailTindakan,$index,1);
            $this->session->set_userdata('detailTindakan',$detailTindakan);
			$detailTindakan = $this->session->userdata('detailTindakan');
        }elseif($way == 'loadDetail'){
            $notran = $this->input->post('notran');
            $data = $this->rjm->get_tindakan_biling($notran);        
            if(!empty($data)){
                foreach($data as $key => $val){
                    array_push($detailTindakan,$val);
                }
            }
            $parse['notran'] = $notran;
			$this->session->set_userdata('detailTindakan',$detailTindakan);
            $detailTindakan = $this->session->userdata('detailTindakan');
        }
        $parse['dataDetail'] = $detailTindakan;
        if($regno != ''){
            $pasien = $this->rjm->get_detail_pasien($regno,1);
            $parse['pasien'] = $pasien;
        }
		$this->load->view('content/rawat_jalan/form_biling_detail',$parse);
    }

	public function get_pemeriksaan()
    {
        $KdGroup = $this->input->post('KdGroup') ?? '' ;
        $regno = $this->input->post('regno') ?? '' ;
        $kategori = $this->input->post('kategori') ?? '' ;
        if($KdGroup == ''){
            $list = $this->rjm->list_group_irj();
            $parse = [
                'KdGroup'=> $KdGroup,
                'list'  => $list,
                'regno' => $regno,
                'kategori' => $kategori,
            ];
        }else{
            $list = $this->rjm->list_pemeriksan_irj($KdGroup,null,$kategori);
            $parse = [
                'KdGroup'=> $KdGroup,
                'list'  => $list,
                'regno' => $regno,
                'kategori' => $kategori,
            ];
        }
        $this->load->view('content/rawat_jalan/form_biling_pemeriksaan',$parse);
	}
	
	public function biling_post()
    {
        $data['head'] = $this->input->post();
		$data['detail'] = $this->session->userdata('detailTindakan');
		$up = $this->rjm->post_biling($data);
        echo json_encode($up);
	}
	public function biling_delete()
    {
        $notran = $this->input->post('notran');
        $del = $this->rjm->delete_biling_tindakan($notran);
        echo json_encode($del);
	}
	// ===================================================================
	function form_diagnosa()
    {
        $this->session->set_userdata('detailDiagnosa',[]);
        $regno = $this->input->post("regno") ?? '';
        $parse = [];
        if($regno != ''){
            $pasien = $this->rjm->get_detail_pasien($regno,1);
            $parse['pasien'] = [];
            $parse['kategori'] = '';
            if(!empty($pasien)){
                $parse['pasien'] = $pasien;
                $parse['kategori'] = $pasien->Kategori ?? '';
            }
        }
		$parse['csrf'] = $this->csrf;
		$this->load->view('content/rawat_jalan/form_diagnosa', $parse);
	}
	public function form_diagnosa_detail()
    {
        $way = $this->input->post('way');
        $regno = $this->input->post('regno');
        $parse = [];$pasien = null; 
		$detailDiagnosa = $this->session->userdata('detailDiagnosa');
        if($way == 'addDetail'){
            $sender = $this->input->post('sender');
            $icd10 = $sender['KdICD'];
            $icd9 = $sender['KdTindakan'];
            $data['Regno']     = $sender["Regno"];
            $data['Medrec']    = $sender["Medrec"];
            $data['Regno']     = $sender["Regno"];
            $data['KdICD']     = '';
            $data['KdDTD']     = '';
            $data['Diagnosa']  = '';
            $data['KdTDK']     = '';
            $data['Tindakan']  = '';
            $data['Kasus']     = $sender['Kasus'];
            $data['ValidUser'] = $sender['ValidUser'];
            if($icd10 != ''){
				$icd10 = $this->rjm->get_icd10($icd10);
				$icd10 = $icd10[0] ?? $icd10;
                $data['KdICD']    = $icd10->KDICD;
                $data['KdDTD']    = $icd10->KDDTD;
                $data['Diagnosa'] = $icd10->DIAGNOSA;
            }
            if($icd9 != ''){
				$icd9 = $this->rjm->get_icd9($icd9);
				$icd9 = $icd9[0] ?? $icd9;
                $data['KdTDK']    = $icd9->KDICD;
                $data['Tindakan'] = $icd9->Diagnosa;
            }
            // dd($data);
            array_push($detailDiagnosa,$data);
            $this->session->set_userdata('detailDiagnosa',$detailDiagnosa);
            $detailDiagnosa = $this->session->userdata('detailDiagnosa');
        }elseif($way == 'removeDetail'){
            $index = $this->input->post('index');
            array_splice($detailDiagnosa,$index,1);
            $this->session->set_userdata('detailDiagnosa',$detailDiagnosa);
            $detailDiagnosa = $this->session->userdata('detailDiagnosa');
        }elseif($way == 'loadDetail'){
            $utama = $this->rjm->get_diagnosa_utama($regno);
            // dd($utama);
			if(!empty($utama)){
                foreach($utama as $key => $val){
                    array_push($detailDiagnosa,$val);
				}
            }
            $sekunder = $this->rjm->get_diagnosa_sekunder($regno);
            if(!empty($sekunder)){
                foreach($sekunder as $key => $val){
                    array_push($detailDiagnosa,$val);
				}
			}
			$this->session->set_userdata('detailDiagnosa',$detailDiagnosa);
            $detailDiagnosa = $this->session->userdata('detailDiagnosa');
        }
        $parse['regno'] = $regno;
        $parse['dataDetail'] = $detailDiagnosa;
        if($regno != ''){
            $pasien = $this->rjm->get_detail_pasien($regno,1);
            $parse['pasien'] = $pasien;
        }
		$parse['csrf'] = $this->csrf;
		$this->load->view('content/rawat_jalan/form_diagnosa_detail', $parse);
    }
    public function diagnosa_post()
    {
        $data['head'] = $this->input->post();
        $data['detail'] = $this->session->userdata('detailDiagnosa');
        $up = $this->rjm->post_diagnosa($data);
        echo json_encode($up);
    }

    public function diagnosa_delete()
    {
        $regno = $this->input->post('regno');
        $del = $this->rjm->delete_diagnosa($regno);
        echo json_encode($del);
    }

    public function data_konsul()
    {
		$poli = $this->session->userdata('kd_poli');
		$medrec = $this->input->get("rm_nama") ?: '';
        $nama = $this->input->get("rm_nama") ?: '';
        $tgl_awal = $this->input->get("tgl_awal") ?: date('Y-m-01').' 00:00:00';
		$tgl_akhir = $this->input->get("tgl_akhir") ?: date('Y-m-t').' 23:59:59';
		
    	$data = $this->rjm->get_data_konsul($poli,$tgl_awal, $tgl_akhir,$medrec,$nama);
		// $data = $this->rjm->get_data_konsul('', '2019-10-10 00:00:00', '2019-10-30 23:59:59');
		$parse = array (
			'title'	    => 'Data Konsul | Rawat Jalan',
			'main_menu' => 'konsul',
			'content'   => 'content/rawat_jalan/konsul',
			'data'		=> $data,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
    }

    public function form_konsul($regno)
	{
		// $regno = '00928340';
		// $regno = $this->input->post('Regno');
		$nosurat = $this->rjm->get_nosurat();
        $data = $this->rjm->get_detail_pasien($regno);
        $parse['regno'] = $regno;;
		$parse['data'] = $data;
		$parse = array (
			'title'	    => 'Surat Konsul | Rawat Jalan',
			'main_menu' => 'kunjungan_irj',
			'content'   => 'content/rawat_jalan/form_konsul',
			'regno'		=> $regno,
			'data'		=> $data,
			'nosurat'	=> $nosurat,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}

    public function konsul_post()
    {
    	$data = $this->input->post();
    	$up = $this->rjm->post_konsul($data);
    	echo json_encode($up);
    }
}

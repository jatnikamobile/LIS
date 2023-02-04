<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HasilPemeriksaan extends CI_Controller
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
			'title'	    => 'Hasil Pemeriksaan',
			'main_menu' => 'hasillab',
            'content'   => 'content/hasil_pemeriksaan/index',
            'status'    => false,
			'csrf'	    => $this->csrf,
		);

		$this->load->view('layouts/wrapper', $parse);
	}

	public function show_pemeriksaan($notran = '')
	{
		$parse = array (
			'title'	    => 'Hasil Pemeriksaan',
			'main_menu' => 'hasillab',
            'content'   => 'content/hasil_pemeriksaan/index',
            'status' 	=> true,
            'notran'	=> $notran,
			'csrf'	    => $this->csrf,
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function list_hasil_pemeriksaan()
	{
		$params = $this->input_sanitizer->method('get')
			->string('term')
			->string('ruangan')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('status_print')
			->integer('status_hasil')
			->value('array');

		// $result = $this->hpm->get_list_hasil_pemeriksaan_page($params);
		$parse = array (
			'title'	    => 'Hasil Pemeriksaan',
			'main_menu' => 'hasillab',
            'content'   => 'content/hasil_pemeriksaan/list_hasil_pemeriksaan2',
			'csrf'	    => $this->csrf,
			// 'page_hasil'=> $result,
			'input'     => $params,
			'bangsals'	=> $this->hpm->get_bangsal()
		);

		$this->load->view('layouts/wrapper', $parse);
	}

	public function show_list(){
		$param = $this->input_sanitizer->method('post')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('status_hasil')
			->value('array');

			$params = array('from_date' => $this->input->post('from_date'),
							'to_date' => date('Y-m-d', strtotime($this->input->post('to_date'))),
							'ruangan' => $this->input->post('ruangan'), 'status_hasil' => $this->input->post('status_hasil'));

		$hasil = $this->hpm->get_list_hasil_pemeriksaan_page2($params);
		// print_r($params);

        $no=0;
        $jumlah_unit=0;$switchcek='';
        $line2 = array();
        foreach ($hasil as $value) {
        	if ($value->Publish == 1 || $value->Publish != null) {
            	$switchcek = 'checked';
            }else{
            	$switchcek = '';
            }
            $row2['isi'] = $value->HasFilledIn;
            $row2['edit'] = $value->HasNotFilled;
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
            $row2['CatatanRegistrasi'] = empty($value->MedRec) ? $value->CatatanRegistrasi : $value->Address;
            $row2['PrintCount'] = $value->PrintCount ?? '0' ;
            if($this->session->userdata('grup') == 'LAB' && $this->session->userdata('o_level') == 1) {
            	$row2['aksi'] = 
	            '
	            <a href="'.base_url('hasilpemeriksaan/show_pemeriksaan/'.$value->Notran).'" title="Isi Pemeriksaan Laboratorium">
		          <i class="fa fa-folder-open green"></i>
		        </a>
		         <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan?notransaksi='.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print blue"></i>
		        </a>
		        <a href="'.base_url('billingpemeriksaan/print_label_billing?notransaksi='.$value->Notran).'" target="_blank" title="Print Label">
		          <i class="fa fa-print orange"></i>
		        </a>
		        <a href="'.base_url('billingpemeriksaan/print_rincian_biaya_billing_pemeriksaan?notransaksi='.$value->Notran.'').'" target="_blank" title="Print Rincian Biaya Billing Pemeriksaan">
		          <i class="fa fa-print yellow"></i>
		        </a>
		        <a href="'.base_url('hasilpemeriksaan/print_bukti_pengambilan?notransaksi='.$value->Notran).'" target="_blank" title="Print Bukti Pengambilan Hasil Laboratorium">
		          <i class="fa fa-print purple"></i>
		        </a>
		        <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan?notransaksi='.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print green"></i>
		        </a>
		        <label class="switch">
				  <input type="checkbox" value="1" name="onoffswitch" id="onoffswitch_'.$value->Notran.'" onclick="publish(\''.$value->Notran.'\')" '.$switchcek.'>
				  <span class="slider"></span>
				</label>
	            '
	            ;	
            }else{ 
	            $row2['aksi'] = 
	            '
	            <a href="'.base_url('hasilpemeriksaan/show_pemeriksaan/'.$value->Notran).'" title="Isi Pemeriksaan Laboratorium">
		          <i class="fa fa-folder-open green"></i>
		        </a>
		         <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan_?notransaksi='.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print blue"></i>
		        </a>
		        <a href="'.base_url('billingpemeriksaan/print_label_billing?notransaksi='.$value->Notran).'" target="_blank" title="Print Label">
		          <i class="fa fa-print orange"></i>
		        </a>
		        <a href="'.base_url('billingpemeriksaan/print_rincian_biaya_billing_pemeriksaan?notransaksi='.$value->Notran.'').'" target="_blank" title="Print Rincian Biaya Billing Pemeriksaan">
		          <i class="fa fa-print yellow"></i>
		        </a>
		        <a href="'.base_url('hasilpemeriksaan/print_bukti_pengambilan?notransaksi='.$value->Notran).'" target="_blank" title="Print Bukti Pengambilan Hasil Laboratorium">
		          <i class="fa fa-print purple"></i>
		        </a>
		        <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan?notransaksi='.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print green"></i>
		        </a>
	            '
	            ;
	        }
            $no++;
            $line2[] = $row2;
        }
        $line['data'] = $line2;            
        echo json_encode($line);
	}

	public function FlagPublish(){
		$flag = $this->input->post('flag');
		$notrans = $this->input->post('no_transaksi');
		$hasil = $this->hpm->updateFlagHasil($notrans,$flag);           
        echo json_encode($hasil);
	}

	public function list__table_part()
	{
		$params = $this->input_sanitizer->method('get')
			->string('term')
			->string('ruangan')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('status_print')
			->integer('status_hasil')
			->value('array');

		$result = $this->hpm->get_list_hasil_pemeriksaan_page($params);

		$base_view = 'content/hasil_pemeriksaan/list_hasil_pemeriksaan';

		$result = [
			'html_table_rows' => $this->load->view($base_view.'.table-rows.php', ['data' => $result->data], TRUE),
			'html_pagination' => $this->load->view($base_view.'.pagination.php', array_merge((Array) $result->pagination, ['input' => $params]), TRUE),
		];

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	public function get_pasien_by_notran()
	{
		$param = $this->input->post('notransaksi');
		$head = $this->hpm->get_head_hasil_pemeriksaan($param);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($head));
	}

	public function get_pasien_by_notran_table_detail()
	{
		$param = $this->input->post('notransaksi');
		$head = $this->hpm->get_detail_hasil_pemeriksaan($param);
		$regno = $this->hpm->get_head_hasil_pemeriksaan($param);
		// echo '<pre>'; print_r($head); exit();
		if($regno == null){
			echo 'Data Tidak Ditemukan';
		}else{
			$parse = array(
				'list' => $head,
				'head' => $regno,
				'regno' => $regno->Regno
			);
			$this->load->view('content/hasil_pemeriksaan/table_hasil_pemeriksaan', $parse);
		}
	}

	public function post_hasil_pemeriksaan()
	{
		$param = $this->input->post();
		$head = $this->hpm->update_hasil($param);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($head));
	}

	public function show_group_pemeriksaan_lab()
	{
		$kdgroup = $this->input->post('kdgroup');
		$kdgroup == '' ? $list = $this->bpm->group_lab() : $list = $this->bpm->pemeriksaan_lab($kdgroup);

		$parse = array(
			'list' => $list,
			'status' => $kdgroup == '' ? true : false
		);
		$this->load->view('content/hasil_pemeriksaan/tambah_pemeriksaan', $parse);
	}

	public function print_hasil_pemeriksaan()
	{
		$this->load->library('ciqrcode');

		$notransaksi = $this->input->get('notransaksi');
		$infoCovid19 = $this->input->get('infoCovid19');
		$custom_detail = $this->input->get('kode_detail');
		$tgl = $this->input->get('TglHasil');
		if($tgl == ''){
			$tgl = date('Y-m-d');
		}

		$head = $this->hpm->get_head_hasil_pemeriksaan($notransaksi);
		$fdokter = $this->hpm->get_dokter_kepala();
		$fprofile = $this->hpm->get_fprofile();

		$config['cacheable']    = true; 
        $config['cachedir']     = './assets/';
        $config['errorlog']     = './assets/'; 
        $config['imagedir']     = './assets/qr/';
        $config['quality']      = true;
        $config['size']         = '1024'; 
        $config['black']        = array(224,255,255);
        $config['white']        = array(70,130,180);
        $this->ciqrcode->initialize($config);
 		$date=date("d-F-Y");
        $image_name=$head->Nolab.'.png'; //buat name dari qr code sesuai dengan nolab
 		$dataqr="RSAU, MIKROBIOLOGI,Dokter:".$fdokter->NmDoc.",".$fdokter->korps_ttd.",".$date."";
 		$params['data'] = $dataqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name;
		$this->ciqrcode->generate($params);

		// echo "<pre>"; print_r($infoCovid19); die();
		$detail = $this->hpm->search_group_print($notransaksi, $custom_detail);
		$parse = array(
			'head' => $head,
			'detail' => $detail,
			'infocvd19' => $infoCovid19,
			'qr' => $image_name,
			'tgl_hasil' => $tgl,
		);

		$this->load->view('content/hasil_pemeriksaan/print_hasil_pemeriksaan', $parse);
		$this->hpm->increase_print_count($notransaksi);
	}

	public function print_hasil_pemeriksaan_get()
	{
		$this->load->library('ciqrcode');

		$notransaksi = $this->input->get('notransaksi');
		$infoCovid19 = $this->input->post('infoCovid19');
		$custom_detail = $this->input->post('kode_detail');
		$tgl = $this->input->post('TglHasil');

		$head = $this->hpm->get_head_hasil_pemeriksaan($notransaksi);
		$fdokter = $this->hpm->get_dokter_kepala();
		$fprofile = $this->hpm->get_fprofile();

		$config['cacheable']    = true; 
        $config['cachedir']     = './assets/';
        $config['errorlog']     = './assets/'; 
        $config['imagedir']     = './assets/qr/';
        $config['quality']      = true;
        $config['size']         = '1024'; 
        $config['black']        = array(224,255,255);
        $config['white']        = array(70,130,180);
        $this->ciqrcode->initialize($config);
 		$date=date("d-F-Y");
        $image_name=$head->Nolab.'.png'; //buat name dari qr code sesuai dengan nolab
 		$dataqr="RSAU, LAB,Dokter:".$fdokter->NmDoc.",".$fdokter->korps_ttd.",".$date."";
 		$params['data'] = $dataqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name;
		$this->ciqrcode->generate($params);

		// echo "<pre>"; print_r($infoCovid19); die();
		$detail = $this->hpm->search_group_print($notransaksi, $custom_detail);
		$parse = array(
			'head' => $head,
			'detail' => $detail,
			'infocvd19' => $infoCovid19,
			'qr' => $image_name,
			'tgl_hasil' => $tgl,
		);

		$this->load->view('content/hasil_pemeriksaan/print_hasil_pemeriksaan', $parse);
		$this->hpm->increase_print_count($notransaksi);
	}

	public function print_bukti_pengambilan()
	{
		$notransaksi = $this->input->get('notransaksi');
		$data = $this->bpm->get_label_billing($notransaksi);
		$parse = array(
			'data' => $data
		);
		$this->load->view('content/hasil_pemeriksaan/print_bukti_pengambilan', $parse);
	}

	public function histori_pasien()
	{
		$medrec = $this->input->get('medrec');
		$pemeriksaan = $this->input->get('pemeriksaan');

		$search_pemeriksaan = $this->hpm->search_pemeriksaan($pemeriksaan);
		$histori_new = $this->hpm->histori_pemeriksaan($medrec, $pemeriksaan == strlen($pemeriksaan) > 5 ? $search_pemeriksaan->NamaDetail : $search_pemeriksaan->NMDetail);
		$histori_old = $this->hpm->api_histori_pemeriksaan_pasien($medrec, $search_pemeriksaan->KdMappingHistori);

		$parse = array(
			'histori_new' => $histori_new,
			'histori_old' => $histori_old
		);
		// var_dump($parse);die();
		$this->load->view('content/hasil_pemeriksaan/histori_pemeriksaan_pasien', $parse);
	}

	public function post_new_pemeriksaan()
	{
		$data = $this->input->post();
		$post = $this->hpm->create_pemeriksaan_baru_hasil($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function get_list_custom_print($notransaksi)
	{
		$result = $this->bpm->get_list_custom_print($notransaksi);

		$this->output
	    	->set_content_type('application/json')
	    	->set_output(json_encode($result));
	}
}

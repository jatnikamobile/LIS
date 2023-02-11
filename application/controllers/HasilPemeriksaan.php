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
		//print_r($hasil); exit();

        $no=0;
        $jumlah_unit=0;$switchcek='';
        $line2 = array();
        foreach ($hasil as $value) {
        	if ($value->Publish == 1 || $value->Publish != null) {
            	$switchcek = 'checked';
            }else{
            	$switchcek = '';
            }
            if ($value->tanda_bayar != null) {
            	$stat_bayar = '<b  style="background-color:#000080;">SUDAH BAYAR</b>';
            }else{
            	$stat_bayar = '';
            }
            $row2['isi'] = $value->HasFilledIn;
            $row2['edit'] = $value->HasNotFilled;
            $row2['Notran'] = $value->Notran .'<br>'. $stat_bayar;
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
		          <i class="fa fa-folder-open blue"></i>
		        </a>
	            <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan_pdf/'.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print green"></i>
		        </a>
	            '
	            ;	
				$row2['switch'] = '<label class="switch">
						<input type="checkbox" value="1" name="onoffswitch" id="onoffswitch_'.$value->Notran.'" onclick="publish(\''.$value->Notran.'\')" '.$switchcek.'>
						<span class="slider"></span>
					</label>';
            }else{ 
	            $row2['aksi'] = 
	            '
	            <a href="'.base_url('hasilpemeriksaan/show_pemeriksaan/'.$value->Notran).'" title="Isi Pemeriksaan Laboratorium">
		          <i class="fa fa-folder-open green"></i>
		        </a>
		         <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan_pdf/'.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
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
		        <a href="'.base_url('hasilpemeriksaan/print_hasil_pemeriksaan_pdf/'.$value->Notran).'" title="Print Hasil Pemeriksaan" target="_blank">
		          <i class="fa fa-print green"></i>
		        </a>
	            '
	            ;

				$row2['switch'] = $value->Publish == 1 ? '<label class="badge badge-success">Published</label>' : 'Unpublished';
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

	public function get_pasien_by_notran_table_detailold()
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

	public function get_pasien_by_notran_table_detail()
	{
		// $lis = '{"status":1,"message":"Success","data":[{"sample_id":"2209160036","param":"Code 1","value":"D"},{"sample_id":"2209160036","param":"Code 2","value":"1"},{"sample_id":"2209160036","param":"Sample Distinction Code","value":"U"},{"sample_id":"2209160036","param":"Analyzer Name","value":"     XN-10"},{"sample_id":"2209160036","param":"Caret","value":"^"},{"sample_id":"2209160036","param":"Analyzer Number","value":"49678"},{"sample_id":"2209160036","param":"Sequence No","value":"0000000035"},{"sample_id":"2209160036","param":"Reserved 1","value":"000"},{"sample_id":"2209160036","param":"Sample ID Number","value":"            2209160036"},{"sample_id":"2209160036","param":"Date","value":"20220916"},{"sample_id":"2209160036","param":"Time","value":"1010"},{"sample_id":"2209160036","param":"Priority Code","value":"0"},{"sample_id":"2209160036","param":"Reserved 2","value":"0"},{"sample_id":"2209160036","param":"Rack Number","value":"000000"},{"sample_id":"2209160036","param":"Tube Position Number","value":"00"},{"sample_id":"2209160036","param":"Sample No. Attribute","value":"W\/ Barcode Reader"},{"sample_id":"2209160036","param":"Analysis Mode","value":"Manual analysis (WB)"},{"sample_id":"2209160036","param":"Patient ID","value":"RI1180"},{"sample_id":"2209160036","param":"Analysis Status","value":"Success"},{"sample_id":"2209160036","param":"Judgment on Sample","value":"Positive"},{"sample_id":"2209160036","param":"Positive (Diff)","value":"Normal"},{"sample_id":"2209160036","param":"Positive (Morph)","value":"Abnormal"},{"sample_id":"2209160036","param":"Positive (Count)","value":"Abnormal"},{"sample_id":"2209160036","param":"Error(Func)","value":"No Error"},{"sample_id":"2209160036","param":"Error(Result)","value":"No Error"},{"sample_id":"2209160036","param":"With\/O Order","value":"Analyzed without order"},{"sample_id":"2209160036","param":"Presence Of WBC Abnormal","value":"IP message present"},{"sample_id":"2209160036","param":"Presence Of WBC Suspect","value":"No IP message"},{"sample_id":"2209160036","param":"Presence Of RBC Abnormal","value":"IP message present"},{"sample_id":"2209160036","param":"Presence Of RBC Suspect","value":"No IP message"},{"sample_id":"2209160036","param":"Presence of PLT Abnormal","value":"No IP message"},{"sample_id":"2209160036","param":"Presence of PLT Suspect","value":"No IP message"},{"sample_id":"2209160036","param":"Unit Information","value":"SI units are not used"},{"sample_id":"2209160036","param":"WBC Information","value":"WNR channel"},{"sample_id":"2209160036","param":"PLT Information","value":"RBC\/PLT channel"},{"sample_id":"2209160036","param":"WPC Information","value":"Not tested"},{"sample_id":"2209160036","param":"Order Type","value":"Manual"},{"sample_id":"2209160036","param":"Evaluation Based on Repeat\/Rerun\/Reflex Rule","value":"None"},{"sample_id":"2209160036","param":"Reserved 3","value":"00000000000000000000"},{"sample_id":"2209160036","param":"WBC-BF","value":"       "},{"sample_id":"2209160036","param":"RBC-BF","value":"      "},{"sample_id":"2209160036","param":"MN#","value":"       "},{"sample_id":"2209160036","param":"MN%","value":"     "},{"sample_id":"2209160036","param":"PMN#","value":"       "},{"sample_id":"2209160036","param":"PMN%","value":"     "},{"sample_id":"2209160036","param":"TC-BF#","value":"       "},{"sample_id":"2209160036","param":"HPC%","value":"     "},{"sample_id":"2209160036","param":"IPF#","value":"     "},{"sample_id":"2209160036","param":"Reserved 4","value":"00000000000000000000000000000000000000000000000000000000000000000"},{"sample_id":"2209160036","param":"Text Distinction Code 1","value":"D"},{"sample_id":"2209160036","param":"Text Distinction Code 2","value":"2"},{"sample_id":"2209160036","param":"Sample Distinction Code","value":"U"},{"sample_id":"2209160036","param":"Analyzer Name","value":"     XN-10"},{"sample_id":"2209160036","param":"Caret","value":"^"},{"sample_id":"2209160036","param":"Analyzer Number","value":"49678"},{"sample_id":"2209160036","param":"Sequence No.","value":"0000000035"},{"sample_id":"2209160036","param":"Reserved","value":"000"},{"sample_id":"2209160036","param":"Sample ID Number","value":"            2209160036"},{"sample_id":"2209160036","param":"WBC","value":"005720"},{"sample_id":"2209160036","param":"RBC","value":"02510"},{"sample_id":"2209160036","param":"HGB","value":"00612"},{"sample_id":"2209160036","param":"HCT","value":"01992"},{"sample_id":"2209160036","param":"MCV","value":"07932"},{"sample_id":"2209160036","param":"MCH","value":"02432"},{"sample_id":"2209160036","param":"MCHC","value":"03072"},{"sample_id":"2209160036","param":"PLT","value":"01140"},{"sample_id":"2209160036","param":"LYMPH%","value":"02870"},{"sample_id":"2209160036","param":"MONO%","value":"00450"},{"sample_id":"2209160036","param":"NEUT%","value":"06510"},{"sample_id":"2209160036","param":"EO%","value":"00140"},{"sample_id":"2209160036","param":"BASO%","value":"00030"},{"sample_id":"2209160036","param":"LYMPH#","value":"001640"},{"sample_id":"2209160036","param":"MONO#","value":"000260"},{"sample_id":"2209160036","param":"NEUT#","value":"003720"},{"sample_id":"2209160036","param":"EO#","value":"000080"},{"sample_id":"2209160036","param":"BASO#","value":"000020"},{"sample_id":"2209160036","param":"RDW-CV","value":"01721"},{"sample_id":"2209160036","param":"RDW-SD","value":"04940"},{"sample_id":"2209160036","param":"PDW","value":"01040"},{"sample_id":"2209160036","param":"MPV","value":"00930"},{"sample_id":"2209160036","param":"P-LCR","value":"02100"},{"sample_id":"2209160036","param":"RET%","value":"     "},{"sample_id":"2209160036","param":"RET#","value":"     "},{"sample_id":"2209160036","param":"IRF","value":"     "},{"sample_id":"2209160036","param":"LFR","value":"     "},{"sample_id":"2209160036","param":"MFR","value":"     "},{"sample_id":"2209160036","param":"HFR","value":"     "},{"sample_id":"2209160036","param":"PCT","value":"00112"},{"sample_id":"2209160036","param":"NRBC%","value":"000800"},{"sample_id":"2209160036","param":"NRBC#","value":"000460"},{"sample_id":"2209160036","param":"IG#","value":"000310"},{"sample_id":"2209160036","param":"IG%","value":"00540"},{"sample_id":"2209160036","param":"HPC#","value":"      "},{"sample_id":"2209160036","param":"RET-He","value":"     "},{"sample_id":"2209160036","param":"IPF","value":"     "},{"sample_id":"2209160036","param":"Reserved","value":"0000"}]}';
		// $lis = json_decode($lis);
		// print_r($head->data);die();
		$param = $this->input->post('notransaksi');
		$head = $this->hpm->get_detail_hasil_pemeriksaan($param);
		$regno = $this->hpm->get_head_hasil_pemeriksaan($param);
		$lis = $head['lis'];
		 // echo '<pre>'; print_r($head); exit();
		if($regno == null){
			echo 'Data Tidak Ditemukan';
		}else{
			$parse = array(
				'list' => $head['data'],
				'pasien' => $head['headhasil'],
				'api' => $lis,
				// 'api' => $head['datalis'] ? $head['datalis'][0] : '',
				'head' => $regno,
				'message' => $head['message'],
				'regno' => $regno->Regno,
				'JK' => $regno->KdSex
			);
			  // echo '<pre>';  print_r($parse);die();
			$this->load->view('content/hasil_pemeriksaan/table_hasil_pemeriksaan', $parse);
		}
	}

	public function post_hasil_pemeriksaan()
	{
		$param = $this->input->post();
		// $tes = $_POST['dataanalisis'];
		// echo '<pre>';  print_r($tes);die();
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
 		$date=date("d-F-Y", strtotime($head->Tglhasil));
        $image_name=$head->Nolab.'.png'; //buat name dari qr code sesuai dengan nolab
 		// $dataqr="RSAU, MIKROBIOLOGI,Dokter:".$fdokter->NmDoc.",".$fdokter->korps_ttd.",".$date."";
 		$dataqr="Dokter:".$head->dokterPemeriksa.",".$date."";
 		$params['data'] = $dataqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name;
		$this->ciqrcode->generate($params);

		$detail = $this->hpm->search_group_print($notransaksi, $custom_detail);
		$parse = array(
			'head' => $head,
			'detail' => $detail,
			'infocvd19' => $infoCovid19,
			'qr' => $image_name,
			'tgl_hasil' => $tgl,
		);
		//$this->load->view('content/hasil_pemeriksaan/print_hasil_pemeriksaan', $parse);
		$this->load->view('content/hasil_pemeriksaan/print_hasil_pemeriksaan_format', $parse);
		$this->hpm->increase_print_count($notransaksi);
	}

	function print_hasil_pemeriksaan_pdf1($notransaksi)
	{
		// $this->load->library("pdf");

		$this->load->library('ciqrcode');

		$notransaksi = $notransaksi;
		$infoCovid19 = 'no';
		$custom_detail = '';
		$tgl = '';
		if($tgl == ''){
			$tgl = date('Y-m-d');
		}

		$head = $this->hpm->get_head_hasil_pemeriksaan($notransaksi);
		$fdokter = $this->hpm->get_dokter_kepala();
		$fprofile = $this->hpm->get_fprofile();

		$config['cacheable']    = true; 
        $config['cachedir']     = './assets/';
        $config['errorlog']     = './assets/'; 
        $config['imagedir']     = 'assets/qr/'; //'./assets/qr/';
        $config['quality']      = true;
        $config['size']         = '1024'; 
        $config['black']        = array(224,255,255);
        $config['white']        = array(70,130,180);
        $this->ciqrcode->initialize($config);
 		$date=date("d-F-Y", strtotime($head->Tglhasil));
        $qr=$head->Nolab.'.png'; //buat name dari qr code sesuai dengan nolab
 		// $dataqr="RSAU, MIKROBIOLOGI,Dokter:".$fdokter->NmDoc.",".$fdokter->korps_ttd.",".$date."";
 		$dataqr="Dokter:".$head->dokterPemeriksa.",".$date."";
 		$params['data'] = $dataqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qr;
		$this->ciqrcode->generate($params);

		$detail = $this->hpm->search_group_print($notransaksi, $custom_detail);
		//print_r($detail); exit();

		// $data_header = $this->mth->find_by_code($transaction_code);
		// $data_barang = $this->model_transaction->find_by_code($transaction_code);
		// $data_barang_row = $this->model_transaction->find_by_code_num_row($transaction_code);
		// $data_merchant = $this->model_merchant->find_merchant();

		
			// $tc_pdf = new MYPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
			// $tc_pdf->SetCreator(PDF_CREATOR);
			// $title = "";
			// $tc_pdf->SetTitle('kwitansi');
			// $tc_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
			// $tc_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			// $tc_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			// $tc_pdf->SetDefaultMonospacedFont('helvetica');
			// $tc_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			// $tc_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			// $tc_pdf->SetMargins('3', '3', '3');
			// $tc_pdf->SetAutoPageBreak(TRUE, '1');
			// $tc_pdf->SetFont('helvetica', '', 9);
			// $tc_pdf->setFontSubsetting(false);


			$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor(APP_INST_NAME());
			$pdf->SetTitle('Hasil Lab '.$notransaksi);
			$pdf->SetSubject('TCPDF Tutorial');
			$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(500);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			    require_once(dirname(__FILE__).'/lang/eng.php');
			    $pdf->setLanguageArray($l);
			}

			// ---------------------------------------------------------

			// set font
			$pdf->SetFont('Helvetica','', 10);

			$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', '', '', false, 300, '', false, false, 1, false, false, false);

			$html_header="<style type=\"text/css\">
				.table-font-size{
					font-size:12px;
				    }
				.table-font-size1{
					font-size:9px;
				    }
				.table-font-size2{
					font-size:9px;
					margin : 5px 1px 1px 1px;
					padding : 5px 1px 1px 1px;
				    }
				.table-font-size3{
					font-size:9px;
					margin : 1px 1px 1px 1px;
					padding : 1px 1px 1px 10px;
				    }
				    .garis-kiri{
				   border-collapse: collapse !important;
				   border:1px solid black !important;
				   border-top: none !important;
				   border-bottom: none !important;
				   font-size: 12px !important; 
				   text-align:left !important;
				   }
			   .garis{
				   border-collapse: collapse !important;
				   border:1px solid black !important;
				   border-top: none !important;
				   border-bottom: none !important;
				   font-size: 12px !important; 
				   text-align:center !important;
				    }
				</style> <hr/><br>
				<table class=\"table-font-size\" border=\"0\">
					<tr>
						<td width=\"100%\" style=\"font-size:10px;\" align=\"center\">
							<font style=\"font-size:14px\"><b>HASIL PEMERIKSAAN LABORATORIUM <br></b></font>
						</td>
					</tr>
					<tr>
						<td width=\"50%\" style=\"font-size:8px;\" align=\"left\">
							<table class=\"table-font-size\" border=\"0\">
								<tr>
									<td width=\"30%\" >Nama Pasien</td>
									<td width=\"70%\">: ".$head->Firstname."</td>
								</tr>
								<tr width=\"50%\">
									<td width=\"30%\" >Tanggal Lahir</td>
									<td width=\"70%\">: ".date("d-m-Y", strtotime($head->Bod))."</td>
								</tr>
								<tr>
									<td width=\"30%\" >No. RM</td>
									<td width=\"70%\">: ".$head->MedRec."</td>
								</tr>
								<tr>
									<td >No. Lab</td>
									<td>: ".$head->Nolab."</td>
								</tr>
								<tr>
									<td >Diagnosa</td>
									<td>: </td>
								</tr>
							</table>
						</td>
						<td width=\"50%\" style=\"font-size:8px;\" align=\"left\">
							<table class=\"table-font-size\" border=\"0\">
								<tr>
									<td width=\"30%\" >Ruangan</td>
									<td width=\"70%\">: ".($head->KdBangsal == '' ? $head->NMPoli : $head->NmBangsal.'/'.$head->NMkelas)."</td>
								</tr>
								<tr width=\"50%\">
									<td width=\"30%\" >Tgl. Permintaan</td>
									<td width=\"70%\">: ".date("d-m-Y", strtotime($head->RegDate))." / ".($head->Jam ? date("H:i", strtotime($head->Jam)) : date('H:i'))."</td>
								</tr>
								<tr>
									<td width=\"30%\" >Tgl. Selesai</td>
									<td width=\"70%\">: ".($head->Tglhasil != null ?  date("d-m-Y", strtotime($head->Tglhasil)) : date("d-m-Y", strtotime($head->TglInput)))." / ".($head->Jamhasil != null ? date("H:i", strtotime($head->Jamhasil)) : date('H:i', strtotime($head->TglInput)))."</td>
								</tr>
								<tr>
									<td >Dokter Pengirim</td>
									<td>: ".$head->NmDoc."</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<hr/>
			";
			$html_body="
				<table class=\"table-font-size\" border=\"0\"><tr><th>
				<table class=\"table-font-size1\" style=\"width:100%; align: center;\" border=\"0\">

					<tr  style=\"border-bottom:1px solid black; \">
			            <th width=\"23%\" style=\"border:1px solid black; \" align=\"center\">JENIS PEMERIKSAAN</th>
			            <th width=\"25%\" style=\"border:1px solid black; \" align=\"center\">HASIL</th>
			            <th width=\"12%\" style=\"border:1px solid black; \" align=\"center\">SATUAN</th>
			            <th width=\"18%\" style=\"border:1px solid black; \" align=\"center\">NILAI NORMAL</th>
			            <th width=\"22%\" style=\"border:1px solid black; \" align=\"center\">KETERANGAN</th>
			         </tr>";
	    	$no=0;
	    	$catatan = $head->Catatan;
            $saran =  $head->Saran;
            $kesan = $head->Kesan;
            $analisa = $head->Analisis_dokter;
            for ($i=0; $i < count($detail); $i++):
	              	
	            $html_body.="
	              	<tr style=\"width:100%;\" border=\"0\">
	                  <td width=\"23%\" style=\" text-align:left;border-collapse: collapse;
				   border-right:1px solid black;
				   border-left:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; \" colspan=\"1\" ><b>".$detail[$i]['nmgroup']." </b></td>
	                  <td width=\"25%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	                  <td width=\"12%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	                  <td width=\"18%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	                  <td width=\"22%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	               </tr> ";

	               
	            $statHJ = 0; $a=0; $k=0; 
	            foreach ($detail[$i]['detail'] as $d): 
					/* ocha */
					$bintang = $this->hpm->checkNilaiNormal([
						'kddetail' => $d->KDDetail,
						'gender' => $head->KdSex,
						'nilai' => $d->Hasil
					]);
					/* ---- */
	            // if (($d->NoPrint)!='1') :
	            if (($d->Hasil != '' && $d->KdInput != '4') || ($d->KdInput == '4' && $d->Hasil == '')):  
		            $a++; 
		            if ($a % 2 == 0) {
		                $style = 'D2D2CF';
		            }else{
		                $style = 'FFFFFF';
		            } 
	                                    
		            $html_body.=" <tr bgcolor=\"#".$style."\" border=\"0\">";
		            	if (strlen($d->KDDetail) <= 5): 
		                    $html_body.=" <td style=\" padding-left: 20px; border-collapse: collapse; border-left: 1 solid black; border-right: 1 solid black;
				   border-top: none; border-bottom: none;font-size: 12px; 
				   text-align:left; \" > ".$d->NMDetail." </td>";
		                else: 

		                    if($d->fixSatuan == null || $d->fixSatuan == ""):
		                        $html_body.="<td  style=\"padding-left: 20px; font-weight: bold; border-collapse: collapse; border-left: 1 solid black; border-right: 1 solid black;
				   border-top: none; border-bottom: none;font-size: 12px; 
				   text-align:left;\"> ".$d->NMDetail." </td>";
		                    else:
		                        $html_body.="<td  style=\"padding-left: 20px; border-collapse: collapse; border-left: 1 solid black; border-right: 1 solid black;
				   border-top: none; border-bottom: none;font-size: 12px; 
				   text-align:left;\"> &nbsp;&nbsp;".$d->NMDetail."</td>";
		                    endif;
		                endif; 

						//$hasil = '['.$d->KDDetail.'] '.$d->Hasil.$bintang;
						$hasil = $d->Hasil.$bintang;
		                //$hasil = $d->Hasil; 

		                // if($d->NMDetail == 'HBsAG Titer'): 
		                // 	$hasil = number_format((float)$hasil, 2); 
		                // endif; 
		                
		                // if((float)($d->nhasila<>0) || (float)($d->nhasilb<>0)): 
		                // 	$hasil .= (float)$d->nhasila > (float)$d->Hasil || (float)$d->Hasil > (float)$d->nhasilb ? ' *' : ''; 
		                // endif; 



		                $html_body.="<td  width=\"25%\"class=\"garis\" style=\"width: 30%; text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\"> ".htmlentities($hasil)."</td>";
		                             
		                $html_body.="<td width=\"12%\" class=\"garis\" style=\"text-align:center; border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\">".$d->fixSatuan." </td>";
		                $p=$head;
		                $nilainormal=htmlentities($d->NilaiNormal);

		            if ($d->NMDetail == 'Bilirubin Total' && $d->KDDetail=='3043001'):
		                $html_body.="<td width=\"40%\" colspan=\"2\" class=\"garis\" style=\"text-align:left; border-collapse: collapse;
						   border-right:1px solid black;
						   border-top: none;
						   border-bottom: none;
						   font-size: 12px; \"> "." Adult"."<br>".
				                			" Up to 2.0 mg/dL". "<br><br>".
				                            " premature". "<br>".  
				                            " Up to 24h 1.0-8.0 mg/dL". "<br>".
				                            " Up to 48h 6.0-12.0 mg/dL". "<br>".  
				                            " 3-5 days 10-14 mg/dL". "<br><br>".  
				                            " full-term". "<br>".  
				                            " Up to 24h 2.0-6.0 mg/dL". "<br>".  
				                            " Up to 48h 6.0-10.0 mg/dL". "<br>".  
				                            " 3-5 days 4.0-8.0 mg/dL" 
				                            ."</td>";

				    elseif ($d->NMDetail == 'Tubex TF'):
		                	$html_body.=   
		                    "<td width=\"40%\" colspan=\"2\" class=\"garis\" style=\"text-align:left; border-collapse: collapse;
						   border-right:1px solid black;
						   border-top: none;
						   border-bottom: none;
						   font-size: 12px; \">".htmlentities("
		                            <= 2 : Negatif ")."<br>".
		                			" 3: Borderline". "<br>".
		                            " > 4-5: Positif". "<br>".  
		                            " 6-10: Positif Kuat"
		                            ."</td>";
		                            $html_body.="<td></td>";

		            else:
		            	$html_body.="<td width=\"18%\" class=\"garis\" style=\"text-align:center; border-collapse: collapse;
					   border-right:1px solid black;
					   border-top: none;
					   border-bottom: none;
					   font-size: 12px; \"> ".$nilainormal."</td>";
					    $html_body.="<td  width=\"22%\"  style=\"text-align:left; border-collapse: collapse;
					   border-right:1px solid black;
					   border-top: none;
					   border-bottom: none;
					   font-size: 12px; \">";

		                if ($d->NMDetail == 'PCT (Procalcitonin)'): 
		                 	$html_body.="
		                           Metode : Chemiluminescence
		                           Konsentrasi : 
		                           - 0.05 - 0.5 ng/ml : indikasi risiko rendah sepsis berat atau syok septik. Dapat terjadi pada infeksi lokal atau permulaan infeksi sistemik (<6 jam)
		                           - 0.5-2.0 ng/ml : harus diinterpretasi bersamaan dengan riwayat klinis pasien
		                           - >2.0 ng/ml : indikasi risiko tinggi sepsis berat atau septik syok
		                           - hasil <2.0 ng/ml disarankan pemeriksaan ulang dalam waktu 6-24 jam kemudian
		                           ";
		                elseif ($d->NMDetail == 'HBsAG Titer'):
		                	$html_body.="
		                           Chemiluminescent
		                           ";
		                
		                endif;


		               $html_body.="</td>";

		            endif;
		                
		                
		                $k++;

		               
		            $html_body.="</tr>";

		            if ($d->Hasil == 'Indeterminate' && $d->KDDetail == '8056'){
	                    $catatan = "hasil Indeterminate bisa disebabkan pemakaian obat imunosupresan, pasien dengan kondisi <br> immunocompromise,  pasien dengan anemia, dan hipoalbumin karena proses inflamasi kronik";
	                    $saran = "Periksa ulang IGRA TB setelah faktor yang mempengaruhi hasil pemeriksaan teratasi";
	                    $kesan = "Infeksi M. tuberkulosis tidak dapat diinterpretasikan oleh karena hasil IGRA TB dalam range equivocal"; 
	                }elseif($d->Hasil == 'Positif' && $d->KDDetail == '8056'){
		                $catatan = "";
		                $saran = "- IGRA TB sebagai tambahan pemeriksaan untuk diagnosa klinis pasien dan hasil positif  <br> harus dikolerasikan dengan pemeriksaan klinis, riwayat penyakitn pasien dan hasil  <br> pemeriksaan lainnya seperti BTA, kultur dan radiologi  <br> - keterbatasan data pemeriksaan IGRA TB pada anak usia dibawah 5 Tahun";
	                    $kesan = "Kemungkinan infeksi M.  Tuberkulosisi namun tidak beisa dibedakan TB aktif atau laten"; 
	                }elseif($d->Hasil == 'Negatif' &&  $d->KDDetail == '8056'){
	                    $catatan = "";
	                    $saran = "- IGRA TB sebagai tambahan pemeriksaan untuk diagnosa klinis pasien dan harus dikorelasikan <br> dengan pemeriksaan klinis, riwayat pernyakit pasien dan hasil pemeriksaan lainnya <br>- hasil negatif tidak menyingkirkan kemungkinan infeksi tuberkulosis pada individu dengan <br> gangguan fungsi imun, mendapat terapi supresif atau baru terpapar dengan penderita TB <br>- keterbatasan data pemeriksaan IGRA TB pada anak usia dibawah 5 Tahun";
	                    $kesan = "Kemungkinan tidak terindeksi M Tuberkulosiss aktif atau laten"; 
	                }
	        
	            // endif; 
	            endif; 
	            endforeach;
	        endfor;

			$html_body.="
				</table><hr></th></tr>
				</table>
			";

			$html_footer="
				<table style=\"width:100%;\" nobr=\"true\" border=\"0\">";
			$infocvd19 = 'no';
			if($infocvd19 == 'show'){
				$html_footer.=" <tr>
						<td align=\"left\" >
						<p>Catatan: </p>
					      <p><i>Hasil berupa angka menggunakan sistem desimal dengan separator titik<br>
					         Tanda * menunjukan nilai diatas atau dibawah nilai rujukan</i>
					      </p>
					      <br>
					      <p><i>Keterangan Hasil Rapid Test Covid-19: <br><br>
					         1. Hasil Non-Reaktif belum dapat menyingkirkan kemungkinan adanya infeksi, sehingga masih beresiko menularkan ke orang lain.
					         Hasil Non-Reaktif dapat terjadi karena beberapa kondisi : Window period ( terinfeksi namun antibody belum terbentuk ), 
					         terdapat gangguan pembentukan antibody (immunocompromised) atau kadar antibody dibawah deteksi alat. <br>
					         2. Lakukan pemeriksaan ulang anti SARS-CoV-2 10 Hari kemudian apabila baru pertama kali melakukan pemeriksaan. <br>
					         3. Hasil pemeriksaan antibody tidak digunakan sebagai dasar untuk mendiagnosa infeksi SARS-CoV-2, Status Pasien, atau keputusan klinis. <br>
					         4. Lakukan karantina mandiri dengan menuggunakan masker, cuci tangan sesering mungkin menggunakan sabun, jaga jarak dan hindari keramaian serta berperilaku hidup sehat.</i>
					      </p></td></tr>
				";
				}else{
					$html_footer.="<tr>
						<td align=\"left\">
						<table width=\"100%\" class=\"table-font-size\" >";

					if (!empty($analisa)) {
						$html_footer.="
					         <tr>
					            <td valign=\"top\" width=\"15%\">Analisis Dokter</td>
					            <td width=\"85%\" valign=\"top\">: ".$analisa." <br></td>
					            
					         </tr>
						";
					}

					$html_footer.="
					         <tr>
					            <td valign=\"top\" width=\"15%\">Catatan</td>
					            <td width=\"85%\" valign=\"top\">: ".$catatan." <br></td>
					            
					         </tr>
					         <tr>
					            <td valign=\"top\" width=\"15%\">Kesan</td>
					            <td valign=\"top\">: ".$kesan."<br></td>
					            
					         </tr>
					         <tr>
					            <td valign=\"top\" width=\"15%\">Saran</td>
					            <td valign=\"top\">: ".$saran."</td>
					           
					         </tr>
					      </table></td></tr>
				";
				}
			$html_footer.="</table>";

			
        	$imgqrdecode = base64_encode(file_get_contents(site_url('assets/qr/'.$qr)));
			$html_footer.="
				<table width=\"100%\" style=nobr=\"true\" border=\"0\" align=\"center\">
			      <tr>
			         <td width=\"50%\">&nbsp;</td>
			         <td width=\"50%\">
			               <p>Dr Penanggung Jawab Laboratorium</p>
			               <p>".APP_INST_NAME()."</p>
			               <img width=\"70px\" height=\"70px\" src=\"@" . preg_replace('#^data:image/[^;]+;base64,#', '', $imgqrdecode) . "\">
			               
			         </td>
			      </tr>
			      <tr>	<td width=\"50%\">&nbsp;</td>
			      		<td width=\"50%\">(".$head->dokterPemeriksa.")<br>
			               ".$head->C_PEGAWAI."</td>
			      </tr>
			   </table>";

			$pdf->AddPage();
			ob_start();
				$content = $html_header;
			ob_end_clean();
			$pdf->writeHTML($content, true, false, true, false, '');
			ob_start();
				$content = $html_body;
			ob_end_clean();
			$pdf->writeHTML($content, true, false, true, false, '');
	        $pdf->SetFont('', '', 8);
			ob_start();
				$content = $html_footer;
			ob_end_clean();
			$pdf->writeHTML($content, true, false, true, false, '');
			
			$pdf->Output('kwitansi-01.pdf', 'I');

	}

	function print_hasil_pemeriksaan_pdf($notransaksi)
	{
		// $this->load->library("pdf");

		$this->load->library('ciqrcode');

		$notransaksi = $notransaksi;
		$infoCovid19 = 'no';
		$custom_detail = '';
		$tgl = '';
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
 		$date=date("d-F-Y", strtotime($head->Tglhasil));
        $qr=$head->Nolab.'.png'; //buat name dari qr code sesuai dengan nolab
 		// $dataqr="RSAU, MIKROBIOLOGI,Dokter:".$fdokter->NmDoc.",".$fdokter->korps_ttd.",".$date."";
 		$dataqr="Dokter:".$head->dokterPemeriksa.",".$date."";
 		$params['data'] = $dataqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qr;
		$this->ciqrcode->generate($params);

		$detail = $this->hpm->search_group_print($notransaksi, $custom_detail);
		// $data_header = $this->mth->find_by_code($transaction_code);
		// $data_barang = $this->model_transaction->find_by_code($transaction_code);
		// $data_barang_row = $this->model_transaction->find_by_code_num_row($transaction_code);
		// $data_merchant = $this->model_merchant->find_merchant();

		
			// $tc_pdf = new MYPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
			// $tc_pdf->SetCreator(PDF_CREATOR);
			// $title = "";
			// $tc_pdf->SetTitle('kwitansi');
			// $tc_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
			// $tc_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			// $tc_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			// $tc_pdf->SetDefaultMonospacedFont('helvetica');
			// $tc_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			// $tc_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			// $tc_pdf->SetMargins('3', '3', '3');
			// $tc_pdf->SetAutoPageBreak(TRUE, '1');
			// $tc_pdf->SetFont('helvetica', '', 9);
			// $tc_pdf->setFontSubsetting(false);


			$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Nicola Asuni');
			$pdf->SetTitle('Hasil Lab '.$notransaksi);
			$pdf->SetSubject('TCPDF Tutorial');
			$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(500);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			    require_once(dirname(__FILE__).'/lang/eng.php');
			    $pdf->setLanguageArray($l);
			}

			// ---------------------------------------------------------

			// set font
			$pdf->SetFont('Helvetica','', 10);

			$pdf->Image('images/image_demo.jpg', '', '', 40, 40, '', '', '', false, 300, '', false, false, 1, false, false, false);

			$html_header="<style type=\"text/css\">
				.table-font-size{
					font-size:12px;
				    }
				.table-font-size1{
					font-size:9px;
				    }
				.table-font-size2{
					font-size:9px;
					margin : 5px 1px 1px 1px;
					padding : 5px 1px 1px 1px;
				    }
				.table-font-size3{
					font-size:9px;
					margin : 1px 1px 1px 1px;
					padding : 1px 1px 1px 10px;
				    }
				    .garis-kiri{
				   border-collapse: collapse !important;
				   border:1px solid black !important;
				   border-top: none !important;
				   border-bottom: none !important;
				   font-size: 12px !important; 
				   text-align:left !important;
				   }
			   .garis{
				   border-collapse: collapse !important;
				   border:1px solid black !important;
				   border-top: none !important;
				   border-bottom: none !important;
				   font-size: 12px !important; 
				   text-align:center !important;
				    }
				</style> <hr/><br>
				<table class=\"table-font-size\" border=\"0\">
					<tr>
						<td width=\"100%\" style=\"font-size:10px;\" align=\"center\">
							<font style=\"font-size:14px\"><b>HASIL PEMERIKSAAN LABORATORIUM <br></b></font>
						</td>
					</tr>
					<tr>
						<td width=\"50%\" style=\"font-size:8px;\" align=\"left\">
							<table class=\"table-font-size\" border=\"0\">
								<tr>
									<td width=\"30%\" >Nama Pasien</td>
									<td width=\"70%\">: ".$head->Firstname."</td>
								</tr>
								<tr width=\"50%\">
									<td width=\"30%\" >Tanggal Lahir</td>
									<td width=\"70%\">: ".date("d-m-Y", strtotime($head->Bod))."</td>
								</tr>
								<tr>
									<td width=\"30%\" >No. RM</td>
									<td width=\"70%\">: ".$head->MedRec."</td>
								</tr>
								<tr>
									<td >No. Lab</td>
									<td>: ".$head->Nolab."</td>
								</tr>
								<tr>
									<td >Diagnosa</td>
									<td>: </td>
								</tr>
							</table>
						</td>
						<td width=\"50%\" style=\"font-size:8px;\" align=\"left\">
							<table class=\"table-font-size\" border=\"0\">
								<tr>
									<td width=\"30%\" >Ruangan</td>
									<td width=\"70%\">: ".($head->KdBangsal == '' ? $head->NMPoli : $head->NmBangsal.'/'.$head->NMkelas)."</td>
								</tr>
								<tr width=\"50%\">
									<td width=\"30%\" >Tgl. Permintaan</td>
									<td width=\"70%\">: ".date("d-m-Y", strtotime($head->RegDate))." / ".($head->Jam ? date("H:i", strtotime($head->Jam)) : date('H:i'))."</td>
								</tr>
								<tr>
									<td width=\"30%\" >Tgl. Selesai</td>
									<td width=\"70%\">: ".($head->Tglhasil != null ?  date("d-m-Y", strtotime($head->Tglhasil)) : date("d-m-Y", strtotime($head->TglInput)))." / ".($head->Jamhasil != null ? date("H:i", strtotime($head->Jamhasil)) : date('H:i', strtotime($head->TglInput)))."</td>
								</tr>
								<tr>
									<td >Dokter Pengirim</td>
									<td>: ".$head->NmDoc."</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<hr/>
			";
			$html_body="
				<table class=\"table-font-size\" border=\"0\"><tr><th>
				<table class=\"table-font-size1\" style=\"width:100%; align: center;\" border=\"0\">

					<tr  style=\"border-bottom:1px solid black; \">
			            <th width=\"23%\" style=\"border:1px solid black; \" align=\"center\">JENIS PEMERIKSAAN</th>
			            <th width=\"25%\" style=\"border:1px solid black; \" align=\"center\">HASIL</th>
			            <th width=\"12%\" style=\"border:1px solid black; \" align=\"center\">SATUAN</th>
			            <th width=\"18%\" style=\"border:1px solid black; \" align=\"center\">NILAI NORMAL</th>
			            <th width=\"22%\" style=\"border:1px solid black; \" align=\"center\">KETERANGAN</th>
			         </tr>";
	    	$no=0;
	    	$catatan = $head->Catatan;
            $saran =  $head->Saran;
            $kesan = $head->Kesan;

            $analisa = $head->Analisis_dokter;
            for ($i=0; $i < count($detail); $i++):
	              	
	            $html_body.="
	              	<tr style=\"width:100%;\" border=\"0\">
	                  <td width=\"23%\" style=\" text-align:left;border-collapse: collapse;
				   border-right:1px solid black;
				   border-left:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; \" colspan=\"1\" ><b>".$detail[$i]['nmgroup']." </b></td>
	                  <td width=\"25%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	                  <td width=\"12%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	                  <td width=\"18%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	                  <td width=\"22%\" style=\" text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\" colspan=\"1\" ></td>
	               </tr> ";

	               
	            $statHJ = 0; $a=0; $k=0; 
	            foreach ($detail[$i]['detail'] as $d): 
	            // if (($d->NoPrint)!='1') :
	            if (($d->Hasil != '' && $d->KdInput != '4') || ($d->KdInput == '4' && $d->Hasil == '')):  
		            $a++; 
		            if ($a % 2 == 0) {
		                $style = 'D2D2CF';
		            }else{
		                $style = 'FFFFFF';
		            } 
	                                    
		            $html_body.=" <tr bgcolor=\"#".$style."\" border=\"0\">";
		            	if (strlen($d->KDDetail) <= 5): 
		                    $html_body.=" <td style=\" padding-left: 20px; border-collapse: collapse; border-left: 1 solid black; border-right: 1 solid black;
				   border-top: none; border-bottom: none;font-size: 12px; 
				   text-align:left; \" > ".$d->NMDetail." </td>";
		                else: 
		                    if($d->fixSatuan == null || $d->fixSatuan == ""):
		                        $html_body.="<td  style=\"padding-left: 20px; font-weight: bold; border-collapse: collapse; border-left: 1 solid black; border-right: 1 solid black;
				   border-top: none; border-bottom: none;font-size: 12px; 
				   text-align:left;\"> ".$d->NMDetail." </td>";
		                    else:
		                        $html_body.="<td  style=\"padding-left: 20px; border-collapse: collapse; border-left: 1 solid black; border-right: 1 solid black;
				   border-top: none; border-bottom: none;font-size: 12px; 
				   text-align:left;\"> &nbsp;&nbsp;".$d->NMDetail."</td>";
		                    endif;
		                endif; 

		                $hasil = $d->Hasil; 
		                // if($d->NMDetail == 'HBsAG Titer'): 
		                // 	$hasil = number_format((float)$hasil, 2); 
		                // endif; 
		                
		                // if((float)($d->nhasila<>0) || (float)($d->nhasilb<>0)): 
		                // 	$hasil .= (float)$d->nhasila > (float)$d->Hasil || (float)$d->Hasil > (float)$d->nhasilb ? ' *' : ''; 
		                // endif; 



		                $html_body.="<td  width=\"25%\"class=\"garis\" style=\"width: 30%; text-align:center;border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\"> ".htmlentities($hasil)."</td>";
		                             
		                $html_body.="<td width=\"12%\" class=\"garis\" style=\"text-align:center; border-collapse: collapse;
				   border-right:1px solid black;
				   border-top: none;
				   border-bottom: none;
				   font-size: 12px; 
				   text-align:center;\">".$d->fixSatuan." </td>";
		                $p=$head;
		                $nilainormal=htmlentities($d->NilaiNormal);

		            if ($d->NMDetail == 'Bilirubin Total' && $d->KDDetail=='3043001'):
		                $html_body.="<td width=\"40%\" colspan=\"2\" class=\"garis\" style=\"text-align:left; border-collapse: collapse;
						   border-right:1px solid black;
						   border-top: none;
						   border-bottom: none;
						   font-size: 12px; \"> "." Adult"."<br>".
				                			" Up to 2.0 mg/dL". "<br><br>".
				                            " premature". "<br>".  
				                            " Up to 24h 1.0-8.0 mg/dL". "<br>".
				                            " Up to 48h 6.0-12.0 mg/dL". "<br>".  
				                            " 3-5 days 10-14 mg/dL". "<br><br>".  
				                            " full-term". "<br>".  
				                            " Up to 24h 2.0-6.0 mg/dL". "<br>".  
				                            " Up to 48h 6.0-10.0 mg/dL". "<br>".  
				                            " 3-5 days 4.0-8.0 mg/dL" 
				                            ."</td>";

				    elseif ($d->NMDetail == 'Tubex TF'):
		                	$html_body.=   
		                    "<td width=\"40%\" colspan=\"2\" class=\"garis\" style=\"text-align:left; border-collapse: collapse;
						   border-right:1px solid black;
						   border-top: none;
						   border-bottom: none;
						   font-size: 12px; \">".htmlentities("
		                            <= 2 : Negatif ")."<br>".
		                			" 3: Borderline". "<br>".
		                            " > 4-5: Positif". "<br>".  
		                            " 6-10: Positif Kuat"
		                            ."</td>";
		                            $html_body.="<td></td>";

		            else:
		            	$html_body.="<td width=\"18%\" class=\"garis\" style=\"text-align:center; border-collapse: collapse;
					   border-right:1px solid black;
					   border-top: none;
					   border-bottom: none;
					   font-size: 12px; \"> ".$nilainormal."</td>";
					    $html_body.="<td  width=\"22%\"  style=\"text-align:left; border-collapse: collapse;
					   border-right:1px solid black;
					   border-top: none;
					   border-bottom: none;
					   font-size: 12px; \">";

		                if ($d->NMDetail == 'PCT (Procalcitonin)'): 
		                 	$html_body.="
		                           Metode : Chemiluminescence
		                           Konsentrasi : 
		                           - 0.05 - 0.5 ng/ml : indikasi risiko rendah sepsis berat atau syok septik. Dapat terjadi pada infeksi lokal atau permulaan infeksi sistemik (<6 jam)
		                           - 0.5-2.0 ng/ml : harus diinterpretasi bersamaan dengan riwayat klinis pasien
		                           - >2.0 ng/ml : indikasi risiko tinggi sepsis berat atau septik syok
		                           - hasil <2.0 ng/ml disarankan pemeriksaan ulang dalam waktu 6-24 jam kemudian
		                           ";
		                elseif ($d->NMDetail == 'HBsAG Titer'):
		                	$html_body.="
		                           Chemiluminescent
		                           ";
		                
		                endif;


		               $html_body.="</td>";

		            endif;
		                
		                
		                $k++;

		               
		            $html_body.="</tr>";

		            if ($d->Hasil == 'Indeterminate' && $d->KDDetail == '8056'){
	                    $catatan = "hasil Indeterminate bisa disebabkan pemakaian obat imunosupresan, pasien dengan kondisi <br> immunocompromise,  pasien dengan anemia, dan hipoalbumin karena proses inflamasi kronik";
	                    $saran = "Periksa ulang IGRA TB setelah faktor yang mempengaruhi hasil pemeriksaan teratasi";
	                    $kesan = "Infeksi M. tuberkulosis tidak dapat diinterpretasikan oleh karena hasil IGRA TB dalam range equivocal"; 
	                }elseif($d->Hasil == 'Positif' && $d->KDDetail == '8056'){
		                $catatan = "";
		                $saran = "- IGRA TB sebagai tambahan pemeriksaan untuk diagnosa klinis pasien dan hasil positif  <br> harus dikolerasikan dengan pemeriksaan klinis, riwayat penyakitn pasien dan hasil  <br> pemeriksaan lainnya seperti BTA, kultur dan radiologi  <br> - keterbatasan data pemeriksaan IGRA TB pada anak usia dibawah 5 Tahun";
	                    $kesan = "Kemungkinan infeksi M.  Tuberkulosisi namun tidak beisa dibedakan TB aktif atau laten"; 
	                }elseif($d->Hasil == 'Negatif' &&  $d->KDDetail == '8056'){
	                    $catatan = "";
	                    $saran = "- IGRA TB sebagai tambahan pemeriksaan untuk diagnosa klinis pasien dan harus dikorelasikan <br> dengan pemeriksaan klinis, riwayat pernyakit pasien dan hasil pemeriksaan lainnya <br>- hasil negatif tidak menyingkirkan kemungkinan infeksi tuberkulosis pada individu dengan <br> gangguan fungsi imun, mendapat terapi supresif atau baru terpapar dengan penderita TB <br>- keterbatasan data pemeriksaan IGRA TB pada anak usia dibawah 5 Tahun";
	                    $kesan = "Kemungkinan tidak terindeksi M Tuberkulosiss aktif atau laten"; 
	                }
	        
	            // endif; 
	            endif; 
	            endforeach;
	        endfor;

			$html_body.="
				</table><hr></th></tr>
				</table>
			";

			$html_footer="
				<table style=\"width:100%;\" nobr=\"true\" border=\"0\">";
			$infocvd19 = 'no';
			if($infocvd19 == 'show'){
				$html_footer.=" <tr>
						<td align=\"left\" >
						<p>Catatan: </p>
					      <p><i>Hasil berupa angka menggunakan sistem desimal dengan separator titik<br>
					         Tanda * menunjukan nilai diatas atau dibawah nilai rujukan</i>
					      </p>
					      <br>
					      <p><i>Keterangan Hasil Rapid Test Covid-19: <br><br>
					         1. Hasil Non-Reaktif belum dapat menyingkirkan kemungkinan adanya infeksi, sehingga masih beresiko menularkan ke orang lain.
					         Hasil Non-Reaktif dapat terjadi karena beberapa kondisi : Window period ( terinfeksi namun antibody belum terbentuk ), 
					         terdapat gangguan pembentukan antibody (immunocompromised) atau kadar antibody dibawah deteksi alat. <br>
					         2. Lakukan pemeriksaan ulang anti SARS-CoV-2 10 Hari kemudian apabila baru pertama kali melakukan pemeriksaan. <br>
					         3. Hasil pemeriksaan antibody tidak digunakan sebagai dasar untuk mendiagnosa infeksi SARS-CoV-2, Status Pasien, atau keputusan klinis. <br>
					         4. Lakukan karantina mandiri dengan menuggunakan masker, cuci tangan sesering mungkin menggunakan sabun, jaga jarak dan hindari keramaian serta berperilaku hidup sehat.</i>
					      </p></td></tr>
				";
				}else{
					$html_footer.="<tr>
						<td align=\"left\">
						<table width=\"100%\" class=\"table-font-size\" >";

					if (!empty($analisa)) {
						$html_footer.="
					         <tr>
					            <td valign=\"top\" width=\"15%\">Analisis Dokter</td>
					            <td width=\"85%\" valign=\"top\">: ".$analisa." <br></td>
					            
					         </tr>
						";
					}

					$html_footer.="
					         <tr>
					            <td valign=\"top\" width=\"15%\">Catatan</td>
					            <td width=\"85%\" valign=\"top\">: ".$catatan." <br></td>
					            
					         </tr>
					         <tr>
					            <td valign=\"top\" width=\"15%\">Kesan</td>
					            <td valign=\"top\">: ".$kesan."<br></td>
					            
					         </tr>
					         <tr>
					            <td valign=\"top\" width=\"15%\">Saran</td>
					            <td valign=\"top\">: ".$saran."</td>
					           
					         </tr>
					      </table></td></tr>
				";
				}
			$html_footer.="</table>";

			
        	$imgqrdecode = base64_encode(file_get_contents(site_url('assets/qr/'.$qr)));
			$html_footer.="
				<table width=\"100%\" style=nobr=\"true\" border=\"0\" align=\"center\">
			      <tr>
			         <td width=\"50%\">&nbsp;</td>
			         <td width=\"50%\">
			               <p>Dr Penanggung Jawab Laboratorium</p>
			               <p>RSUD RAJA AHMAD TABIB TANJUNG PINANG</p>
			               <img width=\"70px\" height=\"70px\" src=\"@" . preg_replace('#^data:image/[^;]+;base64,#', '', $imgqrdecode) . "\">
			               
			         </td>
			      </tr>
			      <tr>	<td width=\"50%\">&nbsp;</td>
			      		<td width=\"50%\">(".$head->dokterPemeriksa.")<br>
			               ".$head->C_PEGAWAI."</td>
			      </tr>
			   </table>";

			$pdf->AddPage();
			ob_start();
				$content = $html_header;
			ob_end_clean();
			$pdf->writeHTML($content, true, false, true, false, '');
			ob_start();
				$content = $html_body;
			ob_end_clean();
			$pdf->writeHTML($content, true, false, true, false, '');
	        $pdf->SetFont('', '', 8);
			ob_start();
				$content = $html_footer;
			ob_end_clean();
			$pdf->writeHTML($content, true, false, true, false, '');
			
			$pdf->Output('kwitansi-01.pdf', 'I');

	}


	public function print_hasil_pemeriksaan_ori()
	{
		$this->load->library('ciqrcode');

		$notransaksi = $this->input->get('notransaksi');
		$infoCovid19 = $this->input->get('infoCovid19');
		$custom_detail = $this->input->get('kode_detail');
		$tgl = $this->input->get('TglHasil');
		if($tgl == ''){
			$tgl = date('Y-m-d');
		}

		$list = $this->hpm->get_detail_hasil_pemeriksaan($notransaksi);
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
 		$date=date("d-F-Y", strtotime($head->Tglhasil));
        $image_name=$head->Nolab.'.png'; //buat name dari qr code sesuai dengan nolab
 		// $dataqr="RSAU, MIKROBIOLOGI,Dokter:".$fdokter->NmDoc.",".$fdokter->korps_ttd.",".$date."";
 		$dataqr="Dokter:".$head->dokterPemeriksa.",".$date."";
 		$params['data'] = $dataqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name;
		$this->ciqrcode->generate($params);

		// echo "<pre>"; print_r($infoCovid19); die();
		$detail = $this->hpm->search_group_print($notransaksi, $custom_detail);
		$parse = array(
			'head' => $head,
			'pasien' => $list,
			'detail' => $detail,
			'infocvd19' => $infoCovid19,
			'qr' => $image_name,
			'tgl_hasil' => $tgl,
		);

		//$this->load->view('content/hasil_pemeriksaan/print_hasil_pemeriksaan', $parse);
		$this->load->view('content/hasil_pemeriksaan/print_hasil_pemeriksaan_format', $parse);
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
		// $histori_old = $this->hpm->api_histori_pemeriksaan_pasien($medrec, $search_pemeriksaan->KdMappingHistori);

		$parse = array(
			'histori_new' => $histori_new
		);
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

class MYPDF extends TCPDF {


    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $image_file = 'assets/images/kop_surat.png';
        $img = file_get_contents(base_url('assets/images/kop_surat.png'));
        $this->Image('@' . $img, 0, 0, 200, 300, 'png', '', 'T', true, 300, '', false, false, 0, true, true, false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        date_default_timezone_set('Asia/Jakarta'); // CDT
            $current_date = date('d-m-Y H:i:s');
        // Page number
        $this->Cell(0, 15, 'Halaman '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 5, '* tanda bintang menunjukkan hasil di atas atau di bawah nilai referensi.', 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 20, 'Dicetak: '.$current_date , 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillingPemeriksaan extends CI_Controller {

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
		$this->load->model("Register_model","rm");
		$this->load->model("BillingPemeriksaan_model","bpm");
	}

	public function index()
	{
		$parse = array (
			'title'	    => 'Billing Pemeriksaan',
			'main_menu' => 'billinglab',
            'content'   => 'content/billing_pemeriksaan/index',
            'regno'		=> $this->input->get('Regno'),
			'csrf'	    => $this->csrf,
		);

		$this->load->view('layouts/wrapper', $parse);
	}

	public function pasien_by_regno()
	{
		$data = $this->input->post('regno');
    	$up = $this->rm->get_pasien_by_rm($data);
    	$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
	}

	public function show_detail()
	{

		$parse = array(
			'title'	    => 'Billing Pemeriksaan',
			'main_menu' => 'billinglab',
            'content'   => 'content/billing_pemeriksaan/billing_pemeriksaan_detail',
			'csrf'	    => $this->csrf
		);
		$this->load->view('layouts/wrapper', $parse);
	}

	public function list_billing()
	{
		$date1 = $this->input->post('date1') ?? Date('Y-m-d');
		$date2 = $this->input->post('date2') ?? Date('Y-m-d');
		$data = $this->bpm->list_billing_pemeriksaan($date1, $date2);

		$parse = array(
			'date1' => $date1,
			'date2' => $date2,
			'list' => $data
		);
		$this->load->view('content/billing_pemeriksaan/list_billing', $parse);	
	}

	public function show_group_pemeriksaan_lab()
	{
		$kdgroup = $this->input->post('kdgroup');
		$kdgroup == '' ? $list = $this->bpm->group_lab() : $list = $this->bpm->pemeriksaan_lab($kdgroup);

		$parse = array(
			'list' => $list,
			'status' => $kdgroup == '' ? true : false
		);
		$this->load->view('content/nilai_normal/group_lab', $parse);
	}

	public function check_tarif_pemeriksaan()
	{
		$params = $this->input->post();
		$data = $this->bpm->create_new_pemeriksaan($params);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($data));
	}

	public function check_tarif_pemeriksaan_by_kdmapping()
	{
		$kdmapping = $this->input->post('kdmapping');
		$data = $this->bpm->tarif_pemeriksaan_by_kdmapping($kdmapping);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($data));
	}

	public function get_pasien_by_regno()
	{
		$data = $this->input->post('regno');
		$data_pasien = $this->rm->get_pasien_by_regno($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($data_pasien));
	}

	public function detail_billing_pasien()
	{
		$detail = $this->bpm->get_billing_detail($this->input->get('notran'));

		$parse = array(
			'status' => true,
			'notran' => $this->input->get('notran'),
			'detail' => $detail
		);
		$this->load->view('content/billing_pemeriksaan/table_billing_pemeriksaan', $parse);
	}

	public function post_transaksi()
	{
		$data = $this->input->post();
    	$up = $this->bpm->create_billing_pemeriksaan($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
	}

	public function delete_transaksi()
	{
		$notran = $this->input->post('notran');
		$up = $this->bpm->delete_billing_laboratorium($notran);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($up));
	}

	public function delete_one_billing()
	{
		$params = $this->input->post();
		$delete = $this->bpm->delete_billing_laboratorium_one($params);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($delete));
	}

	public function print_label_billing()
	{
		if (!empty($notran)) {$notransaksi = $notran;} else {$notransaksi =  $this->input->get('notransaksi');}

		$cetak = $this->input->get('cetak') ?? '3';
		$data = $this->bpm->get_label_billing($notransaksi);
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		//print_r($data); die();
		$img = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->NoLab, $generator::TYPE_CODE_128)) . '">';
		$parse = array(
			'data' => $data,
			'looping' => $cetak,
			'image' => $img
		);
		// $this->load->view('content/billing_pemeriksaan/isi_mesin', $parse);
		//$this->load->view('content/billing_pemeriksaan/label_billing', $parse);
		$this->load->view('content/billing_pemeriksaan/label_billing_single_column', $parse);
	}

	public function print_rincian_biaya_billing_pemeriksaan()
	{
		$notransaksi = $this->input->get('notransaksi');
		$head = $this->bpm->get_label_billing($notransaksi);
		$detail = $this->bpm->get_billing_detail($notransaksi);
		$parse = array(
			'head' => $head,
			'detail' => $detail
		);
		$this->load->view('content/billing_pemeriksaan/rincian_billing_pemeriksaan', $parse);
	}

	public function post_new_pemeriksaan()
	{
		$data = $this->input->post();
		$post = $this->bpm->create_new_pemeriksaan($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));
	}

	public function update_total_biaya()
	{
		$data = $this->input->post();
		$post = $this->bpm->update_total_biaya($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));	
	}

	public function update_dokter_pengirim()
	{
		$data = $this->input->post();
		$post = $this->bpm->update_dokter_pengirim($data);
		$this->output
	    	->set_content_type('json')
	    	->set_output(json_encode($post));	
	}

	public function pilih_mesin()
	{
		$notransaksi = $this->input->get('notransaksi');
		$data = $this->bpm->get_label_billing($notransaksi);

		$parse = array(
			'title'	    => 'Billing Pemeriksaan',
			'main_menu' => 'billinglab',
            'content'   => 'content/billing_pemeriksaan/isi_mesin',
			'csrf'	    => $this->csrf,
			'data' => $data
		);
		$this->load->view('layouts/wrapper', $parse);

	}

	public function get_mesin()
    {
        $list = $this->mm->get_data_mesin();

		$data = [];
		$no    = 0;

		foreach ($list as $tind) {
			$no++;
			$row    = [];
			$row[]  = $no; 
			$row[]  = $tind->nm_mesin;
			$row[]  = '<input type="checkbox" id="pilih" name="'.$tind->nm_function.'" value="ya">';
			$data[] = $row;
		}

		$output = [
			// 'draw'            => $_POST['draw'],
			// 'recordsTotal'    => $this->Model_employee_fee->count_all_date($tgl_awal, $tgl_akhir),
			// 'recordsFiltered' => $this->Model_employee_fee->count_filtered_date($tgl_awal, $tgl_akhir),
			'data' => $data,
		];
		echo json_encode($output);
    }

    public function save_mesin()
    {
		$notrans = $this->input->post('notrans');
		$nolab = $this->input->post('nolab');
		$nmfunctions = $this->input->post('nmfunctions');

		for ($i=0; $i < count($nmfunctions) ; $i++) { 
			$data[$i]['id_checklist'] = $notrans.'-'.$nolab;
			$data[$i]['notransaksi'] = $notrans;
			$data[$i]['nolab'] = $nolab;
			$data[$i]['nm_function'] = $nmfunctions[$i];
			$data[$i]['tglpilih'] = date('Y-m-d H:i:s');
		}

		$data = $this->bpm->save_mesin($data);
		// if ($data) {
		// 	$resp = $this->print_label_billing($notrans,$nolab);
		// }

		echo json_encode(
			array(
				'notrans' => $notrans,
				'nolab' => $nolab,
			)
		);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_pasien extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model', 'reg');
		$this->load->model('Poli_model', 'pm');
		$this->load->model('Bangsal_model', 'bm');
	}

	public function index()
	{
		$params = $this->input_sanitizer->method('get')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('instalasi')
			->string('poli')
			->string('ruangan')
			->string('term')
			->value('array');

		$result = $this->reg->get_list_pasien($params);
		$bangsal_list = $this->bm->get_all_bangsal();
		$poli_list = $this->pm->get_all_poli();
		// echo "<pre>";
		// var_dump($result);exit();

		$parse = array(
			'title' => 'List Pasien',
			'main_menu' => 'listpasien',
			'content' => 'content/list_pasien/list',
			'page_list' => $result,
			'bangsal_list' => $bangsal_list,
			'poli_list' => $poli_list,
			'input' => $params,
		);

		$this->load->view('layouts/wrapper', $parse);
	}

	public function print_pasien()
	{
		$params = $this->input_sanitizer->method('get')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('instalasi')
			->string('poli')
			->string('ruangan')
			->string('term')
			->value('array');

		$result = $this->reg->get_all_list_pasien($params);
		$bangsal_list = $this->bm->get_all_bangsal();
		$poli_list = $this->pm->get_all_poli();
		// echo "<pre>";
		// var_dump($result);exit();

		$parse = array(
			'title' => 'List Pasien',
			'main_menu' => 'listpasien',
			'content' => 'content/list_pasien/print_report_pasient',
			'page_list' => $result,
			'bangsal_list' => $bangsal_list,
			'poli_list' => $poli_list,
			'input' => $params,
		);

		$this->load->view('layouts/print', $parse);
	}

	public function table_part()
	{
		$params = $this->input_sanitizer->method('get')
			->date('from_date', ['d/m/Y', 'Y-m-d'])
			->date('to_date', ['d/m/Y', 'Y-m-d'])
			->integer('instalasi')
			->string('poli')
			->string('ruangan')
			->string('term')
			->value('array');

		$result = $this->reg->get_list_pasien($params);

		$base_view = 'content/list_pasien/list';

		$output = [
			'result' => $result,
			'html_table_rows' => $this->load->view($base_view.'.table-rows.php', [
				'data' => $result->data
			], TRUE),
			'html_pagination' => $this->load->view($base_view.'.pagination.php', array_merge((Array) $result->pagination, [
				'input'  => $params,
			]), TRUE),
		];

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{
	public function dokter()
	{
		$this->load->model('Dokter_model', 'dm');

		$params = $this->input_sanitizer->method('get')
			->string('term')
			->value('array');

		$result = $this->dm->get_dokter_page($params);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	public function registrasi($regno = NULL)
	{
		if(empty($regno)) return show_404();

		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$register = $this->bpm->get_billing_pasien_by_regno($regno);
		if(empty($register)) return show_404();
		$register->listTransaksiMarkup = $this->load->view('content/billing/form.list-transaksi-table-rows.php', [
			'list_transaksi' => $register->list_transaksi,
		], TRUE);

		$register->listDetailMarkup = $this->load->view('content/billing/form.detail-table-rows.php', [
			'list_detail' => []
		], TRUE);

		if($register->TransaksiSekarang)
		{
			$register->TransaksiSekarang->listDetailMarkup = $this->load->view('content/billing/form.detail-table-rows.php', [
				'list_detail' => $register->TransaksiSekarang->list_detail,
			], TRUE);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($register));
	}

	public function billing($no_trans = NULL)
	{
		if(empty($no_trans)) return show_404();

		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$billing = $this->bpm->get_billing_pasien_by_no_trans($no_trans);
		if(empty($billing)) return show_404();

		$billing->listDetailMarkup = $this->load->view('content/billing/form.detail-table-rows.php', [
			'list_detail' => $billing->list_detail,
		], TRUE);

		$register = $this->bpm->get_billing_pasien_by_regno($billing->Regno);
		$register->listTransaksiMarkup = $this->load->view('content/billing/form.list-transaksi-table-rows.php', [
			'list_transaksi' => $register->list_transaksi,
		], TRUE);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(compact('register', 'billing')));
	}

	public function hapus_detail_billing($no_trans = NULL, $kode_detail = NULL)
	{
		$this->output->set_content_type('application/json');

		if(empty($no_trans) || empty($kode_detail))
		{
			return $this->output->set_output(json_encode(['success' => FALSE]));
		}

		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$result = $this->bpm->hapus_detail_billing($no_trans, $kode_detail);

		return $this->output->set_output(json_encode($result));
	}

	public function hapus_billing($no_tran = NULL)
	{
		if(empty($no_tran)) return show_404();

		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$success = $this->bpm->hapus_billing($no_tran);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(compact('success')));
	}

	public function hapus_list_order($no_tran = NULL)
	{
		if(empty($no_tran)) return show_404();

		$this->load->model('List_order_model', 'lom');

		$success = $this->lom->hapus($no_tran);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(compact('success')));
	}

	public function get_detail_tindakan($kode_group = NULL)
	{
		if(empty($kode_group)) return show_404();

		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$result = ['list_detail' => $this->bpm->get_detail_tindakan($kode_group)];

		// echo "<pre>";
		// var_dump($result['list_detail']);exit();

		if(!empty($result['list_detail']))
		{
			$result['listDetailMarkup'] = $this->load->view('content/billing/form.tindakan-table-rows.php', [
				'type'        => 'detail',
				'list_detail' => $result['list_detail'],
			], TRUE);
		}

		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	/* ocha */
	public function get_detail_tindakan_search(){
		$keyword = $this->input->get('keyword');
		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$result = $this->bpm->searchTindakanLab($keyword);
		$output = [
			'status' => $result ? '200' : '404',
			'list_detail' => $result
		];

		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}
	/* ---- */

	public function simpan_billing()
	{
		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$params = $this->input_sanitizer->method('post')
			->string('no_tran')
			->string('regno')
			->string('dok_pengirim')
			->string('dok_pemeriksa')
			->date('tgl_selesai', ['d/m/Y', 'Y-m-d'], FALSE)
			->date('jam_selesai', 'H:i:s', FALSE)
			->date('tgl_transaksi', ['d/m/Y', 'Y-m-d'])
			->date('jam_transaksi', 'H:i:s')
			->integer('status')
			->string('UmurThn')
			->string('UmurBln')
			->string('UmurHari')
			->integer('jenis_pemeriksaan')
			->value();

		$params->tgl_transaksi = $params->tgl_transaksi ? $params->tgl_transaksi->format('Y-m-d') : NULL;
		$params->jam_transaksi = $params->jam_transaksi ? $params->jam_transaksi->format('H:i:s') : NULL;
		$params->tgl_selesai = $params->tgl_selesai ? $params->tgl_selesai->format('Y-m-d') : NULL;
		$params->jam_selesai = $params->jam_selesai ? $params->jam_selesai->format('H:i:s') : NULL;
		$result = $this->bpm->simpan_head_billing((Array) $params);

		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode(['success' => boolval($result), 'result' => $result]));
	}

	public function tambah_tindakan()
	{
		$this->load->model('BillingPemeriksaan_model', 'bpm');

		$params = $this->input_sanitizer->method('post')
			->string('no_tran')
			->string('kode_tindakan')
			->string('kode_input')
			->integer('last_nomor')
			->value('array');

		$result = $this->bpm->tambah_detail_billing($params);

		/* ocha */
		$exist = $this->bpm->getTindakanDetail($this->input->post('kode_tindakan'));

		$output = [
			'success' => boolval($result),
			'result' => $result,
			'listDetailMarkup' => '',
			'status' => $exist ? true : false
		];

		if(!empty($result))
		{
			$output['listDetailMarkup'] = $this->load->view('content/billing/form.detail-table-rows.php', 
				array_merge ($result, [
					'last_number' => $params['last_nomor'],
				])
			, TRUE);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}
}
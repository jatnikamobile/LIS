<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	protected $csrf;
	public function __construct()
	{
		// Untuk load model user
		parent::__construct();
		if ($this->session->has_userdata('akses_level')) redirect('Beranda');
		$this->load->model('user_model', 'um');
		$this->csrf = array(
			'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()
		);
	}
	public function index()
	{
		$data = array (
			'title_atas'		=> 'Halaman Login',
			'title_panel'		=> 'Halaman Login',
			'csrf'				=> $this->csrf,
		);
		$this->load->view('login/login_layout', $data);
	}
	function cek_login(){
		$resp['stat'] = false;
		$uname = strtoupper($this->input->post('uname'));
		$pass = strtoupper($this->input->post('pass'));
		$shift = strtoupper($this->input->post('shift'));
		$cek_up = $this->um->check_login($uname,$pass);
		$resp[] = $cek_up;
		
		if(!empty($cek_up)){
			$resp['stat'] = true;
			$ses = array(
				'session_key' 	=> $this->cl->enkrip($cek_up->NamaUser.'#'.time()),
				'username'		=> isset(explode('_',$cek_up->NamaUser)[1])?explode('_',$cek_up->NamaUser)[1]:$cek_up->NamaUser,
				'akses_level'	=> isset(explode('_',$cek_up->NamaUser)[0])?explode('_',$cek_up->NamaUser)[0]:$cek_up->NamaUser,
				'id_user'		=> $cek_up->NamaUser,
				'kd_poli'		=> $cek_up->KdPoli,
				'o_level'		=> $cek_up->oLevel,
				'shift'			=> $shift,
				'grup'			=> $cek_up->TRGroup
			);
			$this->session->set_userdata($ses);
		}
		echo json_encode($resp);
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */
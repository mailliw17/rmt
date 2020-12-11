<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_auth');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//validasi login
		if ($this->form_validation->run() == false) {
			$judul['page_title'] = 'Halaman Login';
			$this->load->view('templates/header', $judul);
			$this->load->view('V_login');
			$this->load->view('templates/footer');
		} else {
			//kalau berhasil login
			$this->_login();
		}
	}

	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$cek_user = $this->M_auth->auth_user($username, $password);

		if ($cek_user->num_rows() != 0) {
			$data = $cek_user->row_array();
			$nama = $data['nama'];
			$username = $data['username'];
			$role = $data['role'];
			$lokasi_pabrik = $data['lokasi_pabrik'];
			$lokasi_checkpoint = $data['lokasi_checkpoint'];
			$this->session->set_userdata('nama', $nama);
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('role', $role);
			$this->session->set_userdata('lokasi_pabrik', $lokasi_pabrik);
			$this->session->set_userdata('lokasi_checkpoint', $lokasi_checkpoint);
			$this->session->set_userdata('login', TRUE);
			if ($role == 'Operator') {
				redirect('operator');
			} else {
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('gagal_login', 'Username / Password salah !');
			redirect('auth');
		}
	}

	public function logout()
	{
		//bersihkan session dan kembalikan ke halaman login
		$this->session->sess_destroy();
		redirect('auth');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class operator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_operator');
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('login') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		$judul['page_title'] = 'Halaman Awal';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_landingpage');
		$this->load->view('templates/footer');
	}

	// public function index_pelabuhan()
	// {
	// 	$judul['page_title'] = 'Halaman Awal'; 
	// 	$this->load->view('templates/header', $judul);
	// 	$this->load->view('V_landingpage_pelabuhan');
	// 	$this->load->view('templates/footer');
	// }

	// public function index_security()
	// {
	// 	$judul['page_title'] = 'Halaman Awal';
	// 	$this->load->view('templates/header', $judul);
	// 	$this->load->view('V_landingpage_security');
	// 	$this->load->view('templates/footer');
	// }

	public function isiform()
	{
		$data['nomor_po'] = $this->M_operator->getNomorPO();

		$judul['page_title'] = 'Print Barcode';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_pelabuhan', $data);
		$this->load->view('templates/footer');
	}

	public function halaman_konfirmasi()
	{
		$judul['page_title'] = 'Cek truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_halaman_konfirmasi');
		$this->load->view('templates/footer');
	}

	public function get_data_nomorpo()
	{
		$nomor_po = $this->input->post('nomor_po');
		$data = $this->M_operator->getDataNomorPO($nomor_po);
		echo json_encode($data);
	}

	public function insert_print_pelabuhan()
	{
		$data = [
			'id_barcode' => htmlspecialchars($this->input->post('id_barcode', true)),
			'nomor_po' => htmlspecialchars($this->input->post('nomor_po', true)),
			'plat_nomor' => htmlspecialchars($this->input->post('plat_nomor', true)),
			'nomor_segel' => htmlspecialchars($this->input->post('nomor_segel', true)),
			'nomor_sj' => htmlspecialchars($this->input->post('nomor_sj', true)),
			'qty' => htmlspecialchars($this->input->post('qty', true)),
			'pelabuhan' => htmlspecialchars($this->input->post('pelabuhan', true)),
		];

		$this->M_operator->insert_print_pelabuhan($data);

		$this->session->set_flashdata('berhasil_barcode', 'berhasil');

		redirect('operator');
	}
}

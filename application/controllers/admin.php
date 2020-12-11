<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('login') != true) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['data_po'] = $this->M_admin->getDataPO();
		$data['analisis'] = $this->M_admin->getAnalisisHarian();
		$judul['page_title'] = 'Halaman Awal';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_index_admin', $data);
		$this->load->view('templates/footer');
	}

	public function tracking()
	{
		// $data['tracking'] = $this->M_admin->getDetailLokasi($id_barcode);
		$data['tracking'] = $this->M_admin->getAllData();
		$judul['page_title'] = 'Tracking Armada';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_tracking', $data);
		$this->load->view('templates/footer');
	}

	// public function detaillokasi($id_barcode)
	// {
	// 	$this->M_admin->getDetailLokasi($id_barcode);
	// }
}

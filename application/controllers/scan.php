<?php
defined('BASEPATH') or exit('No direct script access allowed');

class scan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_scan');
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('login') != true) {
			redirect('auth');
		}
	}

	public function scansecurity()
	{
		$this->load->view('V_scan_security');
	}

	public function scantsin()
	{
		$this->load->view('V_scan_tsin');
	}

	public function scanmulaibongkar()
	{
		$this->load->view('V_scan_mulaibongkar');
	}

	public function scanselesaibongkar()
	{
		$this->load->view('V_scan_selesaibongkar');
	}

	public function scantsout()
	{
		$this->load->view('V_scan_tsout');
	}

	public function scansecurityout()
	{
		$this->load->view('V_scan_securityout');
	}

	public function securityin()
	{
		$data['id_barcode'] = $this->input->post('id_barcode');

		$data['detail'] = $this->M_scan->getDetailBarcode($data['id_barcode']);

		$cek = $this->M_scan->cekNull($data['id_barcode']);

		if (count($data['detail']) == 0) {
			$this->session->set_flashdata('gagal_barcode', 'gagal');
			redirect('operator');
		}
		if ($cek['pelabuhan'] == NULL) {
			$this->session->set_flashdata('loncat_barcode', 'Masuk Pabrik');
			redirect('operator');
		}


		$judul['page_title'] = 'Cek Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_tsin', $data);
		$this->load->view('templates/footer');
	}

	public function securityin_ok()
	{
		$data = [
			'security_in' => htmlspecialchars($this->input->post('security_in', true)),
		];

		$this->M_operator->update_waktu($data);
		$this->session->set_flashdata('berhasil_barcode', 'berhasil');
		redirect('operator');
	}

	public function tsin()
	{
		$data['id_barcode'] = $this->input->post('id_barcode');

		$data['detail'] = $this->M_scan->getDetailBarcode($data['id_barcode']);

		$cek = $this->M_scan->cekNull($data['id_barcode']);

		if (count($data['detail']) == 0) {
			$this->session->set_flashdata('gagal_barcode', 'gagal');
			redirect('operator');
		}
		if ($cek['security_in'] == NULL) {
			$this->session->set_flashdata('loncat_barcode', 'Masuk Pabrik');
			redirect('operator');
		}


		$judul['page_title'] = 'Cek Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_tsin', $data);
		$this->load->view('templates/footer');
	}

	public function tsin_ok()
	{
		$data = [
			'ts_in' => htmlspecialchars($this->input->post('ts_in', true)),
		];

		$this->M_operator->update_waktu($data);
		$this->session->set_flashdata('berhasil_barcode', 'berhasil');
		redirect('operator');
	}

	public function mulaibongkar()
	{
		$data['id_barcode'] = $this->input->post('id_barcode');

		$data['detail'] = $this->M_scan->getDetailBarcode($data['id_barcode']);

		$data['nomor_segel'] = $this->M_scan->getNomorSegel();

		$cek = $this->M_scan->cekNull($data['id_barcode']);

		if (count($data['detail']) == 0) {
			$this->session->set_flashdata('gagal_barcode', 'gagal');
			redirect('operator');
		}

		if ($cek['ts_in'] == NULL) {
			$this->session->set_flashdata('loncat_barcode', 'Truck Scale IN');
			redirect('operator');
		}


		$judul['page_title'] = 'Cek Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_mulaibongkar', $data);
		$this->load->view('templates/footer');

		// masih error
		// if (is_null($cek['isnull']) == 1) {
		// 	$this->session->set_flashdata('loncat_barcode', 'error');
		// 	redirect('operator');
		// }
	}

	public function mulaibongkar_ok()
	{
		$data = [
			'mulai_bongkar' => htmlspecialchars($this->input->post('mulai_bongkar', true)),
			'lokasi_bongkar' => htmlspecialchars($this->input->post('lokasi_bongkar', true)),
		];

		$this->M_operator->update_waktu($data);
		$this->session->set_flashdata('berhasil_barcode', 'berhasil');
		redirect('operator');
	}

	public function selesaibongkar()
	{
		$data['id_barcode'] = $this->input->post('id_barcode');

		$data['detail'] = $this->M_scan->getDetailBarcode($data['id_barcode']);

		$cek = $this->M_scan->cekNull($data['id_barcode']);

		if (count($data['detail']) == 0) {
			$this->session->set_flashdata('gagal_barcode', 'gagal');
			redirect('operator');
		}

		if ($cek['mulai_bongkar'] == NULL) {
			$this->session->set_flashdata('loncat_barcode', 'Mulai Bongkar');
			redirect('operator');
		}

		$judul['page_title'] = 'Cek Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_selesaibongkar', $data);
		$this->load->view('templates/footer');
	}

	public function selesaibongkar_ok()
	{
		$data = [
			'selesai_bongkar' => htmlspecialchars($this->input->post('selesai_bongkar', true)),
		];

		$this->M_operator->update_waktu($data);
		$this->session->set_flashdata('berhasil_barcode', 'berhasil');
		redirect('operator');
	}

	public function tsout()
	{
		$data['id_barcode'] = $this->input->post('id_barcode');

		$data['detail'] = $this->M_scan->getDetailBarcode($data['id_barcode']);

		$cek = $this->M_scan->cekNull($data['id_barcode']);

		if (count($data['detail']) == 0) {
			$this->session->set_flashdata('gagal_barcode', 'gagal');
			redirect('operator');
		}

		if ($cek['selesai_bongkar'] == NULL) {
			$this->session->set_flashdata('loncat_barcode', 'Selesai Bongkar');
			redirect('operator');
		}


		$judul['page_title'] = 'Cek Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_tsout', $data);
		$this->load->view('templates/footer');

		// masih error
		// if (is_null($cek['isnull']) == 1) {
		// 	$this->session->set_flashdata('loncat_barcode', 'error');
		// 	redirect('operator');
		// }
	}

	public function tsout_ok()
	{
		$data = [
			'ts_out' => htmlspecialchars($this->input->post('ts_out', true)),
		];

		$this->M_operator->update_waktu($data);
		$this->session->set_flashdata('berhasil_barcode', 'berhasil');
		redirect('operator');
	}

	public function securityout()
	{
		$data['id_barcode'] = $this->input->post('id_barcode');

		$data['detail'] = $this->M_scan->getDetailBarcode($data['id_barcode']);

		$cek = $this->M_scan->cekNull($data['id_barcode']);

		if (count($data['detail']) == 0) {
			$this->session->set_flashdata('gagal_barcode', 'gagal');
			redirect('operator');
		}

		if ($cek['ts_out'] == NULL) {
			$this->session->set_flashdata('loncat_barcode', 'Truck Scale OUT');
			redirect('operator');
		}


		$judul['page_title'] = 'Cek Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_securityout', $data);
		$this->load->view('templates/footer');

		// masih error
		// if (is_null($cek['isnull']) == 1) {
		// 	$this->session->set_flashdata('loncat_barcode', 'error');
		// 	redirect('operator');
		// }
	}

	public function securityout_ok()
	{
		$data = [
			'security_out' => htmlspecialchars($this->input->post('security_out', true)),
		];

		$this->M_operator->update_waktu($data);
		$this->session->set_flashdata('berhasil_barcode', 'berhasil');
		redirect('operator');
	}
}

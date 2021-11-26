<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function index()
	{
		$this->load->model('M_sewa');

		$data['judul'] = 'Riwayat Sewa Lapangan!';
		$data['user'] 	= $this->db->get_where('user', 
			['id_user' => $this->session->userdata('id_user')])->row_array();

		$user = $this->session->userdata('id_user');

		$data['riwayat'] = $this->M_sewa->riwayat_sewa($user)->result_array();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/riwayat', $data);
		$this->load->view('template/footer');
	}
}

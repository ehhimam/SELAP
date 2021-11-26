<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Cetak extends CI_Controller {
 
	public function pdf()
	{
		$this->load->model('M_cetak');
		$data['judul'] = 'Bukti Sewa SELAP!';
		$data['user'] 	= $this->db->get_where('user', 
			['id_user' => $this->session->userdata('id_user')])->row_array();

		$id = $this->uri->segment(3);

		
		$data['cetak1'] = $this->M_cetak->getData($id)->row_array();
		$data['cetak'] = $this->M_cetak->getData2($id)->row_array();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "bukti-sewa.pdf";


		$this->pdf->load_view('cetak', $data);
	}
}
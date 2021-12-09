<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	public function futsal()
	{
		$this->load->model('M_sewa');

		$data['data_lapangan'] = $this->M_sewa->get_lapangan()->result_array();

		$data['judul'] 		= 'Daftar Lapangan Futsal yang tersedia!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/futsal', $data);
		$this->load->view('template/footer');
	}

	public function detail_futsal()
	{
		$this->load->model('M_sewa');

		$data['judul'] 		= 'Detail Lapangan!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id = $this->uri->segment(3);

		// dilakukan didalam model
		$data['detail_futsal'] = $this->M_sewa->detail_futsal($id);

		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/detail_futsal', $data);
		$this->load->view('template/footer');
	}

	public function badminton()
	{
		$this->load->model('M_sewa');

		$data['data_lapangan'] = $this->M_sewa->get_lapangan2()->result_array();

		$data['judul'] 		= 'Daftar Lapangan Badminton yang tersedia!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/badminton', $data);
		$this->load->view('template/footer');
	}

	public function detail_badminton()
	{
		$this->load->model('M_sewa');

		$data['judul'] 		= 'Detail Lapangan!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id = $this->uri->segment(3);

		// dilakukan didalam model
		$data['detail_futsal'] = $this->M_sewa->detail_futsal($id);

		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/detail_futsal', $data);
		$this->load->view('template/footer');
	}


	// untuk melakukan sewa lapangan
    public function booking()
    {
    	$this->load->model('M_sewa');

		$data['judul'] 		= 'Detail data penyewaan!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id = $this->uri->segment(3);

		// dilakukan didalam model
		$data['sewa'] = $this->M_sewa->proses_sewa($id)->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/sewa', $data);
		$this->load->view('template/footer');
    }

    // menginput data order lapangan oleh user
    public function order()
    {
    	$this->load->model('M_sewa');

    	$data['judul'] 		= 'Silahkan pilih metode pembayaran dan melakukan pembayaran!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id_user	= $this->session->userdata('id_user');
		$id_penyedia= $this->input->post('id_penyedia');
		$judul 		= $this->input->post('judul');
		$alamat 	= $this->input->post('alamat');
		$lama_sewa	= $this->input->post('waktu');
		$jam_sewa	= $this->input->post('jam_main');
		$tgl_sewa 	= $this->input->post('tgl_main');
		$totalbayar	= $this->input->post('total');
		$kategori	= $this->input->post('kategori');
		$id_lapangan= $this->input->post('id_lapangan');

		$dataku = [
			'id_user'			=> $id_user,
			'id_penyedia'		=> $id_penyedia,
			'nama_lapangan'		=> $judul,
			'kategori_lapangan' => $kategori,
			'alamat_lapangan'	=> $alamat,
			'lama_sewa'			=> $lama_sewa,
			'jam_sewa'			=> $jam_sewa,
			'tgl_sewa'			=> $tgl_sewa,
			'bayar_sewa'		=> $totalbayar,
			'id_lapangan'		=> $id_lapangan,
 			'tgl_dibuat'		=> date('M-D-Y')
		];

		// lakukan proses input le db lewat model
		$this->M_sewa->tmbah_sewa($dataku);

		// ambil data untuk melakukan pembayaran melalui model
		$data['bayar'] = $this->M_sewa->untuk_pembayaran($id_lapangan)->row_array();

    	$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/pembayaran', $data);
		$this->load->view('template/footer');
    }


    // memproses pembayaran
    public function pembayaran()
    {
    	$this->load->model('M_sewa');

		$data['judul'] 		= 'Detail data penyewaan!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$config['upload_path'] 		= './assets/img/bukti';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('bukti');
		$namaGambar		= $this->upload->data('file_name');
		

		
		if ($namaGambar) {
			$bukti = 'Lunas!';
		} else {
			$bukti = 'Belum Bayar!';
		}

		$id_user	= $this->input->post('penyewa');
		$id_sewa 	= $this->input->post('id_sewa');
		$metode 	= $this->input->post('metode');
		$jumlah		= $this->input->post('total');
		$idp 		= $this->input->post('id_p');

		$data = [
			'id_sewa'			=> $id_sewa,
			'id_penyedia' 		=> $idp,
			'nama_user'			=> $id_user,
			'metode_pembayaran'	=> $metode,
			'jumlah_pembayaran'	=> $jumlah,
			'status_pembayaran'	=> $bukti,
			'bukti_pembayaran'	=> $namaGambar,
			'tgl_dibayar'	=> date('M-D-Y')
		];

		// diproses didalam model
		$this->M_sewa->proses_bayar($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pembayaran sudah disimpan!! Silahkan cek di riwayat pesanan!</div>');

		redirect('index.php/user');

    }

    // melakukan pmbyran dari riwayat
    public function bayar_coy()
    {
    	$this->load->model('M_sewa');

		$data['judul'] 		= 'Detail data penyewaan!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		// ambil id di url
		$id_sewa = $this->uri->segment(3);

		// cari data sewa di model
		$data['bayar'] = $this->M_sewa->cari_pembayaran($id_sewa)->row_array();

		// tampilkan data di view
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('sewa/bayar', $data);
		$this->load->view('template/footer');


    }

    // update pembauaran
    public function update_pembayaran()
    {
    	$this->load->model('M_sewa');

    	

    	$config['upload_path'] 		= './assets/img/bukti';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('bukti');
		$namaGambar		= $this->upload->data('file_name');

		if ($namaGambar) {
			$bukti = 'Lunas!';
		} else {
			$bukti = 'Belum Bayar!';
		}

		$id_sewa = $this->input->post('id_sewa');

    	$data = [
    		'bukti_pembayaran' => $namaGambar,
    		'status_pembayaran' => $bukti
    	];

    	// lakukan upudate di model
    	$this->M_sewa->update_pembayaran($data, $id_sewa);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data pembayaran sudah disimpan!! Silahkan cek di riwayat pesanan!</div>');

		redirect('index.php/user');

    }

    // membatalkan sewa lapangan
    public function batal_sewa()
    {
    	$this->load->model('M_sewa');

    	$id_sewa = $this->uri->segment(3);

    	// lakukan pembatalan dimodel
    	$this->M_sewa->batal_sewa($id_sewa);

    	// redirect
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan kamu berhasil dibatalkan!!</div>');

		redirect('index.php/user');
    }


    // cetak bukti nayar sewa lapangan
    public function cetak()
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

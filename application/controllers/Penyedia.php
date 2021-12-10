<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyedia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_lapangan');
		cek_login_penyedia();
	}

	
	public function index()
	{
		$this->load->model('M_penyedia');

		$data['judul'] 		= 'Dashboard Penyedia';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$id = $this->session->userdata('id_penyedia');

		$data['jumlah_lapangan']	= $this->M_penyedia->jumlah_lapangan($id);
		$data['jumlah_sewa']		= $this->M_penyedia->jumlah_sewa($id);


		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/index', $data);
		$this->load->view('template/footer');
	}

	// edit ptofile penyedia lapangan
	public function edit()
	{
		$data['judul'] 		= 'Edit Profile!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/profile', $data);
		$this->load->view('template/footer');
	}

	// proses edit profile
	public function edit_profile()
	{
		$this->load->model('M_penyedia');

		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$nama 	= $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$config['upload_path'] 		= './assets/img/profile';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('image');
		$namaGambar		= $this->upload->data('file_name');

		$id = $this->session->userdata('nohp_penyedia');

		
		$data = [
			'nama_penyedia'		=> 	$nama,
			'alamat_penyedia' 	=>	$alamat,
			'gambar'			=> 	$namaGambar
		];

		$this->M_penyedia->update_profile($id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile perhasil di update!</div>');

		redirect('index.php/penyedia');
	}
	

	public function lihat_lapangan()
	{
		
	}

	// untu menampilkan semua data lapangan
	public function lapangan() 
	{
		$data['data_lapangan'] = $this->M_lapangan->get_lapangan()->result_array();
		
		$data['judul'] = 'Daftar Lapangan!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();


		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/lapangan', $data);
		$this->load->view('template/footer');

		
	}
	
	// menambah data futsal dan badminton
	public function tambah() {
		$data['judul'] 		= 'Tambah Lapangan!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		// set aturan/rules
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
			'required' => 'Judul wajib diisi!'
		]);

		$this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
			'required' => 'Harga wajib diisi!'
		]);

		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required' => 'Alamat Lapangan wajiib diisi!'
		]);

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
			'required' => 'Keterangan mengenai lapangan wajib diisi!'
		]);


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('penyedia/sidebar', $data);
			$this->load->view('penyedia/topbar', $data);
			$this->load->view('penyedia/tambah_lapangan', $data);
			$this->load->view('template/footer');
		} else {
			$judul 		= htmlspecialchars($this->input->post('judul'));
			$harga 		= $this->input->post('harga');
			$alamat 	= htmlspecialchars($this->input->post('alamat'));
			$keterangan = $this->input->post('keterangan');
			$posted  	= $this->input->post('posted');
			$id 		= $this->input->post('idp');
			$kategori 	= $this->input->post('kategori');
			$jam 		= $this->input->post('jam');

			$config['upload_path'] 		= './assets/img/futsal';
			$config['allowed_types'] 	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;

			$this->load->library('upload');
			$this->upload->initialize($config);

			// melakuam upload
			$this->upload->do_upload('gambar');
			$namaGambar		= $this->upload->data('file_name');
			$url 			= base_url().'assets/img/futsal/';
			$satukan		= $url.$namaGambar;

			//tampung data
			$data = [
				'id_penyedia'			=> $id,
				'judul_lap_futsal'		=> $judul,
				'keterangan'			=> $keterangan,
				'harga'					=> $harga,
				'alamat'				=> $alamat,
				'posted_by'				=> $posted,
				'gambar'				=> $satukan,
				'kategori'				=> $kategori,
				'jam_buka_tutup'		=> $jam
			];

			// input ke ddb di model
			$this->M_lapangan->add_futsal($data);

			// tampilkan keterangan suskes
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Lapangan berhasil disimpan!</div>');

			// redirect
       		redirect('index.php/penyedia/tambah');

		}
		
	}

	// emengedit data lapangan
	public function edit_lapangan() {
		$this->load->model('M_lapangan');
		$data['judul'] 		= 'Edit Lapangan!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$id = $this->uri->segment(3);

		
		// cek ke dalam dm di model
		$data['data_lapangan'] = $this->M_lapangan->edit_lap($id);

		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/edit', $data);
		$this->load->view('template/footer');
		
	}

	// update lapangan
	public function update() {
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$penyedia 		= $this->input->post('id');
		$judul 			= htmlspecialchars($this->input->post('judul'));
		$harga 			= $this->input->post('harga');
		$kategori 		= htmlspecialchars($this->input->post('kategori'));
		$alamat 		= htmlspecialchars($this->input->post('alamat'));
		$gambarlama 	= $this->input->post('gambarlama');
		$keterangan 	= htmlspecialchars($this->input->post('keterangan'));

		$config['upload_path'] 		= './assets/img/futsal';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$wkwk = $this->upload->do_upload('gambar');
		$namaGambar		= $this->upload->data('file_name');
		$url 			= base_url().'assets/img/futsal/';
		$satukan		= $url.$namaGambar;
		$link 			= $satukan;

		if ($satukan) {
			$qq = $link;
		} else {
			$qq 		= $gambarlama;
		}

		$data = [
			'judul_lap_futsal' 	=> $judul,
			'harga' 			=> $harga,
			'kategori'			=> $kategori,
			'alamat'			=> $alamat,
			'keterangan'		=> $keterangan,
			'gambar'			=> $qq
		];

		$this->M_lapangan->update_lapangan($data, $penyedia);


		// tampilkan keterangan suskes
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Lapangan berhasil diupdate!</div>');

		// redirect
       	redirect('index.php/penyedia/lapangan');

	}

	// dhapus lapangan
	public function delete() {

		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		//mengambil lokasi id lapangan di posisi 3 di url
		$id 	=	$this->uri->segment(3);

		//proses hapus didalam model
		$this->M_lapangan->hapus_lapangan($id);

		redirect('index.php/penyedia/lapangan');

	}

	// menampilkan data semua orang yang telah menyewa
	public function allsewa()
	{
		$this->load->Model('M_penyedia');

		$data['judul'] = 'Daftar Penyewa!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$data['allsewa'] = $this->M_penyedia->allsewa()->result_array();


		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/allsewa', $data);
		$this->load->view('template/footer');
	}

	// pendapatan penyedia lapangan
	public function pendapatan()
	{
		$this->load->Model('M_penyedia');

		$data['judul'] = 'Halaman Pendapatan!!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$id2 = $this->session->userdata('id_penyedia');

		$data['allsewa'] = $this->M_penyedia->pendapatan2($id2);

		$id = $this->session->userdata('id_penyedia');

		$data['penarikan'] 		= $this->M_penyedia->penarikan($id)->result_array();
		$data['jumlah_tarik']	= $this->M_penyedia->jumlah_tarik($id);


		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/pendapatan', $data);
		$this->load->view('template/footer');
	}

	// prosses tarik dana
	public function tarik_dana()
	{
		$this->load->model('M_penyedia');

		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		// ambil inputan dari modal
		$nama		= $this->input->post('lengkap');
		$jumlah		= $this->input->post('jumlah');
		$metode		= $this->input->post('metode');
		$rek 		= $this->input->post('rek');
		$penyedia 	= $this->session->userdata('id_penyedia');


		if ($jumlah < 500000) {
			$this->session->set_flashdata('kurang', '<div class="alert alert-danger" role="alert">Minimal penarikan Rp 500.000!!</div>');

			redirect('index.php/penyedia/pendapatan');
		} else {
			$jumlah;
		}

		// simpan didalam array
		$data = [
			'id_penyedia'		=> $penyedia,
			'nama_lengkap'		=> $nama,
			'jumlah_penarikan'	=> $jumlah,
			'metode_penarikan'	=> $metode,
			'rekening_penarikan'=> $rek,
			'status_penarikan'	=> 'Diproses',
			'tgl_penarikan'		=> time()

		];

		// insert data didalam model
		$this->M_penyedia->masukkan_penarikan($data);

		// redirect
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan, dan penarikan akan Diproses oleh admin!!</div>');

        redirect('index.php/penyedia/pendapatan');

	}

	// bantuan penyedia ke admin
	public function bantuan()
	{
		$data['judul'] = 'Halaman Bantuan!!';
		$data['penyedia'] 	= $this->db->get_where('penyedia', 
			['nohp_penyedia' => $this->session->userdata('nohp_penyedia')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('penyedia/sidebar', $data);
		$this->load->view('penyedia/topbar', $data);
		$this->load->view('penyedia/bantuan', $data);
		$this->load->view('template/footer');
	}

	
}

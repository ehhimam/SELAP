<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_penyedia');
		$this->load->model('M_admin');

		cek_login_admin();

	}

	public function index()
	{
		

		$data['judul'] = 'Dashboard Admin';
		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$data['users'] 		= $this->M_admin->jumlah_user();
		$data['penarikan'] 	= $this->M_admin->jumlah_penarikan();
		$data['lapangan'] 	= $this->M_admin->jumlah_lapangan();
		$data['penyedia'] 	= $this->M_admin->jumlah_penyedia();

		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	// menampilkan penyedia

	public function allpenyedia()
	{
		$this->load->model('m_penyedia');

		$data['daftar_penyedia'] = $this->m_penyedia->allpenyedia()->result_array();
		
		$data['judul'] = 'Daftar Penyedia!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();
		


		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('penyedia/allpenyedia', $data);
		$this->load->view('template/footer');

	}

	// menampilkan user

	public function alluser()
	{
		$this->load->model('m_penyedia');

		$data['daftar_user'] = $this->m_penyedia->alluser()->result_array();
		
		$data['judul'] = 'Semua user/anggota!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();
		


		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/alluser', $data);
		$this->load->view('template/footer');

	}

	// menampilkan lapangan

	public function allfutsal()
	{
		$this->load->model('m_lapangan');

		$data['all_lapangan'] = $this->m_lapangan->all_lapangan()->result_array();
		
		$data['judul'] = 'Daftar Lapangan Futsal!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();
		


		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/allfutsal', $data);
		$this->load->view('template/footer');

	}

	// menampilkan lapangan 
	public function allbadminton()
	{
		$this->load->model('m_lapangan');

		$data['all_lapangan'] = $this->m_lapangan->all_lapangan2()->result_array();
		
		$data['judul'] = 'Daftar Lapangan Badminton!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();
		


		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/allfutsal', $data);
		$this->load->view('template/footer');

	}


	// tampilan edit ptofile
	public function edit() {
		$data['judul'] = 'Edit Profile!';
		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('template/footer');
	}

	// melakukan edit profile admin
	public function edit_profile()
	{
		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();


		$nama 	= $this->input->post('name');
		$alamat = $this->input->post('alamat');

		

		$config['upload_path'] 		= './assets/img/profile';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('image');
		$namaGambar		= $this->upload->data('file_name');
		$url 			= base_url().'assets/img/profile/';
		$satukan		= $url.$namaGambar;

		$id 	= $this->session->userdata('id_user');

		// tmpung data
		$data = [
			'nama_user'		=> $nama,
			'alamat_user'	=> $alamat,
			'gambar_user'		=> $satukan
		];

		

		// lakukan di model
		$this->M_admin->update_profile($id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile berhasil di update!!</div>');

		redirect('index.php/admin/edit');
	}

	// menampilkan data penyedia
	public function view_penyedia()
	{
		$data['judul']	= 'Detail Penyedia!';
		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id = $this->uri->segment(3);

		$data['view_penyedia'] = $this->M_admin->view_penyedia($id);

		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/detail_penyedia', $data);
		$this->load->view('template/footer');

	}

	// menghapus penyedia dari admin
	public function hapus_penyedia()
	{
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		//mengambil lokasi id lapangan di posisi 3 di url
		$id 	=	$this->uri->segment(3);

		//proses hapus didalam model
		$this->M_admin->hapus_penyedia($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Penyedia berhasil dihapus!!</div>');

		redirect('index.php/admin/allpenyedia');

	}

	// menghapus user dari admin
	public function hapus_user()
	{
		
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		//mengambil lokasi id lapangan di posisi 3 di url
		$id 	=	$this->uri->segment(3);

		//proses hapus didalam model
		$this->M_admin->hapus_user($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">User berhasil dihapus!!</div>');

		redirect('index.php/admin/alluser');
	}


	// proses penarikan oleh penyedia
	public function proses()
	{
		$data['judul'] 	= 'Daftar Penarikan yang harus di proses!!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();


		$data['penarikan'] = $this->M_admin->ambil_penarikan()->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/proses_penarikan', $data);
		$this->load->view('template/footer');
	}

	// data yang telah selesai melakukan penarikan oleh admin
	public function selesai()
	{
		$data['judul'] 	= 'Daftar Penarikan yang sudah diproses!!';
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();


		$data['selesai'] = $this->M_admin->selesai()->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/selesai_penarikan', $data);
		$this->load->view('template/footer');
	}

	// terima penarikan
	public function terima()
	{
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id = $this->uri->segment(3);

		$data = [
			'status_penarikan'	=> 'Selesai'
		];

		// lekukan di mmodel
		$this->M_admin->terima($id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diterima!</div>');

		redirect('index.php/admin/proses');
	}

	// batal penarikan dari penyedia
	public function batal()
	{
		$data['user'] 	= $this->db->get_where('user', 
			['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$id = $this->uri->segment(3);

		$data = [
			'status_penarikan'	=> 'Ditolak'
		];

		// lekukan di mmodel
		$this->M_admin->tolak($id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditolak!</div>');

		redirect('index.php/admin/proses');
	}
}

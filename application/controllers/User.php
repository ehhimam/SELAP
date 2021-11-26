<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        cek_login_user();
    }

	public function index()
	{
		

		$data['judul'] = 'Halaman Dashboard';
		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function edit() {
		$this->load->model('M_user');

		$data['judul'] = 'Edit Profile!';
		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('template/footer');
	}

	public function edit_profile()
	{	
		$this->load->model('M_user');

		$data['user'] 	= $this->db->get_where('user', ['nohp_user' => $this->session->userdata('nohp_user')])->row_array();

		$nama 	= $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$config['upload_path'] 		= './assets/img/profile';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		// melakuam upload
		$this->upload->do_upload('profile');
		$namaGambar		= $this->upload->data('file_name');

		$id = $this->session->userdata('nohp_user');

		
		$data = [
			'nama_user'		=> 	$nama,
			'alamat_user' 	=>	$alamat,
			'gambar_user'	=> 	$namaGambar
		];

		$this->M_user->update_profile($id, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile perhasil di update!</div>');

		redirect('index.php/user');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('m_penyedia');

    }

	public function index()
	{

		// session jika user mencoba mengganti url ke login maka akan masuk otomatis ke dashboard
		// apabila sebelumnya sudah login 

		if ($this->session->userdata('nohp_user')) {
            redirect ('index.php/user');
        }
		
		// Set rules login
		$this->form_validation->set_rules('nohp', 'NOHP', 'trim|required', 
			array('required' => 'Nomor Hp Wajib diisi untuk bisa masuk!')
		);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',
			array('required' => 'Wajib masukkan Password!')
		);

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Halaman Login SELAP!';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/index');
			$this->load->view('templates/auth_footer');
		} else {
			$this->login();
		}
	}

	private function login() {
		$this->load->model('m_auth');
		$nohp 		= $this->input->post('nohp');
		$password 	= $this->input->post('password');

		// dicari data didalam model
		$query = $this->M_auth->get_login($nohp, $password);

		// jika data ditemuka
		if ($query) {
			if ($query['role'] == 2) {
				if (password_verify($password, $query['password_user'])) {
					//jika benar ambil sessiion
					$data =
					[
						'id_user' 		=> $query['id_user'],
						'email_user' 	=> $query['email_user'],
						'nohp_user'		=> $query['nohp_user'],
						'role'			=> $query['role']
						
					];

					$this->session->set_userdata($data);

					redirect('index.php/user');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah, Silahkan coba lagi!!</div>');

                    redirect('');
				}
			} else  {

				$data =
					[
						'id_user' 		=> $query['id_user'],
						'email_user' 	=> $query['email_user'],
						'nohp_user'		=> $query['nohp_user'],
						'role'			=> $query['role']
						
					];

				$this->session->set_userdata($data);
                redirect('index.php/admin');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun tidak ditemukan!!</div>');

            redirect('');
		}
	}

	public function register()
	{
		$this->load->model('m_auth');

		$this->form_validation->set_rules('name', 'Nama', 'trim|required', 
			array('required' => 'Nama Wajib diisi!')
		);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email_user]', [
			'required'	=> 'Email wajib diisi!',
            'is_unique' => 'Email ini telah digunakan!'
        ]);

		$this->form_validation->set_rules('nohp', 'NOHP', 'trim|required|is_unique[user.nohp_user]', [
			'is_unique'	=> 'Nomor HP telah digunakan, silahkan gunakan nomor lainnya!',
			'required' 	=> 'Nomor hp wajib diisi!'
		]
		);

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
			array('required' => 'Alamat HP Wajib diisi!')
		);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' 		=> 'Password tidak sama!',
            'min_length' 	=> 'Passowrd terlalu pendek!',
            'required'		=> 'Password Wajib diisi!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Daftar Anggota SELAP!';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama_user' 	=> htmlspecialchars($this->input->post('name', true)),
				'password_user'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'email_user' 	=> htmlspecialchars($this->input->post('email', true)),
				'nohp_user' 	=> $this->input->post('nohp', true),
				'alamat_user' 	=> htmlspecialchars($this->input->post('alamat', true)),
				'gambar_user' 	=> 'default.jpg',
				'role' 			=> 2,
			];

			// diproses didalam model
			$this->m_auth->get_register($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! Akun berhasil dibuat! Silahkan login!</div>');

          	redirect('');
		}	
	}

	public function logout() 
	{
		$this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email_user');
        $this->session->unset_userdata('nohp_user');

        $this->session->unset_userdata('id_penyedia');
        $this->session->unset_userdata('email_penyedia');
        $this->session->unset_userdata('nohp_penyedia');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kamu berhasil keluar!</div>');

        redirect('index.php/auth');
	}


	// penyedia lapangan
	

	public function login_penyedia() {

		// session jika penyedia mencoba mengganti url ke login maka akan masuk otomatis ke dashboard
		// apabila sebelumnya sudah login 
		if ($this->session->userdata('nohp_penyedia')) {
            redirect ('index.php/penyedia');
        }

		// Set rules login
		$this->form_validation->set_rules('nohp', 'NOHP', 'trim|required', 
			array('required' => 'Nomor Hp Wajib diisi untuk bisa masuk!')
		);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',
			array('required' => 'Wajib masukkan Password!')
		);

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Halaman Login Penyedia Lapangan!';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/penyedia');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_loginpenyedia();
		}
	}

	private function _loginpenyedia() {
		$nohp 		= htmlspecialchars($this->input->post('nohp'));
		$password 	= htmlspecialchars($this->input->post('password'));

		// cara data dalam model
		$ada = $this->m_penyedia->login_penyedia($nohp, $password);

		if ($ada) {
			if (password_verify($password, $ada['password_penyedia'])) {
				//ambil session
				$data = [
					'id_penyedia' 		=> $ada['id_penyedia'],
					'email_penyedia' 	=> $ada['email_penyedia'],
					'nohp_penyedia'		=> $ada['nohp_penyedia']
				];

				$this->session->set_userdata($data);
				redirect ('index.php/penyedia');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!!</div>');

       			redirect('index.php/auth/login_penyedia');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun tidak ditemukan!</div>');

       		redirect('index.php/auth/login_penyedia');
		}

	}

	public function register_penyedia() {
		$this->form_validation->set_rules('name', 'Nama', 'trim|required', 
			array('required' => 'Nama Wajib diisi!')
		);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[penyedia.email_penyedia]', [
			'required'	=> 'Email wajib diisi!',
            'is_unique' => 'Email ini telah digunakan!'
        ]);

		$this->form_validation->set_rules('nohp', 'NOHP', 'trim|required|is_unique[penyedia.nohp_penyedia]', [
			'is_unique'	=> 'Nomor HP telah digunakan, silahkan gunakan nomor lainnya!',
			'required' 	=> 'Nomor hp wajib diisi!'
		]
		);

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
			array('required' => 'Alamat HP Wajib diisi!')
		);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' 		=> 'Password tidak sama!',
            'min_length' 	=> 'Passowrd terlalu pendek!',
            'required'		=> 'Password Wajib diisi!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE ) {
			$data['judul'] = 'Daftar Penyedia Lapangan!';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register_penyedia');
			$this->load->view('templates/auth_footer');
		} else {
			$this->tambah();
		}
	}
  
	public function tambah(){

        $nama 		= htmlspecialchars($this->input->post('name'));
        $email 		= htmlspecialchars($this->input->post('email'));
        $nohp 		= htmlspecialchars($this->input->post('nohp'));
        $alamat 	= htmlspecialchars($this->input->post('alamat'));
        $password 	= password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $lahir 		= $this->input->post('lahir');
        $ktp		= $_FILES['ktp'];
        $gambar1 	= 'default.jpg';

        $config['upload_path']          = './ktp';
	    $config['allowed_types']        = 'jpg|png|jpeg';
	    $config['max_size']             = 2048;

	    $this->load->library('upload');
	    $this->upload->initialize($config);

	    // lakukan upload
	    $this->upload->do_upload('ktp');
		$namaGambar	=	$this->upload->data('file_name'); //simpan nama gambar
		$url		=	base_url().'ktp/'; //ambil url website dan folder lokasi gambar
		$ktp		=	$url.$namaGambar; //digabungkan url dengan nama gambar
       
		//tampung data untuk disimpan
        $data = array (
        	'nama_penyedia'		=> $nama,
        	'email_penyedia'	=> $email,
        	'nohp_penyedia'		=> $nohp,
        	'alamat_penyedia'	=> $alamat,
        	'password_penyedia'	=> $password,
        	'tgl_lahir'			=> $lahir,
        	'ktp'				=> $ktp,
        	'gambar'			=> $gambar1
        );

        // lakukan simpan data didalam model
        $this->m_penyedia->daftar_penyedia($data);

        // $this->db->insert('penyedia', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun Berhasil dibuat, silahkan login!!</div>');

       	redirect('index.php/auth/login_penyedia');
	}

	// jika ada akses kontroler yang tidak sesuai dengan helper
	// akan dialihkan
	public function blok()
	{
		$this->load->view('errors/404');
	}
}

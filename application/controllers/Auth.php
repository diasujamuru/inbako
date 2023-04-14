<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelPetugas');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Petugas";
			$this->load->view('templates/header', $data);
			$this->load->view('user/view-login.php');
			$this->load->view('templates/footer');
		} else {
			$this->userLogin();
		}
	}

	public function userLogin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$users = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($users) {
			if (password_verify($password, $users['password'])) {
				$data = [
					'email' => $users['email'],
					'kode_wilayah' => $users['kode_wilayah'],
				];

				$this->session->set_userdata($data);

				if ($users['role_id'] == 2) {
					redirect('petugas');
				} else if ($users['role_id'] == 3) {
					redirect('penerima');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Username!</div>');
			redirect('auth');
		}
	}

	public function userLogout()
	{
		$this->session->unset_userdata('email');

		$this->session->set_flashdata('message', '<script>alert("Antum telah keluar sedikit");</script>');
		redirect('auth');
	}

	public function admin()
	{
		if ($this->session->userdata('username')) {
			redirect('dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Inbako Login";
			$this->load->view('templates/header', $data);
			$this->load->view('admin/view-login.php');
			$this->load->view('templates/footer');
		} else {
			$this->adminLogin();
		}
	}

	private function adminLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $username])->row_array();

		if ($admin) {
			if (password_verify($password, $admin['password'])) {
				$data = [
					'username' => $admin['username'],
				];
				$this->session->set_userdata($data);
				if ($admin['role_id'] == 1) {
					redirect('dashboard/dashboardAdmin');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth/admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Username!</div>');
			redirect('auth/admin');
		}
	}



	public function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/header', $data);
			$this->load->view('user/view-register');
			$this->load->view('templates/footer');
		} else {
			$role_id = 2;
			$data = [
				'username' => htmlspecialchars($this->input->post('username')),
				'email' => htmlspecialchars($this->input->post('email')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => $role_id,
				'is_active' => 1
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil buat akun</div>');
			redirect('auth/petugas');
		}
	}

	public function logoutAdmin()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<script>alert("Your have been logged out");</script>');
		redirect('auth/admin');
	}

}


// public function petugasLogin()
// 	{
// 		$email = $this->input->post('email');
// 		$password = $this->input->post('password');

// 		$users = $this->ModelPetugas->cek_login($email, $password);

// 		if ($users) {

// 			$data = [
// 				'email' => $users['email'],
// 				'kode_wilayah_petugas' => $users['kode_wilayah_petugas'],
// 			];
// 			$this->session->set_userdata($data);
// 			if ($users['role_id'] == 2) {
// 				redirect('petugas');
// 			} else {
// 				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
// 				redirect('auth/petugas');
// 			}
// 		} else {
// 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Salah!</div>');
// 			redirect('auth/petugas');
// 		}

// 	}

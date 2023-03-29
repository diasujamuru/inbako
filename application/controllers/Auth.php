<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Inbako Login";
			$this->load->view('templates/header', $data);
			$this->load->view('user/view-login.php');
			$this->load->view('templates/footer');
		} else {
			$this->adminLogin();
		}
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
					redirect('dashboard');
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
		$this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[warga.nik]', [
			'is_unique' => 'Username sudah terdaftar'
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'Username sudah terdaftar'
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
			$role_id = 1;
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => $role_id,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil buat akun</div>');
			redirect('auth');
		}
	}

	public function logoutAdmin()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<script>alert("Your have been logged out");</script>');
		redirect('auth/admin');
	}
}

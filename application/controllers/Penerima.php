<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerima extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('ModelWarga');

		// if (empty($this->session->userdata('username'))) {
		// 	redirect('auth/admin');
		// }
	}

	public function index()
	{

		if ($this->session->userdata('email')) {

			$desc['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		}
		$title['title'] = "Dashboard Penerima";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas.php', $desc);
		$this->load->view('user/penerima/view-dashboard-penerima.php');
		$this->load->view('templates/footer');
	}
}

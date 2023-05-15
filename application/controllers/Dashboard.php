<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// if (empty($this->session->userdata('username'))) {
		// 	redirect('auth/admin');
		// }
	}

	public function index()
	{
		$title['title'] = "InBako";

		$this->load->view('templates/header', $title);
		$this->load->view('user/view-dashboard-user.php');
		$this->load->view('templates/footer');
	}

	public function dashboardPetugas()
	{
		if ($this->session->userdata('username')) {

			$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}
		$title['title'] = "Dashboard Petugas";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas.php');
		$this->load->view('user/petugas/view-dashboard-petugas.php');
		$this->load->view('templates/footer');
	}

	public function dashboardPenerima()
	{
		if ($this->session->userdata('username')) {

			$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}
		$title['title'] = "Dashboard Penerima";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-penerima.php');
		$this->load->view('user/penerima/view-dashboard-penerima.php');
		$this->load->view('templates/footer');
	}

	public function viewProfile()
	{

		$title['title'] = "Inbako Profile";
		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-dashboard-profile.php');
		$this->load->view('templates/footer');
	}
}

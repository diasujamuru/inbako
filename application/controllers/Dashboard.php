<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('username'))) {
			redirect('auth/admin');
		}
	}

	public function dashboardPetugas()
	{
		if ($this->session->userdata('username')) {

			$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}
		$title['title'] = "InBako Profile";

		$this->load->view('templates/header', $title);
		$this->load->view('admin/view-dashboard-petugas.php', $data);
		$this->load->view('templates/footer');
	}

	public function dashboardPenerima()
	{
		if ($this->session->userdata('username')) {

			$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}
		$title['title'] = "InBako Profile";

		$this->load->view('templates/header', $title);
		$this->load->view('admin/view-dashboard-penerima.php', $data);
		$this->load->view('templates/footer');
	}

	public function dashboardAdmin()
	{
		if ($this->session->userdata('username')) {

			$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}
		$title['title'] = "InBako Profile";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-dashboard.php', $data);
		$this->load->view('templates/footer');
	}

	public function viewProfile()
	{

		$title['title'] = "KampusKita Profile";
		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-dashboard-profile.php');
		$this->load->view('templates/footer');
	}
}

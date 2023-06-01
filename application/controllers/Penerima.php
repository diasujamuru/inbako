<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerima extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('ModelPenerima');
		$this->load->model('ModelJadwal');

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

	public function jadwal()
	{
		if ($this->session->userdata('email')) {
			$desc['users'] = $this->ModelPenerima->cekData(['email' => $this->session->userdata('email')])->row_array();
		}

		$kode_wilayah_penerima = $this->session->userdata('kode_wilayah');
		$this->load->model('ModelJadwal');
		$data['jadwal'] = $this->ModelJadwal->getJadwal($kode_wilayah_penerima);


		$title['title'] = "Jadwal Pengambilan";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-penerima', $desc);
		$this->load->view('user/penerima/view-jadwal-penerima.php', $data);
		$this->load->view('templates/footer');
	}

	public function lihatDaftarPengambilan($kode_perwilayah)
	{


		if ($this->session->userdata('email')) {
			$desc['users'] = $this->ModelPenerima->cekData(['email' => $this->session->userdata('email')])->row_array();
		}

		// $kode_wilayah_petugas = $this->session->userdata('kode_wilayah');
		// $this->load->model('ModelPenerima');
		// $data['warga'] = $this->ModelPenerima->get_warga_by_kode_wilayah_petugas_login($kode_wilayah_petugas);



		$data['warga'] = $this->ModelPenerima->get_warga_by_kode_perwilayah($kode_perwilayah);

		$data['jadwal'] = $this->ModelJadwal->getPerWilayahPenerima($kode_perwilayah);

		$title['title'] = "Daftar Pengambilan";


		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-penerima', $desc);
		$this->load->view('user/penerima/view_daftar_pengambilan_penerima.php', $data);
		$this->load->view('templates/footer');
	}
}

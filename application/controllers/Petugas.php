<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelJadwal');
		$this->load->model('ModelPenerima');
		$this->load->model('ModelPetugas');

		if (empty($this->session->userdata('email'))) {
			redirect('auth');
		}
	}

	public function index()
	{

		if ($this->session->userdata('email')) {

			$desc['users'] = $this->ModelPetugas->cekData(['email' => $this->session->userdata('email')])->row_array();
		}
		$title['title'] = "Dashboard Petugas";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas.php', $desc);
		$this->load->view('user/petugas/view-dashboard-petugas.php');
		$this->load->view('templates/footer');


		// if ($this->session->userdata('username')) {

		// 	$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		// }
		// $title['title'] = "Dashboard Petugas";

		// $this->load->view('templates/header', $title);
		// $this->load->view('templates/navbar-user-petugas.php');
		// $this->load->view('user/petugas/view-dashboard-petugas.php');
		// $this->load->view('templates/footer');
	}

	public function jadwal()
	{
		if ($this->session->userdata('email')) {
			$desc['users'] = $this->ModelPetugas->cekData(['email' => $this->session->userdata('email')])->row_array();
		}

		$kode_wilayah_petugas = $this->session->userdata('kode_wilayah');
		$this->load->model('ModelJadwal');
		$data['jadwal'] = $this->ModelJadwal->getJadwal($kode_wilayah_petugas);


		$title['title'] = "Jadwal Pengambilan";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas', $desc);
		$this->load->view('user/petugas/view-jadwal-petugas.php', $data);
		$this->load->view('templates/footer');
	}

	public function buatJadwal()
	{

		$kode = $this->input->post('kode_wilayah');
		$kode_perwilayah = $this->input->post('kode_perwilayah');
		$tgl = $this->input->post('tgl');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');

		$data = [
			'kode_wilayah' => $kode,
			'kode_perwilayah' => $kode_perwilayah,
			'tanggal' => $tgl,
			'mulai' => $mulai,
			'selesai' => $selesai,
		];


		$this->ModelPetugas->insertDataJadwal($data);

		redirect('petugas/jadwal');
	}


	public function lihatDataPenduduk()
	{
		if ($this->session->userdata('email')) {
			$desc['users'] = $this->ModelPetugas->cekData(['email' => $this->session->userdata('email')])->row_array();
		}

		$kode_wilayah_petugas = $this->session->userdata('kode_wilayah');

		$this->load->model('ModelPenerima');
		$data['warga'] = $this->ModelPenerima->get_warga_by_kode_wilayah_petugas_login($kode_wilayah_petugas);
		$title['title'] = "Data Penduduk";


		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas', $desc);
		$this->load->view('user/petugas/view-data-penduduk.php', $data);
		$this->load->view('templates/footer');
	}

	public function lihatDaftarPengambilan($kode_perwilayah)
	{


		if ($this->session->userdata('email')) {
			$desc['users'] = $this->ModelPetugas->cekData(['email' => $this->session->userdata('email')])->row_array();
		}

		// $kode_wilayah_petugas = $this->session->userdata('kode_wilayah');
		// $this->load->model('ModelPenerima');
		// $data['warga'] = $this->ModelPenerima->get_warga_by_kode_wilayah_petugas_login($kode_wilayah_petugas);



		$data['warga'] = $this->ModelPenerima->get_warga_by_kode_perwilayah($kode_perwilayah);

		$data['jadwal'] = $this->ModelJadwal->getPerWilayah($kode_perwilayah);

		$title['title'] = "Daftar Pengambilan";


		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas', $desc);
		$this->load->view('user/petugas/view-daftar-pengambilan.php', $data);
		$this->load->view('templates/footer');
	}
}

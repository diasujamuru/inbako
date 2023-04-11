<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelPetugas');

		// if (empty($this->session->userdata('username'))) {
		// 	redirect('auth/admin');
		// }
	}

	public function index()
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

	public function jadwal()
	{
		$title['title'] = "Daftar Jadwal Pengambilan";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas.php');
		$this->load->view('user/petugas/view-jadwal-petugas.php');
		$this->load->view('templates/footer');
	}

	public function buatJadwal()
	{
		$queryAllJadwal = $this->ModelPetugas->getDataJadwal();
		$data = array('jadwal' => $queryAllJadwal);
		$title['title'] = 'Daftar Jadwal Pengambilan';

		// $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[mahasiswa.nim]', [
		// 	'is_unique' => 'NIM Sudah Terdaftar!'
		// ]);
		// $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mahasiswa.email]', [
		// 	'is_unique' => 'Email Sudah Terdaftar!'
		// ]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $title);
			$this->load->view('templates/navbar-user-petugas');
			$this->load->view('user/petugas/view-jadwal-petugas', $data);
			$this->load->view('templates/footer');
		} else {
			$kode_wilayah = $this->input->post('kode_wilayah');
			$tgl = $this->input->post('tgl');
			$jamAwal = $this->input->post('jam_awal');
			$jamTenggat = $this->input->post('jam_tenggat');

			$data = array(
				'kode_wilayah' => $kode_wilayah,
				'tanggal' => $tgl,
				'jam_awal' => $jamAwal,
				'jam_tenggat' => $jamTenggat,

			);

			$this->ModelPetugas->insertDataJadwal($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post Jadwal telah berhasil dibuat!</div>');

			redirect('petugas/jadwal');
		}
	}

	public function lihatDataPenduduk()
	{
		$queryAllWarga = $this->ModelPetugas->getDataPenduduk();
		$data = array('warga' => $queryAllWarga);
		$title['title'] = "Data Penduduk";

		// $config['base_url'] = 'http://localhost/kampuskita/mahasiswa/index';

		// //ambil data keyword
		// if ($this->input->post('submit')) {
		// 	$data['keyword'] = $this->input->post('keyword');
		// 	$this->session->set_userdata('keyword', $data['keyword']);
		// } else {
		// 	$data['keyword'] = $this->session->userdata('keyword', $data);
		// }

		// //pagination
		// //config
		// $this->db->like('nama', $data['keyword']);
		// $this->db->or_like('email', $data['keyword']);
		// $this->db->or_like('jurusan', $data['keyword']);
		// $this->db->or_like('nim', $data['keyword']);
		// $this->db->from('mahasiswa');
		// $config['total_rows'] = $this->db->count_all_results();
		// $data['total_rows'] = $config['total_rows'];
		// $config['per_page'] = 7;

		// //initialize
		// $this->pagination->initialize($config);

		// $data['start'] = $this->uri->segment(3);
		// $data['warga'] = $this->ModelPetugas->getMahasiswa($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/navbar-user-petugas');
		$this->load->view('user/petugas/view-data-penduduk.php', $data);
		$this->load->view('templates/footer');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('ModelAdmin');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {

			$data['users'] = $this->ModelAdmin->cekData(['email' => $this->session->userdata('email')])->row_array();
		}
		$title['title'] = "Dashboard Admin";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-dashboard.php', $data);
		$this->load->view('templates/footer');
	}

	public function dataWarga()
	{

		$title['title'] = "Data Warga";

		//ambil data keyword
		if ($this->input->get('submit')) {
			$data['keyword'] = trim($this->input->get('keyword'));
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// config
		$config['base_url'] = 'http://localhost/inbako/admin/dataWarga';

		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('nik', $data['keyword']);
		$this->db->or_like('ttl', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('kota', $data['keyword']);
		$this->db->or_like('kecamatan', $data['keyword']);
		$this->db->or_like('kelurahan', $data['keyword']);
		$this->db->or_like('kode_wilayah', $data['keyword']);
		$this->db->or_like('kode_perwilayah', $data['keyword']);

		$this->db->from('warga');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 5;


		// initialize pagination
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['pagination'] = $this->pagination->create_links();
		$data['warga'] = $this->ModelAdmin->getWarga($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-data-warga.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDataWarga()
	{
		$queryAllWarga = $this->ModelAdmin->getAllWarga();
		$data = array('warga' => $queryAllWarga);
		$title['title'] = 'Tambah Data Warga';

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nik = $this->input->post('nik');
		$ttl = $this->input->post('ttl');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$no_telpon = $this->input->post('no_telpon');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$kode_perwilayah = $this->input->post('kode_perwilayah');

		$data = array(
			'nama' => $nama,
			'email' => $email,
			'nik' => $nik,
			'ttl' => $ttl,
			'kota' => $kota,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'rt' => $rt,
			'rw' => $rw,
			'no_telpon' => $no_telpon,
			'kode_wilayah' => $kode_wilayah,
			'kode_perwilayah' => $kode_perwilayah,

		);

		$this->ModelAdmin->tambahDataWarga($data);

		$this->session->set_flashdata('success_message', 'Data berhasil ditambahkan');

		redirect('admin/dataWarga?keyword=&submit=Submit');
	}

	public function editDataWarga()
	{
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$ttl = $this->input->post('ttl');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$no_telpon = $this->input->post('no_telpon');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$kode_perwilayah = $this->input->post('kode_perwilayah');

		$data = [
			'id' => $id,
			'nik' => $nik,
			'nama' => $nama,
			'ttl' => $ttl,
			'kota' => $kota,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'rt' => $rt,
			'rw' => $rw,
			'no_telpon' => $no_telpon,
			'kode_wilayah' => $kode_wilayah,
			'kode_perwilayah' => $kode_perwilayah

		];

		$where = [
			'id' => $id
		];

		$this->ModelAdmin->editDataWarga($where, $data, 'warga');

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');
		$this->session->set_flashdata('success_message', 'Data berhasil diubah');

		redirect('admin/dataWarga?keyword=&submit=Submit');
	}

	public function deleteDataWarga($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataWarga($where, 'warga');
		$this->session->set_flashdata('success_message', 'Data berhasil dihapus');
		redirect('admin/dataWarga?keyword=&submit=Submit');
	}


	public function dataPetugas()
	{

		$title['title'] = "Data Petugas";

		//ambil data keyword
		if ($this->input->get('submit')) {
			$data['keyword'] = trim($this->input->get('keyword'));
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// config
		$config['base_url'] = 'http://localhost/inbako/admin/dataPetugas';

		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('nik', $data['keyword']);
		$this->db->or_like('tgl_lahir', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('kota', $data['keyword']);
		$this->db->or_like('kecamatan', $data['keyword']);
		$this->db->or_like('kelurahan', $data['keyword']);
		$this->db->or_like('kode_wilayah', $data['keyword']);

		$this->db->from('petugas');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 2;


		// initialize pagination
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['pagination'] = $this->pagination->create_links();
		$data['petugas'] = $this->ModelAdmin->getPetugas($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-data-petugas.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDataPetugas()
	{
		$this->load->library('form_validation');

		$queryAllPetugas = $this->ModelAdmin->getAllPetugas();
		$data = array('petugas' => $queryAllPetugas);
		$title['title'] = 'Tambah Data Petugas';


		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[petugas.nik]', [
			'is_unique' => 'NIK Sudah Terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[petugas.email]', [
			'is_unique' => 'Email Sudah Terdaftar!'
		]);
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|trim|is_unique[petugas.no_telepon]', [
			'is_unique' => 'No Telepon Sudah Terdaftar!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$errorMessage = validation_errors();
			echo json_encode(['status' => 'error', 'message' => $errorMessage]);
		} else {

			$nik = $this->input->post('nik');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$no_telepon = $this->input->post('no_telepon');
			$kota = $this->input->post('kota');
			$kecamatan = $this->input->post('kecamatan');
			$kelurahan = $this->input->post('kelurahan');
			$kode_wilayah = $this->input->post('kode_wilayah');

			$data = array(
				'nik' => $nik,
				'nama' => $nama,
				'email' => $email,
				'tgl_lahir' => $tgl_lahir,
				'no_telepon' => $no_telepon,
				'kota' => $kota,
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'kode_wilayah' => $kode_wilayah

			);

			$this->ModelAdmin->tambahDataPetugas($data);

			$this->session->set_flashdata('success_message', 'Data berhasil ditambah');

			redirect('admin/dataPetugas');
		}
	}

	public function editDataPetugas()
	{
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_telepon = $this->input->post('no_telepon');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kode_wilayah = $this->input->post('kode_wilayah');

		$data = [
			'id' => $id,
			'nik' => $nik,
			'nama' => $nama,
			'email' => $email,
			'tgl_lahir' => $tgl_lahir,
			'no_telepon' => $no_telepon,
			'kota' => $kota,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'kode_wilayah' => $kode_wilayah,

		];

		$where = [
			'id' => $id
		];

		$this->ModelAdmin->editDataPetugas($where, $data, 'petugas');

		$this->session->set_flashdata('success_message', 'Data berhasil diubah');

		redirect('admin/dataPetugas');
	}

	public function deleteDataPetugas($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataPetugas($where, 'petugas');
		$this->session->set_flashdata('success_message', 'Data berhasil dihapus');
		redirect('admin/dataPetugas?keyword=&submit=Submit');
	}



	public function dataJadwal()
	{
		$queryAllJadwal = $this->ModelAdmin->getDataJadwal();
		$data = array('jadwal' => $queryAllJadwal);
		$title['title'] = "Data jadwal";

		$config['base_url'] = 'http://localhost/inbako/admin/dataJadwal';

		//ambil data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword', $data);
		}

		//pagination
		//config
		$this->db->like('kode_wilayah', $data['keyword']);
		$this->db->or_like('tanggal', $data['keyword']);
		$this->db->or_like('mulai', $data['keyword']);
		$this->db->or_like('selesai', $data['keyword']);
		$this->db->or_like('kode_perwilayah', $data['keyword']);
		$this->db->from('jadwal');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 7;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['jadwal'] = $this->ModelAdmin->getJadwal($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-data-jadwal.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDataJadwal()
	{
		$queryAllJadwal = $this->ModelAdmin->getDataJadwal();
		$data = array('jadwal' => $queryAllJadwal);
		$title['title'] = 'Tambah Data adwal';

		$kode_wilayah = $this->input->post('kode_wilayah');
		$tanggal = $this->input->post('tanggal');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		$kode_perwilayah = $this->input->post('kode_perwilayah');

		$data = array(
			'kode_wilayah' => $kode_wilayah,
			'tanggal' => $tanggal,
			'mulai' => $mulai,
			'selesai' => $selesai,
			'kode_perwilayah' => $kode_perwilayah,

		);

		$this->ModelAdmin->tambahDataJadwal($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil ditambahkan!</div>');

		redirect('admin/dataJadwal');
	}

	public function editDataJadwal()
	{
		$id = $this->input->post('id');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$tanggal = $this->input->post('tanggal');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		$kode_perwilayah = $this->input->post('kode_perwilayah');

		$data = [
			'id' => $id,
			'kode_wilayah' => $kode_wilayah,
			'tanggal' => $tanggal,
			'mulai' => $mulai,
			'selesai' => $selesai,
			'kode_perwilayah' => $kode_perwilayah,

		];

		$where = [
			'id' => $id
		];

		$this->ModelAdmin->editDataJadwal($where, $data, 'jadwal');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('admin/dataJadwal');
	}

	public function deleteDataJadwal($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataJadwal($where, 'jadwal');
		redirect('admin/dataJadwal');
	}
}

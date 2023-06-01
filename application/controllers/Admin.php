<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelAdmin');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {

			$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		}
		$title['title'] = "Dashboard Admin";

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-dashboard.php', $data);
		$this->load->view('templates/footer');
	}

	public function dataWarga()
	{
		$queryAllWarga = $this->ModelAdmin->getDataWarga();
		$data = array('warga' => $queryAllWarga);
		$title['title'] = "Data Warga";

		$config['base_url'] = 'http://localhost/inbako/admin/dataWarga';

		// ambil data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword', $data);
		}

		//pagination
		//config
		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('kota', $data['keyword']);
		$this->db->or_like('kecamatan', $data['keyword']);
		$this->db->or_like('kelurahan', $data['keyword']);
		$this->db->or_like('rt', $data['keyword']);
		$this->db->or_like('rw', $data['keyword']);
		$this->db->or_like('kode_wilayah', $data['keyword']);
		$this->db->or_like('kode_perwilayah', $data['keyword']);
		$this->db->from('warga');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 7;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['warga'] = $this->ModelAdmin->getWarga($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-data-warga.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDataWarga()
	{
		$queryAllWarga = $this->ModelAdmin->getDataWarga();
		$data = array('warga' => $queryAllWarga);
		$title['title'] = 'Tambah Data Warga';

		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$no_telpon = $this->input->post('no_telpon');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$kode_perwilayah = $this->input->post('kode_perwilayah');

		$data = array(
			'nik' => $nik,
			'nama' => $nama,
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

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil ditambahkan!</div>');

		redirect('admin/dataWarga');
	}

	public function editDataWarga()
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$no_telpon = $this->input->post('no_telpon');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$kode_perwilayah = $this->input->post('kode_perwilayah');

		$data = [
			'nik' => $nik,
			'nama' => $nama,
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
			'nik' => $nik
		];

		$this->ModelAdmin->editDataWarga($where, $data, 'warga');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('admin/dataWarga');
	}

	public function deleteDataWarga($nik)
	{
		$where = array('nik' => $nik);
		$this->ModelAdmin->deleteDataWarga($where, 'warga');
		redirect('admin/dataWarga');
	}


	public function dataPetugas()
	{
		$queryAllPetugas = $this->ModelAdmin->getDataPetugas();
		$data = array('petugas' => $queryAllPetugas);
		$title['title'] = "Data Petugas";

		$config['base_url'] = 'http://localhost/inbako/admin/dataPetugas';

		// ambil data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword', $data);
		}

		//pagination
		//config
		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('kota', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('kecamatan', $data['keyword']);
		$this->db->or_like('kelurahan', $data['keyword']);
		$this->db->or_like('kode_wilayah', $data['keyword']);
		$this->db->or_like('status', $data['keyword']);
		$this->db->from('petugas');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 7;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['petugas'] = $this->ModelAdmin->getPetugas($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/view-data-petugas.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahDataPetugas()
	{
		$queryAllPetugas = $this->ModelAdmin->getDataPetugas();
		$data = array('petugas' => $queryAllPetugas);
		$title['title'] = 'Tambah Data Petugas';

		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$kota = $this->input->post('kota');
		$email = $this->input->post('email');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$status = $this->input->post('status');

		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'kota' => $kota,
			'email' => $email,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'kode_wilayah' => $kode_wilayah,
			'status' => $status,

		);

		$this->ModelAdmin->tambahDataPetugas($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil ditambahkan!</div>');

		redirect('admin/dataPetugas');
	}

	public function editDataPetugas()
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$kota = $this->input->post('kota');
		$email = $this->input->post('email');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kode_wilayah = $this->input->post('kode_wilayah');
		$status = $this->input->post('status');

		$data = [
			'nik' => $nik,
			'nama' => $nama,
			'kota' => $kota,
			'email' => $email,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'kode_wilayah' => $kode_wilayah,
			'status' => $status,

		];

		$where = [
			'nik' => $nik
		];

		$this->ModelAdmin->editDataPetugas($where, $data, 'petugas');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('admin/dataPetugas');
	}

	public function deleteDataPetugas($nik)
	{
		$where = array('nik' => $nik);
		$this->ModelAdmin->deleteDataPetugas($where, 'petugas');
		redirect('admin/dataPetugas');
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

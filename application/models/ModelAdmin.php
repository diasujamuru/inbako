<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
	public function cekData($where = null)
	{
		return $this->db->get_where('users', $where);
	}

	public function getAllWarga()
	{
		$query =  $this->db->get('warga');
		return $query->result();
	}

	public function countAllWarga()
	{
		$query = $this->db->get('warga');
		return $query->num_rows();
	}

	public function getWarga($limit, $start, $keyword = null)
	{
		$this->db->order_by('id', 'DESC');
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('nik', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('ttl', $keyword);
			$this->db->or_like('no_telpon', $keyword);
			$this->db->or_like('kota', $keyword);
			$this->db->or_like('kecamatan', $keyword);
			$this->db->or_like('kelurahan', $keyword);
			$this->db->or_like('kode_wilayah', $keyword);
			$this->db->or_like('kode_perwilayah', $keyword);
		}
		$query = $this->db->get('warga', $limit, $start);
		return $query->result();
	}

	public function tambahDataWarga($data)
	{
		$this->db->insert('warga', $data);
	}

	public function editDataWarga($where, $data)
	{

		$this->db->where($where);
		$this->db->update('warga', $data);
	}

	function deleteDataWarga($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getAllPetugas()
	{
		$query =  $this->db->get('petugas');
		return $query->result();
	}

	public function countAllPetugas()
	{
		$query = $this->db->get('petugas');
		return $query->num_rows();
	}

	public function getPetugas($limit, $start, $keyword = null)
	{
		$this->db->order_by('id', 'DESC');
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('nik', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('tgl_lahir', $keyword);
			$this->db->or_like('no_telepon', $keyword);
			$this->db->or_like('kota', $keyword);
			$this->db->or_like('kecamatan', $keyword);
			$this->db->or_like('kelurahan', $keyword);
			$this->db->or_like('kode_wilayah', $keyword);
		}
		$query = $this->db->get('petugas', $limit, $start);
		return $query->result();
	}

	public function tambahDataPetugas($data)
	{
		$this->db->insert('petugas', $data);
	}

	public function editDataPetugas($where, $data)
	{

		$this->db->where($where);
		$this->db->update('petugas', $data);
	}

	function deleteDataPetugas($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getDataJadwal()
	{
		$query = $this->db->get('jadwal');
		return $query->result();
	}

	public function getJadwal($limit, $start, $keyword = null)
	{
		$this->db->order_by('id', 'DESC');
		if ($keyword) {
			$this->db->like('kode_wilayah', $data['keyword']);
			$this->db->or_like('tanggal', $data['keyword']);
			$this->db->or_like('mulai', $data['keyword']);
			$this->db->or_like('selesai', $data['keyword']);
			$this->db->or_like('kode_perwilayah', $data['keyword']);
		}
		$query = $this->db->get('jadwal', $limit, $start);
		return $query->result();
	}

	public function tambahDataJadwal($data)
	{
		$this->db->insert('jadwal', $data);
	}

	public function editDataJadwal($where, $data)
	{

		$this->db->where($where);
		$this->db->update('jadwal', $data);
	}

	function deleteDataJadwal($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}

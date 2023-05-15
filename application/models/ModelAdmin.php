<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
	public function getDataWarga()
	{
		$query = $this->db->get('warga');
		return $query->result();
	}

	public function getWarga($limit, $start, $keyword = null)
	{
		$this->db->order_by('nik', 'DESC');
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('kota', $keyword);
			$this->db->or_like('kecamatan', $keyword);
			$this->db->or_like('kelurahan', $keyword);
			$this->db->or_like('rt', $keyword);
			$this->db->or_like('rw', $keyword);
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

	public function getDataPetugas()
	{
		$query = $this->db->get('petugas');
		return $query->result();
	}

	public function getPetugas($limit, $start, $keyword = null)
	{
		$this->db->order_by('nik', 'DESC');
		if ($keyword) {
			$this->db->like('nik', $data['keyword']);
			$this->db->or_like('nama', $data['keyword']);
			$this->db->or_like('kota', $data['keyword']);
			$this->db->or_like('email', $data['keyword']);
			$this->db->or_like('kecamatan', $data['keyword']);
			$this->db->or_like('kelurahan', $data['keyword']);
			$this->db->or_like('kode_wilayah', $data['keyword']);
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

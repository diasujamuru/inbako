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

	public function getDataPetugas()
	{
		$query = $this->db->get('petugas');
		return $query->result();
	}

	public function getDataJadwal()
	{
		$query = $this->db->get('jadwal');
		return $query->result();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPetugas extends CI_Model
{
	public function getDataPenduduk()
	{
		$query = $this->db->get('warga');
		return $query->result();
	}

	public function getDataJadwal()
	{
		$query = $this->db->get('jadwal');
		return $query->result();
	}

	public function insertDataMahasiswa($data)
	{
		$this->db->insert('jadwal', $data);
	}
}

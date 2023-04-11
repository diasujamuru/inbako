<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Model
{
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

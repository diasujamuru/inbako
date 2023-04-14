<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelJadwal extends CI_Model
{
	public function getJadwal($kode_wilayah_petugas)
	{
		$this->db->where('kode_wilayah_petugas', $kode_wilayah_petugas);
		$query = $this->db->get('jadwal');
		return $query->result();
	}
}

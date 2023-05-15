<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelJadwal extends CI_Model
{
	public function getJadwal($kode_wilayah_petugas)
	{
		$this->db->where('kode_wilayah', $kode_wilayah_petugas);
		$query = $this->db->get('jadwal');
		return $query->result();
	}

	// public function getPerWilayah($kode_perwilayah)
	// {
	// 	$this->db->get('jadwal', ['kode_perwilayah' => $kode_perwilayah])->row_array();
	// }
	
	public function getPerWilayah($kode_perwilayah)
	{
		$this->db->where('kode_perwilayah', $kode_perwilayah);
		$query = $this->db->get('jadwal');
		return $query->result();
	}
}

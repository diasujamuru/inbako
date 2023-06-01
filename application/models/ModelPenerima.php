<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPenerima extends CI_Model
{
	public function cekData($where = null)
	{
		return $this->db->get_where('users', $where);
	}


	public function get_warga_by_kode_wilayah_petugas_login($kode_wilayah_petugas)
	{
		$this->db->where('kode_wilayah', $kode_wilayah_petugas);
		$query = $this->db->get('warga');
		return $query->result();
	}

	public function get_warga_by_kode_perwilayah($kode_perwilayah)
	{
		$this->db->select('*');
		$this->db->from('warga');
		$this->db->where('kode_perwilayah', $kode_perwilayah);

		$query = $this->db->get();

		return $query->result();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPetugas extends CI_Model
{
	public function cek_login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$query = $this->db->get('users');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	// password_verify($password, $users['password'])

	public function getDataPenduduk()
	{
		$query = $this->db->get('warga');
		return $query->result();
	}

	public function getDataJadwal($kode_wilayah_petugas)
	{
		$this->db->where('kode_wilayah_petugas', $kode_wilayah_petugas);
		$query = $this->db->get('jadwal');
		return $query->result();
	}

	public function insertDataJadwal($data)
	{
		$this->db->insert('jadwal', $data);
	}
}

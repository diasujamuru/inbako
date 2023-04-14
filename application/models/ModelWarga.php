<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelWarga extends CI_Model
{

    public function get_warga_by_kode_wilayah_petugas_login($kode_wilayah_petugas)
    {
        $this->db->where('kode_wilayah', $kode_wilayah_petugas);
        $query = $this->db->get('warga');
        return $query->result();
    }
}

<?php

class ModelAdmin extends CI_Model
{
    function cek_login($table, $username)
    {
        return $this->db->get_where($table, $username);
    }
}

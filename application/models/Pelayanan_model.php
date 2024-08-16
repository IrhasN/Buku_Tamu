<?php

class Pelayanan_model extends CI_Model
{
    public function getTotalMemuaskan()
    {
        return $this->db->get_where('buku_tamu', ['pelayanan' => 'Memuaskan'])->num_rows();
    }
    public function getTotalCukupMemuaskan()
    {
        return $this->db->get_where('buku_tamu', ['pelayanan' => 'Cukup Memuaskan'])->num_rows();
    }
    public function getTotalKurangMemuaskan()
    {
        return $this->db->get_where('buku_tamu', ['pelayanan' => 'Kurang Memuaskan'])->num_rows();
    }
    public function getTotalTidakMemuaskan()
    {
        return $this->db->get_where('buku_tamu', ['pelayanan' => 'Tidak Memuaskan'])->num_rows();
    }
}

<?php

class Operator_model extends CI_Model
{
    public function editProfile()
    {
        $new_password = $this->input->post('password1');
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        $data = [
            'nama' => $this->input->post('nama'),
            'password' => $password_hash,
            'role_id' => $this->input->post('akses'),
            'is_active' => $this->input->post('status'),
            'date' => $this->input->post('date'),
            'unit_kerja' => $this->input->post('unit_kerja')
        ];
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('user', $data);
    }
    public function getAllTujuan()
    {
        return $this->db->get('data_tujuan')->result_array();
    }

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

    
    
    

    public function getTotaldiskopumker()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '1'])->num_rows();
    }
    public function getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '2'])->num_rows();
    }
    public function getTotalIntrukturMadya()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '3'])->num_rows();
    }
    public function getTotalMediatorHubunganIndustrialMadya()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '4'])->num_rows();
    }
    public function getTotalPengawasKoperasiMadya()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '5'])->num_rows();
    }
    public function getTotalIntrukturMuda()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '6'])->num_rows();
    }
    public function getTotalSekretaris()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '7'])->num_rows();
    }
    public function getTotalKepalaSubBagianKeuangan()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '8'])->num_rows();
    }
    public function getTotalKepalaSubBagianPerencaan()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '9'])->num_rows();
    }
    public function getTotalKepalaSubBagianmumdanKepegawaian()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '12'])->num_rows();
    }
    public function getTotalKepalaBidangUsahaMikro()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '16'])->num_rows();
    }
    public function getTotalKepalaBidangKoperasi()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '17'])->num_rows();
    }
    public function getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '18'])->num_rows();
    }
    public function getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '19'])->num_rows();
    }
    public function getTotalKepalaUPTBLK()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '20'])->num_rows();
    }
    public function getTotalKepalaSubBagianTataUsahaUPTBLK()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '21'])->num_rows();
    }
    public function getTotalPrakom()
    {
        return $this->db->get_where('buku_tamu', ['id_tujuan' => '21'])->num_rows();
    }
}

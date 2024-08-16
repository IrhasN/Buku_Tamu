<?php

class KepalaBidangUsahaMikro_model extends CI_Model
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
    public function getAllBukutamu()
    {

        // Join Table
        $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`,`data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
        FROM `buku_tamu`
        JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
        JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
        JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
        ORDER BY `buku_tamu`.`id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function getAllTujuan()
    {
        return $this->db->get('data_tujuan')->result_array();
    }
    public function getAllKategKepalaBidangUsahaMikro()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 16 order by id desc
        ";

        return $this->db->query($query)->result_array();
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


    public function tambah()
    {

        $data =  [
            "nama" => $this->input->post('nama', true) !== null ? htmlspecialchars($this->input->post('nama', true)) : null,
            "satker" => $this->input->post('satker', true) !== null ? htmlspecialchars($this->input->post('satker', true)) : null,
            "id_tujuan" => $this->input->post('id_tujuan', true) !== null ? htmlspecialchars($this->input->post('id_tujuan', true)) : null,
            "keperluan" => $this->input->post('keperluan', true) !== null ? htmlspecialchars($this->input->post('keperluan', true)) : null,
            "telp" => $this->input->post('telp', true) !== null ? htmlspecialchars($this->input->post('telp', true)) : null,
            "waktu" => $this->input->post('waktu', true),
            "pelayanan" => $this->input->post('pelayanan', true) !== null ? htmlspecialchars($this->input->post('pelayanan', true)) : null,
            "status1" => $this->input->post('status1', true) !== null ? htmlspecialchars($this->input->post('status1', true)) : 'Proses',
          
            "log_user" => $this->input->post('user', true) !== null ? htmlspecialchars($this->input->post('user', true)) : '',
            "catatan1" => $this->input->post('catatan', true) !== null ? htmlspecialchars($this->input->post('catatan1', true)) : '',
           
        ];
        
        $this->db->insert('buku_tamu', $data);
        
    }



    public function getAllInstansi()
    {
        return $this->db->get('data_instansi')->result_array();
    }

    public function getAllInstansiById($id)
    {
        return $this->db->get_where('data_instansi', ['id' => $id])->row_array();
    }

    public function getAllkeperluan()
    {
        return $this->db->get('data_keperluan')->result_array();
    }

    public function getAllkeperluanById($id)
    {
        return $this->db->get_where('data_keperluan', ['id' => $id])->row_array();
    }
    
 

    public function getAllTujuanById($id)
    {
        return $this->db->get_where('data_tujuan', ['id' => $id])->row_array();
    }

    public function getAllDataInstansi()
    {
        return $this->db->get('data_instansi')->result_array();
    }
    public function getAllDatakeperluan()
    {
        return $this->db->get('data_keperluan')->result_array();
    }

    public function getAllDataTujuan()
    {
        return $this->db->get('data_tujuan')->result_array();
    }



   public function getBukuTamuById($id)
    {
        return $this->db->get_where('buku_tamu', ['id' => $id])->row_array();
    }



    
    public function edit($id)
    {
        // Get the existing data
        $existing_data = $this->db->get_where('buku_tamu', ['id' => $id])->row_array();
    
        // Check if the record with the given ID exists
        if (!$existing_data) {
            // Handle the case where the record doesn't exist
            // You might want to redirect or show an error message
            return;
        }
    
        // Update the fields that are allowed to be changed
        $updated_data = [
            "catatan1" => $this->input->post('catatan1', true),
            "status1" => $this->input->post('status1', true),
        ];
    
        // Merge the updated data with the existing data
        $updated_data = array_merge($existing_data, $updated_data);
    
        // Update the record in the database
        $this->db->where('id', $id);
        $this->db->update('buku_tamu', $updated_data);
    }
    

    // public function proses($id)
    // {
    //     $status = 'proses';

    //     $this->db->set('status1', $status);
    //     $this->db->where('id', $id);
    //     $this->db->update('buku_tamu');
    // }
    // public function ditolak($id)
    // {
    //     $status = 'ditolak';

    //     $this->db->set('status1', $status);
    //     $this->db->where('id', $id);
    //     $this->db->update('buku_tamu');
    // }
    // public function diterima($id)
    // {
    //     $status = 'diterima';

    //     $this->db->set('status1', $status);
    //     $this->db->where('id', $id);
    //     $this->db->update('buku_tamu');
    // }
}


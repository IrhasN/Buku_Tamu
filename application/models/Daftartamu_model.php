<?php

class Daftartamu_model extends CI_Model
{

    public function getAllBukutamu()
    {

        // Join Table
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan`
        FROM `buku_tamu` JOIN `data_tujuan`
        ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` ORDER BY `id` DESC
        ";

        return $this->db->query($query)->result_array();
    }

    // Tampilan Desc berdasar ID
    // public function getAllLaporanBukutamu()
    // {

    //     // Join Table
    //     $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan`
    //     FROM `buku_tamu` JOIN `data_tujuan`
    //     ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` ORDER BY `id` DESC
    //     ";

    //     return $this->db->query($query)->result_array();
    // }

    public function getAllTujuan()
    {
        return $this->db->get('data_tujuan')->result_array();
    }

    public function getAllTujuanById($id)
    {
        return $this->db->get_where('data_tujuan', ['id' => $id])->row_array();
    }


    public function getAllDataTujuan()
    {
        return $this->db->get('data_tujuan')->result_array();
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
            "keterangan" => $this->input->post('keterangan', true) !== null ? htmlspecialchars($this->input->post('keterangan', true)) : null,
            "status1" => $this->input->post('status1', true) !== null ? htmlspecialchars($this->input->post('status1', true)) : 'Proses',
            
            "log_user" => $this->input->post('user', true) !== null ? htmlspecialchars($this->input->post('user', true)) : 'Tamu',
            "catatan1" => $this->input->post('catatan', true) !== null ? htmlspecialchars($this->input->post('catatan1', true)) : '',
           
        ];
        
        $this->db->insert('buku_tamu', $data);
        
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
           
            "keterangan" => $this->input->post('keterangan', true),
        ];
    
        // Merge the updated data with the existing data
        $updated_data = array_merge($existing_data, $updated_data);
    
        // Update the record in the database
        $this->db->where('id', $id);
        $this->db->update('buku_tamu', $updated_data);
    }
    
    public function delete($id)
    {
        $this->db->where($id);
        return $this->db->delete('buku_tamu');
    }
}

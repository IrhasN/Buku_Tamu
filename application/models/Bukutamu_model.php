<?php

class Bukutamu_model extends CI_Model
{

    public function getAllBukutamu()
    {
        // Join Table dan Urutkan Berdasarkan Kolom Waktu
        $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`, `data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
        FROM `buku_tamu`
        JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
        JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
        JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
        ORDER BY `buku_tamu`.`waktu` DESC";

$result = $this->db->query($query)->result_array();

// Debugging: Tampilkan query terakhir
// echo $this->db->last_query();

return $result;
    }
    public function get_recent_buku_tamu($limit = 10) {
        $this->db->select('buku_tamu.*, data_instansi.instansi, data_keperluan.keperluan, data_tujuan.tujuan');
        $this->db->from('buku_tamu');
        $this->db->join('data_instansi', 'buku_tamu.id_instansi = data_instansi.id');
        $this->db->join('data_keperluan', 'buku_tamu.id_keperluan = data_keperluan.id');
        $this->db->join('data_tujuan', 'buku_tamu.id_tujuan = data_tujuan.id');
        $this->db->where('buku_tamu.waktu >=', date('Y-m-d H:i:s', strtotime('-1 day')));
        $this->db->order_by('buku_tamu.waktu', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result_array();
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
    public function getAllInstansi()
    {
        return $this->db->get('data_instansi')->result_array();
    }
    public function getAllUser()
    {
        return $this->db->get('user',['id'])->result_array();
    }
    public function getAllUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
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

    public function getAllTujuan()
    {
        return $this->db->get('data_tujuan')->result_array();
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
    

    public function get_instansi() {
        return $this->db->get('data_instansi')->result_array();
    }

    public function get_keperluan() {
        return $this->db->get('data_keperluan')->result_array();
    }

    public function add_instansi($instansi) {
        $data = ['instansi' => $instansi];
        $this->db->insert('data_instansi', $data);
    }

    public function add_keperluan($keperluan) {
        $data = ['keperluan' => $keperluan];
        $this->db->insert('data_keperluan', $data);
    }

    public function tambah($data) {
        // Pastikan setiap field tidak null sebelum menggunakan htmlspecialchars
        $data['nama'] = htmlspecialchars($data['nama'] ? $data['nama'] : '');
        $data['id_instansi'] = htmlspecialchars($data['id_instansi'] ? $data['id_instansi'] : '');
        $data['id_keperluan'] = htmlspecialchars($data['id_keperluan'] ? $data['id_keperluan'] : '');
        $data['id_tujuan'] = htmlspecialchars($data['id_tujuan'] ? $data['id_tujuan'] : '');
        $data['keterangan'] = htmlspecialchars($data['keterangan'] ? $data['keterangan'] : '');
        $data['telp'] = htmlspecialchars($data['telp'] ? $data['telp'] : '');

        // Lakukan insert data ke database
        $this->db->insert('buku_tamu', $data);
    }

    public function getBukuTamuById($id)
    {
        return $this->db->get_where('buku_tamu', ['id' => $id])->row_array();
    }



    public function edit($id)
    {
        $data['buku_tamu'] = $this->db->get_where('buku_tamu', ['id' => $id])->row_array();

        $data = [
            "nama" => $this->input->post('nama', true),
          
            "id_instansi" => $this->input->post('id_instansi', true),
            "id_keperluan" => $this->input->post('id_keperluan', true),
            "id_tujuan" => $this->input->post('id_tujuan', true),
            
            "telp" => $this->input->post('telp', true),
            "waktu" => $this->input->post('waktu', true),
            "keterangan" => $this->input->post('keterangan', true),
             "status1" => $this->input->post('status1', true),
          

        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('buku_tamu', $data);
    }

    public function delete($id)
    {
        $this->db->where($id);
        return $this->db->delete('buku_tamu');
    }
}

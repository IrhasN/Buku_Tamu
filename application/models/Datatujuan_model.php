<?php

class Datatujuan_model extends CI_Model
{
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

    public function tambahDataTujuan($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }
    public function editDataTujuanById($id)
    {
        $data['data_tujuan'] = $this->db->get_where('data_tujuan', ['id' => $id])->row_array();

        $data = [
            "tujuan" => $this->input->post('tujuan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_tujuan', $data);
    }
    public function getDataTujuanById($id)
    {
        return $this->db->get_where('data_tujuan', ['id' => $id])->row_array();
    }

    public function deleteDataTujuanById($id)
    {
        $this->db->where($id);
        return $this->db->delete('data_tujuan');
    }
}

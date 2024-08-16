<?php

class Datakeperluan_model extends CI_Model
{
    public function getAllkeperluan()
    {
        return $this->db->get('data_keperluan')->result_array();
    }

    public function getAllkeperluanById($id)
    {
        return $this->db->get_where('data_keperluan', ['id' => $id])->row_array();
    }


    public function getAllDatakeperluan()
    {
        return $this->db->get('data_keperluan')->result_array();
    }

    public function tambahDatakeperluan($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }
    public function editDatakeperluanById($id)
    {
        $data['data_keperluan'] = $this->db->get_where('data_keperluan', ['id' => $id])->row_array();

        $data = [
            "keperluan" => $this->input->post('keperluan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_keperluan', $data);
    }
    public function getDatakeperluanById($id)
    {
        return $this->db->get_where('data_keperluan', ['id' => $id])->row_array();
    }

    public function deleteDatakeperluanById($id)
    {
        $this->db->where($id);
        return $this->db->delete('data_keperluan');
    }
}

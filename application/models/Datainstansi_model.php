<?php

class Datainstansi_model extends CI_Model
{
    public function getAllInstansi()
    {
        return $this->db->get('data_instansi')->result_array();
    }

    public function getAllInstansiById($id)
    {
        return $this->db->get_where('data_instansi', ['id' => $id])->row_array();
    }


    public function getAllDataInstansi()
    {
        return $this->db->get('data_instansi')->result_array();
    }

    public function tambahDataInstansi($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }
    public function editDataInstansiById($id)
    {
        $data['data_instansi'] = $this->db->get_where('data_instansi', ['id' => $id])->row_array();

        $data = [
            "instansi" => $this->input->post('instansi')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_instansi', $data);
    }
    public function getDataInstansiById($id)
    {
        return $this->db->get_where('data_instansi', ['id' => $id])->row_array();
    }

    public function deleteDataInstansiById($id)
    {
        $this->db->where($id);
        return $this->db->delete('data_instansi');
    }
}

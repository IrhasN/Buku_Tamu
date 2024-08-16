<?php

class User_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function tambahUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'role_id' => htmlspecialchars($this->input->post('hak_akses', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),
            'date' => htmlspecialchars($this->input->post('date', true)),
            'unit_kerja' => htmlspecialchars($this->input->post('unit_kerja', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        $this->db->insert('user', $data);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function editUser($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $new_password = $this->input->post('password1');
        $password_has = password_hash($new_password, PASSWORD_DEFAULT);

        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $password_has,
            'role_id' => $this->input->post('hak_akses'),
            'is_active' => $this->input->post('status'),
            'date' => $this->input->post('date'),
            'unit_kerja' => $this->input->post('unit_kerja')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function non_aktif_user($id)
    {
        $status = 'tidak';

        $this->db->set('is_active', $status);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
    public function aktif_user($id)
    {
        $status = 'aktif';

        $this->db->set('is_active', $status);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
      public function deleteDataUserById($id)
    {
        $this->db->where($id);
        return $this->db->delete('user');
    }
    
}

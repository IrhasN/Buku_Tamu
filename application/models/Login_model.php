<?php

class Login_model extends CI_Model
{
    public function tambahUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
           
            'is_active' => 'tidak',
            'date' => htmlspecialchars($this->input->post('date', true)),
            'unit_kerja' => htmlspecialchars($this->input->post('unit_kerja', true)),
        ];
        $this->db->insert('user', $data);
    }
}

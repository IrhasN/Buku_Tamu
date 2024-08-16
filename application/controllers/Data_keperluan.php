<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_keperluan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datakeperluan_model', 'keperluan');
        is_logged_FrontOffice();
    }

    public function index()
    {
        $data['title'] = 'keperluan';
        $data['data_keperluan'] = $this->keperluan->getAllDatakeperluan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_keperluan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data keperluan';
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_keperluan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $keperluan = $this->input->post('keperluan');
            if (!empty($keperluan)) {
                $data = [
                    "keperluan" => $keperluan
                ];
                $this->keperluan->tambahDatakeperluan($data, 'data_keperluan');
                $this->session->set_flashdata('message', '          
                    <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    Data Sukses Ditambahkan!..
                    </div>               
                    ');
                redirect('data_keperluan');
            } else {
                $this->session->set_flashdata('message', '          
                    <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    keperluan tidak boleh kosong!
                    </div>               
                    ');
                redirect('data_keperluan/tambah');
            }
        }
    
    
    
    
    }

    public function edit($id)
    {

        $data['title'] = 'Edit Data keperluan';
        $data['data_keperluan'] = $this->keperluan->getDatakeperluanById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_keperluan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->keperluan->editDatakeperluanById($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Edit!
            </div>
            ');
            redirect('data_keperluan');
        }
    }
    public function delete($id)
    {
        $id = [
            'id' => $id
        ];

        $this->keperluan->deleteDatakeperluanById($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Hapus!
            </div>
            ');
        redirect('data_keperluan');
    }
}

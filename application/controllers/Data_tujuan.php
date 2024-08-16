<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_tujuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datatujuan_model', 'tujuan');
        is_logged_FrontOffice();
    }

    public function index()
    {
        $data['title'] = 'Data Tujuan';
        $data['data_tujuan'] = $this->tujuan->getAllDataTujuan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_tujuan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data Tujuan';
        $this->form_validation->set_rules('tujuan', 'Tujaun', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_tujuan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "tujuan" => $this->input->post('tujuan', true)
            ];
            $this->tujuan->tambahDataTujuan($data, 'data_tujuan');
            $this->session->set_flashdata('message', '          
                    <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    Data Sukses Ditambahkan!..
                    </div>               
                    ');
            redirect('data_tujuan');
        }
    }

    public function edit($id)
    {

        $data['title'] = 'Edit Data Tujuan';
        $data['data_tujuan'] = $this->tujuan->getDataTujuanById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_tujuan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->tujuan->editDataTujuanById($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Edit!
            </div>
            ');
            redirect('data_tujuan');
        }
    }
    public function delete($id)
    {
        $id = [
            'id' => $id
        ];

        $this->tujuan->deleteDataTujuanById($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Hapus!
            </div>
            ');
        redirect('data_tujuan');
    }
}

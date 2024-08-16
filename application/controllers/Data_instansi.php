<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_instansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datainstansi_model', 'instansi');
        is_logged_FrontOffice();
    }

    public function index()
    {
        $data['title'] = 'instansi';
        $data['data_instansi'] = $this->instansi->getAllDatainstansi();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_instansi/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data instansi';
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_instansi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $instansi = $this->input->post('instansi');
            if (!empty($instansi)) {
                $data = [
                    "instansi" => $instansi
                ];
                $this->instansi->tambahDatainstansi($data, 'data_instansi');
                $this->session->set_flashdata('message', '          
                    <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    Data Sukses Ditambahkan!..
                    </div>               
                    ');
                redirect('data_instansi');
            } else {
                $this->session->set_flashdata('message', '          
                    <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    Instansi tidak boleh kosong!
                    </div>               
                    ');
                redirect('data_instansi/tambah');
            }
        }
    
    
    
    
    }

    public function edit($id)
    {

        $data['title'] = 'Edit Data instansi';
        $data['data_instansi'] = $this->instansi->getDatainstansiById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('instansi', 'instansi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_instansi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->instansi->editDatainstansiById($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Edit!
            </div>
            ');
            redirect('data_instansi');
        }
    }
    public function delete($id)
    {
        $id = [
            'id' => $id
        ];

        $this->instansi->deleteDatainstansiById($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Hapus!
            </div>
            ');
        redirect('data_instansi');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_tamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftartamu_model', 'daftar_tamu');
        
    }

    public function dashboard()
    {
        $data['title'] = 'Data Tamu';
        $data['daftar_tamu'] = $this->daftar_tamu->getAllBukutamu();
        

        $this->load->view('templates/header', $data);
        
        $this->load->view('daftar_tamu/topbar', $data);
        $this->load->view('daftar_tamu/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function index()
    {
        $data['title'] = 'Data Tamu';
        $data['daftar_tamu'] = $this->daftar_tamu->getAllBukutamu();
        

        $this->load->view('templates/header', $data);
        
        $this->load->view('daftar_tamu/topbar', $data);
        $this->load->view('daftar_tamu/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data';
        $data['tujuan'] = $this->daftar_tamu->getAllTujuan();
        

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('satker', 'Satker', 'required');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('id_tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
           
            $this->load->view('daftar_tamu/topbar', $data);
            $this->load->view('daftar_tamu/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->daftar_tamu->tambah();

            redirect('daftar_tamu');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['daftar_tamu'] = $this->daftar_tamu->getBukuTamuById($id);
        $data['tujuan'] = $this->daftar_tamu->getAllTujuan();
        $data['layanan'] = ['Memuaskan', 'Cukup Memuaskan', 'Kurang Memuaskan', 'Tidak Memuaskan'];

     
        // is_logged_admin();

       
        $this->form_validation->set_rules('pelayanan', 'Pelayanan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
        
            $this->load->view('daftar_tamu/topbar', $data);
            $this->load->view('daftar_tamu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->daftar_tamu->edit($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Edit!
            </div>
            ');

            $in = $this->uri->segment(3);
            if (!is_numeric($in)) {
                redirect();
            } else {
                if ($in == 1) {
                }
            }

            redirect(base_url() . "daftar_tamu/edit/" . $in);


        }
    }

    public function view($id)
    {
        $data['title'] = 'Detail Data Tamu';
        $data['daftar_tamu'] = $this->daftar_tamu->getBukuTamuById($id);
        $data['tujuan'] = $this->daftar_tamu->getAllTujuan();
        

        $this->load->view('templates/header', $data);
       
        $this->load->view('daftar_tamu/topbar', $data);
        $this->load->view('daftar_tamu/view', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {

      

        $this->daftar_tamu->delete($id);

        redirect('daftar_tamu');
    }
}

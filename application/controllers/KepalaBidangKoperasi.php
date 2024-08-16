<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepalaBidangKoperasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('KepalaBidangKoperasi_model', 'KepalaBidangKoperasi');
        $this->load->model('Datakeperluan_model','keperluan');
        is_logged_KepalaBidangKoperasi();
        // if ($this->session->userdata('role_id') != 'KepalaBidangKoperasi') {
        //     redirect('KepalaBidangKoperasi');
        }
    public function index()
    {
        $data['title'] = 'Halaman Intruktur Madya';

        $data['tujuan'] = $this->KepalaBidangKoperasi->getAllTujuan();
        $data['instansi'] = $this->KepalaBidangKoperasi->getAllInstansi();
        $data['keperluan'] = $this->KepalaBidangKoperasi->getAllkeperluan();
     
       
        $data['total_diskopumker'] = $this->KepalaBidangKoperasi->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->KepalaBidangKoperasi->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_KepalaBidangKoperasi'] = $this->KepalaBidangKoperasi->getTotalKepalaBidangKoperasi();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->KepalaBidangKoperasi->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->KepalaBidangKoperasi->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->KepalaBidangKoperasi->getTotalIntrukturMuda();
        $data['total_KepalaBidangKoperasi'] = $this->KepalaBidangKoperasi->getTotalKepalaBidangKoperasi();
        $data['total_KepalaSubBagianKeuangan'] = $this->KepalaBidangKoperasi->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->KepalaBidangKoperasi->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->KepalaBidangKoperasi->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangKoperasi'] = $this->KepalaBidangKoperasi->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangUsahaMikro'] = $this->KepalaBidangKoperasi->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangKoperasi->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangKoperasi->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->KepalaBidangKoperasi->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->KepalaBidangKoperasi->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangKoperasi'] = $this->KepalaBidangKoperasi->getAllKategKepalaBidangKoperasi();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();

        $this->load->view('KepalaBidangKoperasi/header', $data);
        $this->load->view('KepalaBidangKoperasi/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangKoperasi/index', $data);
        $this->load->view('templates/footer');
    }
    public function BKKepalaBidangKoperasi()
    {
        $data['title'] = 'Data Tamu';
        $data['KepalaBidangKoperasi'] = $this->KepalaBidangKoperasi->getAllKategKepalaBidangKoperasi();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangKoperasi/header', $data);
        $this->load->view('KepalaBidangKoperasi/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangKoperasi/BKKepalaBidangKoperasi', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangKoperasi/header', $data);
        $this->load->view('KepalaBidangKoperasi/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangKoperasi/profile', $data);
        $this->load->view('templates/footer');
    }

    public function seting()
    {

        $data['title'] = 'Account Seting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('password', 'Current Password', 'required');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[5]|matches[password2]', [
            'min_length' => 'Password to short, min 5 character',
            'matches' => 'New password & reepet password dont match',
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('KepalaBidangKoperasi/header', $data);
            $this->load->view('KepalaBidangKoperasi/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangKoperasi/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('KepalaBidangKoperasi/seting');
            } else {
                $this->KepalaBidangKoperasi->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('KepalaBidangKoperasi/seting');
            }
        }
    }public function proses($id)
    {
        $this->user->proses($id);
        $this->session->set_flashdata('message', '          
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            User Sukses Di Non Aktifkan!..
            </div>               
            ');

        redirect('KepalaBidangKoperasi/BKKepalaBidangKoperasi');
    }
    // public function diterima($id)
    // {

    //     $this->user->diterima($id);
    //     $this->session->set_flashdata('message', '          
    //     <div class="alert alert-success" role="alert">
    //     <i class="fas fa-check-circle"></i>
    //     User Sukses Di Aktifkan!..
    //     </div>               
    //     ');

    //     redirect('KepalaBidangKoperasi/BKKepalaBidangKoperasi');
    // }
    // public function ditolak($id)
    // {

    //     $this->user->ditolak($id);
    //     $this->session->set_flashdata('message', '          
    //     <div class="alert alert-success" role="alert">
    //     <i class="fas fa-check-circle"></i>
    //     User Sukses Di Aktifkan!..
    //     </div>               
    //     ');

    //     redirect('KepalaBidangKoperasi/BKKepalaBidangKoperasi');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangKoperasi'] = $this->KepalaBidangKoperasi->getBukuTamuById($id);
        $data['tujuan'] = $this->KepalaBidangKoperasi->getAllTujuan();
        $data['status1'] = [ 'Diterima', 'Ditolak'];
        
        $data['keperluan'] = $this->KepalaBidangKoperasi->getAllkeperluan();
        $data['instansi'] = $this->KepalaBidangKoperasi->getAllInstansi();
    
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('KepalaBidangKoperasi/header', $data);
            $this->load->view('KepalaBidangKoperasi/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangKoperasi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->KepalaBidangKoperasi->edit($id);
    
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> Data Sukses di Edit!
                </div>
            ');
    

            $in = $this->uri->segment(3);
            if (!is_numeric($in)) {
                redirect();
            } else {
                if ($in == 1) {
                }
            }

            redirect(base_url() . "KepalaBidangKoperasi/edit/" . $in);


        }
    }
    

}

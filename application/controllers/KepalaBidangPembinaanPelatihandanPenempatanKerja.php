<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepalaBidangPembinaanPelatihandanPenempatanKerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('KepalaBidangPembinaanPelatihandanPenempatanKerja_model', 'KepalaBidangPembinaanPelatihandanPenempatanKerja');
        $this->load->model('Datakeperluan_model','keperluan');
        is_logged_KepalaBidangPembinaanPelatihandanPenempatanKerja();
        // if ($this->session->userdata('role_id') != 'KepalaBidangPembinaanPelatihandanPenempatanKerja') {
        //     redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja');
        }
    public function index()
    {
        $data['title'] = 'Halaman Intruktur Madya';

        $data['tujuan'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllTujuan();
        $data['instansi'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllInstansi();
        $data['keperluan'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllkeperluan();
      

        $data['total_diskopumker'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_IntrukturMadya'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalIntrukturMadya();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalIntrukturMuda();
        $data['total_Sekretaris'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalSekretaris();
        $data['total_KepalaSubBagianKeuangan'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllKategKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();

        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/header', $data);
        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/index', $data);
        $this->load->view('templates/footer');
    }
    public function BKKepalaBidangPembinaanPelatihandanPenempatanKerja()
    {
        $data['title'] = 'Data Tamu';
        $data['KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllKategKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/header', $data);
        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/BKKepalaBidangPembinaanPelatihandanPenempatanKerja', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/header', $data);
        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/profile', $data);
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
            $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/header', $data);
            $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja/seting');
            } else {
                $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja/seting');
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

        redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja/BKKepalaBidangPembinaanPelatihandanPenempatanKerja');
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

    //     redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja/BKKepalaBidangPembinaanPelatihandanPenempatanKerja');
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

    //     redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja/BKKepalaBidangPembinaanPelatihandanPenempatanKerja');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getBukuTamuById($id);
        $data['tujuan'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllTujuan();
        $data['status1'] = [ 'Diterima', 'Ditolak'];
        
        $data['keperluan'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllkeperluan();
        $data['instansi'] = $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->getAllInstansi();
    
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/header', $data);
            $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangPembinaanPelatihandanPenempatanKerja/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->KepalaBidangPembinaanPelatihandanPenempatanKerja->edit($id);
    
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

            redirect(base_url() . "KepalaBidangPembinaanPelatihandanPenempatanKerja/edit/" . $in);


        }
    }
    

}

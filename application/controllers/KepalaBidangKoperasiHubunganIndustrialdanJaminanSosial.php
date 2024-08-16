<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial_model', 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial');
        $this->load->model('Datakeperluan_model','keperluan');
        is_logged_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        // if ($this->session->userdata('role_id') != 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial') {
        //     redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial');
        }
    public function index()
    {
        $data['title'] = 'Halaman Intruktur Madya';

        $data['tujuan'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllTujuan();
        $data['instansi'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllInstansi();
        $data['keperluan'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllkeperluan();
      


        $data['total_diskopumker'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_IntrukturMadya'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalIntrukturMadya();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalIntrukturMuda();
        $data['total_Sekretaris'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalSekretaris();
        $data['total_KepalaSubBagianKeuangan'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllKategKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();

        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/header', $data);
        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/index', $data);
        $this->load->view('templates/footer');
    }
    public function BKKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial()
    {
        $data['title'] = 'Data Tamu';
        $data['KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllKategKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/header', $data);
        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/BKKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/header', $data);
        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/profile', $data);
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
            $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/header', $data);
            $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/seting');
            } else {
                $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/seting');
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

        redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/BKKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial');
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

    //     redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/BKKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial');
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

    //     redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/BKKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getBukuTamuById($id);
        $data['tujuan'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllTujuan();
        $data['status1'] = [ 'Diterima', 'Ditolak'];
        
        $data['keperluan'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllkeperluan();
        $data['instansi'] = $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->getAllInstansi();
    
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/header', $data);
            $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial->edit($id);
    
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

            redirect(base_url() . "KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/edit/" . $in);


        }
    }
    

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IntrukturMadya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('IntrukturMadya_model', 'IntrukturMadya');
        is_logged_IntrukturMadya();
        // if ($this->session->userdata('role_id') != 'IntrukturMadya') {
        //     redirect('IntrukturMadya');
        }
    public function index()
    {
        $data['title'] = 'Halaman Intruktur Madya';

        $data['tujuan'] = $this->IntrukturMadya->getAllTujuan();
        $data['total_memuaskan'] = $this->IntrukturMadya->getTotalMemuaskan();
        $data['total_cukup_memuaskan'] = $this->IntrukturMadya->getTotalCukupMemuaskan();
        $data['total_kurang_memuaskan'] = $this->IntrukturMadya->getTotalKurangMemuaskan();
        $data['total_tidak_memuaskan'] = $this->IntrukturMadya->getTotalTidakMemuaskan();

        $data['total_memuaskan'] = $this->IntrukturMadya->getTotalMemuaskan();
        $data['total_cukup_memuaskan'] = $this->IntrukturMadya->getTotalCukupMemuaskan();
        $data['total_kurang_memuaskan'] = $this->IntrukturMadya->getTotalKurangMemuaskan();
        $data['total_tidak_memuaskan'] = $this->IntrukturMadya->getTotalTidakMemuaskan();
       
        $data['total_diskopumker'] = $this->IntrukturMadya->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->IntrukturMadya->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_IntrukturMadya'] = $this->IntrukturMadya->getTotalIntrukturMadya();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->IntrukturMadya->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->IntrukturMadya->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->IntrukturMadya->getTotalIntrukturMuda();
        $data['total_IntrukturMadya'] = $this->IntrukturMadya->getTotalIntrukturMadya();
        $data['total_KepalaSubBagianKeuangan'] = $this->IntrukturMadya->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->IntrukturMadya->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->IntrukturMadya->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->IntrukturMadya->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->IntrukturMadya->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->IntrukturMadya->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->IntrukturMadya->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->IntrukturMadya->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->IntrukturMadya->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('IntrukturMadya/header', $data);
        $this->load->view('IntrukturMadya/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('IntrukturMadya/index', $data);
        $this->load->view('templates/footer');
    }
    public function BKIntrukturMadya()
    {
        $data['title'] = 'Data Tamu';
        $data['IntrukturMadya'] = $this->IntrukturMadya->getAllKategIntrukturMadya();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('IntrukturMadya/header', $data);
        $this->load->view('IntrukturMadya/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('IntrukturMadya/BKIntrukturMadya', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('IntrukturMadya/header', $data);
        $this->load->view('IntrukturMadya/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('IntrukturMadya/profile', $data);
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
            $this->load->view('IntrukturMadya/header', $data);
            $this->load->view('IntrukturMadya/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('IntrukturMadya/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('IntrukturMadya/seting');
            } else {
                $this->IntrukturMadya->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('IntrukturMadya/seting');
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

        redirect('IntrukturMadya/BKIntrukturMadya');
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

    //     redirect('IntrukturMadya/BKIntrukturMadya');
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

    //     redirect('IntrukturMadya/BKIntrukturMadya');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['IntrukturMadya'] = $this->IntrukturMadya->getBukuTamuById($id);
        $data['tujuan'] = $this->IntrukturMadya->getAllTujuan();
        $data['status1'] = ['', 'Diterima', 'Ditolak'];
    
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('IntrukturMadya/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('IntrukturMadya/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->IntrukturMadya->edit($id);
    
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

            redirect(base_url() . "IntrukturMadya/edit/" . $in);


        }
    }
    

}

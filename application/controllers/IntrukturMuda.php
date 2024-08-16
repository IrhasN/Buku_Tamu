<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IntrukturMuda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('IntrukturMuda_model', 'IntrukturMuda');
        is_logged_IntrukturMuda();
        // if ($this->session->userdata('role_id') != 'IntrukturMuda') {
        //     redirect('IntrukturMuda');
        }
    public function index()
    {
        $data['title'] = 'Halaman Intruktur Madya';

        $data['tujuan'] = $this->IntrukturMuda->getAllTujuan();
        $data['total_memuaskan'] = $this->IntrukturMuda->getTotalMemuaskan();
        $data['total_cukup_memuaskan'] = $this->IntrukturMuda->getTotalCukupMemuaskan();
        $data['total_kurang_memuaskan'] = $this->IntrukturMuda->getTotalKurangMemuaskan();
        $data['total_tidak_memuaskan'] = $this->IntrukturMuda->getTotalTidakMemuaskan();

        $data['total_memuaskan'] = $this->IntrukturMuda->getTotalMemuaskan();
        $data['total_cukup_memuaskan'] = $this->IntrukturMuda->getTotalCukupMemuaskan();
        $data['total_kurang_memuaskan'] = $this->IntrukturMuda->getTotalKurangMemuaskan();
        $data['total_tidak_memuaskan'] = $this->IntrukturMuda->getTotalTidakMemuaskan();
       
        $data['total_diskopumker'] = $this->IntrukturMuda->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->IntrukturMuda->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_IntrukturMuda'] = $this->IntrukturMuda->getTotalIntrukturMuda();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->IntrukturMuda->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->IntrukturMuda->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->IntrukturMuda->getTotalIntrukturMuda();
        $data['total_IntrukturMuda'] = $this->IntrukturMuda->getTotalIntrukturMuda();
        $data['total_KepalaSubBagianKeuangan'] = $this->IntrukturMuda->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->IntrukturMuda->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->IntrukturMuda->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->IntrukturMuda->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->IntrukturMuda->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->IntrukturMuda->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->IntrukturMuda->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->IntrukturMuda->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->IntrukturMuda->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('IntrukturMuda/header', $data);
        $this->load->view('IntrukturMuda/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('IntrukturMuda/index', $data);
        $this->load->view('templates/footer');
    }
    public function BKIntrukturMuda()
    {
        $data['title'] = 'Data Tamu';
        $data['IntrukturMuda'] = $this->IntrukturMuda->getAllKategIntrukturMuda();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('IntrukturMuda/header', $data);
        $this->load->view('IntrukturMuda/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('IntrukturMuda/BKIntrukturMuda', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('IntrukturMuda/header', $data);
        $this->load->view('IntrukturMuda/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('IntrukturMuda/profile', $data);
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
            $this->load->view('IntrukturMuda/header', $data);
            $this->load->view('IntrukturMuda/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('IntrukturMuda/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('IntrukturMuda/seting');
            } else {
                $this->IntrukturMuda->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('IntrukturMuda/seting');
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

        redirect('IntrukturMuda/BKIntrukturMuda');
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

    //     redirect('IntrukturMuda/BKIntrukturMuda');
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

    //     redirect('IntrukturMuda/BKIntrukturMuda');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['IntrukturMuda'] = $this->IntrukturMuda->getBukuTamuById($id);
        $data['tujuan'] = $this->IntrukturMuda->getAllTujuan();
        $data['status1'] = ['', 'Diterima', 'Ditolak'];
    
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('IntrukturMuda/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('IntrukturMuda/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->IntrukturMuda->edit($id);
    
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

            redirect(base_url() . "IntrukturMuda/edit/" . $in);


        }
    }
    

}

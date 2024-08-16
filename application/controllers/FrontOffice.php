<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontOffice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Bukutamu_model', 'buku_tamu');
        $this->load->model('FrontOffice_model', 'FrontOffice');
        is_logged_FrontOffice();
    }
    public function index()
    {
        $data['title'] = 'Halaman FrontOffice';
        $data['tujuan'] = $this->FrontOffice->getAllTujuan();

       
        $data['total_diskopumker'] = $this->FrontOffice->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->FrontOffice->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_IntrukturMadya'] = $this->FrontOffice->getTotalIntrukturMadya();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->FrontOffice->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->FrontOffice->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->FrontOffice->getTotalIntrukturMuda();
        $data['total_Sekretaris'] = $this->FrontOffice->getTotalSekretaris();
        $data['total_KepalaSubBagianKeuangan'] = $this->FrontOffice->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->FrontOffice->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->FrontOffice->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->FrontOffice->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->FrontOffice->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->FrontOffice->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->FrontOffice->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->FrontOffice->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->FrontOffice->getTotalKepalaSubBagianTataUsahaUPTBLK();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['FrontOffice'] = $this->FrontOffice->getAllFrontOffice();
        $data['keperluan'] = $this->FrontOffice->getAllkeperluan();
       
        
        $data['tujuan'] = $this->FrontOffice->getAllTujuan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('FrontOffice/index', $data);
        $this->load->view('templates/footer');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Buku Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('FrontOffice/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('FrontOffice/profile', $data);
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
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('FrontOffice/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('FrontOffice/seting');
            } else {
                $this->FrontOffice->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('FrontOffice/seting');
            }
        }
    }
}

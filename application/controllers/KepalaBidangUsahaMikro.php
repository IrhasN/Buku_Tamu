<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepalaBidangUsahaMikro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('KepalaBidangUsahaMikro_model', 'KepalaBidangUsahaMikro');
        $this->load->model('Datakeperluan_model','keperluan');
        is_logged_KepalaBidangUsahaMikro();
        // if ($this->session->userdata('role_id') != 'KepalaBidangUsahaMikro') {
        //     redirect('KepalaBidangUsahaMikro');
        }
    public function index()
    {
        $data['title'] = 'Halaman Intruktur Madya';

        $data['tujuan'] = $this->KepalaBidangUsahaMikro->getAllTujuan();
        $data['instansi'] = $this->KepalaBidangUsahaMikro->getAllInstansi();
        $data['keperluan'] = $this->KepalaBidangUsahaMikro->getAllkeperluan();
      


        $data['total_diskopumker'] = $this->KepalaBidangUsahaMikro->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->KepalaBidangUsahaMikro->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_KepalaBidangUsahaMikro'] = $this->KepalaBidangUsahaMikro->getTotalKepalaBidangUsahaMikro();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->KepalaBidangUsahaMikro->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->KepalaBidangUsahaMikro->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->KepalaBidangUsahaMikro->getTotalIntrukturMuda();
        $data['total_KepalaBidangUsahaMikro'] = $this->KepalaBidangUsahaMikro->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaSubBagianKeuangan'] = $this->KepalaBidangUsahaMikro->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->KepalaBidangUsahaMikro->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->KepalaBidangUsahaMikro->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->KepalaBidangUsahaMikro->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->KepalaBidangUsahaMikro->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->KepalaBidangUsahaMikro->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->KepalaBidangUsahaMikro->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->KepalaBidangUsahaMikro->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->KepalaBidangUsahaMikro->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangUsahaMikro'] = $this->KepalaBidangUsahaMikro->getAllKategKepalaBidangUsahaMikro();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();

        $this->load->view('KepalaBidangUsahaMikro/header', $data);
        $this->load->view('KepalaBidangUsahaMikro/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangUsahaMikro/index', $data);
        $this->load->view('templates/footer');
    }
    public function BKKepalaBidangUsahaMikro()
    {
        $data['title'] = 'Data Tamu';
        $data['KepalaBidangUsahaMikro'] = $this->KepalaBidangUsahaMikro->getAllKategKepalaBidangUsahaMikro();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangUsahaMikro/header', $data);
        $this->load->view('KepalaBidangUsahaMikro/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangUsahaMikro/BKKepalaBidangUsahaMikro', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('KepalaBidangUsahaMikro/header', $data);
        $this->load->view('KepalaBidangUsahaMikro/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('KepalaBidangUsahaMikro/profile', $data);
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
            $this->load->view('KepalaBidangUsahaMikro/header', $data);
            $this->load->view('KepalaBidangUsahaMikro/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangUsahaMikro/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('KepalaBidangUsahaMikro/seting');
            } else {
                $this->KepalaBidangUsahaMikro->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('KepalaBidangUsahaMikro/seting');
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

        redirect('KepalaBidangUsahaMikro/BKKepalaBidangUsahaMikro');
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

    //     redirect('KepalaBidangUsahaMikro/BKKepalaBidangUsahaMikro');
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

    //     redirect('KepalaBidangUsahaMikro/BKKepalaBidangUsahaMikro');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['KepalaBidangUsahaMikro'] = $this->KepalaBidangUsahaMikro->getBukuTamuById($id);
        $data['tujuan'] = $this->KepalaBidangUsahaMikro->getAllTujuan();
        $data['status1'] = [ 'Diterima', 'Ditolak'];
        
        $data['keperluan'] = $this->KepalaBidangUsahaMikro->getAllkeperluan();
        $data['instansi'] = $this->KepalaBidangUsahaMikro->getAllInstansi();
    
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('KepalaBidangUsahaMikro/header', $data);
            $this->load->view('KepalaBidangUsahaMikro/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('KepalaBidangUsahaMikro/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->KepalaBidangUsahaMikro->edit($id);
    
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

            redirect(base_url() . "KepalaBidangUsahaMikro/edit/" . $in);


        }
    }
    

}

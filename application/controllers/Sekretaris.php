<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekretaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Sekretaris_model', 'sekretaris');
        $this->load->model('Datakeperluan_model','keperluan');
       
        is_logged_sekretaris();
        // if ($this->session->userdata('role_id') != 'Sekretaris') {
        //     redirect('sekretaris');
        }
    public function index()
    {
        $data['title'] = 'Halaman sekretaris';

        $data['tujuan'] = $this->sekretaris->getAllTujuan();
        $data['instansi'] = $this->sekretaris->getAllInstansi();
        $data['keperluan'] = $this->sekretaris->getAllkeperluan();
      
       
        $data['total_diskopumker'] = $this->sekretaris->getTotaldiskopumker();
        $data['total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja'] = $this->sekretaris->getTotalKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['total_IntrukturMadya'] = $this->sekretaris->getTotalIntrukturMadya();
        $data['total_MediatorHubunganIndustrialMadya'] = $this->sekretaris->getTotalMediatorHubunganIndustrialMadya();
        $data['total_PengawasKoperasiMadya'] = $this->sekretaris->getTotalPengawasKoperasiMadya();
        $data['total_IntrukturMuda'] = $this->sekretaris->getTotalIntrukturMuda();
        $data['total_Sekretaris'] = $this->sekretaris->getTotalSekretaris();
        $data['total_KepalaSubBagianKeuangan'] = $this->sekretaris->getTotalKepalaSubBagianKeuangan();
        $data['total_KepalaSubBagianPerencaan'] = $this->sekretaris->getTotalKepalaSubBagianPerencaan();
        $data['total_KepalaSubBagianmumdanKepegawaian'] = $this->sekretaris->getTotalKepalaSubBagianmumdanKepegawaian();
        $data['total_KepalaBidangUsahaMikro'] = $this->sekretaris->getTotalKepalaBidangUsahaMikro();
        $data['total_KepalaBidangKoperasi'] = $this->sekretaris->getTotalKepalaBidangKoperasi();
        $data['total_KepalaBidangPembinaanPelatihandanPenempatanKerja'] = $this->sekretaris->getTotalKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'] = $this->sekretaris->getTotalKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['total_KepalaUPTBLK'] = $this->sekretaris->getTotalKepalaUPTBLK();
        $data['total_KepalaSubBagianTataUsahaUPTBLK'] = $this->sekretaris->getTotalKepalaSubBagianTataUsahaUPTBLK();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekretaris'] = $this->sekretaris->getAllKategSekretaris();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();

        $this->load->view('sekretaris/header', $data);
        $this->load->view('sekretaris/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekretaris/index', $data);
        
        $this->load->view('templates/footer');
    }
    public function BKSekretaris()
    {
        $data['title'] = 'Data Tamu';
        $data['sekretaris'] = $this->sekretaris->getAllKategSekretaris();
        $data['keperluan'] = $this->keperluan->getAllkeperluan();
       
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('sekretaris/header', $data);
        $this->load->view('sekretaris/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekretaris/BKSekretaris', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('sekretaris/header', $data);
        $this->load->view('sekretaris/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekretaris/profile', $data);
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
            $this->load->view('sekretaris/header', $data);
            $this->load->view('sekretaris/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekretaris/seting', $data);
            $this->load->view('templates/footer');
        } else {
            $curent_password = $this->input->post('password');
            if (!password_verify($curent_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Curent Password!
                 </div>');
                redirect('sekretaris/seting');
            } else {
                $this->sekretaris->editProfile();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                Profile & Password Update Success
                 </div>');
                redirect('sekretaris/seting');
            }
        }
    }public function proses($id)
    {
        $this->user->proses($id);
        $this->session->set_flashdata('message', '          
            <div class="badge badge-secondar" role="alert">"
            <i class="fas fa-check-circle"></i>
            User Sukses Di Non Aktifkan!..
            </div>               
            ');

        redirect('sekretaris/BKSekretaris');
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

    //     redirect('sekretaris/BKSekretaris');
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

    //     redirect('sekretaris/BKSekretaris');
    // }
    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekretaris'] = $this->sekretaris->getBukuTamuById($id);
        $data['keperluan'] = $this->sekretaris->getAllkeperluan();
        $data['tujuan'] = $this->sekretaris->getAllTujuan();
        $data['instansi'] = $this->sekretaris->getAllInstansi();
        $data['status1'] = [ 'Diterima', 'Ditolak'];
        
        // is_logged_admin();
    
        $this->form_validation->set_rules('catatan1','Catatan','');
        $this->form_validation->set_rules('status1', 'Status','required');
    
        if ($this->form_validation->run() == false) {
            
            $this->load->view('sekretaris/header', $data);
            $this->load->view('sekretaris/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekretaris/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->sekretaris->edit($id);
    
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

            redirect(base_url() . "sekretaris/edit/" . $in);


        }
    }
    

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        is_logged_FrontOffice();
    }

    public function index()
    {
        $data['title'] = 'User Account';
        $data['data_user'] = $this->user->getAllUser();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {

        $data['title'] = 'Tambah Data';
        $data['akses'] = ['FrontOffice','Sekretaris','KepalaBidangUsahaMikro','KepalaBidangKoperasi','KepalaBidangPembinaanPelatihandanPenempatanKerja','KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial',];
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email already registred']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password1]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short!, min 5 character'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user->tambahUser();
            $this->session->set_flashdata('message', '          
                    <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    Data Sukses Ditambahkan!..
                    </div>               
                    ');

            redirect('user');
        }
    }

    public function view($id)
    {
        $data['title'] = 'Data User';
        $data['data_user'] = $this->user->getUserById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit($id)
    {

        $data['title'] = 'Edit Data User';
        $data['data_user'] = $this->user->getUserById($id);
        $data['status'] = ['aktif', 'tidak'];
        $data['akses'] = ['FrontOffice', 'operator','Kepala Dinas','IntrukturMadya','MediatorHubunganIndustrialMadya','PengawasKoperasiMadya','IntrukturMuda','Sekretaris','KepalaSubBagianKeuangan','KepalaSubBagianPerencaan','KepalaSubBagianUmumdanKepegawaian','KepalaBidangUsahaMikro','KepalaBidangKoperasi','KepalaBidangPembinaanPelatihandanPenempatanKerja','KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial','KepalaUPTBLK','KepalaSubBagianTataUsahaUPTBLK'];
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email already registred']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password1]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short!, min 5 character'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user->editUser($id);
            $this->session->set_flashdata('message', '          
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses Diedit!..
            </div>               
            ');

            redirect('user');
        }
    }

    public function non_aktif_user($id)
    {
        $this->user->non_aktif_user($id);
        $this->session->set_flashdata('message', '          
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            User Sukses Di Non Aktifkan!..
            </div>               
            ');

        redirect('user');
    }
    public function aktif_user($id)
    {

        $this->user->aktif_user($id);
        $this->session->set_flashdata('message', '          
        <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle"></i>
        User Sukses Di Aktifkan!..
        </div>               
        ');

        redirect('user');
    }

    public function delete($id)
    {
        $id = [
            'id' => $id
        ];

        $this->user->deleteDataUserById($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Hapus!
            </div>
            ');
        redirect('user');
    }
}

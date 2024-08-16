<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_tamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_tamu_model', 'kateg_tamu');
        is_session();
    }
    
    public function index()
    {
        $data['title'] = 'Data Tamu Dinas Koperasi Usaha Mikro dan Tenaga Kerja';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategdiskopumker();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/index', $data);
        $this->load->view('templates/footer');
    }

    public function KepalaDinasKoperasiUsahaMikrodanTenagaKerja()
    {
        $data['title'] = 'Kepala Dinas Koperasi Usaha Mikro dan Tenaga Kerja';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaDinasKoperasiUsahaMikrodanTenagaKerja();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaDinasKoperasiUsahaMikrodanTenagaKerja', $data);
        $this->load->view('templates/footer');
    }

    public function IntrukturMadya()
    {
        $data['title'] = 'Intruktur Madya';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategIntrukturMadya();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/IntrukturMadya', $data);
        $this->load->view('templates/footer');
    }
    public function MediatorHubunganIndustrialMadya()
    {
        $data['title'] = 'Mediator Hubungan Industrial Madya';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategMediatorHubunganIndustrialMadya();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/MediatorHubunganIndustrialMadya', $data);
        $this->load->view('templates/footer');
    }
    public function PengawasKoperasiMadya()
    {
        $data['title'] = 'Pengawas Koperasi Madya';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategPengawasKoperasiMadya();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/PengawasKoperasiMadya', $data);
        $this->load->view('templates/footer');
    }
    public function IntrukturMuda()
    {
        $data['title'] = 'Intruktur Muda';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategIntrukturMuda();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/IntrukturMuda', $data);
        $this->load->view('templates/footer');
    }
    public function Sekretaris()
    {
        $data['title'] = 'Sekretaris';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategSekretaris();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/Sekretaris', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaSubBagianKeuangan()
    {
        $data['title'] = 'Kepala Sub Bagian Keuangan';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaSubBagianKeuangan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaSubBagianKeuangan', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaSubBagianPerencaan()
    {
        $data['title'] = 'Kepala Sub Bagian Perencaan';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaSubBagianPerencaan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaSubBagianPerencaan', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaSubBagianmumdanKepegawaian()
    {
        $data['title'] = 'Kepala Sub Bagian Umum dan Kepegawaian';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaSubBagianmumdanKepegawaian();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaSubBagianmumdanKepegawaian', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaBidangUsahaMikro()
    {
        $data['title'] = 'Kepala Bidang Usaha Mikro';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaBidangUsahaMikro();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaBidangUsahaMikro', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaBidangKoperasi()
    {
        $data['title'] = 'Kepala Bidang Koperasi';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaBidangKoperasi();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaBidangKoperasi', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaBidangPembinaanPelatihandanPenempatanKerja()
    {
        $data['title'] = 'Kepala Bidang Pembinaan Pelatihan dan Penempatan Kerja';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaBidangPembinaanPelatihandanPenempatanKerja();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaBidangPembinaanPelatihandanPenempatanKerja', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial()
    {
        $data['title'] = 'Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaUPTBLK()
    {
        $data['title'] = 'Kepala UPT BLK';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaUPTBLK();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaUPTBLK', $data);
        $this->load->view('templates/footer');
    }
    public function KepalaSubBagianTataUsahaUPTBLK()
    {
        $data['title'] = 'Kepala Sub Bagian Tata Usaha UPT BLK';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategKepalaSubBagianTataUsahaUPTBLK();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/KepalaSubBagianTataUsahaUPTBLK', $data);
        $this->load->view('templates/footer');
    }
    public function lainnya()
    {
        $data['title'] = 'Lainnya';
        $data['buku_tamu'] = $this->kateg_tamu->getAllKategLainnya();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori_tamu/lainnya', $data);
        $this->load->view('templates/footer');
    }
}

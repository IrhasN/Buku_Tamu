<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Bukutamu_model', 'buku_tamu');
        $this->load->model('Pelayanan_model', 'admin');
        is_session();
    }

    public function index()
    {
        $data['title'] = 'Kepuasan Layanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['total_memuaskan'] = $this->admin->getTotalMemuaskan();
        $data['total_cukup_memuaskan'] = $this->admin->getTotalCukupMemuaskan();
        $data['total_kurang_memuaskan'] = $this->admin->getTotalKurangMemuaskan();
        $data['total_tidak_memuaskan'] = $this->admin->getTotalTidakMemuaskan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelayanan/index', $data);
        $this->load->view('templates/footer');
    }
}

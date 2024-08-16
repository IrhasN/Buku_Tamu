<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_tamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bukutamu_model', 'buku_tamu');
        is_session();
    }

    public function dashboard()
    {
        $data['title'] = 'Data Tamu';
        $data['buku_tamu'] = $this->buku_tamu->getAllBukutamu();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku_tamu/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function index()
    {
        $data['title'] = 'Data Tamu';
        $data['buku_tamu'] = $this->buku_tamu->getAllBukutamu();
        $data['recent_buku_tamu'] = $this->buku_tamu->get_recent_buku_tamu();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo '<pre>'; print_r($data['buku_tamu']); echo '</pre>';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku_tamu/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data';
        $data['instansi'] = $this->buku_tamu->get_instansi();
        $data['keperluan'] = $this->buku_tamu->get_keperluan();
        $data['tujuan'] = $this->buku_tamu->getAllTujuan();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('id_keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('id_tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
    
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku_tamu/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $id_instansi = $this->input->post('id_instansi');
            $new_instansi = $this->input->post('new_instansi');
            if ($id_instansi === 'new' && !empty($new_instansi)) {
                $this->buku_tamu->add_instansi($new_instansi);
                $id_instansi = $this->db->insert_id();
            }
    
            $id_keperluan = $this->input->post('id_keperluan');
            $new_keperluan = $this->input->post('new_keperluan');
            if ($id_keperluan === 'new' && !empty($new_keperluan)) {
                $this->buku_tamu->add_keperluan($new_keperluan);
                $id_keperluan = $this->db->insert_id();
            }
    
            $data = [
                'nama' => $this->input->post('nama'),
                'id_instansi' => $id_instansi,
                'id_keperluan' => $id_keperluan,
                'id_tujuan' => $this->input->post('id_tujuan'),
                'keterangan' => $this->input->post('keterangan'),
                'telp' => $this->input->post('telp'),
                'waktu' => date("Y-m-d H:i:s"),
             
                'id_user' => $this->input->post('user1'),
                'log_user' => $this->input->post('user')
            ];
    
            $this->buku_tamu->tambah($data);
    
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    Data Sukses Ditambahkan!..
                </div>
            ');
            redirect('buku_tamu');
        }
    }
    
    
    public function check_instansi($value) {
        // This function will check if id_instansi is required based on new_instansi
        $new_instansi = $this->input->post('new_instansi');
        if (empty($value) && empty($new_instansi)) {
            $this->form_validation->set_message('check_instansi', 'The Instansi field is required.');
            return false;
        }
        return true;
    }
    public function check_keperluan($value) {
        // This function will check if id_instansi is required based on new_instansi
        $new_keperluan = $this->input->post('new_keperluan');
        if (empty($value) && empty($new_keperluan)) {
            $this->form_validation->set_message('check_keperluan', 'The keperluan field is required.');
            return false;
        }
        return true;
    }
    


    public function edit($id)
    {
        $data['title'] = 'Edit Data Tamu';
        $data['buku_tamu'] = $this->buku_tamu->getBukuTamuById($id);
        $data['instansi'] = $this->buku_tamu->getAllInstansi();
        $data['keperluan'] = $this->buku_tamu->getAllkeperluan();
        $data['tujuan'] = $this->buku_tamu->getAllTujuan();
       

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // is_logged_admin();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('id_keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('id_tujuan', 'Tujuan', 'required');
        // $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        
       


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku_tamu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->buku_tamu->edit($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Edit!
            </div>
            ');

            $in = $this->uri->segment(3);
            if (!is_numeric($in)) {
                redirect();
            } else {
                if ($in == 1) {
                }
            }

            redirect(base_url() . "buku_tamu/edit/" . $in);
        }
    }

    public function view($id)
    {
        $data['title'] = 'Detail Data Tamu';
        $data['buku_tamu'] = $this->buku_tamu->getBukuTamuById($id);
        $data['instansi'] = $this->buku_tamu->getAllInstansi();
        $data['keperluan'] = $this->buku_tamu->getAllkeperluan();
        $data['tujuan'] = $this->buku_tamu->getAllTujuan();
        $data['id_user'] = $this->buku_tamu->getAllUser();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku_tamu/view', $data);
        $this->load->view('templates/footer');
    }
    public function delete($id)
    {

        is_logged_FrontOffice();

        $id = [
            'id' => $id
        ];

        $this->buku_tamu->delete($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            Data Sukses di Hapus!
            </div>
            ');
        redirect('buku_tamu');
    }
}

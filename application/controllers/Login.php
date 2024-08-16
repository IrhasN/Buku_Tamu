<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
    }

    public function index()
    {
        $data['title'] = 'Aplikasi Buku Tamu Digital';

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header_login', $data);
            $this->load->view('login/index');
            $this->load->view('templates/footer_login');
        } else {
            $this->_login();
        }
    }

    private function _login()
{
    $nama = htmlspecialchars($this->input->post('nama', true));
    $password = htmlspecialchars($this->input->post('password', true));

    $user = $this->db->get_where('user', ['nama' => $nama])->row_array();

    // user ada / aktif
    if ($user) {
        $status = 'aktif'; // inisialisasi status dengan benar
        if ($user['is_active'] == $status) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);

                $FrontOffice = 'FrontOffice';
                $operator = 'operator';
                $sekretaris = 'Sekretaris';
                $Kadis = 'KepalaDinasKoperasiUsahaMikrodanTenagaKerja';
                $MediatorHubunganIndustrialMadya = 'MediatorHubunganIndustrialMadya';
                $PengawasKoperasiMadya = 'PengawasKoperasiMadya';
                $IntrukturMuda = 'IntrukturMuda';
                $KepalaSubBagianKeuangan = 'KepalaSubBagianKeuangan';
                $KepalaSubBagianPerencaan = 'KepalaSubBagianPerencaan';
                $KepalaSubBagianmumdanKepegawaian = 'KepalaSubBagianmumdanKepegawaian';
                $KepalaBidangUsahaMikro = 'KepalaBidangUsahaMikro';
                $KepalaBidangKoperasi = 'KepalaBidangKoperasi';
                $KepalaBidangPembinaanPelatihandanPenempatanKerja = 'KepalaBidangPembinaanPelatihandanPenempatanKerja';
                $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial = 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial';
                $KepalaUPTBLK = 'KepalaUPTBLK';
                $KepalaSubBagianTataUsahaUPTBLK = 'KepalaSubBagianTataUsahaUPTBLK';
                $IntrukturMadya = 'IntrukturMadya';

                if ($user['role_id'] == $FrontOffice) {
                    redirect('FrontOffice');
                } elseif ($user['role_id'] == $operator) {
                    redirect('operator');
                } elseif ($user['role_id'] == $sekretaris) {
                    redirect('sekretaris');
                }
                elseif ($user['role_id'] == $IntrukturMadya) {
                    redirect('IntrukturMadya');
                }
                elseif ($user['role_id'] == $Kadis) {
                    redirect('KepalaDinasKoperasiUsahaMikrodanTenagaKerja');
                }
                elseif ($user['role_id'] == $MediatorHubunganIndustrialMadya) {
                    redirect('MediatorHubunganIndustrialMadya');
                }
                elseif ($user['role_id'] == $PengawasKoperasiMadya) {
                    redirect('PengawasKoperasiMadya');
                }
                elseif ($user['role_id'] == $IntrukturMuda) {
                    redirect('IntrukturMuda');
                }
                elseif ($user['role_id'] == $KepalaSubBagianKeuangan) {
                    redirect('KepalaSubBagianKeuangan');
                }
                elseif ($user['role_id'] == $KepalaSubBagianPerencaan) {
                    redirect('KepalaSubBagianPerencaan');
                }
                elseif ($user['role_id'] == $KepalaSubBagianmumdanKepegawaian) {
                    redirect('KepalaSubBagianmumdanKepegawaian');
                }
                elseif ($user['role_id'] == $KepalaBidangUsahaMikro) {
                    redirect('KepalaBidangUsahaMikro');
                }
                elseif ($user['role_id'] == $KepalaBidangKoperasi) {
                    redirect('KepalaBidangKoperasi');
                }
                elseif ($user['role_id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja) {
                    redirect('KepalaBidangPembinaanPelatihandanPenempatanKerja');
                }
                elseif ($user['role_id'] == $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial) {
                    redirect('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial');
                }
                elseif ($user['role_id'] == $KepalaUPTBLK) {
                    redirect('KepalaUPTBLK');
                }
                elseif ($user['role_id'] == $KepalaSubBagianTataUsahaUPTBLK) {
                    redirect('KepalaSubBagianTataUsahaUPTBLK');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                Wrong Password
                 </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            Email Has Not Been Activated
            </div>');
            redirect('login');
        }
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Email Not Registered
        </div>');
        redirect('login');
    }
}

    public function blocked()
    {
        redirect('home/not_found');
    }

   public function logout()
{
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    <i class="fas fa-check-circle"></i>
    You Have Been Logged out
     </div>');
    redirect('login');
}

    public function register()
    {
        $data['title'] =  'Halaman Registrasi';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This Email Arready registred']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password1]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password to short, min 5 character.'
        ]);
        $this->form_validation->set_rules('password1', 'Password 1', 'required');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_login', $data);
            $this->load->view('login/register', $data);
            $this->load->view('templates/footer_login');
        } else {
            $this->login->tambahUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User Akun Berhasil Registrasi, FrontOfiice akan validasi data untuk mengaktifkan user..
            </div>');
            redirect('login');
        }
    }
}

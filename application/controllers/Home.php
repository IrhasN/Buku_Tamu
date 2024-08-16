<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        // Fungsi ini akan meng-handle tampilan halaman beranda (home).
        // Anda dapat menambahkan logika yang diperlukan di sini.

        // Memuat tampilan beranda
        $this->load->view('login/index.php');
    }
}

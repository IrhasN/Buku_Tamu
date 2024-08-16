<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model', 'laporan');
        is_session();
    }

    public function index()
    {
        $data['title'] = 'Laporan Buku Tamu';
        $data['tahun'] = $this->laporan->getTahun();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tujuan'] = $this->db->get('data_tujuan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function pdf()
    {
        $data['title'] = 'Laporan Buku Tamu';
        $this->load->library('dompdf_gen');

        $data['laporan'] = $this->laporan->getAllLaporan();
        $this->load->view('laporan/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_buku_tamu.pdf", array('Attachment' => 0));

        // Note seting dompdf_config.inc.php
        // def("DOMPDF_ENABLE_REMOTE", true); (ganti true untuk menampilkan gambar)
        // function spl_autoload_register($class) (tambah spl auto load register)

    }

    public function eksport_data()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $sheet->setCellValue('A1', "DATA BUKU TAMU"); // Set kolom A1 dengan tulisan "DATA SURAT"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "NO TELP"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "INSTANSI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('E3', "PERIHAL"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F3', "TUJUAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('G3', "TGL DATANG");
        $sheet->setCellValue('H3', "LOG USER");
        


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        


        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $surat = $this->laporan->getAllLaporan();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($surat as $data) { // Lakukan looping pada variabel siswa

            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data['nama']);
            $sheet->setCellValue('C' . $numrow, $data['telp']);
            $sheet->setCellValue('D' . $numrow, $data['instansi']);
            $sheet->setCellValue('E' . $numrow, $data['keperluan']);
            $sheet->setCellValue('F' . $numrow, $data['tujuan']);
            $sheet->setCellValue('G' . $numrow, $data['waktu']);
            $sheet->setCellValue('H' . $numrow, $data['log_user']);
            $


            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
          


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(30); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(50); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(35); // Set width kolom E
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->getColumnDimension('H')->setWidth(25);
        


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $sheet->setTitle("Laporan Buku Tamu");

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Buku Tamu.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function eksport_byBulan()
{
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $tahun = $this->input->post('tahun');
    $bulan = $this->input->post('bulan');
    $namaBulan = [
        '01' => 'JANUARI', '02' => 'FEBRUARI', '03' => 'MARET',
        '04' => 'APRIL', '05' => 'MEI', '06' => 'JUNI',
        '07' => 'JULI', '08' => 'AGUSTUS', '09' => 'SEPTEMBER',
        '10' => 'OKTOBER', '11' => 'NOVEMBER', '12' => 'DESEMBER'
    ];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    // Menambahkan logo dinas
    $drawing = new Drawing();
    $drawing->setName('Logo');
    $drawing->setDescription('Logo Dinas');
    $drawing->setPath('assets/img/background_bukutamu.png'); // Sesuaikan path ke file logo
    $drawing->setHeight(150);
    $drawing->setCoordinates('B1');
    $drawing->setWorksheet($sheet);

    // Menambahkan nama dan alamat dinas
    $sheet->mergeCells('B1:H1');
    $sheet->setCellValue('B1', 'DINAS KOPERASI, USAHA MIKRO DAN TENAGA KERJA');
    $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(40);
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->mergeCells('B2:H2');
    $sheet->setCellValue('B2', 'Jl. Pramuka Komplek Semanda No.3 Telp-Fax (0511) 3250774');
    $sheet->getStyle('B2')->getFont()->setSize(22);
    $sheet->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->mergeCells('B3:H3');
    $sheet->setCellValue('B3', 'BANJARMASIN 70238');
    $sheet->getStyle('B3')->getFont()->setSize(22);
    $sheet->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Menambahkan judul laporan
    $judulLaporan = "LAPORAN BUKU TAMU - " . $namaBulan[$bulan] . " " . $tahun;

    $sheet->setCellValue('A7', $judulLaporan);
    $sheet->mergeCells('A7:H7');
    $sheet->getStyle('A7')->getFont()->setBold(true)->setSize(16);
    $sheet->getStyle('A7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    

    // Menambahkan header tabel
    $sheet->setCellValue('A9', "NO");
    $sheet->setCellValue('B9', "NAMA");
    $sheet->setCellValue('C9', "NO TELP");
    $sheet->setCellValue('D9', "INSTANSI");
    $sheet->setCellValue('E9', "PERIHAL");
    $sheet->setCellValue('F9', "TUJUAN");
    $sheet->setCellValue('G9', "TGL DATANG");
    $sheet->setCellValue('H9', "LOG USER");

    $style_header = [
        'font' => ['bold' => true],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
        ]
    ];
    $sheet->getStyle('A9:H9')->applyFromArray($style_header);

    // Menambahkan data dari database
    $surat = $this->laporan->filterByBulan($tahun, $bulan);

    $no = 1;
    $numrow = 10;
    foreach ($surat as $data) {
        $sheet->setCellValue('A' . $numrow, $no);
        $sheet->setCellValue('B' . $numrow, $data['nama']);
        $sheet->setCellValue('C' . $numrow, $data['telp']);
        $sheet->setCellValue('D' . $numrow, $data['instansi']);
        $sheet->setCellValue('E' . $numrow, $data['keperluan']);
        $sheet->setCellValue('F' . $numrow, $data['tujuan']);
        $sheet->setCellValue('G' . $numrow, $data['waktu']);
        $sheet->setCellValue('H' . $numrow, $data['log_user']);

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];
        $sheet->getStyle('A' . $numrow . ':H' . $numrow)->applyFromArray($style_row);

        $no++;
        $numrow++;
    }

    // Menambahkan footer dengan nama user dan ruang tanda tangan
    $numrow += 2;
// Menggabungkan kolom G dan H
$sheet->mergeCells('G' . $numrow . ':H' . $numrow);
$sheet->mergeCells('G' . ($numrow + 1) . ':H' . ($numrow + 1));
$sheet->mergeCells('G' . ($numrow + 2) . ':H' . ($numrow + 2));
$sheet->mergeCells('G' . ($numrow + 3) . ':H' . ($numrow + 3));
$sheet->mergeCells('G' . ($numrow + 4) . ':H' . ($numrow + 4));
$sheet->mergeCells('G' . ($numrow + 5) . ':H' . ($numrow + 5));
$sheet->mergeCells('G' . ($numrow + 6) . ':H' . ($numrow + 6));

// Daftar nama bulan dalam bahasa Indonesia
$nama_bulan = array(
    1 => "Januari",
    2 => "Februari",
    3 => "Maret",
    4 => "April",
    5 => "Mei",
    6 => "Juni",
    7 => "Juli",
    8 => "Agustus",
    9 => "September",
    10 => "Oktober",
    11 => "November",
    12 => "Desember"
);

// Mengambil indeks bulan dari tanggal saat ini
$bulan_index = date('n'); // 'n' menghasilkan indeks bulan (1 untuk Januari, 2 untuk Februari, dst.)

// Mengatur nilai sel dengan informasi yang diberikan
$tanggal_pembuatan = date('d') . ' ' . $nama_bulan[$bulan_index] . ' ' . date('Y');
$tempat = "Banjarmasin";



// Mengisi nilai sel dengan informasi yang diberikan
$sheet->setCellValue('G' . $numrow, "$tempat, $tanggal_pembuatan");
$sheet->setCellValue('G' . ($numrow + 1), "Yang Membuat Laporan");
$sheet->setCellValue('G' . ($numrow + 6), $user['nama']);



    // Pengaturan lebar kolom
    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(50);
    $sheet->getColumnDimension('E')->setWidth(35);
    $sheet->getColumnDimension('F')->setWidth(25);
    $sheet->getColumnDimension('G')->setWidth(25);
    $sheet->getColumnDimension('H')->setWidth(25);

    // Pengaturan tampilan halaman
    $sheet->getDefaultRowDimension()->setRowHeight(-1);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("Laporan Buku Tamu By_Tanggal");

    // Output file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Buku Tamu By_Tanggal.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
}
public function eksport_byTahun()
{
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $tahun = $this->input->post('tahun');

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Menambahkan logo dinas
    $drawing = new Drawing();
    $drawing->setName('Logo');
    $drawing->setDescription('Logo Dinas');
    $drawing->setPath('assets/img/background_bukutamu.png'); // Sesuaikan path ke file logo
    $drawing->setHeight(150);
    $drawing->setCoordinates('B1');
    $drawing->setWorksheet($sheet);

    // Menambahkan nama dan alamat dinas
    $sheet->mergeCells('B1:H1');
    $sheet->setCellValue('B1', 'DINAS KOPERASI, USAHA MIKRO DAN TENAGA KERJA');
    $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(40);
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->mergeCells('B2:H2');
    $sheet->setCellValue('B2', 'Jl. Pramuka Komplek Semanda No.3 Telp-Fax (0511) 3250774');
    $sheet->getStyle('B2')->getFont()->setSize(22);
    $sheet->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->mergeCells('B3:H3');
    $sheet->setCellValue('B3', 'BANJARMASIN 70238');
    $sheet->getStyle('B3')->getFont()->setSize(22);
    $sheet->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Menambahkan judul laporan
    $judulLaporan = "LAPORAN BUKU TAMU - "."TAHUN $tahun";

    $sheet->setCellValue('A7', $judulLaporan);
    $sheet->mergeCells('A7:H7');
    $sheet->getStyle('A7')->getFont()->setBold(true)->setSize(16);
    $sheet->getStyle('A7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    

    // Menambahkan header tabel
    $sheet->setCellValue('A9', "NO");
    $sheet->setCellValue('B9', "NAMA");
    $sheet->setCellValue('C9', "NO TELP");
    $sheet->setCellValue('D9', "INSTANSI");
    $sheet->setCellValue('E9', "PERIHAL");
    $sheet->setCellValue('F9', "TUJUAN");
    $sheet->setCellValue('G9', "TGL DATANG");
    $sheet->setCellValue('H9', "LOG USER");

    $style_header = [
        'font' => ['bold' => true],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
        ]
    ];
    $sheet->getStyle('A9:H9')->applyFromArray($style_header);

    // Menambahkan data dari database
    $surat = $this->laporan->filterByTahun($tahun);

    $no = 1;
    $numrow = 10;
    foreach ($surat as $data) {
        $sheet->setCellValue('A' . $numrow, $no);
        $sheet->setCellValue('B' . $numrow, $data['nama']);
        $sheet->setCellValue('C' . $numrow, $data['telp']);
        $sheet->setCellValue('D' . $numrow, $data['instansi']);
        $sheet->setCellValue('E' . $numrow, $data['keperluan']);
        $sheet->setCellValue('F' . $numrow, $data['tujuan']);
        $sheet->setCellValue('G' . $numrow, $data['waktu']);
        $sheet->setCellValue('H' . $numrow, $data['log_user']);

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];
        $sheet->getStyle('A' . $numrow . ':H' . $numrow)->applyFromArray($style_row);

        $no++;
        $numrow++;
    }

    // Menambahkan footer dengan nama user dan ruang tanda tangan
    $numrow += 2;
// Menggabungkan kolom G dan H
$sheet->mergeCells('G' . $numrow . ':H' . $numrow);
$sheet->mergeCells('G' . ($numrow + 1) . ':H' . ($numrow + 1));
$sheet->mergeCells('G' . ($numrow + 2) . ':H' . ($numrow + 2));
$sheet->mergeCells('G' . ($numrow + 3) . ':H' . ($numrow + 3));
$sheet->mergeCells('G' . ($numrow + 4) . ':H' . ($numrow + 4));
$sheet->mergeCells('G' . ($numrow + 5) . ':H' . ($numrow + 5));
$sheet->mergeCells('G' . ($numrow + 6) . ':H' . ($numrow + 6));

// Daftar nama bulan dalam bahasa Indonesia
$nama_bulan = array(
    1 => "Januari",
    2 => "Februari",
    3 => "Maret",
    4 => "April",
    5 => "Mei",
    6 => "Juni",
    7 => "Juli",
    8 => "Agustus",
    9 => "September",
    10 => "Oktober",
    11 => "November",
    12 => "Desember"
);

// Mengambil indeks bulan dari tanggal saat ini
$bulan_index = date('n'); // 'n' menghasilkan indeks bulan (1 untuk Januari, 2 untuk Februari, dst.)

// Mengatur nilai sel dengan informasi yang diberikan
$tanggal_pembuatan = date('d') . ' ' . $nama_bulan[$bulan_index] . ' ' . date('Y');
$tempat = "Banjarmasin";
// $user_name = "nama"; // Ganti dengan variabel yang berisi nama user

// Mengisi nilai sel dengan informasi yang diberikan
$sheet->setCellValue('G' . $numrow, "$tempat, $tanggal_pembuatan");
$sheet->setCellValue('G' . ($numrow + 1), "Yang Membuat Laporan");
$sheet->setCellValue('G' . ($numrow + 6), $user['nama']);



    // Pengaturan lebar kolom
    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(50);
    $sheet->getColumnDimension('E')->setWidth(35);
    $sheet->getColumnDimension('F')->setWidth(25);
    $sheet->getColumnDimension('G')->setWidth(25);
    $sheet->getColumnDimension('H')->setWidth(25);

    // Pengaturan tampilan halaman
    $sheet->getDefaultRowDimension()->setRowHeight(-1);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("Laporan Buku Tamu By_Tanggal");

    // Output file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Buku Tamu By_Tanggal.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
}
public function eksport_byTujuan()
{
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $tujuan_id = $this->input->post('tujuan');

    // Ambil data tujuan dari model
    $tujuan = $this->laporan->getTujuanById($tujuan_id);

    
    $namaBulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Menambahkan logo dinas
    $drawing = new Drawing();
    $drawing->setName('Logo');
    $drawing->setDescription('Logo Dinas');
    $drawing->setPath('assets/img/background_bukutamu.png');
    $drawing->setHeight(150);
    $drawing->setCoordinates('B1');
    $drawing->setWorksheet($sheet);

    // Menambahkan nama dan alamat dinas
    $sheet->mergeCells('B1:H1');
    $sheet->setCellValue('B1', 'DINAS KOPERASI, USAHA MIKRO DAN TENAGA KERJA');
    $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(40);
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->mergeCells('B2:H2');
    $sheet->setCellValue('B2', 'Jl. Pramuka Komplek Semanda No.3 Telp-Fax (0511) 3250774');
    $sheet->getStyle('B2')->getFont()->setSize(22);
    $sheet->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->mergeCells('B3:H3');
    $sheet->setCellValue('B3', 'BANJARMASIN 70238');
    $sheet->getStyle('B3')->getFont()->setSize(22);
    $sheet->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Menambahkan judul laporan
    $judulLaporan = "LAPORAN BUKU TAMU - BIDANG: " . strtoupper($tujuan['tujuan']);

    $sheet->setCellValue('A7', $judulLaporan);
    $sheet->mergeCells('A7:H7');
    $sheet->getStyle('A7')->getFont()->setBold(true)->setSize(16);
    $sheet->getStyle('A7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // Menambahkan header tabel
    $sheet->setCellValue('A9', "NO");
    $sheet->setCellValue('B9', "NAMA");
    $sheet->setCellValue('C9', "NO TELP");
    $sheet->setCellValue('D9', "INSTANSI");
    $sheet->setCellValue('E9', "PERIHAL");
    $sheet->setCellValue('F9', "TUJUAN");
    $sheet->setCellValue('G9', "TGL DATANG");
    $sheet->setCellValue('H9', "LOG USER");

    $style_header = [
        'font' => ['bold' => true],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
        ]
    ];
    $sheet->getStyle('A9:H9')->applyFromArray($style_header);

    // Menambahkan data dari database berdasarkan tujuan
    $surat = $this->laporan->filterByTujuan($tujuan_id);

    $no = 1;
    $numrow = 10;
    foreach ($surat as $data) {
        $sheet->setCellValue('A' . $numrow, $no);
        $sheet->setCellValue('B' . $numrow, $data['nama']);
        $sheet->setCellValue('C' . $numrow, $data['telp']);
        $sheet->setCellValue('D' . $numrow, $data['instansi']);
        $sheet->setCellValue('E' . $numrow, $data['keperluan']);
        $sheet->setCellValue('F' . $numrow, $data['tujuan']);
        $sheet->setCellValue('G' . $numrow, $data['waktu']);
        $sheet->setCellValue('H' . $numrow, $data['log_user']);

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
            ]
        ];
        $sheet->getStyle('A' . $numrow . ':H' . $numrow)->applyFromArray($style_row);

        $no++;
        $numrow++;
    }

    // Menambahkan footer dengan nama user dan ruang tanda tangan
    $numrow += 2;

    // Mengisi nilai sel dengan informasi yang diberikan
    $tanggal_pembuatan = date('d') . ' ' . $namaBulan[date('m')] . ' ' . date('Y');
    $tempat = "Banjarmasin";

    $sheet->mergeCells('G' . $numrow . ':H' . $numrow);
    $sheet->setCellValue('G' . $numrow, "$tempat, $tanggal_pembuatan");
    $sheet->mergeCells('G' . ($numrow + 1) . ':H' . ($numrow + 1));
    $sheet->setCellValue('G' . ($numrow + 1), "Yang Membuat Laporan");
    $sheet->mergeCells('G' . ($numrow + 6) . ':H' . ($numrow + 6));
    $sheet->setCellValue('G' . ($numrow + 6), $user['nama']);

    // Pengaturan lebar kolom
    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(50);
    $sheet->getColumnDimension('E')->setWidth(35);
    $sheet->getColumnDimension('F')->setWidth(25);
    $sheet->getColumnDimension('G')->setWidth(25);
    $sheet->getColumnDimension('H')->setWidth(25);

    // Pengaturan tampilan halaman
    $sheet->getDefaultRowDimension()->setRowHeight(-1);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("Laporan Buku Tamu By_Tujuan");

    // Output file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Buku Tamu By_Tujuan.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
}
public function filterByTujuan()
{
    // Ambil data tujuan dari database
    $data['tujuan'] = $this->db->get('data_tujuan')->result_array();

    // Load view dengan data tujuan
    $this->load->view('laporan/index', $data);
}


    
    // public function excel()
    // {
    //     $data['title'] = 'Laporan Buku Tamu';
    //     $data['buku_tamu'] = $this->laporan->getAllLaporan();

    //     require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
    //     require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    //     $object = new PHPExcel();
    //     $object->getProperties()->setCreator("Kanwil Kemenag Sulut");
    //     $object->getProperties()->setLastModifiedBy("Kanwil Kemenag Sulut");
    //     $object->getProperties()->setTitle("Laporan Buku Tamu");

    //     $object->setActiveSheetIndex(0);
    //     $object->getActiveSheet()->setCellValue('A1', 'NO');
    //     $object->getActiveSheet()->setCellValue('B1', 'NAMA');
    //     $object->getActiveSheet()->setCellValue('C1', 'INSTANSI/ORGANISASI/MASYARAKAT');
    //     $object->getActiveSheet()->setCellValue('D1', 'TUJUAN');
    //     $object->getActiveSheet()->setCellValue('E1', 'KEPERLUAN');
    //     $object->getActiveSheet()->setCellValue('F1', 'TANGGAL');
    //     $object->getActiveSheet()->setCellValue('G1', 'PELAYANAN');
    //     $object->getActiveSheet()->setCellValue('H1', 'PELAYANAN');
    //     $baris = 2;
    //     $no = 1;

    //     foreach ($data['buku_tamu'] as $btm) {

    //         $date = date_create($btm['waktu']);
    //         $waktu =  date_format($date, "d/m/Y - H:i:s");

    //         $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
    //         $object->getActiveSheet()->setCellValue('B' . $baris, $btm['nama']);
    //         $object->getActiveSheet()->setCellValue('C' . $baris, $btm['satker']);
    //         $object->getActiveSheet()->setCellValue('D' . $baris, $btm['tujuan']);
    //         $object->getActiveSheet()->setCellValue('E' . $baris, $btm['keperluan']);
    //         $object->getActiveSheet()->setCellValue('F' . $baris, $waktu);
    //         $object->getActiveSheet()->setCellValue('G' . $baris, $btm['pelayanan']);
    //         $object->getActiveSheet()->setCellValue('G' . $baris, $btm['log_user']);

    //         $baris++;
    //     }

    //     $filename = "Data_Laporan" . '.xlsx';
    //     $object->getActiveSheet()->setTitle("Data Buku Tamu");
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="' . $filename . '"');
    //     header('Cache-Control: max-age=0');

    //     $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    //     // ob_end_clean();
    //     $writer->save('php://output');
    //     exit;
    // }



    // public function filter()
    // {
    //     $tanggal_awal = $this->input->post('tanggal_awal');
    //     $tanggal_akhir = $this->input->post('tanggal_akhir');
    //     $tahun1 = $this->input->post('tahun1');
    //     $bulan_awal = $this->input->post('bulan_awal');
    //     $bulan_akhir = $this->input->post('bulan_akhir');
    //     $tahun2 = $this->input->post('tahun2');
    //     $nilai_filter = $this->input->post('nilai_filter');


    //     if ($nilai_filter == 1) {
    //         $data['title'] = 'Filter Berdasar Tanggal ';
    //         $data['subtitle'] = ' Tanggal : ' . $tanggal_awal . ' Sampai Tanggal ' . $tanggal_akhir;
    //         $data['datafilter'] =  $this->laporan->filterByTanggal($tanggal_awal, $tanggal_akhir);
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //         $this->load->view('templates/header_laporan', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('laporan/eksport_data', $data);
    //         $this->load->view('templates/footer_laporan');
    //     } elseif ($nilai_filter == 2) {
    //         $data['title'] = 'Filter Berdasar Bulanan';
    //         $data['subtitle'] = 'Laporan Bulanan ';
    //         $data['datafilter'] =  $this->laporan->filterByBulan($tahun1, $bulan_awal, $bulan_akhir);
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //         $this->load->view('templates/header_laporan', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         // $this->load->view('admin/print_laporan', $data);
    //         $this->load->view('laporan/eksport_data', $data);
    //         $this->load->view('templates/footer_laporan');
    //     } elseif ($nilai_filter == 3) {
    //         $data['title'] = 'Filter Berdasar Tahun';
    //         $data['subtitle'] = 'Laporan Tahun : ' . $tahun2;
    //         $data['datafilter'] =  $this->laporan->filterByTahun($tahun2);
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //         $this->load->view('templates/header_laporan', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('laporan/eksport_data', $data);
    //         $this->load->view('templates/footer_laporan');
    //     }
    // }


}

<?php

class Laporan_model extends CI_Model
{
    public function getAllLaporan()
    {

        // Join Table
        $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`,`data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
        FROM `buku_tamu`
        JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
        JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
        JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
        ORDER BY `buku_tamu`.`id` DESC";
        return $this->db->query($query)->result_array();
    }

    // Filter Laporan Tahun, Tanggal, Bulan.
    public function getTahun()
    {
        $query = "SELECT YEAR(waktu) AS waktu FROM buku_tamu GROUP BY YEAR(waktu) ORDER BY YEAR (waktu)";

        return $this->db->query($query)->result_array();
    }

    public function filterByTanggal($tanggal_awal, $tanggal_akhir)
    {
        $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`,`data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
        FROM `buku_tamu`
        JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
        JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
        JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
        
         where CAST(waktu AS DATE)  BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY waktu";


        return $this->db->query($query)->result_array();
    }

    public function filterByBulan($tahun, $bulan)
    {
        $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`,`data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
        FROM `buku_tamu`
        JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
        JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
        JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
         where YEAR (waktu) ='$tahun' and MONTH(waktu) 
         AND '$bulan'  ORDER BY waktu ";

        return $this->db->query($query)->result_array();
    }

    public function filterByTahun($tahun)
    {
        $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`,`data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
        FROM `buku_tamu`
        JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
        JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
        JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
         where YEAR (waktu) = $tahun ORDER BY waktu";

        return $this->db->query($query)->result_array();
    }
    public function filterByTujuan($tujuan)
{
    $query = "SELECT `buku_tamu`.*, `data_instansi`.`instansi`, `data_keperluan`.`keperluan`, `data_tujuan`.`tujuan`
              FROM `buku_tamu`
              JOIN `data_instansi` ON `buku_tamu`.`id_instansi` = `data_instansi`.`id`
              JOIN `data_keperluan` ON `buku_tamu`.`id_keperluan` = `data_keperluan`.`id`
              JOIN `data_tujuan` ON `buku_tamu`.`id_tujuan` = `data_tujuan`.`id`
              WHERE `buku_tamu`.`id_tujuan` = '$tujuan'
              ORDER BY `waktu`";

    return $this->db->query($query)->result_array();
}
public function getTujuanById($tujuan_id)
{
    $this->db->where('id', $tujuan_id);
    $query = $this->db->get('data_tujuan');
    return $query->row_array(); // Mengembalikan data baris sebagai array
}


}

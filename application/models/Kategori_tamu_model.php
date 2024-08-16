<?php

class Kategori_tamu_model extends CI_Model
{
    public function getAllKategdiskopumker()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 1 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaDinasKoperasiUsahaMikrodanTenagaKerja()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 2 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategIntrukturMadya()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 3 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategMediatorHubunganIndustrialMadya()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 4 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategPengawasKoperasiMadya()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 5 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategIntrukturMuda()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 6 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategSekretaris()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 7 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaSubBagianKeuangan()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 8 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaSubBagianPerencaan()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 9 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaSubBagianmumdanKepegawaian()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 12 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaBidangUsahaMikro()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 16 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaBidangKoperasi()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 17 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaBidangPembinaanPelatihandanPenempatanKerja()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 18 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaBidangKoperasiHubunganIndustrialdanJaminanSosial()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 19 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaUPTBLK()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 20 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategKepalaSubBagianTataUsahaUPTBLK()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 21 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
    public function getAllKategLainnya()
    {
        $query = " SELECT `buku_tamu`.*, `data_tujuan`. `tujuan` FROM `buku_tamu` JOIN `data_tujuan` ON `buku_tamu`. `id_tujuan` = `data_tujuan`.`id` where buku_tamu.id_tujuan = 22 order by id desc
        ";

        return $this->db->query($query)->result_array();
    }
}

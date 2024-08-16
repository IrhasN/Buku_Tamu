   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><i class="fas  fa-book"></i> <?= $title; ?></h1>

       <div class="row mt-1  text-center">
           <div class="col-md-12">
               <?= form_error('image', '<div class="error">', '</div>'); ?>
               <?= $this->session->flashdata('message'); ?>
           </div>
       </div>


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> <?= $title; ?></h6>
           </div>

           <div class="dropdown mt-3 ml-4">
               <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                   Kategori Tujuan:
               </a>

               <div class="dropdown-menu ">
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu'); ?>">diskopumker</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaDinasKoperasiUsahaMikrodanTenagaKerja'); ?>">Kepala Dinas Koperasi Usaha Mikro dan Tenaga Kerja</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/IntrukturMadya'); ?>">Intruktur Madya</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/MediatorHubunganIndustrialMadya'); ?>">Mediator Hubungan Industrial Madya</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/PengawasKoperasiMadya'); ?>">Pengawas Koperasi Madya</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/IntrukturMuda'); ?>">Intruktur Muda</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/Sekretaris'); ?>">Sekretaris</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaSubBagianKeuangan'); ?>">Kepala Sub Bagian Keuangan</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaSubBagianPerencaan'); ?>">Kepala Sub Bagian Perencaan</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaSubBagianmumdanKepegawaian'); ?>">Kepala Sub Bagian Umum dan Kepegawaian</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaBidangUsahaMikro'); ?>">Kepala Bidang Usaha Mikro</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaBidangKoperasi'); ?>">Kepala Bidang Koperasi</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaBidangPembinaanPelatihandanPenempatanKerja'); ?>">Kepala Bidang Pembinaan Pelatihan dan Penempatan Kerja</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'); ?>">Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaUPTBLK'); ?>">Kepala UPT BLK</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/KepalaSubBagianTataUsahaUPTBLK'); ?>">Kepala Sub Bagian Tata Usaha UPT BLK</a>
                   <a class="dropdown-item" href="<?= base_url('kategori_tamu/lainnya'); ?>">Lainnya</a>
               </div>
           </div>

           <div class="card-body">




               <div class="table-responsive table-hover">
                   <table class="table table-bordered" id="bukuTamu" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>Nama</th>
                               <th>Keperluan</th>
                               <th>Pelayanan</th>
                               <th>Tanggal Tiba</th>
                               <th>View</th>
                           </tr>
                       </thead>


                       <tbody>
                           <?php $admin = 'admin';
                            $operator = 'operator'; ?>

                           <?php foreach ($buku_tamu as $bk) : ?>
                               <tr>
                                   <td> <?= $bk['nama']; ?> </td>
                                   <td><?= $bk['keperluan']; ?></td>
                                   <td><span class="badge badge-secondary"> <?= $bk['pelayanan']; ?></span></td>
                                   <td>
                                       <?php
                                        $date = date_create($bk['waktu']);
                                        echo date_format($date, "d/m/Y - H:i:s");
                                        ?>
                                   </td>

                                   <td><a href="<?= base_url('buku_tamu/view/'); ?><?= $bk['id']; ?>">
                                           <span class="badge badge-primary"><i class="fas fa-eye"></i> View</span>
                                       </a></td>
                               </tr>
                           <?php endforeach; ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>

   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->
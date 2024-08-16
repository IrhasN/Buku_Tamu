       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-tachometer-alt"></i> Dashboard Buku Tamu Digital </h1>



           <!-- Pie Grafik Bar Tujuan Tamu-->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-pie"></i> Grafik Tujuan Tamu</h6>
               </div>
               <div class="card-body">

            

<div class="table-responsive table-hover">
<table class="table table-bordered" id="bukuTamu" width="100%" cellspacing="0">
<thead>
 <tr>
     <th>Nama</th>
     <th>Keperluan</th>
     <th>keterangan</th>
     <th>Tanggal Tiba</th>
     <th>Konfirmasi</th>
     <th>Status</th>
 </tr>
</thead>

<tbody>
 <?php foreach ($KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial as $bk) : ?>
     <?php
     // Convert the database timestamp to DateTime object
     $waktu_tiba = new DateTime($bk['waktu']);
     // Get the current date and time
     $now = new DateTime();
     // Calculate the difference in days
     $interval = $now->diff($waktu_tiba);
     // Check if the difference is more than one day
     $is_more_than_one_day = $interval->days > 7;
     ?>

     <?php if (!$is_more_than_one_day && empty($bk['status1'])) : ?>
         <tr>
             <td><?= $bk['nama']; ?></td>
             <td><span class="badge badge-secondary">
                 <?php foreach ($keperluan as $kp) : ?>
                    <?php if ($kp['id'] == $bk['id_keperluan']) : ?>
                         <?= $kp['keperluan']; ?>
                         <?php break; // Stop loop once the correct keperluan is found ?>
                     <?php endif; ?>
                 <?php endforeach; ?>
             </td>

             <td><?= $bk['keterangan']; ?></span></td>
             <td>
                 <?= $waktu_tiba->format("d/m/Y - H:i:s"); ?>
             </td>
             <td>
                 <a href="<?= base_url('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/edit/') . $bk['id']; ?>">
                     <span class="badge badge-primary"> Konfirmasi</span>
                 </a>
             </td>
             <td>
                 <span class="badge badge-secondary">Belum Di Konfirmasi</span>
             </td>
         </tr>
     <?php endif; ?>
 <?php endforeach; ?>
</tbody>
</table>
</div>


</div>
           </div>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Tujuan Tamu</h6>
               </div>
               <div class="card-body">

                   <ul class="list-group">
                   <?php foreach ($tujuan as $row) : ?>
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                               <?= $row['tujuan']; ?>
                               <?php if ($row['id'] == 2) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja; ?></span>
                               <?php elseif ($row['id'] == 3) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangKoperasi; ?></span>
                               <?php elseif ($row['id'] == 4) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_MediatorHubunganIndustrialMadya; ?></span>
                               <?php elseif ($row['id'] == 5) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_PengawasKoperasiMadya; ?></span>
                               <?php elseif ($row['id'] == 6) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_IntrukturMuda; ?></span>
                               <?php elseif ($row['id'] == 7) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangKoperasi; ?></span>
                               <?php elseif ($row['id'] == 8) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianKeuangan; ?></span>
                               <?php elseif ($row['id'] == 9) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianPerencaan; ?></span>
                               <?php elseif ($row['id'] == 12) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianmumdanKepegawaian; ?></span>
                               <?php elseif ($row['id'] == 16) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangUsahaMikro; ?></span>
                               <?php elseif ($row['id'] == 17) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangKoperasi; ?></span>
                               <?php elseif ($row['id'] == 18) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangPembinaanPelatihandanPenempatanKerja; ?></span>
                               <?php elseif ($row['id'] == 19) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial; ?></span>
                               <?php elseif ($row['id'] == 20) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaUPTBLK; ?></span>
                               <?php elseif ($row['id'] == 21) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianTataUsahaUPTBLK; ?></span>
                               <?php endif; ?>
                           </li>
                       <?php endforeach; ?>
                   </ul>

               </div>
           </div>



           <!-- 
           <img src="<?= base_url('assets/img/image_home_edit.jpg') ?>" class="rounded mx-auto d-block" alt="Buku Tamu Kemenag Sulut">


           <div class="row mt-3 mb-2">
               <div class="my-2"></div>
               <a href="<?= base_url('buku_tamu/tambah'); ?>" class="btn btn-primary btn-icon-split btn-lg mx-auto">
                   <span class="icon text-white-50">
                       <i class="fas fa-plus-square"></i>
                   </span>
                   <span class="text">Tambah Data Tamu</span>
               </a>
           </div> -->




       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
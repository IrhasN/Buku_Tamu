       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-info-circle"></i> <?= $title; ?> Buku Tamu</h1>

           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> <?= $title; ?> Buku Tamu Digital</h6>
               </div>

               <div class="col-lg-9 mt-3">
                   <a href="<?= base_url('admin/excel'); ?>" class="btn btn-success btn-icon-split">
                       <span class="icon text-white-50">
                           <i class="fas fa-file-excel"></i>
                       </span>
                       <span class="text">Export Excel</span>
                   </a>

                   <a href="<?= base_url('admin/pdf'); ?>" class="btn btn-danger btn-icon-split" target="blank">
                       <span class="icon text-white-50">
                           <i class="fas fa-file-pdf"></i>
                       </span>
                       <span class="text">Eksport PDF</span>
                   </a>
               </div>


               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered table-hover" id="dataLaporan" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>Nama</th>
                                   <th>Tujuan</th>
                                   <th>Keperluan</th>
                                   <th>Tanggal</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php foreach ($laporan as $lp) : ?>
                                   <tr>
                                       <td><?= $lp['nama']; ?></td>
                                       <td><?= $lp['tujuan']; ?></td>
                                       <td><?= $lp['keperluan']; ?></td>
                                       <td>
                                           <?php
                                            $date = date_create($lp['waktu']);
                                            echo date_format($date, "d/m/Y - H:i:s");
                                            ?>
                                       </td>
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
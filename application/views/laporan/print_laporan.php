       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-info-circle"></i> <?= $title; ?></h1>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> <?= $subtitle; ?></h6>
               </div>


               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered table-hover" id="dataPrint" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>Nama</th>
                                   <th>Tujuan</th>
                                   <th>Keperluan</th>
                                   <th>Tanggal</th>
                               </tr>
                           </thead>
                           <tbody>

                               <?php foreach ($datafilter as $df) : ?>
                                   <tr>
                                       <td><?= $df['nama']; ?></td>
                                       <td><?= $df['tujuan']; ?></td>
                                       <td><?= $df['keperluan']; ?></td>
                                       <td>
                                           <?php
                                            $date = date_create($df['waktu']);
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
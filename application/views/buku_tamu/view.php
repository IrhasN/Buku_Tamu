       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card"></i> <?= $title; ?></h1>

           <div class="col-lg-10">

               <div class="card mb-4 py-3 border-left-primary">
                   <div class="card-body">

                       <table class="table table-bordered table-hover" id="bukuTamu" width="100%" cellspacing="0">

                           <tbody>
                               <tr>
                                   <td>Nama : </td>
                                   <td><?= $buku_tamu['nama']; ?> </td>
                               </tr>

                               <tr>
                                   <td>Instansi : </td>
                                   <td>
                                   <?php foreach ($instansi as $in) : ?>
                                           <?php if ($in['id'] == $buku_tamu['id_instansi']) : ?>
                                               <label value="<?= $in['id']; ?>"><?= $in['instansi']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>

                                </td>
                               </tr>
                               <tr>
                                   <td>Tujuan : </td>
                                   <td>

                                       <?php foreach ($tujuan as $tj) : ?>
                                           <?php if ($tj['id'] == $buku_tamu['id_tujuan']) : ?>
                                               <label value="<?= $tj['id']; ?>"><?= $tj['tujuan']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>Keperluan : </td>
                                   <td>
                                   <?php foreach ($keperluan as $kp) : ?>
                                           <?php if ($kp['id'] == $buku_tamu['id_keperluan']) : ?>
                                               <label value="<?= $kp['id']; ?>"><?= $kp['keperluan']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                               </tr>
                               <tr>
                                   <td>Telp : </td>
                                   <td><?= $buku_tamu['telp']; ?> </td>
                               </tr>
                               <tr>
                                   <td>Tanggal Tiba : </td>
                                   <td><?= $buku_tamu['waktu']; ?> Wita.</td>
                               </tr>
                               <tr>
                                   <td>Keterangan : </td>
                                   <td><?= $buku_tamu['keterangan']; ?></td>
                               </tr>
                               <tr>
                                   <td>Diisi Oleh : </td>
                                   <td>
                                   <?php foreach ($id_user as $usi) : ?>
                                           <?php if ($usi['id'] == $buku_tamu['id_user']) : ?>
                                               <label value="<?= $usi['id']; ?>"><?= $usi['nama']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                               </tr>
                           </tbody>
                       </table>

                   </div>
               </div>

           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
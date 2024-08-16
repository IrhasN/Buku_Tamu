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
                                   <td><?= $daftar_tamu['nama']; ?> </td>
                               </tr>

                               <tr>
                                   <td>Instansi/Organisasi/Masyarakat : </td>
                                   <td><?= $daftar_tamu['satker']; ?> </td>
                               </tr>
                               <tr>
                                   <td>Tujuan : </td>
                                   <td>

                                       <?php foreach ($tujuan as $tj) : ?>
                                           <?php if ($tj['id'] == $daftar_tamu['id_tujuan']) : ?>
                                               <label value="<?= $tj['id']; ?>"><?= $tj['tujuan']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>Keperluan : </td>
                                   <td><?= $daftar_tamu['keperluan']; ?> </td>
                               </tr>
                               <tr>
                                   <td>Telp : </td>
                                   <td><?= $daftar_tamu['telp']; ?> </td>
                               </tr>
                               <tr>
                                   <td>Tanggal Tiba : </td>
                                   <td><?= $daftar_tamu['waktu']; ?> Wita.</td>
                               </tr>
                               
                               
                           </tbody>
                           
                       </table>
                       
                       <div class="form-group">
                           <label for="pelayanan">Pilih Tingkat Kepuasan Pelayanan</label>
                           <select name="pelayanan" class="custom-select">
                                    <option value="" selected>Select</option>
                                    <option value="sangat_puas">Sangat Puas</option>
                                    <option value="puas">Puas</option>
                                    <option value="cukup_puas">Cukup Puas</option>
                                    <option value="tidak_puas">Tidak Puas</option>
                           </select>
                           </div>
                           
                           <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check-circle"></i> Update </button>
                       
                   </div>
                   
               </div>

           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
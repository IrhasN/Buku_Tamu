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
                                <td><input type="text" class="form-control" name="nama" value="<?= $daftar_tamu['nama']; ?>" readonly></td>
                            </tr>

                            <tr>
                                <td>Instansi/Organisasi/Masyarakat : </td>
                                <td><input type="text" class="form-control" name="satker" value="<?= $daftar_tamu['satker']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Tujuan : </td>
                                <td>
                                    <?php foreach ($tujuan as $tj) : ?>
                                        <?php if ($tj['id'] == $daftar_tamu['id_tujuan']) : ?>
                                            <input type="text" class="form-control" name="tujuan" value="<?= $tj['tujuan']; ?>" readonly>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Keperluan : </td>
                                <td><input type="text" class="form-control" name="keperluan" value="<?= $daftar_tamu['keperluan']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Telp : </td>
                                <td><input type="text" class="form-control" name="telp" value="<?= $daftar_tamu['telp']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Tanggal Tiba : </td>
                                <td><input type="text" class="form-control" name="waktu" value="<?= $daftar_tamu['waktu']; ?> Wita." readonly></td>
                            </tr>
                            <td rowspan="2">Catatan  :</td>
                            <td>
                               <input type="text" class="form-control" name="catatan1" value="<?= $daftar_tamu['catatan1']; ?>" readonly>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="catatan2" value="<?= $daftar_tamu['catatan2']; ?>" readonly>
                                </td>
                            </tr>

                            
                            <tr>
                        </tbody>

                           
                       </table>
                       <div class="form-group">
                           <label for="layanan">Kepuasan Pelayanan</label>
                           <input type="text" readonly class="form-control" name="layanan" id="layanan" value="<?= $daftar_tamu['pelayanan']; ?>">

                       </div>

                       <form action="<?= base_url('daftar_tamu/edit/' . $daftar_tamu['id']); ?>" method="post">
                       <div class="form-group">
                         <label for="pelayanan">Pilih Tingkat Kepuasan Pelayanan</label>
                         <select name="pelayanan" class="custom-select">
                             <option value="" selected>Select</option>
                             <?php foreach ($layanan as $ly) : ?>
                                  <option value="<?= $ly; ?>"><?= $ly; ?></option>
                              <?php endforeach; ?>
                          </select>
                           <?= form_error('pelayanan', '<small class="text-danger ">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                           <button type="submit" class="btn btn-primary" name="submit">
                                <i class="fas fa-check-circle"></i> Update
                            </button>
                        </div>
                       </form>
                   
               </div>

           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
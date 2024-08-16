       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-book"></i> <?= $title; ?></h1>

           <div class="row mt-1  text-center">
               <div class="col-md-12">
                   <?= form_error('image', '<div class="error">', '</div>'); ?>
                   <?= $this->session->flashdata('message'); ?>
               </div>
           </div>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> <?= $title; ?> : <?= $buku_tamu['nama']; ?></h6>
               </div>
               <div class="card-body">
                   <form action="<?= base_url('buku_tamu/edit/'); ?><?= $buku_tamu['id']; ?>" method="POST">
                       <input type="hidden" name="id" value="<?= $buku_tamu['id']; ?>">
                       <input type="hidden" name="waktu" value="<?= $buku_tamu['waktu']; ?>">


                       <div class="form-group">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control" name="nama" id="nama" value="<?= $buku_tamu['nama']; ?>">
                           <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="id_instansi">Instansi</label>
                           <select name="id_instansi" class="custom-select">
                               <option value="" selected>Select</option>
                               <?php foreach ($instansi as $in) : ?>
                                   <?php if ($in['id'] == $buku_tamu['id_instansi']) : ?>
                                       <option value="<?= $in['id']; ?>" selected><?= $in['instansi']; ?></option>
                                   <?php else : ?>
                                       <option value="<?= $in['id']; ?>"><?= $in['instansi']; ?></option>
                                   <?php endif; ?>
                               <?php endforeach; ?>
                           </select>
                           <?= form_error('id_instansi', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="id_tujuan">Tujuan</label>
                           <select name="id_tujuan" class="custom-select">
                               <option value="" selected>Select</option>
                               <?php foreach ($tujuan as $tj) : ?>
                                   <?php if ($tj['id'] == $buku_tamu['id_tujuan']) : ?>
                                       <option value="<?= $tj['id']; ?>" selected><?= $tj['tujuan']; ?></option>
                                   <?php else : ?>
                                       <option value="<?= $tj['id']; ?>"><?= $tj['tujuan']; ?></option>
                                   <?php endif; ?>
                               <?php endforeach; ?>
                           </select>
                           <?= form_error('id_tujuan', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="id_keperluan">Keperluan</label>
                           <select name="id_keperluan" class="custom-select">
                               <option value="" selected>Select</option>
                               <?php foreach ($keperluan as $kp) : ?>
                                   <?php if ($kp['id'] == $buku_tamu['id_keperluan']) : ?>
                                       <option value="<?= $kp['id']; ?>" selected><?= $kp['keperluan']; ?></option>
                                   <?php else : ?>
                                       <option value="<?= $kp['id']; ?>"><?= $kp['keperluan']; ?></option>
                                   <?php endif; ?>
                               <?php endforeach; ?>
                           </select>
                           <?= form_error('id_tujuan', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                       <div class="form-group">
                           <label for="telp">No - telp/HP</label>
                           <input type="text" class="form-control" name="telp" id="telp" value="<?= $buku_tamu['telp']; ?>">
                           <?= form_error('telp', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                     

                       <!-- <div class="form-group">
                           <label for="keterangan">Keterangan</label>
                           <input type="text" class="form-control" name="layanan" id="layanan" value="<?= $buku_tamu['keterangan']; ?>">

                       </div> -->


                       <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check-circle"></i> Update </button>

                   </form>

               </div>
           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
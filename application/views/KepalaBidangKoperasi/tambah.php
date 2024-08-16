       <!-- Begin Page Content -->
       <div class="container-fluid">


           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-book"></i> <?= $title; ?></h1>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> <?= $title; ?> Buku Tamu</h6>
               </div>
               <div class="card-body">
                   <form action="<?= base_url('daftar_tamu/tambah'); ?>" method="POST">
                       <input type="hidden" name="waktu" value="<?= date("Y-m-d H:i:s"); ?>">
                       <input type="hidden" name="pelayanan" value="-">
                  

                       <div class="form-group">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                           <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="satker">Instansi/Organisasi/Masyrakatat</label>
                           <input type="text" class="form-control" name="satker" id="satker" value="<?= set_value('satker'); ?>">
                           <?= form_error('satker', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="id_tujuan">Tujuan</label>
                           <select name="id_tujuan" class="custom-select">
                               <option value="" selected>Select</option>
                               <?php foreach ($tujuan as $tj) : ?>
                                   <option value="<?= $tj['id']; ?>"><?= $tj['tujuan']; ?></option>
                               <?php endforeach; ?>
                           </select>
                           <?= form_error('id_tujuan', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="keperluan">Keperluan - Maksud Tujuan</label>
                           <input type="text" class="form-control" name="keperluan" id="keperluan">
                           <?= form_error('keperluan', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                       <div class="form-group">
                           <label for="telp">No - telp/HP</label>
                           <input type="text" class="form-control" name="telp" id="telp">
                           <?= form_error('telp', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check-circle"></i> Submit</button>
                   </form>
               </div>
           </div>


       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
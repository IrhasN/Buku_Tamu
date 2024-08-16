       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-user"></i> Tambah User Baru</h1>

           <!-- Tambah User -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Tambah User</h6>
               </div>
               <div class="card-body">
                   <form action="<?= base_url('user/tambah'); ?>" method="POST">

                       <input type="hidden" name="is_active" value="tidak">
                       <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">

                       <div class="form-group">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                           <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                           <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                       <div class="form-group">
                           <label for="password">New Password</label>
                           <input type="password" class="form-control" name="password" id="password">
                           <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                       <div class="form-group">
                           <label for="password1"> Reepet Password</label>
                           <input type="password" class="form-control" name="password1" id="password1">
                           <?= form_error('password1', '<small class="text-danger ">', '</small>'); ?>
                       </div>

                       <div class="form-group">
                           <label for="hak_akses">Hak Akses</label>
                           <select name="hak_akses" class="custom-select">
                               <option value="" selected>Select:</option>
                               <?php foreach ($akses as $ak) : ?>
                                   <?php if ($ak ==  $data_user['role_id']) : ?>
                                       <option value="<?= $ak; ?>" selected><?= $ak; ?></option>
                                   <?php else : ?>
                                       <option value="<?= $ak; ?>"><?= $ak; ?></option>
                                   <?php endif; ?>
                               <?php endforeach; ?>
                           </select>
                           <?= form_error('hak_akses', '<small class="text-danger pl-3">', '</small>'); ?>


                       </div>

                       <div class="form-group">
                           <label for="unit_kerja"> Unit Kerja</label>
                           <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" value="<?= set_value('unit_kerja'); ?>">
                           <?= form_error('unit_kerja', '<small class="text-danger ">', '</small>'); ?>
                       </div>


                       <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check-circle"></i> Submit</button>

                   </form>
               </div>
           </div>


       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
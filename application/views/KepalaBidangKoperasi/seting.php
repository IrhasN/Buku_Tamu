       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-address-card"></i> Account Seting</h1>

           <div class="row mt-1  text-center">
               <div class="col-md-12">
                   <?= form_error('image', '<div class="error">', '</div>'); ?>
                   <?= $this->session->flashdata('message'); ?>
               </div>
           </div>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-address-card"></i> Account Seting</h6>
               </div>
               <div class="card-body">

                   <form action="<?= base_url('KepalaBidangKoperasi/seting'); ?>" method="POST">
                       <input type="hidden" name="id" value="<?= $user['id']; ?>">
                       <input type="hidden" name="date" value="<?= $user['date']; ?>">
                       <input type="hidden" name="akses" value="<?= $user['role_id']; ?>">
                       <input type="hidden" name="status" value="<?= $user['is_active']; ?>">

                       <div class="form-group">
                           <div class="col-sm-12">
                               <label for="nama">Nama </label>
                               <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
                               <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <label for="email">Email </label>
                               <input type="text" readonly class="form-control" name="email" id="email" value="<?= $user['email']; ?>">
                               <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <label for="unit_kerja">Unit Kerja </label>
                               <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" value="<?= $user['unit_kerja']; ?>">
                               <?= form_error('unit_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <label for="password">Current Password </label>
                               <input type="password" class="form-control" name="password" id="password">
                               <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <label for="password1">New Password </label>
                               <input type="password" class="form-control" name="password1" id="password1">
                               <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <label for="password2">Reepet Password </label>
                               <input type="password" class="form-control" name="password2" id="password2">
                               <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="col-sm-12">
                               <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check-circle"></i> Update</button>
                           </div>
                       </div>



                   </form>
               </div>
           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
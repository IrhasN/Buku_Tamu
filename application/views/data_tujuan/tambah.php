       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-calendar-check"></i> <?= $title; ?></h1>

           <!-- Basic Card Example Tambah Data Tujuan -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-calendar-check"></i> <?= $title; ?></h6>
               </div>
               <div class="card-body">

                   <form action="<?= base_url('data_tujuan/tambah'); ?>" method="POST">
                       <div class="form-group">
                           <label for="tujuan">Kategori Data Tujuan</label>
                           <input type="text" class="form-control" name="tujuan" id="tujuan">
                           <?= form_error('tujuan', '<small class="text-danger ">', '</small>'); ?>
                       </div>
                       <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check-circle"></i> Submit</button>
                   </form>
               </div>
           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
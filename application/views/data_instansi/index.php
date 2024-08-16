       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-calendar-check"></i> <?= $title; ?></h1>



           <div class="col-lg-9">

               <div class="row mt-1  text-center">
                   <div class="col-md-12">
                       <?= form_error('image', '<div class="error">', '</div>'); ?>
                       <?= $this->session->flashdata('message'); ?>
                   </div>
               </div>

               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                   <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-calendar-check"></i> <?= $title; ?></h6>
                   </div>

                   <div class="card-body">

                       <a href="<?= base_url('data_instansi/tambah'); ?>" class="btn btn-info btn-icon-split mb-4">
                           <span class="icon text-white-50">
                               <i class="fas fa-plus-circle"></i>
                           </span>
                           <span class="text">Tambah Data</span>
                       </a>

                       <div class="table-responsive">
                           <table class="table table-bordered table-hover" id="instansi" width="100%" cellspacing="0">
                               <thead>
                                   <tr>
                                       <th>No.</th>
                                       <th>Data instansi</th>
                                       <th>Action</th>

                                   </tr>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($data_instansi as $dt) : ?>
                                       <tr>
                                           <td><?= $i; ?></td>
                                           <td><?= $dt['instansi']; ?></td>
                                           <td>
                                               <a href="<?= base_url('data_instansi/delete/'); ?><?= $dt['id']; ?>">
                                                   <span class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?');"><i class="fas fa-trash-alt"></i> Delete</span>
                                               </a> &nbsp;
                                               <a href="<?= base_url('data_instansi/edit/'); ?><?= $dt['id']; ?>">
                                                   <span class="badge badge-primary"><i class="fas fa-edit"></i> Edit</span>
                                               </a>
                                           </td>
                                       </tr>
                                       <?php $i++; ?>
                                   <?php endforeach; ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>

           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
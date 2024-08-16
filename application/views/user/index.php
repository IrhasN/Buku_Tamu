       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-users-cog"></i> Data <?= $title; ?></h1>

           <div class="row mt-1  text-center">
               <div class="col-md-12">
                   <?= form_error('image', '<div class="error">', '</div>'); ?>
                   <?= $this->session->flashdata('message'); ?>
               </div>
           </div>

           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-users-cog"></i> Data User</h6>
               </div>
               <div class="card-body">

                   <a href="<?= base_url('user/tambah'); ?>" class="btn btn-info btn-icon-split mb-4">
                       <span class="icon text-white-50">
                           <i class="fas fa-plus-circle"></i>
                       </span>
                       <span class="text">Tambah Data</span>
                   </a>

                   <div class="table-responsive">
                       <table class="table table-bordered table-hover" id="dataUser" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                   <th>Status</th>
                                   <th>Unit Kerja</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php $i = 1; ?>
                               <?php foreach ($data_user as $usr) : ?>
                                   <tr>
                                       <td><?= $i++; ?></td>
                                       <td>
                                           <a href="<?= base_url('user/edit/'); ?><?= $usr['id']; ?>" style="color:gray"><?= $usr['nama']; ?></a>
                                       </td>
                                       <td><?= $usr['email']; ?></td>
                                       <td><?= $usr['role_id']; ?></td>
                                       <td>
                                           <?php $cek = 'aktif'; ?>
                                           <?php if ($usr['is_active'] == $cek) : ?>
                                               <a href="<?= base_url('user/non_aktif_user/'); ?><?= $usr['id']; ?>" class="badge badge-success">
                                                   <i class="fas fa-check-circle"></i> aktif</a>
                                           <?php else : ?>
                                               <a href="<?= base_url('user/aktif_user/'); ?><?= $usr['id']; ?>" class="badge badge-secondary">
                                                   <i class="fas fa-ban"> </i> tidak</a>
                                           <?php endif; ?>
                                       </td>
                                       <td><?= $usr['unit_kerja']; ?></td>
                                       <td>
                                           <a href="<?= base_url('user/delete/'); ?><?= $usr['id']; ?>">
                                               <span class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data User?');"><i class="fas fa-trash-alt"></i> Delete</span>
                                           </a>

                                           <a href="<?= base_url('user/view/'); ?><?= $usr['id']; ?>">
                                               <span class="badge badge-primary"><i class="fas fa-eye"></i> View</span>
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
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
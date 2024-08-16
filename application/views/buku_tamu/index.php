   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><i class="fas  fa-book"></i> <?= $title; ?></h1>

       <div class="row mt-1  text-center">
           <div class="col-md-12">
               <?= form_error('image', '<div class="error">', '</div>'); ?>
               <?= $this->session->flashdata('message'); ?>
           </div>
       </div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> Data Buku Tamu Terbaru (1 Hari)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="recentBukuTamu" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Keperluan</th>
                        <th>Instansi</th>
                        <th>Tujuan</th>
                        <th>Tanggal Tiba</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_buku_tamu as $bk) : ?>
                        <tr>
                            <td>
                               <b> <a href="<?= base_url('buku_tamu/edit/'); ?><?= $bk['id']; ?>" style="color:gray"><?= $bk['nama']; ?></a></b>
                            </td>
                            <td><?= $bk['keperluan']; ?></td>
                            <td> <span class="badge badge-secondary"> <?= $bk['instansi']; ?> </td>
                            <td> <span class="badge badge-secondary"> <?= $bk['tujuan']; ?> </td>
                            <td>
                                <?php
                                 $date = date_create($bk['waktu']);
                                 echo date_format($date, "d/m/Y - H:i:s");
                                 ?>
                            </td>
                            <td><a href="<?= base_url('buku_tamu/view/'); ?><?= $bk['id']; ?>">
                                    <span class="badge badge-primary"><i class="fas fa-eye"></i> View</span>
                                </a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> Data Buku Tamu</h6>
    </div>
    <div class="card-body">

        <a href="<?= base_url('buku_tamu/tambah'); ?>" class="btn btn-info btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah Data Tamu</span>
        </a>

        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="bukuTamu" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Keperluan</th>
                        <th>Instansi</th>
                        <th>Tujuan</th>
                        <th>Tanggal Tiba</th>
                        <th>Delete</th>
                        <th>View</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Debugging: Tampilkan data yang diterima
                    // echo '<pre>'; print_r($buku_tamu); echo '</pre>';
                    ?>
                    <?php foreach ($buku_tamu as $bk) : ?>
                        <tr>
                            <td>
                               <b> <a href="<?= base_url('buku_tamu/edit/'); ?><?= $bk['id']; ?>" style="color:gray"><?= $bk['nama']; ?></a></b>
                            </td>
                            <td><?= $bk['keperluan']; ?></td>
                            <td> <span class="badge badge-secondary"> <?= $bk['instansi']; ?> </td>
                            <td> <span class="badge badge-secondary"> <?= $bk['tujuan']; ?> </td>
                            <td>
                                <?php
                                 $date = date_create($bk['waktu']);
                                 echo date_format($date, "d/m/Y - H:i:s");
                                 ?>
                            </td>
                            <td>
                                <?php if ($user['role_id'] == 'FrontOffice') : ?>
                                    <a href="<?= base_url('buku_tamu/delete/'); ?><?= $bk['id']; ?>">
                                        <span class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?');"><i class="fas fa-trash-alt"></i> Delete</span>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td><a href="<?= base_url('buku_tamu/view/'); ?><?= $bk['id']; ?>">
                                    <span class="badge badge-primary"><i class="fas fa-eye"></i> View</span>
                                </a></td>
                            <td>
                                 <?php
                                 $status1 = $bk['status1'];
                                 if ($status1 == 'Diterima') {
                                     echo '<span class="badge badge-success">Diterima</span>';
                                 } elseif ($status1 == 'Ditolak') {
                                     echo '<span class="badge badge-danger">Ditolak</span>';
                                 } elseif (empty($status1)) {
                                     echo '<span class="badge badge-primary">Proses</span>';
                                 } else {
                                     echo '<span class="badge badge-secondary">Belum Diproses</span>';
                                 }
                                 ?>
                            </td>
                        </tr>
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
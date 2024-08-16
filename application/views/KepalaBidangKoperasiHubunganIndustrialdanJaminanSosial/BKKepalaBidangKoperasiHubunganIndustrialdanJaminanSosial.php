   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><i class="fas  fa-book"></i> <?= $title; ?></h1>

       <div class="row mt-1  text-center">
           <div class="col-md-12">
               <?= form_error('image', '<div class="error">', '</div>'); ?>
             
           </div>
       </div>


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> Data Buku Tamu</h6>
           </div>
           <div class="card-body">

            


               <div class="table-responsive table-hover">
    <table class="table table-bordered" id="bukuTamu" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Keperluan</th>
                <th>keterangan</th>
                <th>Tanggal Tiba</th>
                <th>Konfirmasi</th>
                <th>Status</th>
                
            </tr>
        </thead>

        <tbody>
            <?php foreach ($KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial as $bk) : ?>
                <?php
                // Convert the database timestamp to DateTime object
                $waktu_tiba = new DateTime($bk['waktu']);
                // Get the current date and time
                $now = new DateTime();
                // Calculate the difference in days
                $interval = $now->diff($waktu_tiba);
                // Check if the difference is more than one day
                $is_more_than_one_day = $interval->days > 0;
                ?>

                <?php if (!$is_more_than_one_day) : ?>
                    <tr>
                        <td><?= $bk['nama']; ?></td>
                        <td><span class="badge badge-secondary">
                            <?php foreach ($keperluan as $kp) : ?>
                               <?php if ($kp['id'] == $bk['id_keperluan']) : ?>
                                    <?= $kp['keperluan']; ?>
                                <?php break; // Stop loop once the correct keperluan is found ?>
                                <?php endif; ?>
                        <?php endforeach; ?>
                        </td>

                        <td><?= $bk['keterangan']; ?></span></td>
                        <td>
                            <?= $waktu_tiba->format("d/m/Y - H:i:s"); ?>
                        </td>
                        <td>
                            <a href="<?= base_url('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/edit/') . $bk['id']; ?>">
                                <span class="badge badge-primary"> Konfirmasi</span>
                            </a>
                        </td>
                        <td>
    <?php
    $status1 = $bk['status1'];

    // Logika untuk menentukan status
    if ($status1 == 'Diterima') {
        echo '<span class="badge badge-success">Diterima</span>';
    } elseif ($status1 == 'Ditolak') {
        echo '<span class="badge badge-danger">Ditolak</span>';
    } elseif (empty($status1)) {
        echo '<span class="badge badge-secondary">Belum Di Konfirmasi</span>';
    } else {
        echo '<span class="badge badge-secondary">Belum Diproses</span>';
    }
    ?>
</td>


                    </tr>
                <?php endif; ?>
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
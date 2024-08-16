        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-address-card"></i> <?= $title; ?> </i></h1>

            <div class="card mb-4 py-3 border-bottom-primary" style="max-width: 550px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="card-img" alt="Profile Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> <?= $user['nama']; ?></h5>
                            <p class="card-text">
                                <i class="fas fa-warehouse"></i> <?= $user['unit_kerja']; ?>
                            </p>
                            <p class="card-text">
                                <i class="fas fa-envelope"></i> <?= $user['email']; ?>
                            </p>
                            <p class="card-text">
                                <i class="fas fa-user-shield"></i> Hak Akses : <?= $user['role_id']; ?>
                            </p>

                            <p class="card-text"><small class="text-muted"><i class="fas fa-calendar-alt"></i> Tanggal Registrasi : <?= $user['date']; ?></small></p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <img class="col-lg-6 d-none d-lg-block " src="<?= base_url('assets/img/background_bukutamu.png') ?>">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="h4 text-gray-900 mb-4">Halaman Login <br> Buku Tamu</h3> 
                                </div>


                                <div class="row mt-1  text-center">
                                    <div class="col-md-12">
                                        <?= form_error('image', '<div class="error">', '</div>'); ?>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                </div>

                                <form action="<?= base_url('login'); ?>" class="user" method="POST">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Enter Username Address..." value="<?= set_value('nama'); ?>" required>
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>


                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('login/register'); ?>">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Home'); ?>">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
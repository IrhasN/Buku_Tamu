<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <img class="col-lg-6 d-none d-lg-block " src="<?= base_url('assets/img/background_bukutamu.jpg') ?>">
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Registrasi Akun Baru<br> Buku Tamu Digital</h1>
                        </div>
                        <form class="user" action="<?= base_url('login/register'); ?>" method="POST">

                            <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="First Name" value="<?= set_value('nama'); ?>" required>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>" required>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="New Password" required>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Repet Password" required>
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="unit_kerja" name="unit_kerja" placeholder="Unit Kerja" value="<?= set_value('unit_kerja'); ?>" required>
                                <?= form_error('unit_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Registrasi Akun</button>

                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url('login'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
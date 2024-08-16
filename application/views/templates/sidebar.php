<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php
$FrontOffice = 'FrontOffice';
$operator = 'operator';
$sekretaris = 'sekretaris';
$IntrukturMadya = 'IntrukturMadya';
$Kadis = 'KepalaDinasKoperasiUsahaMikrodanTenagaKerja';
$PengawasKoperasiMadya = 'PengawasKoperasiMadya';
$IntrukturMuda = 'IntrukturMuda';
$KepalaSubBagianKeuangan = 'KepalaSubBagianKeuangan';
$KepalaSubBagianPerencaan = 'KepalaSubBagianPerencaan';
$KepalaSubBagianmumdanKepegawaian = 'KepalaSubBagianmumdanKepegawaian';
$KepalaBidangUsahaMikro = 'KepalaBidangUsahaMikro';
$KepalaBidangKoperasi = 'KepalaBidangKoperasi';
$KepalaBidangPembinaanPelatihandanPenempatanKerja = 'KepalaBidangPembinaanPelatihandanPenempatanKerja';
$KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial = 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial';
$KepalaUPTBLK = 'KepalaUPTBLK';
$KepalaSubBagianTataUsahaUPTBLK = 'KepalaSubBagianTataUsahaUPTBLK';
$MediatorHubunganIndustrialMadya = 'MediatorHubunganIndustrialMadya';


if ($user['role_id'] == $FrontOffice) :
?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('FrontOffice'); ?>">
<?php elseif ($user['role_id'] == $operator) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('operator'); ?>">
<?php elseif ($user['role_id'] == $sekretaris) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('sekretaris'); ?>">
<?php elseif ($user['role_id'] == $IntrukturMadya) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('IntrukturMadya'); ?>">
<?php elseif ($user['role_id'] == $Kadis) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaDinasKoperasiUsahaMikrodanTenagaKerja'); ?>">
<?php elseif ($user['role_id'] == $PengawasKoperasiMadya) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('PengawasKoperasiMadya'); ?>">
<?php elseif ($user['role_id'] == $IntrukturMuda) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('IntrukturMuda'); ?>">
<?php elseif ($user['role_id'] == $KepalaSubBagianKeuangan) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaSubBagianKeuangan'); ?>">
<?php elseif ($user['role_id'] == $KepalaSubBagianPerencaan) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaSubBagianPerencaan'); ?>">
<?php elseif ($user['role_id'] == $KepalaSubBagianmumdanKepegawaian) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaSubBagianmumdanKepegawaian'); ?>">
<?php elseif ($user['role_id'] == $KepalaBidangUsahaMikro) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaBidangUsahaMikro'); ?>">
<?php elseif ($user['role_id'] == $KepalaBidangKoperasi) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaBidangKoperasi'); ?>">
<?php elseif ($user['role_id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaBidangPembinaanPelatihandanPenempatanKerja'); ?>">
<?php elseif ($user['role_id'] == $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial'); ?>">
<?php elseif ($user['role_id'] == $KepalaUPTBLK) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaUPTBLK'); ?>">
<?php elseif ($user['role_id'] == $KepalaSubBagianTataUsahaUPTBLK) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KepalaSubBagianTataUsahaUPTBLK'); ?>">
<?php elseif ($user['role_id'] == $MediatorHubunganIndustrialMadya) : ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('MediatorHubunganIndustrialMadya'); ?>">
<?php endif; ?>

            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-cogs"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Buku Tamu</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php $hal_FrontOffice = 'Halaman FrontOffice'; ?>
            <?php if ($title == $hal_FrontOffice) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <?php $op = 'Halaman Operator'; ?>
                <?php if ($title == $op) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <?php $sk = 'Halaman Sekretaris'; ?>
                <?php if ($title == $sk) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>



                <?php if ($user['role_id'] == $FrontOffice) : ?>
                    <?php $judul = 'Halaman FrontOffice'; ?>
                    <?php if ($title == $judul) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <a class="nav-link" href="<?= base_url('FrontOffice'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
            <?php endif; ?>


            <?php if ($user['role_id'] == $operator) : ?>
                <?php $judul = 'Halaman Operator'; ?>
                <?php if ($title == $judul) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <a class="nav-link" href="<?= base_url('operator'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role_id'] == $sekretaris) : ?>
                <?php $judul = 'Halaman Sekretaris'; ?>
                <?php if ($title == $judul) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <a class="nav-link" href="<?= base_url('sekretaris'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </li>
                <?php endif; ?>

                <!-- Divider -->
                <hr class="sidebar-divider ">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>

                <!-- Nav Item - Buku tamu-->

                <?php $judul = 'Data Tamu'; ?>
                <?php if ($title == $judul) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <a class="nav-link" href="<?= base_url('buku_tamu'); ?>">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Buku Tamu</span></a>
                    </li>

                    <?php $judul = 'Data Tamu Kakanwil'; ?>
                    <?php if ($title == $judul) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>

                        

                    


                            <!-- Nav Item - Buku tamu-->
                            <?php $judul = 'Laporan Buku Tamu'; ?>
                            <?php if ($title == $judul) : ?>
                                <li class="nav-item active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>

                                <a class="nav-link" href="<?= base_url('laporan'); ?>">
                                    <i class="fas fa-fw fa-info-circle"></i>
                                    <span>Laporan </span></a>
                                </li>

                                <!-- Divider -->
                                <hr class="sidebar-divider d-none d-md-block my-0">

                                <!-- Seting Collapse Menu -->
                                <?php if ($user['role_id'] == $FrontOffice) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <i class="fas fa-fw fa-cog"></i>
                                            <span>Seting</span>
                                        </a>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Menu:</h6>
                                                <a class="collapse-item" href="<?= base_url('data_tujuan'); ?>"><i class="fas fa-calendar-check"></i> Data Tujuan</a>
                                                <a class="collapse-item" href="<?= base_url('data_keperluan'); ?>"><i class="fas fa-calendar-check"></i> Data Keperluan</a>
                                                <a class="collapse-item" href="<?= base_url('data_instansi'); ?>"><i class="fas fa-calendar-check"></i> instansi</a>
                                                <a class="collapse-item" href="<?= base_url('user'); ?>"> <i class="fas fa-users-cog"></i> User</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>



                                <!-- Nav Item - Logout-->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('login/logout'); ?>">
                                        <i class="fas fa-fw fa-sign-out-alt"></i>
                                        <span>Logout</span></a>
                                </li>

                                <!-- Divider -->
                                <hr class="sidebar-divider d-none d-md-block">



                                <!-- Sidebar Toggler (Sidebar) -->
                                <div class="text-center d-none d-md-inline">
                                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                </div>

</ul>
<!-- End of Sidebar -->
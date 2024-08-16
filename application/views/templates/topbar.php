<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button> <b> Buku Tamu </b> &nbsp;   &nbsp; | &nbsp; <i class="far fa-calendar-alt"> <?= date("d-m-Y"); ?></i>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.jpg'); ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <?php
$FrontOffice = 'FrontOffice';
$operator = 'operator';
$sekretaris = 'Sekretaris'; // Tambahkan variabel sekretaris
$IntrukturMadya = 'IntrukturMadya';
$KepalaDinasKoperasiUsahaMikrodanTenagaKerja = 'KepalaDinasKoperasiUsahaMikrodanTenagaKerja';
$MediatorHubunganIndustrialMadya = 'MediatorHubunganIndustrialMadya';
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

if ($user['role_id'] == $FrontOffice) :
?>
    <a class="dropdown-item" href="<?= base_url('FrontOffice/profile'); ?>">
<?php elseif ($user['role_id'] == $operator) : ?>
    <a class="dropdown-item" href="<?= base_url('operator/profile'); ?>">
<?php elseif ($user['role_id'] == $sekretaris) : ?> <!-- Tambahkan kondisi untuk sekretaris -->
    <a class="dropdown-item" href="<?= base_url('sekretaris/profile'); ?>">
<?php elseif ($user['role_id'] == $IntrukturMadya) : ?> <!-- Tambahkan kondisi untuk sekretaris -->
    <a class="dropdown-item" href="<?= base_url('IntrukturMadya/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaDinasKoperasiUsahaMikrodanTenagaKerja) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaDinasKoperasiUsahaMikrodanTenagaKerja/profile'); ?>">
    <?php elseif ($user['role_id'] == $MediatorHubunganIndustrialMadya) : ?> 
    <a class="dropdown-item" href="<?= base_url('MediatorHubunganIndustrialMadya/profile'); ?>">
    <?php elseif ($user['role_id'] == $PengawasKoperasiMadya) : ?> 
    <a class="dropdown-item" href="<?= base_url('PengawasKoperasiMadya/profile'); ?>">
    <?php elseif ($user['role_id'] == $IntrukturMuda) : ?> 
    <a class="dropdown-item" href="<?= base_url('IntrukturMuda/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianKeuangan) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianKeuangan/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianPerencaan) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianPerencaan/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianmumdanKepegawaian) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianmumdanKepegawaian/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangUsahaMikro) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangUsahaMikro/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangKoperasi) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangKoperasi/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangPembinaanPelatihandanPenempatanKerja/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaUPTBLK) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaUPTBLK/profile'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianTataUsahaUPTBLK) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianTataUsahaUPTBLK/profile'); ?>">
<?php endif; ?>


                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                                </a>
                                
                                <?php
$FrontOffice = 'FrontOffice';
$operator = 'operator';
$sekretaris = 'Sekretaris';
$IntrukturMadya = 'IntrukturMadya';
$KepalaDinasKoperasiUsahaMikrodanTenagaKerja = 'KepalaDinasKoperasiUsahaMikrodanTenagaKerja';
$MediatorHubunganIndustrialMadya = 'MediatorHubunganIndustrialMadya';
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

if ($user['role_id'] == $FrontOffice) :
?>
    <a class="dropdown-item" href="<?= base_url('FrontOffice/seting'); ?>">
<?php elseif ($user['role_id'] == $operator) : ?>
    <a class="dropdown-item" href="<?= base_url('operator/seting'); ?>">
<?php elseif ($user['role_id'] == $sekretaris) : ?>
    <a class="dropdown-item" href="<?= base_url('sekretaris/seting'); ?>">
<?php elseif ($user['role_id'] == $IntrukturMadya) : ?> 
    <a class="dropdown-item" href="<?= base_url('IntrukturMadya/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaDinasKoperasiUsahaMikrodanTenagaKerja) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaDinasKoperasiUsahaMikrodanTenagaKerja/seting'); ?>">
    <?php elseif ($user['role_id'] == $MediatorHubunganIndustrialMadya) : ?> 
    <a class="dropdown-item" href="<?= base_url('MediatorHubunganIndustrialMadya/seting'); ?>">
    <?php elseif ($user['role_id'] == $PengawasKoperasiMadya) : ?> 
    <a class="dropdown-item" href="<?= base_url('PengawasKoperasiMadya/seting'); ?>">
    <?php elseif ($user['role_id'] == $IntrukturMuda) : ?> 
    <a class="dropdown-item" href="<?= base_url('IntrukturMuda/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianKeuangan) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianKeuangan/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianPerencaan) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianPerencaan/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianmumdanKepegawaian) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianmumdanKepegawaian/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangUsahaMikro) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangUsahaMikro/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangKoperasi) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangKoperasi/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangPembinaanPelatihandanPenempatanKerja/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaUPTBLK) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaUPTBLK/seting'); ?>">
    <?php elseif ($user['role_id'] == $KepalaSubBagianTataUsahaUPTBLK) : ?> 
    <a class="dropdown-item" href="<?= base_url('KepalaSubBagianTataUsahaUPTBLK/seting'); ?>">
<?php endif; ?>

                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url('login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
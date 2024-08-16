<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php
// Inisialisasi variabel $user
$IntrukturMadya = 'IntrukturMadya';
$user = [
    'role_id' => 'IntrukturMadya', // Gantilah dengan nilai yang sesuai
    // ... tambahkan informasi pengguna lainnya jika diperlukan
];

// Sekarang Anda dapat menggunakan variabel $user dalam kode Anda
?>

<?php if (isset($user['role_id']) && $user['role_id'] == $IntrukturMadya) : ?>
    <?php $judul = 'Halaman IntrukturMadya'; ?>
    <?php if ($title == $judul) : ?>
        <li class="nav-item active">
    <?php else : ?>
        <li class="nav-item">
    <?php endif; ?>

    <a class="nav-link" href="<?= base_url('IntrukturMadya'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    </li>
<?php endif; ?>

            

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php
$hal_admin = 'Halaman Admin';
$op = 'Halaman Operator';
$sk = 'Halaman IntrukturMadya';
?>

<li class="<?= ($title == $sk) ? 'nav-item active' : 'nav-item'; ?>">
    <!-- Isi dengan konten item navigasi sesuai kebutuhan -->
</li>







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

                    <a class="nav-link" href="<?= base_url('IntrukturMadya/BKIntrukturMadya'); ?>">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Buku Tamu</span></a>
                    </li>

                    <?php $judul = 'Data Tamu Dinas Koperasi Usaha Mikro dan Tenaga Kerja'; ?>
                    <?php if ($title == $judul) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
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
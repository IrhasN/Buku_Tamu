       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-tachometer-alt"></i> Dashboard Buku Tamu Digital </h1>



           <!-- Pie Grafik Bar Tujuan Tamu-->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-pie"></i> Grafik Tujuan Tamu</h6>
               </div>
               <div class="card-body">

                   <div id="dataTamu"></div>

                   <script src="https://code.highcharts.com/highcharts.js"></script>
                   <script src="https://code.highcharts.com/modules/exporting.js"></script>
                   <script src="https://code.highcharts.com/modules/export-data.js"></script>
                   <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                   <script type="text/javascript">
                       // Build the chart
                       Highcharts.chart('dataTamu', {
                           chart: {
                               plotBackgroundColor: null,
                               plotBorderWidth: null,
                               plotShadow: false,
                               type: 'pie'
                           },
                           title: {
                               text: 'Tujuan Tamu Dinas Koperasi Usaha Mikro dan Tenaga Kerja'
                           },
                           tooltip: {
                               pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                           },
                           accessibility: {
                               point: {
                                   valueSuffix: '%'
                               }
                           },
                           plotOptions: {
                               pie: {
                                   allowPointSelect: true,
                                   cursor: 'pointer',
                                   dataLabels: {
                                       enabled: true,
                                       format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                   }
                               }
                           },
                           series: [{
                               name: 'Brands',
                               colorByPoint: true,
                               data: [{
                                   name: 'diskopumker',
                                   y: <?= $total_diskopumker; ?>,
                                   sliced: true,
                                   selected: true
                               }, {
                                   name: 'Kepala Dinas Koperasi Usaha Mikro dan Tenaga Kerja',
                                   y: <?= $total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja; ?>
                               }, {
                                   name: 'Intruktur Madya',
                                   y: <?= $total_IntrukturMadya; ?>
                               }, {
                                   name: 'Mediator Hubungan Industrial Madya',
                                   y: <?= $total_MediatorHubunganIndustrialMadya; ?>
                               }, {
                                   name: 'Pengawas Koperasi Madya',
                                   y: <?= $total_PengawasKoperasiMadya; ?>
                               }, {
                                   name: 'Intruktur Muda',
                                   y: <?= $total_IntrukturMuda; ?>
                               }, {
                                   name: 'IntrukturMadya',
                                   y: <?= $total_IntrukturMadya; ?>
                               }, {
                                   name: 'Kepala Sub Bagian Keuangan',
                                   y: <?= $total_KepalaSubBagianKeuangan; ?>
                               }, {
                                   name: 'Kepala Sub Bagian Perencaan   ',
                                   y: <?= $total_KepalaSubBagianPerencaan; ?>
                               }, {
                                   name: 'Kepala Sub Bagian Umum dan Kepegawaian',
                                   y: <?= $total_KepalaSubBagianmumdanKepegawaian; ?>
                               }, {
                                   name: 'Kepala Bidang Usaha Mikro',
                                   y: <?= $total_KepalaBidangUsahaMikro; ?>
                               }, {
                                   name: 'Kepala Bidang Koperasi',
                                   y: <?= $total_KepalaBidangKoperasi; ?>
                               }, {
                                   name: 'Kepala Bidang Pembinaan Pelatihan dan Penempatan Kerja',
                                   y: <?= $total_KepalaBidangPembinaanPelatihandanPenempatanKerja; ?>
                               }, {
                                   name: 'Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial',
                                   y: <?= $total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial; ?>
                               }, {
                                   name: 'Kepala UPT BLK',
                                   y: <?= $total_KepalaUPTBLK; ?>
                               }, {
                                   name: 'Kepala Sub Bagian Tata Usaha UPT BLK',
                                   y: <?= $total_KepalaSubBagianTataUsahaUPTBLK; ?>

                               }]
                           }]
                       });
                   </script>

               </div>
           </div>

           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Tujuan Tamu</h6>
               </div>
               <div class="card-body">

                   <ul class="list-group">
                   <?php foreach ($tujuan as $row) : ?>
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                               <?= $row['tujuan']; ?>
                               <?php if ($row['id'] == 2) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaDinasKoperasiUsahaMikrodanTenagaKerja; ?></span>
                               <?php elseif ($row['id'] == 3) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_IntrukturMadya; ?></span>
                               <?php elseif ($row['id'] == 4) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_MediatorHubunganIndustrialMadya; ?></span>
                               <?php elseif ($row['id'] == 5) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_PengawasKoperasiMadya; ?></span>
                               <?php elseif ($row['id'] == 6) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_IntrukturMuda; ?></span>
                               <?php elseif ($row['id'] == 7) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_IntrukturMadya; ?></span>
                               <?php elseif ($row['id'] == 8) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianKeuangan; ?></span>
                               <?php elseif ($row['id'] == 9) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianPerencaan; ?></span>
                               <?php elseif ($row['id'] == 12) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianmumdanKepegawaian; ?></span>
                               <?php elseif ($row['id'] == 16) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangUsahaMikro; ?></span>
                               <?php elseif ($row['id'] == 17) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangKoperasi; ?></span>
                               <?php elseif ($row['id'] == 18) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangPembinaanPelatihandanPenempatanKerja; ?></span>
                               <?php elseif ($row['id'] == 19) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial; ?></span>
                               <?php elseif ($row['id'] == 20) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaUPTBLK; ?></span>
                               <?php elseif ($row['id'] == 21) : ?>
                                   <span class="badge badge-primary badge-pill"><?= $total_KepalaSubBagianTataUsahaUPTBLK; ?></span>
                               <?php endif; ?>
                           </li>
                       <?php endforeach; ?>
                   </ul>

               </div>
           </div>



           <!-- 
           <img src="<?= base_url('assets/img/image_home_edit.jpg') ?>" class="rounded mx-auto d-block" alt="Buku Tamu Kemenag Sulut">


           <div class="row mt-3 mb-2">
               <div class="my-2"></div>
               <a href="<?= base_url('buku_tamu/tambah'); ?>" class="btn btn-primary btn-icon-split btn-lg mx-auto">
                   <span class="icon text-white-50">
                       <i class="fas fa-plus-square"></i>
                   </span>
                   <span class="text">Tambah Data Tamu</span>
               </a>
           </div> -->




       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
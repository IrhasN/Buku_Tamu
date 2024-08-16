       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-address-book"></i> Tingkat Kepuasan Layanan</h1>




           <!-- Pie Grafik Bar -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-pie"></i> Grafik Tingkat Pelayanan</h6>
               </div>
               <div class="card-body">

                   <div id="container"></div>

                   <script src="<?= base_url('assets/') ?>js/highcharts.js"></script>
                   <script src="<?= base_url('assets/') ?>js/exporting.js"></script>
                   <script src="<?= base_url('assets/') ?>js/export-data.js"></script>
                   <script src="<?= base_url('assets/') ?>js/accessibility.js"></script>
                   <script type="text/javascript">
                       // Build the chart
                       Highcharts.chart('container', {
                           chart: {
                               plotBackgroundColor: null,
                               plotBorderWidth: null,
                               plotShadow: false,
                               type: 'pie'
                           },
                           title: {
                               text: 'Tingkat Pelayanan Kanwil Kemenag'
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
                                   name: 'Memuaskan',
                                   y: <?= $total_memuaskan; ?>,
                                   sliced: true,
                                   selected: true
                               }, {
                                   name: 'Cukup Memuaskan',
                                   y: <?= $total_cukup_memuaskan; ?>
                               }, {
                                   name: 'Kurang Memuaskan',
                                   y: <?= $total_kurang_memuaskan; ?>
                               }, {
                                   name: 'Tidak Memuaskan',
                                   y: <?= $total_tidak_memuaskan; ?>

                               }]
                           }]
                       });
                   </script>

               </div>
           </div>

           <!-- Info Jumlah Kepuasan -->
           <div class="row">
               <!-- Earnings (Annual) Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-primary shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Memuaskan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_memuaskan; ?></div>
                               </div>
                               <div class="col-auto">
                                   <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                   <i class="far fa-laugh-squint fa-3x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>


               <!-- Cukup Memuaskan -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-success shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Cukup Memuaskan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_cukup_memuaskan; ?></div>
                               </div>
                               <div class="col-auto">
                                   <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                   <i class="far fa-laugh-beam fa-3x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Kurang Memuaskan -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-warning shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Kurang Memuaskan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kurang_memuaskan; ?></div>
                               </div>
                               <div class="col-auto">
                                   <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                   <i class="far fa-frown-open fa-3x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Tidak Memuaskan -->
               <div class="col-xl-3 col-md-6 mb-4">
                   <div class="card border-left-danger shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Tidak Memuaskan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_tidak_memuaskan; ?></div>
                               </div>
                               <div class="col-auto">
                                   <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                   <i class="far fa-dizzy fa-3x text-gray-300"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>


       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
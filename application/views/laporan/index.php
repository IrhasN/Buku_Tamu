       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-info-circle"></i> <?= $title; ?></h1>

           <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list-alt"></i> Filter Berdasar Tujuan</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('laporan/eksport_byTujuan') ?>" method="POST">
            <input type="hidden" name="eksport_laporan" value="1">

            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <select class="form-control" id="tujuan" name="tujuan">
                    <?php foreach ($tujuan as $tjuan): ?>
                        <option value="<?= $tjuan['id']; ?>"><?= $tjuan['tujuan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success" name="submit">
                <i class="fas fa-file-excel"></i> Excel
            </button>
        </form>
    </div>
</div>



           <!-- Basic Card Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
               <!-- <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list-alt"></i> Filter Berdasar Tanggal</h6>
               </div>


               <div class="card-body">

                   <form action="<?= base_url('laporan/eksport_byTanggal') ?>" method="POST">
                       <input type="hidden" name="eksport_laporan" value="1">

                       <div class="form-group">
                           <label for="tanggal_awal">Tanggal Awal</label>
                           <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                       </div>
                       <div class="form-group">
                           <label for="tanggal_akhir">Tanggal Akhir</label>
                           <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                       </div>
                       <button type="submit" class="btn btn-success" name="submit"> <i class="fas fa-file-excel"></i>
                           </span> Excel</button>
                   </form>
               </div>
               
           </div> -->

               <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list-alt"></i> Filter Berdasar Bulan</h6>
</div>

<div class="card-body">
    <form action="<?= base_url('laporan/eksport_byBulan') ?>" method="POST">
        <input type="hidden" name="eksport_laporan" value="1">

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <select class="form-control" id="tahun" name="tahun">
                <?php
                $currentYear = date("Y");
                for ($year = 2023; $year <= 2100; $year++) {
                    echo "<option value=\"$year\">$year</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="bulan">Bulan</label>
            <select class="form-control" id="bulan" name="bulan">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="submit"> <i class="fas fa-file-excel"></i> Excel</button>
    </form>
</div>
           </div>
           <div class="card shadow mb-4">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list-alt"></i> Filter Berdasar Tahun</h6>
</div>

<div class="card-body">
    <form action="<?= base_url('laporan/eksport_byTahun') ?>" method="POST">
        <input type="hidden" name="eksport_laporan" value="1">

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <select class="form-control" id="tahun" name="tahun">
                <?php
                $currentYear = date("Y");
                for ($year = 2023; $year <= 2100; $year++) {
                    echo "<option value=\"$year\">$year</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="submit"> <i class="fas fa-file-excel"></i> Excel</button>
    </form>
</div>
           </div>
           </div>
           <!-- End filter berdasar tanggal -->

           <!-- 
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">
                       <i class="fas fa-list-alt"></i> Filter Berdasar Bulan
                   </h6>
               </div>
               <div class="card-body">
                   <form action="<?= base_url('laporan/filter') ?>" method="POST">

                       <input type="hidden" name="nilai_filter" value="2">

                       <div class="form-group">
                           <label for="tahun1">Pilih Tahun</label>
                           <select name="tahun1" class="custom-select" required>
                       

                           </select>
                       </div>
                       <div class="form-group">
                           <label for="bulan_awal">Bulan Awal</label>
                           <select name="bulan_awal" class="custom-select" required>
                               <option value="1">Januari</option>
                               <option value="2">Februari</option>
                               <option value="3">Maret</option>
                               <option value="4">April</option>
                               <option value="5">Mei</option>
                               <option value="6">Juni</option>
                               <option value="7">Juli</option>
                               <option value="8">Agustus</option>
                               <option value="9">September</option>
                               <option value="10">Oktober</option>
                               <option value="11">November</option>
                               <option value="12">Desember</option>
                           </select>
                       </div>
                       <div class="form-groub">
                           <label for="bulan_akhir">Bulan Akhir</label>
                           <select name="bulan_akhir" class="custom-select" required>
                               <option value="1">Januari</option>
                               <option value="2">Februari</option>
                               <option value="3">Maret</option>
                               <option value="4">April</option>
                               <option value="5">Mei</option>
                               <option value="6">Juni</option>
                               <option value="7">Juli</option>
                               <option value="8">Agustus</option>
                               <option value="9">September</option>
                               <option value="10">Oktober</option>
                               <option value="11">November</option>
                               <option value="12">Desember</option>
                           </select>
                       </div><br>

                       <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check-circle"></i> Submit</button>
                   </form>
               </div>
           </div> -->
           <!-- end filter berdasar bulan -->

           <!-- Laporan Berdasar Tahun -->
           <!-- <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list-alt"></i> Filter Berdasar Tahun</h6>
               </div>
               <div class="card-body">
                   <form action="<?= base_url('laporan/filter') ?>" method="POST">

                       <input type="hidden" name="nilai_filter" value="3">

                       <div class="form-group">
                           <label for="tahun">Pilih Tahun</label>
                           <select name="tahun2" class="custom-select" required>
                         
                           </select>
                       </div>


                       <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check-circle"></i> Submit</button>
                   </form>
               </div>
           </div> -->

           <!-- Ekport Data All -->
           


       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
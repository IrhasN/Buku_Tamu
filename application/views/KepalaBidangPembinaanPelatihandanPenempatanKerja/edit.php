<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-id-card"></i> <?= $title; ?></h1>
    <div class="row mt-1  text-center">
               <div class="col-md-12">
                   <?= form_error('image', '<div class="error">', '</div>'); ?>
                   <?= $this->session->flashdata('message'); ?>
               </div>
           </div>

    <div class="col-lg-10">
    <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> <?= $title; ?> : <?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['nama']; ?></h6>
               </div>
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
            <form action="<?= base_url('KepalaBidangPembinaanPelatihandanPenempatanKerja/edit/'); ?><?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['id']; ?>" method="POST">

                <table class="table table-bordered table-hover" id="bukuTamu" width="100%" cellspacing="0">
                <tbody>
                               <tr>
                                   <td>Nama : </td>
                                   <td><?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['nama']; ?> </td>
                               </tr>

                               <tr>
                                   <td>Instansi : </td>
                                   <td>
                                   <?php foreach ($instansi as $in) : ?>
                                           <?php if ($in['id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja['id_instansi']) : ?>
                                               <label value="<?= $in['id']; ?>"><?= $in['instansi']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>

                                </td>
                               </tr>
                               <tr>
                                   <td>Tujuan : </td>
                                   <td>

                                       <?php foreach ($tujuan as $tj) : ?>
                                           <?php if ($tj['id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja['id_tujuan']) : ?>
                                               <label value="<?= $tj['id']; ?>"><?= $tj['tujuan']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>
                                   </td>
                               </tr>
                               
                                   <td>Keperluan : </td>
                                   <td>
                                   <?php foreach ($keperluan as $kp) : ?>
                                           <?php if ($kp['id'] == $KepalaBidangPembinaanPelatihandanPenempatanKerja['id_keperluan']) : ?>
                                               <label value="<?= $kp['id']; ?>"><?= $kp['keperluan']; ?></label>
                                           <?php endif; ?>
                                       <?php endforeach; ?>
                                    </td>
                               </tr>
                               <tr>
                                   <td>Telp : </td>
                                   <td><?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['telp']; ?> </td>
                               </tr>
                               <tr>
                                   <td>Tanggal Tiba : </td>
                                   <td><?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['waktu']; ?> Wita.</td>
                               </tr>
                               <tr>
                                   <td>Keterangan : </td>
                                   <td><?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['keterangan']; ?></td>

                    
                            
                        <tr> <td>Catatan :</td>
                            <td>
                                <input type="text" class="form-control" name="catatan1" value="<?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['catatan1']; ?>">
                            </td></tr>
                           
                        </tr>
                        
                        <!-- Add another row for the second part of rowspan -->

                    </tbody>
                </table>

                <div class="form-group">
                    <label for="status1">Status</label>
                    <input type="text" readonly class="form-control" name="layanan" id="status1" value="<?= $KepalaBidangPembinaanPelatihandanPenempatanKerja['status1']; ?>">
                </div>

                <form action="<?= base_url('KepalaBidangPembinaanPelatihandanPenempatanKerja/edit/' . $KepalaBidangPembinaanPelatihandanPenempatanKerja['id']); ?>" method="POST">
                   

                    <div class="form-group">
                        <label for="status1">Pilih Status</label>
                        <select name="status1" class="custom-select">
                            <option value="" selected>Select</option>
                            <?php foreach ($status1 as $st1) : ?>
                                <option value="<?= $st1; ?>"><?= $st1; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('status1', '<small class="text-danger ">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">
                            <i class="fas fa-check-circle"></i> Update
                        </button>
                    </div>

                   
                    
                
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

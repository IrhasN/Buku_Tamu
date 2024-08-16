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
                   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> <?= $title; ?> : <?= $PengawasKoperasiMadya['nama']; ?></h6>
               </div>
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
            <form action="<?= base_url('PengawasKoperasiMadya/edit/'); ?><?= $PengawasKoperasiMadya['id']; ?>" method="POST">

                <table class="table table-bordered table-hover" id="bukuTamu" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Nama : </td>
                            <td><input type="text" class="form-control" name="nama" value="<?= $PengawasKoperasiMadya['nama']; ?>" readonly></td>
                        </tr>
                        <!-- Add similar rows for other fields -->

                        <tr>
                            <td>Tanggal Tiba : </td>
                            <td><input type="text" class="form-control" name="waktu" value="<?= $PengawasKoperasiMadya['waktu']; ?> Wita." readonly></td>
                        </tr>

                        <tr>
                                <td>Keperluan : </td>
                                <td><input type="text" class="form-control" name="keperluan" value="<?= $PengawasKoperasiMadya['keperluan']; ?>" readonly></td>
                            </tr>

                        <tr>
                            <td rowspan="2">Catatan :</td>
                            <td>
                                <input type="text" class="form-control" name="catatan2" value="<?= $PengawasKoperasiMadya['catatan2']; ?>">
                            </td>
                        </tr>

                        <!-- Add another row for the second part of rowspan -->

                    </tbody>
                </table>

                <div class="form-group">
                    <label for="status2">Status</label>
                    <input type="text" readonly class="form-control" name="status2" id="status2" value="<?= $PengawasKoperasiMadya['status2']; ?>">
                </div>

                <form action="<?= base_url('PengawasKoperasiMadya/edit/' . $PengawasKoperasiMadya['id']); ?>" method="POST">
                   

                    <div class="form-group">
                        <label for="status2">Pilih Status</label>
                        <select name="status2" class="custom-select">
                            <option value="" selected>Select</option>
                            <?php foreach ($status2 as $st2) : ?>
                                <option value="<?= $st2; ?>"><?= $st2; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('status2', '<small class="text-danger ">', '</small>'); ?>
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

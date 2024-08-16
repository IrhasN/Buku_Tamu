<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-book"></i> <?= $title; ?></h1>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> <?= $title; ?> Buku Tamu</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('buku_tamu/tambah'); ?>" method="POST">
                <input type="hidden" name="waktu" value="<?= date("Y-m-d H:i:s"); ?>">
                <input type="hidden" name="pelayanan" value="-">
                <input type="hidden" name="user" value="<?= $user['email']; ?>">
                <input type="hidden" name="user1" value="<?= $user['id']; ?>">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                </div>

                <div class="form-group">
    <label for="id_instansi">Instansi</label>
    <select name="id_instansi" id="id_instansi" class="custom-select" onchange="toggleNewInstansiField()">
        <option value="" selected>Pilih Instansi</option>
        <?php foreach ($instansi as $is) : ?>
            <option value="<?= $is['id']; ?>"><?= $is['instansi']; ?></option>
        <?php endforeach; ?>
        <option value="new">Tambah Instansi Baru</option>
    </select>
    <?= form_error('id_instansi', '<small class="text-danger">', '</small>'); ?>
    <input type="text" name="new_instansi" id="new_instansi" class="form-control mt-2" placeholder="Tambah Instansi Baru" value="<?= set_value('new_instansi'); ?>" style="display: none;">
</div>
                <div class="form-group">
                    <label for="id_tujuan">Tujuan</label>
                    <select name="id_tujuan" class="custom-select">
                        <option value="" selected>Select</option>
                        <?php foreach ($tujuan as $tj) : ?>
                            <option value="<?= $tj['id']; ?>"><?= $tj['tujuan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_tujuan', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
    <label for="id_keperluan">Keperluan</label>
    <select name="id_keperluan" id="id_keperluan" class="custom-select" onchange="toggleNewKeperluanField()">
        <option value="" selected>Pilih Keperluan</option>
        <?php foreach ($keperluan as $kp) : ?>
            <option value="<?= $kp['id']; ?>"><?= $kp['keperluan']; ?></option>
        <?php endforeach; ?>
        <option value="new">Tambah Keperluan Baru</option>
    </select>
    <?= form_error('id_keperluan', '<small class="text-danger">', '</small>'); ?>
    <input type="text" name="new_keperluan" id="new_keperluan" class="form-control mt-2" placeholder="Tambah Keperluan Baru" value="<?= set_value('new_keperluan'); ?>" style="display: none;">
</div>

<script>
function toggleNewInstansiField() {
    var select = document.getElementById('id_instansi');
    var newInstansiInput = document.getElementById('new_instansi');
    newInstansiInput.style.display = (select.value === 'new') ? 'block' : 'none';
}

function toggleNewKeperluanField() {
    var select = document.getElementById('id_keperluan');
    var newKeperluanInput = document.getElementById('new_keperluan');
    newKeperluanInput.style.display = (select.value === 'new') ? 'block' : 'none';
}
</script>

                <div class="form-group mt-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan">
                    <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="telp">No - telp/HP</label>
                    <input type="text" class="form-control" name="telp" id="telp">
                    <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check-circle"></i> Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

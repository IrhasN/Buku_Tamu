<!DOCTYPE html>
<html><head>

    <title><?= $title; ?></title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: left;
        }

        img {
            width: 100%;
            height: auto;
        }
    </style>

</head><body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"></h1>
            <img src="<?= base_url('assets/img/kop_laporan.jpg') ?>" alt="Logo Laporan">

            <h4><?= $title; ?> Digital Kanwil Kemenag Sulut</h4>

            <table style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi/Organisasi/Masyarakat</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Tanggal</th>
                    <th>Pelayanan</th>

                </tr>
                <?php $i = 1; ?>
                <?php foreach ($laporan as $lp) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $lp['nama']; ?></td>
                        <td><?= $lp['satker']; ?></td>
                        <td><?= $lp['tujuan']; ?></td>
                        <td><?= $lp['keperluan']; ?></td>
                        <td>
                            <?php
                            $date = date_create($lp['waktu']);
                            echo date_format($date, "d/m/Y - H:i:s");
                            ?>
                        </td>
                        <td><?= $lp['pelayanan']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php $i++; ?>
            </table><br>

        </body></html>
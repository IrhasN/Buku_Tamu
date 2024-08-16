<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan Pelayanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        .tanda-tangan {
            margin-top: 40px;
            text-align: left;
        }

        .tanda-tangan p {
            margin-top: 60px;
            display: inline-block;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>

<body>

    <div class="kop-surat">
        <h1>KOP SURAT</h1>
        <h2>LAPORAN KEGIATAN PELAYANAN</h2>
    </div>

    <h3>Judul Laporan: <?= $title; ?></h3>
    <h4>Subjudul: <?= $subtitle; ?></h4>

    <table>
        <tr>
            <td>Nama:</td>
            <td><?= $df['nama']; ?></td>
        </tr>
        <tr>
            <td>Instansi/Organisasi/Masyarakat:</td>
            <td><?= $df['satker']; ?></td>
        </tr>
        <tr>
            <td>Tujuan:</td>
            <td><?= $df['tujuan']; ?></td>
        </tr>
        <tr>
            <td>Keperluan:</td>
            <td><?= $df['keperluan']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Tiba:</td>
            <td><?= date_format(date_create($df['waktu']), "d/m/Y - H:i:s"); ?></td>
        </tr>
        <tr>
            <td>Pelayanan:</td>
            <td><?= $df['pelayanan']; ?></td>
        </tr>
        <tr>
            <td>Log User:</td>
            <td><?= $df['log_user']; ?></td>
        </tr>
    </table>

    <div class="tanda-tangan">
        <p>_________________________</p>
        <p>Nama Pengguna</p>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - sisKaryawan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
        }

        .table th,
        .table td {
            padding: 0.2rem;
            vertical-align: top;
        }
        .table-bordered {
            border: 1px solid black;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid black;
        }

        .text-center {
            text-align: center;
        }

        .mt-n-2 {
            margin-top: -20px;
        }

        .mt-n-3 {
            margin-top: -30px;
        }

        .mb-n-1 {
            margin-bottom: -10px;
        }

        .mb-n-2 {
            margin-bottom: -20px;
        }

    </style>
</head>
<body>
    <div class="container" id="laporan">
        <h1 class="text-center mb-n-2 mt-n-3">Laporan Karyawan Terbaik</h1>
        <h2 class="text-center mb-n-1">Museum Batik Pekalongan</h2>
        <p class="text-center">Jl. Jatayu No.3, Panjang Wetan, Pekalongan Utara, Kota Pekalongan, Jawa Tengah</p>
        <hr>
        <h3 class="text-center">Periode :
            <?= date_format(date_create($header['periode_awal']), "d-m-Y") ?> s/d 
            <?= date_format(date_create($header['periode_akhir']), "d-m-Y") ?>
        </h3>
        <table class="table table-bordered">
            <tr>
                <td width="5%">Ranking</td>
                <td>Nama</td>
                <td>Hasil Akhir</td>
            </tr>
            <?php foreach($detail as $data) : ?>
            <tr>
                <td><?= $data['ranking']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['hasil_akhir']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
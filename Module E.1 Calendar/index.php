<?php

$TahunSekarang = date('Y');
$BulanSekarang = date('n');
$TanggalSekarang = date('j');
$tahun = isset($_GET["tahun"]) ? $_GET["tahun"] : date("Y");
$bulan = isset($_GET["bulan"]) ? $_GET["bulan"] : date("m");
$bulanSaatIni = date("F Y", strtotime("$tahun-$bulan-1"));
$HariPertamaBulan = mktime(0, 0, 0, $bulan, 1, $tahun);
$data_hari = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
$jumlah_hari = date('t', $HariPertamaBulan);
$hari_awal = date('w', $HariPertamaBulan);
$totalRows = 7 * ceil(($hari_awal + $jumlah_hari) / 7);



$bl_next =  $bulan == 12 ? 1 : $bulan + 1;
$bl_prev = $bulan == 1 ? 12 : $bulan - 1;

$th_next = $bulan == 12 ? $tahun + 1 : $tahun;
$th_prev = $bulan == 1 ? $tahun - 1 : $tahun;

$next = "index.php?bulan=$bl_next&tahun=$th_next";
$prev = "index.php?bulan=$bl_prev&tahun=$th_prev";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-flex">
                        <a href="<?= $prev ?>">
                            <button class="btn btn-primary">Back</button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <h1><?= $bulanSaatIni ?></h1>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <a href="<?= $next ?>">
                            <button class="btn btn-primary">Next</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <?php foreach ($data_hari as $value) : ?>
                                <th scope="col"><?= $value ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($dy = 0; $dy < $totalRows; $dy++) : ?>
                            <?php if ($dy % 7 === 0) : ?>
                                <tr>
                                <?php endif; ?>

                                <?php if ($dy < $hari_awal || $dy >= ($hari_awal + $jumlah_hari)) : ?>
                                    <td>&nbsp;</td>
                                <?php else : ?>
                                    <?php
                                    $tanggalan = $dy - $hari_awal + 1;
                                    $cek = ($tahun == $TahunSekarang && $bulan == $BulanSekarang && $tanggalan == $TanggalSekarang);
                                    $style = !$cek ? '' : 'bg-primary text-white';
                                    ?>


                                    <td class="<?= $style ?>"><?= $tanggalan ?></td>

                                <?php endif; ?>




                                <?php if ($dy % 7 === 6) : ?>
                                </tr>
                            <?php endif; ?>





                        <?php endfor; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
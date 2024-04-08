<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    img {
        max-width: 100%;
        height: 20%;
        width: 30%;
        float: left;
        margin: 20px 0;
        margin-top: 10px;
        /* Atur margin atas dan bawah */
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .left-column {
        flex: 1;
    }

    .right-column {
        flex: 1;
    }

    .details {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* margin-bottom: 20px; */
    }

    table,
    th,
    td {
        font-size: 11px;
        /* border: 1px solid black; */
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    tbody td {
        vertical-align: top;
    }

    .payment {
        margin-top: 20px;
    }

    .footer {
        margin-top: 20px;
    }
    </style>
    <title>Invoice Client</title>
</head>

<body>
    <div class="container">
        <table border="0">
            <thead>
                <tr>
                    <th style="width: 50px;">
                        <img src="<?= base_url() ?>/public/assets/images/logo.png" alt="logo"
                            style="width: 100px;height:auto;">
                    </th>
                    <th style="text-align: center;">
                        <h4><?= $judul ?></h4>
                        <h5><?= $judul1 ?></h5>
                        <h6>Cabang : Kota Pekanbaru</h6>
                    </th>
                    <th style="width: 100px;">

                    </th>
                </tr>
            </thead>
        </table>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>
                        <p style="font-size: 10px;">
                            Print Date : <?= tgl_indo(date('Y-m-d'), 'full') ?>
                        </p>
                    </th>
                    <th>
                        <p style="font-size: 10px;">
                            Area : <?= $info['nama_area'] ?>
                        </p>
                    </th>
                    <th>
                        <p style="font-size: 10px;">
                            Dicetak Oleh :<?= SESSION('userData')['nama_user'] ?>
                        </p>
                    </th>
                    <th>
                        <p style="font-size: 10px;">
                            Salesman :
                            <?= $info['nama_lengkap'] ?>
                        </p>
                    </th>

                </tr>
            </thead>
        </table>
        <table border="1">
            <thead>
                <tr style="font-size:11px ;">
                    <th>No.</th>
                    <th>No Nota</th>
                    <th>Tgl Nota</th>
                    <th>Konsumen</th>
                    <th>Tagihan</th>
                    <th>Telp/HP</th>
                    <th>Cicilan</th>
                    <th>Sisa Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($model as $value) {
                    $total += $value['total_beli'];
                    $sisa = $value['total_beli'] - $value['pay'];
                ?>
                <tr style="font-size:11px ;">
                    <td><?= $no ?> </td>
                    <td><?= $value['no_nota'] ?> </td>
                    <td><?= tgl_indo($value['tgl_bayar'], 'normal') ?> </td>
                    <td><?= $value['nama_customer'] ?> </td>
                    <td><?= 'Rp. ' . number_format($value['total_beli'], 0, ',', '.') ?></td>
                    <td><?= $value['no_hp_customer'] ?> </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="4" align="left"><b>Total Tagihan Piutang Usaha </b></td>
                    <td colspan="2" align="left">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <br><br>
        <table border="0">
            <thead>
                <tr>
                    <th>
                        <p style="font-size: 15px;">
                            Salesman: <br><br><br><br>
                            ( <?= $info['nama_lengkap'] ?> )
                        </p>
                    </th>

                    <th style="font-size: 15px;margin-left:300px;text-align:right">
                        <p>
                            Admin Penjualan: <br><br><br><br>
                            ( <?= SESSION('userData')['nama_user'] ?> )
                        </p>
                    </th>

                </tr>
            </thead>
        </table>

    </div>
</body>



<?php
function tgl_indo($tanggal, $mode)
{
    $hari = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );

    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    // $pecahkan = explode('-', $tanggal);
    // $nama_hari = date('w', strtotime($tanggal));
    // $nama_hari = $hari[$nama_hari];
    // return $nama_hari . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

    $pecahkan = explode(' ', $tanggal);
    $tanggal = $pecahkan[0];
    $waktu = isset($pecahkan[1]) ? $pecahkan[1] : null;

    $pecahkanTanggal = explode('-', $tanggal);
    $nama_hari = date('w', strtotime($tanggal));
    $nama_hari = $hari[$nama_hari];

    if($mode=='full'){
        $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int)$pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];
    }else{
        $result = $pecahkanTanggal[2] . '-' . $pecahkanTanggal[1] . '-' . $pecahkanTanggal[0];
    }

    if ($waktu !== null) {
        $result .= ' ' . $waktu;
    }

    return $result;
}
?>

</html>
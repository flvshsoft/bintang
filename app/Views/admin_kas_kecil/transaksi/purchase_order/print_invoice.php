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
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
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
        <div class="header">
            <h2><?= $judul ?></h2>
            <p><b><?= $judul1 ?></b></p>
        </div>
        <div class="flex-container">
            <div class="left-column">
                <p><b>Dengan Hormat</b></p>
                <p><?= $nota['nama_customer'] ?></p>
                <p>di - <?= $nota['alamat_customer'] ?></p>
            </div>
            <div class="right-column">
                <p><b>Details</b></p>
                <p>Customer ID: <?= $nota['id_customer'] ?></p>
                <p>Invoice Date: <?= tgl_indo($nota['tgl_bayar']) ?></p>
                <p>Invoice No: <?= $nota['id_nota'] ?></p>
            </div>
        </div><br>
        <table>
            <thead>
                <tr style="font-size: 11px;">
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Satuan</th>
                    <th rowspan="2">Jumlah</th>
                    <th rowspan="2">Harga</th>
                    <th rowspan="2">Subtotal</th>
                    <th rowspan="2">Diskon</th>
                    <th rowspan="2">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($model as $value) {
                    $harga_awal =  $value['harga'] * $value['satuan_penjualan'];
                    $harga_akhir =  $value['harga'] * $value['satuan_penjualan'] - $value['diskon_penjualan'];
                    $total += $harga_akhir;
                ?>
                <tr style=" font-size: 11px;">
                    <td><?= $no ?> </td>
                    <td><?= $value['nama_product'] ?> </td>
                    <td><?= $value['satuan_product'] ?> </td>
                    <td><?= $value['satuan_penjualan'] ?> </td>
                    <td><?= $value['harga'] ?> </td>
                    <td><?= 'Rp. ' . number_format($harga_awal, 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['diskon_penjualan'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style=" font-size: 11px;">
                    <td colspan="3" align="right"><b>Grandtotal</b></td>
                    <td>2,057</td>
                    <td colspan="2" align="left">23,720,500</td>
                    <td>0</td>
                    <td>23,720,500</td>
                </tr>
            </tfoot>
        </table>

        <div class="flex-container">
            <div class="left-column">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
            </div>
            <div class="right-column">
                <p>
                <h5><b>Payment Method : <?= $nota['payment_method'] ?> </b></h5>
                </p>
                <p>
                <h5><b>Type Paymeny : <?= $nota['nama_bank'] ?></b></h5>
                </p>
                <p>
                <h5><b>Payment :</b></h5>
                </p>
            </div>
        </div>

        <div class="footer" style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="text-align: left;">
                <p>
                    Salesman: <br><br><br><br>
                    (Muhammad)
                </p>
            </div>
            <div style="text-align: right;">
                <p>
                    Toko / Pembeli: <br><br><br><br>
                    (__________)
                </p>
            </div>
        </div>
        <div class="footer">
            <h6>Catatan :</h6>
            <h6>
                <ol>
                    <li>Mintalah bukti invoice dari sales kami </li>
                    <li>Invoice ini sebagai bukti transaksi yang sah </li>
                </ol>
            </h6>
        </div>

    </div>
</body>

<script>
window.print();
</script>

<?php
function tgl_indo($tanggal)
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

    $pecahkan = explode('-', $tanggal);
    $nama_hari = date('w', strtotime($tanggal));
    $nama_hari = $hari[$nama_hari];
    return $nama_hari . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

</html>
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
    <title>LAPORAN CLOSING</title>
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
                        <h6>Cabang : <?= Session('userData')['cabang'] ?></h6>
                    </th>
                    <th style="width: 100px;">

                    </th>
                </tr>
            </thead>
        </table>
        <hr>
        <!-- Start Nota Putih -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Nota Putih</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Salesman</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($salesData as $salesman => $total_kontan) {
                    $total += $total_kontan;
                ?>
                <tr style="font-size:11px;">
                    <td width="20px"><?= $no ?> </td>
                    <td><?= $salesman ?> </td>
                    <td><?= 'Rp. ' . number_format($total_kontan, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total Nota Putih </b></td>
                    <td colspan="1" align="left">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Deviasi 10% </b></td>
                    <td colspan="1" align="left">
                        <?= 'Rp. ' . number_format($total / 10, 0, ',', '.') ?>
                    </td>
                </tr>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Total Bersih Nota Putih </b></td>
                    <td colspan="1" align="left">
                        <?= 'Rp. ' . number_format($total + ($total / 10), 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Nota Putih -->
        <br><br>
        <!-- Start Total Kontan & Nota Tertagih -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="5" style="text-align:center;">Total Kontan & Nota Tertagih</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Salesman</th>
                    <th style="text-align:center;">Total Kontan</th>
                    <th style="text-align:center;">Total tertagih</th>
                    <th style="text-align:center;">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $saldo_kontan = 0;
                $saldo_tertagih = 0;
                $saldo = 0;
                foreach ($kontan_nota as $value) {
                    $saldo_masing = ($value['total_kontan'] + $value['total_tertagih']);
                    $saldo_kontan += $value['total_kontan'];
                    $saldo_tertagih +=  $value['total_tertagih'];
                    $saldo += $saldo_masing;
                ?>
                <tr style=" font-size:11px ;">
                    <td width="20px"><?= $no ?> </td>
                    <td><?= $value['nama_lengkap'] ?> </td>
                    <td><?= 'Rp. ' . number_format($value['total_kontan'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['total_tertagih'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($saldo_masing, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                }
                ?>
            </tbody>
            <tr style="font-size:11px ;">
                <td colspan="2" align="left"><b>Grand Total dan Nota Tertagih </b></td>
                <td colspan="1" align="left">
                    <?= 'Rp. ' . number_format($saldo_kontan, 0, ',', '.') ?>
                </td>
                <td colspan="1" align="left">
                    <?= 'Rp. ' . number_format($saldo_tertagih, 0, ',', '.') ?>
                </td>
                <td colspan="1" align="left">
                    <?= 'Rp. ' . number_format($saldo, 0, ',', '.') ?>
                </td>
            </tr>
        </table>
        <!-- End Total Kontan & Nota Tertagih -->
        <br><br>
        <!-- Start Piutang Internal -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Piutang Internal</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Cabang</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                $total += $jumlah_piutang_;
                foreach ($piutang_internal as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td> <?= $value['nama_branch'] ?> </td>
                    <td><?= 'Rp. ' . number_format($jumlah_piutang_, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total Piutang Internal </b></td>
                    <td colspan="1" align="left">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Piutang Internal -->
        <br><br>
        <!-- Start Piutang Karyawan -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Piutang Karyawan</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($piutang_karyawan as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td> <?= $value['nama_penghutang'] ?> </td>
                    <td><?= 'Rp. ' . number_format($value['total_piutang_karyawan'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total Piutang Karyawan </b></td>
                    <td colspan="1" align="left">
                        <?= 'Rp. ' . number_format($jumlah_piutang_karyawan, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Piutang Karyawan -->
        <br><br>
        <!-- Start Hutang Usaha -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Hutang Usaha</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Supplier</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                $total += $jumlah_piutang_usaha;
                foreach ($hutang_usaha as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td><?= $value['nama_supplier'] ?> </td>
                    <td><?= 'Rp. ' . number_format($value['total_piutang_supplier'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total Hutang Pabrik </b></td>
                    <td colspan="1" align="left">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Hutang Usaha-->
        <br><br>
        <!-- Start Stok Gudang -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="7" style="text-align:center;">Stok Gudang</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Nama Barang</th>
                    <th style="text-align:center;">Gudang</th>
                    <th style="text-align:center;">Jumlah</th>
                    <th style="text-align:center;">Total Modal</th>
                    <th style="text-align:center;">Harga Jual</th>
                    <th style="text-align:center;">Total Jual</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_jual = 0;
                $total_modal = 0;
                $total_harga_jual = 0;
                $total = 0;
                foreach ($stock_product as $value) {
                    $total_jual += $value['jumlah_penjualan_product'];
                    $total_modal += $value['modal'];
                    $total_harga_jual += $value['harga_jual'];
                    $total += $value['total_jual'];
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td> <?= $value['nama_product'] ?> </td>
                    <td> <?= number_format($value['jumlah_stock_product'], 0, ',', '.') ?> </td>
                    <td> <?= number_format($value['jumlah_penjualan_product'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['modal'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['harga_jual'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['total_jual'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="3" align="left"><b>Grand Total Persediaan Barang </b></td>

                    <td colspan="1" align="center">
                        <?= number_format($total_jual, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_modal, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Stok Gudang-->
        <br><br>
        <!-- Start Penjualan -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="8" style="text-align:center;">Penjualan Salesman</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Nama Barang</th>
                    <th style="text-align:center;">Satuan</th>
                    <th style="text-align:center;">Jumlah</th>
                    <th style="text-align:center;">Kredit</th>
                    <th style="text-align:center;">Jumlah</th>
                    <th style="text-align:center;">Kontan</th>
                    <th style="text-align:center;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $value_kredit = 0;
                $value_kontan = 0;
                $all_kredit = 0;
                $all_kontan = 0;
                $all_in = 0;
                foreach ($penjualan_salesman as $value) {
                    $value_kredit += $value['jumlah_kredit'];
                    $value_kontan += $value['jumlah_cash'];
                    $all_kredit += $value['total_kredit'];
                    $all_kontan += $value['total_cash'];
                    $all_in += $value['total_cash_kredit'];
                ?>
                <tr style=" font-size:11px ;">
                    <td align="center" width="20px"><?= $no ?> </td>
                    <td align="center"><?= $value['nama_product'] ?> </td>
                    <td align="center"><?= $value['satuan_product'] ?></td>
                    <td align="center"><?= $value['jumlah_kredit'] ?></td>
                    <td align="center"><?= 'Rp. ' . number_format($value['total_kredit'], 0, ',', '.') ?></td>
                    <td align="center"><?= $value['jumlah_cash'] ?></td>
                    <td align="center"><?= 'Rp. ' . number_format($value['total_cash'], 0, ',', '.') ?></td>
                    <td align="center"><?= 'Rp. ' . number_format($value['total_cash_kredit'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="3" align="center"><b>Grand Total Omset </b></td>
                    <td colspan="1" align="center">
                        <?= number_format($value_kredit, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($all_kredit, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= number_format($value_kontan, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($all_kontan, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($all_in, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Penjualan-->
        <br><br>
        <!-- Start Penjualan Salesman -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="5" style="text-align:center;">Penjualan</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Nama Barang</th>
                    <th style="text-align:center;">Satuan</th>
                    <th style="text-align:center;">Jumlah</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_jual = 0;
                $total_modal = 0;
                $total_harga_jual = 0;
                $total = 0;
                foreach ($stock_product as $value) {
                    $total_jual += $value['jumlah_penjualan_product'];
                    $total_modal += $value['modal'];
                    $total_harga_jual += $value['harga_jual'];
                    $total += $value['total_jual'];
                ?>
                <tr style=" font-size:11px ;">
                    <td align="center" width="20px"><?= $no ?> </td>
                    <td align="center"><?= $value['nama_product'] ?> </td>
                    <td align="center"><?= $value['satuan_product'] ?></td>
                    <td align="center"><?= $value['jumlah_penjualan_product'] ?></td>
                    <td align="center"><?= 'Rp. ' . number_format($value['total_jual'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="3" align="center"><b>Grand Total Omset </b></td>
                    <td colspan="1" align="center">
                        <?= number_format($total_jual, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Penjualan Salesman-->
        <br><br>
        <!-- Start Pengeluaran Kantor & BOP -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Pengeluaran Kantor & BOP</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Keterangan</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_kantor = 0;
                foreach ($pengeluaran_bop as $value) {
                    $total_kantor += $value['total_pengeluaran_kantor'];
                ?>
                <tr style=" font-size:11px ;">
                    <td align="center" width="20px"><?= $no ?> </td>
                    <td align="center"> <?= $value['remark'] ?> </td>
                    <td align="center"><?= 'Rp. ' . number_format($value['total_pengeluaran_kantor'], 0, ',', '.') ?>
                    </td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="center"><b>Grand Pengeluaran </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_kantor, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Pengeluaran Kantor & BOP-->
        <br><br>
        <!-- Start Mutaso HO BOP -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Mutasi HO BOP</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Remark</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($ho_bop as $value) {
                ?>
                <tr style=" font-size:11px ;">
                    <td width="20px"><?= $no ?> </td>
                    <td align="center"> <?= $value['keterangan'] ?> </td>
                    <td align="center">
                        <?= 'Rp. ' . number_format($value['saldo'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_ho_bop, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <br><br>
        <!-- End Mutasi HO BOP -->

        <!-- Start Mutaso HO DEVIDEN -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Mutasi HO DEVIDEN</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Remark</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($ho_deviden as $value) {
                ?>
                <tr style=" font-size:11px ;">
                    <td width="20px"><?= $no ?> </td>
                    <td align="center"> <?= $value['keterangan'] ?> </td>
                    <td align="center">
                        <?= 'Rp. ' . number_format($value['saldo'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_ho_deviden, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <br><br>
        <!-- End Mutasi HO DEVIDEN -->

        <!-- Start Mutaso KAS PENGEMBANGAN -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Mutasi Kas Pengembangan</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Remark</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($kas_pengembangan as $value) {
                ?>
                <tr style=" font-size:11px ;">
                    <td width="20px"><?= $no ?> </td>
                    <td align="center"> <?= $value['keterangan'] ?> </td>
                    <td align="center">
                        <?= 'Rp. ' . number_format($value['saldo'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="left"><b>Grand Total </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_kas_pengembangan, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <br><br>
        <!-- End Mutasi KAS PENGEMBANGAN -->

        <!-- Start Penjualan Bruto & Cost Ratio -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Penjualan Bruto & Cost Ratio</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Penjualan Bruto</th>
                    <th style="text-align:center;">Cost Ratio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($nota_putih as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td><?= 'Rp. ' . number_format(0, 0, ',', '.') ?></td>
                    <td>
                    </td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <!-- End Penjualan Bruto & Cost Ratio-->
        <br><br>
        <!-- Start Report -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="2" style="text-align:center;">Report Summary</th>
                    <th colspan="2" style="text-align:center;">Before Deviasi</th>
                    <th colspan="2" style="text-align:center;">After Deviasi</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Keterangan</th>
                    <th style="text-align:center;">Modal</th>
                    <th style="text-align:center;">Jual</th>
                    <th style="text-align:center;">Modal</th>
                    <th style="text-align:center;">Jual</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_bdm = 0;
                $total_adm = 0;
                $total_bdj = 0;
                $total_adj = 0;
                foreach ($summary_deviasi as $value) {
                    $total_bdm += $value['before_deviasi_modal'];
                    $total_adm += $value['after_deviasi_modal'];
                    $total_bdj += $value['before_deviasi_jual'];
                    $total_adj += $value['after_deviasi_jual'];
                ?>
                <tr style=" font-size:11px ;">
                    <td width="20px"><?= $no ?> </td>
                    <td> <?= $value['keterangan'] ?> </td>
                    <td><?= 'Rp. ' . number_format($value['before_deviasi_modal'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['after_deviasi_modal'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['before_deviasi_jual'], 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format($value['after_deviasi_jual'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>

            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="center"><b>Grand Pengeluaran </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_bdm, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_adm, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_bdj, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total_adj, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Report-->
        <br><br>
        <!-- Start Neraca Saldo -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Neraca Saldo</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Nama Bank</th>
                    <th style="text-align:center;">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($bank as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td>
                        <?= $value['nama_bank'] ?>
                    </td>
                    <td><?= 'Rp. ' . number_format($value['saldo'], 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <!-- End Neraca Saldo-->
        <br><br>
        <!-- Start Report Penjualan -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="6" style="text-align:center;">Report Penjualan</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Nama Bank</th>
                    <th style="text-align:center;">Jumlah</th>
                    <th style="text-align:center;">Nilai Penjualan</th>
                    <th style="text-align:center;">Nilai Modal</th>
                    <th style="text-align:center;">Laba Kotor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($nota_putih as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td><?= 'Rp. ' . number_format(0, 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format(0, 0, ',', '.') ?></td>
                    <td><?= 'Rp. ' . number_format(0, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="center"><b>Grand Total Penjualan </b></td>
                    <td colspan="1" align="center">
                        0
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Report Penjualan-->
        <br><br>
        <!-- Start Report Beban Biaya -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Report Beban Biaya</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Keterangan</th>
                    <th style="text-align:center;"> Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($nota_putih as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td></td>
                    <td><?= 'Rp. ' . number_format(0, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="center"><b>Grand Total Beban Biaya </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Report Beban Biaya-->
        <br><br>
        <!-- Start Report Laba / Rugi -->
        <table border="1">
            <thead>
                <tr style="font-size:11px;">
                    <th colspan="3" style="text-align:center;">Report Laba / Rugi</th>
                </tr>
                <tr style="font-size:11px;">
                    <th style="text-align:center;">No.</th>
                    <th style="text-align:center;">Keterangan</th>
                    <th style="text-align:center;"> Summary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($nota_putih as $value) {
                ?>
                <tr style=" font-size:11px ;">

                    <td width="20px"><?= $no ?> </td>
                    <td></td>
                    <td><?= 'Rp. ' . number_format(0, 0, ',', '.') ?></td>
                </tr>
                <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <tr style="font-size:11px ;">
                    <td colspan="2" align="center"><b>Grand Total Laba / Rugi </b></td>
                    <td colspan="1" align="center">
                        <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- End Report Laba / Rugi-->
        <br><br>
    </div>
</body>


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

    $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int) $pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];

    if ($waktu !== null) {
        $result .= ' ' . $waktu;
    }

    return $result;
}
?>

</html>
<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <form action="<?= base_url('/akk/laporan/closing-mingguan-save') ?>" method="POST">
            <div class="page-header">
                <h3 class="page-title">
                    <?= $judul ?>
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('/akk/laporan/form_closing') ?>"> Laporan
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- tabel Nota Putih -->
                            <p class="card-description"> Nota Putih
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                    <thead class="table table-success">
                                        <tr>
                                            <th style=" font-size: 11px;"> NO </th>
                                            <th style=" font-size: 11px;"> NO TAGIHAN </th>
                                            <th style=" font-size: 11px;"> SALESMAN </th>
                                            <th style=" font-size: 11px;"> CUSTOMER </th>
                                            <th style=" font-size: 11px;"> KREDIT </th>
                                            <th style=" font-size: 11px;"> CASH </th>
                                            <!-- <th style=" font-size: 11px;"> SUB TOTAL</th> -->
                                            <th style=" font-size: 11px;"> STATUS</th>
                                            <th style=" font-size: 11px;"> #</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sub_total = 0;
                                        $nota_tertagih = 0;
                                        foreach ($nota_putih as $key => $value) {
                                            $kredit = 0;
                                            $cash = 0;
                                            if ($value['payment_method'] == 'CASH') {
                                                $cash = $value['pay'];
                                            } else {
                                                $kredit = $value['total_beli'] - $value['pay'];
                                                $nota_tertagih = $value['pay'];
                                            }
                                            $sub_total += $cash + $kredit;
                                        ?>
                                            <tr>
                                                <td style=" font-size: 11px;"><?= $key + 1 ?></td>
                                                <td style=" font-size: 11px;"><?= $value['no_nota'] ?></td>
                                                <td style=" font-size: 11px;"><?= $value['nama_lengkap'] ?></td>
                                                <td style=" font-size: 11px;"><?= $value['nama_customer'] ?></td>
                                                <td style=" font-size: 11px;"><?= number_format($kredit) ?></td>
                                                <td style=" font-size: 11px;"><?= number_format($cash) ?></td>
                                                <!-- <td style=" font-size: 11px;"><? //= number_format($sub_total) 
                                                                                    ?></td> -->
                                                <td style=" font-size: 11px;">
                                                    <?= $value['status_closing'] == '1' ? 'Closing' : '-' ?></td>
                                                <td style=" font-size: 11px;"> </a>
                                                    <a class="btn btn-success btn-xs" href="<?= base_url('/akk/transaksi/tagihan_baru/nota/' . $value['id_sales'] . '/' . $value['payment_method']) ?>">
                                                        <i class="mdi mdi-database-plus icon-sm"></i>
                                                    </a>
                                                </td>
                                                <input type="hidden" name="cash" class="form-control" value="<?= $cash ?>">
                                                <input type="hidden" name="kredit" class="form-control" value="<?= $kredit ?>">
                                            </tr>
                                        <?php }; ?>
                                    </tbody>
                                    <input type="hidden" name="week" class="form-control" value="<?= $week ?>">
                                    <input type="hidden" name="year" class="form-control" value="<?= $year ?>">
                                </table>
                            </div><br>
                            <p class="card-description"> Nota Kontan
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                    <thead class="table table-success">
                                        <tr>
                                            <th style=" font-size: 11px;"> NO </th>
                                            <th style=" font-size: 11px;"> Salesman </th>
                                            <th style=" font-size: 11px;"> BIAYA </th>
                                            <th style=" font-size: 11px;"> HARI KERJA </th>
                                            <th style=" font-size: 11px;"> TOTAL KONTAN </th>
                                            <th style=" font-size: 11px;"> NOTA TERTAGIH </th>
                                            <th style=" font-size: 11px;"> SALDO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $grand_total_kontan = 0;
                                        $grand_total_tertagih = 0;
                                        $total_kontan_per_salesman = [];
                                        $total_tertagih_per_salesman = [];
                                        $grand_saldo = 0;
                                        foreach ($kontan_nota as $value) {
                                            $salesman = $value['nama_lengkap'];
                                            if ($value['payment_method'] == 'CASH') {
                                                if (!isset($total_kontan_per_salesman[$salesman])) {
                                                    $total_kontan_per_salesman[$salesman] = 0;
                                                }
                                                $total_kontan_per_salesman[$salesman] += $value['pay'];
                                            } else if ($value['payment_method'] == 'KREDIT') {
                                                if (!isset($total_tertagih_per_salesman[$salesman])) {
                                                    $total_tertagih_per_salesman[$salesman] = 0;
                                                }
                                                // $total_tertagih_per_salesman[$salesman] += ($value['total_beli'] - $value['pay']);
                                                $total_tertagih_per_salesman[$salesman] +=  $value['pay'];
                                            }
                                        }

                                        $no = 1;
                                        foreach ($total_kontan_per_salesman as $salesman => $total_kontan) {
                                            $total_tertagih = isset($total_tertagih_per_salesman[$salesman]) ? $total_tertagih_per_salesman[$salesman] : 0;

                                            $grand_total_kontan += $total_kontan;
                                            $grand_total_tertagih += $total_tertagih;
                                            $saldo =  $grand_total_kontan + $grand_total_tertagih;
                                            $grand_saldo += $grand_total_kontan + $grand_total_tertagih;
                                        ?>
                                            <tr style=" font-size:11px ;">
                                                <td width="20px"><?= $no ?> </td>
                                                <td><?= $salesman ?> </td>
                                                <td>0</td>
                                                <td>5</td>
                                                <td><?= 'Rp. ' . number_format($total_kontan, 0, ',', '.') ?></td>
                                                <td><?= 'Rp. ' . number_format($total_tertagih, 0, ',', '.') ?></td>
                                                <td><?= 'Rp. ' . number_format($saldo, 0, ',', '.') ?></td>
                                            </tr>
                                        <?php $no++;
                                        }
                                        ?>
                                    </tbody>
                                    <tr style="font-size:11px ;">
                                        <td colspan="4" align="left"><b>Grand Total dan Nota Tertagih </b></td>
                                        <td colspan="1" align="left">
                                            <?= 'Rp. ' . number_format($grand_total_kontan, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="left">
                                            <?= 'Rp. ' . number_format($grand_total_tertagih, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="left">
                                            <?= 'Rp. ' . number_format($grand_saldo, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <tr style="font-size:11px ;">
                                        <td colspan="4" align="left"><b>Deviasi 10 % </b></td>
                                        <td colspan="1" align="left">

                                        </td>
                                        <td colspan="1" align="left">

                                        </td>
                                        <td colspan="1" align="left">
                                            <?= 'Rp. ' . number_format($grand_saldo / 10, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <tr style="font-size:11px ;">
                                        <td colspan="4" align="left"><b> Total Bersih Nota </b></td>
                                        <td colspan="1" align="left">

                                        </td>
                                        <td colspan="1" align="left">

                                        </td>
                                        <td colspan="1" align="left">
                                            <?= 'Rp. ' . number_format($grand_saldo - ($grand_saldo / 10), 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </table>
                            </div><br>

                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> All Piutang
                            </p>
                            <!-- Start Piutang Internal -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead thead class="table table-success">
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
                                    $total += $jumlah_piutang_internal;
                                    foreach ($piutang_internal as $value) {
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['cabang'] ?> </td>
                                            <td align="center">
                                                <?= 'Rp. ' . number_format($jumlah_piutang_internal, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Total Piutang Internal </b></td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Piutang Internal -->
                            <br><br>
                            <!-- Start Piutang Karyawan -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead thead class="table table-success">
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
                                            <td><?= 'Rp. ' . number_format($value['jumlah_piutang'], 0, ',', '.') ?></td>
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
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
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

                                            <td align="center" width="20px"><?= $no ?> </td>
                                            <td align="center"><?= $value['nama_supplier'] ?> </td>
                                            <td align="center">
                                                <?= 'Rp. ' . number_format($value['jumlah_piutang'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2"><b>Grand Total Hutang Pabrik </b></td>
                                        <td colspan=" 1" align="center">
                                            <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Hutang Usaha-->
                            <br><br>
                            <input type="hidden" name="week" class="form-control" value="<?= $week ?>">
                            <input type="hidden" name="year" class="form-control" value="<?= $year ?>">
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> Stock Barang
                            </p>
                            <!-- Start Stok Gudang -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
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
                                    $total = 0;
                                    $total_jumlah = 0;
                                    $all_total_jual = 0;
                                    $total_modal = 0;
                                    $jumlah = 0;
                                    foreach ($product as $key => $value) {
                                        $id_product = $value['id_product'];
                                        $harga_aktif = $value['harga_aktif'];
                                        $harga_beli = $value['harga_beli'];
                                        $qty = $value['qty'];
                                        $modal = $qty * $harga_beli;
                                        $total_jumlah += $qty;
                                        $total_modal += $modal;
                                        $total_jual = $qty * $harga_aktif;
                                        $all_total_jual += $total_jual;
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td align="center" width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['nama_product'] ?> </td>
                                            <td align="center">
                                                <?= number_format($value['stock_product'], 0, ',', '.') ?>
                                            </td>
                                            <td align="center"><?= number_format($qty, 0, ',', '.') ?> </td>
                                            <td align="center"><?= 'Rp ' . number_format($modal, 0, ',', '.') ?></td>
                                            <td align="center"><?= 'Rp ' . number_format($harga_aktif, 0, ',', '.') ?>
                                            </td>
                                            <td align="center"><?= 'Rp ' . number_format($total_jual, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Total Persediaan Barang </b></td>
                                        <td colspan="1" align="center">

                                        </td>
                                        <td colspan="1" align="center">
                                            <?= number_format($total_jumlah, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total_modal, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="">

                                        </td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($all_total_jual, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table><br>
                            <!-- End Stok Gudang-->
                            <!-- Start Penjualan Stock -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr style="font-size:11px;">
                                        <th colspan="7" style="text-align:center;">Penjualan</th>
                                    </tr>
                                    <tr style="font-size:11px;">
                                        <th style="text-align:center;">No.</th>
                                        <th style="text-align:center;">Nama Barang</th>
                                        <th style="text-align:center;">Satuan</th>
                                        <th style="text-align:center;">Jumlah</th>
                                        <th style="text-align:center;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total = 0;
                                    $total_jumlah = 0;
                                    $all_total_jual = 0;
                                    $total_modal = 0;
                                    $jumlah = 0;
                                    foreach ($product as $key => $value) {
                                        $harga_aktif = $value['harga_aktif'];
                                        $harga_beli = $value['harga_beli'];
                                        $qty = $value['qty'];
                                        $modal = $qty * $harga_beli;
                                        $total_jumlah += $qty;
                                        $total_modal += $modal;
                                        $total_jual = $qty * $harga_aktif;
                                        $all_total_jual += $total_jual;
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td align="center" width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['nama_product'] ?> </td>
                                            <td align="center"> <?= $value['satuan_product'] ?>
                                            </td>
                                            <td align="center"><?= number_format($qty, 0, ',', '.') ?> </td>
                                            <td align="center"><?= 'Rp ' . number_format($total_jual, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Total Omset </b></td>
                                        <td colspan="1" align="center">

                                        </td>
                                        <td colspan="1" align="center">
                                            <?= number_format($total_jumlah, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($all_total_jual, 0, ',', '.') ?>
                                        </td>

                                    </tr>
                                </tfoot>
                            </table>
                            <!-- Enc Penjualan Stock -->
                            <!-- Start Penjualan Stock By Salesman -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
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
                                    $total_qty_kredit = 0;
                                    $total_qty_cash = 0;
                                    $total_kredit = 0;
                                    $total_cash = 0;
                                    $all_subtotal = 0;
                                    $jumlah = 0;
                                    foreach ($salesman_ as $key => $value) {
                                        $total_qty_kredit += $value['qty_kredit'];
                                        $total_qty_cash += $value['qty_cash'];
                                        $harga_kredit = $value['qty_kredit'] * $value['harga_aktif'];
                                        $harga_cash =  $value['qty_cash'] * $value['harga_aktif'];
                                        $subtotal_cash_kredit = $harga_cash + $harga_kredit;
                                        $total_kredit += $harga_kredit;
                                        $total_cash += $harga_cash;
                                        $all_subtotal += $subtotal_cash_kredit;
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td align="center" width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['nama_product'] ?> </td>
                                            <td align="center"> <?= $value['satuan_product'] ?>
                                            </td>
                                            <td align="center"><?= number_format($value['qty_kredit'], 0, ',', '.') ?>
                                            </td>
                                            <td align="center"><?= 'Rp ' . number_format($harga_kredit, 0, ',', '.') ?>
                                            <td align="center"><?= number_format($value['qty_cash'], 0, ',', '.') ?>
                                            <td align="center"><?= 'Rp ' . number_format($harga_cash, 0, ',', '.') ?>
                                            <td align="center">
                                                <?= 'Rp ' . number_format($subtotal_cash_kredit, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="3" align="left"><b>Grand Total Omset </b></td>
                                        <td colspan="1" align="center">
                                            <?= number_format($total_qty_kredit, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp ' . number_format($total_kredit, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="center">
                                            <?= number_format($total_qty_cash, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total_cash, 0, ',', '.') ?>
                                        </td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($all_subtotal, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- Enc Penjualan Stock By Salesman -->
                            <br><br>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> Pengeluaran Kantor dan Operasional
                            </p>
                            <!-- Start Pengeluaran Kantor -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr style="font-size:11px;">
                                        <th colspan="3" style="text-align:center;">Pengeluaran Kantor & BOP</th>
                                    </tr>
                                    <tr style="font-size:11px;">
                                        <th style="text-align:center;">No.</th>
                                        <th style="text-align:center;">Keterangan</th>
                                        <th style="text-align:center;">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style=" font-size:11px ;">
                                        <td align="center" width="20px">1 </td>
                                        <td align="center">Biaya Kantor</td>
                                        <td align="center">
                                            <?= 'Rp ' . number_format($biaya_pengeluaran_kantor, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <tr style=" font-size:11px ;">
                                        <td align="center" width="20px">2 </td>
                                        <td align="center">Biaya Operasional</td>
                                        <td align="center">
                                            <?= 'Rp ' . number_format($nominal, 0, ',', '.') ?>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Pengeluaran </b></td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total_bop, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table><br>
                            <!-- End Pengeluaran Kantor -->
                            <!-- Start Pengeluaran Kantor -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr style="font-size:11px;">
                                        <th colspan="3" style="text-align:center;">Penjualan Bruto dan Cost Ratio</th>
                                    </tr>
                                    <tr style="font-size:11px;">
                                        <th style="text-align:center;">No.</th>
                                        <th style="text-align:center;">Penjualan Bruto</th>
                                        <th style="text-align:center;">Cost Ratio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style=" font-size:11px ;">
                                        <td align="center" width="20px">1</td>
                                        <td align="center"> <?= 'Rp ' . number_format(0, 0, ',', '.') ?></td>
                                        <td align="center">
                                            0 %
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Pengeluaran </b></td>
                                        <td colspan="1" align="center">
                                            <? //= 'Rp. ' . number_format($total_bop, 0, ',', '.') 
                                            ?>
                                        </td>
                                    </tr>
                                </tfoot> -->
                            </table><br>
                            <!-- End Pengeluaran Kantor -->
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> Report Summary Deviasi
                            </p>
                            <!-- Start Report -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
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
                                    $total_piutang_internal = 0;
                                    $total_piutang_usaha = 0;
                                    $total_piutang_internal += $jumlah_piutang_internal;
                                    $total_piutang_usaha += $jumlah_piutang_usaha;
                                    $total_saldo_bank = 0;
                                    $total_saldo_bank += $saldo_bank;
                                    // foreach ($nota_putih as $value) {
                                    ?>
                                    <tr style=" font-size:11px ;">
                                        <td width="20px"><?= $no++ ?> </td>
                                        <td> Piutang Internal </td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_internal, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_internal, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_internal, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_internal, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr style=" font-size:11px ;">
                                        <td width="20px"><?= $no++ ?> </td>
                                        <td> Nota Putih </td>
                                        <td><?= 'Rp. ' . number_format($grand_saldo, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($grand_saldo, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($grand_saldo - ($grand_saldo / 10), 0, ',', '.') ?>
                                        </td>
                                        <td><?= 'Rp. ' . number_format($grand_saldo - ($grand_saldo / 10), 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <tr style=" font-size:11px ;">
                                        <td width="20px"><?= $no++ ?> </td>
                                        <td> Neraca </td>
                                        <td><?= 'Rp. ' . number_format($total_saldo_bank, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_saldo_bank, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_saldo_bank, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_saldo_bank, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr style=" font-size:11px ;">
                                        <td width="20px"><?= $no++ ?> </td>
                                        <td> Modal | Jual </td>
                                        <td><?= 'Rp. ' . number_format($total_modal, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($all_total_jual, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_modal, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($all_total_jual, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr style=" font-size:11px ;">
                                        <td width="20px"><?= $no++ ?> </td>
                                        <td> Hutang Usaha </td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_usaha, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_usaha, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_usaha, 0, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($total_piutang_usaha, 0, ',', '.') ?></td>
                                    </tr>
                                    <?php $no++;
                                    //} 
                                    ?>
                                </tbody>

                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="center"><b>Grand Pengeluaran </b></td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
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
                            <!-- End Report-->
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> All Neraca
                            </p>
                            <!-- Start Report -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr style="font-size:11px;">
                                        <th colspan="3" style="text-align:center;">Neraca </th>
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
                                    $total_neraca_saldo = 0;
                                    foreach ($bank as $value) {
                                        $total_neraca_saldo += $value['saldo'];
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['nama_bank'] ?> </td>
                                            <td align="center"><?= 'Rp. ' . number_format($value['saldo'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Total Neraca Saldo </b></td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total_neraca_saldo, 0, ',', '.') ?>
                                        </td>

                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Report-->
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> ALL Mutasi
                            </p>
                            <!-- Start Piutang Internal -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead thead class="table table-success">
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
                                    $total_bop = 0;
                                    $total_bop += $biaya_ho_bop;
                                    foreach ($ho_bop as $value) {
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['remark_mutasi_bank'] ?> </td>
                                            <td align="center">
                                                <?= 'Rp. ' . number_format($biaya_ho_bop, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Total </b></td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total_bop, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Piutang Internal -->
                            <br><br>
                            <!-- Start Piutang Karyawan -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead thead class="table table-success">
                                    <tr style="font-size:11px;">
                                        <th colspan="3" style="text-align:center;">Mutasi HO Deviden</th>
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
                                    $total_deviden = 0;
                                    foreach ($ho_deviden as $value) {
                                        $total_deviden += $biaya_ho_deviden;
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td width="20px"><?= $no ?> </td>
                                            <td align="center"> <?= $value['remark_mutasi_bank'] ?> </td>
                                            <td align="center"><?= 'Rp. ' . number_format($biaya_ho_deviden, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2" align="left"><b>Grand Total </b></td>
                                        <td colspan="1" align="center">
                                            <?= 'Rp. ' . number_format($total_deviden, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Piutang Karyawan -->
                            <br><br>
                            <!-- Start Hutang Usaha -->
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
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
                                    $total_kas_pengembangan = 0;
                                    $total_kas_pengembangan += $biaya_kas_pengembangan;
                                    foreach ($kas_pengembangan as $value) {
                                    ?>
                                        <tr style=" font-size:11px ;">
                                            <td align="center" width="20px"><?= $no ?> </td>
                                            <td align="center"><?= $value['remark_mutasi_bank'] ?> </td>
                                            <td align="center">
                                                <?= 'Rp. ' . number_format($biaya_kas_pengembangan, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr style="font-size:11px ;">
                                        <td colspan="2"><b>Grand Total </b></td>
                                        <td colspan=" 1" align="center">
                                            <?= 'Rp. ' . number_format($total_kas_pengembangan, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Hutang Usaha-->
                            <br><br>
                            <input type="hidden" name="week" class="form-control" value="<?= $week ?>">
                            <input type="hidden" name="year" class="form-control" value="<?= $year ?>">
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="col-md-6">
                <button type="submit" class="btn btn-gradient-warning btn-rounded btn-fw text-black">
                    Closing
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
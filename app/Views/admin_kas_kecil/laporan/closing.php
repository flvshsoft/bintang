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
                            <form action="<?= base_url('/akk/laporan/closing-mingguan-stock-save') ?>" method="POST">
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
                                            $harga_nota = $value['harga_nota'];
                                            $harga_beli = $value['harga_beli'];

                                            $jumlah += $value['satuan_penjualan'];
                                            $modal = $jumlah * $harga_beli;
                                            $total_jumlah += $jumlah;
                                            $total_modal += $modal;
                                            $total_jual = $jumlah * $harga_nota;
                                            $all_total_jual += $total_jual;
                                        ?>
                                            <tr style=" font-size:11px ;">
                                                <td align="center" width="20px"><?= $no ?> </td>
                                                <td align="center"> <?= $value['nama_product'] ?> </td>
                                                <td align="center">
                                                    <?= number_format($value['stock_product'], 0, ',', '.') ?>
                                                </td>
                                                <td align="center"><?= number_format($jumlah, 0, ',', '.') ?> </td>
                                                <td align="center"><?= 'Rp ' . number_format($modal, 0, ',', '.') ?></td>
                                                <td align="center"><?= 'Rp ' . number_format($harga_nota, 0, ',', '.') ?>
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
                                            $id_product = $value['id_product'];
                                            $harga_nota = $value['harga_nota'];
                                            $harga_beli = $value['harga_beli'];
                                            $jumlah += $value['satuan_penjualan'];
                                            $modal = $jumlah * $harga_beli;
                                            $total_jumlah += $jumlah;
                                            $total_modal += $modal;
                                            $total_jual = $jumlah * $harga_nota;
                                            $all_total_jual += $total_jual;
                                        ?>
                                            <tr style=" font-size:11px ;">
                                                <td align="center" width="20px"><?= $no ?> </td>
                                                <td align="center"> <?= $value['nama_product'] ?> </td>
                                                <td align="center"> <?= $value['satuan_product'] ?>
                                                </td>
                                                <td align="center"><?= number_format($jumlah, 0, ',', '.') ?> </td>
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
                                <br><br>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="col-md-6">
                <button type="submit" class="btn btn-gradient-warning btn-rounded btn-fw text-black">
                    Closing
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
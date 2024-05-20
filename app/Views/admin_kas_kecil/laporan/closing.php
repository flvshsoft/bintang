<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
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

                        <form action="<?= base_url('/akk/laporan/closing-mingguan-save') ?>" method="POST">
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
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-gradient-warning btn-rounded btn-fw text-black">
                                    Closing
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description"> Nota Kontan
                        </p>
                        <form action="<?= base_url('/akk/laporan/closing-mingguan-nota-kontan-save') ?>" method="POST">

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-gradient-warning btn-rounded btn-fw text-black">
                                    Closing
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
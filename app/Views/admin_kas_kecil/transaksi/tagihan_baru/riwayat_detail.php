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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/tagihan_baru') ?>"> NOTA
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <form action="<? //= base_url('/akk/transaksi/tagihan_baru/closing-sales') 
                                            ?>" method="POST"> -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-0">
                                    <label class="col-12 col-form-label">MINGGU KE - <?= $model['week'] ?></label>
                                    <input type="hidden" name="week" class="form-control" value="<?= $model['week'] ?>">
                                </div>
                            </div>
                            <div class="col-3 pt-4">
                                <a class="text-black text-decoration-none">
                                    <!-- <div class="preview-thumbnail">
                                            <img src="<?= base_url() ?>/public/assets/images/faces/face4.jpg" alt="image" class="profile-pic rounded">
                                        </div> -->
                                </a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-7 justify-content-center">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <h6 class="preview-subject ellipsis mb-0 font-weight-normal">
                                            NO DO : <?= $model['id_sales'] ?>
                                            <input type="hidden" name="id_sales" class="form-control"
                                                value="<?= $model['id_sales'] ?>">
                                            <input type="hidden" name="id_nota" class="form-control"
                                                value="<?= $model['id_nota'] ?>">
                                        </h6>
                                    </div>
                                </div>
                                <div class="form-group d-flex mt-4">
                                    <p class="text-gray mb-0"> Area : <?= $model['nama_area'] ?> </p>
                                </div>
                                <div class="form-group d-flex mt-4">
                                    <p class="text-gray mb-0"> Salesman : <?= $model['nama_lengkap'] ?> </p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-12 mb-0">
                                    <div class="form-group d-flex">
                                        <label class="col-5 col-form-label">TANGGAL</label>
                                        <div class="col-7">
                                            <input type="date" disabled name="tgl_bayar" class="form-control"
                                                value="<?= date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- tabel -->
                        <div class="table-responsive">
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style=" font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> NO TAGIHAN </th>
                                        <th style=" font-size: 11px;"> CUSTOMER </th>
                                        <th style=" font-size: 11px;"> KREDIT </th>
                                        <th style=" font-size: 11px;"> CASH </th>
                                        <th style=" font-size: 11px;"> SUB TOTAL</th>
                                        <!-- <th style=" font-size: 11px;"> </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sub_total = 0;
                                    $nota_tertagih = 0;
                                    foreach ($cek_nota as $key => $value) {
                                        $kredit = 0;
                                        $cash = 0;
                                        if ($value['payment_method'] == 'CASH') {
                                            $cash = $value['pay'];
                                        } else {
                                            $kredit = $value['total_beli'];
                                            $nota_tertagih = $value['pay'];
                                        }
                                        $sub_total += $cash + $kredit;
                                    ?>
                                    <tr>
                                        <td style=" font-size: 11px;"><?= $key + 1 ?></td>
                                        <td style=" font-size: 11px;"><?= $value['no_nota'] ?></td>
                                        <td style=" font-size: 11px;"><?= $value['nama_customer'] ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($kredit) ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($cash) ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($sub_total) ?></td>
                                        <!-- <td style=" font-size: 11px;"> </a>
                                            <a class="btn btn-success btn-xs"
                                                href="<? //= base_url('/akk/transaksi/tagihan_baru/nota/' . $value['id_sales'] . '/' . $value['payment_method']) 
                                                        ?>">
                                                <i class="mdi mdi-database-plus icon-sm"></i>
                                            </a>
                                        </td> -->
                                        <input type="hidden" name="cash" class="form-control" value="<?= $cash ?>">
                                        <input type="hidden" name="kredit" class="form-control" value="<?= $kredit ?>">
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div><br>
                        <!-- tabel -->
                        <h3>CASH / KONTAN</h3>
                        <div class="table-responsive">
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style=" font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> KODE BARANG </th>
                                        <th style=" font-size: 11px;"> NAMA PRODUCT </th>
                                        <th style=" font-size: 11px;"> HARGA </th>
                                        <th style=" font-size: 11px;"> QTY </th>
                                        <th style=" font-size: 11px;"> TOTAL KONTAN </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total_qty = 0;
                                    $total = 0; ?>
                                    <?php foreach ($product_list['CASH'] as $key => $value) { ?>
                                    <?php
                                        $qty = $value['qty'];
                                        $harga_aktif = $value['harga_aktif'];
                                        $sub_total = $qty * $harga_aktif;
                                        $total_qty += $qty;
                                        $total += $sub_total;
                                        ?>
                                    <tr>
                                        <td style=" font-size: 11px;"><?= $no++ ?></td>
                                        <td style=" font-size: 11px;"><?= $key ?></td>
                                        <td style=" font-size: 11px;"><?= $value['nama_product'] ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($harga_aktif) ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($qty) ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($sub_total) ?></td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Grand Total Omset</td>
                                        <td><?= number_format($total_qty) ?></td>
                                        <td><?= number_format($total) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php
                            $totalList = [];
                            $totalList['Total Cash'] = $total;
                            ?>
                        </div><br>
                        <!-- tabel -->
                        <h3>KREDIT</h3>
                        <div class="table-responsive">
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style=" font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> KODE BARANG </th>
                                        <th style=" font-size: 11px;"> NAMA PRODUCT </th>
                                        <th style=" font-size: 11px;"> HARGA </th>
                                        <th style=" font-size: 11px;"> QTY </th>
                                        <th style=" font-size: 11px;"> TOTAL KONTAN </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total_qty = 0;
                                    $total = 0; ?>
                                    <?php foreach ($product_list['KREDIT'] as $key => $value) { ?>
                                    <?php
                                        $qty = $value['qty'];
                                        $harga_aktif = $value['harga_aktif'];
                                        $sub_total = $qty * $harga_aktif;
                                        $total_qty += $qty;
                                        $total += $sub_total;
                                        ?>
                                    <tr>
                                        <td style=" font-size: 11px;"><?= $no++ ?></td>
                                        <td style=" font-size: 11px;"><?= $key ?></td>
                                        <td style=" font-size: 11px;"><?= $value['nama_product'] ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($harga_aktif) ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($qty) ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($sub_total) ?></td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Grand Total Omset</td>
                                        <td><?= number_format($total_qty) ?></td>
                                        <td><?= number_format($total) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php
                            // $totalList['Total Kredit'] = $total;
                            ?>
                        </div><br>

                        <!-- tabel -->
                        <h3>TOTAL</h3>
                        <?php
                        $totalList['Nota Tertagih'] = $nota_tertagih;
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style=" font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> KETERANGAN </th>
                                        <th style=" font-size: 11px;"> TOTAL </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total = 0; ?>
                                    <?php foreach ($totalList as $key => $value) { ?>
                                    <?php
                                        $total += $value;
                                        ?>
                                    <tr>
                                        <td style=" font-size: 11px;"><?= $no++ ?></td>
                                        <td style=" font-size: 11px;"><?= $key ?></td>
                                        <td style=" font-size: 11px;"><?= number_format($value) ?></td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Grand Total Omset</td>
                                        <td><?= number_format($total) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><br>
                        <div class="col-md-6">
                            <!-- <button type="submit" class="btn btn-gradient-warning btn-rounded btn-fw">
                                Save
                            </button> -->
                            <a href="<?= base_url('/akk/transaksi/tagihan_baru/riwayat') ?>"
                                class="btn btn-primary btn-rounded btn-fw" name="btn_s">Kembali</a>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

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

        $result = $nama_hari . ', ' . $pecahkanTanggal[2] . '/' . (int) $pecahkanTanggal[1] . '/' . $pecahkanTanggal[0];
        // $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int)$pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];

        if ($waktu !== null) {
            $result .= ' ' . $waktu;
        }

        return $result;
    }
    ?>
    <?= $this->endSection() ?>
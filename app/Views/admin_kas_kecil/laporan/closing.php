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

                            <!-- tabel -->
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
                                                <!-- <td style=" font-size: 11px;"><?= number_format($sub_total) ?></td> -->
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

                            <input type="hidden" name="week" class="form-control" value="<?= $week ?>">
                            <input type="hidden" name="year" class="form-control" value="<?= $year ?>">

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

        $result = $nama_hari . ', ' . $pecahkanTanggal[2] . '/' . (int)$pecahkanTanggal[1] . '/' . $pecahkanTanggal[0];
        // $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int)$pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];

        if ($waktu !== null) {
            $result .= ' ' . $waktu;
        }

        return $result;
    }
    ?>
    <?= $this->endSection() ?>
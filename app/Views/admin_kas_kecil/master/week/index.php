<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h6 class="page-title">
                <?= $judul1 ?>
            </h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 11px;">
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1" href="<?= base_url('/akk/master_week/tambah') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Input Week</a>
                                <a class="btn btn-gradient-warning btn-xs btn-icon-text my-1" href="<?= base_url('/akk/master_week/generate') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Generate Week</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Nama Week </th>
                                        <th style="font-size: 11px;"> Bulan </th>
                                        <th style="font-size: 11px;"> Bulan Week </th>
                                        <th style="font-size: 11px;"> Tahun Week</th>
                                        <th style="font-size: 11px;"> Status Closing</th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $no ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <b>
                                                    <a style="text-decoration:none" href="<?= base_url('/akk/master_week/edit/' . $value['id_week']) ?>">
                                                        <?= $value['nama_week'] ?>
                                                    </a>
                                                </b>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= konversiBulanIndonesia($value['bulan']) ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= ($value['bulan_week']) ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['tahun_week'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['status_closing'] == 1 ? 'Closing' : '-' ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')" href="<?= base_url('/akk/master_week/hapus/' . $value['id_week']) ?>">
                                                    <i class="mdi mdi-delete-circle text-default icon-md"></i> </a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table-bordered-custom {
        border: 1px solid #000;
        /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
    }

    /* Tambahkan class ini pada tabel Anda */
</style>

<?php
function konversiBulanIndonesia($bulan)
{
    $daftarBulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    return $daftarBulan[$bulan];
}

?>
<?= $this->endSection() ?>
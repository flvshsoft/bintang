<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<?php $akses_super_admin = ($level_user == 'superadmin') ?>
<?php $akses_admin = (($level_user == 'superadmin') || ($level_user == 'admin')) ?>
<?php $akses_gudang = (($level_user == 'superadmin') || ($level_user == 'gudang')) ?>
<?php $akses_ho = (($level_user == 'superadmin') || ($level_user == 'ho')) ?>
<?php $akses_ho_gudang = (($level_user == 'superadmin') || ($level_user == 'hogudang')) ?>
<?php $akses_ho_keuangan = (($level_user == 'superadmin') || ($level_user == 'hokeuangan')) ?>

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
                        <?php if ($akses_admin) : ?>
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1"
                                    href="<?= base_url('/akk/product') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Tambah Barang</a>
                            </div>
                        </div>
                        <?php elseif ($akses_gudang) : ?>
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1"
                                    href="<?= base_url('/akk/product') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Tambah Barang</a>
                            </div>
                        </div>
                        <?php elseif ($akses_ho) : ?>
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1"
                                    href="<?= base_url('/akk/product') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Tambah Barang</a>
                            </div>
                        </div>
                        <?php elseif ($akses_ho_gudang) : ?>
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1"
                                    href="<?= base_url('/akk/product') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Tambah Barang</a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Kode Barang </th>
                                        <th style="font-size: 11px;"> Nama Barang </th>
                                        <th style="font-size: 11px;"> Satuan </th>
                                        <?php if ($akses_admin) : ?>
                                        <th style="font-size: 11px;"> Harga Beli </th>
                                        <?php elseif ($akses_gudang) : ?>
                                        <th style="font-size: 11px;"> Harga Beli </th>
                                        <?php elseif ($akses_ho) : ?>
                                        <th style="font-size: 11px;"> Harga Beli </th>
                                        <?php elseif ($akses_ho_gudang) : ?>
                                        <th style="font-size: 11px;"> Harga Beli </th>
                                        <?php endif; ?>
                                        <th style="font-size: 11px;"> Gudang </th>
                                        <th style="font-size: 11px;"> Area </th>
                                        <th style="font-size: 11px;"> Defect </th>
                                        <th style="font-size: 11px;"> Sample </th>
                                        <th style="font-size: 11px;"> Supplier </th>
                                        <?php if ($akses_admin) : ?>
                                        <th style="font-size: 11px;"> </th>
                                        <?php elseif ($akses_gudang) : ?>
                                        <th style="font-size: 11px;"> </th>
                                        <?php elseif ($akses_ho) : ?>
                                        <th style="font-size: 11px;"> </th>
                                        <?php elseif ($akses_ho_gudang) : ?>
                                        <th style="font-size: 11px;"> </th>
                                        <?php endif; ?>
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
                                            <?php if ($akses_gudang) : ?>
                                            <b>
                                                <a style="text-decoration:none"
                                                    href="<?= base_url('/akk/form_product/' . $value['id_product']) ?>">
                                                    <?= $value['id_product'] ?>
                                                </a>
                                            </b>
                                            <?php elseif ($akses_ho) : ?>
                                            <b>
                                                <a style="text-decoration:none"
                                                    href="<?= base_url('/akk/form_product/' . $value['id_product']) ?>">
                                                    <?= $value['id_product'] ?>
                                                </a>
                                            </b>
                                            <?php elseif ($akses_ho_gudang) : ?>
                                            <b>
                                                <a style="text-decoration:none"
                                                    href="<?= base_url('/akk/form_product/' . $value['id_product']) ?>">
                                                    <?= $value['id_product'] ?>
                                                </a>
                                            </b>
                                            <?php elseif ($akses_admin) : ?>
                                            <b>
                                                <a style="text-decoration:none"
                                                    href="<?= base_url('/akk/form_product/' . $value['id_product']) ?>">
                                                    <?= $value['id_product'] ?>
                                                </a>
                                            </b>
                                            <?php else : ?>
                                            <?= $value['id_product'] ?>
                                            <?php endif; ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_product'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['satuan_product'] ?>
                                        </td>
                                        <?php if ($akses_admin) : ?>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp ' . number_format($value['harga_beli'], 0, '.', '.') ?>
                                        </td>
                                        <?php elseif ($akses_gudang) : ?>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp ' . number_format($value['harga_beli'], 0, '.', '.') ?>
                                        </td>
                                        <?php elseif ($akses_ho) : ?>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp ' . number_format($value['harga_beli'], 0, '.', '.') ?>
                                        </td>
                                        <?php elseif ($akses_ho_gudang) : ?>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp ' . number_format($value['harga_beli'], 0, '.', '.') ?>
                                        </td>
                                        <?php endif; ?>
                                        <td style="font-size: 11px;">
                                            <?= number_format((int) $value['stock_product']) ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= number_format($value['area']) ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= number_format($value['defect']) ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= number_format($value['sample']) ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_supplier'] ?>
                                        </td>
                                        <?php if ($akses_admin) : ?>
                                        <td style="font-size: 11px;">
                                            <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                                                href="<?= base_url('/akk/del_product/' . $value['id_product']) ?>"> <i
                                                    class="mdi mdi-delete-circle text-default icon-md"></i> </a>
                                        </td>
                                        <?php elseif ($akses_gudang) : ?>
                                        <td style="font-size: 11px;">
                                            <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                                                href="<?= base_url('/akk/del_product/' . $value['id_product']) ?>"> <i
                                                    class="mdi mdi-delete-circle text-default icon-md"></i> </a>
                                        </td>
                                        <?php elseif ($akses_ho) : ?>
                                        <td style="font-size: 11px;">
                                            <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                                                href="<?= base_url('/akk/del_product/' . $value['id_product']) ?>"> <i
                                                    class="mdi mdi-delete-circle text-default icon-md"></i> </a>
                                        </td>
                                        <?php elseif ($akses_ho_gudang) : ?>
                                        <td style="font-size: 11px;">
                                            <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                                                href="<?= base_url('/akk/del_product/' . $value['id_product']) ?>"> <i
                                                    class="mdi mdi-delete-circle text-default icon-md"></i> </a>
                                        </td>
                                        <?php endif; ?>
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

<?= $this->endSection() ?>
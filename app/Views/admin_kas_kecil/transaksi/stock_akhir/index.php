<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?= $judul1 ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> Transaksi</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <a class="btn btn-primary btn-xs" href="<?= base_url('/akk/transaksi/stock_akhir/tambah') ?>">
                                    <i class="mdi mdi-history btn-icon-prepend"></i> Riwayat</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> NO </th>
                                        <th style="font-size: 11px;"> No DO </th>
                                        <th style="font-size: 11px;"> SALESMAN </th>
                                        <th style="font-size: 11px;"> AREA </th>
                                        <th style="font-size: 11px;"> WEEKS </th>
                                        <th style="font-size: 11px;"> REMARK </th>
                                        <th style="font-size: 11px;"> CREATED DATE </th>
                                        <th style="font-size: 11px;"> CREATED DO </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) {
                                    ?>
                                        <tr>

                                            <td style="font-size: 11px;">
                                                <?= $no ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <b>
                                                    <!-- <a style="text-decoration:none" href="<?= base_url('/akk/transaksi/edit_penjualan_barang/' .  $value['id_sales']) ?>"> -->
                                                    <?= $value['id_sales'] ?>
                                                    <!-- </a> -->
                                                </b>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['nama_lengkap'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['nama_area'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['week'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['keterangan'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['created_at'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['tgl_do'] ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/akk/transaksi/stock_akhir/edit/' . $value['id_sales']) ?>">
                                                    <i class="mdi mdi-plus-circle text-default icon-md"></i> </a>
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


<?= $this->endSection() ?>
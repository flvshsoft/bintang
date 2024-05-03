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
                        <?php if (session()->getFlashdata("jatuh_tempo_service")) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= session()->getFlashdata("jatuh_tempo_service") ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1" href="<?= base_url('/akk/form_asset') ?>">
                                    <i class="mdi mdi-book-multiple-variant icon-sm"></i> Input Asset</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Kode Asset </th>
                                        <th style="font-size: 11px;"> No. Plat </th>
                                        <th style="font-size: 11px;"> Nama Asset </th>
                                        <th style="font-size: 11px;"> Tahun Pembelian </th>
                                        <th style="font-size: 11px;"> Satuan </th>
                                        <th style="font-size: 11px;"> NIK </th>
                                        <th style="font-size: 11px;"> PIC </th>
                                        <th style="font-size: 11px;"> Lokasi </th>
                                        <th style="font-size: 11px;"> CREATED DATE </th>
                                        <th style="font-size: 11px;"> CREATED BY </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($model as $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $no; ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <b>
                                                    <a href="<?= base_url('/akk/form_detail_asset/' . $value['id_asset']) ?>" style="text-decoration:none"> <?= $value['id_asset'] ?>
                                                    </a>
                                                </b>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['no_plat'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_asset'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['tahun_pembelian'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['satuan'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <? //= $value['']
                                                ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['pic'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['lokasi'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['created_at'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['pic'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <a href="<?= base_url('/') ?>"><i class="mdi mdi-history text-default icon-md"></i></a>
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

<?= $this->endSection() ?>
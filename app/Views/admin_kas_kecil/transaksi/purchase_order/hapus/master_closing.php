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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> TRANSAKSI</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/closing_sales') ?>"> SALES</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-12">
                            <a href="#"><i class="mdi mdi-file-excel icon-md text-success"></i></a>
                            <a href=#><i class="mdi mdi-file-pdf icon-md text-danger"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> NO INVOICE </th>
                                        <th style=" font-size: 11px;"> NO DO </th>
                                        <th style=" font-size: 11px;"> SALESMAN </th>
                                        <th style=" font-size: 11px;"> WEEK </th>
                                        <th style=" font-size: 11px;"> PAYMENT METHOD </th>
                                        <th style=" font-size: 11px;"> CUSTOMER </th>
                                        <th style=" font-size: 11px;"> AREA </th>
                                        <th style=" font-size: 11px;"> CREATED BY </th>
                                        <th style=" font-size: 11px;"> CREATED AT </th>
                                        <th style=" font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $value) { ?>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <?= $value['id_nota'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['id_sales'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_lengkap'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['weeks'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['payment_method'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['nama_customer'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_area'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_user'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['created_at'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <a href="<?= base_url('/akk/detail_closing') ?>"><i
                                                    class="mdi mdi-pencil-circle icon-md"></i></a>
                                            <a href="#"><i class="mdi mdi-file-pdf text-info icon-md"></i></a>
                                            <a href="#"><i
                                                    class="mdi mdi-book-open-page-variant text-success icon-md"></i></a>
                                            <a href="<?= base_url('/akk/closing_sales_print/'. $value['id_nota']) ?>"><i
                                                    class="mdi mdi-printer text-black icon-md"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
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
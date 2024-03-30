<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan') ?>">DATA KEUANGAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-12">
                            <a href="<?= base_url('/akk/keuangan/master_hutang/pelunasan') ?>">
                                <button type="button" class="btn btn-dark btn-xs"><i
                                        class="mdi mdi-history icon-sm"></i>Riwayat Pelunasan Hutang</button>
                            </a>
                            <a href="<?= base_url('/akk/keuangan/master_hutang/pot') ?>">
                                <button type="button" class="btn btn-warning btn-xs"><i
                                        class="mdi mdi-history icon-sm"></i>Riwatat Pot Hutang</button>
                            </a>
                            <a href="<?= base_url('/akk/keuangan/master_hutang/tambah') ?>">
                                <button type="button" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-database-plus icon-sm"></i>Input Hutang</button>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> No Faktur </th>
                                        <th style="font-size: 11px;"> Supplier </th>
                                        <th style="font-size: 11px;"> No Penerimaan </th>
                                        <th style="font-size: 11px;"> Total Penerimaan </th>
                                        <th style="font-size: 11px;"> Tanggal </th>
                                        <th style="font-size: 11px;"> Minggu</th>
                                        <th style="font-size: 11px;"> User </th>
                                        <th style="font-size: 11px;"> Diskon | Retur | Bayar </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?//php foreach ($model as $value) { ?>
                                    <tr>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td class="warning" align="center" width="10px">
                                            <b><a href="<?= base_url('/akk/keuangan/master_hutang/') ?>"
                                                    style="text-decoration:none" data-toggle="tooltip" class="tip-top"
                                                    data-original-title="Discount Hutang Usaha"><i
                                                        class="mdi mdi-ticket-percent text-default icon-md"></i></a></b>
                                            <b><a href="<?= base_url('/akk/keuangan/master_hutang/') ?>"
                                                    style="text-decoration:none" data-toggle="tooltip" class="tip-top"
                                                    data-original-title="Retur Hutang"><i
                                                        class="mdi mdi-file-send text-default icon-md"></i></a></b>
                                            <b><a href="<?= base_url('/akk/keuangan/master_hutang/') ?>"
                                                    style="text-decoration:none" data-toggle="tooltip" class="tip-top"
                                                    data-original-title="Bayar Tagihan"><i
                                                        class="mdi mdi-check-circle text-default icon-md"></i></a></b>
                                        </td>
                                    </tr>
                                    <?php// }; ?>
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
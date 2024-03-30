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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Transasct Code </th>
                                        <th style="font-size: 11px;"> Type Biaya </th>
                                        <th style="font-size: 11px;"> Payment Method </th>
                                        <th style="font-size: 11px;"> Remark </th>
                                        <th style="font-size: 11px;"> Value </th>
                                        <th style="font-size: 11px;"> Created By</th>
                                        <th style="font-size: 11px;"> Created By </th>
                                        <th style="font-size: 11px;"> </th>
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
                                        <td class="warning" align="right" width="10px">
                                            <b><a href="<?= base_url('/akk/keuangan/master_app_mutasi/') ?>"
                                                    style="text-decoration:none" data-toggle="tooltip" class="tip-top"
                                                    data-original-title="Detail Pembayaran"><i
                                                        class="mdi mdi-check-circle text-default icon-md"></i></a></b>
                                            <b><a href="<?= base_url('/akk/keuangan/master_app_mutasi/') ?>"
                                                    style="text-decoration:none" data-toggle="tooltip" class="tip-top"
                                                    data-original-title="Batal"><i
                                                        class="mdi mdi-comment-remove-outline text-default icon-md"></i></a></b>
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
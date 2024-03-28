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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/master_hutang') ?>">HUTANG</a>
                    </li>
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
                                        <th style="font-size: 11px;"> ID </th>
                                        <th style="font-size: 11px;"> No Faktur </th>
                                        <th style="font-size: 11px;"> Type </th>
                                        <th style="font-size: 11px;"> Supplier </th>
                                        <th style="font-size: 11px;"> Total Hutang </th>
                                        <th style="font-size: 11px;"> Diskon </th>
                                        <th style="font-size: 11px;"> Sisa Hutang</th>
                                        <th style="font-size: 11px;"> Week </th>
                                        <th style="font-size: 11px;"> Tanggal </th>
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
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td> </td>
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
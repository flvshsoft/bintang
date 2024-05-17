<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/laporan') ?>">LAPORAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <a class="btn btn-success btn-xs" href="<?= base_url('/akk/laporan/form_kas_kecil') ?>">
                                    <i class="mdi mdi-file-pdf text-default icon-sm"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> KETERANGAN </th>
                                        <th style=" font-size: 11px;"> DEBIT </th>
                                        <th style=" font-size: 11px;"> KREDIT </th>
                                        <th style=" font-size: 11px;"> SALDO </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            1
                                        </td>
                                        <td style=" font-size: 11px;">

                                        </td>
                                        <td style=" font-size: 11px;">
                                            0
                                        </td>
                                        <td style=" font-size: 11px;">
                                            87,050,000
                                        </td>
                                        <td style=" font-size: 11px;">
                                            -87,050,000
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            2
                                        </td>
                                        <td style=" font-size: 11px;">
                                            AIR LISTRIK & INTERNET
                                        </td>
                                        <td style=" font-size: 11px;">
                                            0
                                        </td>
                                        <td style=" font-size: 11px;">
                                            46,995,285
                                        </td>
                                        <td style=" font-size: 11px;">
                                            -134,045,285
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            3
                                        </td>
                                        <td style=" font-size: 11px;">
                                            BBM
                                        </td>
                                        <td style=" font-size: 11px;">
                                            0
                                        </td>
                                        <td style=" font-size: 11px;">
                                            52,835,500
                                        </td>
                                        <td style=" font-size: 11px;">
                                            -1,399,083,667
                                        </td>
                                    </tr>
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
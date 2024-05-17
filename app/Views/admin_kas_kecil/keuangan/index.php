<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Data Keuangan</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DATA KEUANGAN</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="template-demo">
                            <!-- <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/master_app_mutasi') ?>">
                                        <i class="mdi mdi-check-circle text-dark icon-md"></i>
                                        Approval Pembayaran Kas & Bank
                                    </a>
                                </b>
                            </td> -->
                            <hr>
                            <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/pengeluaran_kantor') ?>">
                                        <i class="mdi mdi-book-minus text-dark icon-md"></i>
                                        Biaya Kantor
                                    </a>
                                </b>
                            </td>
                            <hr>
                            <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/master_pengeluaran') ?>">
                                        <i class="mdi mdi-car text-dark icon-md"></i>
                                        Biaya Operasional
                                    </a>
                                </b>
                            </td>
                            <hr>
                            <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/master_hutang') ?>">
                                        <i class="mdi mdi-cash-100 text-dark icon-md"></i>
                                        Hutang Usaha
                                    </a>
                                </b>
                            </td>
                            <hr>
                            <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/data_kas') ?>">
                                        <i class="mdi mdi-cash-usd text-dark icon-md"></i>
                                        Kas & Bank
                                    </a>
                                </b>
                            </td>
                            <!-- <hr>
                            <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/kas_kecil') ?>">
                                        <i class="mdi mdi-clipboard-flow text-dark icon-md"></i>
                                        Modal Kas Kecil
                                    </a>
                                </b>
                            </td> -->
                            <hr>
                            <td class="menu-item" style="vertical-align:middle;" width="20px">
                                <b>
                                    <a style=" text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/mutasi_bank') ?>">
                                        <i class="mdi mdi-play-protected-content text-dark icon-md"></i>
                                        Mutasi Bank
                                    </a>
                                </b>
                            </td>
                            <!-- <hr>
                            <td class="menu-item" style="vertical-align:middle;">
                                <b>
                                    <a style="text-decoration:none;color:black;"
                                        href="<?= base_url('/akk/keuangan/master_giro') ?>">
                                        <i class="mdi mdi-wiiu text-dark icon-md"></i>
                                        Pencairan Giro
                                    </a>
                                </b>
                            </td> -->
                            <hr>
                        </div>
                    </div>
                    <!-- <h4 class="d-flex justify-content-end mb-2">MASTER DATA PENGELUARAN</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table table-primary">
                                <tr>
                                    <th style="font-size: 11px;"> TRANSACT CODE </th>
                                    <th style="font-size: 11px;"> TYPE BIAYA </th>
                                    <th style="font-size: 11px;"> REMARK </th>
                                    <th style="font-size: 11px;"> WEEK </th>
                                    <th style="font-size: 11px;"> VALUE </th>
                                    <th style="font-size: 11px;"> CREATE BY </th>
                                    <th style="font-size: 11px;"> CREATED DATE </th>
                                    <th style="font-size: 11px;"> APPROVE BY </th>
                                    <th style="font-size: 11px;"> APPROVE DATE DATE </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size: 11px;">
                                        2706688
                                    </td>
                                    <td style="font-size: 11px;">
                                        Pabrik
                                    </td>
                                    <td style="font-size: 11px;">
                                        KAS
                                    </td>
                                    <td style="font-size: 11px;">
                                        39
                                    </td>
                                    <td style="font-size: 11px;">
                                        22,220,000
                                    </td>
                                    <td style="font-size: 11px;">
                                        ADE
                                    </td>
                                    <td style="font-size: 11px;">
                                        2023-09-30
                                    </td>
                                    <td style="font-size: 11px;">
                                        MAYA
                                    </td>
                                    <td style="font-size: 11px;">
                                        2023-09-30 13:40:21
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 11px;">
                                        2706688
                                    </td>
                                    <td style="font-size: 11px;">
                                        Pabrik
                                    </td>
                                    <td style="font-size: 11px;">
                                        KAS
                                    </td>
                                    <td style="font-size: 11px;">
                                        39
                                    </td>
                                    <td style="font-size: 11px;">
                                        22,220,000
                                    </td>
                                    <td style="font-size: 11px;">
                                        ADE
                                    </td>
                                    <td style="font-size: 11px;">
                                        2023-09-30
                                    </td>
                                    <td style="font-size: 11px;">
                                        MAYA
                                    </td>
                                    <td style="font-size: 11px;">
                                        2023-09-30 13:40:21
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 11px;">
                                        2706688
                                    </td>
                                    <td style="font-size: 11px;">
                                        Pabrik
                                    </td>
                                    <td style="font-size: 11px;">
                                        KAS
                                    </td>
                                    <td style="font-size: 11px;">
                                        39
                                    </td>
                                    <td style="font-size: 11px;">
                                        22,220,000
                                    </td>
                                    <td style="font-size: 11px;">
                                        ADE
                                    </td>
                                    <td style="font-size: 11px;">
                                        2023-09-30
                                    </td>
                                    <td style="font-size: 11px;">
                                        MAYA
                                    </td>
                                    <td style="font-size: 11px;">
                                        2023-09-30 13:40:21
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->

                </div>
            </div>
        </div>
        <!--table-->
    </div>
</div>
</div>
</div>
<style>
.menu-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.menu-item a {
    display: flex;
    align-items: start;
    text-decoration: none;
    color: black;
}

.menu-item i {
    margin-right: 10px;
}
</style>



<?= $this->endSection() ?>
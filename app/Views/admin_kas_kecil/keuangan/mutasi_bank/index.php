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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/data_kas') ?>">KAS BANK</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary btn-xs" href="<?= base_url('/akk/keuangan/data_kas/mutasi_bank/tambah') ?>">
                            <i class="mdi mdi-database-minus icon-sm"></i> Tambah
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Bank Asal </th>
                                        <th style="font-size: 11px;"> Bank Tujuan </th>
                                        <th style="font-size: 11px;"> Biaya </th>
                                        <th style="font-size: 11px;"> TypeBiaya </th>
                                        <th style="font-size: 11px;"> Week </th>
                                        <th style="font-size: 11px;"> Remark </th>
                                        <th style="font-size: 11px;"> Approved By</th>
                                        <th style="font-size: 11px;"> Date </th>
                                        <th style="font-size: 11px;"> User </th>
                                        <th style="font-size: 11px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $key => $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $key + 1 ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_bank_asal'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_bank_tujuan'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= 'Rp. ' . number_format($value['biaya_mutasi_bank'], 0, ',', '.') ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['type_mutasi_bank'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['week_mutasi_bank'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['remark_mutasi_bank'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_user'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['tgl_mutasi_bank'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_user'] ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/akk/keuangan/mutasi_bank/edit/' . $value['id_mutasi_bank']) ?>">
                                                    <i class="mdi mdi-pencil-circle icon-md">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }; ?>
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
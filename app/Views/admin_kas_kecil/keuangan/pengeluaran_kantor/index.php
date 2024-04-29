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
                            <a href="<?= base_url('/akk/keuangan/pengeluaran_kantor/tambah') ?>">
                                <button type="button" class="btn btn-success btn-xs">
                                    <i class="mdi mdi-database-plus icon-sm"> </i>
                                    Tambah
                                </button>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> TRANS CODE </th>
                                        <th style="font-size: 11px;"> GROUP BIAYA </th>
                                        <th style="font-size: 11px;"> REMARK </th>
                                        <th style="font-size: 11px;"> WEEK </th>
                                        <th style="font-size: 11px;"> VALUE </th>
                                        <th style="font-size: 11px;"> CREATE BY </th>
                                        <th style="font-size: 11px;"> CREATED DATE </th>
                                        <th style="font-size: 11px;"> APPROVE BY </th>
                                        <th style="font-size: 11px;"> APPROVE DATE </th>
                                        <th style="font-size: 11px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $value['id_pengeluaran_kantor'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['keterangan_pengeluaran_kantor'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['remark_pengeluaran_kantor'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['week_pengeluaran_kantor'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= 'Rp. ' . number_format($value['biaya_pengeluaran_kantor'], 0, ',', '.') ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_user'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['tgl_pengeluaran_kantor'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_user'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['approved_date'] ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/akk/keuangan/pengeluaran_kantor/edit/' . $value['id_pengeluaran_kantor']) ?>">
                                                    <i class="mdi mdi-pencil-circle icon-md">
                                                    </i>
                                                </a>
                                                <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')" href="<?= base_url('/akk/keuangan/pengeluaran_kantor/hapus/' . $value['id_pengeluaran_kantor']) . '/' . $value['biaya_pengeluaran_kantor'] ?>">
                                                    <i class="mdi mdi-delete-circle text-danger icon-md"></i> </a>
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
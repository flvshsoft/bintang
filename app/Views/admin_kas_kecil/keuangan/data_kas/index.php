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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan') ?>">KEUANGAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul1 ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <a class="btn btn-success btn-xs"
                                href="<?= base_url('/akk/keuangan/data_kas/uang_kas_besar') ?>">
                                <i class="mdi mdi-database-plus icon-sm"></i> Kas Besar</a>
                            <a class="btn btn-warning btn-xs"
                                href="<?= base_url('/akk/keuangan/data_kas/uang_kas_kecil') ?>">
                                <i class="mdi mdi-database-plus icon-sm"></i> Kas Kecil</a>
                            <a class="btn btn-danger btn-xs"
                                href="<?= base_url('/akk/keuangan/data_kas/mutasi_bank') ?>">
                                <i class="mdi mdi-database-minus icon-sm"></i> Mutasi</a>
                            <a class="btn btn-primary btn-xs"
                                href="<?= base_url('/akk/keuangan/data_kas/neraca_saldo') ?>">
                                <i class="mdi mdi-printer"></i> Neraca</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> ID </th>
                                        <th style="font-size: 11px;"> Konsumen </th>
                                        <th style="font-size: 11px;"> Paymen Method </th>
                                        <th style="font-size: 11px;"> Type Payment</th>
                                        <th style="font-size: 11px;"> Remark </th>
                                        <th style="font-size: 11px;"> Cash Receipt</th>
                                        <th style="font-size: 11px;"> Date </th>
                                        <th style="font-size: 11px;"> User </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $value) { ?>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <?= $value['id_kas'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['id_konsumen'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['metode_bayar'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_bank'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?php if ($value['id_bank'] == 5 && $value['ket'] == 'PENGGANTIAN') { ?>
                                            <?= $value['ket'] . ' MINGGU KE ' . $value['pergantian_minggu'] ?>
                                            <?php } elseif ($value['id_bank'] == 5 && $value['ket'] == 'KASBON') { ?>
                                            <?= $value['ket'] . ' MINGGU KE ' . $value['pergantian_minggu'] ?>
                                            <?php } else { ?>
                                            <?= $value['ket']  ?>
                                            <?php } ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp. ' . number_format($value['uang_kas'], 0, ',', '.') ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['created_at'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_user'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <a href="<?= base_url('/akk/keuangan/data_kas/voucher') ?>"><i
                                                    class="mdi mdi-credit-card icon-md"></i></a>
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
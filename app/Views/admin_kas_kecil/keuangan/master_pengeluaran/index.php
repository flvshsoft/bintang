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
                                href="<?= base_url('/akk/keuangan/master_pengeluaran_op') ?>">
                                <i class="mdi mdi-book-multiple-variant icon-sm"></i>Riwayat</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No</th>
                                        <th style="font-size: 11px;"> DO</th>
                                        <th style="font-size: 11px;"> Salesman </th>
                                        <th style="font-size: 11px;"> Pekan Ke- </th>
                                        <th style="font-size: 11px;"> ID Area </th>
                                        <th style="font-size: 11px;"> Keterangan</th>
                                        <th style="font-size: 11px;"> Created Date </th>
                                        <th style="font-size: 11px;"> Created By</th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) :
                                        $dateString = $value['created_at'];
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d F Y H:i:s');
                                    ?>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <?= $no ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['id_sales'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_lengkap'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['minggu_pengeluaran_sales'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['id_nama_area'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['keterangan_pengeluaran_sales'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $formattedDate ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_lengkap'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <a
                                                href="<?= base_url('/akk/keuangan/spending_operational/' . $value['id_pengeluaran_sales']) ?>"><i
                                                    class="mdi mdi-database-plus icon-md"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                    $no++ ?>
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
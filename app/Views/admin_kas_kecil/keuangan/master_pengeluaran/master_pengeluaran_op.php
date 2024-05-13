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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/master_pengeluaran') ?>">PENGELUARAN</a></li>
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
                        <div class="table-responsive">
                            <table class="table table-striped " width="100%" id="dataTable" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> Kode Trans</th>
                                        <th style="font-size: 11px;"> No. DO </th>
                                        <th style="font-size: 11px;"> Minggu </th>
                                        <th style="font-size: 11px;"> Keterangan </th>
                                        <th style="font-size: 11px;"> Biaya</th>
                                        <th style="font-size: 11px;"> User</th>
                                        <th style="font-size: 11px;"> Tanggal</th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $value) {
                                        $string_tanggal_waktu = $value['created_at'];
                                        $datetime = new DateTime($string_tanggal_waktu);
                                        $tanggal_waktu_php = $datetime->format('d F Y H:i:s');
                                    ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $value['id_pengeluaran_detail_sales'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['id_sales'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['minggu_pengeluaran_sales'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?php if ($value['ket_pengeluaran'] == "PENGELUARAN OPERASIONAL SALESMAN") { ?>
                                                    <?= $value['ket_pengeluaran'] ?> : <?= $value['nama_salesman'] ?>
                                                <?php } else { ?>
                                                    <?= $value['ket_pengeluaran'] ?>
                                                <?php } ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= 'Rp ' . number_format($value['nominal'], 0, '.', '.') ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_user'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $tanggal_waktu_php ?>
                                            </td>
                                            <td style="font-size: 11px;" class="text-center">
                                                <a href="<?= base_url('/akk/keuangan/master_pengeluaran_op/edit/' . $value['id_pengeluaran_detail_sales']) ?>">
                                                    <i class="mdi mdi-pencil-circle icon-md"></i>
                                                </a>
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
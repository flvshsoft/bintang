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
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> TRANSAKSI</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata("tak_lengkap")) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= session()->getFlashdata("tak_lengkap") ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style="font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> NO DO </th>
                                        <th style=" font-size: 11px;"> Salesman </th>
                                        <th style=" font-size: 11px;"> ID Area </th>
                                        <th style=" font-size: 11px;"> Week </th>
                                        <th style=" font-size: 11px;"> Keterangan </th>
                                        <th style=" font-size: 11px;"> Created </th>
                                        <th style=" font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) {
                                    ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $no ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['id_sales'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['nama_lengkap'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['nama_area'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['week'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['keterangan'] ?>
                                                <?= $value['total_jumlah_sales'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['tgl_do'] ?>
                                            </td>
                                            <td>
                                                <!-- <a class="btn btn-success btn-xs dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                href="<? //= base_url('/akk/transaksi/tagihan_baru/nota/' . $value['id_sales']) 
                                                        ?>">
                                                <i class="mdi mdi-database-plus icon-sm"></i>
                                            </a> -->
                                                <a class="btn btn-info btn-xs p-2" href="<?= base_url('/akk/transaksi/tagihan_baru/riwayat/detail/' . $value['id_sales']) ?>">
                                                    <!-- <i class="mdi mdi-database-plus icon-sm"></i> -->
                                                    Closing Sales
                                                </a>
                                                <!-- <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="<? //= base_url('/akk/transaksi/tagihan_baru/nota/' . $value['id_sales'] . '/' . 'CASH') 
                                                                ?>">CASH
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class=" dropdown-item"
                                                        href="<? //= base_url('/akk/transaksi/tagihan_baru/nota/' . $value['id_sales'] . '/' . 'KREDIT') 
                                                                ?>">KREDIT
                                                    </a>
                                                </li>
                                            </ul> -->
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- back -->
        <div class="row">
            <div class="col-12">
                <div class="col-1 ms-auto me-5">
                    <a href="<?= base_url('/akk/transaksi/tagihan_baru') ?>" class="btn btn-success">Simpan</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
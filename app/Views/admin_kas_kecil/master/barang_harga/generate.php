<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h6 class="page-title">
                <?= $judul1 ?>
            </h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 11px;">
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1" href="<?= base_url('/akk/master_price') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Histori </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> ID </th>
                                        <th style="font-size: 11px;"> Nama Barang </th>
                                        <th style="font-size: 11px;"> Jenis Harga</th>
                                        <th style="font-size: 11px;"> Harga Aktif </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product as $key => $value) : ?>
                                        <?php foreach ($jenis_harga as $key2 => $value2) : ?>
                                            <tr>
                                                <td style="font-size: 11px;">
                                                    <?= ($key + 1) //$value['id_product'] 
                                                    ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value['nama_product'] ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value2['remark_jenis_harga']
                                                    ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?php // 'Rp ' . number_format($value['harga_aktif'], 0, ',', '.') 
                                                    ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <div class="justify-content-center">
                                                        <a href="<? //= base_url('/akk/del_barang_harga/' . $value['id_barang_harga']) 
                                                                    ?>">
                                                            <i class="mdi mdi-delete-circle icon-md text-default"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
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
    .table-bordered-custom {
        border: 1px solid #000;
        /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
    }

    /* Tambahkan class ini pada tabel Anda */
</style>

<?= $this->endSection() ?>
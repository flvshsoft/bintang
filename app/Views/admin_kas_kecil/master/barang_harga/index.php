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
                                    <i class="mdi mdi-database-plus icon-sm"></i> Histori
                                </a>
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1 float-end" href="<?= base_url('/akk/master_barang_harga_generate') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Generate
                                </a>
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
                                    <tr>
                                        <form action="<?= base_url('/akk/save_barang_harga') ?>" method="post">
                                            <td style="font-size: 11px;">

                                            </td>
                                            <td style="font-size: 11px;" class="form-group">
                                                <select name="id_product" class="form-control form-control-sm">
                                                    <option>Pilih Barang</option>
                                                    <?php foreach ($product as $value) { ?>
                                                        <option value="<?= $value['id_product'] ?>">
                                                            <?= $value['nama_product'] ?>
                                                        </option>
                                                    <?php }; ?>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <select name="id_jenis_harga" class="form-control form-control-sm">
                                                    <option>Pilih</option>
                                                    <?php foreach ($jenis_harga as $value) { ?>
                                                        <option value="<?= $value['id_jenis_harga'] ?>">
                                                            <?= $value['remark_jenis_harga'] ?>
                                                        </option>
                                                    <?php }; ?>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" name="harga_aktif" placeholder="Input Harga" class="form-control form-control-sm">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <div class="justify-content-center">
                                                    <button type="text" class="btn btn-primary btn-xs tip-top" data-toggle="tooltip" data-original-title="Simpan Data" type="submit">S</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php foreach ($model as $key => $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= (++$key) //$value['id_barang_harga'] 
                                                ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_product'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['remark_jenis_harga'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= 'Rp ' . number_format($value['harga_aktif'], 0, ',', '.') ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <div class="justify-content-center">
                                                    <a href="<?= $value['id_barang_harga'];//base_url('/akk/del_barang_harga/' . $value['id_barang_harga']) 
                                                                ?>">
                                                        <i class="mdi mdi-delete-circle icon-md text-default"></i>
                                                    </a>
                                                </div>
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
    .table-bordered-custom {
        border: 1px solid #000;
        /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
    }

    /* Tambahkan class ini pada tabel Anda */
</style>

<?= $this->endSection() ?>
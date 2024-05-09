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
                                <a class="btn btn-gradient-success btn-xs btn-icon-text my-1" href="<?= base_url('/akk/customer') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Tambah Konsumen
                                </a>
                                <?php foreach ($count_customer as $key => $value) : ?>
                                    <a class="btn btn-warning text-black btn-xs btn-icon-text my-1" href="<?= base_url('/akk/customer') ?>">
                                        <i class="mdi mdi-database-plus icon-sm"></i> Konsumen <?= $key ?> : <?= $value ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php if (session()->getFlashdata("tak_lengkap")) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= session()->getFlashdata("tak_lengkap") ?>
                            </div>
                        <?php } ?>
                        <?php if (session()->getFlashdata("lengkap")) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= session()->getFlashdata("lengkap") ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Kode Konsumen </th>
                                        <th style="font-size: 11px;"> Nama Konsumen </th>
                                        <th style="font-size: 11px;"> Alamat </th>
                                        <th style="font-size: 11px;"> Telp </th>
                                        <th style="font-size: 11px;"> Metode </th>
                                        <th style="font-size: 11px;"> Tipe Harga </th>
                                        <th style="font-size: 11px;"> Foto Toko </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $no ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <b>
                                                    <a style="text-decoration:none" href="<?= base_url('/akk/form_customer/' . $value['id_customer']) ?>">
                                                        <?= $value['id_customer'] ?>
                                                    </a>
                                                </b>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_customer'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['alamat_customer'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['no_hp_customer'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['payment_metode'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['remark_jenis_harga'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?php if ($value['foto_toko'] != "") : ?>
                                                    <img src="<?= base_url('/public/img/foto_toko/' . $value['foto_toko']) ?>" alt="Foto">
                                                <?php endif; ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')" href="<?= base_url('/akk/del_customer/' . $value['id_customer']) ?>"> <i class="mdi mdi-delete-circle text-default icon-md"></i> </a>
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
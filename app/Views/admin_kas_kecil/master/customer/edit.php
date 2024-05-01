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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/master_customer') ?>"> Konsumen </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('/akk/update_customer') ?>" enctype="multipart/form-data">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Konsumen</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control form-control-sm" name="id_customer" value="<?= $model['id_customer'] ?>">
                                    <input type="text" class="form-control form-control-sm" name="nama_customer" value="<?= $model['nama_customer'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp_customer" value="<?= $model['no_hp_customer'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat_customer"> <?= $model['alamat_customer'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Toko</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control form-control-sm" name="nama_toko" value="<?= $model['nama_toko'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp Toko</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp_toko" value="<?= $model['no_hp_toko'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat Toko</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat_toko"> <?= $model['alamat_toko'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Foto Toko</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm" name="foto_toko">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Owner</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nama_owner" value="<?= $model['nama_owner'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp Owner</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp_owner" value="<?= $model['no_hp_owner'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat Owner</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat_owner"> <?= $model['alamat_owner'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Area</label>
                                <div class="col-sm-9">
                                    <select name="id_area" required class="form-control">
                                        <option value="<?= $model['id_area'] ?>"> <?= $model['id_nama_area'] ?> -
                                            <?= $model['nama_area'] ?></option>
                                        <?php foreach ($area as $value) { ?>
                                            <option value=" <?= $value['id_area'] ?>">
                                                <?= $value['id_nama_area'] ?> - <?= $value['nama_area'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="kab_kota"><?= $model['kab_kota'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Metode Bayar</label>
                                <div class="col-sm-9">
                                    <select required name="payment_metode" class="form-control">
                                        <option> <?= $model['payment_metode'] ?></option>
                                        <option>CASH</option>
                                        <option>KREDIT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Type Harga</label>
                                <div class="col-sm-9">
                                    <select name="id_jenis_harga" class="form-control" required>
                                        <option value="<?= $model['id_jenis_harga'] ?>">
                                            <?= $model['remark_jenis_harga'] ?> </option>
                                        <?php foreach ($type_harga as $value) { ?>
                                            <option value="<?= $value['id_jenis_harga'] ?>">
                                                <?= $value['remark_jenis_harga'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-success btn-xs"><i class="mdi mdi-content-save-all icon-sm"></i></button>
                                <a class="btn btn-light btn-xs" href="<?= base_url('/akk/master_customer') ?>"><i class="mdi mdi-backburger icon-sm"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
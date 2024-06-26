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
                        <form class="forms-sample" method="POST" enctype="multipart/form-data"
                            action="<?= base_url('/akk/input_customer') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Konsumen</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nama_customer"
                                        placeholder="Nama Konsumen" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp_customer"
                                        placeholder="No HP" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat_customer"
                                        placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Metode Bayar</label>
                                <div class="col-sm-9">
                                    <select name="payment_metode" class="form-control" required>
                                        <option value=""> Pilih Metode Bayar </option>
                                        <option>CASH</option>
                                        <option>KREDIT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Type Harga</label>
                                <div class="col-sm-9">
                                    <select name="id_jenis_harga" class="form-control" required>
                                        <option value=""> Pilih Type Harga </option>
                                        <?php foreach ($type_harga as $value) { ?>
                                        <option value="<?= $value['id_jenis_harga'] ?>">
                                            <?= $value['remark_jenis_harga'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                    Toko</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nama_toko"
                                        placeholder="Nama Konsumen">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp Toko</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp_toko"
                                        placeholder="No HP">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat Toko</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat_toko"
                                        placeholder="Alamat"></textarea>
                                </div>
                            </div> -->
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Foto Toko</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm" name="foto_toko">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                    Owner</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nama_owner"
                                        placeholder="Nama Konsumen">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp Owner</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp_owner"
                                        placeholder="No HP">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat Owner</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat_owner"
                                        placeholder="Alamat"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Area</label>
                                <div class="col-sm-9">
                                    <select name="id_area" class="form-control" required>
                                        <option> Pilih Area </option>
                                        <?php foreach ($area as $value) { ?>
                                        <option value="<?= $value['id_area'] ?>">
                                            <?= $value['id_nama_area'] ?> - <?= $value['nama_area'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="kab_kota"
                                        placeholder="Alamat"></textarea>
                                </div>
                            </div>

                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                                <a class="btn btn-light btn-xs" href="<?= base_url('/akk/master_customer') ?>"><i
                                        class="mdi mdi-backburger icon-sm"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
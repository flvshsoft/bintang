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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/master_product') ?>"> Product </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('/akk/update_product') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Product</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control form-control-sm" name="id_product"
                                        value="<?= $model['id_product'] ?>">
                                    <input type="text" class="form-control form-control-sm" name="nama_product"
                                        value="<?= $model['nama_product'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Supplier
                                </label>
                                <div class="col-sm-9">
                                    <select name="id_supplier" class="form-control">
                                        <option value="<?= $model['id_supplier'] ?>"> <?= $model['nama_supplier'] ?>
                                        </option>
                                        <?php foreach ($supplier as $value) { ?>
                                        <option value="<?= $value['id_supplier'] ?>">
                                            <?= $value['nama_supplier'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Satuan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="satuan_product">
                                        <option><?= $model['satuan_product'] ?></option>
                                        <option>-</option>
                                        <option>Dus</option>
                                        <option>Ball</option>
                                        <option>Slop Pack</option>
                                        <option>Kotak</option>
                                        <option>Bungkus</option>
                                        <option>Unit</option>
                                        <option>Renteng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Stok Awal
                                    Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="stock_product"
                                        value="<?= $model['stock_product'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Area</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="area"
                                        value="<?= $model['area'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Defect</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="defect"
                                        value="<?= $model['defect'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sample</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="sample"
                                        value="<?= $model['sample'] ?>">
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                                <a class="btn btn-light btn-xs" href="<?= base_url('/akk/master_product') ?>"><i
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
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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/master_week') ?>"> Week </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('/akk/master_week/edit') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Week</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control form-control-sm" name="id_week"
                                        value="<?= $model['id_week'] ?>">
                                    <input type="text" class="form-control form-control-sm" name="nama_week"
                                        value="<?= $model['nama_week'] ?>">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bulan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm"
                                        name="bulan"><?= $model['bulan'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Bulan Week</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm"
                                        name="bulan_week"><?= $model['bulan_week'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tahun Week</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm"
                                        name="tahun_week"><?= $model['tahun_week'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status Week</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm"
                                        name="status_week"><?= $model['status_week'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status Closing</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" name="status_closing"
                                        value="<?= $model['status_closing'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status Aktif</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" name="status_aktif"
                                        value="<?= $model['status_aktif'] ?>">
                                </div>
                            </div>

                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                                <a class="btn btn-light btn-xs" href="<?= base_url('/akk/master_week') ?>"><i
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
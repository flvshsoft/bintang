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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/master_partner') ?>"> Partner </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('/akk/input_partner') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nama_lengkap"
                                        placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">HP / Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_hp"
                                        placeholder="No HP">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nik"
                                        placeholder="NIK">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">ALamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control form-control-sm" name="alamat"
                                        placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Set Karyawan</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="set_karyawan">
                                        <option>Pilih Karyawan</option>
                                        <option>Aku</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a class="btn btn-light btn-xs" href="<?= base_url('/akk/master_partner') ?>"><i
                                        class="mdi mdi-backburger icon-sm"></i></a>
                                <button type="submit" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
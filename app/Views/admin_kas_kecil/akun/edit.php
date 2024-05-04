<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('/akk/akun/edit') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cabang</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_branch">
                                        <option value="<?= $model['id_branch'] ?>"><?= $model['nama_branch'] ?> -
                                            <?= $model['nama_branch'] ?></option>
                                        <?php foreach ($branch as $value) { ?>
                                        <option value="<?= $value['id_branch'] ?>"><?= $value['nama_branch'] ?> -
                                            <?= $value['nama_branch'] ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail2"
                                        value="<?= $model['nama_user'] ?>" required name="nama_user">
                                    <input type="hidden" class="form-control form-control-sm" id="exampleInputEmail2"
                                        value="<?= $model['id_user'] ?>" required name="id_user">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail2"
                                        value="<?= $model['username'] ?>" required name="username">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputMobile"
                                         name="password" placeholder="Masukkan password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="level_user" required>
                                        <option><?= $model['level_user'] ?></option>
                                        <option value="admin">Admin</option>
                                        <option value="gudang">Gudang</option>
                                        <option value="ho">HO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <a href="<?= base_url('/akk/akun') ?>" class="btn btn-gradient-primary btn-xs tip-top">
                                    <i class="mdi mdi-backburger"></i>
                                </a>
                                <button class="btn btn-success btn-xs tip-top">
                                    <i class="mdi mdi-content-save-all icon-sm"></i>
                                </button>
                            </div>
                        </form>
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
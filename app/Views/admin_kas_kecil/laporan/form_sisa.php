<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/laporan') ?>">LAPORAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA PER AREA</h4>
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/laporan/form_sisa/print') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Id Area</label>
                                <div class="col-sm-9">
                                    <select required name="id_area" class="form-control form-control-sm select2">
                                        <option></option>
                                        <?php foreach ($area as $value) { ?>
                                        <option value="<?= $value['id_area'] ?>">
                                            <?= $value['id_nama_area'], ' - ', $value['nama_area'] ?>
                                        </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Salesman</label>
                                <div class="col-sm-9">
                                    <select required name="id_partner" class="form-control form-control-sm select2">
                                        <option></option>
                                        <?php foreach ($partner as $value) { ?>
                                        <option value="<?= $value['id_partner'] ?>">
                                            <?= $value['nama_lengkap'] ?>
                                        </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Start
                                    Date</label>
                                <div class="col-sm-9">
                                    <input required type="date" name="tgl_mulai" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">End
                                    Date</label>
                                <div class="col-sm-9">
                                    <input required type="date" name="tgl_berakhir"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm" type="submit"><i
                                        class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA ALL SALESMAN
                        </h4>
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Start
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">End
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                                <button class="btn btn-success btn-sm"><i
                                        class="mdi mdi-file-excel icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">KARYAWAN
                        </h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Start
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">End
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">INTERNAL
                        </h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Start
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">End
                                    Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</style>

<?= $this->endSection() ?>
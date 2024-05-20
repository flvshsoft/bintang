<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/laporan') ?>">LAPORAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">REPORT DATA ASSETS BY DRIVER
                        </h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Assets</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>FUSO FN62X (PUTIH) (BM 4478 AQJ)</option>
                                        <option>HINO SG260TH (HIJAU) (BM 3312 BF)</option>
                                        <option>FUSO FN62X (OREN) (BM 4478 AQB)</option>
                                        <option>HINO SG260TH (PUTIH) (BM 3321 FC)</option>
                                        <option>COLD DIESEL FE84G (B 1247 ASQ)</option>
                                        <option>HINO DUTRO HD130 (B 1987 AAS)</option>
                                        <option>TOYOTA FORTUNER (BM 5563 QS)</option>
                                        <option>HONDA SUPRA X125 (MERAH)(BM 4228 ABU)</option>
                                    </select>
                                </div>
                            </div>
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

<?= $this->endSection() ?>
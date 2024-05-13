<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan') ?>">DATA KEUANGAN</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/master_hutang') ?>">HUTANG</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata("kurang_saldo")) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata("kurang_saldo") ?>
                        </div>
                        <?php } ?>
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/keuangan/master_hutang/cicilan') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Bank</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="id_bank">
                                        <option>Pilih Bank</option>
                                        <?php foreach ($bank as $value) { ?>
                                        <option value="<?= $value['id_bank'] ?>"><?= $value['nama_bank'] ?>
                                        </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Input Cicilan</label>
                                <div class="col-sm-9">
                                    <input type="text" id="pay" class="form-control" value="0" name="cicilan">
                                    <input type="hidden" class="form-control" value="<?= $model['id_piutang_usaha'] ?>"
                                        name="id_piutang_usaha">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jumlah Piutang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly
                                        value="<?php
                                                                                            $jumlah = $model['jumlah_piutang'] - $model['jumlah_cicilan'];
                                                                                            echo 'Rp ' . number_format($jumlah, 0, '.', '.') ?>"
                                        name="jumlah_piutang">
                                </div>
                            </div>

                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/keuangan/master_hutang') ?>"
                                    class="btn btn-primary btn-xs"><i class="mdi mdi-backburger icon-sm"></i></a>
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
<script>
// Format angka saat diketikkan oleh pengguna
document.getElementById('pay').addEventListener('input', function() {
    // Ambil nilai input
    let payValue = this.value;

    // Hapus semua tanda titik yang ada
    payValue = payValue.replace(/\./g, '');

    // Format angka dengan titik sebagai pemisah ribuan
    payValue = new Intl.NumberFormat('id-ID').format(payValue);

    // Masukkan kembali nilai yang sudah diformat ke dalam input
    this.value = payValue;
});
</script>

<?= $this->endSection() ?>
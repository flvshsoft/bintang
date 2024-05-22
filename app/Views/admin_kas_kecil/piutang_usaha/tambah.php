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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/piutang_usaha') ?>"> PIUTANG </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/piutang_usaha/karyawan/tambah') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control form-control-sm" name="tgl_piutang"
                                        value="<?= date('Y-m-d H:i:s') ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Karyawan </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="nama_penghutang"
                                        placeholder="Nama Karyawan">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm"
                                        name="jumlah_piutang_karyawan" id="pay" placeholder="Jumlah Masuk">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <a href="<?= base_url('/akk/piutang_usaha/karyawan') ?>"
                                    class="btn btn-gradient-primary btn-xs tip-top">
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
<style>
.table-bordered-custom {
    border: 1px solid #000;
    /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
}

/* Tambahkan class ini pada tabel Anda */
</style>

<?= $this->endSection() ?>
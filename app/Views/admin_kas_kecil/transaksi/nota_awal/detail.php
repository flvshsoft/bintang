<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?= $judul ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> TRANSAKSI

                        </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/nota_awal') ?>"> DO Awal</a></li>

                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata("tak_lengkap")) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata("tak_lengkap") ?>
                        </div>
                        <?php } ?>
                        <form action="<?= base_url('/akk/transaksi/nota_awal/detail') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="col-12 col-form-label">MINGGU KE - <?= $info['week'] ?>
                                        </label>

                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <a class="text-black text-decoration-none">
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="preview-subject ellipsis mb-0 font-weight-normal">
                                                NO DO : <?= $info['id_sales'] ?>
                                                <input type="hidden" name="id_sales" class="form-control"
                                                    value="<?= $info['id_sales'] ?>">
                                                <input type="hidden" name="id_partner" class="form-control"
                                                    value="<?= $info['id_partner'] ?>">
                                            </h6>
                                            <p class="text-gray mb-0"> Area : <?= $info['nama_area'] ?> </p>
                                            <input type="hidden" name="id_area" class="form-control"
                                                value="<?= $info['id_area'] ?>">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 justify-content-center">
                                    <div class="form-group d-flex">
                                        <label class="col-3 col-form-label">METODE BAYAR</label>
                                        <label class="col-4 justify-content-start">
                                            <input type="text" class="form-control" value="<?= $payment_method ?>"
                                                disabled>
                                            <input type="hidden" name="payment_method" class="form-control"
                                                value="<?= $payment_method ?>">
                                        </label>
                                        <?php
                                        if ($payment_method == 'CASH') {
                                            $payment_method2 = 'KREDIT';
                                        } else {
                                            $payment_method2 = 'CASH';
                                        }
                                        ?>
                                        <a href="<?= base_url('akk/transaksi/nota_awal/detail/' . $info['id_sales'] . '/' . $payment_method2) ?>"
                                            class="btn"><i class="mdi mdi-sync"></i></a>
                                    </div>
                                    <div class="form-group d-flex mt-4">
                                        <label class="col-sm-3 col-form-label">FAKTUR NO</label>
                                        <div class="col-4 justify-content-start">
                                            <input type="text" class="form-control" name="no_nota" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-md-12 mb-0">
                                        <div class="form-group d-flex">
                                            <label class="col-5 col-form-label">TANGGAL</label>
                                            <div class="col-7">
                                                <input type="date" name="tgl_bayar" class="form-control"
                                                    value="<?= date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex">
                                            <label class="col-5 col-form-label">TOKO</label>
                                            <div class="col-7">
                                                <select class="form-control select2" required name="id_customer">
                                                    <option> Pilih Customer</option>
                                                    <?php foreach ($customer as $value) { ?>
                                                    <option name="id_customer" value="<?= $value['id_customer'] ?>">
                                                        <?= $value['nama_customer'] ?>
                                                        -
                                                        <?= $value['alamat_customer'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-right mb-1">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex">
                                                    <label class="col-5 col-form-label">Tagihan</label>
                                                    <div class="col-7">
                                                        <input type="text" id="pay" name="total_beli"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <button
                                                    class="btn btn-gradient-warning btn-rounded btn-fw float-end ms-auto">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($cek_nota as $value) {
                $string_tanggal_waktu = $value['created_at'];
                $datetime = new DateTime($string_tanggal_waktu);
                $tanggal_waktu_php = $datetime->format('d F Y H:i:s'); ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header">
                        <small class="text-muted"><?= $tanggal_waktu_php ?></small>
                    </div>
                    <div class="card-bodyx" style="padding:5%">
                        <h5 class="card-title text-center">Konsumen : <?= $value['nama_customer'] ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Area : <?= $value['nama_area'] ?> </li>
                        <li class="list-group-item">Salesman : <?= $value['nama_lengkap'] ?></li>
                        <li class="list-group-item">No Invoice : <?= $value['id_nota'] ?></li>
                        <li class="list-group-item">Metode Bayar : <?= $value['payment_method'] ?></li>
                        <li class="list-group-item">Harga : <?= $value['remark_jenis_harga'] ?>
                        </li>
                        <li class="list-group-item">Tagihan :
                            <?= 'Rp ' . number_format($value['total_beli'], 0, '.', '.') ?>
                        </li>
                    </ul>
                    <div class="" style="padding:3%">
                        <a href="<?= base_url('/akk/transaksi/nota_awal/detail/hapus/' . $value['id_nota'] . '/' . $payment_method) ?>"
                            onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                            class="d-flex justify-content-center align-items-center btn btn-danger btn-sm btn-rounded">
                            Hapus Nota</a>
                    </div>
                </div>
            </div>
            <?php }; ?>
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
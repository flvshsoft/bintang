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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/piutang_usaha') ?>"> RIWAYAT PIUTANG </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/piutang_usaha/input_pembayaran') ?>"> DETAIL
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">No. DO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" disabled name="id_sales" value="<?= $info['id_sales'] ?>">

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Salesman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" disabled value="<?= $info['nama_lengkap'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Area / Tujuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" disabled value="<?= $info['nama_area'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Minggu</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" disabled value="<?= $info['week'] ?>">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> NO </th>
                                        <th style="font-size: 11px;"> NO. Tagihan </th>
                                        <th style="font-size: 11px;"> No Nota </th>
                                        <th style="font-size: 11px;"> Salesman </th>
                                        <th style="font-size: 11px;"> Area</th>
                                        <th style="font-size: 11px;"> Konsumen </th>
                                        <th style="font-size: 11px;"> Total Tagihan </th>
                                        <th style="font-size: 11px;"> Tgl J Tempo </th>
                                        <th style="font-size: 11px;"> Top</th>
                                        <th style="font-size: 11px;"> Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $key => $value) {
                                        $total_tagihan = $value['total_beli'] - $value['pay'] ?>

                                        <tr>
                                            <form method="POST" action="<?= base_url('/akk/piutang_usaha/input/add') ?>">
                                                <td style="font-size: 11px;">
                                                    <?= $key + 1 ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value['id_nota'] ?>
                                                    <input type="hidden" class="form-control form-control-sm" name="id_nota" value="<?= $value['id_nota'] ?>">
                                                    <input type="hidden" class="form-control form-control-sm" name="id_sales" value="<?= $value['id_sales'] ?>">
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value['no_nota'] ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value['nama_lengkap'] ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value['nama_area'] ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= $value['nama_customer'] ?>
                                                </td>
                                                <td style="font-size: 11px;">
                                                    <?= 'Rp. ' . number_format($total_tagihan, 0, ',', '.'); ?>
                                                </td>
                                                <td style="font-size: 11px;">

                                                </td>
                                                <td style="font-size: 11px;">

                                                </td>
                                                <td style="font-size: 11px;" width="1090px">

                                                    <div class="btn-group btn-sm">
                                                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value['id_nota'] ?>">Cicil
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <button type="submit" class="dropdown-item">
                                                                    Lunas
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </form>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="exampleModal<?= $value['id_nota'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bayar Disini
                                                            <?= $value['id_nota'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form class="forms-sample" action="<?= base_url('/akk/piutang_usaha/input_pembayaran/add') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Input Pembayaran</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="Payment" name="pay" class="form-control form-control-sm" id="pay">
                                                                    <input type="hidden" class="form-control form-control-sm" name="id_sales" value="<?= $value['id_sales'] ?>">
                                                                    <input type="hidden" class="form-control form-control-sm" name="id_nota" value="<?= $value['id_nota'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
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
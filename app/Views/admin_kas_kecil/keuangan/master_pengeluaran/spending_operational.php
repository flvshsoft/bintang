<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?= $judul1 ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan') ?>">KEUANGAN</a></li>
                    <li class="breadcrumb-item"><a
                            href="<?= base_url('/akk/keuangan/master_pengeluaran') ?>">PENGELUARAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul1 ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Salesman </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputMobile"
                                        value="<?= $model['nama_lengkap'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Area / Tujuan </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="id_nama_area"
                                        value="<?= $model['id_nama_area'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">No. DO </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="id_sales"
                                        value="<?= $model['id_sales'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Minggu Ke - </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm"
                                        name="minggu_pengeluaran_sales"
                                        value="<?= $model['minggu_pengeluaran_sales'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Detail
                                    Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm"
                                        rows="3"><?= $model['keterangan_pengeluaran_sales'] ?></textarea>
                                </div>
                            </div>
                            <?php $dateString = $model['created_at'];
                            $dateTime = new DateTime($dateString);
                            $formattedDate = $dateTime->format('d F Y H:i:s'); ?>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tgl
                                    DO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" disabled
                                        value="<?= $formattedDate; ?>">
                                </div>
                            </div>

                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/keuangan/master_pengeluaran') ?>"
                                    class="btn btn-primary btn-xs"><i class="mdi mdi-backburger icon-sm"></i></a>
                                <button type="submit" class="btn btn-warning btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i> TRANSASCT</button>
                            </div>
                        </form><br>
                        <?php if (session()->getFlashdata("berhasil")) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata("berhasil") ?>
                        </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> KETERANGAN PENGELUARAN</th>
                                        <th style="font-size: 11px;"> BIAYA PENGELUARAN </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="<?= base_url('/akk/keuangan/spending_operational') ?>"
                                            method="POST">
                                            <td style="font-size: 11px;">
                                                <select class="form-control form-control-sm select2"
                                                    name="ket_pengeluaran">
                                                    <option> </option>
                                                    <option> AIR LISTRIK & INTERNET</option>
                                                    <option> ATK</option>
                                                    <option> ATM</option>
                                                    <option> BBM</option>
                                                    <option> BIAYA ADMINISTRASI</option>
                                                    <option> BIAYA AKOMODASI</option>
                                                    <option> BIAYA BARANG RUSAK</option>
                                                    <option> BIAYA BARANG SAMPLE</option>
                                                    <option> BIAYA KAPAL</option>
                                                    <option> BIAYA KIRIM & PAKET</option>
                                                    <option> BIAYA RETUR BARANG</option>
                                                    <option> BPJS</option>
                                                    <option> ENTERTAINT</option>
                                                    <option> GAJI KARYAWAN</option>
                                                    <option> HAMBA ALLAH</option>
                                                    <option> INSENTIF KARYAWAN & THR</option>
                                                    <option> INVENTARIS KANTOR</option>
                                                    <option> JASA SERVIS</option>
                                                    <option> KOORDINASI</option>
                                                    <option> LAIN - LAIN</option>
                                                    <option> MBAK YULI</option>
                                                    <option> OFFICE </option>
                                                    <option> OVERPRICE</option>
                                                    <option> PAJAK SURAT SURAT & KENDARAAN</option>
                                                    <option> PENGELUARAN OPERASIONAL SALESMAN </option>
                                                    <option> PENGINAPAN</option>
                                                    <option> PERBAIKAN & PERAWATAN KENDARAAN</option>
                                                    <option> PINJAMAN KARYAWAN</option>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" id="pay" name="nominal"
                                                    class="form-control form-control-sm">
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="id_sales" value="<?= $model['id_sales'] ?>" readonly>
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="id_pengeluaran_sales"
                                                    value="<?= $model['id_pengeluaran_sales'] ?>" readonly>

                                            </td>
                                            <td style="font-size: 11px;" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-xs "> S </button>
                                            </td>
                                        </form>
                                    </tr>
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

<?= $this->endSection() ?>
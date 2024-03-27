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
                                        value="JUNAIDI" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Area / Tujuan </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputMobile"
                                        value="PKUKVS" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">No. DO </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputMobile"
                                        value="160009911" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Minggu Ke - </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputMobile"
                                        value="39" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Detail
                                    Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm" placeholder="Remark"
                                        rows="3">Pengeluaran Operasional Salesman : JUNAIDI</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tgl
                                    DO</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm"
                                        id="exampleInputConfirmPassword2" value="25/09/2023" disabled>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/keuangan/master_pengeluaran') ?>"
                                    class="btn btn-primary btn-xs"><i class="mdi mdi-backburger icon-sm"></i></a>
                                <button type="submit" class="btn btn-warning btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i> TRANSASCT</button>
                            </div>
                        </form><br>
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> KETERANGAN PENGELUARAN</th>
                                        <th style="font-size: 11px;"> BIAYA PENGELUARAN </th>
                                        <th style="font-size: 11px;"> JUMLAH </th>
                                        <th style="font-size: 11px;"> TOTAL PENGELUARAN </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <select class="form-control form-control-sm">
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
                                                <option> PENGINAPAN</option>
                                                <option> PERBAIKAN & PERAWATAN KENDARAAN</option>
                                                <option> PINJAMAN KARYAWAN</option>
                                            </select>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td style="font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td style="font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td style="font-size: 11px;" class="text-center">
                                            <button class="btn btn-primary btn-xs "> S </button>
                                        </td>
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

<style>
.menu-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.menu-item a {
    display: flex;
    align-items: start;
    text-decoration: none;
    color: black;
}

.menu-item i {
    margin-right: 10px;
}
</style>

<?= $this->endSection() ?>
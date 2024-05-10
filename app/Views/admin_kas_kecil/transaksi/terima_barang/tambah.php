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
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/transaksi') ?>"> TRANSAKSI</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/master_sample') ?>"> SAMPLE</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">No. Sample</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" disabled value="220000079">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tgl. Pengeluaran
                                    Sampel</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nilai Sampel</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn btn-gradient-success btn-xs"><i class="mdi mdi-content-save-all icon-sm"></i> Transasct</button>
                                <a href="<?= base_url('/master_sample') ?>" class="btn btn-light btn-xs"> <i class="mdi mdi-backburger
"></i> Cancel</a>
                            </div>
                        </form><br>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> KODE BARANG </th>
                                        <th style=" font-size: 11px;"> NAMA BARANG </th>
                                        <th style=" font-size: 11px;"> STOCK GUDANG</th>
                                        <th style=" font-size: 11px;"> JUMLAH </th>
                                        <th style=" font-size: 11px;"> SATUAN </th>
                                        <th style=" font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <select class="form-control form-control-sm">
                                                <option></option>
                                                <option>10000020 - M.BOLD</option>
                                                <option>10000021 - M BLUE</option>
                                                <option>10000026 - BLUWISS</option>
                                                <option>10000032 - HIMA</option>
                                                <option>10000163 - SAHARA</option>
                                            </select>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm" disabled>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm" disabled>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td style="font-size: 11px;">
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <button class="btn btn-primary btn-xs">S</button>
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


<?= $this->endSection() ?>
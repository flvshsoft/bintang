<?= $this->extend('layout/admin'); ?>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('/closing_sales') ?>"> SALES</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/master_closing') ?>"> CLOSING</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card mb-0">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample">
                                <div class="form-group row mb-0">
                                    <label for="exampleInputUsername2" class="col-sm-5 col-form-label">No.
                                        Tagihan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="180032093">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputEmail2" class="col-sm-5 col-form-label">NO. DO</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control form-control-sm" disabled value="160011047">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputMobile" class="col-sm-5 col-form-label">Konsumen</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm">
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputPassword2" class="col-sm-5 col-form-label">Tgl
                                        Pembayaran</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="2023-11-28">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-5 col-form-label">Metode
                                        Pembayaran</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="KONTAN">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-5 col-form-label">Type
                                        Pembayaran</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="KAS">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-danger btn-xs" href="<?= base_url('/master_closing') ?>"><i class="mdi mdi-backburger icon-sm"></i>
                                        Cancel</a>
                                    <!-- </div>
                                <div class="form-group text-end"> -->
                                    <button type="submit" class="btn btn-warning btn-xs"><i class="mdi mdi-content-save-all icon-sm"></i> Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample">
                                <div class="form-group row mb-0">
                                    <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Pembayaran</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="1,736,500">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputEmail2" class="col-sm-5 col-form-label">Bayar</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="1,736,500">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputPassword2" class="col-sm-5 col-form-label">Area /
                                        Tujuan</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm">
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-5 col-form-label">Sisa
                                        Tagihan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" disabled value="0">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="exampleInputMobile" class="col-sm-5 col-form-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control form-control-sm" disabled rows="5">LUNAS</textarea>
                                    </div>
                                </div><br>
                                <button type="submit" class="btn btn-warning btn-xs"><i class="mdi mdi-content-save-all icon-sm"></i> Change</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;" colspan="8" class="table-warning text-center">
                                            CHECKOUT ITEM</th>
                                    </tr>
                                    <tr>
                                        <th style="font-size: 11px;"> KODE ITEM </th>
                                        <th style=" font-size: 11px;"> NAMA BARANG </th>
                                        <th style=" font-size: 11px;"> JUMLAH </th>
                                        <th style=" font-size: 11px;"> SATUAN </th>
                                        <th style=" font-size: 11px;"> HARGA</th>
                                        <th style=" font-size: 11px;"> SUBTOTAL </th>
                                        <th style=" font-size: 11px;"> DISKON</th>
                                        <th style=" font-size: 11px;"> TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            10000163
                                        </td>
                                        <td style=" font-size: 11px;">
                                            SAHARA
                                        </td>
                                        <td style="font-size: 11px;">
                                            105
                                        </td>
                                        <td style=" font-size: 11px;">
                                            BUNGKUS
                                        </td>
                                        <td style="font-size: 11px;">
                                            Rp. 7,500
                                        </td>
                                        <td style=" font-size: 11px;">
                                            Rp. 787,500
                                        </td>
                                        <td style="font-size: 11px;">
                                            Rp. 0
                                        </td>
                                        <td style="font-size: 11px;">
                                            Rp. 787,500
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            10000163
                                        </td>
                                        <td style=" font-size: 11px;">
                                            SAHARA
                                        </td>
                                        <td style="font-size: 11px;">
                                            130
                                        </td>
                                        <td style=" font-size: 11px;">
                                            BUNGKUS
                                        </td>
                                        <td style="font-size: 11px;">
                                            Rp. 7,300
                                        </td>
                                        <td style=" font-size: 11px;">
                                            Rp. 949,000
                                        </td>
                                        <td style="font-size: 11px;">
                                            Rp. 0
                                        </td>
                                        <td style="font-size: 11px;">
                                            Rp. 949,000
                                        </td>
                                    </tr>
                                    <tr class="table-info">
                                        <td style="font-size: 11px;" colspan="2">
                                            TOTAL JUMLAH & PENJUALAN
                                        </td>
                                        <td style=" font-size: 11px;" width="100px" colspan="3">

                                        </td>
                                        <td style="font-size: 11px;" width="100px">
                                            Rp.
                                        </td>
                                        <td style=" font-size: 11px;" width="100px">
                                            Rp.
                                        </td>
                                        <td style="font-size: 11px;" width="100px">
                                            Rp.
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
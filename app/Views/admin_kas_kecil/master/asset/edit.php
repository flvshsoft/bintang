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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/master_asset') ?>"> Asset </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('/akk/update_asset') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Nama Asset</label>
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control form-control-sm" name="id_asset"
                                        value="<?= $model['id_asset'] ?>">
                                    <input type="text" class="form-control form-control-sm" name="nama_asset"
                                        value="<?= $model['nama_asset'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Jenis Asset</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" name="jenis_asset">
                                        <option><?= $model['jenis_asset'] ?></option>
                                        <option>Jenis Asset</option>
                                        <option>Elektronik</option>
                                        <option>Kendaraan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Tahun Pembelian</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" name="tahun_pembelian">
                                        <option><?= $model['tahun_pembelian'] ?></option>
                                        <option>Pilih Tahun</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">No. PLat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="no_plat"
                                        value="<?= $model['no_plat'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">No. Mesin</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="no_mesin"
                                        value="<?= $model['no_mesin'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-4 col-form-label">No. Rangka</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="no_rangka"
                                        value="<?= $model['no_rangka'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Satuan</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" name="satuan">
                                        <option><?= $model['satuan'] ?></option>
                                        <option>Pilih Satuan</option>
                                        <option>-</option>
                                        <option>Dus</option>
                                        <option>Ball</option>
                                        <option>Slop Pack</option>
                                        <option>Kotak</option>
                                        <option>Bungkus</option>
                                        <option>Unit</option>
                                        <option>Renteng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Tanggal
                                    Berakhir
                                    KIR</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm" name="tgl_berakhir_kir"
                                        value="<?= $model['tgl_berakhir_kir'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Tanggal
                                    Berakhir
                                    Pajak
                                    STNK</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm"
                                        value="<?= $model['tgl_berakhir_pajak_stnk'] ?>" name="tgl_berakhir_pajak_stnk">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Tanggal
                                    Berakhir
                                    PLAT
                                </label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm" name="tgl_berakhir_plat"
                                        value="<?= $model['tgl_berakhir_plat'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Tanggal
                                    Service
                                </label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm" name="tgl_service"
                                        value="<?= $model['tgl_service'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-4 col-form-label">PIC</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" name="pic">
                                        <option><?= $model['pic'] ?></option>
                                        <option>Pilih Karyawan</option>
                                        <option>Aku</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Lokasi</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" name="lokasi">
                                        <option><?= $model['lokasi'] ?></option>
                                        <option>Pilih Lokasi</option>
                                        <option>OFFICE</option>
                                        <option>SALES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                                <a class="btn btn-light btn-xs" href="<?= base_url('/akk/master_asset') ?>"><i
                                        class="mdi mdi-backburger icon-sm"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
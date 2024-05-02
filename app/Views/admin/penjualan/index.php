<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?=$judul?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard')?>"> BERANDA </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 text-left">
                                <h3>MINGGU KE</h3><br>
                            </div>
                            <div class="col-md-3 preview-list">
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="<?= base_url()?>/public/assets/images/faces/face4.jpg" alt="image"
                                            class="profile-pic rounded">
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">PROFIL SALESMAN
                                        </h6>
                                        <p class="text-gray mb-0"> NO DO </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 justify-content-center">
                                <button type="button" class="btn btn-outline-primary btn-fw btn-sm btn-center">
                                    <h6> KONTAN / KREDIT</h6>
                                </button>
                                <div class="form-group d-flex mt-4">
                                    <label class="col-sm-2 col-form-label">
                                        FAKTUR NO :
                                    </label>
                                    <div class="col-sm-3 justify-content-start">
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12 mb-0">
                                    <div class="form-group d-flex">
                                        <label class="col-5 col-form-label">TANGGAL</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-0">
                                    <div class="form-group d-flex">
                                        <label class="col-5 col-form-label">TOKO</label>
                                        <div class="col-7">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th> NO </th>
                                        <th> QTY </th>
                                        <th> NAMA BARANG </th>
                                        <th>HARGA </th>
                                        <th> JUMLAH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Ny
                                        </td>
                                        <td>
                                            Rp 127.500
                                        </td>
                                        <td>
                                            Rp 637.500
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Sevel
                                        </td>
                                        <td>
                                            Rp 127.500
                                        </td>
                                        <td>
                                            Rp 637.500
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            <select class="form-control form-control-sm">
                                                <option value=""></option>
                                                <option value=""> Va</option>
                                                <option value=""> Sev</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            Rp
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-info">
                                    <tr>
                                        <td colspan="4">
                                            <h6><b>Total Rp:</b></h6>
                                        </td>
                                        <td colspan="2">
                                            <h6><b><?= "Rp 1.275.000" ?></h6></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row justify-content-right">
                            <div class="col-md-6">
                                <a href="<?= base_url('/admin/penjualan2')?>"
                                    class="btn btn-gradient-primary btn-rounded btn-fw">
                                    Next
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-gradient-warning btn-rounded btn-fw">
                                    Save
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?= $this->endSection() ?>
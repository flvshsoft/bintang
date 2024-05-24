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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/sdm') ?>"> SDM</a></li>
                    <li class="breadcrumb-item active">
                        <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> NO</th>
                                        <th style="font-size: 11px;"> NO INDUK KARYAWAN </th>
                                        <th style="font-size: 11px;"> NAMA LENGKAP </th>
                                        <th style="font-size: 11px;"> STATUS </th>
                                        <th style="font-size: 11px;"> CLOCK </th>
                                        <th style="font-size: 11px;"> STATUS POSISI </th>
                                        <th style="font-size: 11px;"> CREATED BY </th>
                                        <th style="font-size: 11px;"> CREATED DATE </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            54070
                                        </td>
                                        <td style="font-size: 11px;">
                                            002.240122.023
                                        </td>
                                        <td style="font-size: 11px;">
                                            AMIN
                                        </td>
                                        <td style="font-size: 11px;">
                                            IN
                                        </td>
                                        <td style="font-size: 11px;">
                                            11:03:29
                                        </td>
                                        <td style="font-size: 11px;">
                                            OUTSTATION
                                        </td>
                                        <td style="font-size: 11px;">
                                            AMIN
                                        </td>
                                        <td style="font-size: 11px;">
                                            2023-10-02 11:03:29
                                        </td>
                                        <td style="font-size: 11px;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                                                    class="mdi mdi-image icon-md"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            54059
                                        </td>
                                        <td style="font-size: 11px;">
                                            002.050420.010
                                        </td>
                                        <td style="font-size: 11px;">
                                            ADE SAPUTRA
                                        </td>
                                        <td style="font-size: 11px;">
                                            IN
                                        </td>
                                        <td style="font-size: 11px;">
                                            08:48:26
                                        </td>
                                        <td style="font-size: 11px;">
                                            OUTSTATION
                                        </td>
                                        <td style="font-size: 11px;">
                                            ADE SAPUTRA
                                        </td>
                                        <td style="font-size: 11px;">
                                            2023-10-02 08:48:26
                                        </td>
                                        <td style="font-size: 11px;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1"> <i
                                                    class="mdi mdi-image icon-md"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            54048
                                        </td>
                                        <td style="font-size: 11px;">
                                            002.310123.026 </td>
                                        <td style="font-size: 11px;">
                                            FIRMAN
                                        </td>
                                        <td style="font-size: 11px;">
                                            IN
                                        </td>
                                        <td style="font-size: 11px;">
                                            08:43:49
                                        </td>
                                        <td style="font-size: 11px;">
                                            OUTSTATION
                                        </td>
                                        <td style="font-size: 11px;">
                                            FIRMAN
                                        </td>
                                        <td style="font-size: 11px;">
                                            2023-10-02 08:43:49 </td>
                                        <td style="font-size: 11px;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"> <i
                                                    class="mdi mdi-image icon-md"></i></a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('/public/assets/images/faces/face1.jpg') ?>"
                    class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('/public/assets/images/faces/face3.jpg') ?>"
                    class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('/public/assets/images/faces/face4.jpg') ?>"
                    class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>



<style>
.table-bordered-custom {
    border: 1px solid #000;
    /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
}

/* Tambahkan class ini pada tabel Anda */
</style>

<?= $this->endSection() ?>
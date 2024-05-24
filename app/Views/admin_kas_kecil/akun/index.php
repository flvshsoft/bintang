<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <a class="btn btn-primary tip-top" data-original-title="Create Employee" data-togle="tooltip"
                                    href="<?= base_url('/akk/akun/tambah') ?>">
                                    <i class="mdi mdi-database-plus icon-md"></i> Tambah Akun
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-success">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Username </th>
                                        <th style="font-size: 11px;"> Nama </th>
                                        <th style="font-size: 11px;"> Cabang </th>
                                        <th style="font-size: 11px;"> Level </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) { ?>
                                    <tr>
                                        <td style="font-size: 11px;"><?= $no++ ?></td>
                                        <td style="font-size: 11px;"><?= $value['username'] ?></td>
                                        <td style="font-size: 11px;"><?= $value['nama_user'] ?></td>
                                        <td> <?= $value['nama_branch'] ?> - <?= $value['cabang'] ?></td>
                                        <td style="font-size: 11px;"><?= $value['level_user'] ?></td>
                                        <td style="font-size: 11px;">
                                            <a href="<?= base_url('/akk/akun/edit/' . $value['id_user']) ?>">
                                                <i class="mdi mdi-pencil-circle icon-md"></i>
                                            </a>
                                            <a href="<?= base_url('/akk/akun/hapus/' . $value['id_user']) ?>"
                                                onclick="return confirm('Apakah Karyawan Anda yakin Menghapus Data Karyawan ?')">
                                                <i class="mdi mdi-close-circle icon-md text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php }
                                    $no++; ?>
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
.table-bordered-custom {
    border: 1px solid #000;
    /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
}

/* Tambahkan class ini pada tabel Anda */
</style>

<?= $this->endSection() ?>
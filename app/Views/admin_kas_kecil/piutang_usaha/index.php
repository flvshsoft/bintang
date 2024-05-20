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
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <a class="btn btn-success btn-xs" href="<?= base_url('/akk/piutang_usaha/form') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Piutang Intern</a>
                                <a class="btn btn-danger btn-xs" href="<?= base_url('/akk/piutang_usaha/input_pembayaran') ?>">
                                    <i class="mdi mdi-cash-usd icon-sm"></i> Pelunasan</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> ID </th>
                                        <th style="font-size: 11px;"> NO TAGIHAN </th>
                                        <th style="font-size: 11px;"> NO. DO </th>
                                        <th style="font-size: 11px;"> SALESMAN </th>
                                        <th style="font-size: 11px;"> COSTUMER </th>
                                        <th style="font-size: 11px;"> PAYMENT </th>
                                        <th style="font-size: 11px;"> WEEK </th>
                                        <th style="font-size: 11px;"> CREATED DATE </th>
                                        <th style="font-size: 11px;"> CREATED BY </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $value) { ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= $value['id_nota_detail'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <b>
                                                    <!-- <a onclick="return confirm('Anda Yakin Ingin Membatalkan?')"
                                                    style="text-decoration: none;"
                                                    href="<? //= base_url('/akk/piutang_usaha/hapus/' . $value['id_nota']) 
                                                            ?>"> -->
                                                    <?= $value['id_nota'] ?>
                                                    <!-- </a> -->
                                                </b>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['id_sales'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_lengkap'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_customer'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['payment_method'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['weeks'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['created_at'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?= $value['nama_user'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <div class="justify-content-center">
                                                    <a href="#">
                                                        <i class="mdi mdi-pencil-circle icon-md"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
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

<style>
    .table-bordered-custom {
        border: 1px solid #000;
        /* Ganti dengan warna dan ketebalan sesuai preferensi Anda */
    }

    /* Tambahkan class ini pada tabel Anda */
</style>

<?= $this->endSection() ?>
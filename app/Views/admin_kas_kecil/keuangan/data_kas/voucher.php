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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/data_kas') ?>">DATA KAS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul1 ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>No Voucher</p>
                            <p>Sources </p>
                            <p>Bank Name</p>
                            <p>Remark</p>
                            <p>Value</p>
                            <p>Created Date</p>
                            <p>Created By</p>
                        </div>
                        <div class="col-5">
                            <p>: 160876</p>
                            <p>: 160876</p>
                            <p>: BANK BRI</p>
                            <p>: TRANSFER SALESMAN</p>
                            <p>: Rp. 17,000,000 </p>
                            <p>: 2023-09-30 00:00:00</p>
                            <p>: ADE</p>
                        </div>
                        <div class="form-group text-center mb-0">
                            <a href="<?= base_url('/akk/keuangan/data_kas') ?>" class=" btn btn-warning btn-xs"><i
                                    class="mdi mdi-backburger icon-sm"></i></a>
                            <!-- <button type="submit" class="btn btn-warning btn-xs"><i
                                    class="mdi mdi-content-save-all icon-sm"></i></button> -->
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
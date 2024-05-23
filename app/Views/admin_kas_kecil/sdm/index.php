<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">DATA SDM</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DATA SDM</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="template-demo">
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/master_cuti') ?>"> <i
                                        class="mdi mdi-message-text menu-icons"></i>
                                    <h6>Approve Leace Request</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/master_izin') ?>">
                                    <i class="mdi mdi-transit-transfer menu-icons"></i>
                                    <h6>Approve Work Off Permission</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/master_') ?>">
                                    <i class="mdi mdi-google-play menu-icons"></i>
                                    <h6>Apps Absen Play Store</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/sdm/karyawan') ?>">
                                    <i class="mdi mdi-account-box menu-icons"></i>
                                    <h6>General</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/master_absen_gaji') ?>">
                                    <i class="mdi mdi-wallet menu-icons"></i>
                                    <h6>Payroll</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/master_absen') ?>">
                                    <i class="mdi mdi-timer menu-icons"></i>
                                    <h6>Time Management</h6>
                                </a>
                            </div>
                            <hr>
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

/* .menu-icons {
        margin-right: 10px;
    }

    a {
        text-decoration: none;
        color: black;
    } */

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
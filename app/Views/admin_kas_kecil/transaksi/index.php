<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>
<?php $akses = (($level_user == 'ho') || ($level_user == 'superadmin')); ?>
<?php $akses_admin = (($level_user == 'ho') || ($level_user == 'superadmin') || (strtolower($level_user) == 'admin')); ?>
<?php $akses_gudang = (($level_user == 'ho') || ($level_user == 'superadmin') || (strtolower($level_user) == 'gudang')); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header" style="margin-top:-40px;">
            <h3 class="page-title" style="color:#fd79b3"><?= $judul ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
            </nav>
        </div>
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <!-- Color System -->
                <div class="row p-2">

                    <?php if ($akses_gudang) : ?>
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/ambil_barang') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #eebf35;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h5>Pengambilan Barang</h5>
                                            <h2 class="mb-0">DO</h2>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/564x/59/26/74/592674493a167bddfdcb6972d9e19d77.jpg" alt="Foto" width="100%" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($akses_admin) : ?>
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/tagihan_baru') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #b7e5fc;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h5>Input Tagihan Baru</h5>
                                            <h2 class="mb-0">Nota</h2>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/564x/c0/c1/2d/c0c12d0054ac3fa10430f561bf26bcc0.jpg" alt="Foto" width="100%" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($akses) : ?>
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/purchase_order') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #7cddb2;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h6>Purchase Order</h6>
                                            <h2 class="mb-0">PO</h2>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/564x/c3/d6/d5/c3d6d5874c5147ae9617138d384fef32.jpg" alt="Foto" width="100%" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <!-- <div class="col-lg-4 mb-3 px-2">
                        <a href="#<?= base_url('/akk/transaksi/ambil_barang') ?>" class="text-decoration-none">
                            <div class="card text-white shadow" style="background: #fd79b3;">
                                <div class="card-body d-flex p-0">
                                    <div class="col-6 p-3 text-white-90">
                                        <h6>Pengeluaran Stock Sample</h6>
                                        <h2 class="mb-0">-</h2>
                                    </div>
                                    <div class="col-6 p-0">
                                        <img src="https://i.pinimg.com/564x/a0/ec/b0/a0ecb07bb90c12dcf046e476db0fe7c4.jpg"
                                            alt="Foto" width="100%" class="mt-2">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> -->
                    <?php if ($akses_gudang) : ?>
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/stock_akhir') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #fd79b3;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h6>Stock Akhir Salesman</h6>
                                            <h2 class="mb-0">-</h2>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/564x/a0/ec/b0/a0ecb07bb90c12dcf046e476db0fe7c4.jpg" alt="Foto" width="100%" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-md-6 grid-margin stretch-card d-none">
                <div class="card">
                    <div class="card-body">
                        <div class="template-demo">
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/transaksi/tagihan_baru') ?>"> <i class="mdi mdi-cloud-check icon-md"></i>
                                    <h6> Input Tagihan Baru</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/transaksi/ambil_barang') ?>">
                                    <i class="mdi mdi-archive text-dark icon-md"></i>
                                    <h6> Pengambilan Barang</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="#<?= base_url('/akk/transaksi/master_defect') ?>">
                                    <i class="mdi mdi-tag icon-md text-secondary"></i>
                                    <h6 class="text-secondary"> Pengeluaran Stock Defect</h6>
                                </a>
                            </div>
                            <hr>
                            <div class="menu-item">
                                <a href="#<?= base_url('/akk/transaksi/master_sample') ?>">
                                    <i class="mdi mdi-truck icon-md text-secondary"></i>
                                    <h6 class="text-secondary"> Pengeluaran Stock Sample</h6>
                                </a>
                            </div>
                            <?php if ($akses) : ?>
                                <hr>
                                <div class="menu-item">
                                    <a href="<?= base_url('/akk/transaksi/purchase_order') ?>">
                                        <i class="mdi mdi-calendar-multiple-check icon-md text-secondary"></i>
                                        <h6> Purchase order</h6>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <hr>
                            <div class="menu-item">
                                <a href="<?= base_url('/akk/transaksi/stock_akhir') ?>">
                                    <i class="mdi mdi-undo icon-md text-secondary"></i>
                                    <h6> Stock Akhir Salesman</h6>
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
        margin-bottom: 15px;
    }

    /* .icon-md {
    margin-right: 10px;
}

a {
    text-decoration: none;
    color: black;
} */

    .menu-item a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: black;
    }

    .menu-item i {
        margin-right: 10px;
    }
</style>
<?= $this->endSection() ?>
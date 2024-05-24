<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<?php $akses_super_admin = ($level_user == 'superadmin') ?>
<?php $akses_admin = (($level_user == 'superadmin') || ($level_user == 'admin')) ?>
<?php $akses_gudang = (($level_user == 'superadmin') || ($level_user == 'gudang')) ?>
<?php $akses_ho = (($level_user == 'superadmin') || ($level_user == 'ho')) ?>
<?php $akses_ho_gudang = (($level_user == 'superadmin') || ($level_user == 'hogudang')) ?>
<?php $akses_ho_keuangan = (($level_user == 'superadmin') || ($level_user == 'hokeuangan')) ?>

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
                <?php if ($akses_ho) : ?>
                    <div class="row p-2">
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
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/terima_barang') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #eebf35;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h5>Terima Barang</h5>
                                            <h2 class="mb-0">PO</h2>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/564x/59/26/74/592674493a167bddfdcb6972d9e19d77.jpg" alt="Foto" width="100%" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/nota_awal') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #b68c74;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h5>DO & Nota</h5>
                                            <h3 class="mb-0">Nota Awal</h3>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/236x/f1/fa/ce/f1face2336d2a781b93c81cf368647d2.jpg" alt="Foto" width="100%" class="mt-0">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
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
                    </div>
                <?php elseif ($akses_admin) : ?>
                    <div class="row p-2">
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/nota_awal') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #b68c74;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h5>DO & Nota</h5>
                                            <h3 class="mb-0">Nota Awal</h3>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/236x/f1/fa/ce/f1face2336d2a781b93c81cf368647d2.jpg" alt="Foto" width="100%" class="mt-0">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
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
                    </div>
                <?php elseif ($akses_gudang) : ?>
                    <div class="row p-2">
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
                    </div>
                <?php elseif ($akses_ho_gudang) : ?>
                    <div class="row p-2">
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
                        <div class="col-lg-4 mb-3 px-2">
                            <a href="<?= base_url('/akk/transaksi/terima_barang') ?>" class="text-decoration-none">
                                <div class="card text-white shadow" style="background: #eebf35;">
                                    <div class="card-body d-flex p-0">
                                        <div class="col-6 p-3 text-white-90">
                                            <h5>Terima Barang</h5>
                                            <h2 class="mb-0">PO</h2>
                                        </div>
                                        <div class="col-6 p-0">
                                            <img src="https://i.pinimg.com/564x/59/26/74/592674493a167bddfdcb6972d9e19d77.jpg" alt="Foto" width="100%" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif ?>
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
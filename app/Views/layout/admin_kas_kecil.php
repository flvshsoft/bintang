<?php

use CodeIgniter\Session\Session;

if (!isset(Session('userData')['nama_user'])) {
    Header("Location: " . base_url('/'));
    exit;
}
$level_user = Session('userData')['level_user'];
$akses = (($level_user == 'ho') || ($level_user == 'superadmin'));
?>
<?php $akses_admin = (($level_user == 'ho') || ($level_user == 'superadmin') || (strtolower($level_user) == 'admin')); ?>
<?php $akses_gudang = (($level_user == 'ho') || ($level_user == 'superadmin') || (strtolower($level_user) == 'gudang')); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $judul ?>
    </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>/public/assets/images/favicon1.ico" />
    <link href="<?= base_url() ?>/public/assets/vendors/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- font -->
    <link href="https://db.onlinewebfonts.com/c/c3264a2601f855aef183e1892c5504db?family=Sacramento" rel="stylesheet">
    <style>
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 0;
        }

        /* icon app */

        .navbar .navbar-brand-wrapper .navbar-brand {
            font-size: 15px;
            font-weight: 600;
        }

        .navbar .navbar-brand-wrapper .navbar-brand img {
            width: 50px;
            height: 50px;
            margin-left: 0px;
            margin-right: 5%;
        }

        /* tulisan menu active */
        .sidebar .nav .nav-item.active>.nav-link .menu-title {
            padding: 2% 5% 2% 5%;
            font-size: 16px;
            font-weight: 600;
            color: #294B29;
        }


        /* icon menu */
        .sidebar .nav .nav-item .nav-link i.menu-icon {
            color: #FFCF9D;
            font-size: 28px;
            margin-left: 0;
            margin-right: 10px;
        }

        /* icon menu active */
        .sidebar .nav .nav-item.active>.nav-link i {
            color: #436850;
            font-size: 28px;
            margin-left: 20px;
            margin-right: 0px;
        }

        /* off kan putih */
        .sidebar .nav .nav-item.active {
            padding: 3%;
            background-color: #436850;
        }

        /* menu active */
        .sidebar .nav .nav-item.active>a {
            background: #ffffffc7;
            border-radius: 10px;
            padding: 5% 4% 5% 4%;
        }

        .sidebar .nav .nav-item:hover {
            /* padding: 3%; */
            /* margin: 3%; */
            background: #ffffff8c;
            border-radius: 10px;
        }

        /* menu off */
        .sidebar .nav .nav-item .nav-link .menu-title {
            font-size: 16px;
            font-weight: 600;
            color: #FFFFFF;
        }

        /* sub menu */
        .sidebar .nav .nav-item .collapse {
            margin-left: 20%;
        }

        /* nav ul .active>a {
            background: #E95793;
            border-radius: 10px;
            color: #FFFFFF;
        } */

        nav ul .active>a .xn-text {
            color: #FFFFFF;
        }

        nav ul .active>a .fa {
            color: #FFFFFF;
        }

        nav ul li>a .fa {
            color: #33414e;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:#436850 ;">
            <a class="navbar-brand brand-logo text-white d-flex p-3 mt-4" href="#">
                <div style="background: #FFFFFFc7;border-radius:50%;padding:3%;width:30%;margin-top:0px;">
                    <img src="<?= base_url('') ?>/public/assets/images/logo.png" alt="logo" width="50px" style="background: #ffffffa8;border-radius:30px;padding:3%;" />
                </div>
                <div class="d-block mt-2 ms-2">
                    <h3 class="text-start" style="font-family: 'Sacramento';">Bintang</h3>
                    <h6 style="color:#FFCF9D;font-size:8px;">bintang rezeki madistro</h6>
                </div>
            </a>
            <a class="navbar-brand brand-logo-mini" href="/">
                <img src="<?= base_url('')
                            ?>/public/assets/images/logo-mini.png" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" id="sidebarToggle">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-link-variant"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                    </div>
                </li> -->
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">
                                Hai, <?= Session('userData')['nama_user'] ?> ,
                                <?= Session('userData')['nama_branch'] ?>
                            </p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached me-2 text-success"></i> Ganti Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('/logout') ?>">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" id="sidebarToggle" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#436850 ">
            <ul class="nav pt-4">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/akk/dashboard">
                        <i class="mdi mdi-compass menu-icon text-whitex text-shadow"></i>
                        <span class="menu-title">Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-server-network text-whitex text-shadowx"></i>
                        <span class="menu-title">Master</span>
                        <i class="menu-arrow text-whitex"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_area') ?>"> Area</a> </li>
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_asset') ?>">Asset</a></li>
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_bank') ?>">Bank</a></li>
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_product') ?>">Barang</a></li>
                            <?php if ($akses) : ?>
                                <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_barang_harga') ?>">Barang Harga</a></li>
                            <?php endif; ?>
                            <!-- <li class="nav-item"> <a class="nav-link text-black"
                                    href="<?= base_url('/akk/master_price') ?>">Harga</a></li> -->
                            <!-- <li class="nav-item"> <a class="nav-link text-black"
                                    href="<?= base_url('/akk/master_branch') ?>">Branch</a></li> -->
                            <!-- <li class="nav-item"> <a class="nav-link text-black"
                                    href="<?= base_url('/akk/master_jenis_cuti') ?>">Jenis Cuti</a></li> -->
                            <!-- <li class="nav-item"> <a class="nav-link text-black"
                                    href="<?= base_url('/akk/master_jenis_harga') ?>">Jenis Harga</a></li> -->
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_customer') ?>">Konsumen</a></li>
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_lokasi') ?>">Lokasi</a></li>
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_partner') ?>">Salesman</a></li>
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_supplier') ?>">Supplier</a></li>
                            <!-- <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/stock') ?>">Stock</a></li> -->
                            <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/master_week') ?>">Week</a></li>
                            <?php if ($akses) : ?>
                                <li class="nav-item"> <a class="nav-link text-black" href="<?= base_url('/akk/akun') ?>">Akun</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>akk/transaksi">
                        <i class="mdi mdi-cart menu-icon text-whitex text-shadow"></i>
                        <span class="menu-title">Transaksi</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>akk/transaksi/nota_awal">
                        <i class="mdi mdi-note-plus menu-icon text-whitex text-shadow"></i>
                        <span class="menu-title">Nota Awal</span>
                    </a>
                </li> -->

                <?php if ($akses_admin) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/akk/keuangan">
                            <i class="mdi mdi-book-open menu-icon text-whitex text-shadow"></i>
                            <span class="menu-title">Keuangan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>akk/piutang_usaha">
                            <i class="mdi mdi-calendar-check menu-icon text-whitex text-shadow"></i>
                            <span class="menu-title">Piutang Usaha</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>akk/kas">
                            <i class="mdi mdi-calendar-check menu-icon text-whitex text-shadow"></i>
                            <span class="menu-title">Kas</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>akk/laporan">
                        <i class="mdi mdi-file-pdf-box menu-icon text-whitex text-shadow"></i>
                        <span class="menu-title">Laporan</span>
                    </a>
                </li>

                <?php if ($akses_admin) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>/akk/karyawan">
                            <i class="mdi mdi-comment-account-outline menu-icon text-whitex text-shadow"></i>
                            <span class="menu-title">Karyawan</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/logout">
                        <i class="mdi mdi-logout menu-icon text-whitex text-shadow"></i>
                        <span class="menu-title">Keluar</span>
                    </a>
                </li>
            </ul>
            <!-- <img src="https://i.pinimg.com/originals/da/41/06/da41069961bd2c79a786abb69328c9fc.gif" alt="Foto" width="100%" class="mt-0 p-2" style="border-radius: 30px;"> -->
        </nav>
        <!-- partial -->
        <?= $this->renderSection('content'); ?>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>/public/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url() ?>/public/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url() ?>/public/assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url() ?>/public/assets/js/dashboard.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/todolist.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- End custom js for this page -->
    <script src="<?= base_url() ?>/public/assets/vendors/datatables/jquery.dataTables.min.js">
    </script>
    <script src="<?= base_url() ?>/public/assets/vendors/datatables/dataTables.bootstrap4.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#sidebar').addClass('hidden');
            $('#sidebarToggle').on('click', function() {
                $('#sidebar').toggleClass('hidden');
            });
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/public/assets/js/demo/datatables-demo.js"></script>
</body>

</html>
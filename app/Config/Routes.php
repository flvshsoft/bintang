<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('/', 'LoginController::index');
$routes->get('/dashboard', 'admin\dashboardController::index');
$routes->get('/akk/dashboard', 'admin_kas_kecil\dashboardController::index');
$routes->get('/akk/master_area', 'admin_kas_kecil\master\areaController::index');
$routes->post('/akk/input_area', 'admin_kas_kecil\master\areaController::input');
$routes->get('/akk/del_area/(:any)', 'admin_kas_kecil\master\areaController::hapus/$1');
$routes->get('/akk/master_asset', 'admin_kas_kecil\master\assetController::index');
$routes->get('/akk/form_asset', 'admin_kas_kecil\master\assetController::tambah_asset');
$routes->get('/akk/form_detail_asset/(:any)', 'admin_kas_kecil\master\assetController::edit/$1');
$routes->post('/akk/input_asset', 'admin_kas_kecil\master\assetController::input');
$routes->post('/akk/update_asset', 'admin_kas_kecil\master\assetController::update');

$routes->get('/akk/master_partner', 'admin_kas_kecil\master\partnerController::index');
$routes->get('/akk/partner', 'admin_kas_kecil\master\partnerController::tambah_partner');
$routes->post('/akk/input_partner', 'admin_kas_kecil\master\partnerController::input');
$routes->get('/akk/del_partner/(:any)', 'admin_kas_kecil\master\partnerController::hapus/$1');
$routes->get('/akk/form_partner/(:any)', 'admin_kas_kecil\master\partnerController::edit/$1');
$routes->post('/akk/update_partner', 'admin_kas_kecil\master\partnerController::update');

$routes->get('/akk/master_supplier', 'admin_kas_kecil\master\supplierController::index');
$routes->get('/akk/supplier', 'admin_kas_kecil\master\supplierController::tambah_supplier');
$routes->post('/akk/input_supplier', 'admin_kas_kecil\master\supplierController::input');
$routes->get('/akk/del_supplier/(:any)', 'admin_kas_kecil\master\supplierController::hapus/$1');
$routes->get('/akk/form_supplier/(:any)', 'admin_kas_kecil\master\supplierController::edit/$1');
$routes->post('/akk/update_supplier', 'admin_kas_kecil\master\supplierController::update');

$routes->get('/akk/master_product', 'admin_kas_kecil\master\productController::index');
$routes->get('/akk/product', 'admin_kas_kecil\master\productController::tambah_product');
$routes->post('/akk/input_product', 'admin_kas_kecil\master\productController::input');
$routes->get('/akk/del_product/(:any)', 'admin_kas_kecil\master\productController::hapus/$1');
$routes->get('/akk/form_product/(:any)', 'admin_kas_kecil\master\productController::edit/$1');
$routes->post('/akk/update_product', 'admin_kas_kecil\master\productController::update');

$routes->get('/akk/master_customer', 'admin_kas_kecil\master\customerController::index');
$routes->get('/akk/customer', 'admin_kas_kecil\master\customerController::tambah');
$routes->post('/akk/input_customer', 'admin_kas_kecil\master\customerController::input');
$routes->get('/akk/del_customer/(:any)', 'admin_kas_kecil\master\customerController::hapus/$1');
$routes->get('/akk/form_customer/(:any)', 'admin_kas_kecil\master\customerController::edit/$1');
$routes->post('/akk/update_customer', 'admin_kas_kecil\master\customerController::update');

//transaksi
$routes->get('/akk/transaksi', 'admin_kas_kecil\transaksiController::index');
$routes->get('/akk/transaksi/ambil_barang', 'admin_kas_kecil\transaksi\AmbilBarangController::index');
$routes->get('/akk/transaksi/penjualan_barang', 'admin_kas_kecil\transaksi\AmbilBarangController::tambah');
$routes->post('/akk/transaksi/save_penjualan_barang', 'admin_kas_kecil\transaksi\AmbilBarangController::input');
$routes->get('/akk/transaksi/hapus_penjualan_barang/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::hapus/$1');
$routes->get('/akk/transaksi/print_penjualan_barang/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::print/$1');
$routes->get('/akk/transaksi/edit_penjualan_barang/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::edit/$1');
$routes->post('/akk/transaksi/edit_penjualan_barang', 'admin_kas_kecil\transaksi\AmbilBarangController::update');
$routes->get('/akk/transaksi/ambil_barang/detail/edit/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::edit_detail_sales/$1');
$routes->get('/akk/transaksi/ambil_barang/detail/tambah/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::detail_tambah/$1');
$routes->get('/akk/transaksi/ambil_barang/detail/hapus/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::hapus_detail_sales/$1');
$routes->get('/akk/transaksi/ambil_barang/detail/(:any)', 'admin_kas_kecil\transaksi\AmbilBarangController::detail/$1');
$routes->post('/akk/transaksi/ambil_barang/detail/tambah', 'admin_kas_kecil\transaksi\AmbilBarangController::input_detail_sales');
$routes->post('/tambah_nama_barang', 'admin_kas_kecil\transaksi\AmbilBarangController::tambah_nama_barang');
$routes->post('/akk/transaksi/ambil_barang/detail/edit', 'admin_kas_kecil\transaksi\AmbilBarangController::update_detail_sales');

$routes->get('/akk/transaksi/tagihan_baru', 'admin_kas_kecil\transaksi\TagihanBaruController::index');
$routes->get('/akk/transaksi/tagihan_baru/riwayat_penjualan', 'admin_kas_kecil\transaksi\TagihanBaruController::master_closing');
$routes->post('/akk/transaksi/tagihan_baru/nota/detail/edit', 'admin_kas_kecil\transaksi\TagihanBaruController::edit_detail_closing');
$routes->get('/akk/transaksi/tagihan_baru/nota/detail/hapus/(:any)', 'admin_kas_kecil\transaksi\TagihanBaruController::hapus_detail/$1');
$routes->get('/akk/transaksi/tagihan_baru/nota/detail/(:any)', 'admin_kas_kecil\transaksi\TagihanBaruController::closing_detail/$1');
$routes->get('/akk/transaksi/tagihan_baru/riwayat_penjualan/print/(:any)', 'admin_kas_kecil\transaksi\TagihanBaruController::print/$1');
// nota
$routes->get('/akk/transaksi/tagihan_baru/nota/(:any)', 'admin_kas_kecil\transaksi\TagihanBaruController::closing/$1');
$routes->post('/akk/transaksi/tagihan_baru/nota', 'admin_kas_kecil\transaksi\TagihanBaruController::input_closing');
$routes->post('/akk/transaksi/tagihan_baru/nota/detail', 'admin_kas_kecil\transaksi\TagihanBaruController::input_detail_closing');
// closing sales
$routes->get('/akk/transaksi/tagihan_baru/closing-sales/(:any)', 'admin_kas_kecil\transaksi\TagihanBaruController::closing_sales/$1');
$routes->post('/akk/transaksi/tagihan_baru/closing-sales', 'admin_kas_kecil\transaksi\TagihanBaruController::closing_sales_save');


$routes->get('/akk/transaksi/stock_akhir', 'admin_kas_kecil\transaksi\StockAkhirController::index');
$routes->get('/akk/transaksi/stock_akhir/tambah', 'admin_kas_kecil\transaksi\StockAkhirController::tambah');
$routes->post('/akk/transaksi/stock_akhir/tambah', 'admin_kas_kecil\transaksi\StockAkhirController::input');
$routes->get('/akk/transaksi/stock_akhir/edit/(:any)', 'admin_kas_kecil\transaksi\StockAkhirController::edit/$1');
$routes->post('/akk/transaksi/stock_akhir/edit', 'admin_kas_kecil\transaksi\StockAkhirController::edit_save');
$routes->post('/stock/tambah_nama_barang', 'admin_kas_kecil\transaksi\StockAkhirController::tambah_nama_barang');

$routes->get('/akk/transaksi/purchase_order/', 'admin_kas_kecil\transaksi\purchaseOrderController::index');
$routes->get('/akk/transaksi/purchase_order/tambah', 'admin_kas_kecil\transaksi\purchaseOrderController::tambah');
$routes->post('/akk/transaksi/purchase_order/tambah', 'admin_kas_kecil\transaksi\purchaseOrderController::tambah_po');
$routes->get('/akk/transaksi/purchase_order/edit/(:any)', 'admin_kas_kecil\transaksi\purchaseOrderController::edit/$1');
$routes->post('/akk/transaksi/purchase_order/edit', 'admin_kas_kecil\transaksi\purchaseOrderController::edit_po');
$routes->get('/akk/transaksi/purchase_order/hapus/(:any)', 'admin_kas_kecil\transaksi\purchaseOrderController::hapus_po/$1');
$routes->get('/akk/transaksi/purchase_order/detail/(:any)', 'admin_kas_kecil\transaksi\purchaseOrderController::detail/$1');
$routes->post('/akk/transaksi/purchase_order/detail', 'admin_kas_kecil\transaksi\purchaseOrderController::detail_input');

$routes->get('/akk/master_branch', 'admin_kas_kecil\master\branchController::index');
$routes->get('/akk/master_branch/tambah', 'admin_kas_kecil\master\branchController::tambah');
$routes->post('/akk/master_branch/tambah', 'admin_kas_kecil\master\branchController::input');
$routes->get('/akk/master_branch/hapus/(:any)', 'admin_kas_kecil\master\branchController::hapus/$1');
$routes->get('/akk/master_branch/edit/(:any)', 'admin_kas_kecil\master\branchController::edit/$1');
$routes->post('/akk/master_branch/edit', 'admin_kas_kecil\master\branchController::update');

$routes->get('/akk/master_week', 'admin_kas_kecil\master\weekController::index');
$routes->get('/akk/master_week/tambah', 'admin_kas_kecil\master\weekController::tambah');
$routes->post('/akk/master_week/tambah', 'admin_kas_kecil\master\weekController::input');
$routes->get('/akk/master_week/hapus/(:any)', 'admin_kas_kecil\master\weekController::hapus/$1');
$routes->get('/akk/master_week/edit/(:any)', 'admin_kas_kecil\master\weekController::edit/$1');
$routes->post('/akk/master_week/edit', 'admin_kas_kecil\master\weekController::update');
$routes->post('/akk/master_week/generate', 'admin_kas_kecil\master\weekController::generate');

$routes->get('/akk/piutang_usaha', 'admin_kas_kecil\piutang_usahaController::index');
$routes->get('/akk/piutang_usaha/hapus/(:any)', 'admin_kas_kecil\piutang_usahaController::hapus/$1');
$routes->get('/akk/repayment_detail', 'admin_kas_kecil\piutang_usahaController::repayment_detail');
$routes->get('/akk/piutang_usaha/form', 'admin_kas_kecil\piutang_usahaController::form_piutang');
$routes->post('/akk/piutang_usaha/form', 'admin_kas_kecil\piutang_usahaController::form_piutang_save');
// $routes->get('/akk/piutang_usaha/input', 'admin_kas_kecil\piutang\tunaiController::index');
$routes->post('/akk/piutang_usaha/input/add', 'admin_kas_kecil\piutang\tunaiController::add');
// $routes->get('/akk/piutang_usaha/input/detail/(:any)', 'admin_kas_kecil\piutang\tunaiController::detail_input_piutang/$1');
$routes->get('/akk/piutang_usaha/input_pembayaran', 'admin_kas_kecil\piutang\pembayaranController::index');
$routes->post('/akk/piutang_usaha/input_pembayaran/add', 'admin_kas_kecil\piutang\pembayaranController::add');
$routes->get('/akk/piutang_usaha/input_pembayaran/detail/(:any)', 'admin_kas_kecil\piutang\pembayaranController::detail_input_pembayaran/$1');

$routes->get('/akk/kas', 'admin_kas_kecil\KasController::index');

$routes->get('/akk/master_bank', 'admin_kas_kecil\master\bankController::index');
$routes->post('/akk/input_bank', 'admin_kas_kecil\master\bankController::input');
$routes->post('/akk/master_bank/edit', 'admin_kas_kecil\master\bankController::edit');
$routes->get('/akk/master_bank/update/(:any)', 'admin_kas_kecil\master\bankController::update/$1');
$routes->get('/akk/del_bank/(:any)', 'admin_kas_kecil\master\bankController::hapus/$1');
$routes->get('/akk/master_lokasi', 'admin_kas_kecil\master\lokasiController::index');
$routes->post('/akk/input_lokasi', 'admin_kas_kecil\master\lokasiController::input');
$routes->get('/akk/del_lokasi/(:any)', 'admin_kas_kecil\master\lokasiController::hapus/$1');
$routes->get('/akk/master_jenis_cuti', 'admin_kas_kecil\master\cutiController::index');
$routes->post('/akk/input_jenis_cuti', 'admin_kas_kecil\master\cutiController::input');
$routes->get('/akk/del_jenis_cuti/(:any)', 'admin_kas_kecil\master\cutiController::hapus/$1');
$routes->get('/akk/master_jenis_izin', 'admin_kas_kecil\master\izinController::index');
$routes->post('/akk/input_jenis_izin', 'admin_kas_kecil\master\izinController::input');
$routes->get('/akk/del_jenis_izin/(:any)', 'admin_kas_kecil\master\izinController::hapus/$1');
$routes->get('/akk/master_jenis_harga', 'admin_kas_kecil\master\jenishargaController::index');
$routes->post('/akk/input_jenis_harga', 'admin_kas_kecil\master\jenishargaController::input');
$routes->get('/akk/del_jenis_harga/(:any)', 'admin_kas_kecil\master\jenishargaController::hapus/$1');

$routes->get('/akk/master_price', 'admin_kas_kecil\master\priceController::index');
$routes->get('/akk/price', 'admin_kas_kecil\master\priceController::tambah');
$routes->post('/akk/save_price', 'admin_kas_kecil\master\priceController::input');
$routes->get('/akk/del_price/(:any)', 'admin_kas_kecil\master\priceController::hapus/$1');
$routes->get('/akk/form_price/(:any)', 'admin_kas_kecil\master\priceController::edit/$1');
$routes->post('/akk/update_price', 'admin_kas_kecil\master\priceController::update');
$routes->get('/akk/detail_price/(:any)', 'admin_kas_kecil\master\priceController::detail/$1');
$routes->get('/akk/add_detail_price/(:any)', 'admin_kas_kecil\master\priceController::detail_tambah/$1');
$routes->post('/akk/save_detail_price', 'admin_kas_kecil\master\priceController::input_detail_price');
$routes->get('/akk/edit_detail_price/(:any)', 'admin_kas_kecil\master\priceController::detail_edit/$1');
$routes->post('/akk/update_detail_price', 'admin_kas_kecil\master\priceController::update_detail_price');
$routes->get('/akk/del_price_detail/(:any)', 'admin_kas_kecil\master\priceController::hapus_detail_price/$1');
$routes->post('/tambah_nama_harga', 'admin_kas_kecil\master\priceController::tambah_nama_harga');


$routes->get('/akk/master_barang_harga', 'admin_kas_kecil\master\barangHargaController::index');
$routes->get('/akk/master_barang_harga_generate', 'admin_kas_kecil\master\barangHargaController::generate');
$routes->get('/akk/barang_harga', 'admin_kas_kecil\master\barangHargaController::tambah');
$routes->post('/akk/save_barang_harga', 'admin_kas_kecil\master\barangHargaController::input');
$routes->get('/akk/del_barang_harga/(:any)', 'admin_kas_kecil\master\barangHargaController::hapus/$1');
$routes->get('/akk/form_barang_harga/(:any)', 'admin_kas_kecil\master\barangHargaController::edit/$1');
$routes->post('/akk/update_barang_harga', 'admin_kas_kecil\master\barangHargaController::update');
$routes->get('/akk/detail_barang_harga/(:any)', 'admin_kas_kecil\master\barangHargaController::detail/$1');
$routes->get('/akk/add_detail_barang_harga/(:any)', 'admin_kas_kecil\master\barangHargaController::detail_tambah/$1');
$routes->post('/akk/save_detail_barang_harga', 'admin_kas_kecil\master\barangHargaController::input_detail_barang_harga');
$routes->get('/akk/edit_detail_barang_harga/(:any)', 'admin_kas_kecil\master\barangHargaController::detail_edit/$1');
$routes->post('/akk/update_detail_barang_harga', 'admin_kas_kecil\master\barangHargaController::update_detail_barang_harga');
$routes->get('/akk/del_barang_harga_detail/(:any)', 'admin_kas_kecil\master\barangHargaController::hapus_detail_barang_harga/$1');
$routes->post('/tambah_nama_harga', 'admin_kas_kecil\master\barangHargaController::tambah_nama_harga');

$routes->get('/akk/laporan', 'admin_kas_kecil\laporanController::index');
$routes->get('/akk/laporan/form_report_assets', 'admin_kas_kecil\laporanController::form_report_assets');
$routes->get('/akk/laporan/form_kas_kecil', 'admin_kas_kecil\laporanController::form_kas_kecil');
$routes->get('/akk/laporan/form_closing', 'admin_kas_kecil\laporanController::form_closing');
$routes->post('/akk/laporan/form_closing/mingguan', 'admin_kas_kecil\laporanController::form_closing_mingguan');
$routes->post('/akk/laporan/form_closing/bulanan', 'admin_kas_kecil\laporanController::form_closing_bulanan');
$routes->post('/akk/laporan/form_closing/tahunan', 'admin_kas_kecil\laporanController::form_closing_tahunan');

$routes->get('/akk/laporan/deposit', 'admin_kas_kecil\laporanController::deposit');
$routes->get('/akk/laporan/form_tertagih', 'admin_kas_kecil\laporanController::form_tertagih');
$routes->get('/akk/laporan/form_cetak_labarugi', 'admin_kas_kecil\laporanController::form_cetak_labarugi');
$routes->get('/akk/laporan/form_print_pengeluaran', 'admin_kas_kecil\laporanController::form_print_pengeluaran');
$routes->get('/akk/laporan/form_report_sales', 'admin_kas_kecil\laporanController::form_report_sales');
$routes->get('/akk/laporan/form_sisa', 'admin_kas_kecil\laporanController::form_sisa');
// Laporan - Piutang - Area - Cetak
$routes->post('/akk/laporan/piutang/area/print', 'admin_kas_kecil\laporan\PiutangController::areaPrint');
// Laporan - Piutang - All Salesman - Cetak
$routes->post('/akk/laporan/piutang/salesman/print', 'admin_kas_kecil\laporan\PiutangController::salesmanPrint');

$routes->get('/akk/form_cost_ratio', 'admin_kas_kecil\laporanController::form_cost_ratio');


$routes->get('/akk/stock', 'admin_kas_kecil\master\stockController::index');
$routes->get('/akk/master_stock', 'admin_kas_kecil\master\stockController::tambah');
$routes->post('/akk/save_stock', 'admin_kas_kecil\master\stockController::input');
$routes->post('/akk/master_bank/edit', 'admin_kas_kecil\master\stockController::edit');
$routes->get('/akk/master_bank/update/(:any)', 'admin_kas_kecil\master\stockController::update/$1');
$routes->get('/akk/del_stock/(:any)', 'admin_kas_kecil\master\stockController::hapus/$1');

$routes->get('/akk/keuangan', 'admin_kas_kecil\keuanganController::index');
$routes->get('/akk/keuangan/pengeluaran_kantor', 'admin_kas_kecil\keuangan\pengeluaran_kantorController::index');
$routes->get('/akk/keuangan/pengeluaran_kantor/tambah', 'admin_kas_kecil\keuangan\pengeluaran_kantorController::tambah');
$routes->post('/akk/keuangan/pengeluaran_kantor/tambah', 'admin_kas_kecil\keuangan\pengeluaran_kantorController::add');
$routes->get('/akk/keuangan/pengeluaran_kantor/edit/(:any)', 'admin_kas_kecil\keuangan\pengeluaran_kantorController::edit/$1');
$routes->post('/akk/keuangan/pengeluaran_kantor/edit/', 'admin_kas_kecil\keuangan\pengeluaran_kantorController::update');
$routes->get('/akk/keuangan/pengeluaran_kantor/hapus/(:any)', 'admin_kas_kecil\keuangan\pengeluaran_kantorController::hapus/$1');

$routes->get('/akk/keuangan/mutasi_bank', 'admin_kas_kecil\keuangan\mutasiBankController::index');
$routes->get('/akk/keuangan/mutasi_bank/tambah', 'admin_kas_kecil\keuangan\mutasiBankController::tambah');
$routes->post('/akk/keuangan/mutasi_bank/tambah', 'admin_kas_kecil\keuangan\mutasiBankController::add');
$routes->get('/akk/keuangan/mutasi_bank/edit/(:any)', 'admin_kas_kecil\keuangan\mutasiBankController::edit/$1');
$routes->post('/akk/keuangan/mutasi_bank/edit', 'admin_kas_kecil\keuangan\mutasiBankController::update');
$routes->get('/akk/keuangan/master_giro', 'admin_kas_kecil\keuangan\masterGiroController::index');
$routes->get('/akk/keuangan/data_kas', 'admin_kas_kecil\keuangan\dataKasController::index');
$routes->get('/akk/keuangan/data_kas/voucher', 'admin_kas_kecil\keuangan\dataKasController::voucher');
$routes->get('/akk/keuangan/data_kas/neraca_saldo', 'admin_kas_kecil\keuangan\dataKasController::neraca_saldo');
$routes->get('/akk/keuangan/data_kas/mutasi_bank/tambah', 'admin_kas_kecil\keuangan\dataKasController::mutasi_bank');
$routes->post('/akk/keuangan/data_kas/mutasi_bank', 'admin_kas_kecil\keuangan\dataKasController::mutasi_bank_add');
$routes->get('/akk/keuangan/data_kas/uang_kas_kecil', 'admin_kas_kecil\keuangan\dataKasController::uang_kas_kecil');
$routes->post('/akk/keuangan/data_kas/uang_kas_kecil', 'admin_kas_kecil\keuangan\dataKasController::uang_kas_kecil_add');
$routes->get('/akk/keuangan/data_kas/uang_kas_besar', 'admin_kas_kecil\keuangan\dataKasController::form_transfer');
$routes->post('/akk/keuangan/data_kas/uang_kas_besar', 'admin_kas_kecil\keuangan\dataKasController::form_transfer_add');
$routes->get('/akk/keuangan/data_kas/hapus/(:any)', 'admin_kas_kecil\keuangan\dataKasController::hapus_kas/$1');

$routes->get('/akk/karyawan', 'admin_kas_kecil\sdmController::karyawan');
$routes->get('/akk/karyawan/tambah', 'admin_kas_kecil\sdmController::karyawan_tambah');
$routes->post('/akk/karyawan/tambah', 'admin_kas_kecil\sdmController::karyawan_input');
$routes->post('/akk/karyawan/edit', 'admin_kas_kecil\sdmController::karyawan_update');
$routes->get('/akk/karyawan/edit/(:any)', 'admin_kas_kecil\sdmController::karyawan_edit/$1');
$routes->get('/akk/karyawan/hapus/(:any)', 'admin_kas_kecil\sdmController::hapus/$1');

$routes->get('/akk/akun', 'admin_kas_kecil\akunController::akun');
$routes->get('/akk/akun/tambah', 'admin_kas_kecil\akunController::akun_tambah');
$routes->post('/akk/akun/tambah', 'admin_kas_kecil\akunController::akun_input');
$routes->post('/akk/akun/edit', 'admin_kas_kecil\akunController::akun_update');
$routes->get('/akk/akun/edit/(:any)', 'admin_kas_kecil\akunController::akun_edit/$1');
$routes->get('/akk/akun/hapus/(:any)', 'admin_kas_kecil\akunController::hapus/$1');

$routes->get('/akk/keuangan/master_pengeluaran', 'admin_kas_kecil\keuangan\masterPengeluaranController::index');
$routes->get('/akk/keuangan/spending_operational/(:any)', 'admin_kas_kecil\keuangan\masterPengeluaranController::spending_operational/$1');
$routes->get('/akk/keuangan/master_pengeluaran_op', 'admin_kas_kecil\keuangan\masterPengeluaranController::master_pengeluaran_op');
$routes->get('/akk/keuangan/detail_biaya_operasional', 'admin_kas_kecil\keuangan\masterPengeluaranController::detail_biaya_operasional');

$routes->get('/akk/keuangan/master_hutang', 'admin_kas_kecil\keuangan\masterHutangController::index');
$routes->get('/akk/keuangan/master_hutang/pelunasan', 'admin_kas_kecil\keuangan\masterHutangController::pelunasan');
$routes->get('/akk/keuangan/master_hutang/pot', 'admin_kas_kecil\keuangan\masterHutangController::pot');
$routes->get('/akk/keuangan/master_hutang/tambah', 'admin_kas_kecil\keuangan\masterHutangController::tambah');
$routes->post('/akk/keuangan/master_hutang/tambah', 'admin_kas_kecil\keuangan\masterHutangController::tambah_save');
$routes->get('/akk/keuangan/master_hutang/edit/(:any)', 'admin_kas_kecil\keuangan\masterHutangController::edit/$1');
$routes->post('/akk/keuangan/master_hutang/edit', 'admin_kas_kecil\keuangan\masterHutangController::edit_save');
$routes->get('/akk/keuangan/master_hutang/hapus/(:any)', 'admin_kas_kecil\keuangan\masterHutangController::hapus/$1');

$routes->get('/akk/keuangan/master_app_mutasi', 'admin_kas_kecil\keuangan\masterAppMutasiController::index');
$routes->get('/akk/keuangan/master_app_mutasi/pelunasan', 'admin_kas_kecil\keuangan\masterAppMutasiController::pelunasan');
$routes->get('/akk/keuangan/master_app_mutasi/pot', 'admin_kas_kecil\keuangan\masterAppMutasiController::pot');
$routes->get('/akk/keuangan/master_app_mutasi/input', 'admin_kas_kecil\keuangan\masterAppMutasiController::tambah');


$routes->post('/proses_login', 'LoginController::proseslogin');
$routes->post('/proses_register', 'LoginController::proses_register');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/keuangan', 'admin\keuanganController::index');
$routes->get('/konsumen', 'admin\konsumenController::index');
$routes->get('/customer', 'admin\konsumenController::customer');

$routes->get('/laporan', 'admin\laporanController::index');
$routes->get('/form_report_assets', 'admin\laporanController::form_report_assets');
$routes->get('/form_kas_kecil', 'admin\laporanController::form_kas_kecil');
$routes->get('/form_closing', 'admin\laporanController::form_closing');
$routes->get('/deposit', 'admin\laporanController::deposit');
$routes->get('/form_tertagih', 'admin\laporanController::form_tertagih');
$routes->get('/form_cetak_labarugi', 'admin\laporanController::form_cetak_labarugi');
$routes->get('/form_print_pengeluaran', 'admin\laporanController::form_print_pengeluaran');
$routes->get('/form_report_sales', 'admin\laporanController::form_report_sales');
$routes->get('/form_sisa', 'admin\laporanController::form_sisa');
$routes->get('/form_cost_ratio', 'admin\laporanController::form_cost_ratio');

$routes->get('/transaksi', 'admin\transaksiController::index');
$routes->get('/closing_sales', 'admin\transaksi\closingSalesController::index');
$routes->get('/master_closing', 'admin\transaksi\closingSalesController::master_closing');
$routes->get('/detail_closing', 'admin\transaksi\closingSalesController::detail_closing');
$routes->get('/master_sample', 'admin\transaksi\masterSampleController::index');
$routes->get('/sample', 'admin\transaksi\masterSampleController::tambah');
$routes->get('/master_defect', 'admin\transaksi\masterDefectController::index');
$routes->get('/defect', 'admin\transaksi\masterDefectController::tambah');

$routes->get('/piutang_usaha', 'admin\piutang_usahaController::index');
$routes->get('/repayment_detail', 'admin\piutang_usahaController::repayment_detail');
$routes->get('/form_piutang', 'admin\piutang_usahaController::form_piutang');
$routes->get('/input_piutang', 'admin\piutang\tunaiController::index');

$routes->get('/input_piutang', 'admin\piutang\tunaiController::index');
$routes->get('/input_piutang_kredit', 'admin\piutang\kreditController::index');
$routes->get('/detail_input_piutang', 'admin\piutang\tunaiController::detail_input_piutang');
$routes->get('/detail_input_piutang_kredit', 'admin\piutang\kreditController::detail_input_piutang_kredit');

$routes->get('/pengeluaran', 'admin\keuangan\pengeluaranController::index');
$routes->get('/spending', 'admin\keuangan\pengeluaranController::spending');
$routes->get('/edit_spending', 'admin\keuangan\pengeluaranController::edit_spending');
$routes->get('/master_mutasi_bank', 'admin\keuangan\mutasiBankController::index');
$routes->get('/edit_mutasi_bank', 'admin\keuangan\mutasiBankController::edit');
$routes->get('/master_giro', 'admin\keuangan\masterGiroController::index');
$routes->get('/master_cash_receipt', 'admin\keuangan\dataKasController::index');
$routes->get('/voucher', 'admin\keuangan\dataKasController::voucher');
$routes->get('/neraca_saldo', 'admin\keuangan\dataKasController::neraca_saldo');
$routes->get('/mutasi_bank', 'admin\keuangan\dataKasController::mutasi_bank');
$routes->get('/uang_kas_kecil', 'admin\keuangan\dataKasController::uang_kas_kecil');
$routes->get('/form_transfer', 'admin\keuangan\dataKasController::form_transfer');

$routes->get('/master_pengeluaran', 'admin\keuangan\masterPengeluaranController::index');
$routes->get('/spending_operational', 'admin\keuangan\masterPengeluaranController::spending_operational');
$routes->get('/master_pengeluaran_op', 'admin\keuangan\masterPengeluaranController::master_pengeluaran_op');
$routes->get('/detail_biaya_operasional', 'admin\keuangan\masterPengeluaranController::detail_biaya_operasional');
$routes->get('/kas_kecil', 'admin\keuangan\kasKecilController::index');
$routes->get('/penjualan', 'admin\penjualanController::index');
$routes->get('/penjualan2', 'admin\penjualanController::index2');

$routes->get('/sdm', 'admin\sdmController::index');
$routes->get('/master_employee', 'admin\sdmController::master_employee');
$routes->get('/general', 'admin\sdmController::general');
$routes->get('/edit_general', 'admin\sdmController::edit_general');
$routes->get('/export_data_karyawan', 'admin\sdmController::export_data_karyawan');
$routes->get('/report_data_karyawan', 'admin\sdmController::report_data_karyawan');
$routes->get('/master_absen', 'admin\sdmController::master_absen');
$routes->get('/master_absen_gaji', 'admin\sdmController::master_absen_gaji');
$routes->get('/form_absensi', 'admin\sdmController::form_absensi');
$routes->get('/master_perbaikan_absen', 'admin\sdmController::master_perbaikan_absen');
$routes->get('/master_cuti', 'admin\sdmController::master_cuti');
$routes->get('/master_riwayat_cuti', 'admin\sdmController::master_riwayat_cuti');
$routes->get('/master_izin', 'admin\sdmController::master_izin');
$routes->get('/master_riwayat_izin', 'admin\sdmController::master_riwayat_izin');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
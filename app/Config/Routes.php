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

$routes->get('/akk/master_sales', 'admin_kas_kecil\transaksi\salesController::index');
$routes->get('/akk/sales', 'admin_kas_kecil\transaksi\salesController::tambah');
$routes->post('/akk/save_sales', 'admin_kas_kecil\transaksi\salesController::input');
$routes->get('/akk/transaksi', 'admin_kas_kecil\transaksiController::index');
$routes->get('/akk/del_sales/(:any)', 'admin_kas_kecil\transaksi\salesController::hapus/$1');
$routes->get('/akk/form_sales/(:any)', 'admin_kas_kecil\transaksi\salesController::edit/$1');
$routes->post('/akk/update_sales', 'admin_kas_kecil\transaksi\salesController::update');
$routes->post('/tambah_nama_barang', 'admin_kas_kecil\transaksi\salesController::tambah_nama_barang');
$routes->get('/akk/detail_sales/(:any)', 'admin_kas_kecil\transaksi\salesController::detail/$1');
$routes->get('/akk/add_detail_sales/(:any)', 'admin_kas_kecil\transaksi\salesController::detail_tambah/$1');
$routes->post('/akk/save_detail_sales', 'admin_kas_kecil\transaksi\salesController::input_detail_sales');
$routes->get('/akk/del_sales_detail/(:any)', 'admin_kas_kecil\transaksi\salesController::hapus_detail_sales/$1');
$routes->get('/akk/form_sales_detail/(:any)', 'admin_kas_kecil\transaksi\salesController::edit_detail_sales/$1');
$routes->post('/akk/update_detail_sales', 'admin_kas_kecil\transaksi\salesController::update_detail_sales');
$routes->get('/akk/print_sales/(:any)', 'admin_kas_kecil\transaksi\salesController::print/$1');
$routes->get('/akk/closing_sales', 'admin_kas_kecil\transaksi\closingSalesController::index');
$routes->get('/akk/closing/(:any)', 'admin_kas_kecil\transaksi\closingSalesController::closing/$1');
$routes->post('/akk/input_closing', 'admin_kas_kecil\transaksi\closingSalesController::input_closing');
$routes->get('/akk/closing_detail/(:any)', 'admin_kas_kecil\transaksi\closingSalesController::closing_detail/$1');
$routes->post('/akk/input_detail_closing', 'admin_kas_kecil\transaksi\closingSalesController::input_detail_closing');
$routes->get('/akk/master_closing', 'admin_kas_kecil\transaksi\closingSalesController::master_closing');
$routes->get('/akk/closing_sales_print/(:any)', 'admin_kas_kecil\transaksi\closingSalesController::print/$1');

$routes->get('/akk/stock', 'admin_kas_kecil\master\stockController::index');
$routes->get('/akk/master_stock', 'admin_kas_kecil\master\stockController::tambah');
$routes->post('/akk/save_stock', 'admin_kas_kecil\master\stockController::input');
$routes->get('/akk/del_stock/(:any)', 'admin_kas_kecil\master\stockController::hapus/$1');
$routes->get('/akk/form_stock/(:any)', 'admin_kas_kecil\master\stockController::edit/$1');
$routes->post('/akk/update_stock', 'admin_kas_kecil\master\stockController::update');

$routes->get('/akk/piutang_usaha', 'admin_kas_kecil\piutang_usahaController::index');
$routes->get('/akk/repayment_detail', 'admin_kas_kecil\piutang_usahaController::repayment_detail');
$routes->get('/akk/form_piutang', 'admin_kas_kecil\piutang_usahaController::form_piutang');
$routes->get('/akk/input_piutang', 'admin_kas_kecil\piutang\tunaiController::index');
$routes->get('/akk/input_piutang_kredit', 'admin_kas_kecil\piutang\kreditController::index');
$routes->get('/akk/detail_input_piutang/(:any)', 'admin_kas_kecil\piutang\tunaiController::detail_input_piutang/$1');
$routes->get('/akk/detail_input_piutang_kredit/(:any)', 'admin_kas_kecil\piutang\kreditController::detail_input_piutang_kredit/$1');

$routes->get('/akk/master_bank', 'admin_kas_kecil\master\bankController::index');
$routes->post('/akk/input_bank', 'admin_kas_kecil\master\bankController::input');
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
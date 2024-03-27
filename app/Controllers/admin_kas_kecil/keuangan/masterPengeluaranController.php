<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterPengeluaranController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA PENGAMBILAN BARANG';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/index', $data);
    }

    public function spending_operational(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TRANSASCT PENGELUARAN OPERASIONAL';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/spending_operational', $data);
    }
    public function master_pengeluaran_op(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER PENGELUARAN OPERASIONAL';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/master_pengeluaran_op', $data);
    }
    public function detail_biaya_operasional(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Transasct Pengeluaran Operasional        ';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/detail_biaya_operasional', $data);
    }

    public function uang_kas_kecil(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = '';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/uang_kas_kecil', $data);
    }

    public function form_transfer(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = '';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/form_transfer', $data);
    }
}
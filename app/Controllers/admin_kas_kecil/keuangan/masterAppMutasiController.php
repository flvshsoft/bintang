<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterAppMutasiController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'WAITING LIST APPROVAL KAS & BANK';
        return view('admin_kas_kecil/keuangan/master_app_mutasi/index', $data);
    }

    public function pelunasan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'PELUNASAN HUTANG PABRIK';
        return view('admin_kas_kecil/keuangan/master_app_mutasi/pelunasan', $data);
    }
    public function pot(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER PENGELUARAN OPERASIONAL';
        return view('admin_kas_kecil/keuangan/master_app_mutasi/pot', $data);
    }
    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Transasct Pengeluaran Operasional        ';
        return view('admin_kas_kecil/keuangan/master_app_mutasi/tambah', $data);
    }
}
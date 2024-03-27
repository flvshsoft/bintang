<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterHutangController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER HUTANG';
        return view('admin_kas_kecil/keuangan/master_hutang/index', $data);
    }

    public function pelunasan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TRANSASCT PENGELUARAN OPERASIONAL';
        return view('admin_kas_kecil/keuangan/master_hutang/pelunasan', $data);
    }
    public function pot(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER PENGELUARAN OPERASIONAL';
        return view('admin_kas_kecil/keuangan/master_hutang/pot', $data);
    }
    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Transasct Pengeluaran Operasional        ';
        return view('admin_kas_kecil/keuangan/master_hutang/tambah', $data);
    }
}
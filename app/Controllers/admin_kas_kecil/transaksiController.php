<?php

namespace App\Controllers\admin_kas_kecil;

class transaksiController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Transaksi';
        $data['level_user'] = Session('userData')['level_user'];
        return view('admin_kas_kecil/transaksi/index', $data);
    }

    public function closing_sales(): string
    {
        $data['judul'] = 'Bintang Distributor';
        return view('admin_kas_kecil/transaksi/index', $data);
    }
    public function master_defect(): string
    {
        $data['judul'] = 'Bintang Distributor';
        return view('admin_kas_kecil/transaksi/index', $data);
    }
    public function master_sample(): string
    {
        $data['judul'] = 'Bintang Distributor';
        return view('admin_kas_kecil/transaksi/index', $data);
    }
}
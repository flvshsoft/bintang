<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterGiroController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER PENCAIRAN GIRO';
        return view('admin_kas_kecil/keuangan/master_giro/index', $data);
    }
}
<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class dataKasController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DATA KAS & BANK';
        return view('admin_kas_kecil/keuangan/data_kas/index', $data);
    }

    public function voucher(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'VOUCHER KAS & BANK';
        return view('admin_kas_kecil/keuangan/data_kas/voucher', $data);
    }
    public function neraca_saldo(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'NERACA SALDO';
        $data['model'] = $this->mdBank->findAll();
        // $data['model'] = $this->mdBank->findAll();

        return view('admin_kas_kecil/keuangan/data_kas/neraca_saldo', $data);
    }
    public function mutasi_bank(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG KELUAR';
        return view('admin_kas_kecil/keuangan/data_kas/mutasi_bank', $data);
    }

    public function uang_kas_kecil(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG MASUK KAS KECIL';
        return view('admin_kas_kecil/keuangan/data_kas/uang_kas_kecil', $data);
    }

    public function form_transfer(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG MASUK KAS BESAR';
        return view('admin_kas_kecil/keuangan/data_kas/form_transfer', $data);
    }
}
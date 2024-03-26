<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

use CodeIgniter\Session\Session;

class dataKasController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DATA KAS & BANK';
        $data['model'] = $this->mdKas
            ->join('user', 'user.id_user=kas_bank.id_user')
            ->join('bank', 'bank.id_bank=kas_bank.id_bank')

            ->findAll();
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
        return view('admin_kas_kecil/keuangan/data_kas/neraca_saldo', $data);
    }
    public function mutasi_bank(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG KELUAR';
        $data['bank'] = $this->mdBank
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/mutasi_bank', $data);
    }
    public function mutasi_bank_add()
    {
        $data = [
            'tgl_mutasi_bank' => date('d-M-Y'),
            'type_mutasi_bank' => $this->request->getPost('type_mutasi_bank'),
            'id_bank' => $this->request->getPost('id_bank'),
            'week_mutasi_bank' => $this->request->getPost('week_mutasi_bank'),
            'remark_mutasi_bank' => $this->request->getPost('remark_mutasi_bank'),
            'user' => Session('userData')['id_user'],
            'approved_by' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('ket'),
            'biaya_mutasi_bank' => $this->request->getPost('biaya_mutasi_bank'),
        ];
        $this->mdMutasiBank->insert($data);

        $data2 = [
            'id_sales' => $this->request->getPost('id_sales'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'id_bank' => $this->request->getPost('id_bank'),
            'minggu' => $this->request->getPost('week_mutasi_bank'),
            'pergantian_minggu' => $this->request->getPost('pergantian_minggu'),
            'id_user' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('remark_mutasi_bank'),
            'uang_kas' => $this->request->getPost('biaya_mutasi_bank'),
        ];
        $this->mdKas->insert($data2);

        return redirect()->to(base_url('/akk/keuangan/data_kas'));
    }

    public function uang_kas_kecil(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG MASUK KAS KECIL';
        $data['bank'] = $this->mdBank->where('id_bank', 5)->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/uang_kas_kecil', $data);
    }
    public function uang_kas_kecil_add()
    {
        $data = [
            'id_sales' => $this->request->getPost('id_sales'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'id_bank' => $this->request->getPost('id_bank'),
            'minggu' => $this->request->getPost('minggu'),
            'pergantian_minggu' => $this->request->getPost('pergantian_minggu'),
            'id_user' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('ket'),
            'uang_kas' => $this->request->getPost('uang_kas'),
        ];
        $this->mdKas->insert($data);
        return redirect()->to(base_url('/akk/keuangan/data_kas'));
    }

    public function form_transfer(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG MASUK KAS BESAR';
        $data['bank'] = $this->mdBank
            ->where('id_bank !=', 5)
            ->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/form_transfer', $data);
    }
    public function form_transfer_add()
    {
        $data = [
            'id_sales' => $this->request->getPost('id_sales'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'id_bank' => $this->request->getPost('id_bank'),
            'minggu' => $this->request->getPost('minggu'),
            'pergantian_minggu' => $this->request->getPost('pergantian_minggu'),
            'id_user' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('ket'),
            'uang_kas' => $this->request->getPost('uang_kas'),
        ];
        // print_r($data);
        // exit;
        $this->mdKas->insert($data);
        return redirect()->to(base_url('/akk/keuangan/data_kas'));
    }
}

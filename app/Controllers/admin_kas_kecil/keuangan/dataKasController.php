<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

use CodeIgniter\Session\Session;

class dataKasController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DATA KAS & BANK';
        $data['level_user'] = Session('userData')['level_user'];
        $data['model'] = $this->mdKas
            ->select(['*', 'kas_bank.created_at as created_at'])
            ->where('kas_bank.id_branch', Session('userData')['id_branch'])
            ->join('user', 'user.id_user=kas_bank.id_user', 'left')
            ->join('customer', 'customer.id_customer=kas_bank.id_konsumen', 'left')
            ->join('bank', 'bank.id_bank=kas_bank.id_bank')
            ->orderBy('kas_bank.id_kas', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/index', $data);
    }

    public function hapus_kas($id_kas, $id_sales, $id_customer, $uang_kas, $id_bank)
    {
        // $bank = $this->mdBank
        //     ->where('nama_bank', 'KAS')
        //     ->where('id_branch', Session('userData')['id_branch'])
        //     ->find();
        // $id_bank = $bank[0]['id_bank'];
        $this->mdBank
            ->where('id_bank', $id_bank)
            ->decrement('saldo', $uang_kas);

        $this->mdKas->delete($id_kas);
        $this->mdNota
            ->where('id_sales', $id_sales)
            ->where('id_customer', $id_customer)
            ->decrement('pay', $uang_kas);
        return redirect()->to(base_url('/akk/keuangan/data_kas'));
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
        $data['model'] = $this->mdBank
            ->where('bank.id_branch', Session('userData')['id_branch'])
            // ->join('user', 'user.id_user=bank.created_by', 'left')
            ->findAll();
        $data['level_user'] = Session('userData')['level_user'];
        return view('admin_kas_kecil/keuangan/data_kas/neraca_saldo', $data);
    }
    public function mutasi_bank(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG KELUAR';
        $data['bank'] = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_bank')
            ->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/mutasi_bank', $data);
    }
    public function mutasi_bank_add()
    {
        $biaya_mutasi_bank = str_replace('.', '', $this->request->getPost('biaya_mutasi_bank')); // Hapus tanda titik
        $biaya_mutasi_bank = (int) str_replace(',', '', $biaya_mutasi_bank); // Konversi ke integer
        $bank_tujuan = $this->request->getPost('bank_tujuan');
        if ($bank_tujuan == 'Uang Keluar') {
            $data = [
                'tgl_mutasi_bank' => date('d-M-Y'),
                'type_mutasi_bank' => $this->request->getPost('type_mutasi_bank'),
                'id_bank' => $this->request->getPost('id_bank'),
                // 'bank_tujuan' => $bank_tujuan,
                'week_mutasi_bank' => $this->request->getPost('week_mutasi_bank'),
                'remark_mutasi_bank' => $this->request->getPost('remark_mutasi_bank'),
                'user' => Session('userData')['id_user'],
                'approved_by' => Session('userData')['id_user'],
                'metode_bayar' => $this->request->getPost('metode_bayar'),
                'ket' => $this->request->getPost('ket'),
                'id_branch' => Session('userData')['id_branch'],
                'biaya_mutasi_bank' => $biaya_mutasi_bank,
                'tgl_mutasi_bank' => date('Y-m-d'),
            ];
        } else {
            $data = [
                'tgl_mutasi_bank' => date('d-M-Y'),
                'type_mutasi_bank' => $this->request->getPost('type_mutasi_bank'),
                'id_bank' => $this->request->getPost('id_bank'),
                'bank_tujuan' => $bank_tujuan,
                'week_mutasi_bank' => $this->request->getPost('week_mutasi_bank'),
                'remark_mutasi_bank' => $this->request->getPost('remark_mutasi_bank'),
                'user' => Session('userData')['id_user'],
                'approved_by' => Session('userData')['id_user'],
                'metode_bayar' => $this->request->getPost('metode_bayar'),
                'ket' => $this->request->getPost('ket'),
                'id_branch' => Session('userData')['id_branch'],
                'biaya_mutasi_bank' => $biaya_mutasi_bank,
                'tgl_mutasi_bank' => date('Y-m-d'),
            ];
        }
        $this->mdMutasiBank->insert($data);

        $data2 = [
            'id_sales' => $this->request->getPost('id_sales'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'id_bank' => $this->request->getPost('id_bank'),
            'id_branch' => Session('userData')['id_branch'],
            'minggu' => $this->request->getPost('week_mutasi_bank'),
            'pergantian_minggu' => $this->request->getPost('pergantian_minggu'),
            'id_user' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('remark_mutasi_bank'),
            'uang_kas' => $biaya_mutasi_bank,
        ];
        $this->mdKas->insert($data2);
        $this->mdBank->where('id_bank', $this->request->getPost('id_bank'))->decrement('saldo', $biaya_mutasi_bank);
        if ($bank_tujuan != 'Uang Keluar') {
            $this->mdBank->where('id_bank', $bank_tujuan)->increment('saldo', $biaya_mutasi_bank);
        }

        return redirect()->to(base_url('/akk/keuangan/mutasi_bank'));
    }

    public function uang_kas_kecil(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG MASUK KAS KECIL';
        $data['bank'] = $this->mdBank
            ->where('nama_bank', 'KAS KECIL')
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/uang_kas_kecil', $data);
    }
    public function uang_kas_kecil_add()
    {
        $uang_kas = str_replace('.', '', $this->request->getPost('uang_kas')); // Hapus tanda titik
        $uang_kas = (int) str_replace(',', '', $uang_kas); // Konversi ke integer
        $data = [
            'id_sales' => $this->request->getPost('id_sales'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'id_bank' => $this->request->getPost('id_bank'),
            'id_branch' => Session('userData')['id_branch'],
            'minggu' => $this->request->getPost('minggu'),
            'pergantian_minggu' => $this->request->getPost('pergantian_minggu'),
            'id_user' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('ket'),
            'uang_kas' => $uang_kas,
        ];
        $this->mdKas->insert($data);
        $this->mdBank->where('id_bank', $this->request->getPost('id_bank'))->increment('saldo', $uang_kas);


        return redirect()->to(base_url('/akk/keuangan/data_kas'));
    }

    public function form_transfer(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM UANG MASUK KAS BESAR';
        $data['bank'] = $this->mdBank
            ->where('id_bank !=', 5)
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/keuangan/data_kas/form_transfer', $data);
    }
    public function form_transfer_add()
    {
        $uang_kas = str_replace('.', '', $this->request->getPost('uang_kas')); // Hapus tanda titik
        $uang_kas = (int) str_replace(',', '', $uang_kas); // Konversi ke integer
        $data = [
            'id_sales' => $this->request->getPost('id_sales'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'id_bank' => $this->request->getPost('id_bank'),
            'id_branch' => Session('userData')['id_branch'],
            'minggu' => $this->request->getPost('minggu'),
            'pergantian_minggu' => $this->request->getPost('pergantian_minggu'),
            'id_user' => Session('userData')['id_user'],
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'ket' => $this->request->getPost('ket'),
            'uang_kas' => $uang_kas,
        ];
        // print_r($data);
        // exit;
        $this->mdKas->insert($data);
        $this->mdBank->where('id_bank', $this->request->getPost('id_bank'))->increment('saldo', $uang_kas);
        return redirect()->to(base_url('/akk/keuangan/data_kas'));
    }
}

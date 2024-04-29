<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class mutasiBankController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DATA MUTASI BANK';
        $data['model'] = $this->mdMutasiBank
            ->select('mutasi_bank.*, bank_asal.nama_bank as nama_bank_asal, bank_tujuan.nama_bank as nama_bank_tujuan, user.nama_user')
            ->join('user', 'user.id_user=mutasi_bank.user')
            ->join('bank as bank_asal', 'bank_asal.id_bank=mutasi_bank.id_bank')
            ->join('bank as bank_tujuan', 'bank_tujuan.id_bank = mutasi_bank.bank_tujuan')
            ->orderBy('mutasi_bank.id_mutasi_bank','DESC')
            ->findAll();
        return view('admin_kas_kecil/keuangan/mutasi_bank/index', $data);
    }

    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL PEMBAYARAN HUTANG USAHA';
        $data['bank'] = $this->mdBank->findAll();
        return view('admin_kas_kecil/keuangan/mutasi_bank/tambah', $data);
    }

    public function add()
    {
        $data = [
            'id_bank' => $this->request->getPost('id_bank'),
            'biaya_mutasi_bank' => $this->request->getPost('biaya_mutasi_bank'),
            'type_mutasi_bank' => $this->request->getPost('type_mutasi_bank'),
            'week_mutasi_bank' => $this->request->getPost('week_mutasi_bank'),
            'remark_mutasi_bank' => $this->request->getPost('remark_mutasi_bank'),
            'approved_by' => SESSION('userData')['id_user'],
            'tgl_mutasi_bank' => $this->request->getPost('tgl_mutasi_bank'),
            'user' => SESSION('userData')['id_user'],
        ];
        $this->mdMutasiBank->insert($data);
        return redirect()->to(base_url('/akk/mutasi_bank'));
    }

    public function edit($id): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL PEMBAYARAN HUTANG USAHA';
        $data['model'] = $this->mdMutasiBank
            ->join('user', 'user.id_user=mutasi_bank.user')
            ->join('bank', 'bank.id_bank=mutasi_bank.id_bank')
            ->where('id_mutasi_bank', $id)
            ->find()[0];
        $data['bank'] = $this->mdBank->findAll();
        return view('admin_kas_kecil/keuangan/mutasi_bank/edit', $data);
    }
    public function update()
    {
        $id_mutasi_bank =  $this->request->getPost('id_mutasi_bank');
        $id_bank =  $this->request->getPost('id_bank');
        $data = [
            'id_mutasi_bank' => $id_mutasi_bank,
            'id_bank' => $id_bank,
            'biaya_mutasi_bank' => $this->request->getPost('biaya_mutasi_bank'),
            'type_mutasi_bank' => $this->request->getPost('type_mutasi_bank'),
            'week_mutasi_bank' => $this->request->getPost('week_mutasi_bank'),
            'remark_mutasi_bank' => $this->request->getPost('remark_mutasi_bank'),
            'approved_by' => SESSION('userData')['id_user'],
            'tgl_mutasi_bank' => $this->request->getPost('tgl_mutasi_bank'),
            'user' => SESSION('userData')['id_user'],
        ];

        $this->mdMutasiBank->save($data);
        return redirect()->to(base_url('/akk/mutasi_bank'));
    }
}

<?php

namespace App\Controllers\admin_kas_kecil\master;

class bankController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Bank';
        $data['model'] = $this->mdBank
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('user', 'user.id_user=bank.created_by', 'left')->findAll();
        return view('admin_kas_kecil/master/bank/index', $data);
    }

    public function input()
    {
        $data = [
            'payment_code' => $this->request->getPost('payment_code'),
            'created_by' => SESSION('userData')['id_user'],
            'nama_bank' => $this->request->getPost('nama_bank'),
            'saldo' => 0,
            // 'id_branch' => Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdBank->insert($data);
        return redirect()->to(base_url('/akk/master_bank'));
    }

    public function update($id_bank)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Edit';
        $data['model'] = $this->mdBank
            ->where('id_bank', $id_bank)
            ->find()[0];

        return view('admin_kas_kecil/master/bank/edit', $data);
    }

    public function edit()
    {
        $id_bank = $this->request->getPost('id_bank');
        $data = [
            'id_bank' => $id_bank,
            'saldo' => $this->request->getPost('saldo'),
        ];
        $this->mdBank->save($data);
        return redirect()->to(base_url('/akk/keuangan/data_kas/neraca_saldo'));
    }

    public function hapus($id_bank)
    {
        $delete = $this->mdBank->delete($id_bank);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_bank'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

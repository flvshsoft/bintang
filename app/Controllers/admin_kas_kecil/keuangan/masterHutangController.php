<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterHutangController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER HUTANG';
        $data['model'] = $this->mdPiutangUsaha
            ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('status', 0)
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            //->join('purchase_order_detail', 'purchase_order_detail.id_purchase_order_detail=piutang_usaha.id_purchase_order_detail', 'left')
            ->findAll();
        // print_r($data['model']);
        // exit;
        return view('admin_kas_kecil/keuangan/master_hutang/index', $data);
    }

    public function pelunasan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'PELUNASAN HUTANG PABRIK';
        return view('admin_kas_kecil/keuangan/master_hutang/pelunasan', $data);
    }
    public function pot(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER POTONGAN & RETUR PABRIK';
        return view('admin_kas_kecil/keuangan/master_hutang/pot', $data);
    }
    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Transasct Pengeluaran Operasional        ';
        $data['supplier'] = $this->mdSupplier->where('id_branch', Session('userData')['id_branch'])->findAll();
        $data['lastPiutangUsaha'] = $this->mdPiutangUsaha->getLastIdPiutangUsaha();
        return view('admin_kas_kecil/keuangan/master_hutang/tambah', $data);
    }
    public function tambah_save()
    {
        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'type_piutang' => 'Usaha',
            'status' => 0,
            'minggu-ke' => $this->request->getPost('minggu-ke'),
            'jumlah_piutang' => $this->request->getPost('jumlah_piutang'),
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
        ];
        $this->mdPiutangUsaha->save($data);
        return redirect()->to(base_url('/akk/keuangan/master_hutang'));
    }
    public function hapus($id_piutang_usaha)
    {
        $delete = $this->mdPiutangUsaha->delete($id_piutang_usaha);
        if ($delete) {
            return redirect()->to(base_url('/akk/keuangan/master_hutang'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_piutang_usaha)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Transasct Pengeluaran Operasional';
        $data['model'] = $this->mdPiutangUsaha
            ->where('id_piutang_usaha', $id_piutang_usaha)
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->find()[0];
        $data['supplier'] = $this->mdSupplier->where('id_branch', Session('userData')['id_branch'])->findAll();

        return view('admin_kas_kecil/keuangan/master_hutang/edit', $data);
    }

    public function edit_save()
    {
        $id_piutang_usaha = $this->request->getPost('id_piutang_usaha');
        $data = [
            'id_piutang_usaha' => $id_piutang_usaha,
            'id_supplier' => $this->request->getPost('id_supplier'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'minggu-ke' => $this->request->getPost('minggu-ke'),
            'jumlah_piutang' => $this->request->getPost('jumlah_piutang'),
        ];
        $this->mdPiutangUsaha->save($data);
        return redirect()->to(base_url('/akk/keuangan/master_hutang'));
    }

    public function pelunasan_hutang($id_piutang_usaha)
    {
        $po = $this->mdPiutangUsaha
            ->where('id_piutang_usaha', $id_piutang_usaha)
            ->join('purchase_order_detail', 'purchase_order_detail.id_purchase_order_detail=piutang_usaha.id_purchase_order_detail')
            ->join('product', 'product.id_product=purchase_order_detail.id_product')
            ->find();
        $id_product = $po[0]['id_product'];
        $stock_product = $po[0]['stock_product'];
        $jumlah_piutang = $po[0]['jumlah_piutang'];
        //$tambah_barang = $this->mdProduct->where('id_product', $id_product)->increment('stock_product', $stock_product);

        $data = [
            'id_piutang_usaha' => $id_piutang_usaha,
            'status' => 1,
        ];
        // $edit_status = $this->mdPiutangUsaha->save($data);

        $bank = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->where('nama_bank', 'KAS')
            ->find();
        $id_bank = $bank[0]['id_bank'];
        //$kurang_kas = $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $jumlah_piutang);




        // if ($edit_status && $kurang_kas && tambah_barang) {
        //     return redirect()->to(base_url('/akk/keuangan/master_hutang'));
        // } else {
        //     echo 'Gagal menghapus data.';
        // }
    }
}

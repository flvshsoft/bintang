<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterHutangController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER HUTANG';
        $data['model'] = $this->mdPiutangUsaha
            ->select(['*', 'piutang_usaha.created_at as created_at'])
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            ->where('status', 0)
            ->findAll();
        $data['bank'] = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/keuangan/master_hutang/index', $data);
    }

    public function pelunasan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'PELUNASAN HUTANG PABRIK';
        $data['model'] = $this->mdPiutangUsaha
            ->select(['*', 'piutang_usaha.created_at as created_at'])
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            ->where('status', 1)
            //->join('purchase_order_detail', 'purchase_order_detail.id_purchase_order_detail=piutang_usaha.id_purchase_order_detail', 'left')
            ->findAll();
        // print_r($data['model']);
        // exit;
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
        $jumlah_piutang =  str_replace('.', '', $this->request->getPost('jumlah_piutang'));
        $jumlah_piutang = (int) str_replace(',', '', $jumlah_piutang);
        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'type_piutang' => 'Usaha',
            'status' => 0,
            'jenis' => 'Manual',
            'minggu-ke' => $this->request->getPost('minggu-ke'),
            'jumlah_piutang' => $jumlah_piutang,
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

    public function pelunasan_hutang()
    {
        $id_piutang_usaha = $this->request->getPost('id_piutang_usaha');
        $id_bank = $this->request->getPost('id_bank');
        $jenis =  $this->request->getPost('jenis');
        $bank = $this->mdBank->where('id_bank', $id_bank)->find();
        $saldo = $bank[0]['saldo'];
        $nama_bank = $bank[0]['nama_bank'];

        $podetail = $this->mdPiutangUsaha
            ->where('id_piutang_usaha', $id_piutang_usaha)
            ->join('purchase_order_detail', 'purchase_order_detail.id_purchase_order_detail=piutang_usaha.id_purchase_order_detail', 'left')
            ->join('product', 'product.id_product=purchase_order_detail.id_product', 'left')
            ->find();

        if ($podetail) {
            // Data ditemukan, ambil nilai-nilainya
            $id_product = $podetail[0]['id_product'];
            $jumlah_product = $podetail[0]['jumlah_product'];
            $jumlah_piutang = $podetail[0]['jumlah_piutang'];
        } else {
            // Data tidak ditemukan, atur nilai-nilainya ke null atau lakukan tindakan yang sesuai
            $id_product = 0;
            $jumlah_product = 0;
            $jumlah_piutang = 0;
        }

        if ($jenis == "PO") {
            if ($saldo > $jumlah_piutang) {
                $data = [
                    'id_piutang_usaha' => $id_piutang_usaha,
                    'status' => 1,
                ];
                //$this->mdProduct->where('id_product', $id_product)->increment('stock_product', $jumlah_product);
                $this->mdPiutangUsaha->save($data);
                $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $jumlah_piutang);
            } else if ($saldo < $jumlah_piutang) {
                session()->setFlashdata("kurang_saldo", "Maaf! Saldo " . $nama_bank . " Tidak Mencukupi");
                return redirect()->to(base_url('/akk/keuangan/master_hutang'));
            } else {
                "Apa ? ";
            }
        } else {
            if ($saldo > $jumlah_piutang) {
                $data = [
                    'id_piutang_usaha' => $id_piutang_usaha,
                    'status' => 1,
                ];
                $this->mdPiutangUsaha->save($data);
                $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $jumlah_piutang);
            } else if ($saldo < $jumlah_piutang) {
                session()->setFlashdata("kurang_saldo", "Maaf! Saldo " . $nama_bank . " Tidak Mencukupi");
                return redirect()->to(base_url('/akk/keuangan/master_hutang'));
            } else {
                "Apa ? ";
            }
        }
        return redirect()->to(base_url('/akk/keuangan/master_hutang'));
    }
}

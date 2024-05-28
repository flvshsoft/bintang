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
            ->join('supplier', 'supplier.kode_supplier=piutang_usaha.kode_supplier')
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            ->where('jumlah_piutang !=', 0)
            //->where('status', 0)
            ->orderBy('id_piutang_usaha', 'DESC')
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
        $data['model'] = $this->mdPiutangUsahaRiwayat
            ->select(['*', 'piutang_usaha.created_at as created_at'])
            ->join('piutang_usaha', 'piutang_usaha.id_piutang_usaha=piutang_usaha_riwayat.id_piutang_usaha')
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            ->join('bank', 'bank.id_bank=piutang_usaha_riwayat.id_bank')
            // ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('piutang_usaha_riwayat.id_branch', Session('userData')['id_branch'])
            //  ->where('status', 1)

            ->findAll();
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

        $kode_supplier = $this->request->getPost('kode_supplier');
        $id_supplier = $this->request->getPost('id_supplier');
        $tgl_piutang = $this->request->getPost('tgl_piutang');
        $minggu_ke = $this->request->getPost('minggu-ke');
        $id_branch = Session('userData')['id_branch'];
        $id_user = Session('userData')['id_user'];

        // Cek apakah id_supplier sudah ada di database
        $existingData = $this->mdPiutangUsaha
            ->where('id_supplier', $id_supplier)
            ->where('kode_supplier', $kode_supplier)
            ->first();

        if ($existingData) {
            // Update jumlah_piutang yang sudah ada
            $newJumlahPiutang = $existingData['jumlah_piutang'] + $jumlah_piutang;
            $this->mdPiutangUsaha->update($existingData['id_piutang_usaha'], [
                'jumlah_piutang' => $newJumlahPiutang,
                'tgl_piutang' => $tgl_piutang,
                'minggu-ke' => $minggu_ke,
                // 'id_branch' => $id_branch,
                'id_user' => $id_user,
                'status' => 0,
                // 'jenis' => 'Manual',
                // 'type_piutang' => 'Usaha',
            ]);
        } else {
            // Insert data baru jika id_supplier tidak ada
            $data = [
                'kode_supplier' => $kode_supplier,
                'id_supplier' => $id_supplier,
                'tgl_piutang' => $tgl_piutang,
                'type_piutang' => 'Usaha',
                'status' => 0,
                // 'jenis' => 'Manual',
                'minggu-ke' => $minggu_ke,
                'jumlah_piutang' => $jumlah_piutang,
                'jumlah_cicilan' => 0,
                'id_branch' => $id_branch,
                'id_user' => $id_user,
            ];
            $this->mdPiutangUsaha->save($data);
        }

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
            'kode_supplier' => $this->request->getPost('kode_supplier'),
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
            //->join('product', 'product.id_product=purchase_order_detail.id_product', 'left')
            ->join('supplier', 'supplier.kode_supplier=piutang_usaha.kode_supplier', 'left')
            ->find();

        if ($podetail) {
            // Data ditemukan, ambil nilai-nilainya
            $nama_supplier = $podetail[0]['nama_supplier'];
            $id_purchase_order = $podetail[0]['id_purchase_order'];
            $id_product = $podetail[0]['id_product'];
            $jumlah_product = $podetail[0]['jumlah_product'];
            $jumlah_piutang = $podetail[0]['jumlah_piutang'];
        } else {
            // Data tidak ditemukan, atur nilai-nilainya ke null atau lakukan tindakan yang sesuai
            $id_product = 0;
            $jumlah_product = 0;
            $jumlah_piutang = 0;
        }

        if ($saldo > $jumlah_piutang) {
            $this->mdPiutangUsaha->where('id_piutang_usaha', $id_piutang_usaha)->decrement('jumlah_piutang', $jumlah_piutang);
            //$this->mdProduct->where('id_product', $id_product)->increment('stock_product', $jumlah_product);
            $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $jumlah_piutang);
            $input_riwayat = [
                'id_piutang_usaha' => $id_piutang_usaha,
                'id_bank' => $id_bank,
                'id_user' => Session('userData')['id_user'],
                'id_branch' => Session('userData')['id_branch'],
                'total' => $jumlah_piutang,
                'ket_riwayat' => 'Pelunasan Piutang USAHA' . $id_purchase_order . '- Atas Nama :' . $nama_supplier,
            ];
            $this->mdPiutangUsahaRiwayat->save($input_riwayat);
        } else if ($saldo < $jumlah_piutang) {
            session()->setFlashdata("kurang_saldo", "Maaf! Saldo " . $nama_bank . " Tidak Mencukupi");
            return redirect()->to(base_url('/akk/keuangan/master_hutang'));
        } else {
            "Apa ? ";
        }
        return redirect()->to(base_url('/akk/keuangan/master_hutang'));
    }

    public function cicilan($id_piutang_usaha)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Cicilan';
        $data['model'] = $this->mdPiutangUsaha
            ->where('id_piutang_usaha', $id_piutang_usaha)
            ->find()[0];
        $data['bank'] = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/keuangan/master_hutang/cicilan', $data);
    }
    public function cicilan_save()
    {
        $id_piutang_usaha = $this->request->getPost('id_piutang_usaha');
        $ket_riwayat = $this->request->getPost('ket_riwayat');
        $id_bank = $this->request->getPost('id_bank');
        $cicilan = str_replace('.', '', $this->request->getPost('cicilan'));
        $cicilan = (int) str_replace(',', '', $cicilan);
        $total = str_replace('.', '', $this->request->getPost('total'));
        $total = (int) str_replace(',', '', $total);
        $jumlah_piutang = str_replace('.', '', $this->request->getPost('jumlah_piutang'));
        $jumlah_piutang = (int) str_replace(',', '', $jumlah_piutang);

        $bank = $this->mdBank->where('id_bank', $id_bank)->find();
        $saldo = $bank[0]['saldo'];
        $nama_bank = $bank[0]['nama_bank'];

        if ($cicilan <= $jumlah_piutang) {
            if ($cicilan <= $saldo) {
                $input_riwayat = [
                    'id_piutang_usaha' => $id_piutang_usaha,
                    'id_bank' => $id_bank,
                    'id_user' => Session('userData')['id_user'],
                    'id_branch' => Session('userData')['id_branch'],
                    'total' => $cicilan,
                    'ket_riwayat' => $ket_riwayat,
                ];
                $this->mdPiutangUsahaRiwayat->save($input_riwayat);
                $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $cicilan);
                $this->mdPiutangUsaha->where('id_piutang_usaha', $id_piutang_usaha)->decrement('jumlah_piutang', $cicilan);
                session()->setFlashdata("berhasil", "Cicilan Berhasil");
            } else {
                session()->setFlashdata("kurang_saldo", "Maaf! Saldo " . $nama_bank . " Tidak Mencukupi, Jumlah Saldo " . $saldo);
                return redirect()->to(base_url('/akk/keuangan/master_hutang/cicilan/' . $id_piutang_usaha));
            }
        } else {
            session()->setFlashdata("Lebih_Input", "Maaf Cicilan Terlalu Banyak, Input Cicilan dibawah " . $jumlah_piutang);
            return redirect()->to(base_url('/akk/keuangan/master_hutang/cicilan/' . $id_piutang_usaha));
        }

        return redirect()->to(base_url('/akk/keuangan/master_hutang'));
    }
}
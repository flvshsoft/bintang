<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterPengeluaranController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA PENGAMBILAN BARANG';
        $data['model'] = $this->mdPengeluaranSales
            //->select(['*', 'pengeluaran_sales.created_at as created_at'])
            ->where('pengeluaran_sales.id_branch', Session('userData')['id_branch'])
            ->select('pengeluaran_sales.id_sales, pengeluaran_sales.minggu_pengeluaran_sales, area.id_nama_area, pengeluaran_sales.created_at, pengeluaran_sales.keterangan_pengeluaran_sales, pengeluaran_sales.id_pengeluaran_sales,  partner.nama_lengkap, area.nama_area, sales.week, sales.keterangan, sales.tgl_do, SUM(sales_detail.jumlah_sales) AS total_jumlah_sales')
            ->join('sales', 'sales.id_sales=pengeluaran_sales.id_sales')
            ->join('sales_detail', 'sales_detail.id_sales=sales.id_sales', 'left')
            ->join('partner', 'partner.id_partner=pengeluaran_sales.id_partner')
            ->join('user', 'user.id_user=pengeluaran_sales.id_user')
            ->join('area', 'area.id_area=pengeluaran_sales.id_area')
            ->having('total_jumlah_sales !=', 0)
            ->findAll();
        return view('admin_kas_kecil/keuangan/master_pengeluaran/index', $data);
    }

    public function spending_operational($id_pengeluaran_sales): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TRANSASCT PENGELUARAN OPERASIONAL';
        $data['model'] = $this->mdPengeluaranSales
            ->select(['*', 'pengeluaran_sales.created_at as created_at'])
            ->where('id_pengeluaran_sales', $id_pengeluaran_sales)
            ->where('pengeluaran_sales.id_branch', Session('userData')['id_branch'])
            ->join('partner', 'partner.id_partner=pengeluaran_sales.id_partner')
            ->join('user', 'user.id_user=pengeluaran_sales.id_user')
            ->join('area', 'area.id_area=pengeluaran_sales.id_area')
            ->find()[0];
        $data['pengeluaran'] = $this->mdPengeluaranDetailSales
            //->select(['*', 'pengeluaran_sales_detail.created_at as created_at'])
            ->where('pengeluaran_detail_sales.id_branch', Session('userData')['id_branch'])
            ->where('pengeluaran_detail_sales.id_pengeluaran_sales', $id_pengeluaran_sales)
            ->join('pengeluaran_sales', 'pengeluaran_sales.id_pengeluaran_sales=pengeluaran_detail_sales.id_pengeluaran_sales')
            ->find();

        $total = 0;
        foreach ($data['pengeluaran'] as $value) {
            $total += $value['nominal'];
        }
        $data['total'] = $total;
        return view('admin_kas_kecil/keuangan/master_pengeluaran/spending_operational', $data);
    }

    public function spending_operational_insert()
    {
        $nominal =  str_replace('.', '', $this->request->getPost('nominal'));
        $nominal = (int) str_replace(',', '', $nominal);
        $id_pengeluaran_sales = $this->request->getPost('id_pengeluaran_sales');
        $bank = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->where('nama_bank', 'KAS KECIL')
            ->find();
        $id_bank = $bank[0]['id_bank'];
        $saldo = $bank[0]['saldo'];
        $nama_bank = $bank[0]['nama_bank'];

        $data = [
            'id_pengeluaran_sales' => $id_pengeluaran_sales,
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
            'ket_pengeluaran' => $this->request->getPost('ket_pengeluaran'),
            'nominal' => $nominal,
        ];
        if ($nominal <= $saldo) {
            $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $nominal);
            $this->mdPengeluaranDetailSales->save($data);
            session()->setFlashdata("berhasil", "Berhasil Membayar");
        } else {
            session()->setFlashdata("gagal", "Gagal Bayar, Saldo " . $nama_bank . " tidak cukup");
        }
        return redirect()->to(base_url('/akk/keuangan/spending_operational/' . $id_pengeluaran_sales));
    }
    public function master_pengeluaran_op(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER PENGELUARAN OPERASIONAL';
        $data['model'] = $this->mdPengeluaranDetailSales
            ->select(['*', 'pengeluaran_detail_sales.created_at as created_at'])
            ->where('pengeluaran_detail_sales.id_branch', Session('userData')['id_branch'])
            ->join('pengeluaran_sales', 'pengeluaran_sales.id_pengeluaran_sales=pengeluaran_detail_sales.id_pengeluaran_sales')
            ->join('user', 'user.id_user=pengeluaran_detail_sales.id_user')
            ->join('partner', 'partner.id_partner=pengeluaran_sales.id_partner')
            ->findAll();
        return view('admin_kas_kecil/keuangan/master_pengeluaran/master_pengeluaran_op', $data);
    }

    public function edit_master_pengeluaran_op($id_pengeluaran_detail_sales): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Transasct Pengeluaran Operasional        ';
        $data['model'] = $this->mdPengeluaranDetailSales
            ->select(['*', 'pengeluaran_detail_sales.created_at as created_at'])
            ->where('pengeluaran_detail_sales.id_branch', Session('userData')['id_branch'])
            ->where('id_pengeluaran_detail_sales', $id_pengeluaran_detail_sales)
            ->join('pengeluaran_sales', 'pengeluaran_sales.id_pengeluaran_sales=pengeluaran_detail_sales.id_pengeluaran_sales')
            ->join('user', 'user.id_user=pengeluaran_detail_sales.id_user')
            ->join('partner', 'partner.id_partner=pengeluaran_sales.id_partner')
            ->join('area', 'area.id_area=pengeluaran_sales.id_area')
            ->find()[0];
        $j = $this->mdPengeluaranDetailSales
            ->where('pengeluaran_detail_sales.id_branch', Session('userData')['id_branch'])
            ->where('id_pengeluaran_detail_sales', $id_pengeluaran_detail_sales)
            ->join('pengeluaran_sales', 'pengeluaran_sales.id_pengeluaran_sales=pengeluaran_detail_sales.id_pengeluaran_sales')
            ->find();
        $id_pengeluaran_sales = $j[0]['id_pengeluaran_sales'];

        $data['mod'] = $this->mdPengeluaranSales
            ->select(['*', 'pengeluaran_sales.created_at as created_at'])
            ->where('pengeluaran_sales.id_branch', Session('userData')['id_branch'])
            ->where('pengeluaran_sales.id_pengeluaran_sales', $id_pengeluaran_sales)
            ->join('pengeluaran_detail_sales', 'pengeluaran_detail_sales.id_pengeluaran_sales=pengeluaran_sales.id_pengeluaran_sales')
            ->find();

        $total = 0;
        foreach ($data['mod'] as $value) {
            $total += $value['nominal'];
        }
        $data['total'] = $total;

        return view('admin_kas_kecil/keuangan/master_pengeluaran/edit', $data);
    }

    public function spending_operational_hapus($id_pengeluaran_detail_sales, $id_pengeluaran_sales, $total)
    {
        $bank = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->where('nama_bank', 'KAS KECIL')
            ->find();
        $id_bank = $bank[0]['id_bank'];
        $this->mdBank->where('id_bank', $id_bank)->increment('saldo', $total);

        $delete = $this->mdPengeluaranDetailSales->delete($id_pengeluaran_detail_sales);
        if ($delete) {
            session()->setFlashdata("berhasil2", "Berhasil Menghapus Data");
            return redirect()->to(base_url('/akk/keuangan/spending_operational/' . $id_pengeluaran_sales));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function uang_kas_kecil(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = '';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/uang_kas_kecil', $data);
    }

    public function form_transfer(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = '';
        return view('admin_kas_kecil/keuangan/master_pengeluaran/form_transfer', $data);
    }
}
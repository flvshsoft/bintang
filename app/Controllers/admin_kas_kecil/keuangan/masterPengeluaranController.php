<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class masterPengeluaranController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA PENGAMBILAN BARANG';
        $data['model'] = $this->mdPengeluaranSales
            ->select(['*', 'pengeluaran_sales.created_at as created_at'])
            ->where('pengeluaran_sales.id_branch', Session('userData')['id_branch'])
            ->join('partner', 'partner.id_partner=pengeluaran_sales.id_partner')
            ->join('user', 'user.id_user=pengeluaran_sales.id_user')
            ->join('area', 'area.id_area=pengeluaran_sales.id_area')
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
        return view('admin_kas_kecil/keuangan/master_pengeluaran/spending_operational', $data);
    }

    public function spending_operational_insert()
    {
        $nominal =  str_replace('.', '', $this->request->getPost('nominal'));
        $nominal = (int) str_replace(',', '', $nominal);
        $id_pengeluaran_sales = $this->request->getPost('id_pengeluaran_sales');

        $data = [
            'id_pengeluaran_sales' => $id_pengeluaran_sales,
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
            'ket_pengeluaran' => $this->request->getPost('ket_pengeluaran'),
            'nominal' => $nominal,
        ];

        $tambah = $this->mdPengeluaranDetailSales->save($data);
        if ($tambah) {
            session()->setFlashdata("berhasil", "Berhasil Membayar");
        } else {
            'Gagal';
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
            ->find()[0];
        return view('admin_kas_kecil/keuangan/master_pengeluaran/edit', $data);
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

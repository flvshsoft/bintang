<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class terimaBarangController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = ' DATA PURCHASE ORDER';
        $data['model'] = $this->mdPurchaseOrder
            ->select(['*', 'purchase_order.created_at as created_at'])
            ->join('user', 'user.id_user=purchase_order.id_user')
            ->join('supplier', 'supplier.id_supplier=purchase_order.id_supplier')
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            // ->groupBy('')
            ->orderBy('id_purchase_order', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/terima_barang/index', $data);
    }
    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TRANSASCT PENGELUARAN STOCK SAMPLE';
        return view('admin_kas_kecil/transaksi/terima_barang/tambah', $data);
    }
}

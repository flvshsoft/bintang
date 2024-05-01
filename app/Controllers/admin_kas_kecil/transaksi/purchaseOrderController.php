<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class purchaseOrderController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA PURCHASE ORDER';
        $data['model'] = $this->mdPurchaseOrder
            ->select(['*', 'purchase_order.created_at as created_at'])
            ->join('user', 'user.id_user=purchase_order.id_user')
            ->join('supplier', 'supplier.id_supplier=purchase_order.id_supplier')
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            // ->groupBy('')
            ->orderBy('id_purchase_order', 'DESC')
            ->findAll();

        // print_r($data['model']);
        // exit;
        // hapus nota detail kembali kan ke stock do detail
        // hapus do detail kembali ke stock gudang
        // nota detail koma
        // konsumen pay_method type_harga, foto_toko, nama_toko,  alamat_toko, no_hp_toko, nama_owner, alamat_owner no_hp_owner, id_area, kab/kota, data_lengkap
        return view('admin_kas_kecil/transaksi/purchase_order/index', $data);
    }

    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TAMBAH DATA PURCHASE ORDER';
        $data['supplier'] = $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/transaksi/purchase_order/tambah', $data);
    }

    public function tambah_po()
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $data = [
            'id_supplier' => $id_supplier,
            'minggu_purchase_order' => $this->request->getPost('minggu_purchase_order'),
            'status_purchase_order' => $this->request->getPost('status_purchase_order'),
            'keterangan_purchase_order' =>  $this->request->getPost('keterangan_purchase_order'),
            'id_user' => SESSION('userData')['id_user'],
            'id_branch' => SESSION('userData')['id_branch'],
        ];
        $this->mdPurchaseOrder->insert($data);
        return redirect()->to(base_url('/akk/transaksi/purchase_order'));
    }

    public function edit($id_purchase_order): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'EDIT DATA PURCHASE ORDER';
        $data['model'] = $this->mdPurchaseOrder
            ->where('id_purchase_order', $id_purchase_order)
            ->select(['*', 'purchase_order.created_at as created_at'])
            ->join('user', 'user.id_user=purchase_order.id_user')
            ->join('supplier', 'supplier.id_supplier=purchase_order.id_supplier')
            ->find()[0];
        $data['supplier'] = $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/transaksi/purchase_order/edit', $data);
    }
    public function edit_po()
    {
        $id_purchase_order = $this->request->getPost('id_purchase_order');
        $id_supplier = $this->request->getPost('id_supplier');
        $data = [
            'id_purchase_order' => $id_purchase_order,
            'id_supplier' => $id_supplier,
            'minggu_purchase_order' => $this->request->getPost('minggu_purchase_order'),
            'status_purchase_order' => $this->request->getPost('status_purchase_order'),
            'keterangan_purchase_order' =>  $this->request->getPost('keterangan_purchase_order'),
            'id_user' => SESSION('userData')['id_user'],
            'id_branch' => SESSION('userData')['id_branch'],
        ];
        $this->mdPurchaseOrder->save($data);
        return redirect()->to(base_url('/akk/transaksi/purchase_order'));
    }

    public function hapus_po($id_purchase_order)
    {
        $delete = $this->mdPurchaseOrder->delete($id_purchase_order);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/purchase_order'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
    public function print($id_nota): string
    {
        $data['judul'] = 'BINTANG DISTRIBUTOR';
        $data['judul1'] = 'NOTA KONTAN';
        $data['nota'] = $this->mdNota
            ->join('area', 'area.id_area=nota.id_area')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('bank', 'bank.id_bank=nota.id_bank')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->where('id_nota', $id_nota)
            ->find()[0];

        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('nota', 'nota.id_sales=sales_detail.id_sales')
            ->where('id_nota', $id_nota)
            ->findAll();
        $data['model'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('price_detail', 'price_detail.id_product=product.id_product')
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->where('nota_detail.id_nota', $id_nota)
            ->groupBy('id_nota_detail')
            ->findAll();
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('nota.id_nota', $id_nota)
            ->findAll();

        return view('admin_kas_kecil/transaksi/purchase_order/print', $data);
    }
}

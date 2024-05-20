<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class terimaBarangController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TERIMA BARANG PO ';
        $data['model'] = $this->mdPurchaseOrder
            ->select(['*', 'purchase_order.created_at as created_at'])
            ->join('user', 'user.id_user=purchase_order.id_user')
            ->join('supplier', 'supplier.id_supplier=purchase_order.id_supplier')
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            ->orderBy('id_purchase_order', 'DESC')
            ->findAll();

        return view('admin_kas_kecil/transaksi/terima_barang/index', $data);
    }
    public function detail($id_po): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL';
        $data['id_purchase_order'] = $id_po;

        $data['podetail'] = $this->mdPurchaseOrderDetail
            ->where('purchase_order.id_purchase_order', $id_po)
            ->join('purchase_order', 'purchase_order.id_purchase_order=purchase_order_detail.id_purchase_order')
            ->join('product', 'product.id_product=purchase_order_detail.id_product')
            ->findAll();

        return view('admin_kas_kecil/transaksi/terima_barang/detail', $data);
    }

    public function tambah_nama_barang()
    {
        $id = $this->request->getVar('id');
        $temp = explode(',', $id);
        $id_purchase_order_detail = $temp[0];
        $id_product = $temp[1];

        $product = $this->mdPurchaseOrderDetail
            ->join('product', 'product.id_product=purchase_order_detail.id_product')
            ->where('purchase_order_detail.id_purchase_order_detail', $id_purchase_order_detail)
            ->where('purchase_order_detail.id_product', $id_product)
            ->find();
        $total = $product[0]['jumlah_product'] - $product[0]['jumlah_masuk'];

        return $product[0]['nama_product'] . ',' . $total;
    }

    public function detail_input()
    {
        $id_purchase_order = $this->request->getPost('id_purchase_order');
        $id_po_dan_produk = $this->request->getPost('id_po_dan_produk');
        $satuan = $this->request->getPost('satuan');

        $temp = explode(',', $id_po_dan_produk);
        $id_purchase_order_detail = $temp[0];
        $id_product = $temp[1];
        $jumlah_product = $this->request->getPost('jumlah_product');
        $jumlah_masuk = str_replace('.', '', $this->request->getPost('jumlah_masuk'));
        $jumlah_masuk = (int) str_replace(',', '', $jumlah_masuk);

        if ($jumlah_masuk <= $jumlah_product) {
            print_r([$jumlah_masuk, $id_purchase_order_detail]);
            // $pod = $this->mdPurchaseOrderDetail->where('id_purchase_order_detail', $id_purchase_order_detail)->increment('jumlah_masuk', $jumlah_masuk);
            $data2 = [
                'id_purchase_order_detail' => $id_purchase_order_detail,
                'jumlah_masuk' => $jumlah_masuk,
            ];
            print_r($data2);
            $this->mdPurchaseOrderDetail->save($data2);

            if ($satuan == 'Defect') {
                $this->mdProduct->where('id_product', $id_product)->increment('defect', $jumlah_masuk);
            } elseif ($satuan == 'Gudang') {
                $this->mdProduct->where('id_product', $id_product)->increment('stock_product', $jumlah_masuk);
            } elseif ($satuan == 'Sample') {
                $this->mdProduct->where('id_product', $id_product)->increment('sample', $jumlah_masuk);
            }
            session()->setFlashdata("berhasil", "Berhasil menambahkan stok barang ke " . $satuan);

            # Pengecekan  
            $po = $this->mdPurchaseOrderDetail->where('purchase_order_detail.id_purchase_order', $id_purchase_order)->findAll();
            $total = 0;
            foreach ($po as $value) {
                print_r([$value['jumlah_product'] - $value['jumlah_masuk']]);
                $total += $value['jumlah_product'] - $value['jumlah_masuk'];
            }
            echo $total;
            if ($total == 0) {
                $data2 = [
                    'id_purchase_order' => $id_purchase_order,
                    'status_purchase_order' => "Sudah diterima",
                ];
                print_r($data2);
                $this->mdPurchaseOrder->save($data2);
                session()->setFlashdata("berhasil", "Berhasil menambahkan stok barang ke " . $satuan. " dan Stok PO sudah diterima semua");
                return redirect()->to(base_url('/akk/transaksi/terima_barang'));
            }
        } else if ($jumlah_masuk >= $jumlah_product) {
            session()->setFlashdata("lebih", "Maaf! Input Jumlah dibawah "  . $jumlah_product . " Tidak Mencukupi");
        }
        return redirect()->to(base_url('/akk/transaksi/terima_barang/detail/' . $id_purchase_order));
    }
}

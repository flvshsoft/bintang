<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

use CodeIgniter\Session\Session;

class purchaseOrderController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA PURCHASE ORDER';
        $data['model'] = $this->mdPurchaseOrder
            ->select(['*', 'purchase_order.created_at as created_at'])
            ->join('user', 'user.id_user=purchase_order.id_user')
            ->join('supplier', 'supplier.kode_supplier=purchase_order.kode_supplier')
            ->where('purchase_order.id_branch', Session('userData')['id_branch'])
            ->groupBy('purchase_order.id_purchase_order')
            ->orderBy('purchase_order.id_purchase_order', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/purchase_order/index', $data);
    }

    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'TAMBAH DATA PURCHASE ORDER';
        $data['supplier'] = $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_supplier')
            ->findAll();
        return view('admin_kas_kecil/transaksi/purchase_order/tambah', $data);
    }

    public function tambah_po()
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $kode_supplier = $this->request->getPost('kode_supplier');
        $data = [
            'id_supplier' => $id_supplier,
            'kode_supplier' => $kode_supplier,
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
            ->join('supplier', 'supplier.kode_supplier=purchase_order.kode_supplier')
            ->find()[0];
        $data['supplier'] = $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/transaksi/purchase_order/edit', $data);
    }
    public function edit_po()
    {
        $id_purchase_order = $this->request->getPost('id_purchase_order');
        $kode_supplier = $this->request->getPost('kode_supplier');
        $data = [
            'id_purchase_order' => $id_purchase_order,
            'kode_supplier' => $kode_supplier,
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

    public function hapus_detail($id_purchase_order_detail, $id_purchase_order, $kode_supplier, $hutang)
    {
        $piutang = $this->mdPiutangUsaha
            ->where('kode_supplier', $kode_supplier)
            //->where('id_supplier', $id_supplier)
            ->where('type_piutang', "Usaha")
            ->find();
        // print_r($piutang);
        // exit;

        $id_piutang_usaha = $piutang[0]['id_piutang_usaha'];

        $this->mdPiutangUsaha
            ->where('id_piutang_usaha', $id_piutang_usaha)
            ->decrement('jumlah_piutang', $hutang);
        $delete = $this->mdPurchaseOrderDetail->delete($id_purchase_order_detail);

        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/purchase_order/detail/' . $id_purchase_order));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function detail($id_purchase_order): string
    {
        $data['judul'] = 'Detail PO';
        $data['judul1'] = 'DETAIL DATA PURCHASE ORDER';
        $data['info'] = $this->mdPurchaseOrder
            ->select(['*', 'purchase_order.created_at as created_at', 'purchase_order.id_purchase_order as id_purchase_order'])
            ->join('user', 'user.id_user=purchase_order.id_user')
            ->join('supplier', 'supplier.kode_supplier=purchase_order.kode_supplier')
            ->join('purchase_order_detail', 'purchase_order_detail.id_purchase_order=purchase_order.id_purchase_order', 'left')
            ->where('purchase_order.id_purchase_order', $id_purchase_order)
            ->find()[0];
        $data['model'] = $this->mdPurchaseOrderDetail
            ->where('purchase_order_detail.id_purchase_order', $id_purchase_order)
            ->select(['*', 'purchase_order_detail.created_at as created_at', 'purchase_order_detail.harga_beli as harga_beli'])
            ->join('purchase_order', 'purchase_order.id_purchase_order=purchase_order_detail.id_purchase_order')
            ->join('product', 'product.id_product=purchase_order_detail.id_product')
            ->findAll();

        $data['supplier'] = $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['product'] = $this->mdProduct
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/transaksi/purchase_order/detail', $data);
    }
    // public function detail_input()
    // {
    //     $id_purchase_order = $this->request->getPost('id_purchase_order');
    //     $id_supplier = $this->request->getPost('id_supplier');

    //     $id_product = $this->request->getPost('id_product');
    //     $jumlah_product = str_replace('.', '', $this->request->getPost('jumlah_product'));
    //     $jumlah_product = (int) str_replace(',', '', $jumlah_product);
    //     $harga_beli = str_replace(',', '', $this->request->getPost('harga_beli'));
    //     $harga_beli = (int) str_replace(',', '', $harga_beli);
    //     $data = [
    //         'id_purchase_order' => $id_purchase_order,
    //         'harga_beli' => $harga_beli,
    //         'jumlah_product' => $jumlah_product,
    //         'jumlah_masuk' => 0,
    //         'id_product' => $id_product,
    //     ];
    //     $this->mdPurchaseOrderDetail->save($data);
    //     $id_purchase_order_detail = $this->mdPurchaseOrderDetail->insertID();
    //     $new_data = array(
    //         'id_purchase_order_detail' => $id_purchase_order_detail,
    //     );

    //     $md_suppplier = $this->mdPiutangUsaha
    //         ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
    //         ->where('supplier.id_supplier', $id_supplier)
    //         ->find();
    //     if (isset($md_suppplier[0])) {
    //         $id_supplier = $md_suppplier[0]['id_supplier'];
    //         // $minggu_purchase_order = $md_suppplier[0]['minggu_purchase_order'];

    //         $jumlah_piutang = $harga_beli * $jumlah_product;

    //         $existingData = $this->mdPiutangUsaha
    //             ->where('id_supplier', $id_supplier)
    //             ->where('type_piutang', "PO")
    //             ->first();

    //         if ($existingData) {
    //             $this->mdPiutangUsaha
    //                 ->increment('jumlah_piutang', $jumlah_piutang);
    //         } else {
    //             $data2 = [
    //                 'id_branch' => Session('userData')['id_branch'],
    //                 // 'id_purchase_order_detail' => $id_purchase_order_detail,
    //                 'id_user' => Session('userData')['id_user'],
    //                 // 'id_purchase_order' => $id_purchase_order,
    //                 'id_supplier' => $id_supplier,
    //                 //  'minggu-ke' => $minggu_purchase_order,
    //                 'harga_beli' => $harga_beli,
    //                 'jumlah_piutang' => $jumlah_piutang,
    //                 'jumlah_cicilan' => 0,
    //                 'jenis' => 'PO',
    //                 'type_piutang' => 'PO',
    //                 'status' => 0,
    //                 'jumlah_product' => $jumlah_product,
    //             ];
    //             $this->mdPiutangUsaha->insert($data2);
    //         }
    //     }
    //     return redirect()->to(base_url('/akk/transaksi/purchase_order/detail/' . $id_purchase_order));
    // }
    public function detail_input()
    {
        $id_purchase_order = $this->request->getPost('id_purchase_order');
        $id_supplier = $this->request->getPost('id_supplier');
        $kode_supplier = $this->request->getPost('kode_supplier');
        $id_product = $this->request->getPost('id_product');

        $jumlah_product = str_replace('.', '', $this->request->getPost('jumlah_product'));
        $jumlah_product = (int) str_replace(',', '', $jumlah_product);
        $harga_beli = str_replace(',', '', $this->request->getPost('harga_beli'));
        $harga_beli = (int) str_replace(',', '', $harga_beli);

        $jumlah_piutang = $harga_beli * $jumlah_product;
        $data = [
            'id_purchase_order' => $id_purchase_order,
            'harga_beli' => $harga_beli,
            'jumlah_product' => $jumlah_product,
            'jumlah_masuk' => 0,
            'id_product' => $id_product,
        ];

        $this->mdPurchaseOrderDetail->save($data);

        $existingData = $this->mdPiutangUsaha
            ->where('kode_supplier', $kode_supplier)
            //  ->where('id_supplier', $id_supplier)
            ->where('type_piutang', "Usaha")
            ->first();

        if ($existingData) {
            $this->mdPiutangUsaha
                ->where('kode_supplier', $kode_supplier)
                // ->where('id_supplier', $id_supplier)
                ->where('type_piutang', "Usaha")
                ->increment('jumlah_piutang', $jumlah_piutang);
        } else {
            $data2 = [
                'id_branch' => Session('userData')['id_branch'],
                // 'id_purchase_order_detail' => $id_purchase_order_detail,
                'id_user' => Session('userData')['id_user'],
                // 'id_purchase_order' => $id_purchase_order,
                // 'id_supplier' => $id_supplier,
                'kode_supplier' => $kode_supplier,
                //  'minggu-ke' => $minggu_purchase_order,
                'harga_beli' => $harga_beli,
                'jumlah_piutang' => $jumlah_piutang,
                'jumlah_cicilan' => 0,
                // 'jenis' => 'PO',
                'type_piutang' => 'Usaha',
                'status' => 0,
                'jumlah_product' => $jumlah_product,
            ];
            $this->mdPiutangUsaha->insert($data2);
        }
        //}
        return redirect()->to(base_url('/akk/transaksi/purchase_order/detail/' . $id_purchase_order));
    }
    public function tambah_nama_barang()
    {
        $id = $this->request->getVar('id');
        $data['product'] = $this->mdProduct
            ->where('product.id_product', $id)
            ->find()[0];
        return $data['product']['nama_product'] . ';' . $data['product']['satuan_product'] . ';' . $data['product']['harga_beli'];
    }

    public function hitung_hutang()
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA PURCHASE ORDER';
        $data['model'] = $this->mdPurchaseOrderDetail
            // ->select(['*', 'purchase_order.created_at as created_at'])
            // ->select('*, purchase_order.created_at as created_at, (purchase_order_detail.jumlah_product * purchase_order_detail.harga_beli) as total_value')
            ->select('purchase_order.id_branch, purchase_order.id_user, purchase_order.kode_supplier, SUM(purchase_order_detail.jumlah_product * purchase_order_detail.harga_beli) as jumlah_piutang')
            ->join('purchase_order', 'purchase_order.id_purchase_order=purchase_order_detail.id_purchase_order')
            // ->join('user', 'user.id_user=purchase_order.id_user')
            // ->join('supplier', 'supplier.id_supplier=purchase_order.id_supplier')
            // ->where('purchase_order.id_branch', Session('userData')['id_branch'])
            ->where('purchase_order.kode_supplier >', 0)
            ->groupBy('purchase_order.kode_supplier')
            // ->groupBy('purchase_order.id_purchase_order')
            // ->orderBy('purchase_order.id_purchase_order', 'DESC')
            ->findAll();

            foreach ($data['model'] as $key => $value) {
                $data_save = [
                    'id_branch' => $value['id_branch'],
                    'id_user' => $value['id_user'],
                    'kode_supplier' => $value['kode_supplier'],
                    'type_piutang' => 'Usaha',
                    'jumlah_piutang' => $value['jumlah_piutang'],
                ];
                print_r($data_save);
                $this->mdPiutangUsaha->insert($data_save);
               
            }
        // print_r($data['model']);
        // return view('admin_kas_kecil/transaksi/purchase_order/index', $data);
    }
}

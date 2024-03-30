<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class StockAkhirController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Stock Akhir Salesman';
        // $data['model'] = $this->mdStockAkhir
        //     // ->where('id_branch', Session('userData')['id_branch'])
        //     // ->join('partner', 'partner.id_partner=sales.id_partner',)
        //     // ->join('area', 'area.id_area=sales.id_area')
        //     // ->join('asset', 'asset.id_asset=sales.id_asset')
        //     ->orderBy('id_stock_akhir', 'DESC')
        //     ->findAll();
        $data['model'] = $this->mdSales
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/stock_akhir/index', $data);
    }
    // public function tambah(): string
    // {
    //     $data['judul'] = 'Bintang Distributor';
    //     $data['judul1'] = 'Transasct Pengembalian Barang Salesman';
    //     $data['salesman'] = $this->mdPartner
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();
    //     $data['area'] = $this->mdArea
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();
    //     $data['asset'] = $this->mdAsset
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();
    //     $data['product'] = $this->mdProduct
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();


    //     return view('admin_kas_kecil/transaksi/stock_akhir/tambah', $data);
    // }
    // public function input()
    // {
    //     $data = [
    //         // 'id_branch', Session('userData')['id_branch']
    //         'id_product' => $this->request->getPost('id_product'),
    //         'jumlah_stock_kembali' => $this->request->getPost('jumlah_stock_kembali'),
    //         'satuan' => $this->request->getPost('satuan'),
    //     ];

    //     // print_r($data);
    //     // exit;
    //     $this->mdStockAkhir->save($data);
    //     // $id_sales = $this->mdSales->insertID();
    //     // $data = array(
    //     //     'id_sales' => $id_sales,
    //     // );

    //     $id_product = $this->request->getPost('id_product');

    //     $mdProduct = $this->mdProduct
    //         ->join('supplier', 'supplier.id_supplier=product.id_supplier')
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->where('id_product', $id_product)
    //         ->find()[0];
    //     $stock_product = $mdProduct['stock_product'] + $this->request->getPost('jumlah_stock_kembali');
    //     $data = [
    //         'id_product' => $id_product,
    //         'stock_product' => $stock_product,
    //     ];
    //     print_r($data);
    //     // exit;
    //     $this->mdProduct->save($data);


    //     return redirect()->to(base_url('/akk/transaksi/stock_akhir'));
    // }
    // public function hapus($id_sales)
    // {
    //     $delete = $this->mdSales->delete($id_sales);
    //     if ($delete) {
    //         return redirect()->to(base_url('/akk/master_sales'));
    //     } else {
    //         echo 'Gagal menghapus data.';
    //     }
    // }

    public function edit($id_sales)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Stock Akhir - Edit';
        $data['id_sales_do'] = $id_sales;
        $data['salesman'] = $this->mdPartner
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['area'] = $this->mdArea
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['asset'] = $this->mdAsset
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['product'] = $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['info'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->where('id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];

        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            //->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            //->join('product', 'product.id_product=price_detail.id_product')
            ->join('nota', 'nota.id_sales=sales_detail.id_sales')
            ->where('id_nota', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();

        return view('admin_kas_kecil/transaksi/stock_akhir/edit', $data);
    }

    public function edit_save()
    {
        $id_sales_do = $this->request->getPost('id_sales_do');
        $id_product = $this->request->getPost('id_product');
        $temp = explode(',',$id_product);
        $id_sales_detail = $temp[0];
        $id_product = $temp[1];
        $satuan = $this->request->getPost('satuan');
        $jumlah_stock_kembali = $this->request->getPost('jumlah_stock_kembali');
        $data = [
            'id_sales_do' => $id_sales_do,
            'id_product' => $id_product,
            'jumlah_stock_kembali' => $jumlah_stock_kembali,
            'satuan' => $satuan,
            'created_by' => SESSION('userData')['id_user'],
            // 'id_branch'=>Session('userData')['id_branch']
        ];
        print_r($data);
        // exit;
        $this->mdStockAkhir->save($data);

        // Stock
        if ($satuan == "Defect") {
            $a = $this->mdProduct->where('id_product', $id_product)->increment('defect', $jumlah_stock_kembali);
        } elseif ($satuan == "Sample") {
            $a = $this->mdProduct->where('id_product', $id_product)->increment('sample', $jumlah_stock_kembali);
        } else {
            $this->mdProduct->where('id_product', $id_product)->increment('stock_product', $jumlah_stock_kembali);
        }
        $this->mdSalesDetail->where('id_sales_detail', $id_sales_detail)->decrement('jumlah_sales', $jumlah_stock_kembali);
        // return redirect()->to(base_url('/akk/stock_akhir/edit/'.$id_sales_do));
    }

    // public function detail($id_sales)
    // {
    //     $data['judul'] = 'Bintang';
    //     $data['judul1'] = 'Detail Product';
    //     $data['model'] = $this->mdSalesDetail
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->join('sales', 'sales.id_sales=sales_detail.id_sales',)
    //         ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
    //         ->join('product', 'product.id_product=price_detail.id_product')
    //         ->join('partner', 'partner.id_partner=sales.id_partner')
    //         ->where('sales_detail.id_sales', $id_sales)
    //         ->orderBy('id_sales_detail', 'DESC')
    //         ->findAll();
    //     // print_r($data['model']);
    //     // exit;
    //     $data['id_sales'] = $this->mdSales
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->where('id_sales', $id_sales)
    //         ->find()[0];
    //     return view('admin_kas_kecil/transaksi/stock_akhir/detail', $data);
    // }

    // public function detail_tambah($id_sales)
    // {
    //     $data['judul'] = 'Bintang';
    //     $data['judul1'] = 'Detail Product';
    //     $data['model'] = $this->mdSales
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->join('partner', 'partner.id_partner=sales.id_partner',)
    //         ->join('area', 'area.id_area=sales.id_area')
    //         ->join('asset', 'asset.id_asset=sales.id_asset')
    //         ->where('id_sales', $id_sales)
    //         ->findAll();
    //     $data['id_sales'] = $this->mdSales
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->where('id_sales', $id_sales)
    //         ->find()[0];
    //     $data['product'] = $this->mdProduct
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->join('price_detail', 'price_detail.id_product=product.id_product')

    //         ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')

    //         ->findAll();
    //     // print_r($data['product']);
    //     // exit;
    //     $data['area'] = $this->mdArea
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();
    //     $data['asset'] = $this->mdAsset
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();
    //     //  $data['product'] = $this->mdProduct ->findAll();
    //     return view('admin_kas_kecil/transaksi/stock_akhir/detail_tambah', $data);
    // }

    // public function tambah_nama_barang()
    // {
    //     $id = $this->request->getVar('id');
    //     $data['product'] = $this->mdProduct
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->join('price_detail', 'price_detail.id_product=product.id_product')
    //         ->join('sales_detail', 'sales_detail.id_price_detail=price_detail.id_price_detail')
    //         ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
    //         ->where('price_detail.id_price_detail', $id)
    //         ->orderBy('product.id_product', 'ASC')
    //         ->find()[0];
    //     // print_r($data);
    //     return $data['product']['nama_product'] . ';' . $data['product']['stock_product'];
    // }
    // public function input_detail_sales()
    // {
    //     $id_sales = $this->request->getPost('id_sales');
    //     $id_price_detail = $this->request->getPost('id_price_detail');
    //     $id_product = $this->request->getPost('id_product');
    //     $satuan_sales_detail = $this->request->getPost('satuan_sales_detail');
    //     $data = [
    //         'id_sales' => $id_sales,
    //         'id_product' => 0,
    //         'satuan_sales_detail' => $satuan_sales_detail,
    //         'id_price_detail' => $id_price_detail,
    //         //'id_branch' => Session('userData')['id_branch']
    //     ];
    //     // print_r($data);
    //     // exit;
    //     $this->mdSalesDetail->insert($data);
    //     $this->mdProduct->where('id_product', $id_product)->decrement('stock_product', $satuan_sales_detail);


    //     return redirect()->to(base_url('/akk/detail_sales/' . $id_sales));
    // }
    // public function edit_detail_sales($id_sales_detail)
    // {
    //     $data['judul'] = 'Bintang';
    //     $data['judul1'] = 'Detail Product';
    //     $data['id_sales'] = $this->mdSalesDetail
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->where('id_sales_detail', $id_sales_detail)
    //         ->find()[0];
    //     $data['model'] = $this->mdSalesDetail
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->join('sales', 'sales.id_sales=sales_detail.id_sales',)
    //         ->join('product', 'product.id_product=sales_detail.id_product')
    //         ->where('sales_detail.id_sales_detail', $id_sales_detail)
    //         ->find()[0];
    //     $data['product'] = $this->mdProduct->findAll();
    //     return view('admin_kas_kecil/transaksi/stock_akhir/detail_edit', $data);
    // }
    // public function update_detail_sales()
    // {
    //     $id_sales_detail = $this->request->getPost('id_sales_detail');
    //     $id_sales = $this->request->getPost('id_sales');
    //     $id_product = $this->request->getPost('id_product');
    //     $data = [
    //         'id_sales_detail' => $id_sales_detail,
    //         'id_sales' => $id_sales,
    //         'id_product' => $id_product,
    //         // 'id_branch'=> Session('userData')['id_branch'],
    //         'satuan_sales_detail' => $this->request->getPost('satuan_sales_detail'),
    //         // 'jumlah_sales' => $this->request->getPost('jumlah_sales'),
    //     ];
    //     // print_r($data);
    //     // exit;
    //     $this->mdSalesDetail->save($data);
    //     return redirect()->to(base_url('/akk/detail_sales/' . $id_sales));
    // }
    // public function hapus_detail_sales($id_sales_detail, $id_sales)
    // {
    //     $delete = $this->mdSalesDetail->delete($id_sales_detail);
    //     if ($delete) {
    //         return redirect()->to(base_url('/akk/detail_sales/' . $id_sales));
    //     } else {
    //         echo 'Gagal menghapus data.';
    //     }
    // }

    // public function print($id_sales)
    // {
    //     $data['judul'] = 'Bintang';
    //     $data['judul1'] = 'Laporan Pengambilan Barang';
    //     $data['model'] = $this->mdSalesDetail
    //         ->join('product', 'product.id_product=sales_detail.id_product',)
    //         ->join('sales', 'sales.id_sales=sales_detail.id_sales')
    //         ->where('sales_detail.id_sales', $id_sales)
    //         // ->where('id_branch', Session('userData')['id_branch'])
    //         ->findAll();
    //     $data['sales'] = $this->mdSales
    //         ->where('id_sales', $id_sales)
    //         ->find()[0];
    //     $mpdf = new \Mpdf\Mpdf();
    //     $html = view('admin_kas_kecil/transaksi/stock_akhir/print', $data, []);
    //     $mpdf->WriteHTML($html);
    //     $this->response->setHeader('Content-Type', 'application/pdf');
    //     $mpdf->Output('arjun.pdf', 'I'); // opens in browser

    //     // return view('admin_kas_kecil/transaksi/stock_akhir/print', $data);
    // }
}

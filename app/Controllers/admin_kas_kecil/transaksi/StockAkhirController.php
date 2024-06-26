<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class StockAkhirController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Stock Akhir Salesman';
        $data['model'] = $this->mdSales
            ->select('sales.id_sales, partner.nama_lengkap, area.nama_area, sales.week, sales.keterangan, sales.tgl_do, sales.created_at, SUM(sales_detail.jumlah_sales) AS total_jumlah_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('sales_detail', 'sales_detail.id_sales=sales.id_sales', 'left')
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->groupBy('sales.id_sales')
            ->having('total_jumlah_sales !=', 0)
            ->findAll();

        return view('admin_kas_kecil/transaksi/stock_akhir/index', $data);
    }

    public function edit($id_sales)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Stock Akhir - Edit';
        $data['id_sales_do'] = $id_sales;
        $data['model'] = $this->mdStockAkhir
            ->join('product', 'product.id_product=stock_akhir.id_product')
            // ->join('sales_detail', 'sales_detail.id_product=stock_akhir.id_product')
            ->where('stock_akhir.id_sales_do', $id_sales)
            ->findAll();
        // sales
        $data['info'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->where('id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];

        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            //->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            // ->join('nota', 'nota.id_sales=sales_detail.id_sales')
            ->where('sales_detail.id_sales', $id_sales)
            // ->where('jumlah_sales >', '0')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();


        $temp = [];
        $temp2 = [];
        foreach ($data['sales_detail'] as $key => $value) {
            $temp[$value['id_sales_detail']] = $value;
            if ($value['jumlah_sales'] > 0) {
                $temp2[$value['id_sales_detail']] = $value;
            }
        }
        $data['sales_detail_basic'] = $temp;
        $data['sales_detail'] = $temp2;
        return view('admin_kas_kecil/transaksi/stock_akhir/edit', $data);
    }

    public function edit_save()
    {
        $id_sales_do = $this->request->getPost('id_sales_do');
        $id_product = $this->request->getPost('id_product');
        $temp = explode(',', $id_product);
        $id_sales_detail = $temp[0];
        $id_product = $temp[1];
        $satuan = $this->request->getPost('satuan');
        $jumlah_stock_kembali = $this->request->getPost('jumlah_stock_kembali');
        // sales detail
        $modelSalesDetail = $this->mdSalesDetail->where('id_sales_detail', $id_sales_detail);
        // print_r($jumlah_stock_kembali);
        // print_r($modelSalesDetail->find());
        // exit;
        // cek stok
        if ($jumlah_stock_kembali <= $modelSalesDetail->find()[0]['jumlah_sales']) {

            $data = [
                'id_sales_do' => $id_sales_do,
                'id_product' => $id_product,
                'jumlah_stock_kembali' => $jumlah_stock_kembali,
                'satuan' => $satuan,
                'created_by' => SESSION('userData')['id_user'],
                // 'id_branch'=>Session('userData')['id_branch']
            ];
            // print_r($data);
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
            return redirect()->to(base_url('/akk/transaksi/stock_akhir/edit/' . $id_sales_do));
        } else {
            return redirect()->to(base_url('/akk/transaksi/stock_akhir/edit/' . $id_sales_do . '#stok_tidak_cukup'));
        }
    }

    public function tambah_nama_barang()
    {
        $id = $this->request->getVar('id');
        $temp = explode(',', $id);
        $id_sales_detail = $temp[0];
        $id_product = $temp[1];

        $product = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->where('sales_detail.id_sales_detail', $id_sales_detail)
            ->where('sales_detail.id_product', $id_product)
            ->find()[0];
        return $product['nama_product'] . ',' . $product['jumlah_sales'];
    }

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
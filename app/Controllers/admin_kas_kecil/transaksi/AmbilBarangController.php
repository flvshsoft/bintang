<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class AmbilBarangController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Pengambilan Barang (DO)';
        $data['model'] = $this->mdSales
            ->select(['*', 'sales.created_at as created_at'])
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/ambil_barang/index', $data);
    }
    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Transact Penjualan Barang';
        $data['salesman'] = $this->mdPartner
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_lengkap', 'ASC')
            ->findAll();
        $data['area'] = $this->mdArea
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_area', 'ASC')
            ->findAll();
        $data['asset'] = $this->mdAsset
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_asset', 'ASC')
            ->findAll();

        return view('admin_kas_kecil/transaksi/ambil_barang/tambah', $data);
    }
    public function input()
    {
        $data = [
            'id_partner' => $this->request->getPost('id_partner'),
            'id_asset' => $this->request->getPost('id_asset'),
            'id_area' => $this->request->getPost('id_area'),
            'km' => $this->request->getPost('km'),
            'week' => $this->request->getPost('week'),
            'tgl_do' => $this->request->getPost('tgl_do'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_branch' => Session('userData')['id_branch'],
            'created_date' => date('Y-m-d H:i:s'),
        ];
        $this->mdSales->insert($data);
        $id_sales = $this->mdSales->insertID();
        $data = array(
            'id_sales' => $id_sales,
        );

        $data = [
            'id_partner' => $this->request->getPost('id_partner'),
            'id_user' => Session('userData')['id_user'],
            'id_area' => $this->request->getPost('id_area'),
            'id_sales' => $id_sales,
            'minggu_pengeluaran_sales' => $this->request->getPost('week'),
            'keterangan_pengeluaran_sales' => $this->request->getPost('keterangan'),
            'id_branch' => Session('userData')['id_branch'],
            'created_date' => date('Y-m-d H:i:s'),
        ];
        $this->mdPengeluaranSales->insert($data);
        return redirect()->to(base_url('/akk/transaksi/ambil_barang/detail/' . $id_sales));
    }
    public function hapus($id_sales)
    {
        $delete = $this->mdSales->delete($id_sales);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/ambil_barang'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_sales)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Product';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->where('id_sales', $id_sales)
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->find()[0];
        $data['salesman'] = $this->mdPartner
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_lengkap', 'ASC')
            ->findAll();
        $data['area'] = $this->mdArea
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_nama_area', 'ASC')
            ->findAll();
        $data['asset'] = $this->mdAsset
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_asset', 'ASC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/ambil_barang/edit', $data);
    }

    public function update()
    {
        $id_sales = $this->request->getPost('id_sales');
        $data = [
            'id_sales' => $id_sales,
            'id_partner' => $this->request->getPost('id_partner'),
            'id_asset' => $this->request->getPost('id_asset'),
            'id_area' => $this->request->getPost('id_area'),
            'km' => $this->request->getPost('km'),
            'week' => $this->request->getPost('week'),
            'tgl_do' => $this->request->getPost('tgl_do'),
            'keterangan' => $this->request->getPost('keterangan'),
            'id_branch' => Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdSales->save($data);
        return redirect()->to(base_url('/akk/transaksi/ambil_barang'));
    }

    public function detail($id_sales)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Detail Product';
        $data['model'] = $this->mdSalesDetail
            ->join('sales', 'sales.id_sales=sales_detail.id_sales',)
            //->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->join('product', 'product.id_product=sales_detail.id_product')
            //->join('product', 'product.id_product=price_detail.id_product')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->where('sales_detail.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_sales_detail', 'DESC')
            ->findAll();
        // print_r($id_sales);
        // exit;
        $data['info'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->where('id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        return view('admin_kas_kecil/transaksi/ambil_barang/detail', $data);
    }

    public function detail_tambah($id_sales)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Detail Product';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->where('id_sales', $id_sales)
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->findAll();

        $data['product'] = $this->mdProduct
            ->where('id_branch', Session('userData')['id_branch'])
            //->join('price_detail', 'price_detail.id_product=product.id_product')
            //->join('sales_detail', 'sales_detail.id_price_detail=price_detail.id_price_detail')
            //->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->orderBy('nama_product', 'ASC')
            ->findAll();
        // print_r($data['product']);
        // exit;

        $data['id_sales'] = $this->mdSales
            ->where('id_sales', $id_sales)
            ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        $data['area'] = $this->mdArea
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['asset'] = $this->mdAsset
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/transaksi/ambil_barang/detail_tambah', $data);
    }

    public function tambah_nama_barang()
    {
        $id = $this->request->getVar('id');
        $data['product'] = $this->mdProduct
            // ->join('price_detail', 'price_detail.id_product=product.id_product')
            // ->join('sales_detail', 'sales_detail.id_price_detail=price_detail.id_price_detail')
            // ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            // ->where('price_detail.id_price_detail', $id)
            ->where('product.id_product', $id)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('product.id_product', 'ASC')
            ->find()[0];
        return $data['product']['nama_product'] . ';' . $data['product']['stock_product'];
    }
    public function input_detail_sales()
    {
        $id_sales = $this->request->getPost('id_sales');
        // $id_price_detail = $this->request->getPost('id_price_detail');
        $id_product = $this->request->getPost('id_product');
        $satuan_sales_detail = $this->request->getPost('satuan_sales_detail');
        $data = [
            'id_sales' => $id_sales,
            'id_product' => $id_product,
            'satuan_sales_detail' => $satuan_sales_detail,
            'jumlah_sales' => $satuan_sales_detail,
            // 'id_branch'=> Session('userData')['id_branch']
            // 'id_price_detail' => $id_price_detail,
        ];
        // print_r($data);
        // exit;
        $this->mdSalesDetail->insert($data);
        $this->mdProduct->where('id_product', $id_product)->decrement('stock_product', $satuan_sales_detail);
        return redirect()->to(base_url('/akk/transaksi/ambil_barang/detail/' . $id_sales));
    }
    public function edit_detail_sales($id_sales_detail)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Detail Product';
        $data['product'] = $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('price_detail', 'price_detail.id_product=product.id_product')
            ->join('sales_detail', 'sales_detail.id_price_detail=price_detail.id_price_detail')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->findAll();
        $data['model'] = $this->mdSalesDetail
            // ->where('id_branch', Session('userData')['id_branch'])
            ->where('sales_detail.id_sales_detail', $id_sales_detail)
            ->join('sales', 'sales.id_sales=sales_detail.id_sales',)
            // ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            //->join('product', 'product.id_product=price_detail.id_product')
            ->join('product', 'product.id_product=sales_detail.id_product')
            // ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->find()[0];
        return view('admin_kas_kecil/transaksi/ambil_barang/detail_edit', $data);
    }
    public function update_detail_sales()
    {
        $id_sales_detail = $this->request->getPost('id_sales_detail');
        $id_sales = $this->request->getPost('id_sales');
        $id_product = $this->request->getPost('id_product');
        $id_price_detail = $this->request->getPost('id_price_detail');
        $satuan_sales_detail = $this->request->getPost('satuan_sales_detail');
        $data = [
            'id_sales_detail' => $id_sales_detail,
            'id_sales' => $id_sales,
            'id_product' => $id_product,
            'satuan_sales_detail' => $satuan_sales_detail,
            //'id_price_detail' => $id_price_detail,
            // 'id_branch' => Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdSalesDetail->save($data);
        return redirect()->to(base_url('/akk/transaksi/ambil_barang/detail/' . $id_sales));
    }
    public function hapus_detail_sales($id_sales_detail, $id_sales, $satuan_sales_detail)
    {
        $product = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->where('id_sales_detail', $id_sales_detail)
            ->find();
        $id_product = $product[0]['id_product'];

        $this->mdProduct->where('id_product', $id_product)->increment('stock_product', $satuan_sales_detail);
        $delete = $this->mdSalesDetail->delete($id_sales_detail);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/ambil_barang/detail/' . $id_sales));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function print($id_sales)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Laporan Pengambilan Barang';
        $data['model1'] = $this->mdSales
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['model2'] = $this->mdNota
            ->join('nota_detail', 'nota_detail.id_nota=nota.id_nota')
            ->join('product', 'product.id_product=nota_detail.id_product')
            ->where('payment_method', 'CASH')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->where('id_sales', $id_sales)
            ->findAll();

        $data['info'] = $this->mdSales
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->find()[0];
        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin_kas_kecil/transaksi/ambil_barang/print', $data, []);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('arjun.pdf', 'I'); // opens in browser

        // return view('admin_kas_kecil/transaksi/sales/print', $data);
    }
}
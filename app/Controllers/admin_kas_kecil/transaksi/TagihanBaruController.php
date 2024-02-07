<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class TagihanBaruController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT TAGIHAN BARU';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/tagihan_baru/index', $data);
    }
    public function master_closing(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'RIWAYAT CLOSING PENJUALAN SALES';
        $data['model'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('area', 'area.id_area=nota.id_area')
            ->join('user', 'user.id_user=nota.created_by')
            ->findAll();
        return view('admin_kas_kecil/transaksi/tagihan_baru/master_closing', $data);
    }

    public function closing($id_sales): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'RIWAYAT CLOSING PENJUALAN SALES';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->where('id_sales', $id_sales)
            ->orderBy('id_sales', 'DESC')
            ->find()[0];
        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product',)
            ->where('id_sales', $id_sales)
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            ->findAll();
        // print_r($data['cek_nota']);
        // exit;
        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
        $data['customer'] = $this->mdCustomer->findAll();
        return view('admin_kas_kecil/transaksi/tagihan_baru/closing', $data);
    }

    public function detail_closing(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL TUTUP PENJUALAN BARANG';
        return view('admin_kas_kecil/transaksi/tagihan_baru/detail_closing', $data);
    }

    public function input_closing()
    {
        $id_sales = $this->request->getPost('id_sales');
        $id_partner = $this->request->getPost('id_partner');
        $id_customer = $this->request->getPost('id_customer');
        $id_area = $this->request->getPost('id_area');

        $data = [
            'id_sales' => $id_sales,
            'id_partner' => $id_partner,
            'id_customer' => $id_customer,
            'id_area' => $id_area,
            'id_bank' => 3,
            'no_nota' => $this->request->getPost('no_nota'),
            //'weeks' => $this->request->getPost('weeks'),
            'payment_method' => $this->request->getPost('payment_method'),
            'pay' => NULL,
            'created_by' => SESSION('userData')['id_user'],
            'tgl_bayar' =>  $this->request->getPost('tgl_bayar'),
        ];
        // print_r($data);
        // exit;
        $this->mdNota->insert($data);
        $id_nota = $this->mdNota->insertID();
        $data = array(
            'id_nota' => $id_nota,
        );

        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
    }
    public function closing_detail($id_nota): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL PENJUALAN SALES';
        $data['nota'] = $this->mdNota
            ->join('area', 'area.id_area=nota.id_area')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->where('id_nota', $id_nota)
            ->find()[0];
        $data['customer'] = $this->mdCustomer->findAll();
        $data['jenis_harga'] = $this->mdJenisHarga->findAll();
        $data['lastIdNotaDetail'] = $this->mdNotaDetail->getLastIdNotaDetail();
        $data['sales_detail'] = $this->mdSalesDetail
            // ->select('sales.createat as createat')
            // ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('nota', 'nota.id_sales=sales_detail.id_sales')
            ->where('id_nota', $id_nota)
            ->findAll();
        $data['model'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            // ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->where('nota_detail.id_nota', $id_nota)
            ->findAll();
        $data['detail'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->where('nota_detail.id_nota', $id_nota)
            ->find()[0];
        $id_sales = $data['nota']['id_sales'];
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('nota.id_sales', $id_sales)
            ->findAll();

        return view('admin_kas_kecil/transaksi/tagihan_baru/closing1', $data);
    }
    public function edit_detail_closing()
    {
        $id_sales_detail = $this->request->getPost('id_sales_detail');
        //$id_product = $this->request->getPost('id_product');
        $id_nota_detail =  $this->request->getPost('id_nota_detail');
        $id_nota =  $this->request->getPost('id_nota');
        $data = [
            'id_nota_detail' =>  $id_nota_detail,
            'id_sales_detail' => $id_sales_detail,
            'satuan_penjualan' => $this->request->getPost('satuan_penjualan'),
            'diskon_penjualan' => $this->request->getPost('diskon_penjualan'),
        ];
        $this->mdNotaDetail->save($data);

        $data['model'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->where('nota_detail.id_nota', $id_nota)
            ->findAll();
        $total = 0;
        foreach ($data['model'] as $key => $value) {
            $total += ($value['harga'] * $value['satuan_penjualan']) - $value['diskon_penjualan'];
        }
        $data['total'] = $total;
        $this->mdNota->where('id_nota', $id_nota)->decrement('total_beli', $total);

        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
    }
    public function input_detail_closing()
    {
        $id_sales_detail = $this->request->getPost('id_sales_detail');
        $id_product = $this->request->getPost('id_product');
        $id_nota =  $this->request->getPost('id_nota');
        $data = [
            'id_sales_detail' => $id_sales_detail,
            'id_nota' => $id_nota,
            //'id_sales_detail' => $id_sales_detail,
            'satuan_penjualan' => $this->request->getPost('satuan_penjualan'),
            'diskon_penjualan' => $this->request->getPost('diskon_penjualan'),
            //'pay' => 0,
            //'created_by' => SESSION('userData')['id_user'],
            //'tgl_bayar' =>  $this->request->getPost('tgl_bayar'),
        ];
        $this->mdNotaDetail->insert($data);


        //total
        $data['model'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->where('nota_detail.id_nota', $id_nota)
            ->findAll();

        $total = 0;
        foreach ($data['model'] as $key => $value) {
            $total += ($value['harga'] * $value['satuan_penjualan']) - $value['diskon_penjualan'];
        }
        $data['total'] = $total;
        //update nota

        $data2 = [
            'id_nota' => $id_nota,
            'total_beli' => $total,
        ];
        $this->mdNota->save($data2);

        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
    }
    public function hapus_detail($id_nota, $id_nota_detail, $harga)
    {
        $this->mdNota->where('id_nota', $id_nota)->decrement('total_beli', $harga);
        $delete = $this->mdNotaDetail->delete($id_nota_detail);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
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

        // $total = 0;
        // foreach ($data['model'] as $key => $value) {
        //     $total += $value['nominal_payment_detail'];
        // }
        // $data['total'] = $total;
        return view('admin_kas_kecil/transaksi/tagihan_baru/print_invoice', $data);
    }
}

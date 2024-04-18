<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class TagihanBaruController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT TAGIHAN BARU (NOTA)';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->where('sales.id_branch', Session('userData')['id_branch'])
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
            // ->where('id_branch', Session('userData')['id_branch'])
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
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_sales', 'DESC')
            ->find()[0];
        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product',)
            ->where('id_sales', $id_sales)
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            // ->where('customer.id_branch', Session('userData')['id_branch'])
            ->findAll();
        // print_r($data['cek_nota']);
        // exit;
        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
        $data['customer'] = $this->mdCustomer
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('customer.nama_customer', 'ASC')
            ->findAll();
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
        $payment_method = $this->request->getPost('payment_method');
        $status = "";
        if ($payment_method == "CASH") {
            $status = 'Lunas';
        }

        $data = [
            'id_sales' => $id_sales,
            'id_partner' => $id_partner,
            'id_customer' => $id_customer,
            'id_area' => $id_area,
            'id_bank' => 3,
            'no_nota' => $this->request->getPost('no_nota'),
            //'weeks' => $this->request->getPost('weeks'),
            'payment_method' => $payment_method,
            'pay' => NULL,
            'status' => $status,
            'id_branch' => Session('userData')['id_branch'],
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
            // ->where('id_branch', Session('userData')['id_branch'])
            ->where('id_nota', $id_nota)
            ->find()[0];
        $data['customer'] = $this->mdCustomer->findAll();
        $data['jenis_harga'] = $this->mdJenisHarga->findAll();
        $data['lastIdNotaDetail'] = $this->mdNotaDetail->getLastIdNotaDetail();
        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            //->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            //->join('product', 'product.id_product=price_detail.id_product')
            ->join('nota', 'nota.id_sales=sales_detail.id_sales')
            ->where('id_nota', $id_nota)
            ->where('jumlah_sales >', '0')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['model'] = $this->mdNotaDetail
            // ->select('sales.created_at as created_at')
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->join('product', 'product.id_product=nota_detail.id_product')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=nota_detail.id_jenis_harga')
            // ->join('barang_harga', 'barang_harga.id_product=product.id_product')
            ->where('nota_detail.id_nota', $id_nota)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->groupBy('id_nota_detail')
            ->findAll();

        $temp = [];
        foreach ($data['model'] as $key => $value) {
            $mdBarangHarga = $this->mdBarangHarga
                ->where('id_product', $value['id_product'])
                ->where('id_jenis_harga', $value['id_jenis_harga'])
                // ->where('id_branch', Session('userData')['id_branch'])
                ->find()[0];
            // echo $value['id_nota_detail'];
            // print_r($mdBarangHarga);
            $temp[$value['id_nota_detail']] = $mdBarangHarga;
        }
        // print_r($temp);
        $data['mdBarangHarga'] = $temp;
        // exit;
        $data['detail'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->where('nota_detail.id_nota', $id_nota)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find();

        if (count($data['detail']) > 0) {
            $data['detail'] = $data['detail'][0];
        } else {
            $data['detail'] = null;
        }
        $id_sales = $data['nota']['id_sales'];
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('nota.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
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
            // ->where('id_branch', Session('userData')['id_branch'])
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
        $id_jenis_harga = $this->request->getPost('id_jenis_harga');
        $satuan_penjualan = $this->request->getPost('satuan_penjualan');
        $mdSalesDetail = $this->mdSalesDetail
            ->where('id_sales_detail', $id_sales_detail)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find();
        $id_product = $mdSalesDetail[0]['id_product'];

        $id_nota =  $this->request->getPost('id_nota');
        $data = [
            'id_jenis_harga' => $id_jenis_harga,
            'id_nota' => $id_nota,
            'id_product' => $id_product,
            'id_jenis_harga' => $id_jenis_harga,
            'satuan_penjualan' => $satuan_penjualan,
            'diskon_penjualan' => $this->request->getPost('diskon_penjualan'),
        ];

        $mdBarangHarga = $this->mdBarangHarga
            ->where('id_product', $id_product)
            ->where('id_jenis_harga', $id_jenis_harga)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find();

        if (count($mdBarangHarga) > 0) {
            $this->mdNotaDetail->insert($data);
            $this->mdSalesDetail->where('id_sales_detail', $id_sales_detail)->decrement('jumlah_sales', $satuan_penjualan);
            // $this->mdProduct->where('id_product', $id_product)->decrement('stock_product', $satuan_penjualan);
        } else {
            return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
        }
        //total
        $data['model'] = $this->mdNotaDetail
            ->where('nota_detail.id_nota', $id_nota)
            ->findAll();

        $total = 0;
        foreach ($data['model'] as $key => $value) {

            $mdBarangHarga2 = $this->mdBarangHarga
                ->where('id_product', $value['id_product'])
                ->where('id_jenis_harga', $value['id_jenis_harga'])
                ->find()[0];

            $total += ($mdBarangHarga2['harga_aktif'] * $value['satuan_penjualan']) - $value['diskon_penjualan'];
        }
        $data['total'] = $total;

        // Nota
        $mdNota = $this->mdNota
            ->where('id_nota', $id_nota)
            ->find();

        if ($mdNota[0]['payment_method'] == 'CASH') {
            $this->mdNota->where('id_nota', $id_nota)->set(['total_beli' => $total, 'pay' => $total])->update();
        } else {
            $this->mdNota->where('id_nota', $id_nota)->set(['total_beli' => $total])->update();
        }

        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
    }
    public function hapus_detail($id_nota, $id_nota_detail, $harga)
    {
        $this->mdNota->where('id_nota', $id_nota)->decrement('total_beli', $harga);
        $delete = $this->mdNotaDetail->delete($id_nota_detail);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
        } else {
            echo 'Gagal Menghapus Data.';
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
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];

        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('nota', 'nota.id_sales=sales_detail.id_sales')
            ->where('id_nota', $id_nota)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['model'] = $this->mdNotaDetail
            ->join('sales_detail', 'sales_detail.id_sales_detail=nota_detail.id_sales_detail')
            ->join('product', 'product.id_product=sales_detail.id_product')
            ->join('price_detail', 'price_detail.id_product=product.id_product')
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->where('nota_detail.id_nota', $id_nota)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->groupBy('id_nota_detail')
            ->findAll();
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('nota.id_nota', $id_nota)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();

        // $total = 0;
        // foreach ($data['model'] as $key => $value) {
        //     $total += $value['nominal_payment_detail'];
        // }
        // $data['total'] = $total;
        return view('admin_kas_kecil/transaksi/tagihan_baru/print_invoice', $data);
    }

    public function closing_sales($id_sales): string
    {
        $data['judul'] = 'CLOSING SALES';
        $data['judul1'] = 'CLOSING SALES';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->find()[0];
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            // ->where('customer.id_branch', Session('userData')['id_branch'])
            ->findAll();

        $notaList = [];
        foreach ($data['cek_nota'] as $key => $value) {
            $notaList[$value['id_nota']] = $value['id_nota'];
        }

        $mdNotaDetail = $this->mdNotaDetail
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->join('product', 'product.id_product=nota_detail.id_product')
            ->join('barang_harga', 'barang_harga.id_product=nota_detail.id_product')
            ->whereIn('nota_detail.id_nota', $notaList)
            ->findAll();

        $temp = [];
        $temp['CASH'] = [];
        $temp['KREDIT'] = [];
        foreach ($mdNotaDetail as $key => $value) {
            $temp2 = [];
            $temp2['nama_product'] = $value['nama_product'];
            if (isset($temp[$value['payment_method']][$value['id_product']])) {
                $temp2['qty'] = $temp[$value['payment_method']][$value['id_product']]['qty'] + $value['satuan_penjualan'];
            } else {
                $temp2['qty'] = $value['satuan_penjualan'];
            }
            $temp2['harga_aktif'] = $value['harga_aktif'];
            $temp[$value['payment_method']][$value['id_product']] = $temp2;
        }
        $data['product_list'] = $temp;
        // print_r($temp);
        // exit;
        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
        return view('admin_kas_kecil/transaksi/tagihan_baru/closing_sales', $data);
    }

    public function closing_sales_save()
    {
        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
        $id_sales = $this->request->getPost('id_sales');
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->where('sales.id_sales', $id_sales)
            ->orderBy('sales.id_sales', 'DESC')
            ->find()[0];
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            ->findAll();

        $notaList = [];
        foreach ($data['cek_nota'] as $key => $value) {
            $notaList[$value['id_nota']] = $value['id_nota'];
            $kredit = 0;
            $cash = 0;
            if ($value['payment_method'] == 'CASH') {
                $cash = $value['total_beli'] - $value['pay'];
            } else {
                $kredit = $value['total_beli'] - $value['pay'];
            }
            $data = [
                'id_nota' => $value['id_nota'],
                'id_partner' => $value['id_partner'],
                'id_branch' => $value['id_branch'],
                'id_sales' => $value['id_sales'],
                'week' =>  $value['week'],
                'cash' => $cash,
                'kredit' => $kredit,
            ];
            $this->mdClosingSales->insert($data);
        }

        $mdNotaDetail = $this->mdNotaDetail
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->join('product', 'product.id_product=nota_detail.id_product')
            ->join('barang_harga', 'barang_harga.id_product=nota_detail.id_product')
            ->whereIn('nota_detail.id_nota', $notaList)
            ->findAll();

        $temp = [];
        $temp['CASH'] = [];
        $temp['KREDIT'] = [];
        foreach ($mdNotaDetail as $key => $value) {
            $temp2 = [];
            $temp2['nama_product'] = $value['nama_product'];
            if (isset($temp[$value['payment_method']][$value['id_product']])) {
                $temp2['qty'] = $temp[$value['payment_method']][$value['id_product']]['qty'] + $value['satuan_penjualan'];
            } else {
                $temp2['qty'] = $value['satuan_penjualan'];
            }
            $temp2['harga_aktif'] = $value['harga_aktif'];
            $temp[$value['payment_method']][$value['id_product']] = $temp2;
            /// total closing sales barang
            $total_qty = 0;
            $total = 0;
            foreach ($temp as $key => $value2) {
                $qty = $value2['qty'];
                $harga_aktif = $value2['harga_aktif'];
                $sub_total = $qty * $harga_aktif;
                $total_qty += $qty;
                $total += $sub_total;
            }
        }
        $data['product_list'] = $temp;
        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/closing-sales/' . $id_sales));
    }
}
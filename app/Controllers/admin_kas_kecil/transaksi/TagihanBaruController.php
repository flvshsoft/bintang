<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class TagihanBaruController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT TAGIHAN BARU (NOTA)';
        $data['model'] = $this->mdSales
            ->select('sales.id_sales, partner.nama_lengkap, area.nama_area, sales.week, sales.keterangan, sales.tgl_do, SUM(sales_detail.jumlah_sales) AS total_jumlah_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('sales_detail', 'sales_detail.id_sales=sales.id_sales', 'left')
            ->where('sales.id_branch', Session('userData')['id_branch'])
            //->where('deleted_at', NULL)
            ->orderBy('sales.id_sales', 'DESC')
            ->groupBy('sales.id_sales')
            ->having('total_jumlah_sales !=', 0)
            ->findAll();
        return view('admin_kas_kecil/transaksi/tagihan_baru/index', $data);
    }
    // Nota
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
    // Nota
    public function closing($id_sales, $payment_method): string
    {
        $data['judul'] = 'NOTA';
        $data['payment_method'] = $payment_method;
        $data['judul1'] = 'RIWAYAT CLOSING PENJUALAN SALES';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->find()[0];
        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product',)
            ->where('id_sales', $id_sales)
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_sales', 'DESC')
            ->findAll();

        if ($payment_method == "CASH") {
            $data['cek_nota'] = $this->mdNota
                ->select(['*', 'nota.created_at as created_at'])
                ->join('sales', 'sales.id_sales=nota.id_sales')
                ->join('partner', 'partner.id_partner=sales.id_partner')
                ->join('area', 'area.id_area=sales.id_area')
                ->join('customer', 'customer.id_customer=nota.id_customer')
                ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga')
                ->where('sales.id_sales', $id_sales)
                ->findAll();
        } else {
            $data['cek_nota'] = $this->mdNota
                ->select(['*', 'nota.created_at as created_at'])
                // ->where('payment_method', $payment_method)
                ->join('sales', 'sales.id_sales=nota.id_sales')
                ->join('partner', 'partner.id_partner=sales.id_partner')
                ->join('area', 'area.id_area=sales.id_area')
                ->join('customer', 'customer.id_customer=nota.id_customer')
                ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga')
                ->where('sales.id_sales', $id_sales)
                ->findAll();
        }

        // print_r($data['cek_nota']);
        // exit;
        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
        // cash 
        if ($payment_method == "CASH") {
            $data['customer'] = $this->mdCustomer
                ->where('id_branch', Session('userData')['id_branch'])
                ->where('payment_metode', $payment_method)
                ->orderBy('customer.nama_customer', 'ASC')
                ->findAll();
        } else {
            $data['customer'] = $this->mdCustomer
                ->where('id_branch', Session('userData')['id_branch'])
                ->where('payment_metode', $payment_method)
                ->where('data_lengkap', 1)
                ->orderBy('customer.nama_customer', 'ASC')
                ->findAll();
        }
        return view('admin_kas_kecil/transaksi/tagihan_baru/closing', $data);
    }

    public function detail_closing(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL TUTUP PENJUALAN BARANG';
        return view('admin_kas_kecil/transaksi/tagihan_baru/detail_closing', $data);
    }

    public function hapus($id_nota, $payment_method)
    {
        $nota = $this->mdSales
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->where('id_nota', $id_nota)->find();
        $id_sales = $nota[0]['id_sales'];


        $delete = $this->mdNota->delete($id_nota);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/' . $id_sales . '/' . $payment_method));
        } else {
            echo 'Gagal Menghapus Data.';
        }
    }

    public function input_closing()
    {
        $id_sales = $this->request->getPost('id_sales');
        $id_partner = $this->request->getPost('id_partner');
        $id_customer = $this->request->getPost('id_customer');
        $id_area = $this->request->getPost('id_area');
        $payment_method = $this->request->getPost('payment_method');

        $bank = $this->mdBank->where('id_branch', Session('userData')['id_branch'])->where('nama_bank', 'KAS')
            ->find();
        $id_bank = $bank[0]['id_bank'];

        $status = "";
        if ($payment_method == "CASH") {
            $status = 'Lunas';
        }

        $data = [
            'id_sales' => $id_sales,
            'id_partner' => $id_partner,
            'id_customer' => $id_customer,
            'id_area' => $id_area,
            'id_bank' => $id_bank,
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
    // Nota Detail
    public function closing_detail($id_nota)
    {
        $data['judul'] = 'Nota Detail';
        $data['judul1'] = 'DETAIL PENJUALAN SALES';
        $data['nota'] = $this->mdNota
            ->join('area', 'area.id_area=nota.id_area')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga', 'left')
            ->where('nota.id_branch', Session('userData')['id_branch'])
            ->where('id_nota', $id_nota)
            ->find();
        if (!empty($data['nota'])) {
            $id_sales = $data['nota'][0]['id_sales'];
            $payment_method = $data['nota'][0]['payment_method'];
            if (!empty($data['nota'][0]['id_jenis_harga'])) {
                $data['nota'] = $data['nota'][0];
            } else {
                session()->setFlashdata("tak_lengkap", "Silahkan Isi Data Barang Harga Dahulu");
                return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/' . $id_sales . '/' . $payment_method));
                exit;
            }
        }
        $nouta = $this->mdNota
            ->where('id_nota', $id_nota)
            ->find();
        $payment_method = $nouta[0]['payment_method'];

        if ($payment_method == "CASH") {
            $data['customer'] = $this->mdCustomer
                ->where('id_branch', Session('userData')['id_branch'])
                ->where('payment_metode', $payment_method)
                ->orderBy('customer.nama_customer', 'ASC')
                ->findAll();
        } else {
            $data['customer'] = $this->mdCustomer
                ->where('id_branch', Session('userData')['id_branch'])
                ->where('payment_metode', $payment_method)
                ->where('data_lengkap', 1)
                ->orderBy('customer.nama_customer', 'ASC')
                ->findAll();
        }

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
        if ($payment_method == "CASH") {
            $data['cek_nota'] = $this->mdNota
                ->select(['*', 'nota.created_at as created_at'])
                ->join('sales', 'sales.id_sales=nota.id_sales')
                ->join('partner', 'partner.id_partner=sales.id_partner')
                ->join('area', 'area.id_area=sales.id_area')
                ->join('customer', 'customer.id_customer=nota.id_customer')
                ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga')
                ->where('sales.id_sales', $id_sales)
                ->findAll();
        } else {
            $data['cek_nota'] = $this->mdNota
                ->select(['*', 'nota.created_at as created_at'])
                // ->where('payment_method', $payment_method)
                ->join('sales', 'sales.id_sales=nota.id_sales')
                ->join('partner', 'partner.id_partner=sales.id_partner')
                ->join('area', 'area.id_area=sales.id_area')
                ->join('customer', 'customer.id_customer=nota.id_customer')
                ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga')
                ->where('sales.id_sales', $id_sales)
                ->findAll();
        }
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
        $payment_method = $this->request->getPost('payment_method');
        $satuan_penjualan = str_replace('.', '', $this->request->getPost('satuan_penjualan'));
        $satuan_penjualan = (int) str_replace(',', '', $satuan_penjualan);
        $id_nota =  $this->request->getPost('id_nota');

        $mdNota = $this->mdNota
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('nota.id_nota', $id_nota)
            ->find();
        $id_jenis_harga = $mdNota[0]['id_jenis_harga'];

        $mdSalesDetail = $this->mdSalesDetail
            ->where('id_sales_detail', $id_sales_detail)
            ->find();
        $id_product = $mdSalesDetail[0]['id_product'];
        $jumlah_sales = $mdSalesDetail[0]['jumlah_sales'];

        $mdBarangHarga = $this->mdBarangHarga
            ->where('id_product', $id_product)
            ->where('id_jenis_harga', $id_jenis_harga)
            ->find();

        if ($satuan_penjualan < $jumlah_sales) {
            if (count($mdBarangHarga) > 0) {
                $harga_nota = $mdBarangHarga[0]['harga_aktif'];
                $data = [
                    'id_jenis_harga' => $id_jenis_harga,
                    'id_nota' => $id_nota,
                    'id_product' => $id_product,
                    'id_jenis_harga' => $id_jenis_harga,
                    'harga_nota' => $harga_nota,
                    'satuan_penjualan' => $satuan_penjualan,
                    'diskon_penjualan' => $this->request->getPost('diskon_penjualan'),
                ];
                $this->mdNotaDetail->insert($data);
                $this->mdSalesDetail->where('id_sales_detail', $id_sales_detail)->decrement('jumlah_sales', $satuan_penjualan);
                // $this->mdProduct->where('id_product', $id_product)->decrement('stock_product', $satuan_penjualan);
            } else {
                return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
            }
        } else if ($satuan_penjualan > $jumlah_sales) {
            session()->setFlashData('lebih', 'Input Jumlah Dibawah ' . $jumlah_sales);
            return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota . '/' . 'lebih'));
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
        $id_sales = $mdNota[0]['id_sales'];
        $metode_bayar = $mdNota[0]['payment_method'];
        $id_customer = $mdNota[0]['id_customer'];

        $bank = $this->mdBank
            ->where('nama_bank', 'KAS')
            ->where('id_branch', Session('userData')['id_branch'])
            ->find();
        $id_bank = $bank[0]['id_bank'];


        if ($mdNota[0]['payment_method'] == 'CASH') {
            $this->mdNota->where('id_nota', $id_nota)->set(['total_beli' => $total, 'pay' => $total])->update();
            $data = [
                'id_sales' => $id_sales,
                'id_konsumen' => $id_customer,
                'id_bank' => $id_bank,
                'ket' => 'Cicilan Sudah Lunas Semua',
                'metode_bayar' => $metode_bayar,
                'id_user' => Session('userData')['id_user'],
                'id_branch' => Session('userData')['id_branch'],
                'uang_kas' => $total,
            ];

            $this->mdKas->save($data);
            $this->mdBank->where('id_bank', $id_bank)->increment('saldo', $total);
        } else {
            $this->mdNota->where('id_nota', $id_nota)->set(['total_beli' => $total])->update();
        }


        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $id_nota));
    }
    public function hapus_detail($id_nota, $id_nota_detail, $harga, $satuan_penjualan, $id_sales, $id_product, $payment_method)
    {
        $model = $this->mdSalesDetail
            ->where('id_sales', $id_sales)
            ->where('id_product', $id_product)
            ->find();
        $id_sales_detail = $model[0]['id_sales_detail'];
        // print_r($model);
        // exit;
        $this->mdSalesDetail->where('id_sales_detail', $id_sales_detail)->increment('jumlah_sales', $satuan_penjualan);

        if ($payment_method == "KREDIT") {
            $this->mdNota->where('id_nota', $id_nota)->decrement('total_beli', $harga);
        } else {
            $this->mdNota->where('id_nota', $id_nota)->decrement('pay', $harga);
            $this->mdNota->where('id_nota', $id_nota)->decrement('total_beli', $harga);
            // $this->mdNota->where('id_nota', $id_nota)->save('status', NULL);
        }

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

    public function closing_sales($id_sales)
    {
        $data['judul'] = 'CLOSING SALES';
        $data['judul1'] = 'CLOSING SALES';
        // data sales
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->find();
        $metode_bayar = $data['model'][0]['payment_method'];
        // print_r($metode_bayar);
        // exit;

        if (!empty($data['model'])) {
            if (!empty($data['model'][0]['id_nota'])) {
                $data['model'] = $data['model'][0];
            } else {
                session()->setFlashdata("tak_lengkap", "Data Kosong");
                return redirect()->to(base_url('/akk/transaksi/tagihan_baru'));
                exit;
            }
        }

        // tabel 1
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            ->where('sales.week', $data['model']['week'])
            //  ->where('total_beli !=', 0)
            // ->where('total_beli !=', '0')
            ->findAll();
        // print_r($data['cek_nota']);
        // exit;

        $notaList = [];
        foreach ($data['cek_nota'] as $key => $value) {
            $notaList[$value['id_nota']] = $value['id_nota'];
            $week = $value['week'];
        }
        // print_r($notaList);

        // nota detail
        $mdNotaDetail = $this->mdNotaDetail
            ->select(['nota_detail.id_nota', 'nota_detail.id_nota_detail', 'nota_detail.id_product', 'nama_product', 'payment_method', 'satuan_penjualan', 'harga_nota'])
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('product', 'product.id_product=nota_detail.id_product')
            // ->join('barang_harga', 'barang_harga.id_product=nota_detail.id_product')
            ->whereIn('nota_detail.id_nota', $notaList)
            ->where('sales.week', $data['model']['week'])
            //->groupBy('id_nota_detail')
            ->findAll();
        // print_r($mdNotaDetail[0]);
        // exit;
        // print_r([count($mdNotaDetail)]);
        // exit;

        $temp = [];
        $temp['CASH'] = [];
        $temp['KREDIT'] = [];
        foreach ($mdNotaDetail as $key => $value) {
            // print_r($value);
            $temp2 = [];
            $temp2['nama_product'] = $value['nama_product'];
            if (isset($temp[$value['payment_method']][$value['id_product']])) {
                $temp2['qty'] = $temp[$value['payment_method']][$value['id_product']]['qty'] + $value['satuan_penjualan'];
                //$temp2['qty'] = $temp[$value['payment_method']][$value['id_product']]['qty'] + $value['satuan_penjualan'];
            } else {
                $temp2['qty'] = $value['satuan_penjualan'];
            }
            $temp2['harga_aktif'] = $value['harga_nota'];
            // print_r($temp2);
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
        $id_sales = $this->request->getPost('id_sales');
        $hapus1 = $this->mdClosingSales
            ->where('id_sales', $id_sales)
            ->delete();
        $hapus2 = $this->mdClosingSalesBarang
            ->where('id_sales', $id_sales)
            ->delete();
        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
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
        $week = 0;
        foreach ($data['cek_nota'] as $key => $value) {
            $notaList[$value['id_nota']] = $value['id_nota'];
            $kredit = 0;
            $cash = 0;
            if ($value['payment_method'] == 'CASH') {
                $cash = $value['total_beli'] - $value['pay'];
            } else {
                $kredit = $value['total_beli'] - $value['pay'];
            }

            $week = $value['week'];
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
            $temp2['id_nota'] = $value['id_nota'];
            $temp2['id_sales'] = $value['id_sales'];
            $temp2['id_branch'] = $value['id_branch'];
            $temp2['id_partner'] = $value['id_partner'];
            $temp2['id_product'] = $value['id_product'];
            $temp2['week'] = $week;
            $temp2['payment_method'] = $value['payment_method'];
            $temp2['nama_product'] = $value['nama_product'];
            if (isset($temp[$value['payment_method']][$value['id_product']])) {
                $temp2['qty'] = $temp[$value['payment_method']][$value['id_product']]['qty'] + $value['satuan_penjualan'];
            } else {
                $temp2['qty'] = $value['satuan_penjualan'];
            }
            $temp2['harga_aktif'] = $value['harga_aktif'];
            $temp[$value['payment_method']][$value['id_product']] = $temp2;
        }


        // print_r($temp['CASH']);
        // exit;
        foreach ($temp as $key0 => $value0) {
            foreach ($temp[$key0] as $key => $value) {
                $qty = $value['qty'];
                $harga_aktif = $value['harga_aktif'];
                $sub_total = $qty * $harga_aktif;
                $data = [
                    'id_nota' => $value['id_nota'],
                    'id_partner' => $value['id_partner'],
                    'id_product' => $value['id_product'],
                    'id_branch' => $value['id_branch'],
                    'id_sales' => $value['id_sales'],
                    'week' =>  $value['week'],
                    'payment_method' =>  $value['payment_method'],
                    'qty' => $qty,
                    'harga' => $harga_aktif,
                ];
                // print_r($data);
                $this->mdClosingSalesBarang->save($data);
            }
        }

        $data['product_list'] = $temp;
        return redirect()->to(base_url('/akk/transaksi/tagihan_baru/closing-sales/' . $id_sales));
    }

    public function riwayat(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT TAGIHAN BARU (NOTA)';
        $data['model'] = $this->mdSales
            // ->select(['*', 'sales.created_at as created_at'])
            ->select('sales.id_sales, partner.nama_lengkap, area.nama_area, sales.week, sales.keterangan, sales.tgl_do, SUM(sales_detail.jumlah_sales) AS total_jumlah_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('sales_detail', 'sales_detail.id_sales=sales.id_sales', 'left')
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->groupBy('sales.id_sales')
            //->having('total_jumlah_sales !=', 0)
            ->findAll();
        return view('admin_kas_kecil/transaksi/tagihan_baru/riwayat', $data);
    }

    public function riwayat_detail($id_sales)
    {
        $data['judul'] = 'CLOSING SALES';
        $data['judul1'] = 'CLOSING SALES';
        // data sales
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->find();

        if (!empty($data['model'])) {
            if (!empty($data['model'][0]['id_nota'])) {
                $data['model'] = $data['model'][0];
            } else {
                session()->setFlashdata("tak_lengkap", "Data Kosong");
                return redirect()->to(base_url('/akk/transaksi/tagihan_baru/riwayat'));
                exit;
            }
        }

        // tabel 1
        $data['cek_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->where('sales.id_sales', $id_sales)
            // ->where('sales.week', $data['model']['week'])
            // ->where('customer.id_branch', Session('userData')['id_branch'])
            ->findAll();
        // print_r($data['model']);
        // exit;

        $notaList = [];
        foreach ($data['cek_nota'] as $key => $value) {
            $notaList[$value['id_nota']] = $value['id_nota'];
            $week = $value['week'];
        }
        // print_r($notaList);
        // exit;
        // nota detail

        $mdNotaDetail = $this->mdNotaDetail
            ->select(['nota_detail.id_nota', 'nota_detail.id_nota_detail', 'nota_detail.id_product', 'nama_product', 'payment_method', 'satuan_penjualan', 'harga_nota'])
            ->join('nota', 'nota.id_nota=nota_detail.id_nota')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('product', 'product.id_product=nota_detail.id_product')
            ->whereIn('nota_detail.id_nota', $notaList)
            // ->where('sales.week', $data['model']['week'])
            //->groupBy('id_nota_detail')
            ->findAll();

        // print_r([count($mdNotaDetail)]);
        // exit;

        $temp = [];
        $temp['CASH'] = [];
        $temp['KREDIT'] = [];
        foreach ($mdNotaDetail as $key => $value) {
            // print_r($value);
            $temp2 = [];
            $temp2['nama_product'] = $value['nama_product'];
            if (isset($temp[$value['payment_method']][$value['id_product']])) {
                $temp2['qty'] = $temp[$value['payment_method']][$value['id_product']]['qty'] + $value['satuan_penjualan'];
            } else {
                $temp2['qty'] = $value['satuan_penjualan'];
            }
            $temp2['harga_aktif'] = $value['harga_nota'];
            // print_r($temp2);
            $temp[$value['payment_method']][$value['id_product']] = $temp2;
        }
        $data['product_list'] = $temp;

        $data['lastIdNota'] = $this->mdNota->getLastIdNota();
        return view('admin_kas_kecil/transaksi/tagihan_baru/riwayat_detail', $data);
    }
}

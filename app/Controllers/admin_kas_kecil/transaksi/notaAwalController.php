<?php

namespace App\Controllers\admin_kas_kecil\transaksi;

class notaAwalController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] =  'Drop Out Barang ';
        $data['model'] = $this->mdSales
            ->select(['*', 'sales.created_at as created_at'])
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->join('partner', 'partner.id_partner=sales.id_partner',)
            ->join('area', 'area.id_area=sales.id_area')
            ->join('asset', 'asset.id_asset=sales.id_asset')
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        return view('admin_kas_kecil/transaksi/nota_awal/index', $data);
    }

    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] =  'Tambah DO';
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
        return view('admin_kas_kecil/transaksi/nota_awal/tambah', $data);
    }
    public function tambah_save()
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
        return redirect()->to(base_url('/akk/transaksi/nota_awal/detail/' . $id_sales . '/' . 'CASH'));
    }

    public function hapus($id_sales)
    {
        $delete = $this->mdSales->delete($id_sales);
        if ($delete) {
            return redirect()->to(base_url('/akk/transaksi/nota_awal'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function detail($id_sales, $payment_method)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Detail Product';
        $data['payment_method'] = $payment_method;

        $data['model'] = $this->mdSales
            ->select('*, sales.created_at as created_at')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->where('id_sales', $id_sales)
            ->orderBy('id_sales', 'DESC')
            ->findAll();

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

        $data['sales_detail'] = $this->mdSalesDetail
            ->join('product', 'product.id_product=sales_detail.id_product',)
            ->where('id_sales', $id_sales)
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_sales', 'DESC')
            ->findAll();
        $data['cek_nota'] = $this->mdNota
            ->select(['*', 'nota.created_at as created_at'])
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga')
            ->where('sales.id_sales', $id_sales)
            ->findAll();

        $data['info'] = $this->mdSales
            ->where('id_sales', $id_sales)
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        return view('admin_kas_kecil/transaksi/nota_awal/detail', $data);
    }

    public function detail_input()
    {
        $id_sales = $this->request->getPost('id_sales');
        $id_partner = $this->request->getPost('id_partner');
        $id_customer = $this->request->getPost('id_customer');
        $id_area = $this->request->getPost('id_area');
        $payment_method = $this->request->getPost('payment_method');
        $total_beli = str_replace('.', '', $this->request->getPost('total_beli'));
        $total_beli = (int) str_replace(',', '', $total_beli);

        $status = "";
        if ($payment_method == "CASH") {
            $status = 'Lunas';
        }

        $bayar = "";
        if ($payment_method == "CASH") {
            $bayar = $total_beli;
        }

        $bank = $this->mdBank->where('id_branch', Session('userData')['id_branch'])->where('nama_bank', 'KAS')
            ->find();
        $id_bank = $bank[0]['id_bank'];

        $data = [
            'id_sales' => $id_sales,
            'id_partner' => $id_partner,
            'id_customer' => $id_customer,
            'id_area' => $id_area,
            'id_bank' => $id_bank,
            'no_nota' => $this->request->getPost('no_nota'),
            //'weeks' => $this->request->getPost('weeks'),
            'payment_method' => $payment_method,
            'pay' => $bayar,
            'total_beli' => $total_beli,
            'status' => $status,
            'id_branch' => Session('userData')['id_branch'],
            'created_by' => SESSION('userData')['id_user'],
            'tgl_bayar' =>  $this->request->getPost('tgl_bayar'),
        ];
        // print_r($data);
        // exit;
        $this->mdNota->insert($data);
        // $id_nota = $this->mdNota->insertID();
        // $data = array(
        //     'id_nota' => $id_nota,
        // );

        return redirect()->to(base_url('/akk/transaksi/nota_awal/detail/' . $id_sales . '/' . $payment_method));
    }
}
<?php

namespace App\Controllers\admin_kas_kecil\piutang;

class pembayaranController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT PIUTANG USAHA';
        $data['model'] = $this->mdSales
            //->select('sales.created_at as createt_at')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('area', 'area.id_area=nota.id_area')
            ->where('status !=', 'Lunas')
            ->where('nota.id_branch', Session('userData')['id_branch'])
            ->findAll();

        return view('admin_kas_kecil/piutang_usaha/pembayaran/index', $data);
    }

    public function detail_input_pembayaran($id_sales): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT PELUNASAN HUTANG TUNAI';
        $data['info'] = $this->mdSalesDetail
            ->join('sales', 'sales.id_sales=sales_detail.id_sales')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('area', 'area.id_area=nota.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('sales_detail', 'sales_detail.id_sales=sales.id_sales')
            ->join('nota_detail', 'nota_detail.id_nota=nota.id_nota')
            ->groupBy('nota.id_nota')
            ->where('status !=', 'Lunas')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->where('sales.id_sales', $id_sales)
            ->findAll();

        return view('admin_kas_kecil/piutang_usaha/pembayaran/tambah', $data);
    }
    public function add()
    {
        $id_sales = $this->request->getPost('id_sales');
        $id_nota =  $this->request->getPost('id_nota');
        $pay =  $this->request->getPost('pay');
        $test = $this->mdNota->where('id_nota', $id_nota)->find();
        $bayar = $test[0]['pay'] + $pay;
        $total_beli = $test[0]['total_beli'];

        if ($bayar > $total_beli) {
            return redirect()->to(base_url('/akk/piutang_usaha/input_pembayaran/detail/' . $id_sales . '#lebih'));
        } else {
            if ($bayar == $total_beli) {
                $this->mdNota->update($id_nota, ['pay' => $bayar,  'status' => 'Lunas']);
                return redirect()->to(base_url('/akk/piutang_usaha'));
            } else {
                $this->mdNota->update($id_nota, ['pay' => $bayar]);
            }
        }

        return redirect()->to(base_url('/akk/piutang_usaha/input_pembayaran/detail/' . $id_sales));
    }
}

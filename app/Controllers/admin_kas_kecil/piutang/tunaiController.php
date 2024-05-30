<?php

namespace App\Controllers\admin_kas_kecil\piutang;

class tunaiController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT PIUTANG USAHA';
        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('area', 'area.id_area=nota.id_area')
            // ->where('payment_method', 'CASH')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/piutang_usaha/lunas/index', $data);
    }

    public function detail_input_piutang($id_sales): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT PELUNASAN HUTANG TUNAI';
        $data['info'] = $this->mdSalesDetail
            ->join('sales', 'sales.id_sales=sales_detail.id_sales')
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
            ->join('nota_detail', 'nota_detail.id_nota=nota.id_nota', 'left')
            ->join('price_detail', 'price_detail.id_price_detail=sales_detail.id_price_detail')
            ->join('product', 'product.id_product=price_detail.id_product')
            ->groupBy('nota.id_nota')
            ->where('sales.id_sales', $id_sales)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/piutang_usaha/lunas/tambah', $data);
    }
    public function add()
    {
        $id_nota =  $this->request->getPost('id_nota');
        $notaData = $this->mdNota->where('id_nota', $id_nota)->find();
        $id_customer = $notaData[0]['id_customer'];

        $id_sales = $this->request->getPost('id_sales');

        $bank = $this->mdBank
            ->where('nama_bank', 'KAS')
            ->where('id_branch', Session('userData')['id_branch'])
            ->find();
        $id_bank = $bank[0]['id_bank'];
        $nota = $this->mdNota
            ->where('id_branch', Session('userData')['id_branch'])
            ->where('id_sales', $id_sales)
            ->where('id_customer', $id_customer)
            ->find();
        $metode_bayar = $nota[0]['payment_method'];

        if ($notaData) {
            $totalBeli = $notaData[0]['total_beli'] - $notaData[0]['pay'];
            $totalBeliKredit = $notaData[0]['total_beli'];

            $this->mdNota->update($id_nota, ['pay' => $totalBeliKredit,  'status' => 'Lunas']);
            $data = [
                'id_sales' => $id_sales,
                'id_konsumen' => $id_customer,
                'id_bank' => $id_bank,
                'ket' => 'Cicilan Lunas',
                'metode_bayar' => $metode_bayar,
                'id_user' => Session('userData')['id_user'],
                'id_branch' => Session('userData')['id_branch'],
                'uang_kas' => $totalBeli,
            ];
            $this->mdKas->save($data);
            $this->mdBank->where('id_bank', $id_bank)->increment('saldo', $totalBeli);
        }
        return redirect()->to(base_url('/akk/piutang_usaha'));
    }
}

<?php

namespace App\Controllers\admin_kas_kecil\piutang;

class pembayaranController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT PIUTANG USAHA';
        $data['model'] = $this->mdSales
            //->select('sales.created_at as created_at')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('area', 'area.id_area=nota.id_area')
            ->where('status !=', 'Lunas')
            ->where('nota.id_branch', Session('userData')['id_branch'])
            ->orderBy('sales.id_sales', 'DESC')
            ->findAll();

        return view('admin_kas_kecil/piutang_usaha/pembayaran/index', $data);
    }

    public function detail_input_pembayaran($id_sales): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INPUT PELUNASAN HUTANG TUNAI';
        $data['info'] = $this->mdSales
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->where('sales.id_sales', $id_sales)
            ->where('sales.id_branch', Session('userData')['id_branch'])
            ->find()[0];
        // $id_nota = $data['info']['id_nota'];
        // print_r($id_nota);
        // exit;

        $data['model'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('area', 'area.id_area=nota.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->groupBy('nota.id_nota')
            ->where('status !=', 'Lunas')
            ->where('sales.id_branch', Session('userData')['id_branch'])
            // ->where('sales.id_sales', $id_sales)
            ->orderBy('nota.id_nota', 'DESC')
            ->findAll();

        return view('admin_kas_kecil/piutang_usaha/pembayaran/tambah', $data);
    }
    public function add()
    {
        $id_sales = $this->request->getPost('id_sales');
        $id_nota =  $this->request->getPost('id_nota');
        $pay =  str_replace('.', '', $this->request->getPost('pay'));
        $pay = (int) str_replace(',', '', $pay);
        $test = $this->mdNota->where('id_nota', $id_nota)->find();
        $bayar = $test[0]['pay'] + $pay;
        $total_beli = $test[0]['total_beli'];
        $id_customer = $test[0]['id_customer'];

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

        if ($bayar > $total_beli) {
            return redirect()->to(base_url('/akk/piutang_usaha/input_pembayaran/detail/' . $id_sales . '#lebih'));
        } else {
            if ($bayar == $total_beli) {
                $this->mdNota->update($id_nota, ['pay' => $bayar,  'status' => 'Lunas']);
                // $adaSalesKonsumen = $this->mdKas->where('id_sales', $id_sales)
                //     ->where('id_konsumen', $id_customer)
                //     ->first();

                // if ($adaSalesKonsumen) {
                //     // Jika entri sudah ada, tambahkan nilai pay ke nilai uang_kas
                //     $adaSalesKonsumen['uang_kas'] += $pay;
                //     // Simpan perubahan
                //     $this->mdKas->save($adaSalesKonsumen);
                // } else {
                $data = [
                    'id_sales' => $id_sales,
                    'id_konsumen' => $id_customer,
                    'id_bank' => $id_bank,
                    'ket' => 'Cicilan Lunas',
                    'metode_bayar' => $metode_bayar,
                    'id_user' => Session('userData')['id_user'],
                    'id_branch' => Session('userData')['id_branch'],
                    'uang_kas' => $pay,
                ];
                $this->mdKas->save($data);
                //}
                $this->mdBank->where('id_bank', $id_bank)->increment('saldo', $pay);
                return redirect()->to(base_url('/akk/piutang_usaha'));
            } else {
                $this->mdNota->update($id_nota, ['pay' => $bayar]);
                $adaSalesKonsumen = $this->mdKas->where('id_sales', $id_sales)
                    ->where('id_konsumen', $id_customer)
                    ->first();

                // if ($adaSalesKonsumen) {
                //     // Jika entri sudah ada, tambahkan nilai pay ke nilai uang_kas
                //     $adaSalesKonsumen['uang_kas'] += $pay;
                //     // Simpan perubahan
                //     $this->mdKas->save($adaSalesKonsumen);
                // } else {
                $data = [
                    'id_sales' => $id_sales,
                    'id_konsumen' => $id_customer,
                    'id_bank' => $id_bank,
                    'metode_bayar' => $metode_bayar,
                    'ket' => 'Pelunasan Cicilan',
                    'id_user' => Session('userData')['id_user'],
                    'id_branch' => Session('userData')['id_branch'],
                    'uang_kas' => $pay,
                ];
                $this->mdKas->save($data);
                //}
                $this->mdBank->where('id_bank', $id_bank)->increment('saldo', $pay);
            }
        }
        return redirect()->to(base_url('/akk/piutang_usaha/input_pembayaran/detail/' . $id_sales));
    }
}

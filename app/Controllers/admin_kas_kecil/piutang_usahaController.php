<?php

namespace App\Controllers\admin_kas_kecil;

class piutang_usahaController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'RIWAYAT DATA PELUNASAN PIUTANG';
        $data['model'] = $this->mdNota
            ->where('status', 'Lunas')
            ->where('nota.id_branch', Session('userData')['id_branch'])
            ->where('payment_method', 'KREDIT')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('user', 'user.id_user=nota.created_by')
            ->join('nota_detail', 'nota_detail.id_nota=nota.id_nota')
            ->groupBy('nota.id_nota')
            ->findAll();

        // print_r($data['model']);
        // exit;
        return view('admin_kas_kecil/piutang_usaha/index', $data);
    }

    public function hapus($id_nota)
    {
        $data = [
            'id_nota' =>  $id_nota,
            'status' => null,
            'pay' => null,
        ];
        $this->mdNota->save($data);
        return redirect()->to(base_url('/akk/piutang_usaha'));
    }

    public function repayment_detail(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL';
        return view('admin_kas_kecil/piutang_usaha/baca', $data);
    }

    public function form_piutang(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM PIUTANG INTERNAL        ';
        return view('admin_kas_kecil/piutang_usaha/tambah', $data);
    }
}

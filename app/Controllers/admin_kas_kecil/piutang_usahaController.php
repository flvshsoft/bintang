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
        $data['judul1'] = 'FORM PIUTANG KARYAWAN';
        return view('admin_kas_kecil/piutang_usaha/tambah', $data);
    }
    public function form_piutang_save()
    {
        $data = [
            'nama_penghutang' => $this->request->getPost('nama_penghutang'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'type_piutang' => 'Karyawan',
            'status' => 0,
            'jumlah_piutang' => $this->request->getPost('jumlah_piutang'),
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
        ];
        $this->mdPiutangUsaha->save($data);
        return redirect()->to(base_url('/akk/piutang_usaha'));
    }
    public function tambah_piutang_internal(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM PIUTANG INTERNAL';
        $data['cabang'] = $this->mdBranch->findAll();
        return view('admin_kas_kecil/piutang_usaha/tambah_internal', $data);
    }
    public function tambah_piutang_internal_save()
    {
        $data = [
            'id_cabang' => $this->request->getPost('id_cabang'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'type_piutang' => 'Internal',
            'status' => 0,
            'jumlah_piutang' => $this->request->getPost('jumlah_piutang'),
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
        ];
        // $this->mdPiutangUsaha->save($data);
        return redirect()->to(base_url('/akk/piutang_usaha'));
    }
}

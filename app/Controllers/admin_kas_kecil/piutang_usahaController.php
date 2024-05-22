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
    public function index_internal(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INTERNAL';
        $data['model'] = $this->mdPiutangUsaha
            ->select(['*', 'piutang_usaha.created_at as created_at'])
            ->join('branch', 'branch.id_branch=piutang_usaha.id_cabang')
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('jumlah_piutang !=', 0)
            ->where('type_piutang', 'Internal')
            ->findAll();
        $data['bank'] = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/piutang_usaha/index_internal', $data);
    }
    public function index_karyawan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'KARYAWAN';
        $data['model'] = $this->mdPiutangUsaha
            ->select(['*', 'piutang_usaha.created_at as created_at'])
            ->join('user', 'user.id_user=piutang_usaha.id_user')
            ->where('piutang_usaha.id_branch', Session('userData')['id_branch'])
            ->where('jumlah_piutang !=', 0)
            ->where('type_piutang', 'Karyawan')
            ->findAll();
        $data['bank'] = $this->mdBank
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/piutang_usaha/index_karyawan', $data);
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
        $jumlah_piutang_karyawan = str_replace('.', '', $this->request->getPost('jumlah_piutang_karyawan'));
        $jumlah_piutang_karyawan = (int) str_replace(',', '', $jumlah_piutang_karyawan);
        $data = [
            'nama_penghutang' => $this->request->getPost('nama_penghutang'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'type_piutang' => 'Karyawan',
            'status' => 0,
            'jumlah_piutang' => $jumlah_piutang_karyawan,
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
        ];
        $existingRecord = $this->mdPiutangUsaha->where('nama_penghutang', $data['nama_penghutang'])->first();

        if ($existingRecord) {
            $new_jumlah_piutang = $existingRecord['jumlah_piutang'] + $jumlah_piutang_karyawan;

            // Update entri yang ada dengan jumlah piutang baru
            $this->mdPiutangUsaha->update($existingRecord['id_piutang_usaha'], [
                'jumlah_piutang' => $new_jumlah_piutang,
                'created_at' => $this->request->getPost('tgl_piutang')
            ]);
        } else {
            // Jika tidak ada, simpan entri baru
            $this->mdPiutangUsaha->save($data);
        }
        return redirect()->to(base_url('/akk/piutang_usaha/karyawan'));
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
        $jumlah_piutang_internal = str_replace('.', '', $this->request->getPost('jumlah_piutang_internal'));
        $jumlah_piutang_internal = (int) str_replace(',', '', $jumlah_piutang_internal);
        $data = [
            'id_cabang' => $this->request->getPost('id_cabang'),
            'tgl_piutang' => $this->request->getPost('tgl_piutang'),
            'type_piutang' => 'Internal',
            'status' => 0,
            'jumlah_piutang' => $jumlah_piutang_internal,
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
        ];
        $existingRecord = $this->mdPiutangUsaha->where('id_cabang', $data['id_cabang'])->first();

        if ($existingRecord) {
            // Jika ada, tambahkan 'jumlah_piutang_internal' ke jumlah piutang yang ada
            $new_jumlah_piutang = $existingRecord['jumlah_piutang'] + $jumlah_piutang_internal;

            // Update entri yang ada dengan jumlah piutang baru
            $this->mdPiutangUsaha->update($existingRecord['id_piutang_usaha'], [
                'jumlah_piutang' => $new_jumlah_piutang,
                'created_at' => $this->request->getPost('tgl_piutang')
            ]);
        } else {
            // Jika tidak ada, simpan entri baru
            $this->mdPiutangUsaha->save($data);
        }
        return redirect()->to(base_url('/akk/piutang_usaha/internal'));
    }
}

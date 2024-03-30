<?php

namespace App\Controllers\admin_kas_kecil\master;

class jenishargaController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Jenis Harga';
        $data['model'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('user', 'user.id_user=jenis_harga.created_by', 'left')
            ->findAll();
        return view('admin_kas_kecil/master/jenis_harga/index', $data);
    }

    public function input()
    {
        $data = [
            //'id_branch', Session('userData')['id_branch'],
            'created_by' => SESSION('userData')['id_user'],
            'remark_jenis_harga' => $this->request->getPost('remark_jenis_harga'),
        ];
        // print_r($data);
        // exit;
        $this->mdJenisHarga->insert($data);
        return redirect()->to(base_url('/akk/master_jenis_harga'));
    }

    public function hapus($id_jenis_harga)
    {
        $delete = $this->mdJenisHarga->delete($id_jenis_harga);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_jenis_harga'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

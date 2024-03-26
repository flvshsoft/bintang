<?php

namespace App\Controllers\admin_kas_kecil\master;

class lokasiController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Lokasi Absensi';
        $data['model'] = $this->mdLokasi
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('user', 'user.id_user=lokasi.created_by', 'left')->findAll();
        return view('admin_kas_kecil/master/lokasi/index', $data);
    }

    public function input()
    {
        $data = [
            //'id_branch', Session('userData')['id_branch'],
            'maps' => $this->request->getPost('maps'),
            'created_by' => SESSION('userData')['id_user'],
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
        ];
        // print_r($data);
        // exit;
        $this->mdLokasi->insert($data);
        return redirect()->to(base_url('/akk/master_lokasi'));
    }

    public function hapus($id_lokasi)
    {
        $delete = $this->mdLokasi->delete($id_lokasi);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_lokasi'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

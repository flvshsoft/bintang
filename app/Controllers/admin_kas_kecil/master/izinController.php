<?php

namespace App\Controllers\admin_kas_kecil\master;

class izinController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Jenis Izin';
        $data['model'] = $this->mdIzin
            // ->where('id_branch', Session('userData')['id_branch'])
            // ->join('user', 'user.id_user=izin.created_by', 'left')
            ->findAll();
        return view('admin_kas_kecil/master/izin/index', $data);
    }

    public function input()
    {
        $data = [
            'created_by' => 'System',
            'remark_izin' => $this->request->getPost('remark_izin'),
            // 'id_branch', Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdIzin->insert($data);
        return redirect()->to(base_url('/akk/master_jenis_izin'));
    }

    public function hapus($id_izin)
    {
        $delete = $this->mdIzin->delete($id_izin);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_jenis_izin'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

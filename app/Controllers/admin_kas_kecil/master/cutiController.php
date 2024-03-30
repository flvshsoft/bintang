<?php

namespace App\Controllers\admin_kas_kecil\master;

class cutiController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Jenis Cuti';
        $data['model'] = $this->mdCuti
            // ->where('id_branch', Session('userData')['id_branch'])
            // ->join('user', 'user.id_user=cuti.created_by', 'left')
            ->findAll();
        return view('admin_kas_kecil/master/cuti/index', $data);
    }

    public function input()
    {
        $data = [
            'created_by' => 'System',
            'remark_cuti' => $this->request->getPost('remark_cuti'),
            // id_branch'=> Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdCuti->insert($data);
        return redirect()->to(base_url('/akk/master_jenis_cuti'));
    }

    public function hapus($id_cuti)
    {
        $delete = $this->mdCuti->delete($id_cuti);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_jenis_cuti'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

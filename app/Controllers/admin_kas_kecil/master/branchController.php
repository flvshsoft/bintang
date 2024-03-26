<?php

namespace App\Controllers\admin_kas_kecil\master;

class branchController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Branch';
        $data['model'] = $this->mdBranch->findAll();
        return view('admin_kas_kecil/master/branch/index', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Stock';
        return view('admin_kas_kecil/master/branch/tambah', $data);
    }
    public function input()
    {
        $data = [
            'cabang' => $this->request->getPost('cabang'),
            'nama_branch' => $this->request->getPost('nama_branch'),
        ];
        $this->mdBranch->insert($data);
        return redirect()->to(base_url('/akk/branch'));
    }

    public function hapus($id_branch)
    {
        $delete = $this->mdBranch->delete($id_branch);
        if ($delete) {
            return redirect()->to(base_url('/akk/branch'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_branch)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Branch';
        $data['model'] = $this->mdBranch
            ->where('id_branch', $id_branch)
            ->find()[0];
        return view('admin_kas_kecil/master/branch/edit', $data);
    }

    public function update()
    {
        $id_branch = $this->request->getPost('id_branch');
        $data = [
            'id_branch' => $id_branch,
            'cabang' => $this->request->getPost('cabang'),
            'nama_branch' => $this->request->getPost('nama_branch'),
        ];
        $this->mdBranch->save($data);
        return redirect()->to(base_url('/akk/branch'));
    }
}

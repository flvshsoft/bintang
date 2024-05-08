<?php

namespace App\Controllers\admin_kas_kecil\master;

class partnerController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Salesman';
        $data['model'] = $this->mdPartner
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/partner/index', $data);
    }
    public function tambah_partner()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Salesman';
        return view('admin_kas_kecil/master/partner/tambah', $data);
    }
    public function input()
    {
        $data = [
            'id_branch' => Session('userData')['id_branch'],
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'nik' => $this->request->getPost('nik'),
            'set_karyawan' => $this->request->getPost('set_karyawan'),
        ];
        // print_r($data);
        // exit;
        $this->mdPartner->insert($data);
        return redirect()->to(base_url('/akk/master_partner'));
    }

    public function hapus($id_partner)
    {
        $delete = $this->mdPartner->delete($id_partner);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_partner'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_partner)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Salesman';
        $data['model'] = $this->mdPartner
            ->where('id_partner', $id_partner)
            ->find()[0];

        return view('admin_kas_kecil/master/partner/edit', $data);
    }

    public function update()
    {
        $id_partner = $this->request->getPost('id_partner');
        $data = [
            'id_partner' => $id_partner,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'nik' => $this->request->getPost('nik'),
            'id_branch' => Session('userData')['id_branch'],
            'set_karyawan' => $this->request->getPost('set_karyawan'),
        ];
        // print_r($data);
        // exit;
        $this->mdPartner->save($data);
        return redirect()->to(base_url('/akk/master_partner'));
    }
}

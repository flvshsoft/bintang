<?php

namespace App\Controllers\admin_kas_kecil\master;

class customerController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Konsumen';
        $data['model'] = $this->mdCustomer
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/customer/index', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Konsumen';
        return view('admin_kas_kecil/master/customer/tambah', $data);
    }
    public function input()
    {
        $data = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_hp_customer' => $this->request->getPost('no_hp_customer'),
            'alamat_customer' => $this->request->getPost('alamat_customer'),
            //'id_branch'=> Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdCustomer->insert($data);
        return redirect()->to(base_url('/akk/master_customer'));
    }

    public function hapus($id_customer)
    {
        $delete = $this->mdCustomer->delete($id_customer);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_customer'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_customer)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Customer';
        $data['model'] = $this->mdCustomer
            ->where('id_customer', $id_customer)
            ->find()[0];

        return view('admin_kas_kecil/master/customer/edit', $data);
    }

    public function update()
    {
        $id_customer = $this->request->getPost('id_customer');
        $data = [
            'id_customer' => $id_customer,
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_hp_customer' => $this->request->getPost('no_hp_customer'),
            'alamat_customer' => $this->request->getPost('alamat_customer'),
        ];
        // print_r($data);
        // exit;
        $this->mdCustomer->save($data);
        return redirect()->to(base_url('/akk/master_customer'));
    }
}

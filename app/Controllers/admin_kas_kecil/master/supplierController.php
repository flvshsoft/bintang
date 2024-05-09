<?php

namespace App\Controllers\admin_kas_kecil\master;

class supplierController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Supplier';
        $data['model'] = $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/supplier/index', $data);
    }
    public function tambah_supplier()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Supplier';
        return view('admin_kas_kecil/master/supplier/tambah', $data);
    }
    public function input()
    {
        $data = [
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'no_hp_supplier' => $this->request->getPost('no_hp_supplier'),
            'alamat_supplier' => $this->request->getPost('alamat_supplier'),
            'id_branch' => Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdSupplier->insert($data);
        $kode_supplier = $this->mdSupplier->db->insertID();
        // print_r($kode_supplier);
        // exit;
        $this->mdSupplier->save(['kode_supplier'=> $kode_supplier, 'id_supplier' => $kode_supplier]);
        return redirect()->to(base_url('/akk/master_supplier'));
    }

    public function hapus($id_supplier)
    {
        $delete = $this->mdSupplier->delete($id_supplier);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_supplier'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_supplier)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Supplier';
        $data['model'] = $this->mdSupplier
            ->where('id_supplier', $id_supplier)
            ->find()[0];

        return view('admin_kas_kecil/master/supplier/edit', $data);
    }

    public function update()
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $data = [
            'id_supplier' => $id_supplier,
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'no_hp_supplier' => $this->request->getPost('no_hp_supplier'),
            'alamat_supplier' => $this->request->getPost('alamat_supplier'),
            'id_branch' => Session('userData')['id_branch']

        ];
        // print_r($data);
        // exit;
        $this->mdSupplier->save($data);
        return redirect()->to(base_url('/akk/master_supplier'));
    }
}

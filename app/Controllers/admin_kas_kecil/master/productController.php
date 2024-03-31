<?php

namespace App\Controllers\admin_kas_kecil\master;

class productController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Product';
        $data['model'] = $this->mdProduct
            ->join('supplier', 'supplier.id_supplier=product.id_supplier')
            ->where('supplier.id_branch', Session('userData')['id_branch'])
            //->groupBy('id_product')
            ->findAll();
        // print_r($data);
        // exit;

        return view('admin_kas_kecil/master/product/index', $data);
    }
    public function tambah_product()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Product';
        $data['supplier'] =  $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/product/tambah', $data);
    }
    public function input()
    {
        $data = [
            'nama_product' => $this->request->getPost('nama_product'),
            'satuan_product' => $this->request->getPost('satuan_product'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'stock_product' => $this->request->getPost('stock_product'),
            'area' => 0,
            'defect' => 0,
            'sample' => 0,
            'id_branch', Session('userData')['id_branch']
        ];
        // print_r($data);
        // exit;
        $this->mdProduct->insert($data);
        return redirect()->to(base_url('/akk/master_product'));
    }

    public function hapus($id_product)
    {
        $delete = $this->mdProduct->delete($id_product);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_product'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_product)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Product';
        $data['model'] = $this->mdProduct
            ->join('supplier', 'supplier.id_supplier=product.id_supplier')
            ->where('id_product', $id_product)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        $data['supplier'] =  $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/product/edit', $data);
    }

    public function update()
    {
        $id_product = $this->request->getPost('id_product');
        $data = [
            'id_product' => $id_product,
            'nama_product' => $this->request->getPost('nama_product'),
            'satuan_product' => $this->request->getPost('satuan_product'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'stock_product' => $this->request->getPost('stock_product'),
            'area' => $this->request->getPost('area'),
            'sample' => $this->request->getPost('sample'),
            'defect' => $this->request->getPost('defect'),
        ];
        // print_r($data);
        // exit;
        $this->mdProduct->save($data);
        return redirect()->to(base_url('/akk/master_product'));
    }
}

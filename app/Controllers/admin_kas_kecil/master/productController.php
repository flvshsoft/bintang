<?php

namespace App\Controllers\admin_kas_kecil\master;

class productController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Product';
        $data['level_user'] = Session('userData')['level_user'];
        $data['model'] = $this->mdProduct
            ->join('supplier', 'supplier.id_supplier=product.id_supplier', 'left')
            ->where('product.id_branch', Session('userData')['id_branch'])
            // ->where('supplier.id_branch', Session('userData')['id_branch'])
            ->orderBy('product.nama_product', 'ASC')
            ->groupBy('id_product')
            ->findAll();
        // print_r($data);
        // exit;
        $data['level_user'] = Session('userData')['level_user'];

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
        $stock_product = str_replace('.', '', $this->request->getPost('stock_product'));
        $stock_product = (int) str_replace(',', '', $stock_product);
        $harga_beli = str_replace('.', '', $this->request->getPost('harga_beli'));
        $harga_beli = (int) str_replace(',', '', $harga_beli);
        $data = [
            'nama_product' => $this->request->getPost('nama_product'),
            'satuan_product' => $this->request->getPost('satuan_product'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'stock_product' => $stock_product,
            'harga_beli' => $harga_beli,
            'area' => 0,
            'defect' => 0,
            'sample' => 0,
            'id_branch' => Session('userData')['id_branch']
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
            ->where('id_product', $id_product)
            ->join('supplier', 'supplier.id_supplier=product.id_supplier')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        $data['supplier'] =  $this->mdSupplier
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_supplier', 'ASC')
            ->findAll();
        $data['level_user'] = Session('userData')['level_user'];

        return view('admin_kas_kecil/master/product/edit', $data);
    }

    public function update()
    {
        $stock_product = str_replace('.', '', $this->request->getPost('stock_product'));
        $stock_product = (int) str_replace(',', '', $stock_product);
        $harga_beli = str_replace('.', '', $this->request->getPost('harga_beli'));
        $harga_beli = (int) str_replace(',', '', $harga_beli);
        $area = str_replace('.', '', $this->request->getPost('area'));
        $area = (int) str_replace(',', '', $area);
        $sample = str_replace('.', '', $this->request->getPost('sample'));
        $sample = (int) str_replace(',', '', $sample);
        $defect = str_replace('.', '', $this->request->getPost('defect'));
        $defect = (int) str_replace(',', '', $defect);

        $id_product = $this->request->getPost('id_product');


        $data = [
            'id_product' => $id_product,
            'nama_product' => $this->request->getPost('nama_product'),
            'satuan_product' => $this->request->getPost('satuan_product'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'stock_product' => $stock_product,
            'harga_beli' => $harga_beli,
            'area' => $area,
            'sample' => $sample,
            'defect' => $defect,
        ];

        // print_r($data);
        // exit;
        $this->mdProduct->save($data);
        return redirect()->to(base_url('/akk/master_product'));
    }
}

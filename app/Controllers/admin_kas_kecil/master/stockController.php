<?php

namespace App\Controllers\admin_kas_kecil\master;

class stockController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Stock';
        $data['model'] = $this->mdStock
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('product', 'product.id_product=stock.id_product', 'left')
            ->findAll();
        return view('admin_kas_kecil/master/stock/index', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Stock';
        $data['product'] =  $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/stock/tambah', $data);
    }
    public function input()
    {
        $id_product = $this->request->getPost('id_product');
        $jumlah_stock = $this->request->getPost('jumlah_stock');
        $data = [
            'id_product' => $id_product,
            'jumlah_stock' => $jumlah_stock,
            'tanggal_masuk' => date('d-m-y h:i:s'),
            // 'id_branch'=> Session('userData')['id_branch']
        ];
        $this->mdStock->insert($data);

        $data1 = [
            'id_product' => $this->request->getPost('id_product'),
            'stock_product' => $this->request->getPost('jumlah_stock'),
            // 'id_branch'=> Session('userData')['id_branch']
        ];
        // print_r($data1);
        // exit;
        $this->mdProduct->where('id_product', $id_product)
            ->increment('stock_product', $jumlah_stock);
        return redirect()->to(base_url('/akk/stock'));
    }

    public function hapus($id_stock)
    {
        $delete = $this->mdStock->delete($id_stock);
        if ($delete) {
            return redirect()->to(base_url('/akk/stock'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_stock)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Product';
        $data['model'] = $this->mdStock
            ->join('product', 'product.id_product=stock.id_product')
            ->where('id_stock', $id_stock)
            ->find()[0];
        $data['product'] =  $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/stock/edit', $data);
    }

    public function update()
    {
        $id_product = $this->request->getPost('id_product');
        $id_stock = $this->request->getPost('id_stock');
        $jumlah_stock = $this->request->getPost('jumlah_stock');
        $data = [
            'id_stock' => $id_stock,
            'id_product' => $id_product,
            'jumlah_stock' => $jumlah_stock,
        ];
        $this->mdStock->save($data);

        print_r($data);
        exit;

        $this->mdProduct->where('id_product', $id_product)
            ->increment('stock_product', $jumlah_stock);
        return redirect()->to(base_url('/akk/stock'));
    }
}

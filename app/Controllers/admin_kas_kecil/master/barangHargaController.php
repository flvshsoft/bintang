<?php

namespace App\Controllers\admin_kas_kecil\master;

class barangHargaController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Barang Harga';
        $data['model'] = $this->mdBarangHarga
            ->join('product', 'product.id_product=barang_harga.id_product')
            ->where('product.id_branch', Session('userData')['id_branch'])
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=barang_harga.id_jenis_harga')
            // ->join('user', 'user.id_user=barang_harga.created_by')
            // ->groupBy('product.id_product')
            ->findAll();
        $data['product'] = $this->mdProduct
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['jenis_harga'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/barang_harga/index', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Price';
        return view('admin_kas_kecil/master/barang_harga/tambah', $data);
    }
    public function input()
    {
        $data = [
            'id_product' => $this->request->getPost('id_product'),
            'id_jenis_harga' => $this->request->getPost('id_jenis_harga'),
            'harga_aktif' => $this->request->getPost('harga_aktif'),
            'created_by' => SESSION('userData')['id_user'],
            // 'id_branch'=> Session('userData')['id_branch']
        ];
        $this->mdBarangHarga->insert($data);
        return redirect()->to(base_url('/akk/master_barang_harga'));
    }

    public function hapus($id_price)
    {
        $delete = $this->mdJenisHarga->delete($id_price);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_price'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function edit($id_price)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Harga';
        $data['model'] = $this->mdJenisHarga
            ->where('id_price', $id_price)
            ->find()[0];

        return view('admin_kas_kecil/master/barang_harga/edit', $data);
    }

    public function update()
    {
        $id_price = $this->request->getPost('id_price');
        $data = [
            'id_price' => $id_price,
            'keterangan_price' => $this->request->getPost('keterangan_price'),
            'tanggal_aktif' =>  date('Y-m-d H:i:s'),
            'created_by' => SESSION('userData')['id_user'],
        ];
        $this->mdJenisHarga->save($data);
        return redirect()->to(base_url('/akk/master_price'));
    }
    public function detail($id_price)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Detail Price';
        $data['model'] = $this->mdJenisHargaDetail
            //->join('price', 'price.id_price=price_detail.id_price',)
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->where('price_detail.id_price', $id_price)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_price_detail', 'DESC')
            ->findAll();
        // print_r($data['model']);
        // exit;
        $data['id_price'] = $this->mdJenisHarga
            ->join('user', 'user.id_user=price.created_by',)
            // ->join('product', 'product.id_product=price_detail.id_product')
            // ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->where('id_price', $id_price)
            ->orderBy('id_price', 'DESC')
            ->find()[0];
        return view('admin_kas_kecil/master/barang_harga/detail', $data);
    }

    public function detail_tambah($id_price)
    {

        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Add Detail Price';
        $data['model'] = $this->mdJenisHargaDetail
            ->join('price', 'price.id_price=price_detail.id_price',)
            ->join('product', 'product.id_product=price_detail.id_price')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price.id_price')
            ->where('price_detail.id_price', $id_price)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_price_detail', 'DESC')
            ->findAll();
        $data['id_price'] = $this->mdJenisHarga
            ->where('id_price', $id_price)
            ->find()[0];
        $data['product'] = $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['jenis_harga'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['price'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/barang_harga/detail_tambah', $data);
    }

    public function tambah_nama_harga()
    {
        $id = $this->request->getVar('id');
        $data['product'] = $this->mdProduct
            ->where('id_product', $id)
            ->orderBy('id_product', 'ASC')
            ->find()[0];
        // print_r($data);
        return $data['product']['nama_product'] . ';' . $data['product']['satuan_product'];
    }
    public function input_detail_price()
    {
        $id_price = $this->request->getPost('id_price');
        $id_product = $this->request->getPost('id_product');
        $id_jenis_harga = $this->request->getPost('id_jenis_harga');
        $data = [
            'id_price' => $id_price,
            'id_product' => $id_product,
            'id_jenis_harga' => $id_jenis_harga,
            'harga' => $this->request->getPost('harga'),
            'id_branch' => Session('userData')['id_branch']
        ];
        $this->mdJenisHargaDetail->insert($data);
        // print_r($data);
        // exit;

        return redirect()->to(base_url('/akk/detail_price/' . $id_price));
    }

    public function detail_edit($id_price_detail)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Add Detail Price';
        $data['model'] = $this->mdJenisHargaDetail
            ->join('price', 'price.id_price=price_detail.id_price',)
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->where('id_price_detail', $id_price_detail)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_price_detail', 'DESC')
            ->find()[0];
        $data['product'] = $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['jenis_harga'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['price'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/barang_harga/detail_edit', $data);
    }
    public function update_detail_price()
    {
        $id_price_detail = $this->request->getPost('id_price_detail');
        $id_price = $this->request->getPost('id_price');
        $id_product = $this->request->getPost('id_product');
        $id_jenis_harga = $this->request->getPost('id_jenis_harga');
        $data = [
            'id_price_detail' => $id_price_detail,
            'id_price' => $id_price,
            'id_product' => $id_product,
            'id_jenis_harga' => $id_jenis_harga,
            'harga' => $this->request->getPost('harga')

        ];
        $this->mdJenisHargaDetail->save($data);
        return redirect()->to(base_url('/akk/detail_price/' . $id_price));
    }

    public function hapus_detail_price($id_price_detail, $id_price)
    {
        $this->mdJenisHargaDetail->delete($id_price_detail);
        return redirect()->to(base_url('/akk/detail_price/' . $id_price));
    }
}

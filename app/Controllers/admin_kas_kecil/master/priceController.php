<?php

namespace App\Controllers\admin_kas_kecil\master;

class priceController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Price';
        $data['model'] = $this->mdPrice
            // ->where('id_branch', Session('userData')['id_branch'])
            ->join('user', 'user.id_user=price.created_by')
            ->findAll();
        return view('admin_kas_kecil/master/price/index', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Price';
        return view('admin_kas_kecil/master/price/tambah', $data);
    }
    public function input()
    {
        $data = [
            // 'id_branch', Session('userData')['id_branch'],
            'keterangan_price' => $this->request->getPost('keterangan_price'),
            'tanggal_aktif' =>  date('d-m-y h:i:s'),
            'created_by' => SESSION('userData')['id_user'],
        ];
        $this->mdPrice->insert($data);
        return redirect()->to(base_url('/akk/master_price'));
    }

    public function hapus($id_price)
    {
        $delete = $this->mdPrice->delete($id_price);
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
        $data['model'] = $this->mdPrice
            ->where('id_price', $id_price)
            ->find()[0];

        return view('admin_kas_kecil/master/price/edit', $data);
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
        $this->mdPrice->save($data);
        return redirect()->to(base_url('/akk/master_price'));
    }
    public function detail($id_price)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Detail Price';
        $data['model'] = $this->mdPriceDetail
            //->join('price', 'price.id_price=price_detail.id_price',)
            ->join('product', 'product.id_product=price_detail.id_product')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->where('price_detail.id_price', $id_price)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_price_detail', 'DESC')
            ->findAll();
        // print_r($data['model']);
        // exit;
        $data['id_price'] = $this->mdPrice
            ->join('user', 'user.id_user=price.created_by',)
            // ->join('product', 'product.id_product=price_detail.id_product')
            // ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price_detail.id_jenis_harga')
            ->where('id_price', $id_price)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_price', 'DESC')
            ->find()[0];
        return view('admin_kas_kecil/master/price/detail', $data);
    }

    public function detail_tambah($id_price)
    {

        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Add Detail Price';
        $data['model'] = $this->mdPriceDetail
            ->join('price', 'price.id_price=price_detail.id_price',)
            ->join('product', 'product.id_product=price_detail.id_price')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=price.id_price')
            ->where('price_detail.id_price', $id_price)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_price_detail', 'DESC')
            ->findAll();
        $data['id_price'] = $this->mdPrice
            ->where('id_price', $id_price)
            // ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];
        $data['product'] = $this->mdProduct
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['jenis_harga'] = $this->mdJenisHarga
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['price'] = $this->mdPrice
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/price/detail_tambah', $data);
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
            'harga' => $this->request->getPost('harga')
            // 'id_branch'=> Session('userData')['id_branch']
        ];
        $this->mdPriceDetail->insert($data);
        // print_r($data);

        // BARANG GHARGA
        $mdBarangHarga = $this->mdBarangHarga
            ->where('id_product', $id_product)
            ->where('id_jenis_harga', $id_jenis_harga)
            ->find();

        if (count($mdBarangHarga) > 0) {
            echo "Ada";
            $data2 = [
                'id_barang_harga' => $mdBarangHarga[0]['id_barang_harga'],
                'id_product' => $id_product,
                'id_jenis_harga' => $id_jenis_harga,
                'harga_aktif' => $this->request->getPost('harga')
                // 'id_branch' => Session('userData')['id_branch']
            ];
            $this->mdBarangHarga->save($data2);
        } else {
            echo "Kosong";
            $data2 = [
                'id_product' => $id_product,
                'id_jenis_harga' => $id_jenis_harga,
                'harga_aktif' => $this->request->getPost('harga')
                // 'id_branch' => Session('userData')['id_branch']
            ];
            $this->mdBarangHarga->insert($data2);
            //
        }
        print_r($mdBarangHarga);

        // exit;

        return redirect()->to(base_url('/akk/detail_price/' . $id_price));
    }

    public function detail_edit($id_price_detail)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Add Detail Price';
        $data['model'] = $this->mdPriceDetail
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
        $data['price'] = $this->mdPrice
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/price/detail_edit', $data);
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
            // 'id_branch', Session('userData')['id_branch']
        ];
        $this->mdPriceDetail->save($data);
        // print_r($data);
        // exit;

        return redirect()->to(base_url('/akk/detail_price/' . $id_price));
    }

    public function hapus_detail_price($id_price_detail, $id_price)
    {
        $this->mdPriceDetail->delete($id_price_detail);
        return redirect()->to(base_url('/akk/detail_price/' . $id_price));
    }
}

<?php

namespace App\Controllers\admin_kas_kecil\master;

class assetController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Asset';
        $data['model'] =  $this->mdAsset
            ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/asset/index', $data);
    }
    public function tambah_asset()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Add Asset';
        return view('admin_kas_kecil/master/asset/tambah', $data);
    }
    public function input()
    {
        $data = [
            'nama_asset' => $this->request->getPost('nama_asset'),
            'id_asset' => '500000',
            'jenis_asset' => $this->request->getPost('jenis_asset'),
            'tahun_pembelian' => $this->request->getPost('tahun_pembelian'),
            'no_rangka' => $this->request->getPost('no_rangka'),
            'no_plat' => $this->request->getPost('no_plat'),
            'no_mesin' => $this->request->getPost('no_mesin'),
            'tgl_berakhir_pajak_stnk' => $this->request->getPost('tgl_berakhir_pajak_stnk'),
            'satuan' => $this->request->getPost('satuan'),
            'tgl_berakhir_kir' => $this->request->getPost('tgl_berakhir_kir'),
            'tgl_berakhir_plat' => $this->request->getPost('tgl_berakhir_plat'),
            'pic' => $this->request->getPost('pic'),
            'lokasi' => $this->request->getPost('lokasi'),
            'id_branch' => Session('userData')['id_branch'],
        ];
        // print_r($data);
        // exit;
        $this->mdAsset->insert($data);
        return redirect()->to(base_url('/akk/master_asset'));
    }
    public function edit($id_asset)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Edit Asset';
        $data['model'] =  $this->mdAsset
            ->where('id_asset', $id_asset)
            ->where('id_branch', Session('userData')['id_branch'])
            ->find()[0];

        return view('admin_kas_kecil/master/asset/edit', $data);
    }
    public function update()
    {
        $id_asset = $this->request->getPost('id_asset');
        $data = [
            'id_asset' => $id_asset,
            'nama_asset' => $this->request->getPost('nama_asset'),
            'jenis_asset' => $this->request->getPost('jenis_asset'),
            'tahun_pembelian' => $this->request->getPost('tahun_pembelian'),
            'no_rangka' => $this->request->getPost('no_rangka'),
            'no_plat' => $this->request->getPost('no_plat'),
            'no_mesin' => $this->request->getPost('no_mesin'),
            'tgl_berakhir_pajak_stnk' => $this->request->getPost('tgl_berakhir_pajak_stnk'),
            'satuan' => $this->request->getPost('satuan'),
            'tgl_berakhir_kir' => $this->request->getPost('tgl_berakhir_kir'),
            'tgl_berakhir_plat' => $this->request->getPost('tgl_berakhir_plat'),
            'pic' => $this->request->getPost('pic'),
            'lokasi' => $this->request->getPost('lokasi'),
            'id_branch' => Session('userData')['id_branch']
        ];
        //  print_r($data);
        //  exit;
        $this->mdAsset->save($data);
        return redirect()->to(base_url('/akk/master_asset'));
    }
}

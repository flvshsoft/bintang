<?php

namespace App\Controllers\admin_kas_kecil\master;

use App\Models\customerModel;

class customerController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Data Konsumen/Toko';
        $data['model'] = $this->mdCustomer
            ->join('area', 'area.id_area=customer.id_area', 'left')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga', 'left')
            ->where('customer.id_branch', Session('userData')['id_branch'])
            ->findAll();
        $count_customer_data = $this->mdCustomer
            ->select('payment_metode, COUNT(*) as count')
            ->where('customer.id_branch', Session('userData')['id_branch'])
            ->groupBy('payment_metode')
            ->findAll();

        $data['count_customer'] = [];
        $data['count_customer']['CASH'] = 0;
        $data['count_customer']['KREDIT'] = 0;
        $data['count_customer']['Unknown'] = 0;
        foreach ($count_customer_data as $item) {
            if ($item['payment_metode'] == '') {
                $item['payment_metode'] = 'Unknown';
            }
            $data['count_customer'][$item['payment_metode']] = $item['count'];
        }
        return view('admin_kas_kecil/master/customer/index', $data);
    }
    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Konsumen';
        $data['area'] = $this->mdArea
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_area')
            ->findAll();
        $data['type_harga'] = $this->mdJenisHarga
            //  ->where('jenis_harga.id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/customer/tambah', $data);
    }
    public function input()
    {
        $model = new customerModel();
        $db1 = \Config\Database::connect();
        $file =  $this->request->getFile('foto_toko');
        $fileName = time() . $file->getClientName();

        // Lokasi penyimpanan
        $destination = ROOTPATH . 'public/img/foto_toko';

        // Cek apakah ada file yang diunggah
        if ($file->isValid() && !$file->hasMoved()) {
            // Memindahkan file ke lokasi penyimpanan
            $file->move($destination, $fileName);

            // Membuat instance gambar sesuai tipe
            $imageInfo = getimagesize($destination . '/' . $fileName);
            $imageType = $imageInfo[2];

            // Kompresi gambar jika formatnya JPEG atau PNG
            if ($imageType == IMAGETYPE_JPEG) {
                $image = imagecreatefromjpeg($destination . '/' . $fileName);
                imagejpeg($image, $destination . '/' . $fileName, 60); // Mengatur kualitas kompresi menjadi 60
            } elseif ($imageType == IMAGETYPE_PNG) {
                $image = imagecreatefrompng($destination . '/' . $fileName);
                imagepng($image, $destination . '/' . $fileName, 6); // Mengatur level kompresi menjadi 6 (0-9)
            }

            session()->setFlashData('message', 'Berhasil upload dan kompresi gambar');
        } else {
            session()->setFlashData('message', 'Gagal upload');
        }

        $data = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_hp_customer' => $this->request->getPost('no_hp_customer'),
            'alamat_customer' => $this->request->getPost('alamat_customer'),
            'foto_toko' => $fileName,
            'nama_owner' => $this->request->getPost('nama_owner'),
            'no_hp_owner' => $this->request->getPost('no_hp_owner'),
            'alamat_owner' => $this->request->getPost('alamat_owner'),
            'id_area' => $this->request->getPost('id_area'),
            'id_jenis_harga' => $this->request->getPost('id_jenis_harga'),
            'kab_kota' => $this->request->getPost('kab_kota'),
            'payment_metode' => $this->request->getPost('payment_metode'),
            'id_branch' => Session('userData')['id_branch']
        ];

        if (
            ($data['nama_customer'] == "") ||
            ($data['no_hp_customer'] == "") ||
            ($data['alamat_customer'] == "") ||
            ($data['nama_owner'] == "") ||
            ($data['no_hp_owner'] == "") ||
            ($data['alamat_owner'] == "") ||
            ($data['id_area'] == "") ||
            ($data['id_jenis_harga'] == "") ||
            ($data['kab_kota'] == "") ||
            ($data['payment_metode'] == "") ||
            ($data['foto_toko'] == "")
        ) {
            $data['data_lengkap'] = 0;
        } else {
            $data['data_lengkap'] = 1;
        }

        if ($data['payment_metode'] == 'KREDIT') {
            if ($data['data_lengkap'] == 0) {
                session()->setFlashdata("tak_lengkap", "Data Tidak Lengkap");
            } else if ($data['data_lengkap'] == 1) {
                session()->setFlashdata("lengkap", "Data Sudah Lengkap");
            } else {
                ';';
            }
        }
        if ($data['payment_metode'] == 'CASH') {
            if ($data['data_lengkap'] == 0) {
                session()->setFlashdata("tak_lengkap", "Data Tidak Lengkap");
            } else if ($data['data_lengkap'] == 1) {
                session()->setFlashdata("lengkap", "Data Sudah Lengkap");
            } else {
                ';';
            }
        }

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
            ->join('area', 'area.id_area=customer.id_area', 'left')
            ->join('jenis_harga', 'jenis_harga.id_jenis_harga=customer.id_jenis_harga', 'left')
            ->where('id_customer', $id_customer)
            ->find()[0];
        $data['area'] = $this->mdArea
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_area')
            ->findAll();
        $data['type_harga'] = $this->mdJenisHarga
            //  ->where('jenis_harga.id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/customer/edit', $data);
    }

    public function update()
    {
        $model = new customerModel();
        $db1 = \Config\Database::connect();
        $file =  $this->request->getFile('foto_toko');

        // Lokasi penyimpanan
        $destination = ROOTPATH . 'public/img/foto_toko';

        // Cek apakah ada file yang diunggah
        if ($file->isValid() && !$file->hasMoved()) {
            // Mendapatkan nama file dan ekstensinya
            $fileName = time() . '.' . $file->getClientExtension();

            // Memindahkan file ke lokasi penyimpanan
            $file->move($destination, $fileName);

            // Membuat instance gambar sesuai tipe
            $imageInfo = getimagesize($destination . '/' . $fileName);
            $imageType = $imageInfo[2];

            // Kompresi gambar jika formatnya JPEG atau PNG
            if ($imageType == IMAGETYPE_JPEG) {
                $image = imagecreatefromjpeg($destination . '/' . $fileName);
                imagejpeg($image, $destination . '/' . $fileName, 60); // Mengatur kualitas kompresi menjadi 60
            } elseif ($imageType == IMAGETYPE_PNG) {
                $image = imagecreatefrompng($destination . '/' . $fileName);
                imagepng($image, $destination . '/' . $fileName, 6); // Mengatur level kompresi menjadi 6 (0-9)
            }

            session()->setFlashData('message', 'Berhasil upload dan kompresi gambar');
        } else {
            // Jika tidak ada file yang diunggah, tetapkan nilai foto_toko ke nilai yang sudah ada
            $fileName = $this->request->getPost('foto_toko_existing'); // Ganti foto_toko_existing dengan nama yang sesuai
            session()->setFlashData('message', 'Gagal upload');
        }

        $id_customer = $this->request->getPost('id_customer');
        $data = [
            'id_customer' => $id_customer,
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_hp_customer' => $this->request->getPost('no_hp_customer'),
            'alamat_customer' => $this->request->getPost('alamat_customer'),
            'nama_owner' => $this->request->getPost('nama_owner'),
            'no_hp_owner' => $this->request->getPost('no_hp_owner'),
            'alamat_owner' => $this->request->getPost('alamat_owner'),
            'id_area' => $this->request->getPost('id_area'),
            'id_jenis_harga' => $this->request->getPost('id_jenis_harga'),
            'kab_kota' => $this->request->getPost('kab_kota'),
            'payment_metode' => $this->request->getPost('payment_metode'),
        ];
        if ($fileName != '') {
            $data['foto_toko'] = $fileName;
        }
        // echo $data['foto_toko'];
        // exit;

        if (
            ($data['id_customer'] == "") ||
            ($data['nama_customer'] == "") ||
            ($data['no_hp_customer'] == "") ||
            ($data['alamat_customer'] == "") ||
            ($data['nama_owner'] == "") ||
            ($data['no_hp_owner'] == "") ||
            ($data['alamat_owner'] == "") ||
            ($data['id_area'] == "") ||
            ($data['id_jenis_harga'] == "") ||
            ($data['kab_kota'] == "") ||
            ($data['payment_metode'] == "")
            // ($data['foto_toko'] == "")
        ) {
            $data['data_lengkap'] = 0;
        } else {
            $data['data_lengkap'] = 1;
        }

        if ($data['payment_metode'] == 'KREDIT') {
            if ($data['data_lengkap'] == 0) {
                session()->setFlashdata("tak_lengkap", "Data Tidak Lengkap");
            } else if ($data['data_lengkap'] == 1) {
                session()->setFlashdata("lengkap", "Data Sudah Lengkap");
            } else {
                ';';
            }
        }

        if ($data['payment_metode'] == 'CASH') {
            if ($data['data_lengkap'] == 0) {
                // session()->setFlashdata("tak_lengkap", "Data Tidak Lengkap");
            } else {
                session()->setFlashdata("lengkap", "Data Sudah Lengkap");
                // } else {
                // ';';
            }
        }

        $this->mdCustomer->save($data);
        // print_r($data);
        return redirect()->to(base_url('/akk/master_customer'));
    }
}
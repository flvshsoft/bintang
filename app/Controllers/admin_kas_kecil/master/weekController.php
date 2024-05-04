<?php

namespace App\Controllers\admin_kas_kecil\master;

class weekController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Week';
        $data['model'] = $this->mdWeek
            ->join('user', 'user.id_user=week.id_user', 'left')
            ->findAll();
        return view('admin_kas_kecil/master/week/index', $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Week';
        return view('admin_kas_kecil/master/week/tambah', $data);
    }

    public function generate()
    {
        $data = [
            'id_user' => SESSION('userData')['id_user'],
            'nama_week' => $this->request->getPost('nama_week'),
            'bulan_week' => $this->request->getPost('bulan_week'),
            'tahun_week' => $this->request->getPost('tahun_week'),
            'status_week' => $this->request->getPost('status_week'),
            'bulan' => $this->request->getPost('bulan'),
            'status_closing' => $this->request->getPost('status_closing'),
        ];
        $this->mdWeek->insert($data);
        return redirect()->to(base_url('/akk/master_week'));
    }

    public function input()
    {
        $data = [
            'id_user' => SESSION('userData')['id_user'],
            'nama_week' => $this->request->getPost('nama_week'),
            'bulan_week' => $this->request->getPost('bulan_week'),
            'tahun_week' => $this->request->getPost('tahun_week'),
            'status_week' => $this->request->getPost('status_week'),
            'bulan' => $this->request->getPost('bulan'),
            'status_closing' => $this->request->getPost('status_closing'),
        ];
        $this->mdWeek->insert($data);
        return redirect()->to(base_url('/akk/master_week'));
    }

    public function edit($id_week)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Edit Week';
        $data['model'] =  $this->mdWeek
            ->where('id_week', $id_week)
            ->find()[0];

        return view('admin_kas_kecil/master/week/edit', $data);
    }
    public function update()
    {
        $id_week = $this->request->getPost('id_week');
        $data = [
            'id_week' => $id_week,
            'id_user' => SESSION('userData')['id_user'],
            'nama_week' => $this->request->getPost('nama_week'),
            'bulan_week' => $this->request->getPost('bulan_week'),
            'tahun_week' => $this->request->getPost('tahun_week'),
            'status_week' => $this->request->getPost('status_week'),
            'bulan' => $this->request->getPost('bulan'),
            'status_closing' => $this->request->getPost('status_closing'),
        ];
        $this->mdWeek->save($data);
        return redirect()->to(base_url('/akk/master_week'));
    }

    public function hapus($id_week)
    {
        $delete = $this->mdWeek->delete($id_week);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_week'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}
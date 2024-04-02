<?php

namespace App\Controllers\admin_kas_kecil\keuangan;

class pengeluaran_kantorController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DATA PENGELUARAN KANTOR';
        $data['model'] = $this->mdPengeluaranKantor
            ->where('pengeluaran_kantor.id_branch', SESSION('userData')['id_branch'])
            ->join('user', 'user.id_user=pengeluaran_kantor.created_by')
            ->findAll();
        return view('admin_kas_kecil/keuangan/pengeluaran_kantor/index', $data);
    }

    public function tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'FORM PENGELUARAN KANTOR';
        return view('admin_kas_kecil/keuangan/pengeluaran_kantor/tambah', $data);
    }

    public function add()
    {
        $data = [
            'keterangan_pengeluaran_kantor' => $this->request->getPost('keterangan_pengeluaran_kantor'),
            'remark_pengeluaran_kantor' => $this->request->getPost('remark_pengeluaran_kantor'),
            'biaya_pengeluaran_kantor' => $this->request->getPost('biaya_pengeluaran_kantor'),
            'week_pengeluaran_kantor' => $this->request->getPost('week_pengeluaran_kantor'),
            'tgl_pengeluaran_kantor' => $this->request->getPost('tgl_pengeluaran_kantor'),
            'created_by' => SESSION('userData')['id_user'],
            'id_branch' => SESSION('userData')['id_branch'],
            'approved_by' => SESSION('userData')['id_user'],
            'approved_date' => date('d-m-Y H:i:s')
        ];

        $this->mdPengeluaranKantor->insert($data);
        return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor'));
    }

    public function edit($id): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DETAIL PENGELUARAN KANTOR';
        $data['model'] = $this->mdPengeluaranKantor
            ->join('user', 'user.id_user=pengeluaran_kantor.created_by')
            ->where('id_pengeluaran_kantor', $id)
            ->find()[0];
        return view('admin_kas_kecil/keuangan/pengeluaran_kantor/edit', $data);
    }

    public function update()
    {
        $id_pengeluaran_kantor =  $this->request->getPost('id_pengeluaran_kantor');
        $data = [
            'id_pengeluaran_kantor' => $id_pengeluaran_kantor,
            'keterangan_pengeluaran_kantor' => $this->request->getPost('keterangan_pengeluaran_kantor'),
            'remark_pengeluaran_kantor' => $this->request->getPost('remark_pengeluaran_kantor'),
            'biaya_pengeluaran_kantor' => $this->request->getPost('biaya_pengeluaran_kantor'),
            'week_pengeluaran_kantor' => $this->request->getPost('week_pengeluaran_kantor'),
            'tgl_pengeluaran_kantor' => $this->request->getPost('tgl_pengeluaran_kantor'),
            'created_by' => SESSION('userData')['id_user'],
            'approved_by' => SESSION('userData')['id_user'],
            'approved_date' => date('d-m-Y H:i:s')
        ];
        $this->mdPengeluaranKantor->save($data);
        return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor'));
    }

    public function hapus($id_pengeluaran_kantor)
    {
        $delete = $this->mdPengeluaranKantor->delete($id_pengeluaran_kantor);
        if ($delete) {
            return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

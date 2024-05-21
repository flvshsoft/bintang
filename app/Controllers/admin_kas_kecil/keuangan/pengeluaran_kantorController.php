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
            ->orderBy('id_pengeluaran_kantor', 'DESC')
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
        $biaya_pengeluaran_kantor = str_replace('.', '', $this->request->getPost('biaya_pengeluaran_kantor')); // Hapus tanda titik
        $biaya_pengeluaran_kantor = (int) str_replace(',', '', $biaya_pengeluaran_kantor); // Konversi ke integer
        $data = [
            'keterangan_pengeluaran_kantor' => $this->request->getPost('keterangan_pengeluaran_kantor'),
            'remark_pengeluaran_kantor' => $this->request->getPost('remark_pengeluaran_kantor'),
            'biaya_pengeluaran_kantor' => $biaya_pengeluaran_kantor,
            'week_pengeluaran_kantor' => $this->request->getPost('week_pengeluaran_kantor'),
            'tgl_pengeluaran_kantor' => $this->request->getPost('tgl_pengeluaran_kantor'),
            'created_by' => SESSION('userData')['id_user'],
            'id_branch' => SESSION('userData')['id_branch'],
            'approved_by' => SESSION('userData')['id_user'],
            'approved_date' => date('d-m-Y H:i:s')
        ];
        $bank = $this->mdBank
            ->where('nama_bank', 'KAS KECIL')
            ->where('id_branch', Session('userData')['id_branch'])
            ->find();
        $saldo = $bank[0]['saldo'];
        $id_bank = $bank[0]['id_bank'];
        $nama_bank = $bank[0]['nama_bank'];

        if ($saldo >= $biaya_pengeluaran_kantor) {
            $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $biaya_pengeluaran_kantor);
            session()->setFlashdata("berhasil", "Data Berhasil Ditambah");
            $this->mdPengeluaranKantor->insert($data);
        } else {
            session()->setFlashdata("kurang", "Maaf Saldo " . $nama_bank . " Tidak Cukup, Silahkan Top Up Terlebih Dahulu");
            return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor/tambah'));
        }
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
        $biaya_pengeluaran_kantor = str_replace('.', '', $this->request->getPost('biaya_pengeluaran_kantor')); // Hapus tanda titik
        $biaya_pengeluaran_kantor = (int) str_replace(',', '', $biaya_pengeluaran_kantor); // Konversi ke integer
        $id_pengeluaran_kantor =  $this->request->getPost('id_pengeluaran_kantor');

        $data = [
            'id_pengeluaran_kantor' => $id_pengeluaran_kantor,
            'keterangan_pengeluaran_kantor' => $this->request->getPost('keterangan_pengeluaran_kantor'),
            'remark_pengeluaran_kantor' => $this->request->getPost('remark_pengeluaran_kantor'),
            'biaya_pengeluaran_kantor' => $biaya_pengeluaran_kantor,
            'week_pengeluaran_kantor' => $this->request->getPost('week_pengeluaran_kantor'),
            'tgl_pengeluaran_kantor' => $this->request->getPost('tgl_pengeluaran_kantor'),
            'created_by' => SESSION('userData')['id_user'],
            'approved_by' => SESSION('userData')['id_user'],
            'approved_date' => date('d-m-Y H:i:s')
        ];
        $this->mdPengeluaranKantor->save($data);

        $bank = $this->mdBank
            ->where('nama_bank', 'KAS KECIL')
            ->where('id_branch', Session('userData')['id_branch'])
            ->find();
        $saldo = $bank[0]['saldo'];
        $id_bank = $bank[0]['id_bank'];
        $nama_bank = $bank[0]['nama_bank'];

        if ($saldo >= $biaya_pengeluaran_kantor) {
            $this->mdBank->where('id_bank', $id_bank)->decrement('saldo', $biaya_pengeluaran_kantor);
            session()->setFlashdata("berhasil", "Data Berhasil Ditambah");
        } else {
            session()->setFlashdata("kurang", "Maaf Saldo " . $nama_bank . " Tidak Cukup, Silahkan Top Up Terlebih Dahulu");
            return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor/edit/' . $id_pengeluaran_kantor));
        }
        return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor'));
    }

    public function hapus($id_pengeluaran_kantor, $biaya_pengeluaran_kantor)
    {
        $bank = $this->mdBank
            ->where('nama_bank', 'KAS KECIL')
            ->where('id_branch', Session('userData')['id_branch'])
            ->find();
        $id_bank = $bank[0]['id_bank'];
        $delete2  = $this->mdBank->where('id_bank', $id_bank)->increment('saldo', $biaya_pengeluaran_kantor);
        $delete = $this->mdPengeluaranKantor->delete($id_pengeluaran_kantor);

        if ($delete && $delete2) {
            return redirect()->to(base_url('/akk/keuangan/pengeluaran_kantor'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}

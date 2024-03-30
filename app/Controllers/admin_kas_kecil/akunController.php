<?php

namespace App\Controllers\admin_kas_kecil;

//require FCPATH.'vendor/autoload.php';

use CodeIgniter\Session\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class akunController extends BaseController
{

    public function akun(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA KARYAWAN';
        $data['model'] = $this->mdUser
            ->join('branch', 'branch.id_branch=user.id_branch')
            //  ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/akun/index', $data);
    }

    public function akun_tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INFORMATION EMPLOYEE';
        $data['branch'] = $this->mdBranch->findAll();
        return view('admin_kas_kecil/akun/tambah', $data);
    }

    public function akun_input()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'nama_user' => $this->request->getPost('nama_user'),
            'password' => $this->request->getPost('password'),
            'level_user' => 'Admin',
            'status_user' => 1,
            'id_branch' => $this->request->getPost('id_branch'),
            'created_at' => date('d-m-y')
        ];
        // print_r($data);
        // exit;
        $this->mdUser->insert($data);
        return redirect()->to(base_url('/akk/akun'));
    }

    public function hapus($id_user)
    {
        $delete = $this->mdUser->delete($id_user);
        if ($delete) {
            return redirect()->to(base_url('/akk/akun'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function akun_edit($id_user)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Karyawan';
        $data['branch'] = $this->mdBranch->findAll();

        $data['model'] = $this->mdUser
            ->join('branch', 'branch.id_branch=user.id_branch')
            ->where('id_user', $id_user)
            ->find()[0];
        return view('admin_kas_kecil/akun/edit', $data);
    }

    public function akun_update()
    {
        $id_user = $this->request->getPost('id_user');
        $data = [
            'id_user' => $id_user,
            'username' => $this->request->getPost('username'),
            'nama_user' => $this->request->getPost('nama_user'),
            'password' => $this->request->getPost('password'),
            'level_user' => 'Admin',
            'status_user' => 1,
            'id_branch' => $this->request->getPost('id_branch'),
            'updated_at' => date('d-m-y')
        ];
        $this->mdUser->save($data);

        return redirect()->to(base_url('/akk/akun'));
    }
}
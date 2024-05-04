<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang Distributor';
        return view('login', $data);
    }
    public function register()
    {
        return view('register');
    }
    public function prosesregister()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level_user' => 'Admin',
            'status_user' => 1,
            'created_at' => date('d-m-y')
        ];
        // print_r($data);
        // exit;
        $success = $this->mdUser->insert($data);
        if ($success) {
            session()->setFlashdata("berhasil", "Akun Berhasil di Register, Silahkan Login");
            return redirect()->to(base_url('/register'));
        }
    }
    public function proseslogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = $this->mdUser->where('username', $this->request->getPost('username'))->first();

        if (is_null($user) || !password_verify($this->request->getPost('password'), $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', lang('Auth.nonAktif'));
        }

        if ($user['status_user'] == 0) {
            return redirect()->back()->withInput()->with('error', lang('Auth.nonAktif'));
        }
        $this->session->set('isLoggedIn', true);

        if ($user['level_user'] == 'Kas Kecil') {
            $modelBranch = $this->mdBranch
                ->where('id_branch', $user["id_branch"])
                ->findAll();

            $this->session->set('userData', [
                'nama_branch' => $modelBranch[0]["nama_branch"],
                'cabang' => $modelBranch[0]["cabang"],
                'id_user'            => $user["id_user"],
                'id_branch'            => $user["id_branch"],
                'username'          => $user["username"],
                'nama_user'          => $user["nama_user"],
                'password_hash'          => $user["password_hash"],
                'level_user' => $user["level_user"],
            ]);
            return redirect()->to(base_url('/akk/dashboard'));
        } elseif ($user['level_user'] == 'Gudang') {

            // $modelPemilik = $this->mdPemilik
            //     ->where('no_hp', $user["username"])
            //     ->findAll();
            $this->session->set('userData', [
                'id_user'            => $user["id_user"],
                'username'          => $user["username"],
                'nama_user'          => $user["nama_user"],
                //'id_pemilik'          => $modelPemilik[0]["id_pemilik"],
                'password_hash'          => $user["password_hash"],
                'level_user' => $user["level_user"],
            ]);
            return redirect()->to(base_url('/g/dashboard'));
        } elseif ($user['level_user'] == 'SPV') {

            // $modelPencari = $this->mdUser
            //     ->where('no_hp_pencari', $user["username"])
            //     ->findAll();

            $this->session->set('userData', [
                'id_user'            => $user["id_user"],
                'username'          => $user["username"],
                'nama_user'          => $user["nama_user"],
                // 'id_pencari'          => $modelPencari[0]["id_pencari"],
                'password_hash'          => $user["password_hash"],
                'level_user' => $user["level_user"],
            ]);
            return redirect()->to(base_url('/dashboard'));
        } elseif ($user['level_user'] == 'admin') {
            $modelBranch = $this->mdBranch
                ->where('id_branch', $user["id_branch"])
                ->findAll();

            $this->session->set('userData', [
                'nama_branch' => $modelBranch[0]["nama_branch"],
                'cabang' => $modelBranch[0]["cabang"],
                'id_user' => $user["id_user"],
                'id_branch' => $user["id_branch"],
                'username' => $user["username"],
                'nama_user' => $user["nama_user"],
                'password_hash' => $user["password_hash"],
                'level_user' => $user["level_user"],
            ]);
            return redirect()->to(base_url('/akk/dashboard'));
        }
        return redirect()->to(base_url('/'));
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
}

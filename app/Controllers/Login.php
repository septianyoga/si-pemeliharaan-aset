<?php

namespace App\Controllers;

use App\Models\User;

class Login extends BaseController
{
    public function index(): string
    {
        return view('pages/login', [
            'title' => 'Login'
        ]);
    }

    public function autentikasi()
    {

        $validate = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'min_length' => '{field} minimal terdiri dari 3 huruf.',
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $user = new User();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $auth = $user->where('username', $username)->first();
        if ($auth) {
            if (password_verify("$password", $auth['password'])) {
                session()->set('id_user', $auth['id_user']);
                session()->set('nama', $auth['nama_user']);
                session()->set('username', $auth['username']);
                session()->set('email', $auth['email']);
                session()->set('role', $auth['role']);
                return redirect()->to(base_url('dashboard'))->with('login', 'Login Berhasil.');
            }
        } else {
            return redirect()->back()->with('pesan', 'Username atau Password Salah');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        session()->remove('nama');
        session()->remove('username');
        session()->remove('email');
        session()->remove('role');
        return redirect()->to(base_url('login'))->with('success', 'Logout berhasil!.');
    }
}

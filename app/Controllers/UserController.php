<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        //
        $user = new User();
        return view('admin/user/index', [
            'title' => 'Kelola User',
            'users' => $user->findAll()
        ]);
    }

    public function insertUser()
    {
        $validate = $this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah digunakan.',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'valid_email' => '{field} tidak valid!.',
                    'is_unique' => '{field} sudah digunakan.'
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
            'role' => [
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $password = $this->request->getPost('password');

        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash("$password", PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ];

        $user = new User();
        $user->insert($data);
        return redirect()->to(base_url('user'))->with('pesan', 'User berhasil ditambahkan!');
    }

    public function updateUser()
    {
        $validate = $this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'valid_email' => '{field} tidak valid!.',
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

        $password = $this->request->getPost('password');

        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];
        if ($password) {
            $data['password'] = password_hash("$password", PASSWORD_DEFAULT);
        }

        $id_user = $this->request->getPost('id_user');

        $user = new User();
        $user->update($id_user, $data);
        return redirect()->to(base_url('user'))->with('pesan', 'User berhasil diubah!');
    }

    public function hapusUser($id_user)
    {
        $user = new User();
        $user->delete($id_user);
        return redirect()->to(base_url('user'))->with('pesan', 'User berhasil dihapus!');
    }
}

<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class RegistrasiController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        return view('pages/registrasi', [
            'title' => 'Registrasi'
        ]);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
        // dd('kdfjdkjf');
        // dd($this->request->getPost());
        $validate = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah digunakan.'
                ],
            ],
            'nama_user' => [
                'label' => 'Nama',
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
                    'is_unique' => '{field} sudah digunakan.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                // 'rules' => 'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])/]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'min_length'    => '{field} minimal terdiri dari 8 karakter',
                    // 'regex_match'   => '{field} minimal mengandung satu huruf besar, angka, dan karakter'
                ],
            ],
            'passwordkonf' => [
                'label' => 'Password Konfirmasi',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'matches'    => '{field} harus sama.'
                ],
            ]
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
            'role' => 'Driver'
        ];

        $user = new User();
        $user->insert($data);
        return redirect()->to(base_url('login'))->with('success', 'Registrasi Akun Berhasil!');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}

<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProfilController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        $user = new User();
        return view('profil/index', [
            'title' => 'Profil',
            'user'  => $user->where('id_user', session()->get('id_user'))->first()
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
        $user = new User();
        $id_user = session()->get('id_user');
        $cek_user = $user->where('id_user', $id_user)->first();
        $validate = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => "required|is_unique[user.email,id_user,{$id_user}]",
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
                'rules' => "required|is_unique[user.username,id_user,{$id_user}]",
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah digunakan.'
                ],
            ]
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];
        $password_lama = $this->request->getPost('password_lama');
        if ($password_lama) {
            $validate = $this->validate([
                'password_baru' => [
                    'label' => 'Password Baru',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => '{field} wajib diisi.',
                        'min_length'    => '{field} minimal terdiri dari 8 karakter',
                    ],
                ],
                'passwordkonf' => [
                    'label' => 'Password Konfirmasi',
                    'rules' => 'required|matches[password_baru]',
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

            $password = $this->request->getPost('password_lama');
            if (password_verify("$password", $cek_user['password'])) {
                if ($this->request->getPost('password_baru') != $this->request->getPost('passwordkonf')) {
                    return redirect()->back()->withInput()->with('errors', ['Password konfirmasi tidak sama.']);
                } else {
                    $password_baru = $this->request->getPost('password_baru');
                    $data['password'] = password_hash("$password_baru", PASSWORD_DEFAULT);
                }
            } else {
                return redirect()->back()->withInput()->with('errors', ['Password lama salah.']);
            }
        }
        $user->update($id_user, $data);
        return redirect()->to(base_url('/profil'))->with('pesan', 'Update Profil Berhasil!');
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

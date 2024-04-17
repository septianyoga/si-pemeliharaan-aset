<?php

namespace App\Controllers;

use App\Models\Aset;
use App\Models\JadwalPemeliharaan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class JadwalPemeliharaanController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        return view('user_pic/jadwal_pemeliharaan/index', [
            'title' => 'Buat Jadwal Pemeliharaan Aset',
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
        $aset = new Aset();
        return view('user_pic/jadwal_pemeliharaan/add', [
            'title' => 'Buat Jadwal Pemeliharaan Aset',
            'asets' => $aset->findAll()
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
        $validate = $this->validate([
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => "required",
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
            'tanggal' => [
                'label' => 'Tanggal',
                'rules' => "required",
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
            'id_aset' => [
                'label' => 'Aset',
                'rules' => "required",
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ],
            ],
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
        $pemeliharaan = new JadwalPemeliharaan();
        $pemeliharaan->insert($this->request->getPost());
        return redirect()->to(base_url('/jadwal_pemeliharaan/add'))->with('pesan', 'Jadwal Pemeliharaan Berhasil Ditambahkan');
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

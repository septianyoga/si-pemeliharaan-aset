<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Aset;
use CodeIgniter\HTTP\ResponseInterface;

class AsetController extends BaseController
{
    public function index()
    {
        //
        $aset = new Aset();
        $asal = $this->request->getVar('pt');
        return view('admin/aset/index', [
            'title' => 'Aset ' . $asal,
            'asets' => $aset->where('asal', $asal)->findAll()
        ]);
    }

    public function add()
    {
        return view('admin/aset/add', [
            'title' => 'Tambah Aset'
        ]);
    }

    public function insert()
    {
        $validate = $this->validate([
            'nama_aset' => [
                'label' => 'Nama Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'jenis_aset' => [
                'label' => 'Jenis Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'asal' => [
                'label' => 'Asal Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'kondisi' => [
                'label' => 'Kondisi Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ]
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
        $aset = new Aset();
        $aset->insert($this->request->getPost());
        return redirect()->to(base_url('/aset/add'))->with('pesan', 'Aset berhasil ditambahkan!');
    }

    public function update()
    {
        $validate = $this->validate([
            'nama_aset' => [
                'label' => 'Nama Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'jenis_aset' => [
                'label' => 'Jenis Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'asal' => [
                'label' => 'Asal Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'kondisi' => [
                'label' => 'Kondisi Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ]
        ]);
        if (!$validate) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }
        $id_aset = $this->request->getPost('id_aset');
        $aset = new Aset();
        $aset->update($id_aset, $this->request->getPost());
        return redirect()->back()->with('pesan', 'Aset berhasil diubah!');
    }

    public function destroy($id)
    {
        $aset = new Aset();
        $aset->delete($id);
        return redirect()->back()->with('pesan', 'Aset berhasil dihapus!');
    }
}

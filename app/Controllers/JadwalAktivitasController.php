<?php

namespace App\Controllers;

use App\Models\Aset;
use App\Models\JadwalAktivitas;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class JadwalAktivitasController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        $jadwal = new JadwalAktivitas();
        $user   = new User();
        $aset   = new Aset();
        return view('admin/jadwal_aktivitas/index', [
            'title' => 'Lihat Jadwal Aktivitas',
            'jadwals'    => $jadwal->select(['jadwal_aktivitas.*', 'user.nama_user', 'aset.nama_aset'])
                ->join('user', 'jadwal_aktivitas.id_driver=user.id_user')
                ->join('aset', 'jadwal_aktivitas.id_aset=aset.id_aset')
                ->findAll(),
            'drivers'   => $user->where('role', 'Driver')->findAll(),
            'asets'     => $aset->findAll()
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
        $user   = new User();
        $aset   = new Aset();
        return view('admin/jadwal_aktivitas/add', [
            'title' => 'Buat Jadwal Aktivitas Terkini',
            'drivers'   => $user->where('role', 'Driver')->findAll(),
            'asets'     => $aset->findAll()
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
            'tanggal' => [
                'label' => 'Tanggal Jadwal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'id_driver' => [
                'label' => 'Driver',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'id_aset' => [
                'label' => 'Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'aktivitas' => [
                'label' => 'Aktivitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'status' => [
                'label' => 'Status',
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

        $tanggal = $this->convertTo24HourFormat($this->request->getPost('tanggal'));

        $data = [
            'tanggal'   => $tanggal,
            'id_driver' => $this->request->getPost('id_driver'),
            'id_aset' => $this->request->getPost('id_aset'),
            'aktivitas' => $this->request->getPost('aktivitas'),
            'status' => $this->request->getPost('status'),
        ];


        $jadwal = new JadwalAktivitas();
        $jadwal->insert($data);
        return redirect()->to(base_url('/jadwal_aktivitas/add'))->with('pesan', 'Jadwal Aktivitas berhasil dibuat!');
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
        $validate = $this->validate([
            'tanggal' => [
                'label' => 'Tanggal Jadwal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'id_driver' => [
                'label' => 'Driver',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'id_aset' => [
                'label' => 'Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'aktivitas' => [
                'label' => 'Aktivitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'status' => [
                'label' => 'Status',
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
        $tanggal = $this->convertTo24HourFormat($this->request->getPost('tanggal'));
        $data = [
            'tanggal'   => $tanggal,
            'id_driver' => $this->request->getPost('id_driver'),
            'id_aset' => $this->request->getPost('id_aset'),
            'aktivitas' => $this->request->getPost('aktivitas'),
            'status' => $this->request->getPost('status'),
        ];
        $jadwal = new JadwalAktivitas();
        $jadwal->update($id, $data);
        return redirect()->to(base_url('/jadwal_aktivitas'))->with('pesan', 'Jadwal Aktivitas berhasil diedit!');
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

    public function convertTo24HourFormat($timeString)
    {
        list($datePart, $timePart, $formatTime) = explode(' ', $timeString);
        list($hour, $minute, $second) = explode('-', str_replace(':', '-', $timePart));

        $formattedHour = intval($hour);

        if (strpos($formatTime, 'PM') !== false && $formattedHour < 12) {
            $formattedHour += 12;
        }

        $formattedHour = str_pad($formattedHour, 2, '0', STR_PAD_LEFT);

        // return $formattedHour;
        return "{$datePart} {$formattedHour}:{$minute}:{$second}";
    }

    public function lihatJadwal()
    {
        $jadwal = new JadwalAktivitas();
        return view('driver/jadwal_aktivitas/index', [
            'title' => 'Lihat Jadwal Aktivitas Terkini',
            'jadwals'    => $jadwal->select(['jadwal_aktivitas.*', 'user.nama_user', 'aset.nama_aset'])
                ->join('user', 'jadwal_aktivitas.id_driver=user.id_user')
                ->join('aset', 'jadwal_aktivitas.id_aset=aset.id_aset')
                ->where([
                    'jadwal_aktivitas.tanggal >=' => date('Y-m-d H:i:s'),
                    'status'    => 'Diantar'
                ])
                ->findAll(),
        ]);
    }

    public function riwayatAktivitas()
    {
        $jadwal = new JadwalAktivitas();
        return view('driver/jadwal_aktivitas/riwayat_aktivitas', [
            'title' => 'Riwayat Aktivitas',
            'jadwals'    => $jadwal->select(['jadwal_aktivitas.*', 'user.nama_user', 'aset.nama_aset'])
                ->join('user', 'jadwal_aktivitas.id_driver=user.id_user')
                ->join('aset', 'jadwal_aktivitas.id_aset=aset.id_aset')
                ->where([
                    'jadwal_aktivitas.tanggal <' => date('Y-m-d H:i:s'),
                    'status'    => 'Sampai'
                ])
                ->findAll(),
        ]);
    }
}

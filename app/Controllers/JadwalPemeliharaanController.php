<?php

namespace App\Controllers;

use App\Models\Aset;
use App\Models\JadwalPemeliharaan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Dompdf\Dompdf;

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
        $pemeliharaan = new JadwalPemeliharaan();
        $aset = new Aset();
        return view('user_pic/jadwal_pemeliharaan/index', [
            'title' => 'Lihat Jadwal Pemeliharaan Aset',
            'pemeliharaans' => $pemeliharaan->select(['jadwal_pemeliharaan.*', 'aset.nama_aset'])
                ->join('aset', 'jadwal_pemeliharaan.id_aset=aset.id_aset')->findAll(),
            'asets' => $aset->findAll()
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
        $data = [];
        $data = $this->request->getPost();
        $jadwal = new JadwalAktivitasController();
        $data['tanggal'] = $jadwal->convertTo24HourFormat($data['tanggal']);
        $pemeliharaan->insert($data);
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
        $data = [];
        $data = $this->request->getPost();
        $jadwal = new JadwalAktivitasController();
        $data['tanggal'] = $jadwal->convertTo24HourFormat($data['tanggal']);
        $pemeliharaan->update($id, $data);
        return redirect()->to(base_url('/jadwal_pemeliharaan'))->with('pesan', 'Jadwal Pemeliharaan Berhasil Diubah');
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

    public function laporanPemeliharaan()
    {
        $tanggal = $this->request->getVar('tanggal');
        $pemeliharaan = new JadwalPemeliharaan();
        if ($tanggal) {
            list($dari, $sampai) = explode(' - ', $tanggal);
            $jadwal = new JadwalAktivitasController();
            $dari_tanggal = $jadwal->convertTo24HourFormat($dari);
            $sampai_tanggal = $jadwal->convertTo24HourFormat($sampai);
            $pemeliharaan->where('tanggal >=', $dari_tanggal)->where('tanggal <=', $sampai_tanggal);
        }

        return view('laporan/pemeliharaan.php', [
            'title' => 'Laporan Pemeliharaan Aset',
            'pemeliharaans' => $tanggal ? $pemeliharaan->select(['jadwal_pemeliharaan.*', 'aset.*'])
                ->join('aset', 'jadwal_pemeliharaan.id_aset=aset.id_aset')->findAll() : []
        ]);
    }

    public function cetakPemeliharaan()
    {
        $pemeliharaan = new JadwalPemeliharaan();
        $jadwal = new JadwalAktivitasController();
        $tanggal = $this->request->getVar('tanggal');

        list($dari, $sampai) = explode(' - ', $tanggal);
        $dari_tanggal = $jadwal->convertTo24HourFormat($dari);
        $sampai_tanggal = $jadwal->convertTo24HourFormat($sampai);
        $pemeliharaan->where('tanggal >=', $dari_tanggal)
            ->where('tanggal <=', $sampai_tanggal)
            ->select(['jadwal_pemeliharaan.*', 'aset.*'])
            ->join('aset', 'jadwal_pemeliharaan.id_aset=aset.id_aset');

        $filename = 'Laporan_Pemeliharaan-' . date('y-m-d-H-i-s');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('cetak_laporan/pemeliharaan', [
            'title' => 'Cetak Laporan Pemeliharaan Aset',
            'data'  => $pemeliharaan->findAll(),
            'tanggal'   => date('d-m-Y H:i:s', strtotime($dari_tanggal)) . ' - ' . date('d-m-Y H:i:s', strtotime($sampai_tanggal))
        ]));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
        // $dompdf->stream($filename, array("Attachment" => false));

        exit(0);
    }
}

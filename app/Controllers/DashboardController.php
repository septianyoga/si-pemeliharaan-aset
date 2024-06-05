<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Aset;
use App\Models\JadwalAktivitas;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $aset = new Aset();
        $jadwalAktivitas = new JadwalAktivitas();

        // Get data from the model
        $data = $jadwalAktivitas->getDataLast14Days();

        $categories = [];
        $diantarData = [];
        $sampaiData = [];

        foreach ($data as $day) {
            $categories[] = date('m/d/Y', strtotime($day['date'])) . ' GMT';
            $diantarData[] = $day['diantar'];
            $sampaiData[] = $day['sampai'];
        }

        // dd($diantarData);

        return view('admin/dashboard', [
            'title' => 'Dashboard',
            'aset' => [
                'len' => $aset->where('asal', 'PT LEN')->countAllResults(),
                'dahana' => $aset->where('asal', 'PT DAHANA')->countAllResults(),
                'pindad' => $aset->where('asal', 'PT PINDAD')->countAllResults(),
                'pal' => $aset->where('asal', 'PT PAL')->countAllResults(),
                'di' => $aset->where('asal', 'PT DI')->countAllResults(),
            ],
            'chartData' => [
                'categories' => $categories,
                'diantarData' => $diantarData,
                'sampaiData' => $sampaiData
            ]
        ]);
    }
}

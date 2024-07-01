<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKriteria;
use App\Models\DataAlternatif;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;

class DashboardController extends Controller
{
    public function index()
    {

        $jumlahAlternatif = DataAlternatif::count();
        $jumlahKriteria = DataKriteria::count();
        $jumlahSub = DataSubKriteria::count();
        $jumlahPenilaian = DataPenilaian::count();

        // Mengembalikan hasil perhitungan
        return view('dashboard', [
            'jumlahAlternatif' => $jumlahAlternatif,
            'jumlahKriteria' => $jumlahKriteria,
            'jumlahSub' => $jumlahSub,
            'jumlahPenilaian' => $jumlahPenilaian
        ]);
    }
}

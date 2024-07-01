<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKriteria;
use App\Models\DataAlternatif;

class DashboardController extends Controller
{
    public function index()
    {

        $jumlahAlternatif = DataAlternatif::count();
        $jumlahKriteria = DataKriteria::count();

        // Mengembalikan hasil perhitungan
        return view('dashboard', ['jumlahAlternatif' => $jumlahAlternatif, 'jumlahKriteria' => $jumlahKriteria]);
    }
}

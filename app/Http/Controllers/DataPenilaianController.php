<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use Illuminate\Http\Request;

class DataPenilaianController extends Controller
{
    public function index()
    {
        $dataAlternatif = DataAlternatif::orderByDesc('id')->with('penilaian')->paginate(5);
        $dataKriteria = DataKriteria::all();
        return view('data-penilaian/index', ['dataAlternatif' => $dataAlternatif, 'dataKriteria' => $dataKriteria]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_alternatif' => 'required',
            'id_kriteria' => 'required',
            'nilai' => 'required|numeric'
        ]);


        $dataPenilaianCheck = DataPenilaian::where('id_alternatif', $request->id_alternatif)
            ->where('id_kriteria', $request->id_kriteria)
            ->first();

        if ($dataPenilaianCheck) {
            return back()->withErrors(['kombinasi' => 'Penilaian dengan alternatif dan kriteria yang sama sudah ada.'])->withInput();
        }

        $dataPenilaian = new DataPenilaian();
        $dataPenilaian->create($validate);
        return redirect()->route('data-penilaian-index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_kriteria' => 'required',
            'nama' => 'required|min:3',
            'bobot' => 'required|numeric'
        ]);

        $dataPenilaian = DataPenilaian::findOrFail($id);

        $dataPenilaian->update($validate);

        return redirect()->route('data-penilaian-index')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $dataPenilaian = DataPenilaian::findOrFail($id);
        $dataPenilaian->delete();

        return redirect()->route('data-penilaian-index')->with('success', 'Data berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\DataPenilaian;
use App\Models\DataSubKriteria;
use Illuminate\Http\Request;

class DataKriteriaController extends Controller
{
    public function index()
    {
        $data = DataKriteria::orderByDesc('id')->paginate(10);
        return view('data-kriteria/index', ['dataKriteria' => $data]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|min:3',
            'jenis' => 'required',
            'satuan' => 'required'

        ]);

        $dataKriteria = new DataKriteria();
        $dataKriteria->create($validate);
        return redirect()->route('data-kriteria-index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|min:3',
            'jenis' => 'required',
            'satuan' => 'required'

        ]);

        $dataKriteria = DataKriteria::findOrFail($id);

        $dataKriteria->update($validate);

        return redirect()->route('data-kriteria-index')->with('success', 'Data berhasil diperbarui');
    }


    public function delete($id)
    {
        $dataPenilaian = DataPenilaian::where('id_kriteria', $id)->first();

        if ($dataPenilaian) {
            return back()->withErrors(['kombinasi' => 'Data Kriteria Digunakan Dalam Tabel Penilaian. Hapus Data Pada Tabel Penilaian Terlebih Dahulu'])->withInput();
        }

        $dataSub = DataSubKriteria::where('id_kriteria', $id)->first();

        if ($dataSub) {
            return back()->withErrors(['kombinasi' => 'Data Kriteria Digunakan Dalam Tabel Sub Kriteria. Hapus Data Pada Tabel Kriteria Terlebih Dahulu'])->withInput();
        }

        $dataKriteria = DataKriteria::findOrFail($id);
        $dataKriteria->delete();

        return redirect()->route('data-kriteria-index')->with('success', 'Data berhasil Dihapus');
    }
}

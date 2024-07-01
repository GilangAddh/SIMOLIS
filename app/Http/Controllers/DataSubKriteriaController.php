<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\DataSubKriteria;
use Illuminate\Http\Request;

class DataSubKriteriaController extends Controller
{
    public function index()
    {
        $dataKriteria = DataKriteria::with('subkriteria')->get();
        $dataSub = DataSubKriteria::all();
        return view('data-sub-kriteria/index', ['dataKriteria' => $dataKriteria, 'dataSub' => $dataSub]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_kriteria' => 'required',
            'nama' => 'required|min:3',
            'bobot' => 'required|numeric'
        ]);


        $dataSubKriteria = new DataSubKriteria();
        $dataSubKriteria->create($validate);
        return redirect()->route('data-sub-index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_kriteria' => 'required',
            'nama' => 'required|min:3',
            'bobot' => 'required|numeric'
        ]);

        $dataSubKriteria = DataSubKriteria::findOrFail($id);

        $dataSubKriteria->update($validate);

        return redirect()->route('data-sub-index')->with('success', 'Data berhasil diperbarui');
    }


    public function delete($id)
    {
        $dataSubKriteria = DataSubKriteria::findOrFail($id);
        $dataSubKriteria->delete();

        return redirect()->route('data-sub-index')->with('success', 'Data berhasil Dihapus');
    }
}

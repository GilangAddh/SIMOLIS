<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\DataPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataAlternatifController extends Controller
{
    public function index()
    {
        $data = DataAlternatif::orderByDesc('id')->paginate(10);
        return view('data-alternatif/index', ['dataAlternatif' => $data]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|min:6',
            'gambar' => 'required|file|mimes:jpeg,png,jpg,gif|max:4096'
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            $validate['gambar'] = $imageName;
        }

        $dataAlternatif = new DataAlternatif();
        $dataAlternatif->create($validate);
        return redirect()->route('data-alternatif-index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|min:6',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:4096'
        ]);

        $dataAlternatif = DataAlternatif::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            if ($dataAlternatif->gambar) {
                Storage::delete('public/images/' . $dataAlternatif->gambar);
            }

            $validate['gambar'] = $imageName;
        } else {
            $validate['gambar'] = $dataAlternatif->gambar;
        }

        $dataAlternatif->update($validate);

        return redirect()->route('data-alternatif-index')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $dataPenilaian = DataPenilaian::where('id_alternatif', $id)->first();

        if ($dataPenilaian) {
            return back()->withErrors(['kombinasi' => 'Data Alternatif Digunakan Dalam Tabel Penilaian. Hapus Data Pada Tabel Penilaian Terlebih Dahulu'])->withInput();
        }

        $dataAlternatif = DataAlternatif::findOrFail($id);
        Storage::delete('public/images/' . $dataAlternatif->gambar);
        $dataAlternatif->delete();

        return redirect()->route('data-alternatif-index')->with('success', 'Data berhasil Dihapus');
    }
}

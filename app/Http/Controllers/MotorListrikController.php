<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use Illuminate\Http\Request;
use App\Models\DataPenilaian;
use Illuminate\Support\Facades\DB;
use App\Models\DataAlternatif;

class MotorListrikController extends Controller
{
    public function index()
    {
        $sample = DataAlternatif::inRandomOrder()->limit(6)->get();
        $ids = $sample->pluck('id')->toArray();
        $penilaian = DataPenilaian::whereIn('id_alternatif', $ids)->orderBy('id_alternatif', 'asc')->orderBy('id_kriteria', 'asc')->get();
        $grouped_data = collect($penilaian)->groupBy('id_alternatif');

        $kriteria = DataKriteria::with(['subkriteria' => function ($query) {
            $query->orderBy('bobot', 'asc');
        }])->orderBy('id', 'asc')->get();

        return view('index', ['kriteria' => $kriteria, 'sample' => $grouped_data]);
    }
    public function getAll()
    {
        $molis = DataAlternatif::paginate(12);
        $ids = $molis->pluck('id')->toArray();
        $penilaian = DataPenilaian::whereIn('id_alternatif', $ids)->orderBy('id_alternatif', 'asc')->orderBy('id_kriteria', 'asc')->get();
        $grouped_data = collect($penilaian)->groupBy('id_alternatif');
        return view('/motor-listrik/index', ['molis' => $molis, 'grouped_data' => $grouped_data]);
    }

    public function getNormalizedScores(Request $request)
    {
        //ambil nilai post dan keluarkan token dan method
        $nilaiKriteria = $request->all();
        if (isset($nilaiKriteria['_token'])) {
            unset($nilaiKriteria['_token']);
        }
        if (isset($nilaiKriteria['_method'])) {
            unset($nilaiKriteria['_method']);
        }

        //hitung total bobot
        $total = array_sum($nilaiKriteria);

        //ambil key dari array nilai kriteria
        $kriteria_post = array_keys($nilaiKriteria);

        //ambil data tabel penilaian yang dinormalisasi
        $results = DB::table('data_penilaian')
            ->select(
                'data_penilaian.id',
                'data_penilaian.id_alternatif',
                'data_penilaian.id_kriteria',
                'data_penilaian.nilai',
                'data_alternatif.nama AS nama_alternatif',
                'data_kriteria.nama AS nama_kriteria',
                DB::raw("CASE
                    WHEN data_kriteria.jenis = 'Cost' THEN
                    ROUND((max_values.nilai_maksimal_kriteria - data_penilaian.nilai) / (max_values.nilai_maksimal_kriteria - max_values.nilai_minimal_kriteria), 5)
                    WHEN data_kriteria.jenis = 'Benefit' THEN
                    ROUND((data_penilaian.nilai - max_values.nilai_minimal_kriteria) / (max_values.nilai_maksimal_kriteria - max_values.nilai_minimal_kriteria), 5)
                    ELSE
                        NULL
                END AS nilai_ternormalisasi")
            )
            ->join('data_alternatif', 'data_penilaian.id_alternatif', '=', 'data_alternatif.id')
            ->join('data_kriteria', 'data_penilaian.id_kriteria', '=', 'data_kriteria.id')
            ->join(
                DB::raw('(SELECT id_kriteria, MIN(nilai) AS nilai_minimal_kriteria, MAX(nilai) AS nilai_maksimal_kriteria FROM data_penilaian GROUP BY id_kriteria) AS max_values'),
                'data_penilaian.id_kriteria',
                '=',
                'max_values.id_kriteria'
            )
            ->get();

        for ($i = 0; $i < count($results); $i++) {
            for ($j = 0; $j < count($kriteria_post); $j++) {
                if ($results[$i]->nama_kriteria == $kriteria_post[$j]) {
                    $results[$i]->nilai_pembobot = round($results[$i]->nilai_ternormalisasi * $nilaiKriteria[$results[$i]->nama_kriteria] / $total, 5);
                }
            }
        }

        $data = json_decode($results, true);

        $hasil = collect($data);

        // Kelompokkan data berdasarkan 'id_alternatif'
        $grouped = $hasil->groupBy('id_alternatif');

        // Hitung total 'nilai_pembobot' untuk setiap kelompok
        $summed = $grouped->map(function ($items) {
            return [
                'id_alternatif' => $items[0]['id_alternatif'],
                'nama_alternatif' => $items[0]['nama_alternatif'],
                'total' => round($items->sum('nilai_pembobot'), 5),
                //'details' => $items
            ];
        });

        // $sorted = $summed->sortByDesc('total');
        $arrayForSorting = $summed->toArray();

        // Fungsi untuk mengurutkan secara kustom berdasarkan total_nilai_pembobot
        usort($arrayForSorting, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });

        // Konversi kembali ke koleksi
        $sorted = collect($arrayForSorting);

        $rekomendasi = [];

        for ($i = 0; $i < 5; $i++) {
            if (isset($sorted[$i]['id_alternatif'])) {
                $rekomendasi[] = $this->getDataRekom($sorted[$i]['id_alternatif']);
            }
        }

        // // return response()->json($dataRekom);
        return view('/rekomendasi/index', [
            "score" => $sorted,
            "dataRekomendasi" => $rekomendasi
        ]);
    }

    public function getDataRekom($id_alternatif)
    {
        $data = DataPenilaian::where('id_alternatif', $id_alternatif)->orderby('id_kriteria')->get();

        return $data;
    }
}

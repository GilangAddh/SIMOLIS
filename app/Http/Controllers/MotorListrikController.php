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

    public function tes(Request $request)
    {
        $raw = $request->all();

        if (isset($raw['_token'])) {
            unset($raw['_token']);
        }

        // print_r($request->all());
        return response()->json($request->all());
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

        //cek array
        //print_r($nilaiKriteria);

        //hitung total bobot
        $total = array_sum($nilaiKriteria);

        //ambil key dari array nilai kriteria
        $kriteria_post = array_keys($nilaiKriteria);

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
                    ROUND((nilai_maksimal_kriteria - nilai) / (nilai_maksimal_kriteria - nilai_minimal_kriteria)::decimal, 5)
                    WHEN data_kriteria.jenis = 'Benefit' THEN
                    ROUND((nilai - nilai_minimal_kriteria)/(nilai_maksimal_kriteria - nilai_minimal_kriteria)::decimal, 5)
                    
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

        // tes hasil result
        //print_r($results[2]);

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



        $rekomendasi = $sorted->first();
        $alternatif1 = $sorted->skip(1)->first();
        $alternatif2 = $sorted->skip(2)->first();


        $dataRekom = $this->getDataRekom($rekomendasi['id_alternatif']);
        $dataAlter1 = $this->getDataRekom($alternatif1['id_alternatif']);
        $dataAlter2 = $this->getDataRekom($alternatif2['id_alternatif']);

        // return response()->json($dataRekom);
        return view('/rekomendasi/index', [
            "rekomendasi" => $dataRekom,
            "alternatif1" => $dataAlter1,
            "alternatif2" => $dataAlter2
        ]);
    }

    public function getDataRekom($id_alternatif)
    {
        $data = DataPenilaian::where('id_alternatif', $id_alternatif)->get();

        return $data;
    }
}

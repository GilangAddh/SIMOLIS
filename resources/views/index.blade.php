@extends('layouts/userPage')
@section('navbar')
    <ul id="navbarItems"
        class="md:flex md:items-center z-[1] md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-200 text-white bg-[#436850]">
        <li class="mx-4 my-6 md:my-0"><a href="#spesifikasi"
                class="text-xl hover:text-yellow-200 hover:underline duration-100"><i class="fa-solid fa-circle-info"></i>
                Spesifikasi</a></li>
        <li class="mx-4 my-6 md:my-0"><a href="#rekomendasi"
                class="text-xl hover:text-yellow-200 hover:underline duration-100"><i class="fa-solid fa-gear"></i>
                Rekomendasi</a></li>
        <li class="mx-4 my-6 md:my-0"><a href="#motor-listrik"
                class="text-xl hover:text-yellow-200 hover:underline duration-100"><i class="fa-solid fa-list"></i> Daftar
                Molis</a></li>
    </ul>
@endsection
@section('hero')
    <div class="hero min-h-[75vh] lg:min-h-screen" style="background-image: url('/storage/images/hero.jpg');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md lg:max-w-2xl xl:max-w-4xl">
                <h1 class="mb-5 text-3xl md:text-4xl lg:text-5xl font-bold">Ayo Beralih ke Motor Listrik</h1>
                <p class="mb-5 sm:text-[18px] lg:text-[20px] xl:text-[22px]">Tingkatkan kualitas udara dan kurangi
                    ketergantungan pada
                    bahan bakar fosil
                    dengan beralih
                    ke sepeda motor listrik. Pemerintah mengajak seluruh masyarakat untuk mendukung inisiatif ini demi
                    lingkungan yang lebih bersih dan hemat energi. Bersama-sama, kita bisa menciptakan perubahan positif
                    bagi bumi kita. Ayo, dapatkan rekomendasi motor listrik anda disini!</p>
                <a href="#rekomendasi"
                    class="btn bg-[#436850] border-[#436850] text-white lg:text-[16px] hover:border-[#436850] hover:text-[#436850] hover:font-bold hover:bg-white">Rekomendasi</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="spesifikasi" class="container-fluid xl:container xl:mx-auto my-4 bg-white rounded-lg">
        <div class="p-6">
            <h1 class="font-bold text-2xl">Apa Saja Spesifikasi Motor Listrik?</h1>
            <div class="p-4 bg-base-200 rounded-xl my-3">
                <div class="md:p-2 md:flex items-top 2xl:justify-around">
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px] px-4">
                        <h2 class="text-xl font-bold">Harga</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Mahal</strong>: Harga lebih dari 26 juta.</li>
                            <li><strong>Mahal</strong>: Harga antara 22 juta hingga 26 juta.</li>
                            <li><strong>Sedang</strong>: Harga antara 18 juta hingga 22 juta.</li>
                            <li><strong>Murah</strong>: Harga antara 14 juta hingga 18 juta.</li>
                            <li><strong>Sangat Murah</strong>: Harga kurang dari 14 juta.</li>
                            <li><strong>Tidak dipilih</strong>: Harga tidak menjadi faktor pertimbangan dalam pemilihan
                                motor.</li>
                        </ul>
                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px]  px-4">
                        <h2 class="text-xl font-bold">Kecepatan Maksimal</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Cepat</strong>: Kecepatan maksimal lebih dari 80 km/h.</li>
                            <li><strong>Cepat</strong>: Kecepatan antara 80 km/h sampai 65 km/h.</li>
                            <li><strong>Sedang</strong>: Kecepatan antara 65 km/h sampai 50 km/h.</li>
                            <li><strong>Pelan</strong>: Kecepatan antara 50 km/h sampai 40 km/h.</li>
                            <li><strong>Tidak Dipilih</strong>: Kecepatan maksimal tidak menjadi faktor pertimbangan dalam
                                pemilihan.</li>
                        </ul>
                    </div>
                </div>
                <div class="md:p-2 md:flex items-top 2xl:justify-around">
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px]  px-4">
                        <h2 class="text-xl font-bold">Jarak Tempuh</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Jauh</strong>:Jarak tempuh lebih dari 100 km.
                            </li>
                            <li><strong>Jauh</strong>: Jarak tempuh antara 80 km sampai 100 km.</li>
                            <li><strong>Sedang</strong>: Jarak tempuh antara 60 km sampai 80 km.</li>
                            <li><strong>Dekat</strong>: Jarak tempuh di bawah 60 km.</li>
                            <li><strong>Tidak Dipilih</strong>: Jarak tempuh tidak menjadi faktor pertimbangan dalam
                                pemilihan.</li>
                        </ul>

                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px]  px-4">
                        <h2 class="text-xl font-bold">Daya Dinamo</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Besar</strong>: Daya lebih dari 2500 watt.</li>
                            <li><strong>Besar</strong>: Daya antara 2000 hingga 2500 watt.</li>
                            <li><strong>Sedang</strong>: Daya antara 1500 hingga 2000 watt.</li>
                            <li><strong>Kecil</strong>: Daya antara 1000 hingga 1500 watt.</li>
                            <li><strong>Sangat Kecil</strong>: Daya kurang dari 1000 watt.</li>
                            <li><strong>Tidak Dipilih</strong>: Daya dinamo tidak menjadi faktor pertimbangan dalam
                                pemilihan.</li>
                        </ul>

                    </div>
                </div>
                <div class="md:p-2 md:flex items-top 2xl:justify-around">
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px] px-4">
                        <h2 class="text-xl font-bold">Kapasitas Baterai</h2>
                        <p class="text-justify xl:text-[18px]">
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Besar</strong>: Kapasitas lebih dari 2000 watt/jam (Wh).</li>
                            <li><strong>Besar</strong>: Kapasitas antara 1500 hingga 2000 watt/jam (Wh).</li>
                            <li><strong>Sedang</strong>: Kapasitas antara 1000 hingga 1500 watt/jam (Wh).</li>
                            <li><strong>Kecil</strong>: Kapasitas antara 500 hingga 1000 watt/jam (Wh).</li>
                            <li><strong>Sangat Kecil</strong>: Kapasitas kurang dari 500 watt/jam (Wh).</li>
                            <li><strong>Tidak Dipilih</strong>: Kapasitas baterai tidak menjadi pertimbangan dalam
                                pemilihan.</li>
                        </ul>
                        </p>
                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px] px-4">
                        <h2 class="text-xl font-bold">Lama Waktu Pengisian</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Cepat</strong>: Waktu pengisian kurang dari 1 jam.</li>
                            <li><strong>Cepat</strong>: Waktu pengisian antara 1 hingga 2 jam.</li>
                            <li><strong>Sedang</strong>: Waktu pengisian antara 2 hingga 4 jam.</li>
                            <li><strong>Lambat</strong>: Waktu pengisian antara 4 hingga 6 jam.</li>
                            <li><strong>Sangat Lambat</strong>: Waktu pengisian lebih dari 6 jam.</li>
                            <li><strong>Tidak Dipilih</strong>: Lama pengisian tidak menjadi pertimbangan dalam pemilihan.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:p-2 md:flex items-top 2xl:justify-around">
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px]  px-4">
                        <h2 class="text-xl font-bold">Daya Angkut</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Sangat Besar</strong>: Daya angkut lebih dari 200 kg.</li>
                            <li><strong>Besar</strong>: Daya angkut antara 150 hingga 200 kg.</li>
                            <li><strong>Sedang</strong>: Daya angkut antara 100 hingga 150 kg.</li>
                            <li><strong>Kecil</strong>: Daya angkut di bawah 100 kg.</li>
                            <li><strong>Tidak Dipilih</strong>: Daya angkut tidak menjadi pertimbangan dalam pemilihan.</li>
                        </ul>

                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%] 2xl:w-[700px] px-4">
                        <h2 class="text-xl font-bold">Garansi Baterai</h2>
                        <ul class="pl-5 xl:text-[18px] list-disc">
                            <li><strong>Jangka Pendek</strong>: Garansi kurang dari 6 bulan.</li>
                            <li><strong>Standar</strong>: Garansi antara 6 bulan sampai 12 bulan.</li>
                            <li><strong>Jangka Panjang</strong>: Garansi lebih dari 12 bulan.</li>
                            <li><strong>Tidak Dipilih</strong>: Garansi tidak menjadi pertimbangan dalam pemilihan.</li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="rekomendasi" class="container-fluid xl:container xl:mx-auto my-4  bg-white rounded-lg">
        <div class="p-6">
            <h1 class="font-bold text-2xl">Rekomendasi Motor Listrik</h1>
            <form action="{{ route('rekomendasi-molis') }}" method="POST">
                <div class="my-2">
                    <p class="text-red-600"><i>*Seluruh input wajib di isi</i></p>
                </div>
                @csrf
                @method('post')
                <div class="p-4 bg-base-200 rounded-xl my-3 md:flex flex-wrap justify-center items-center gap-5">
                    @foreach ($kriteria as $kriteria)
                        <div class="w-[100%] md:w-[360px]">
                            <label for="{{ $kriteria->nama }}"
                                class="font-bold lg:text-[20px]">{{ str_replace('_', ' ', $kriteria->nama) }}</label>
                            <div>
                                <select class="select select-bordered w-full lg:text-[18px]" name="{{ $kriteria->nama }}"
                                    id="{{ $kriteria->nama }}" required>
                                    <option value="" selected disabled class="lg:text-[18px]">Pilih
                                        Subkriteria
                                    </option>
                                    @foreach ($kriteria->subkriteria as $subkriteria)
                                        <option value="{{ $subkriteria->bobot }}" class="lg:text-[18px]">
                                            {{ $subkriteria->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button
                    class="btn bg-[#436850] border-[#436850] text-white lg:text-[16px] hover:border-[#436850] hover:text-[#436850] hover:font-bold hover:bg-white">Cek
                    Rekomendasi</button>
            </form>

        </div>

    </section>
    <section id="motor-listrik" class="container-fluid xl:container xl:mx-auto my-4 bg-white rounded-lg">
        <div class="p-6">
            <div class="flex justify-between">
                <h1 class="font-bold text-2xl">Daftar Motor Listrik</h1>
                <a href="{{ route('daftar-molis') }}" class="text-blue-700 font-bold lg:text-[16px] underline">Lihat
                    Selengkapnya</a>
            </div>

            <div class="p-4 bg-base-200 rounded-xl my-3 flex flex-wrap justify-center gap-4">
                @foreach ($sample as $no => $item)
                    <div class="card w-80 glass">
                        <figure class="h-3/5"><img src="{{ asset('storage/images/' . $item[0]['alternatif']['gambar']) }}"
                                alt="" class="max-h-[250px] w-full sm:max-h-[300px] " />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $item[0]['alternatif']['nama'] }}</h2>
                            <div class="card-actions justify-end">
                                <button class="btn bg-[#FDDE55] text-[16px] text-gray-600 font-[Poppins]"
                                    onclick="my_modal_{{ $item[0]['id_alternatif'] }}.showModal()"><i
                                        class="fa-solid fa-circle-info"></i>
                                    Detail</button>
                            </div>
                        </div>
                    </div>
                    <dialog id="my_modal_{{ $item[0]['id_alternatif'] }}" class="modal modal-bottom sm:modal-middle">

                        <div class="modal-box p-0">
                            <div class="p-4  bg-[#FDDE55] text-gray-600">
                                <h3 class="font-bold text-lg text-[22px]">{{ $item[0]['alternatif']['nama'] }}
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="flex gap-6 mb-4">
                                    <table class="table table-zebra">
                                        @foreach ($item as $data)
                                            <tr>
                                                <th class="lg:text-[16px]">
                                                    {{ str_replace('_', ' ', $data->kriteria->nama) }}</th>
                                                </th>
                                                <td class="lg:text-[16px]">
                                                    {{ number_format($data->nilai, 0, ',', '.') }}
                                                    {{ $data->kriteria->satuan }}
                                        @endforeach
                                    </table>
                                </div>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                @endforeach

            </div>
        </div>
    </section>
@endsection

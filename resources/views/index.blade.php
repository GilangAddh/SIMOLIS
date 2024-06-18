@extends('layouts/userPage')
@section('navbar')
    <ul id="navbarItems"
        class="md:flex md:items-center z-[1] md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-200 text-white bg-[#436850]">
        <li class="mx-4 my-6 md:my-0"><a href="#spesifikasi"
                class="text-xl hover:text-[#BFF6C3] hover:underline duration-100"><i class="fa-solid fa-circle-info"></i>
                Spesifikasi</a></li>
        <li class="mx-4 my-6 md:my-0"><a href="#rekomendasi"
                class="text-xl hover:text-[#BFF6C3] hover:underline duration-100"><i class="fa-solid fa-gear"></i>
                Rekomendasi</a></li>
        <li class="mx-4 my-6 md:my-0"><a href="#motor-listrik"
                class="text-xl hover:text-[#BFF6C3] hover:underline duration-100"><i class="fa-solid fa-list"></i> Daftar
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
                <div class="md:p-2 md:flex items-top">
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Harga</h2>
                        <p class="text-justify xl:text-[18px]">Harga adalah kriteria yang sangat penting dalam keputusan
                            pembelian motor listrik, karena mempengaruhi secara signifikan ketersediaan dan fitur yang dapat
                            dimiliki. Dalam sistem ini, kriteria harga dibagi menjadi enam poin untuk memudahkan pemilihan.
                            Motor listrik dikategorikan sebagai Sangat Mahal jika harganya lebih dari 26 juta, Mahal untuk
                            rentang harga antara 22 juta hingga 26 juta, Sedang untuk harga antara 18 juta hingga 22 juta,
                            Murah untuk rentang harga 14 juta hingga 18 juta, Sangat Murah untuk motor dengan harga kurang
                            dari 14 juta, dan Tidak dipilih jika harga tidak menjadi faktor pertimbangan dalam pemilihan
                            motor.</p>
                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Kecepatan Maksimal</h2>
                        <p class="text-justify xl:text-[18px]">Kecepatan maksimal pada motor listrik adalah titik tertinggi
                            dari kecepatan yang dapat dicapai oleh motor tersebut. Dalam sistem ini, kecepatan maksimal
                            dibagi menjadi lima poin untuk memudahkan penilaian. Motor listrik dianggap Sangat Cepat jika
                            kecepatan maksimalnya lebih dari 80 km/h, Cepat untuk kecepatan antara 80 km/h sampai 65 km/h,
                            Sedang untuk kecepatan antara 65 km/h sampai 50 km/h, Pelan untuk kecepatan antara 50 km/h
                            sampai 40 km/h, dan Tidak Dipilih jika kecepatan maksimal tidak menjadi faktor pertimbangan
                            dalam pemilihan.

                        </p>
                    </div>
                </div>
                <div class="md:p-2 md:flex items-top">
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Jarak Tempuh</h2>
                        <p class="text-justify xl:text-[18px]">Jarak tempuh pada motor listrik adalah ukuran kemampuan motor
                            untuk melakukan perjalanan dalam satu kali pengisian daya. Dalam sistem ini, jarak tempuh dibagi
                            menjadi lima poin untuk mempermudah evaluasi. Motor listrik dikategorikan sebagai Sangat Jauh
                            jika mampu menempuh lebih dari 100 km dalam satu pengisian daya, Jauh untuk jarak tempuh antara
                            80 km sampai 100 km, Sedang untuk jarak tempuh antara 60 km sampai 80 km, Dekat untuk jarak
                            tempuh di bawah 60 km, dan Tidak Dipilih jika jarak tempuh tidak menjadi faktor pertimbangan
                            dalam pemilihan.</p>
                    </div>

                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Daya Dinamo</h2>
                        <p class="text-justify xl:text-[18px]">Daya dinamo pada motor listrik adalah ukuran tenaga yang
                            dihasilkan untuk menggerakkan motor tersebut. Dalam sistem ini, daya dinamo dibagi menjadi enam
                            poin untuk mempermudah evaluasi. Motor listrik diklasifikasikan sebagai sangat besar jika
                            memiliki daya lebih dari 2500 watt, besar untuk daya antara 2000 hingga 2500 watt, sedang untuk
                            daya antara 1500 hingga 2000 watt, kecil untuk daya antara 1000 hingga 1500 watt, sangat kecil
                            untuk daya di bawah 1000 watt, dan Tidak Dipilih jika daya dinamo tidak menjadi faktor
                            pertimbangan.</p>
                    </div>
                </div>
                <div class="md:p-2 md:flex items-center">
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Kapasitas Baterai</h2>
                        <p class="text-justify xl:text-[18px]">Kapasitas baterai adalah ukuran energi yang dapat disimpan
                            dan disuplai oleh
                            baterai untuk
                            menggerakkan motor listrik. Pada sistem ini, kapasitas baterai dibagi menjadi enam kategori,
                            yaitu sangat besar untuk kapasitas lebih dari 2000 watt-jam (Wh), besar untuk kapasitas antara
                            1500 hingga 2000 watt-jam (Wh), sedang untuk kapasitas antara 1000 hingga 1500 watt-jam (Wh),
                            kecil untuk kapasitas antara 500 hingga 1000 watt-jam (Wh), sangat kecil untuk kapasitas di
                            bawah 500 watt-jam (Wh), dan tidak dipilih jika kapasitas baterai tidak menjadi pertimbangan
                            dalam pemilihan.</p>
                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Lama Charging</h2>
                        <p class="text-justify xl:text-[18px]">Lama pengisian (charging) adalah waktu yang dibutuhkan untuk
                            mengisi daya
                            baterai hingga penuh. Pada sistem ini, lama pengisian baterai dibagi menjadi enam kategori,
                            yaitu sangat cepat untuk waktu pengisian kurang dari 1 jam, cepat untuk waktu pengisian antara 1
                            hingga 2 jam, sedang untuk waktu pengisian antara 2 hingga 4 jam, lambat untuk waktu pengisian
                            antara 4 hingga 6 jam, sangat lambat untuk waktu pengisian lebih dari 6 jam, dan tidak dipilih
                            jika lama pengisian tidak menjadi pertimbangan dalam pemilihan.</p>
                    </div>
                </div>
                <div class="md:p-2 md:flex items-center">
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Daya Angkut</h2>
                        <p class="text-justify xl:text-[18px]">Daya angkut adalah kapasitas maksimum beban yang dapat
                            diangkut oleh motor
                            listrik atau kendaraan yang menggunakan motor tersebut. Pada sistem ini, daya angkut dibagi
                            menjadi lima kategori, yaitu sangat besar untuk daya angkut lebih dari 200 kg, besar untuk daya
                            angkut antara 150 hingga 200 kg, sedang untuk daya angkut antara 100 hingga 150 kg, kecil untuk
                            daya angkut dibawah 100 kg dan tidak dipilih jika daya angkut tidak menjadi pertimbangan dalam
                            pemilihan.</p>
                    </div>
                    <div class="my-4 md:my2 md:max-w-[50%]  px-4">
                        <h2 class="text-lg font-bold">Garansi</h2>
                        <p class="text-justify xl:text-[18px]">Garansi adalah jaminan yang diberikan oleh produsen atau
                            penjual terhadap
                            kualitas dan kinerja motor listrik atau komponen terkait selama periode tertentu. Pada sistem
                            ini garansi yang menjadi tolak ukur adalah garansi baterai. Garansi dibagi menjadi empat
                            kategori, yaitu jangka pendek untuk garansi kurang dari 6 bulan, standar untuk garansi antara 6
                            bulan sampai 12 bulan, jangka panjang untuk garansi lebih dari 12 bulan, dan tidak dipilih jika
                            garansi tidak menjadi pertimbangan dalam pemilihan.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="rekomendasi" class="container-fluid xl:container xl:mx-auto my-4  bg-white rounded-lg">
        <div class="p-6">
            <h1 class="font-bold text-2xl">Rekomendasi Motor Listrik</h1>
            <form action="{{ route('rekomendasi-molis') }}" method="POST">
                @csrf
                @method('post')
                <div class="p-4 bg-base-200 rounded-xl my-3 md:flex flex-wrap justify-center items-center gap-5">
                    @foreach ($kriteria as $kriteria)
                        <div class="w-[100%] md:w-[360px]">
                            <label for="{{ $kriteria->nama }}"
                                class="font-bold lg:text-[20px]">{{ str_replace('_', ' ', $kriteria->nama) }}</label>
                            <div>
                                <select class="select select-bordered w-full lg:text-[18px]" name="{{ $kriteria->nama }}"
                                    id="{{ $kriteria->nama }}">
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

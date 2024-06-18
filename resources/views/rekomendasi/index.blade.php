@extends('layouts/userPage')
@section('navbar')
    <ul id="navbarItems"
        class="md:flex md:items-center z-[1] md:z-auto md:static absolute bg-[#436850] w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-200 text-white">
        <li class="mx-4 my-6 md:my-0"><a href="{{ route('index-page') }}#spesifikasi"
                class="text-xl duration-500 hover:text-[#BFF6C3] hover:underline"><i class="fa-solid fa-circle-info"></i>
                Spesifikasi</a></li>
        <li class="mx-4 my-6 md:my-0"><a href="{{ route('index-page') }}#rekomendasi"
                class="text-xl hover:text-[#BFF6C3] duration-500 hover:underline"><i class="fa-solid fa-gear"></i>
                Rekomendasi</a>
        </li>
        <li class="mx-4 my-6 md:my-0"><a href="{{ route('index-page') }}#motor-listrik"
                class="text-xl hover:text-[#BFF6C3] duration-500 hover:underline"><i class="fa-solid fa-list"></i> Daftar
                Molis</a></li>
    </ul>
@endsection
@section('content')
    <section id="motor-listrik" class="container-fluid xl:container xl:mx-auto my-4 bg-white rounded-lg">
        <div class="p-6 container-fluid">
            <div class="flex justify-between">
                <h1 class="font-bold text-3xl">Rekomendasi Motor Listrik</h1>
            </div>
            <div class="container-fluid my-4">
                <div class="flex justify-around flex-col sm:flex-row md:gap-5">
                    <img src="{{ asset('storage/images/' . $rekomendasi[0]->alternatif->gambar) }}" alt="motor listrik"
                        class="img-thumbnail md:w-[40%] lg:max-w-[400px] h-auto">
                    <div class="w-full md:w-1/2">
                        <h2 class="font-bold text-2xl my-2">{{ $rekomendasi[0]->alternatif->nama }}</h2>
                        <div class="flex flex-wrap justify-between align-items-center">
                            <table class="table table-zebra">
                                @foreach ($rekomendasi as $item)
                                    <tr>
                                        <th class="md:text-[16px] lg:text-[18px]">
                                            {{ str_replace('_', ' ', $item->kriteria->nama) }}</th>
                                        <td class="md:text-[16px] lg:text-[18px]">
                                            {{ number_format($item->nilai, 0, ',', '.') }}
                                            {{ $item->kriteria->satuan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="motor-listrik" class="container-fluid xl:container xl:mx-auto my-4 bg-white rounded-lg">
        <div class="p-6 container-fluid">
            <div class="flex justify-between">
                <h1 class="font-bold text-3xl">Rekomendasi Alternatif</h1>
            </div>
            <div class="container-fluid my-4 xl:flex xl:justify-around">
                <div class="flex justify-around flex-col sm:flex-row md:gap-5 items-center">
                    <img src="{{ asset('storage/images/' . $alternatif1[0]->alternatif->gambar) }}" alt="motor listrik"
                        class="img-thumbnail md:w-[40%] lg:max-w-[300px] h-auto">
                    <div class="w-full md:w-1/2">
                        <h2 class="font-bold text-2xl my-2">{{ $alternatif1[0]->alternatif->nama }}</h2>
                        <div class="flex flex-wrap justify-between align-items-center">
                            <table class="table table-zebra">
                                @foreach ($alternatif1 as $item)
                                    <tr>
                                        <th class="lg:text-[16px] ">
                                            {{ str_replace('_', ' ', $item->kriteria->nama) }}
                                        </th>
                                        <td class="lg:text-[16px]">{{ number_format($item->nilai, 0, ',', '.') }}
                                            {{ $item->kriteria->satuan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex justify-around flex-col sm:flex-row md:gap-5 items-center">
                    <img src="{{ asset('storage/images/' . $alternatif2[0]->alternatif->gambar) }}" alt="motor listrik"
                        class="img-thumbnail md:w-[40%] lg:max-w-[300px] h-auto">
                    <div class="w-full md:w-1/2">
                        <h2 class="font-bold text-2xl my-2">{{ $alternatif2[0]->alternatif->nama }}</h2>
                        <div class="flex flex-wrap justify-between align-items-center">
                            <table class="table table-zebra">
                                @foreach ($alternatif2 as $item)
                                    <tr>
                                        <th class="lg:text-[16px]">
                                            {{ str_replace('_', ' ', $item->kriteria->nama) }}
                                        </th>
                                        <td class="lg:text-[16px]">{{ number_format($item->nilai, 0, ',', '.') }}
                                            {{ $item->kriteria->satuan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

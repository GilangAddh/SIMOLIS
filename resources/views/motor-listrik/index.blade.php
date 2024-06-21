@extends('layouts/userPage')
@section('navbar')
    <ul id="navbarItems"
        class="md:flex md:items-center z-[1] md:z-auto md:static absolute bg-[#436850] w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-200 text-white">
        <li class="mx-4 my-6 md:my-0"><a href="{{ route('index-page') }}#spesifikasi"
                class="text-xl duration-500 hover:text-yellow-200 hover:underline"><i class="fa-solid fa-circle-info"></i>
                Spesifikasi</a></li>
        <li class="mx-4 my-6 md:my-0"><a href="{{ route('index-page') }}#rekomendasi"
                class="text-xl hover:text-yellow-200 duration-500 hover:underline"><i class="fa-solid fa-gear"></i>
                Rekomendasi</a>
        </li>
        <li class="mx-4 my-6 md:my-0"><a href="{{ route('index-page') }}#motor-listrik"
                class="text-xl hover:text-yellow-200 duration-500 hover:underline"><i class="fa-solid fa-list"></i> Daftar
                Molis</a></li>
    </ul>
@endsection
@section('content')
    <section id="motor-listrik" class="container-fluid xl:container xl:mx-auto my-4 bg-white rounded-lg">
        <div class="p-6">
            <div class="flex justify-between">
                <h1 class="font-bold text-2xl">Daftar Motor Listrik</h1>

            </div>

            <div class="p-4 bg-base-200 rounded-xl my-3 flex flex-wrap justify-center gap-4">
                @foreach ($grouped_data as $no => $item)
                    <div class="card w-72  glass">
                        <figure class="h-3/5"><img src="{{ asset('storage/images/' . $item[0]['alternatif']['gambar']) }}"
                                alt="" class="max-h-[250px] w-full sm:max-h-[300px] " />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $item[0]['alternatif']['nama'] }}</h2>
                            <div class="card-actions justify-end">
                                <button class="btn bg-yellow-300 text-[16px] font-[Poppins]"
                                    onclick="my_modal_{{ $item[0]['id_alternatif'] }}.showModal()"><i
                                        class="fa-solid fa-circle-info"></i>
                                    Detail</button>
                            </div>
                        </div>
                    </div>
                    <dialog id="my_modal_{{ $item[0]['id_alternatif'] }}" class="modal modal-bottom sm:modal-middle">

                        <div class="modal-box p-0">
                            <div class="p-4  bg-yellow-300">
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
                                                    {{ $data->kriteria->satuan }}</td>
                                            </tr>
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
            <div class="flex justify-center w-full mt-4">
                <!-- Tombol navigasi ke halaman sebelumnya -->
                @if ($molis->onFirstPage())
                    <span class="opacity-50 cursor-not-allowed px-2">&laquo; Sebelumnya</span>
                @else
                    <a href="{{ $molis->previousPageUrl() }}" class="px-2 hover:underline">&laquo; Sebelumnya</a>
                @endif

                <!-- Tombol-tombol nomor halaman -->
                @foreach ($molis->getUrlRange(1, $molis->lastPage()) as $page => $url)
                    <a href="{{ $url }}"
                        class="px-2 {{ $page === $molis->currentPage() ? 'font-bold' : '' }}">{{ $page }}</a>
                @endforeach

                <!-- Tombol navigasi ke halaman berikutnya -->
                @if ($molis->hasMorePages())
                    <a href="{{ $molis->nextPageUrl() }}" class="px-2 hover:underline">Berikutnya &raquo;</a>
                @else
                    <span class="opacity-50 cursor-not-allowed px-2">Berikutnya &raquo;</span>
                @endif
            </div>



        </div>
    </section>
@endsection

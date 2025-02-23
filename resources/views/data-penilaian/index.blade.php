<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Sub Kriteria') }}
        </h2>
    </x-slot>

    @foreach ($dataAlternatif as $alternatif)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex justify-between items-center  border-b-2 border-black pb-2 mb-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Manajemen Data Penilaian {{ str_replace('_', ' ', $alternatif['nama']) }}
                        </h2>
                        <button type="button" class="btn bg-yellow-400 text-gray-600"
                            onclick="tambah_{{ $alternatif['id'] }}.showModal()">Tambah</button>
                    </div>
                    <div class="overflow-x-auto ">
                        <table class="table table-zebra mb-6 lg:text-[20px]">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach ($alternatif->penilaian as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ str_replace('_', ' ', $item['kriteria']['nama']) }}</td>
                                    <td>{{ number_format($item['nilai'], 0, ',', '.') }}
                                        {{ $item['kriteria']['satuan'] }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                            <button onclick="edit_modal_{{ $item['id'] }}.showModal()">
                                                <i class="fa-solid fa-pen-to-square fa-xl text-[#436850]"></i>
                                            </button>
                                            <button onclick="hapus_modal_{{ $item['id'] }}.showModal()">
                                                <i class="fa-solid fa-trash-can fa-xl text-[#EE4E4E]"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <dialog id="edit_modal_{{ $item['id'] }}" class="modal modal-bottom sm:modal-middle">

                                    <div class="modal-box p-0">
                                        <div class="p-4  bg-yellow-400 text-gray-600 flex items-center justify-between">
                                            <h3 class="font-bold text-lg text-[22px]">Edit Data {{ $item['nama'] }}
                                            </h3>
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost"><i
                                                        class="fa-solid fa-xmark fa-2xl"></i></button>
                                            </form>
                                        </div>
                                        <div class="p-8">
                                            <form action="{{ route('data-sub-update', $item['id']) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class=" gap-6 mb-4">
                                                    <div class="flex items-center w-full mb-4">
                                                        <div class="w-1/4">
                                                            <label for="id_kriteria">
                                                                Kriteria
                                                            </label>
                                                        </div>
                                                        <select name="id_kriteria" id="id_kriteria"
                                                            class="select select-bordered w-full max-w-xs">
                                                            <option value="" selected disabled>Pilih Kriteria
                                                            </option>
                                                            @foreach ($dataKriteria as $kriteria)
                                                                <option value="{{ $kriteria['id'] }}"
                                                                    @selected($kriteria['id'] == $item['id_kriteria'])>
                                                                    {{ str_replace('_', ' ', $kriteria['nama']) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="flex items-center w-full mb-4">
                                                        <div class="w-1/4">
                                                            <label for="nilai">
                                                                Nilai
                                                            </label>
                                                        </div>
                                                        <input type="number" id="nilai" name="nilai"
                                                            class="input input-bordered input-sm w-3/4"
                                                            value="{{ $item['nilai'] }}" required>
                                                    </div>
                                                    <div class="flex items-center w-full mb-4">
                                                        <input type="hidden" id="id_alternatif" name="id_alternatif"
                                                            class="input input-bordered input-sm w-3/4"
                                                            value="{{ $alternatif['id'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-action">
                                                    <button type="submit"
                                                        class="btn bg-yellow-400 text-gray-600">Simpan</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </dialog>
                                <dialog id="hapus_modal_{{ $item['id'] }}"
                                    class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box p-0">
                                        <div class="p-4  bg-yellow-400 text-gray-600 flex items-center justify-between">
                                            <h3 class="font-bold text-lg text-[22px]">Hapus Data {{ $item['nama'] }}
                                            </h3>
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost"><i
                                                        class="fa-solid fa-xmark fa-2xl"></i></button>
                                            </form>
                                        </div>
                                        <div class="p-8">
                                            <form method="POST"
                                                action="{{ route('data-penilaian-delete', $item['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class=" gap-6 mb-4">
                                                    <p class="text-lg">Apakah anda yakin ingin menghapus data
                                                        <b>{{ $item['nama'] }}</b> ?
                                                    </p>
                                                </div>
                                                <div class="modal-action">
                                                    <button type="submit"
                                                        class="btn bg-yellow-400 text-gray-600">Hapus</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </dialog>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <dialog id="tambah_{{ $alternatif['id'] }}" class="modal modal-bottom sm:modal-middle">

                <div class="modal-box p-0">
                    <div class="p-4  bg-[#FDDE55] text-gray-600 flex items-center justify-between">
                        <h3 class="font-bold text-lg text-[22px]">Tambah Data Penilaian
                            {{ $alternatif['nama'] }}
                        </h3>
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost"><i
                                    class="fa-solid fa-xmark fa-2xl"></i></button>
                        </form>
                    </div>
                    <div class="p-8">
                        <form action="{{ route('data-sub-post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class=" gap-6 mb-4">
                                <div class="flex items-center w-full mb-4">
                                    <div class="w-1/4">
                                        <label for="id_kriteria">
                                            Kriteria
                                        </label>
                                    </div>
                                    <select name="id_kriteria" id="id_kriteria"
                                        class="select select-bordered w-full max-w-xs">
                                        <option value="" selected disabled>Pilih Kriteria</option>
                                        @foreach ($dataKriteria as $kriteria)
                                            <option value="{{ $kriteria['id'] }}">
                                                {{ str_replace('_', ' ', $kriteria['nama']) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center w-full mb-4">
                                    <div class="w-1/4">
                                        <label for="nilai">
                                            Nilai
                                        </label>
                                    </div>
                                    <input type="number" id="nilai" name="nilai"
                                        class="input input-bordered input-sm w-3/4" required>
                                </div>
                                <div class="flex items-center w-full mb-4">
                                    <input type="hidden" id="id_alternatif" name="id_alternatif"
                                        class="input input-bordered input-sm w-3/4" value="{{ $alternatif['id'] }}"
                                        required>
                                </div>
                            </div>
                            <div class="modal-action">
                                <button type="submit" class="btn bg-yellow-400 text-gray-600">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </dialog>
        </div>
    @endforeach
    <div class=" bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        <div class="flex justify-center w-full mt-4">
            <!-- Tombol navigasi ke halaman sebelumnya -->
            @if ($dataAlternatif->onFirstPage())
                <span class="opacity-50 cursor-not-allowed px-2">&laquo; Sebelumnya</span>
            @else
                <a href="{{ $dataAlternatif->previousPageUrl() }}" class="px-2 hover:underline">&laquo;
                    Sebelumnya</a>
            @endif

            <!-- Tombol-tombol nomor halaman -->
            @foreach ($dataAlternatif->getUrlRange(1, $dataAlternatif->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="px-2 {{ $page === $dataAlternatif->currentPage() ? 'font-bold' : '' }}">{{ $page }}</a>
            @endforeach

            <!-- Tombol navigasi ke halaman berikutnya -->
            @if ($dataAlternatif->hasMorePages())
                <a href="{{ $dataAlternatif->nextPageUrl() }}" class="px-2 hover:underline">Berikutnya
                    &raquo;</a>
            @else
                <span class="opacity-50 cursor-not-allowed px-2">Berikutnya &raquo;</span>
            @endif
        </div>
    </div>


</x-app-layout>

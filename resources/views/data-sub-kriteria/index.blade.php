<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Sub Kriteria') }}
        </h2>
    </x-slot>

    @foreach ($dataKriteria as $kriteria)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex justify-between items-center  border-b-2 border-black pb-2 mb-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Manajemen Data Sub Kriteria {{ str_replace('_', ' ', $kriteria['nama']) }}
                        </h2>
                        <button type="button" class="btn bg-yellow-400 text-gray-600"
                            onclick="tambah_{{ $kriteria['nama'] }}.showModal()">Tambah</button>
                    </div>
                    <div class="overflow-x-auto ">
                        <table class="table table-zebra mb-6 lg:text-[20px]">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach ($kriteria->subkriteria as $index => $sub)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sub['nama'] }}</td>
                                    <td>{{ $sub['bobot'] }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                            <button onclick="edit_modal_{{ $sub['id'] }}.showModal()">
                                                <i class="fa-solid fa-pen-to-square fa-xl text-[#436850]"></i>
                                            </button>
                                            <button onclick="hapus_modal_{{ $sub['id'] }}.showModal()">
                                                <i class="fa-solid fa-trash-can fa-xl text-[#EE4E4E]"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <dialog id="edit_modal_{{ $sub['id'] }}" class="modal modal-bottom sm:modal-middle">

                                    <div class="modal-box p-0">
                                        <div class="p-4  bg-yellow-400 text-gray-600 flex items-center justify-between">
                                            <h3 class="font-bold text-lg text-[22px]">Edit Data {{ $sub['nama'] }}
                                            </h3>
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost"><i
                                                        class="fa-solid fa-xmark fa-2xl"></i></button>
                                            </form>
                                        </div>
                                        <div class="p-8">
                                            <form action="{{ route('data-sub-update', $sub['id']) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class=" gap-6 mb-4">
                                                    <div class="flex items-center w-full mb-4">
                                                        <div class="w-1/4">
                                                            <label for="nama">
                                                                Nama
                                                            </label>
                                                        </div>
                                                        <input type="text" id="nama" name="nama"
                                                            class="input input-bordered input-sm w-3/4"
                                                            value="{{ $sub['nama'] }}" required>
                                                    </div>

                                                    <div class="flex items-center w-full mb-4">
                                                        <div class="w-1/4">
                                                            <label for="bobot">
                                                                Bobot
                                                            </label>
                                                        </div>
                                                        <input type="text" id="bobot" name="bobot"
                                                            class="input input-bordered input-sm w-3/4"
                                                            value="{{ $sub['bobot'] }}" required>
                                                    </div>
                                                    <div>
                                                        <input type="hidden" id="id_kriteria" name="id_kriteria"
                                                            class="input input-bordered input-sm w-3/4"
                                                            value="{{ $kriteria['id'] }}" required>
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
                                <dialog id="hapus_modal_{{ $sub['id'] }}"
                                    class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box p-0">
                                        <div class="p-4  bg-yellow-400 text-gray-600 flex items-center justify-between">
                                            <h3 class="font-bold text-lg text-[22px]">Hapus Data {{ $sub['nama'] }}
                                            </h3>
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost"><i
                                                        class="fa-solid fa-xmark fa-2xl"></i></button>
                                            </form>
                                        </div>
                                        <div class="p-8">
                                            <form method="POST" action="{{ route('data-sub-delete', $sub['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class=" gap-6 mb-4">
                                                    <p class="text-lg">Apakah anda yakin ingin menghapus data
                                                        <b>{{ $sub['nama'] }}</b> ?
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
            <dialog id="tambah_{{ $kriteria['nama'] }}" class="modal modal-bottom sm:modal-middle">

                <div class="modal-box p-0">
                    <div class="p-4  bg-[#FDDE55] text-gray-600 flex items-center justify-between">
                        <h3 class="font-bold text-lg text-[22px]">Tambah Data Sub Kriteria
                            {{ str_replace('_', ' ', $kriteria['nama']) }}
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
                                        <label for="nama">
                                            Nama
                                        </label>
                                    </div>
                                    <input type="text" id="nama" name="nama"
                                        class="input input-bordered input-sm w-3/4" required>
                                </div>
                                <div class="flex items-center w-full mb-4">
                                    <div class="w-1/4">
                                        <label for="bobot">
                                            Bobot
                                        </label>
                                    </div>
                                    <input type="number" id="bobot" name="bobot"
                                        class="input input-bordered input-sm w-3/4"" required>
                                </div>
                                <div class="flex items-center w-full mb-4">
                                    <input type="hidden" id="id_kriteria" name="id_kriteria"
                                        class="input input-bordered input-sm w-3/4" value="{{ $kriteria['id'] }}"
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

</x-app-layout>

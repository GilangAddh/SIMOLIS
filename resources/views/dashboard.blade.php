<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight border-b-2 border-black pb-2 mb-8">
                    Manajemen Data Simolis
                </h2>
                <div class="my-4 text-gray-900 dark:text-gray-100 flex gap-6">
                    <div class="bg-[#436850] relative rounded-[12px] w-52">
                        <div class="bg-[#D2E3C8] rounded-t-[12px] p-3 py-2">
                            <h4 class="font-bold text-lg text-[#436850]">Data Alternatif</h4>
                        </div>
                        <div class="p-3">
                            <p class="text-white text-[28px] font-bold mb-6">{{ $jumlahAlternatif }}</p>
                        </div>
                        <div class="px-3 py-1 text-right border-t-[1px] text-white ">
                            <a href="{{ route('data-alternatif-index') }}" class="text-sm text-center">Selengkapnya <i
                                    class="fa-solid fa-arrow-right"></i></a>

                        </div>
                    </div>
                    <div class="bg-[#436850] relative rounded-[12px] w-52">
                        <div class="bg-[#D2E3C8] rounded-t-[12px] p-3 py-2">
                            <h4 class="font-bold text-lg text-[#436850]">Data Kriteria</h4>
                        </div>
                        <div class="p-3">
                            <p class="text-white text-[28px] font-bold mb-6">{{ $jumlahKriteria }}</p>
                        </div>
                        <div class="px-3 py-1 text-right border-t-[1px] text-white ">
                            <a href="" class="text-sm text-center">Selengkapnya <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

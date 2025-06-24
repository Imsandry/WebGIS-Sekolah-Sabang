<x-app-layout>
    <x-slot name="header">
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('sekolah.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="nama" :value="__('Nama Sekolah')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jenjang" :value="__('Jenjang')" />
                            <select id="jenjang" name="jenjang" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Pilih Jenjang</option>
                                <option value="SD" {{ old('jenjang') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('jenjang') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('jenjang') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="SMK" {{ old('jenjang') == 'SMK' ? 'selected' : '' }}>SMK</option>
                                <option value="Lainnya" {{ old('jenjang') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenjang')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="akreditasi" :value="__('Akreditasi')" />
                            <select id="akreditasi" name="akreditasi" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Pilih Akreditasi</option>
                                <option value="A" {{ old('akreditasi') == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('akreditasi') == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ old('akreditasi') == 'C' ? 'selected' : '' }}>C</option>
                                <option value="Belum Akreditasi" {{ old('akreditasi') == 'Belum Akreditasi' ? 'selected' : '' }}>Belum Akreditasi</option>
                            </select>
                            <x-input-error :messages="$errors->get('akreditasi')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required />
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="lat" :value="__('Latitude (Lat)')" />
                            <x-text-input id="lat" class="block mt-1 w-full" type="number" step="any" name="lat" :value="old('lat')" required />
                            <x-input-error :messages="$errors->get('lat')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="lng" :value="__('Longitude (Lng)')" />
                            <x-text-input id="lng" class="block mt-1 w-full" type="number" step="any" name="lng" :value="old('lng')" required />
                            <x-input-error :messages="$errors->get('lng')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="npsn" :value="__('NPSN (Opsional)')" />
                            <x-text-input id="npsn" class="block mt-1 w-full" type="text" name="npsn" :value="old('npsn')" />
                            <x-input-error :messages="$errors->get('npsn')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="foto" :value="__('Foto Sekolah (Opsional)')" />
                            <input id="foto" type="file" name="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('sekolah.manage') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                                Batal
                            </a>
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-slot>


</x-app-layout>

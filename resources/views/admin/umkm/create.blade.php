<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah UMKM Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white mb-4">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.umkm.store') }}" enctype="multipart/form-data"> 
                    @csrf   
                    <div>
                        <x-input-label for="name" :value="__('Nama UMKM')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" :value="old('kategori')" required autocomplete="kategori" />
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Foto Utama (Thumbnail)')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea name="deskripsi" id="deskripsi" class="border border-slate-300 rounded-xl w-full" rows="5">{{ old('deskripsi') }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    {{-- === FIELD BARU DIMULAI DARI SINI === --}}

                    <div class="mt-4">
                        <x-input-label for="kisaran_harga" :value="__('Kisaran Harga (Contoh: Rp 10.000 - Rp 50.000)')" />
                        <x-text-input id="kisaran_harga" class="block mt-1 w-full" type="text" name="kisaran_harga" :value="old('kisaran_harga')" autocomplete="kisaran_harga" />
                        <x-input-error :messages="$errors->get('kisaran_harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lokasi" :value="__('Lokasi (Contoh: Jaga III, Depan Balai Desa)')" />
                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" :value="old('lokasi')" autocomplete="lokasi" />
                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="galeri_foto" :value="__('Galeri Foto (Bisa pilih lebih dari 1)')" />
                        {{-- Tambahkan 'multiple' untuk upload banyak file --}}
                        <input id="galeri_foto" class="block mt-1 w-full" type="file" name="galeri_foto[]" multiple />
                        <x-input-error :messages="$errors->get('galeri_foto')" class="mt-2" />
                        {{-- <x-input-error :messages="$errors->get('galeri_foto.*')" class="mt-2" /> --}}
                    </div>
                    
                    {{-- === FIELD BARU BERAKHIR DI SINI === --}}

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah UMKM
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
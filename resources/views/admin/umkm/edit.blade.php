<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit UMKM') }}: {{ $umkm->name }}
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

                <form method="POST" action="{{ route('admin.umkm.update', $umkm) }}" enctype="multipart/form-data"> 
                    @csrf   
                    @method('PUT')
                    
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nama UMKM')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $umkm->name }}" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" value="{{ $umkm->kategori }}" required />
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Foto Utama (Thumbnail)')" />
                        <img src="{{ Storage::url($umkm->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px] mb-2">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea name="deskripsi" id="deskripsi" class="border border-slate-300 rounded-xl w-full" rows="5">{{ $umkm->deskripsi }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    {{-- === FIELD BARU === --}}
                    <div class="mt-4">
                        <x-input-label for="kisaran_harga" :value="__('Kisaran Harga')" />
                        <x-text-input id="kisaran_harga" class="block mt-1 w-full" type="text" name="kisaran_harga" value="{{ $umkm->kisaran_harga }}" />
                        <x-input-error :messages="$errors->get('kisaran_harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lokasi" :value="__('Lokasi')" />
                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" value="{{ $umkm->lokasi }}" />
                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="__('Galeri Foto Saat Ini')" />
                        <div class="flex flex-wrap gap-3 mt-2">
                            @forelse($umkm->fotos as $foto)
                                <img src="{{ Storage::url($foto->foto_path) }}" alt="" class="rounded-md object-cover w-[70px] h-[70px]">
                            @empty
                                <p class="text-sm text-gray-500">Belum ada galeri foto.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="galeri_foto" :value="__('Tambah Foto Galeri (Bisa pilih lebih dari 1)')" />
                        <input id="galeri_foto" class="block mt-1 w-full" type="file" name="galeri_foto[]" multiple />
                        <x-input-error :messages="$errors->get('galeri_foto')" class="mt-2" />
                        {{-- <x-input-error :messages="$errors->get('galeri_foto.*')" class="mt-2" /> --}}
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update UMKM
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
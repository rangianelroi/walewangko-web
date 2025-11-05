<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Foto Galeri Baru') }}
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

                <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data"> 
                    @csrf   
                    <div>
                        <x-input-label for="title" :value="__('Judul Foto')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Kategori (cth: KKN UNSRAT, PHBS, DPL)')" />
                        <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required />
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="date" :value="__('Tanggal Kegiatan')" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('File Foto')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Sub-judul / Deskripsi Singkat')" />
                        <textarea name="description" id="description" class="border border-slate-300 rounded-xl w-full" rows="3">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Simpan ke Galeri
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
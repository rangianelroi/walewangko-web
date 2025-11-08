<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Peta Desa') }}
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

                <form method="POST" action="{{ route('admin.peta.update', $petaDesa) }}" enctype="multipart/form-data"> 
                    @csrf   
                    @method('PUT')
                    <div>
                        <x-input-label for="title" :value="__('Judul Peta (cth: Peta Administrasi Desa)')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $petaDesa->title)" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('File Gambar Peta (.jpg, .png)')" />
                        <img src="{{ asset('storage/' .  $petaDesa->image) }}" alt="" class="rounded-2xl object-cover w-[180px] h-auto mb-2">
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                        <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Deskripsi Singkat (Opsional)')" />
                        <textarea name="description" id="description" class="border border-slate-300 rounded-xl w-full" rows="3">{{ old('description', $petaDesa->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Peta
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
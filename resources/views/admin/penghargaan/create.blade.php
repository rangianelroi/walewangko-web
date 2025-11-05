<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penghargaan Baru') }}
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

                <form method="POST" action="{{ route('admin.penghargaan.store') }}" enctype="multipart/form-data"> 
                    @csrf   
                    <div>
                        <x-input-label for="name" :value="__('Nama Penghargaan')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="lokasi_tahun" :value="__('Lokasi & Tahun (cth: Bali, 2020)')" />
                        <x-text-input id="lokasi_tahun" class="block mt-1 w-full" type="text" name="lokasi_tahun" :value="old('lokasi_tahun')" required autocomplete="lokasi_tahun" />
                        <x-input-error :messages="$errors->get('lokasi_tahun')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('Ikon Penghargaan (Gambar Piala)')" />
                        <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" required />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Tambah Penghargaan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

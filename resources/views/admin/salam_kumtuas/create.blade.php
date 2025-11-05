<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salam Hukum Tua Baru') }}
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

                <form method="POST" action="{{ route('admin.salam_kumtuas.store') }}" enctype="multipart/form-data"> 
                    @csrf   
                    <div>
                        <x-input-label for="nama_hukum_tua" :value="__('Nama Hukum Tua')" />
                        <x-text-input id="nama_hukum_tua" class="block mt-1 w-full" type="text" name="nama_hukum_tua" :value="old('nama_hukum_tua')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('nama_hukum_tua')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto Hukum Tua')" />
                        <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" required />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="pesan" :value="__('Isi Pesan / Salam')" />
                        <textarea name="pesan" id="pesan" class="editor border border-slate-300 rounded-xl w-full">{{ old('pesan') }}</textarea>
                        <x-input-error :messages="$errors->get('pesan')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Simpan Salam
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    @push('scripts')
        <x-head.tinymce-config/>
    @endpush
</x-app-layout>
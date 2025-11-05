<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 

                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white mb-4">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                {{-- KOREKSI: Route ke admin.berita.update dan kirim $berita --}}
                <form method="POST" action="{{ route('admin.berita.update', $berita) }}" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <div>
                        {{-- KOREKSI: Label dan name diubah ke 'judul' --}}
                        <x-input-label for="judul" :value="__('Judul Berita')" />
                        <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul"
                          value="{{ $berita->judul }}" required autofocus autocomplete="judul" />
                        <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail Berita')" />
                        {{-- KOREKSI: Tampilkan thumbnail dari $berita --}}
                        <img src="{{ Storage::url($berita->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px] mb-2">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ringkasan" :value="__('Ringkasan/Lead Berita (4W1H)')" />
                        <p class="text-sm text-gray-500 mb-2">Tuliskan paragraf pembuka yang menjawab What, Who, When, Where, dan How.</p>
                        <textarea name="ringkasan" id="ringkasan" rows="3" class="border border-slate-300 rounded-xl w-full p-2">{{ $berita->ringkasan }}</textarea>
                        <x-input-error :messages="$errors->get('ringkasan')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="isi_konten" :value="__('Isi Konten Berita')" />
                        <textarea name="isi_konten" id="isi_konten" class="editor border border-slate-300 rounded-xl w-full">{{ $berita->isi_konten }}</textarea>
                        <x-input-error :messages="$errors->get('isi_konten')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                  
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Berita
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
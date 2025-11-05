<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New About') }}
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

                <form method="POST" action="{{ route('admin.abouts.store') }}" enctype="multipart/form-data"> 
                    @csrf   
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />
                        
                        {{-- ID 'type-selector' ditambahkan untuk target JavaScript --}}
                        <select name="type" id="type-selector" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose type</option>
                            <option value="Visi">Visions</option>
                            <option value="Misi">Missions</option>
                            <option value="Sejarah">Sejarah</option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    {{-- KONTEN DINAMIS DIMULAI DI SINI --}}

                    {{-- Wrapper untuk Editor Konten (Sejarah) --}}
                    <div id="content-section" class="mt-4 hidden">
                        <x-input-label for="content" :value="__('Isi Konten (Sejarah, dll)')" />
                        <textarea name="content" id="content" class="editor border border-slate-300 rounded-xl w-full" rows="10">{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    {{-- Wrapper untuk Keypoints (Visi/Misi) --}}
                    <div id="keypoints-section" class="mt-4 hidden">
                        <h3 class="text-indigo-950 text-lg font-bold">Keypoints</h3>
                        <div class="mt-4">
                            <div class="flex flex-col gap-y-5">
                                @for($i = 0; $i < 4; $i++)
                                    <input type="text" class="py-3 rounded-lg border-slate-300 border" placeholder="Write your keypoint" name="keypoints[]">
                                @endfor
                            </div>
                            <x-input-error :messages="$errors->get('keypoints')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New About
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- KOREKSI: Blok @push harus berada DI DALAM <x-app-layout> --}}
    @push('scripts')
        <x-head.tinymce-config/>

        {{-- JavaScript untuk mengontrol tampilan form --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const typeSelect = document.getElementById('type-selector');
                const contentContainer = document.getElementById('content-section');
                const keypointsContainer = document.getElementById('keypoints-section');

                function toggleContainers() {
                    const selectedValue = typeSelect.value;

                    // Sembunyikan semua container dulu
                    contentContainer.classList.add('hidden');
                    keypointsContainer.classList.add('hidden');

                    if (selectedValue === 'Sejarah') {
                        contentContainer.classList.remove('hidden');
                    } else if (selectedValue === 'Visi' || selectedValue === 'Misi') {
                        keypointsContainer.classList.remove('hidden');
                    }
                }

                // Panggil fungsi saat halaman dimuat (jika ada value lama)
                toggleContainers();

                // Panggil fungsi setiap kali dropdown berubah
                typeSelect.addEventListener('change', toggleContainers);
            });
        </script>
    @endpush
</x-app-layout>
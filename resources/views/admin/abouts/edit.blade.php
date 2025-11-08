<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About') }}
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
                
                <form method="POST" action="{{ route('admin.abouts.update', $about) }} " enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                          value="{{ $about->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <img src="{{ asset('storage/' .  $about->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />
                        
                        {{-- KOREKSI: Tambahkan ID 'type-selector' dan logika @selected --}}
                        <select name="type" id="type-selector" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose type</option>
                            <option value="Visi" @selected($about->type == 'Visi')>Visi</option>
                            <option value="Visi" @selected($about->type == 'Misi')>Misi</option>
                            <option value="Sejarah" @selected($about->type == 'Sejarah')>Sejarah</option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    {{-- KOREKSI: Tambahkan wrapper 'content-section' --}}
                    <div id="content-section" class="mt-4 hidden">
                        <x-input-label for="content" :value="__('Isi Konten (Sejarah, dll)')" />
                        <textarea name="content" id="content" class="editor border border-slate-300 rounded-xl w-full" rows="10">{{ $about->content }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    {{-- KOREKSI: Tambahkan wrapper 'keypoints-section' --}}
                    <div id="keypoints-section" class="mt-4 hidden">
                        <h3 class="text-indigo-950 text-lg font-bold">Keypoints</h3>
                        <div class="mt-4">
                            <div class="flex flex-col gap-y-5">
                                <x-input-label for="keypoints" :value="__('keypoints')" /> 
                                @forelse($about->keypoints as $keypoint)
                                    <input type="text" class="py-3 rounded-lg border-slate-300 border" 
                                    value="{{ $keypoint->keypoint }}" name="keypoints[]">
                                @empty
                                    {{-- Tambahkan input kosong jika data lama tidak ada --}}
                                    @for($i = 0; $i < 3; $i++)
                                        <input type="text" class="py-3 rounded-lg border-slate-300 border" placeholder="Write your keypoint" name="keypoints[]">
                                    @endfor
                                @endforelse
                            </div>
                            <x-input-error :messages="$errors->get('keypoint')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update About
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    {{-- KOREKSI: Tambahkan @push('scripts') dengan JS yang disesuaikan --}}
    @push('scripts')
        <x-head.tinymce-config/>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const typeSelector = document.getElementById('type-selector');
                const contentSection = document.getElementById('content-section');
                const keypointsSection = document.getElementById('keypoints-section');

                // Fungsi untuk menampilkan/menyembunyikan section
                function toggleSections() {
                    const selectedValue = typeSelector.value;

                    // Sembunyikan semua section terlebih dahulu
                    contentSection.classList.add('hidden');
                    keypointsSection.classList.add('hidden');

                    if (selectedValue === 'Sejarah') {
                        // Jika 'Sejarah', tampilkan editor konten
                        contentSection.classList.remove('hidden');
                    } else if (selectedValue === 'Visi' || selectedValue === 'Misi') {
                        // Jika 'Visions' atau 'Missions', tampilkan keypoints
                        keypointsSection.classList.remove('hidden');
                    }
                }

                // PENTING: Jalankan fungsi ini saat halaman dimuat
                // untuk menampilkan section yang benar berdasarkan data ($about->type)
                toggleSections();

                // Tambahkan listener untuk jika pengguna mengubah pilihan
                typeSelector.addEventListener('change', toggleSections);
            });
        </script>
    @endpush
</x-app-layout>
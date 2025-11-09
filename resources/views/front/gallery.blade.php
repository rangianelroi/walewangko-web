@extends('front.layouts.app')

@section('content')
    {{-- Header dengan background tinggi seperti team page --}}
    <div id="header" class="bg-[#F6F7FA] relative h-[400px] lg:h-[600px] -mb-[250px] lg:-mb-[388px]">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-50 p-6 lg:pt-10">
            <x-navbar/>
        </div>
        {{-- Decorative Background Text --}}
        <div class="absolute inset-0 flex items-center justify-center overflow-hidden opacity-5">
            <p class="font-extrabold text-[150px] leading-[250px] lg:text-[250px] lg:leading-[375px] text-center text-cp-green">GALERI</p>
        </div>
    </div>

    {{-- Konten utama dengan z-10 agar tampil di atas background --}}
    <div id="Gallery-Index" class="w-full relative z-10">
        <div class="container max-w-[1130px] mx-auto flex flex-col gap-10 lg:gap-[50px] items-center p-6 lg:p-0">
            
            {{-- 1. Bagian Header (Breadcrumb & Judul) --}}
            <div class="flex flex-col gap-6 lg:gap-[30px] items-center">
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                  <p class="text-cp-black opacity-60 last-of-type:text-cp-black last-of-type:opacity-100 last-of-type:font-semibold">Home</p>
                    <span class="text-black">/</span>
                    <p class="last-of-type:text-cp-black last-of-type:font-semibold">Galeri</p>
                </div>
                
                <div class="flex flex-col gap-[14px] items-center text-center">
                    <h2 class="text-cp-green font-bold text-3xl leading-[30px] lg:text-4xl lg:leading-[45px] text-center">Galeri Foto Desa Walewangko</h2>
                    <h1 class="font-semibold leading-snug lg:leading-[30px] text-center text-cp-black">Dokumentasi Kegiatan Desa Walewangko</h1>
                </div>
            </div>

            {{-- 2. Filter Kategori --}}
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('front.gallery') }}" 
                   class="p-[8px_16px] rounded-full font-semibold transition-all duration-300 {{ !request('kategori') ? 'bg-[#4A3728] text-white shadow-[0_12px_30px_0_rgba(47,82,51,0.4)]' : 'bg-white border border-[#E8EAF2] text-cp-black hover:border-cp-dark-blue hover:shadow-[0_10px_30px_0_#D1D4DF80]' }}">
                    Semua Kategori
                </a>
                @foreach($kategoris as $kat)
                    <a href="{{ route('front.gallery', ['kategori' => $kat]) }}" 
                       class="p-[8px_16px] rounded-full font-semibold transition-all duration-300 {{ request('kategori') == $kat ? 'bg-[#4A3728] text-white shadow-[0_12px_30px_0_rgba(47,82,51,0.4)]' : 'bg-white border border-[#E8EAF2] text-cp-black hover:border-cp-dark-blue hover:shadow-[0_10px_30px_0_#D1D4DF80]' }}">
                        {{ $kat }}
                    </a>
                @endforeach
            </div>

            {{-- 3. Bagian Konten (Grid Galeri) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 lg:gap-[30px] w-full pb-10">
                @forelse($galleries as $item)
                    <div class="gallery-card group bg-white flex flex-col rounded-[20px] border border-[#E8EAF2] overflow-hidden shadow-[0_10px_30px_0_#D1D4DF40] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                        {{-- Thumbnail dengan Overlay --}}
                        <button 
                            onclick="openImageModal('{{ asset('storage/' .  $item->image) }}', '{{ $item->title }}', '{{ $item->category }}', '{{ $item->date->format('d M Y') }}', '{{ $item->description }}')"
                            class="relative w-full h-[200px] sm:h-[240px] flex shrink-0 overflow-hidden bg-[#F6F7FA]">
                            <img src="{{ asset('storage/' .  $item->image) }}" class="w-full h-full rounded-[20px] object-cover object-center transition-all duration-300 group-hover:scale-110" alt="{{ $item->title }}">
                            
                            {{-- Overlay on Hover --}}
                            <div class="absolute inset-0 bg-[#2F5233] opacity-0 group-hover:opacity-5 transition-all duration-300 flex items-center justify-center">
                                <div class="w-10 h-10 lg:w-[60px] lg:h-[60px] flex shrink-0 overflow-hidden">
                                    <img src="{{asset('assets/icons/arrow-down-line.svg')}}" class="w-full h-full object-contain" alt="view">
                                </div>
                            </div>
                            
                            {{-- Badge Kategori --}}
                            <div class="absolute top-4 right-4 bg-cp-pale-blue text-white p-[8px_16px] rounded-full font-bold text-sm uppercase shadow-[0_10px_30px_0_#D1D4DF40]">
                                {{ $item->category }}
                            </div>
                        </button>

                        {{-- Content --}}
                        <div class="flex flex-col p-6 lg:p-[30px] gap-4 lg:gap-[14px]">
                            <h3 class="font-bold text-xl leading-[30px] text-cp-green">{{ $item->title }}</h3>
                            <p class="leading-relaxed lg:leading-[26px]">{{ Str::limit($item->description, 80) }}</p>
                            
                            {{-- Footer Card --}}
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-[14px] border-t border-[#E8EAF2] gap-4 sm:gap-0">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 flex shrink-0 overflow-hidden">
                                        <img src="{{asset('assets/icons/calendar.svg')}}" class="w-full h-full object-contain" alt="icon">
                                    </div>
                                    <p class="text-sm text-cp-green font-semibold">{{ $item->date->format('d M Y') }}</p>
                                </div>
                                
                                <button 
                                    onclick="openImageModal('{{ asset('storage/' .  $item->image) }}', '{{ $item->title }}', '{{ $item->category }}', '{{ $item->date->format('d M Y') }}', '{{ $item->description }}')"
                                    class="text-cp-dark-blue font-semibold text-sm hover:text-white hover:bg-cp-dark-blue p-[8px_16px] rounded-full transition-all duration-300 w-full sm:w-auto text-center">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4 flex flex-col items-center gap-[30px] py-20">
                        <div class="w-[100px] h-[100px] flex shrink-0 rounded-full bg-[#F6F7FA] items-center justify-center">
                            <img src="{{asset('assets/icons/gallery.svg')}}" class="w-[55px] h-[55px] object-contain opacity-50" alt="empty">
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <p class="font-bold text-xl text-cp-green">Belum Ada Foto</p>
                            <p class="text-black text-center max-w-[400px]">Galeri untuk kategori ini belum memiliki foto. Silakan cek kategori lain atau kembali lagi nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- 4. Bagian Pagination --}}
            @if($galleries->hasPages())
                <div class="flex justify-center w-full pb-10">
                    {{ $galleries->links() }}
                </div>
            @endif

        </div>
    </div>

    {{-- Modal untuk Preview Gambar --}}
    <div id="image-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full bg-[#F6F7FA]">
        <div class="relative p-4 w-full max-w-[1000px] max-h-full">
            {{-- Modal content --}}
            <div class="relative bg-white rounded-[20px] overflow-hidden shadow-[0_10px_30px_0_#D1D4DF80]">
                {{-- Modal header --}}
                <div class="flex items-center justify-between p-5 border-b border-[#E8EAF2]">
                    <div class="flex items-center gap-3">
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden bg-cp-pale-blue rounded-full items-center justify-center">
                            <img src="{{asset('assets/icons/gallery.svg')}}" class="w-6 h-6 object-contain" alt="icon">
                        </div>
                        <div class="flex flex-col">
                            <h3 id="modal-title" class="text-xl font-bold text-cp-green leading-[30px]">
                                Foto Galeri
                            </h3>
                            <div class="flex items-center gap-2">
                                <span id="modal-category" class="text-sm font-semibold text-cp-dark-blue uppercase"></span>
                                <span class="text-cp-light-grey">•</span>
                                <span id="modal-date" class="text-sm text-cp-light-grey"></span>
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="closeImageModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center transition-all duration-300">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                {{-- Modal body --}}
                <div class="p-5 bg-[#F6F7FA]">
                    <div class="flex items-center justify-center bg-white rounded-[20px] overflow-hidden border border-[#E8EAF2]">
                        <img id="modal-image" src="" class="w-full h-auto max-h-[600px] object-contain" alt="Preview">
                    </div>
                </div>
                
                {{-- Modal footer with description --}}
                <div class="p-5 border-t border-[#E8EAF2]">
                    <p id="modal-description" class="text-cp-light-grey leading-[30px]"></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-cp-black w-full relative overflow-hidden mt-20">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row gap-10 lg:gap-y-4 items-center lg:items-start lg:justify-between pt-16 lg:pt-[100px] pb-40 lg:pb-[220px] relative z-10 p-6 lg:p-0">
        <div class="flex flex-col gap-10 items-center lg:items-start">
            <div class="flex items-center gap-3">
            <div class="flex shrink-0 h-[43px] overflow-hidden">
                <img src="{{asset('assets/logo/logo-minahasa.png')}}" class="object-contain w-full h-full" alt="logo">
            </div>
            <div class="flex flex-col">
                <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-cp-light-grey">WALEWANGKO</p>
                <p id="CompanyTagline" class="text-sm text-white">Kecamatan Langowan Barat</p>
            </div>
            </div>
            <div class="flex items-center gap-4">
            <a href="">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="{{asset('assets/icons/youtube.svg')}}" class="w-full h-full object-contain" alt="youtube">
                </div>
            </a>
            <a href="">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="{{asset('assets/icons/whatsapp.svg')}}" class="w-full h-full object-contain" alt="whatsapp">
                </div>
            </a>
            <a href="">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="{{asset('assets/icons/facebook.svg')}}" class="w-full h-full object-contain" alt="facebook">
                </div>
            </a>
            <a href="">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="{{asset('assets/icons/instagram.svg')}}" class="w-full h-full object-contain" alt="instagram">
                </div>
            </a>
            </div>
        </div>
        <div class="flex flex-wrap gap-10 lg:gap-[50px] w-full lg:w-auto justify-center lg:justify-start">
            <div class="flex flex-col w-full sm:w-[200px] gap-3 text-center lg:text-left">
            <p class="font-bold text-lg text-cp-light-grey">Navigasi Utama</p>
            <a href="{{ route('front.about') }}" class="text-white hover:text-white transition-all duration-300">Profil Desa</a>
            <a href="{{ route('front.team') }}" class="text-white hover:text-white transition-all duration-300">Aparat Desa</a>
            <a href="{{ route('front.berita_index') }}" class="text-white hover:text-white transition-all duration-300">Informasi Desa</a>
            <a href="{{ route('front.gallery') }}" class="text-white hover:text-white transition-all duration-300">Galeri</a>
            </div>
        <div class="flex flex-col w-full sm:w-[200px] gap-3 text-center lg:text-left">
            <p class="font-bold text-lg text-cp-light-grey">Potensi & Layanan Desa</p>
            <a href="{{ route('front.umkm') }}" class="text-white hover:text-white transition-all duration-300">UMKM Desa</a>
            <a href="{{ route('front.about') }}" class="text-white hover:text-white transition-all duration-300">Peta Wilayah Desa</a>
            </div>
            <div class="flex flex-col w-full sm:w-[200px] gap-3 text-center lg:text-left">
            <p class="font-bold text-lg text-cp-light-grey">Tautan Terkait</p>
            <a href="https://minahasa.go.id" class="text-white hover:text-white transition-all duration-300">Pemkab Minahasa</a>
            <a href="{{ route('front.appointment') }}" class="text-white hover:text-white transition-all duration-300">Hubungi Kami</a>
            <a href="{{ route('front.kkt') }}" class="text-white hover:text-white transition-all duration-300">KKT 144 UNSRAT - Walewangko</a>
            </div>
        </div>
        </div>
        <div class="absolute -bottom-[70px] lg:-bottom-[135px] w-full">
        <p class="block lg:hidden font-extrabold text-[100px] leading-[200px] text-center text-white opacity-5">WLKO</p>
        <p class="hidden lg:block font-extrabold text-[100px] leading-[200px] lg:text-[180px] lg:leading-[375px] text-center text-white opacity-5">WALEWANGKO</p>
        </div>
    </footer>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
@push('after-scripts')
{{-- JavaScript --}}
<script src="{{ asset('js/menu-toggle.js') }}"></script>

<script>
    // Fungsi untuk membuka modal dengan data gambar
    function openImageModal(imageSrc, title, category, date, description) {
        const modal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const modalCategory = document.getElementById('modal-category');
        const modalDate = document.getElementById('modal-date');
        const modalDescription = document.getElementById('modal-description');
        
        // Set data ke modal
        modalImage.src = imageSrc;
        modalTitle.textContent = title;
        modalCategory.textContent = category;
        modalDate.textContent = date;
        modalDescription.textContent = description;
        
        // Tampilkan modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }
    
    // Fungsi untuk menutup modal
    function closeImageModal() {
        const modal = document.getElementById('image-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto'; // Enable scrolling
    }
    
    // Close modal ketika klik di luar content
    document.getElementById('image-modal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });
    
    // Close modal dengan tombol Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
</script>
@endpush
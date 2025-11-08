@extends('front.layouts.app')
@section('content')
  <div id="header" class="bg-[#F6F7FA] relative overflow-hidden">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
      <x-navbar/>
      <div id="Hero" class="flex flex-col gap-[30px] mt-20 pb-20">
        <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit">
          <div class="w-5 h-5 flex shrink-0 overflow-hidden">
            <img src="{{asset('assets/icons/crown.svg')}}" class="object-contain" alt="icon">
          </div>
          <p class="font-semibold text-sm">UMKM Desa Walewangko</p>
        </div>
        <div class="flex flex-col gap-[10px]">
          <h1 class="text-cp-green font-extrabold text-[50px] leading-[65px] max-w-[536px]">Produk Lokal Berkualitas</h1>
          <p class="text-black leading-[30px] max-w-[437px]">Dukung produk lokal UMKM Desa Walewangko dan tingkatkan perekonomian desa</p>
        </div>
      </div>
    </div>
  </div>

  <div id="UMKM" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
    <div class="flex items-center justify-between">
      <div class="flex flex-col gap-[14px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">UMKM DESA</p>
        <h2 class="font-bold text-4xl leading-[45px]">Produk & Jasa<br>Desa Walewangko</h2>
      </div>
    </div>

    {{-- Filter Kategori --}}
    <div class="flex flex-wrap items-center gap-3">
      <a href="{{ route('front.umkm') }}" class="p-[8px_16px] rounded-full font-semibold transition-all duration-300 {{ !request('kategori') ? 'bg-cp-dark-blue text-white' : 'bg-white border border-[#E8EAF2] text-cp-black hover:border-cp-dark-blue' }}">
        Semua
      </a>
      @php
        $kategoris = \App\Models\Umkm::select('kategori')->distinct()->get()->pluck('kategori');
      @endphp
      @foreach($kategoris as $kat)
        <a href="{{ route('front.umkm', ['kategori' => $kat]) }}" class="p-[8px_16px] rounded-full font-semibold transition-all duration-300 {{ request('kategori') == $kat ? 'bg-cp-dark-blue text-white' : 'bg-white border border-[#E8EAF2] text-cp-black hover:border-cp-dark-blue' }}">
          {{ $kat }}
        </a>
      @endforeach
    </div>

    {{-- List UMKM Cards (Horizontal Layout) --}}
    <div class="flex flex-col gap-5">
      @forelse($umkms as $umkm)
      <div class="umkm-card bg-white border border-[#E8EAF2] rounded-[20px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        {{-- Main Card Content --}}
        <div class="flex flex-col md:flex-row gap-0">
          {{-- Thumbnail --}}
          <div class="thumbnail w-full md:w-[350px] h-[250px] flex shrink-0 overflow-hidden">
            <img src="{{ asset('storage/' .  $umkm->thumbnail) }}" class="object-cover object-center w-full h-full" alt="{{ $umkm->name }}">
          </div>

          {{-- Content --}}
          <div class="flex-1 flex flex-col p-[30px] gap-5">
            {{-- Category Badge --}}
            <div class="flex items-start">
              <span class="inline-block text-sm font-bold bg-cp-pale-blue text-cp-light-blue px-5 py-2 rounded-full">{{ $umkm->kategori }}</span>
            </div>
            
            {{-- Title --}}
            <h3 class="font-bold text-2xl leading-[30px]">{{ $umkm->name }}</h3>
            
            {{-- Description (Full text) --}}
            <p class="leading-[28px] text-black flex-1">{{ $umkm->deskripsi }}</p>

            {{-- Info Row --}}
            <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-[#E8EAF2]">
              @if($umkm->kisaran_harga)
              <div class="flex items-center gap-3">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                  <img src="{{asset('assets/icons/dollar-square.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="text-sm text-cp-black font-semibold">{{ $umkm->kisaran_harga }}</p>
              </div>
              @endif

              @if($umkm->lokasi)
              <div class="flex items-center gap-3">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                  <img src="{{asset('assets/icons/building-4-black.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="text-sm text-cp-black font-semibold">{{ $umkm->lokasi }}</p>
              </div>
              @endif

              {{-- Dropdown Button --}}
              @if($umkm->fotos->count() > 0)
              <button onclick="toggleGallery({{ $umkm->id }})" class="ml-auto flex items-center gap-3 bg-cp-black text-white p-[10px] rounded-xl font-semibold hover:shadow-[0_10px_30px_0_#D1D4DF80] transition-all duration-300">
                <span class="text-sm text-white font-semibold">Lihat Galeri</span>
                <div class="arrow-icon w-5 h-5 flex shrink-0 transition-all duration-300" id="arrow-{{ $umkm->id }}">
                  <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="object-contain" alt="icon">
                </div>
              </button>
              @endif
            </div>
          </div>
        </div>

        {{-- Gallery Section (Hidden by default) --}}
        @if($umkm->fotos->count() > 0)
        <div id="gallery-{{ $umkm->id }}" class="gallery-content hidden border-t border-[#E8EAF2]">
          <div class="p-[30px] bg-[#F6F7FA]">
            <h4 class="font-bold text-xl mb-5">Galeri Foto</h4>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
              @foreach($umkm->fotos as $foto)
              <div class="gallery-item w-full h-[150px] rounded-xl overflow-hidden cursor-pointer hover:opacity-90 hover:scale-105 transition-all duration-300 shadow-md" onclick="openImageModal('{{ asset('storage/' .  $foto->foto_path) }}')">
                <img src="{{ asset('storage/' .  $foto->foto_path) }}" class="w-full h-full object-cover" alt="gallery">
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @endif
      </div>
      @empty
      <div class="flex flex-col items-center gap-4 py-10">
        <div class="w-20 h-20 flex shrink-0">
          <img src="{{asset('assets/icons/shop.svg')}}" class="w-full h-full object-contain opacity-50" alt="empty">
        </div>
        <p class="text-cp-light-grey text-center">Belum ada UMKM untuk ditampilkan.</p>
      </div>
      @endforelse
    </div>

    {{-- Pagination --}}
    @if($umkms->hasPages())
    <div class="flex justify-center mt-10">
      {{ $umkms->links() }}
    </div>
    @endif
  </div>


  {{-- Image Modal --}}
  <div id="imageModal" class="fixed inset-0 bg-gray-900/80 z-50 hidden flex items-center justify-center p-4" onclick="closeImageModal()">
    <div class="relative max-w-[90vw] max-h-[90vh]">
      <button onclick="closeImageModal()" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-all duration-300">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
      <img id="modalImage" src="" class="max-w-full max-h-[90vh] object-contain rounded-2xl shadow-2xl" alt="preview">
    </div>
  </div>

  <footer class="bg-cp-black w-full relative overflow-hidden mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-between pt-[100px] pb-[220px] relative z-10">
      <div class="flex flex-col gap-10">
        <div class="flex items-center gap-3">
          <div class="flex shrink-0 h-[43px] overflow-hidden">
              <img src="{{asset('assets/logo/logo.svg')}}" class="object-contain w-full h-full" alt="logo">
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
      <div class="flex flex-wrap gap-[50px]">
        <div class="flex flex-col w-[200px] gap-3">
          <p class="font-bold text-lg text-cp-light-grey">Navigasi Utama</p>
          <a href="{{ route('front.about') }}" class="text-white hover:text-white transition-all duration-300">Profil Desa</a>
          <a href="{{ route('front.team') }}" class="text-white hover:text-white transition-all duration-300">Aparat Desa</a>
          <a href="{{ route('front.berita_index') }}" class="text-white hover:text-white transition-all duration-300">Informasi Desa</a>
          <a href="{{ route('front.gallery') }}" class="text-white hover:text-white transition-all duration-300">Galeri</a>
        </div>
        <div class="flex flex-col w-[200px] gap-3">
          <p class="font-bold text-lg text-cp-light-grey">Potensi & Layanan Desa</p>
          <a href="{{ route('front.umkm') }}" class="text-white hover:text-white transition-all duration-300">UMKM Desa</a>
          <a href="{{ route('front.about') }}" class="text-white hover:text-white transition-all duration-300">Peta Wilayah Desa</a>
        </div>
        <div class="flex flex-col w-[200px] gap-3">
          <p class="font-bold text-lg text-cp-light-grey">Tautan Terkait</p>
          <a href="https://minahasa.go.id" class="text-white hover:text-white transition-all duration-300">Pemkab Minahasa</a>
          <a href="{{ route('front.appointment') }}" class="text-white hover:text-white transition-all duration-300">Hubungi Kami</a>
          <a href="{{ route('front.kkt') }}" class="text-white hover:text-white transition-all duration-300">KKT 144 UNSRAT - Walewangko</a>
        </div>
      </div>
    </div>
    <div class="absolute -bottom-[135px] w-full">
      <p class="font-extrabold text-[180px] leading-[375px] text-center text-white opacity-5">WALEWANGKO</p>
    </div>
  </footer>

@endsection

@push('after-scripts')
<script>
  function toggleGallery(umkmId) {
    const gallery = document.getElementById('gallery-' + umkmId);
    const arrow = document.getElementById('arrow-' + umkmId);
    
    if (gallery.classList.contains('hidden')) {
      gallery.classList.remove('hidden');
      arrow.style.transform = 'rotate(180deg)';
    } else {
      gallery.classList.add('hidden');
      arrow.style.transform = 'rotate(0deg)';
    }
  }

  function openImageModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    modalImage.src = imageSrc;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
  }

  function closeImageModal() {
    const modal = document.getElementById('imageModal');
    
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    
    // Restore body scroll
    document.body.style.overflow = 'auto';
  }

  // Close modal with Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeImageModal();
    }
  });
</script>
@endpush
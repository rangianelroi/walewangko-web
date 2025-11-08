@extends('front.layouts.app')
@section('content')

  <div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar />
        <div class="flex flex-col gap-[50px] items-center py-20">
          <div class="breadcrumb flex items-center justify-center gap-[30px]">
            <p class="last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
            <span class="text-black">/</span>
            <p class="last-of-type:text-cp-black last-of-type:font-semibold">Tentang Kami</p>
          </div>
          <h2 class="font-bold text-4xl leading-[45px] text-center">Mengenal Desa Walewangko <br> Lebih Dekat</h2>
        </div>
    </div>
  </div>
  <div id="About" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
    @forelse($abouts as $about)
    <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
      <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden">
        <img src="{{ asset('storage/' . $about->thumbnail) }}" class="w-full h-full object-contain" alt="thumbnail">
      </div>
      <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $about->type }} Kami</p>
        <div class="flex flex-col gap-[10px]">
          <h2 class="font-bold text-4xl leading-[45px]">{{ $about->name }}</h2>
          <div class="flex flex-col gap-5">
            @forelse($about->keypoints as $keypoint)
            <div class="flex items-center gap-[10px]">
              <div class="w-6 h-6 flex shrink-0">
                <img src="assets/icons/tick-circle.svg" alt="icon">
              </div>
              <p class="leading-[26px] font-semibold">{{ $keypoint->keypoint }}</p>
            </div>
            @empty
            @endforelse
          </div>
          {{-- 1. TAMBAHKAN BLOK INI UNTUK MENAMPILKAN KONTEN (SEJARAH & TABEL) --}}
          @if($about->content)
          <div class="prose max-w-none text-black mt-4">
              {{-- Gunakan {!! !!} untuk me-render HTML dari TinyMCE --}}
              {!! $about->content !!}
          </div>
          @endif
        </div>
      </div>
    </div>
    @empty
    <p>No about information found.</p>
    @endforelse 
  </div>

  <div id="PetaDesa" class="flex flex-col gap-[30px] items-center text-center mt-20">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">PETA WILAYAH</p>
        
        @if($peta_desa)
            <h2 class="font-bold text-4xl leading-[45px]">{{ $peta_desa->title }}</h2>
            @if($peta_desa->description)
                <p class="leading-[30px] text-cp-light-grey max-w-[600px]">{{ $peta_desa->description }}</p>
            @endif
            
            {{-- Wrapper untuk gambar agar responsif dan memiliki border --}}
            <div class="w-full max-w-[1130px] mx-auto rounded-[20px] overflow-hidden border border-[#E8EAF2] shadow-[0_10px_30px_0_#D1D4DF40] mt-5">
                <img src="{{ asset('storage/' .  $peta_desa->image) }}" class="w-full h-full object-contain" alt="{{ $peta_desa->title }}">
            </div>
        @else
            {{-- Tampilan jika peta belum di-upload --}}
            <h2 class="font-bold text-4xl leading-[45px]">Peta Desa</h2>
            <p class="text-black">Peta desa belum diunggah oleh administrator.</p>
        @endif
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
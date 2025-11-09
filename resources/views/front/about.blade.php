@extends('front.layouts.app')
@section('content')

  <div id="header" class="bg-[#F6F7FA] relative">
   <div class="container max-w-[1130px] mx-auto relative pt-10 z-50 p-6 lg:pt-10">
        <x-navbar />
        <div class="flex flex-col gap-10 lg:gap-[50px] items-center py-16 lg:py-20">
          <div class="breadcrumb flex items-center justify-center gap-4">
            <p class="text-cp-black opacity-60 last-of-type:text-cp-black last-of-type:opacity-100 last-of-type:font-semibold">Home</p>
            <span class="text-cp-black opacity-60">/</span>
            <p class="text-cp-black opacity-60 last-of-type:text-cp-black last-of-type:opacity-100 last-of-type:font-semibold">Tentang Kami</p>
          </div>
          <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px] text-center">Mengenal Desa Walewangko <br> Lebih Dekat</h2>
    </div>
  </div>

  <div id="About" class="container max-w-[1130px] mx-auto flex flex-col gap-10 lg:gap-20 mt-10 lg:mt-20 p-6 lg:p-0">
    @forelse($abouts as $about)

        @if($about->type == 'Sejarah')
            
            {{-- ============================================= --}}
            {{-- 1. LAYOUT "WRAP TEXT" (FLOAT) KHUSUS UNTUK SEJARAH --}}
            {{-- ============================================= --}}
            
            {{-- Gunakan max-w-[1000px] dan mx-auto yang SUDAH ADA di CSS Anda --}}
            <div class="product max-w-[1000px] mx-auto">
                
                {{-- Judul dan Badge (ditaruh di atas) --}}
               <div class="flex flex-col gap-[14px] items-center text-center"> 
                    <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $about->type }} Kami</p>
                    <h2 class="font-bold text-2xl leading-[30px] lg:text-4xl lg:leading-[45px]">{{ $about->name }}</h2>
                </div>

                {{-- Container untuk float (Menggunakan .clearfix yang SUDAH ADA) --}}
                <div class="clearfix">
                    
                    {{-- Gambar (dibuat float ke kiri) --}}
                    {{-- Menggunakan kelas-kelas baru: sm:w-[470px], float-left, mr-6, mb-4, shadow-lg --}}
                    <div class="w-full sm:w-[470px] float-left mr-6 mb-4 shrink-0 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $about->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail"> {{--<- object-cover SUDAH ADA --}}
                    </div>
                    
                    {{-- 👇 INI BLOK ANDA, MENGGUNAKAN .article-content (bukan prose) 👇 --}}
                    @if($about->content)
                    {{-- Menggunakan .article-content (dari CSS Anda) dan .text-justify, .mt-4 (dari CSS baru) --}}
                    <div class="article-content text-justify mt-4 leading-relaxed lg:leading-normal">
                        {!! $about->content !!}
                    </div>
                    @endif
                    {{-- 👆 BATAS AKHIR BLOK ANDA 👆 --}}

                </div>
            </div>

        @else

            {{-- ======================================================= --}}
            {{-- 2. LAYOUT 2 KOLOM (ASLI) UNTUK VISI, MISI, DLL. --}}
            {{-- ======================================================= --}}
            
            <div class="product flex flex-wrap-reverse lg:flex-nowrap justify-center items-center gap-10 lg:gap-[60px] even:lg:flex-row-reverse">
                <div class="w-full lg:w-[470px] h-[300px] lg:h-[550px] flex shrink-0 overflow-hidden rounded-2xl">
                    <img src="{{ asset('storage/' . $about->thumbnail) }}" class="w-full h-full object-contain" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-6 lg:gap-[30px] py-0 lg:py-[50px] h-fit w-full lg:max-w-[500px]">
                    <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $about->type }} Kami</p>
                    <div class="flex flex-col gap-[10px]">
                        <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">{{ $about->name }}</h2>
                        
                        {{-- Keypoints (untuk Visi/Misi) --}}
                       <div class="flex flex-col gap-4">
                            @forelse($about->keypoints as $keypoint)
                            <div class="flex items-center gap-[10px]">
                                <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="icon">
                                </div>
                                <p class="leading-relaxed lg:leading-[26px] font-semibold">{{ $keypoint->keypoint }}</p>
                            </div>
                            @empty
                            @endforelse
                        </div>
                        
                        {{-- 👇 INI BLOK ANDA, JUGA DIGANTI MENJADI .article-content 👇 --}}
                        @if($about->content)
                        <div class="article-content mt-4 leading-relaxed lg:leading-normal">
                            {!! $about->content !!}
                        </div>
                        @endif
                        {{-- 👆 BATAS AKHIR BLOK ANDA 👆 --}}
                    </div>
                </div>
            </div>

        @endif

    @empty
        <p class="text-cp-black text-center">No about information found.</p>
    @endforelse

{{-- ... Sisa kode (PetaDesa, dll) biarkan di bawah sini ... --}}
  </div>

  <div id="PetaDesa" class="container max-w-[1130px] mx-auto flex flex-col gap-6 lg:gap-[30px] items-center text-center mt-10 lg:mt-20 p-6 lg:p-0">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">PETA WILAYAH</p>
        
        @if($peta_desa)
            <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">{{ $peta_desa->title }}</h2>
            @if($peta_desa->description)
                <p class="leading-relaxed lg:leading-[30px] text-cp-black max-w-[600px] text-justify">{{ $peta_desa->description }}</p>
            @endif
            
            {{-- Wrapper untuk gambar agar responsif dan memiliki border --}}
            <div class="w-full max-w-[1130px] mx-auto rounded-[20px] overflow-hidden border border-[#E8EAF2] shadow-[0_10px_30px_0_#D1D4DF40] mt-5 h-[300px] lg:h-auto">
                <img src="{{ asset('storage/' .  $peta_desa->image) }}" class="w-full h-full object-contain" alt="{{ $peta_desa->title }}">
            </div>
        @else
            {{-- Tampilan jika peta belum di-upload --}}
            <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">Peta Desa</h2>
            <p class="text-cp-black leading-relaxed">Peta desa belum diunggah oleh administrator.</p>
        @endif
    </div>
    </div>

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
@endpush
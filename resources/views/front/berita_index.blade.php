@extends('front.layouts.app')

@section('content')
    {{-- Header dengan background tinggi seperti team page --}}
    <div id="header" class="bg-[#F6F7FA] relative h-[400px] lg:h-[600px] -mb-[250px] lg:-mb-[388px]">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-50 p-6 lg:pt-10">
          <x-navbar/>
        </div>
        {{-- Decorative Background Text --}}
        <div class="absolute inset-0 flex items-center justify-center overflow-hidden opacity-5">
            <p class="font-extrabold text-[250px] leading-[375px] text-center text-cp-green">BERITA</p>
        </div>
    </div>

    {{-- Konten utama dengan z-10 agar tampil di atas background --}}
    <div id="Berita-Index" class="w-full relative z-10">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10 p-6 lg:p-0">
            
            {{-- 1. Bagian Header (Breadcrumb & Judul) --}}
            <div class="flex flex-col gap-[30px] items-center">
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                    <p class=" last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
                    <span class="text-black">/</span>
                    <p class="last-of-type:text-cp-black last-of-type:font-semibold">Galeri</p>
                </div>
                
                <div class="flex flex-col gap-[14px] items-center text-center">
                    <h2 class="text-cp-green font-bold text-3xl leading-[30px] lg:text-4xl lg:leading-[45px] text-center">Informasi Desa Walewangko</h2>
                    <p class="font-semibold text-center leading-[30px] max-w-[600px]">Laporan kegiatan, program, dan keindahan Desa Walewangko dalam berita.</p>
                </div>
            </div>

            {{-- 2. Bagian Konten (Grid Berita) --}}
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-[30px] justify-center">
                @forelse($berita as $item)
                <div class="card bg-white flex flex-col h-full rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300 overflow-hidden">
                    <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
                        <img src="{{ asset('storage/' .  $item->thumbnail) }}" class="object-cover object-center w-full h-full" alt="thumbnail">
                    </div>
                    <div class="flex flex-col p-[30px] gap-[14px]">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-200">
                                <img src="{{ asset('assets/icons/profile.svg') }}" class="w-full h-full object-cover" alt="avatar">
                            </div>
                            <p class="text-smy">{{ $item->created_at->format('d M Y') }} • oleh {{ $item->penulis->name }}</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-bold text-xl leading-[30px]">{{ $item->judul }}</p>
                            <p class="text-black">{{ Str::limit($item->ringkasan, 100) }}</p>
                        </div>
                        <a href="{{ route('front.berita_detail', $item->slug) }}" class="font-semibold text-cp-dark-blue">Baca Selengkapnya</a>
                    </div>
                </div>
                @empty
                <div class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4 flex flex-col items-center gap-4 py-10">
                    <div class="w-20 h-20 flex shrink-0">
                        <img src="{{asset('assets/icons/note-favorite.svg')}}" class="w-full h-full object-contain opacity-50" alt="empty">
                    </div>
                    <p class="text-black text-center">Belum ada berita untuk ditampilkan.</p>
                </div>
                @endforelse
            </div>

            {{-- 3. Bagian Pagination --}}
            <div class="mt-10">
                {{ $berita->links() }}
            </div>

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
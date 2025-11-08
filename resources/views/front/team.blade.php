@extends('front.layouts.app')
@section('content')

  <div id="header" class="bg-[#F6F7FA] relative h-[600px] -mb-[388px]">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
  <x-navbar/>
    </div>
  </div>
  <div id="Teams" class="w-full px-[10px] relative z-10">
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center">
      <div class="flex flex-col gap-[50px] items-center">
        <div class="breadcrumb flex items-center justify-center gap-[30px]">
          <p class="text-black last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
          <span class="text-black">/</span>
          <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Aparat Desa</p>
        </div>
        <div class="flex flex-col gap-[14px] items-center text-center">
          <h2 class="font-bold text-cp-green text-4xl leading-[45px] text-center">Aparat Desa Walewangko</h2>
          <p class="text-black font-bold text-center leading-[30px] max-w-[600px]">Berbagi Mimpi Yang Sama Menyejahterakan Desa Walewangko</p>
        </div>
      </div>
      <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
        @forelse($teams as $team)
        <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
            <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
              <img src="{{ asset('storage/' .  $team->avatar) }}" class="object-cover w-full h-full object-center" alt="photo">
            </div>
          </div>
          <div class="flex flex-col gap-1 text-center">
            <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
            <p class="text-black">{{$team->occupation}}</p>
          </div>
          <div class="flex items-center justify-center gap-[10px]">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/icons/global.svg" alt="icon">
            </div>
            <p class="text-cp-dark-blue font-semibold">{{$team->location}}</p>
          </div>
        </div>
        @empty
          <p>No team members found.</p>
        @endforelse
      </div>
    </div>
  </div>
  <div id="Awards" class="container max-w-full mx-auto flex flex-col gap-[30px] mt-20 bg-white">
    <div class="container max-w-[1000px] mx-auto py-10">
      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-[14px]">
          <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">PRESTASI KAMI</p>
          <h2 class="font-bold text-cp-green text-4xl leading-[45px]">Melayani Sepenuh Hati<br>Meraih Prestasi</h2>
        </div>
      </div>
      <div class="awards-card-container grid grid-cols-1 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
        @forelse ($penghargaans as $penghargaan)
        <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[55px] h-[55px] flex shrink-0">
            <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
          </div>
          <hr class="border-[#E8EAF2]">
          <p class="font-bold text-xl leading-[30px]">{{ $penghargaan->name}}</p>
          <hr class="border-[#E8EAF2]">
          <p class="text-black">{{ $penghargaan->lokasi_tahun }}</p>
        </div>
        @empty
          <p class="text-white">No Awards available at the moment.</p>
        @endforelse
      </div>
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


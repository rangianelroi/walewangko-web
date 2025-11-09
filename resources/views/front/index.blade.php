@extends('front.layouts.app')
@section('content')
  <div id="header" class="bg-[#F6F7FA] relative overflow-hidden min-h-screen w-full">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10 p-4 lg:pt-10">
      <x-navbar/>
      @forelse ($hero_section as $hero)
        <input type="hidden" name="path_video" id="path_video" value="{{ $hero->path_video }}">
        <div id="Hero" class="flex flex-col gap-[30px] mt-10 lg:mt-20 pb-20">
          <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit">
            <div class="w-5 h-5 flex shrink-0 overflow-hidden">
              <img src="{{asset('assets/icons/crown.svg')}}" class="object-contain" alt="icon">
            </div>
            <p class="font-semibold text-sm">{{ $hero->achievement }}</p>
          </div>
          <div class="flex flex-col gap-[10px]">
            <h1 class="font-extrabold text-4xl leading-[45px] lg:text-[50px] lg:leading-[65px] max-w-[536px]">{{ $hero->heading }}</h1>
            <p class="text-black font-semibold leading-[30px] max-w-[437px]">{{ $hero->subheading }}</p>
          </div>
          <div class="flex flex-col sm:flex-row items-center gap-4">
            <a href="" class="bg-[#4A3728] p-5 w-full sm:w-fit justify-center text-center rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Explore Now</a>
            <button class="bg-[#2F5233] p-5 w-full sm:w-fit justify-center rounded-xl font-bold text-white flex items-center gap-[10px]" onclick="{modal.show()}">
              <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                <img src="{{asset('assets/icons/play-circle.svg')}}" class="w-full h-full object-contain" alt="icon">
              </div>
              <span>Watch Video</span>
            </button>
          </div>
        </div>
    </div>
    <div class="absolute w-full h-full top-0 right-0 overflow-hidden z-0">
        <img src="{{ asset('storage/' . $hero->banner)}}" class="object-cover w-full h-full object-center" alt="banner">
    </div>
      @empty
      <p class="text-black">No hero section available at the moment.</p>
      @endforelse 
  </div>
  
  <div id="SalamKumtua" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20 p-4 lg:p-0">
    <div class="flex flex-col gap-[14px] items-center text-center">
      <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">SALAM KUMTUA</p>
      <h2 class="font-bold text-2xl leading-[30px] lg:text-4xl lg:leading-[45px]">Pesan Dari Hukum Tua<br>Desa Walewangko</h2>
    </div>

    @if($salam_kumtua)
    <div class="salam-content flex flex-wrap lg:flex-nowrap items-center gap-[30px] lg:gap-[60px] bg-white rounded-[20px] p-5 lg:p-[30px] shadow-[0_10px_30px_0_#D1D4DF40] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
      <div class="w-full h-[200px] lg:w-[470px] lg:h-[550px] flex shrink-0 overflow-hidden rounded-[18px]">
        <img src="{{ asset('storage/' .  $salam_kumtua->foto) }}" class="w-full h-full object-cover object-center" alt="{{ $salam_kumtua->nama_hukum_tua }}">
      </div>

      <!-- Konten Pesan -->
      <div class="flex flex-col gap-[30px] flex-1">
        <div class="flex items-center gap-3">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{asset('assets/icons/cup-blue.svg')}}" class="object-contain w-full h-full" alt="icon">
          </div>
          <div class="flex flex-col">
            <p class="font-bold text-2xl leading-[30px] text-cp-green">{{ $salam_kumtua->nama_hukum_tua }}</p>
            <p class="text-cp-green font-semibold">Hukum Tua Desa Walewangko</p>
          </div>
        </div>

        <div class="relative pt-[27px] pl-[30px]">
          <div class="absolute top-0 left-0 w-10 h-10">
            <img src="{{asset('assets/icons/quote.svg')}}" class="object-contain" alt="quote">
          </div>
          <div id="salam-content-wrapper" class="text-sm leading-[26px] lg:text-lg lg:leading-[30px] text-black relative z-10">
              {!! $salam_kumtua->pesan !!}
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="flex flex-col items-center gap-4 py-10">
      <div class="w-20 h-20 flex shrink-0">
        <img src="{{asset('assets/icons/document-text.svg')}}" class="w-full h-full object-contain opacity-50" alt="empty">
      </div>
      <p class="text-cp-light-grey text-center">Belum ada pesan dari Hukum Tua.</p>
    </div>
    @endif
  </div>

  <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20 p-4 lg:p-0">
    <h2 class="font-bold text-lg">Jejaring dan Kemitraan Kami</h2>
    <div class="logo-container flex flex-wrap gap-5 justify-center">
       @forelse($clients as $client)
          <div class="logo-card h-[100px] w-full sm:w-fit justify-center flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
            <img src="{{ asset('storage/' . $client->logo)}}" class="object-contain w-full h-full" alt="logo">
          </div>
    </div>
        @empty
          <p>No team members found.</p>
        @endforelse
  </div>

  <div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20 p-4 lg:p-0">
    <div class="flex items-center justify-between">
      <div class="flex flex-col gap-[14px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">PROGRAM UNGGULAN</p>
        <h2 class="font-bold text-2xl leading-[30px] lg:text-4xl lg:leading-[45px]">Program Terbaik <br> Untuk Desa Walewangko</h2>
      </div>
    </div>
    <div class="flex flex-wrap items-center gap-[30px] justify-center">

      @forelse($principles as $principle)
      <div class="card w-full sm:w-[356.67px] flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
          <img src="{{ asset('storage/' . $principle->thumbnail)}}" class="object-cover object-center w-full h-full" alt="thumbnails">
        </div>
        <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{ asset('storage/' . $principle->icon)}}" class="w-full h-full object-contain" alt="icon">
          </div>
          <div class="flex flex-col gap-1">
            <p class="title font-bold text-xl leading-[30px]">{{ $principle->name }}</p>
            <p class="leading-[30px] text-cp-black">{{ $principle->subtitle }}</p>
          </div>
        </div>
      </div>
      @empty
      <p class="text-cp-black">No principles available at the moment.</p>
      @endforelse

    </div>
  </div>

  <div id="Stats" class="bg-cp-black w-full mt-20">
    <div class="container max-w-[1000px] mx-auto py-10 p-4 lg:p-0">
      <div class="flex flex-wrap items-center justify-center gap-[30px]">
          @forelse($statistics as $statistic)
            <div class="card w-full sm:w-[256px] flex flex-col items-center gap-[10px] text-center">
              <div class="mt-10 w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                <img src="{{ asset('storage/' .  $statistic->icon) }}" class="object-contain w-full h-full" alt="icon">
              </div>
            <p class="text-white font-bold text-4xl leading-[54px]">{{ $statistic->goal }}</p>
              <p class="text-white">{{ $statistic->name }}</p>
            </div>
            @empty
            <p class="text-white">No statistics available at the moment.</p>q
          @endforelse
      </div>
    </div>
  </div>

  <div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-10 lg:gap-20 mt-20 p-6 lg:p-0">
    @forelse($products as $product)
    <div class="product flex flex-wrap justify-start lg:justify-center items-center gap-6 lg:gap-[60px] even:flex-row-reverse">
     <div class="w-full h-[240px] lg:w-[470px] lg:h-[550px] flex shrink-0 overflow-hidden rounded-xl bg-white border border-[#E8EAF2]">
       <img src="{{ asset('storage/' . $product->thumbnail)}}" class="w-full h-full object-contain" alt="thumbnail">
      </div>
      <div class="flex flex-col gap-5 lg:gap-[30px] py-0 lg:py-[50px] h-fit max-w-[500px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $product->tagline }}</p>
        <div class="flex flex-col gap-[10px]">
          <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">{{ $product->name }}</h2>
          <p class="leading-relaxed lg:leading-[30px] text-cp-black">{{ $product->about }}</p>
        </div>
        <a href="{{ route('front.appointment')}}" class="bg-cp-dark-blue p-[10px_16px] lg:p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Hubungi Kami</a>
      </div>
    </div>
      @empty
      <p class="text-cp-black">No products available at the moment.</p>
    @endforelse
  </div>

  <div id="Teams" class="bg-[#F6F7FA] w-full py-16 lg:py-20 p-6 lg:px-[10px] mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] items-center">
      <div class="flex flex-col gap-[14px] items-center">
        <p class="badge w-fit bg-cp-pale-blue text-cp-green p-[8px_16px] rounded-full uppercase font-bold text-sm">Aparatur Desa Walewangko</p>
        <h2 class="font-bold text-2xl leading-[30px] lg:text-4xl lg:leading-[45px] text-center">Berbagi Mimpi Yang Sama <br> Menyejahterakan Desa Walewangko</h2>
      </div>
      <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">

        @forelse($teams as $team)
        <div class="card bg-white flex flex-col h-full justify-center items-center p-6 lg:p-[30px] lg:px-[29px] gap-6 lg:gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
            <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
              <img src="{{ asset('storage/' . $team->avatar)}}" class="object-cover w-full h-full object-center" alt="photo">
            </div>
          </div>
          <div class="flex flex-col gap-1 text-center">
            <p class="font-bold text-xl leading-[30px]">{{ $team->name }}</p>
            <p class="text-cp-black">{{ $team->occupation }}</p>
          </div>
          <div class="flex items-center justify-center gap-[10px]">
            <div class="w-6 h-6 flex shrink-0">
              <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
            </div>
            <p class="text-cp-dark-blue font-semibold">{{ $team->location }}</p>
          </div>
        </div>
        @empty
        <p class="text-cp-black col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4 text-center">No team members available at the moment.</p>
        @endforelse
        
        <a href="{{ route('front.team') }}" class="view-all-card">
          <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="{{asset('assets/icons/profile-2user.svg')}}" alt="icon">
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">View All</p>
              <p class="text-cp-green">Our Great People</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div id="Testimonials" class="w-full flex flex-col gap-10 lg:gap-[50px] items-center mt-20 p-6 lg:p-0">
    <div class="flex flex-col gap-[14px] items-center text-center">
      <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">APA KATA MEREKA?</p>
      <h2 class="font-bold text-2xl leading-[30px] lg:text-4xl lg:leading-[45px] text-center">Dari Partner dan Masyarakat<br>Untuk Desa Walewangko</h2>
    </div>
    <div class="main-carousel w-full">

      @forelse ($testimonials as $testimonial)
      <div class="carousel-card container max-w-[1130px] w-full flex flex-wrap justify-between items-center lg:mx-[calc((100vw-1130px)/2)]">
        
        <div class="testimonial-container flex flex-col gap-10 lg:gap-[112px] w-full lg:w-[565px]">
          <div class="flex flex-col gap-6 lg:gap-[30px]">
            <div class="h-[68px] overflow-hidden">
              <img src="{{ asset('storage/' . $testimonial->client->logo)}}" class="object-contain h-full w-full" alt="icon">
            </div>
            <div class="relative pt-[27px] pl-5 lg:pl-[30px]">
              <div class="absolute top-0 left-0">
                <img src="{{asset('assets/icons/quote.svg')}}" alt="icon">
              </div>
              <p class="font-semibold text-xl leading-relaxed lg:text-2xl lg:leading-[46px] relative z-10">{{ $testimonial->message }}</p>
            </div>
            <div class="flex flex-wrap gap-4 items-center justify-between pl-5 lg:pl-[30px]">
              <div class="flex items-center gap-6">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
                  <img src="{{ asset('storage/' . $testimonial->client->avatar)}}" class="w-full h-full object-cover" alt="photo">
                </div>
                <div class="flex flex-col justify-center gap-1">
                  <p class="font-bold">{{ $testimonial->client->name }}</p>
                  <p class="text-sm text-cp-black opacity-60">{{$testimonial->client->occupation}}</p>
                </div>
              </div>
              <div class="flex flex-nowrap">
                </div>
            </div>
          </div>
          <div class="carousel-indicator flex items-center justify-center gap-2 h-4 shrink-0">
          </div>
        </div>

        <div class="testimonial-thumbnail w-full h-[200px] lg:w-[470px] lg:h-[550px] rounded-[20px] overflow-hidden bg-[#D9D9D9]">
          <img src="{{ asset('storage/' . $testimonial->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
        </div>

      </div> @empty
      <p class="text-cp-black text-center p-6">No testimonials available at the moment.</p>
      @endforelse
  
    </div>
  </div>

  <div id="Awards" class="container max-w-full mx-auto flex flex-col gap-[30px] mt-20 bg-cp-black">
   <div class="container max-w-[1000px] mx-auto py-16 lg:py-10 px-6 lg:px-0">
      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-[14px]">
          <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">PRESTASI KAMI</p>
          <h2 class="font-bold text-white text-4xl leading-[45px]">Melayani Sepenuh Hati<br>Meraih Prestasi</h2>
        </div>
      </div>
      <div class="awards-card-container grid grid-cols-1 mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
        @forelse ($penghargaans as $penghargaan)
        <div class="card bg-white flex flex-col h-full p-6 lg:p-[30px] gap-6 lg:gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[55px] h-[55px] flex shrink-0">
            <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
          </div>
          <hr class="border-[#E8EAF2]">
          <p class="font-bold text-xl leading-[30px]">{{ $penghargaan->name}}</p>
          <hr class="border-[#E8EAF2]">
          <p class="text-cp-black">{{ $penghargaan->lokasi_tahun }}</p>
        </div>
        @empty
          <p class="text-white text-center col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4">No Awards available at the moment.</p>
        @endforelse
      </div>
    </div>
  </div>

  <div id="Berita" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20 p-6 lg:p-0">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex flex-col gap-[14px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">BERITA DESA</p>
        <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">Informasi Terbaru<br>Desa Walewangko</h2>
      </div>
      <a href="#" class="bg-cp-black p-[10px_16px] lg:p-[14px_20px] w-fit rounded-xl font-bold text-white text-center hidden sm:block">Lihat Semua</a>
   </div>
 
   <div class="grid grid-cols-1 md:grid-cols-3 gap-[30px]">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-[30px]">
      @forelse($berita_terbaru as $berita)
      <div class="card flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
          <img src="{{ asset('storage/' .  $berita->thumbnail) }}" class="object-cover object-center w-full h-full" alt="thumbnail">
        </div>
        <div class="flex flex-col p-6 lg:p-[30px] gap-[14px]">
          <div class="flex items-center gap-2">
            <div class="w-5 h-5 flex shrink-0 overflow-hidden">
              <img src="{{asset('assets/icons/calendar.svg')}}" class="object-contain" alt="icon">
            </div>
            <p class="text-cp-black text-sm">{{ $berita->created_at->format('d M Y') }} • oleh {{ $berita->penulis->name }}</p>
          </div>
          <div class="flex flex-col gap-1">
            <p class="title font-bold text-xl leading-[30px] text-cp-green">{{ $berita->judul }}</p>
            <p class="leading-[30px] text-cp-black">{{ Str::limit($berita->ringkasan, 100) }}</p>
          </div>
          <a href="{{ route('front.berita_detail', $berita->slug) }}" class="font-semibold text-cp-dark-blue">Baca Selengkapnya</a>
        </div>
      </div>
      @empty
      <div class="col-span-1 md:col-span-3 flex flex-col items-center gap-4 py-10">
        <p class="text-cp-light-grey text-center">Belum ada berita untuk ditampilkan.</p>
      </div>
      @endforelse
    </div>
    <a href="#" class="bg-cp-black p-[10px_16px] w-full rounded-xl font-bold text-white text-center mx-auto block sm:hidden">Lihat Semua</a>
  </div>

  <div id="FAQ" class="bg-[#F6F7FA] w-full py-16 lg:py-20 p-6 lg:px-[10px] mt-20 -mb-20">
    <div class="container max-w-[1000px] mx-auto">
      <div class="flex flex-col lg:flex-row gap-10 lg:gap-[70px] items-center">
          <div class="flex flex-col gap-[30px] w-full lg:w-auto">
              <div class="flex flex-col gap-[10px]">
                  <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px] text-center lg:text-left">Tanya Jawab Umum</h2>
              </div>
              <a href="{{ route('front.appointment')}}" class="p-[10px_16px] lg:p-[14px_20px] bg-cp-black rounded-xl text-white w-full sm:w-fit font-bold text-center hidden sm:block">Hubungi Kami</a>
          </div>
          <div class="flex flex-col gap-5 lg:gap-[30px] sm:w-[603px] shrink-0 w-full">
              <div class="flex flex-col p-4 lg:p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                      <span class="font-bold text-sm leading-[27px] text-left lg:text-lg">Kapan jam operasional dan pelayanan di Kantor Hukum Tua?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-1" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the max level so that we chose the best one from Jakarta, Indonesia will also protect post building finished completed ahead one.</p>
                  </div>
              </div>
              <div class="flex flex-col p-4 lg:p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                      <span class="font-bold text-sm leading-[27px] text-left lg:text-lg">Kapan waktu terbaik untuk mengunjungi Desa Walewangko?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-2" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the max level so that we chose the best one from Jakarta, Indonesia will also protect post building finished completed ahead one.</p>
                  </div>
              </div>
             <div class="flex flex-col p-4 lg:p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                      <span class="font-bold text-sm leading-[27px] text-left lg:text-lg">Apa potensi ekonomi atau sumber daya alam utama yang sedang dikembangkan di desa ini?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-3" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the max level so that we chose the best one from Jakarta, Indonesia will also protect post building finished completed ahead one.</p>
                  </div>
              </div>
              <div class="flex flex-col p-4 lg:p-5 rounded-2xl bg-white w-full">
                  <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                      <span class="font-bold text-sm leading-[27px] text-left lg:text-lg">Berapa jumlah penduduk dan apa mata pencaharian utama masyarakat Desa Walewangko saat ini?</span>
                      <div class="arrow w-9 h-9 flex shrink-0">
                          <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                      </div>
                  </button>
                  <div id="accordion-faq-4" class="accordion-content hide">
                      <p class="leading-[30px] text-cp-light-grey pt-[14px]">We want to protect our and clients assets to the max level so that we chose the best one from Jakarta, Indonesia will also protect post building finished completed ahead one.</p>
                  </div>
              </div>
              <a href="{{ route('front.appointment')}}" class="p-[10px_16px] bg-cp-black rounded-xl text-white w-full font-bold text-center block sm:hidden mt-8">Hubungi Kami</a>
          </div>
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
  <div id="video-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full lg:w-1/2 max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-[20px] overflow-hidden shadow">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                  <h3 class="text-xl font-semibold text-cp-black">
                      Company Profile Video
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" onclick="{modal.hide()}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="">
                <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src="" title="Demo Project Laravel Portfolio" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
          </div>
      </div>
  </div>

@endsection

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  @push('after-scripts')
  {{-- JavaScript --}}
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
  <script src="{{ asset('js/carousel.js') }}"></script>
  <script src="{{ asset('js/accordion.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="{{ asset('js/modal-video.js') }}"></script>
  <script src="{{ asset('js/menu-toggle.js') }}"></script>

  
  @endpush
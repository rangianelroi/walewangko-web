<nav class="flex flex-wrap lg:flex-nowrap items-center justify-between bg-white p-5 lg:p-[20px_30px] rounded-[20px]">
    
    <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="{{asset('assets/logo/logo-minahasa.png')}}" class="object-contain w-full h-full" alt="logo">
        </div>
        <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-cp-green text-xl leading-[30px]">Desa Walewangko</p>
            <p id="CompanyTagline" class="text-sm text-cp-black">Kabupaten Minahasa</p>
        </div>
    </div>

    <button id="menu-toggle" type="button" class="inline-flex lg:hidden items-center justify-center p-2 rounded-md text-cp-green hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cp-green" aria-controls="mobile-menu" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div id="mobile-menu" class="w-full lg:flex lg:items-center lg:gap-[30px] lg:w-auto lg:mt-0 max-h-0 lg:max-h-none overflow-hidden transition-all ease-in-out duration-500">
        <ul class="flex flex-col lg:flex-row items-start lg:items-center gap-5 lg:gap-[30px] w-full lg:w-auto pt-4 lg:pt-0">
            <li class=" {{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300 w-full lg:w-auto">
                <a href="{{ route('front.index') }}">Home</a>
            </li>
            <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300 w-full lg:w-auto">
                <a href="{{ route('front.umkm') }}">UMKM</a>
            </li>
            <li class="{{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300 w-full lg:w-auto">
                <a href="{{ route('front.team') }}">Struktur</a>
            </li>
            <li class="{{ request()->routeIs('front.berita_index') || request()->routeIs('front.berita_detail') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300 w-full lg:w-auto">
                <a href="{{ route('front.berita_index') }}">Berita</a>
            </li>
            <li class="{{ request()->routeIs('front.gallery') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300 w-full lg:w-auto">
                <a href="{{ route('front.gallery') }}">Galeri</a>
            </li>
            <li class="{{ request()->routeIs('front.about') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300 w-full lg:w-auto">
                <a href="{{ route('front.about') }}">Tentang</a>
            </li>
            <li class="w-full lg:w-auto">
               <a href="{{ route('front.appointment')}}" class="bg-cp-dark-blue p-[10px_16px] lg:p-[14px_20px] w-full lg:w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white text-center mt-4 lg:mt-0 block">Hubungi Kami</a>
           </li>
        </ul>
    </div>
</nav>
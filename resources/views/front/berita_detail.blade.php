@extends('front.layouts.app')

@section('content')

<div class="bg-[#F6F7FA] w-full min-h-screen relative overflow-hidden">
    <!-- Header with Navbar -->
    <div class="relative pt-10 z-10">
        <div class="container max-w-[1130px] mx-auto px-4">
            <x-navbar/>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container max-w-[1130px] mx-auto px-4 py-20">
        <!-- Article Header -->
        <div class="flex flex-col gap-[30px] mb-16">
            <!-- Category Badge -->
            <div class="flex flex-col gap-[14px]">
                <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">Berita Desa</p>
                <h1 class="font-bold text-4xl md:text-[50px] leading-[54px] md:leading-[65px] text-cp-green max-w-[800px]">{{ $berita->judul }}</h1>
                <div class="text-black text-lg">Rincian lengkap informasi mengenai {{ $berita->judul }}</div>
            </div>

            <!-- Author and Metadata -->
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex shrink-0">
                        <img src="{{ asset('assets/icons/profile.svg') }}" class="w-full h-full object-cover p-2.5" alt="avatar">
                    </div>
                    <div>
                        <p class="font-semibold text-[15px]">{{ $berita->penulis->name }}</p>
                        <p class="text-black text-sm">{{ $berita->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            <div class="flex items-center gap-4 ml-auto">
                <!-- Estimated Reading Time -->
                <div class="flex items-center gap-2 text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">{{ ceil(str_word_count(strip_tags($berita->isi_konten)) / 200) }} min read</span>
                </div>
                <!-- Social Share Buttons -->
                <div class="flex items-center gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#1877F2] text-white hover:opacity-80 transition-opacity">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#1DA1F2] text-white hover:opacity-80 transition-opacity">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->url()) }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-[#25D366] text-white hover:opacity-80 transition-opacity">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M20.048 3.952A10.904 10.904 0 0012 0C5.373 0 0 5.373 0 12c0 2.127.555 4.194 1.61 6.02L0 24l6.144-1.611a11.93 11.93 0 005.856 1.537c6.627 0 12-5.373 12-12 0-3.205-1.248-6.219-3.952-8.484zm-8.048 18.12a9.937 9.937 0 01-5.032-1.37l-.36-.214-3.774.99.971-3.725-.235-.374A9.933 9.933 0 012 12c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10zm5.546-7.314c-.301-.15-1.767-.87-2.04-.967-.274-.099-.473-.148-.672.148-.199.295-.77.967-.944 1.164-.174.197-.347.222-.648.074-.3-.148-1.269-.467-2.417-1.488-.893-.795-1.497-1.775-1.672-2.073-.175-.298-.019-.458.13-.606.135-.133.299-.347.448-.52.15-.174.199-.298.298-.497.099-.198.05-.371-.025-.52-.075-.148-.672-1.615-.921-2.213-.241-.581-.486-.501-.672-.51-.172-.008-.371-.01-.57-.01-.199 0-.522.074-.795.371-.273.298-1.045 1.019-1.045 2.486 0 1.467 1.069 2.884 1.219 3.082.15.198 2.105 3.208 5.1 4.487.712.308 1.268.491 1.701.625.715.227 1.367.195 1.882.118.574-.078 1.767-.721 2.016-1.417.249-.695.249-1.29.174-1.415-.074-.124-.273-.198-.573-.347z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-[800px] mx-auto">
            <!-- Featured Image -->
            <div class="flex flex-col gap-[30px] mb-[50px]">
                <div class="rounded-2xl overflow-hidden bg-white shadow-[0_10px_30px_0_#D1D4DF40] h-[550px]">
                    <img src="{{ Storage::url($berita->thumbnail) }}" 
                         class="w-full h-full object-cover" 
                         alt="{{ $berita->judul }}">
                </div>
            </div>
            
            <!-- Article Content -->
            <article class="bg-white rounded-2xl p-5 mt-10 shadow-sm mb-[70px]">
                <div class="flex flex-col gap-[30px]">
                    <!-- Paragraf Utama -->
                    <div class="text-cp-black leading-relaxed article-content">
                      {!! $berita->isi_konten !!}
                  </div>
                </div>
            </article>
        </div>

        <!-- Back to Top Button -->
        <button id="backToTop" class="fixed bottom-8 right-8 bg-cp-dark-blue text-white w-10 h-10 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:bg-cp-light-blue">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

        @push('after-scripts')
        <script>
            // Back to Top Button functionality
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
        @endpush
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
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">WALEWANGKO</p>
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
          <p class="font-bold text-lg text-white">Products</p>
          <a href="" class="text-white hover:text-white transition-all duration-300">General Contract</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Building Assessment</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">3D Paper Builder</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Legal Constructions</a>
        </div>
        <div class="flex flex-col w-[200px] gap-3">
          <p class="font-bold text-lg text-white">About</p>
          <a href="" class="text-white hover:text-white transition-all duration-300">We’re Hiring</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Our Big Purposes</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Investor Relations</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Media Press</a>
        </div>
        <div class="flex flex-col w-[200px] gap-3">
          <p class="font-bold text-lg text-white">Useful Links</p>
          <a href="" class="text-white hover:text-white transition-all duration-300">Privacy & Policy</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Terms & Conditions</a>
          <a href="contact.html" class="text-white hover:text-white transition-all duration-300">Contact Us</a>
          <a href="" class="text-white hover:text-white transition-all duration-300">Download Template</a>
        </div>
      </div>
    </div>
    <div class="absolute -bottom-[135px] w-full">
      <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">WALE</p>
    </div>
  </footer>
@endsection
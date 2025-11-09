@extends('front.layouts.app')


@section('content')

    {{-- Header dengan Background Foto Tim (Tinggi Disesuaikan) --}}
    <div id="kkt-main-header" class="bg-[#2F5233] relative overflow-hidden" style="height: 100vh;">
        <div class="container max-w-[1130px] mx-auto relative z-50 p-6 lg:p-0 lg:pt-10">
            <x-navbar/>
            
            <div id="Hero" class="flex flex-col gap-[10px] items-center mt-32 lg:mt-80 pb-20">
                <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">
                    <div class="w-5 h-5 flex shrink-0 overflow-hidden">
                        <img src="{{asset('assets/icons/crown.svg')}}" class="object-contain" alt="icon">
                    </div>
                    <p class="font-semibold text-sm text-white uppercase">KKT 144 UNSRAT</p>
                </div>
                
                <div class="flex flex-col gap-[10px] items-center">
                    <h1 class="font-extrabold text-3xl leading-snug lg:text-[50px] lg:leading-[65px] max-w-[536px] text-white text-center" style="text-shadow: 0 0 40px rgba(255, 255, 255, 0.3), 0 4px 20px rgba(0, 0, 0, 0.8);">Our Amazing Team</h1>
                    <p class="text-white font-semibold text-center leading-[30px] max-w-[437px]" style="color: rgba(255, 255, 255, 0.9);">Mahasiswa Kuliah Kerja Terpadu Desa Walewangko</p>
                    <p class="text-white leading-[30px] text-center max-w-[437px]" style="color: rgba(255, 255, 255, 0.7);">Bersama membangun desa menuju digitalisasi dan kemajuan</p>
                </div>
            </div>
        </div>
        
        {{-- Background Image Carousel dengan Overlay --}}
        <div class="absolute w-full top-0 right-0 overflow-hidden z-0" style="height: 100vh">

            {{-- 1. Ini adalah wadah carousel untuk 5 foto --}}
            {{-- Class 'kkt-header-carousel' akan kita targetkan dengan JS --}}
            <div class="kkt-header-carousel w-full h-full">

                {{-- Ganti 5 path foto ini dengan 5 foto Anda --}}
                <div class="carousel-cell w-full h-full">
                    <img src="{{asset('assets/kkt/kkt-foto-1.jpg')}}" class="object-cover w-full h-full" alt="Foto Tim 1">
                </div>
                <div class="carousel-cell w-full h-full">
                    <img src="{{asset('assets/kkt/kkt-foto-2.jpg')}}" class="object-cover w-full h-full" alt="Foto Tim 2">
                </div>
                <div class="carousel-cell w-full h-full">
                    <img src="{{asset('assets/kkt/kkt-foto-3.jpg')}}" class="object-cover w-full h-full" alt="Foto Tim 3">
                </div>
                <div class="carousel-cell w-full h-full">
                    <img src="{{asset('assets/kkt/kkt-foto-4.jpg')}}" class="object-cover w-full h-full" alt="Foto Tim 4">
                </div>
                <div class="carousel-cell w-full h-full">
                    <img src="{{asset('assets/kkt/kkt-foto-5.jpg')}}" class="object-cover w-full h-full" alt="Foto Tim 5">
                </div>
            </div>

            {{-- 2. Ini adalah overlay gelap, sekarang berada di luar carousel --}}
            <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(47, 82, 51, 0.85) 0%, rgba(0, 0, 0, 0.75) 50%, rgba(47, 82, 51, 0.85) 100%);"></div>
        </div>
    </div>
    {{-- AKHIR HEADER --}}


    {{-- =============================================== --}}
    {{-- vvv DIV GABUNGAN BARU (KARTU + ABOUT) vvv --}}
    {{-- =============================================== --}}

    {{-- Section "About" (latar hijau) sekarang menjadi WADAH UTAMA.
        Class 'relative' ditambahkan agar 'z-10' pada kartu berfungsi. --}}
    <div id="About" class="bg-[#2F5233] w-full py-20 px-[10px] relative">
        
        {{-- Floating Stats Card (Dipindah ke sini) --}}
        {{-- 'margin-top' negatif menarik kartu ini ke atas --}}
        {{-- 'z-10' menempatkannya di atas latar hijau 'About' --}}
        <div class="z-10 relative -mt-[130px] lg:-mt-[110px]"> 
            <div class="container max-w-[1130px] mx-auto p-6 lg:p-0">
                <div class="bg-white rounded-[20px] p-[30px] shadow-[0_10px_30px_0_#D1D4DF40] border border-[#E8EAF2]">
                   <div class="flex flex-wrap justify-center lg:justify-between items-center gap-10">
                        
                        {{-- Kartu Statistik 1 --}}
                        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                            <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('assets/icons/calendar.svg')}}" class="object-contain w-full h-full" alt="icon">
                            </div>
                            <p class="text-cp-green font-semibold text-4xl leading-[54px]">22</p>
                            <p class="text-cp-black">Hari Pengabdian</p>
                        </div>

                        {{-- Kartu Statistik 2 --}}
                        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                            <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('assets/icons/cup-blue.svg')}}" class="object-contain w-full h-full" alt="icon">
                            </div>
                            <p class="text-cp-green font-semibold text-4xl leading-[54px]">7+</p>
                            <p class="text-cp-black">Program Kerja</p>
                        </div>

                        {{-- Kartu Statistik 3 --}}
                        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                            <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('assets/icons/global.svg')}}" class="object-contain w-full h-full" alt="icon">
                            </div>
                            <p class="text-cp-green font-semibold text-4xl leading-[54px]">Terlaksana</p>
                            <p class="text-cp-black">Keterangan</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        {{-- Konten 'About' (Logo Unsrat & Teks) --}}
        {{-- padding-top ini memberi jarak agar konten tidak tertimpa kartu --}}
        <div class="container max-w-[1130px] mx-auto pt-20"> 

            {{-- 
            Koreksi 1: Container Induk diubah dari 'flex-wrap' menjadi 'flex-col lg:flex-row'.
            Ini membuatnya bertumpuk di mobile (flex-col) dan berdampingan di desktop (lg:flex-row).
            --}}
            <div class="flex flex-col lg:flex-row justify-center items-center gap-10 lg:gap-[60px] text-white p-6 lg:p-0">
                
                {{-- ANAK 1: Logo (Tidak ada perubahan) --}}
                <div class="w-full lg:w-[470px] h-auto lg:h-[550px] flex shrink-0 overflow-hidden">
                    <img src="{{asset('assets/logo/logo-unsrat.png')}}" class="w-full h-full object-contain transition-all duration-300 hover:scale-105" alt="Logo UNSRAT">
                </div>
                
                {{-- 
                ANAK 2: Blok Teks
                Koreksi 2: Dihapus 'lg:flex-row' dari div ini.
                Div ini HARUS 'flex-col' di semua ukuran layar, agar badge selalu di atas judul.
                --}}
                <div class="flex flex-col gap-5 lg:gap-[30px] py-5 lg:py-[50px] h-fit w-full lg:max-w-[500px]">
                    
                    {{-- Badge (Item 1 dari flex-col) --}}
                    <p class="badge w-fit bg-white p-[8px_16px] rounded-full uppercase font-bold text-sm text-cp-green" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(255, 255, 255, 0.3);">PENGABDIAN MASYARAKAT</p>
                    
                    {{-- Grup Teks (Item 2 dari flex-col) --}}
                    <div class="flex flex-col gap-[10px]">
                        <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">Tentang Pengabdian Kami</h2>
                        <p class="text-justify leading-[30px]" style="color: rgba(255, 255, 255, 0.9);">Kami adalah tim mahasiswa dari Universitas Sam Ratulangi yang berdedikasi untuk menerapkan ilmu pengetahuan dan teknologi demi kemajuan Desa Walewangko. Website ini adalah salah satu program kerja utama kami di bidang digitalisasi desa.</p>
                        <p class="text-justify leading-[30px]" style="color: rgba(255, 255, 255, 0.9);">Selama 22 hari, kami berkolaborasi dengan perangkat desa dan masyarakat untuk mengembangkan potensi lokal, memperbaiki administrasi, dan menciptakan dampak positif yang berkelanjutan.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- =============================================== --}}
    {{-- ^^^ AKHIR DARI DIV GABUNGAN ^^^ --}}
    {{-- =============================================== --}}


    {{-- Dosen Pembimbing Lapangan --}}
    <div id="DPL" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20 p-6 lg:p-0">
        <div class="flex flex-col gap-[14px] items-center text-center">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">PEMBIMBING KAMI</p>
            <h2 class="font-bold text-3xl leading-snug lg:text-4xl lg:leading-[45px]">Dosen Pembimbing Lapangan</h2>
            <p class="text-cp-green max-w-[600px]">Membimbing dan mengarahkan kami selama pelaksanaan KKT di lapangan</p>
        </div>

        <div class="flex justify-center">
            <div class="bg-white p-6 lg:p-[30px] rounded-[20px] shadow-[0_10px_30px_0_#D1D4DF40] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300 w-full max-w-[700px] text-center flex flex-col items-center gap-5 lg:gap-[30px]">
                <div class="w-[150px] h-[150px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                    <div class="w-[140px] h-[140px] rounded-full overflow-hidden">
                        <img src="{{asset('assets/kkt/foto-dpl.jpg')}}" class="object-cover w-full h-full object-center" alt="DPL">
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-center">
                    <p class="font-bold text-2xl leading-[30px] text-cp-green">Dr. Drh. Albert Jootje Podung</p>
                    <p class="text-black font-semibold">Dosen Pembimbing Lapangan</p>
                    <p class="text-black text-sm">NIP: 196903131998031000</p>
                </div>

                <div class="flex items-center justify-center gap-[10px]">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{asset('assets/icons/cup-blue.svg')}}" alt="icon">
                    </div>
                    <p class="text-cp-light-blue font-semibold">Mentor Kami</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tim Mahasiswa KKT --}}
    <div id="Teams" class="bg-cp-pale-blue w-full py-20 px-[10px] mt-20">
        <div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] items-center">
            <div class="flex flex-col gap-[14px] items-center">
                <p class="badge w-fit bg-cp-black text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">ANGGOTA TIM</p>
                <h2 class="font-bold text-4xl leading-[45px] text-center">Mahasiswa KKT 144 Desa Walewangko</h2>
                <p class="text-cp-green max-w-[700px] text-center">Tim solid yang berkomitmen membawa perubahan positif untuk Desa Walewangko</p>
            </div>

            <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">

                {{-- Member Card 1 --}}
                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/abdul.jpg')}}" class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Abdul Onggi</p>
                        <p class="text-cp-green">Ilmu Pemerintahan</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Koordinator</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/johanes.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Rangian Elroi</p>
                        <p class="text-cp-green">Teknik Informatika</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Sekretaris</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/nurul.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Nurul Abdullah</p>
                        <p class="text-cp-green">Perencanaan Wilayah & Kota</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Bendahara</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/siri.jpg')}}" class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Silpa Siri'</p>
                        <p class="text-cp-green">Fisika</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Koordi. Bid. Program</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/sengkey.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Santa Sengkey</p>
                        <p class="text-cp-green">Matematika</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Anggota Bid. Program</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/jacob.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Einjilia Jacob</p>
                        <p class="text-cp-green">Administrasi Bisnis</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Koordinator Bid. Publikasi</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/viona.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Triviona Polak </p>
                        <p class="text-cp-green">Sastra Inggris</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Anggota Bid. Publikasi</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/bandulle.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Marcellino Bandule</p>
                        <p class="text-cp-green">Teknik Informatika</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Koordinator Bid. Pelaporan</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/sirait.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Lidya Sirait</p>
                        <p class="text-cp-green">Ilmu Tanah</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Anggota Bid. Program</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/wongkar.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Vischa Wongkar</p>
                        <p class="text-cp-green">Antropologi</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Koordinator Bid. Humas</p>
                    </div>
                </div>

                <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                        <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                            <img src="{{asset('assets/kkt/natalia.jpg')}}"  class="object-cover w-full h-full object-center" alt="photo">
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-xl leading-[30px] text-cp-black">Natalia Panebaren </p>
                        <p class="text-cp-green">Kesehatan Lingkungan</p>
                    </div>
                    <div class="flex items-center justify-center gap-[10px]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                        </div>
                        <p class="text-cp-dark-blue font-semibold">Anggota Bid. Humas</p>
                    </div>
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

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
@push('after-scripts')
{{-- JavaScript --}}
<script src="{{ asset('js/menu-toggle.js') }}"></script>
    {{-- Library untuk slider (Flickity) --}}
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    {{-- Plugin 'fade' untuk Flickity --}}
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>

    {{-- Script untuk inisialisasi carousel header KKT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var flkty = new Flickity('.kkt-header-carousel', {
                fade: true,             // Gunakan efek fade (ini yang Anda inginkan)
                wrapAround: true,       // Kembali ke awal setelah gambar terakhir
                autoPlay: 4000,         // Ganti gambar setiap 4 detik (4000ms)
                prevNextButtons: false, // Sembunyikan tombol next/prev
                pageDots: false,        // Sembunyikan titik-titik navigasi
                draggable: false,       // Nonaktifkan agar tidak bisa di-swipe/drag
                pauseAutoPlayOnHover: false // Terus berputar meskipun di-hover
            });
        });
    </script>
@endpush
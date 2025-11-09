<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // <- Tambahkan ini
use App\Models\WalewangkoStatistic; // <- Tambahkan ini
use App\Models\OurPrinciple; // <- Tambahkan ini
use App\Models\Product; // <- Tambahkan ini
use App\Models\OurTeam; // <- Tambahkan ini
use App\Models\Testimonial; // <- Tambahkan ini
use App\Models\HeroSection; // <- Tambahkan ini
use App\Models\WalewangkoAbout;
use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest; // ensure request is imported
use Illuminate\Support\Facades\DB; // DB used inside appointment_store
use App\Models\Berita;
use App\Models\Umkm;
use App\Models\ProjectClient;
use App\Models\Penghargaan;
use App\Models\SalamKumtua;
use App\Models\Gallery;
use App\Models\PetaDesa;

class FrontController extends Controller
{
    /**
     * Tampilkan halaman utama (homepage).
     */
    public function index(): View // <- Tambahkan method ini
    {
        $hero_section = HeroSection::orderByDesc('id')->take(1)->get();
        $statistics = WalewangkoStatistic::orderBy('id')->take(32)->get();
        $principles = OurPrinciple::orderByDesc('id')->take(4)->get();
        $products = Product::orderByDesc('id')->take(4)->get();
        $teams = OurTeam::orderBy('id')->take(4)->get();
        $testimonials = Testimonial::orderByDesc('id')->take(4)->get();

        // 2. TAMBAHKAN QUERY INI
        $berita_terbaru = Berita::with('penulis') // Ambil relasi penulis
                            ->where('status', 'published') // Hanya ambil yg sudah publish
                            ->orderByDesc('id') // Urutkan dari yg terbaru
                            ->take(3) // Ambil 3 saja
                            ->get();

         $umkms = Umkm::orderByDesc('id')->take(10)->get();

         $clients = ProjectClient::take(3)->get();

         $penghargaans = Penghargaan::orderByDesc('id')->take(10)->get();

         $salam_kumtua = SalamKumtua::orderByDesc('id')->first(); // <-- TAMBAHKAN INI
         

        return view('front.index', compact(
            'statistics', 'principles' , 'products', 'teams', 
            'testimonials', 'hero_section', 'berita_terbaru', 'umkms',
            'clients', 'penghargaans', 'salam_kumtua'
        ));
    }

    public function team(){
    $teams = OurTeam::take(30)->get();
    $penghargaans = Penghargaan::orderByDesc('id')->take(4)->get(); // Ambil 4 penghargaan
    return view('front.team', compact('teams', 'penghargaans'));
    }

    public function about(){
        $statistics = WalewangkoStatistic::orderByDesc('id')->take(4)->get();
        $abouts = WalewangkoAbout::take(2)->get();
        $peta_desa = PetaDesa::orderByDesc('id')->first();
        return view('front.about', compact('statistics', 'abouts', 'peta_desa'));
    }

    public function umkm(Request $request)
    {
        $query = Umkm::query();

        // Logika untuk filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        $umkms = $query->orderByDesc('id')->paginate(9);
        return view('front.umkm', compact('umkms'));
    }

    public function appointment(){
        $testimonials = Testimonial::orderByDesc('id')->take(4)->get();
        $products = Product::take(4)->get();
        return view('front.appointment', compact('testimonials', 'products'));
    }

    public function appointment_store(StoreAppointmentRequest $request){
        DB::transaction(function() use($request) {
            $validated = $request->validated();
            $newAppointment= Appointment::create($validated);
        });
        return redirect()->route('front.index');
    }

    // Method baru untuk Halaman Indeks Berita
    public function berita_index()
    {
        $berita = Berita::with('penulis')
                    ->where('status', 'published')
                    ->orderByDesc('id')
                    ->paginate(9); // Kita tampilkan 9 berita per halaman

        return view('front.berita_index', compact('berita'));
    }

    public function berita_detail($slug)
    {
        // Cari berita berdasarkan slug, atau tampilkan 404 jika tidak ketemu
        $berita = Berita::with('penulis')
                    ->where('slug', $slug)
                    ->where('status', 'published')
                    ->firstOrFail();
        
        // Kirim data ke view baru yang akan kita buat
        return view('front.berita_detail', compact('berita'));
    }

    public function gallery_index(Request $request)
    {
        $query = Gallery::query()->orderByDesc('date');

        // PERBAIKAN DI SINI
        if ($request->has('kategori') && $request->kategori != '') {
            // Gunakan nama kolom 'category' (database) 
            // untuk nilai dari parameter 'kategori' (URL)
            $query->where('category', $request->kategori);
        }

        $kategoris = Gallery::select('category')->distinct()->orderBy('category')->get()->pluck('category');

        $galleries = $query->paginate(12)->appends(request()->query());
        
        return view('front.gallery', compact('galleries', 'kategoris'));
    }
    
    public function kkt()
    {
        return view('front.kkt');
    }
}

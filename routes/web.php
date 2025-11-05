<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalewangkoStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\WalewangkoAboutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\SalamKumtuaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PetaDesaController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/team', [FrontController::class, 'team'])->name('front.team');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
// Form submission route for appointments (POST) and named correctly for blade: front.appointment_store
Route::post('/appointment/store', [FrontController::class, 'appointment_store'])->name('front.appointment_store');
// Route untuk menampilkan SEMUA berita (halaman indeks)
Route::get('/berita', [FrontController::class, 'berita_index'])->name('front.berita_index');
Route::get('/berita/{slug}', [FrontController::class, 'berita_detail'])->name('front.berita_detail');
Route::get('/umkm', [FrontController::class, 'umkm'])->name('front.umkm');
Route::get('/gallery', [FrontController::class, 'gallery_index'])->name('front.gallery');
Route::get('/kkt-144', [FrontController::class, 'kkt'])->name('front.kkt');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage statistic')->group(function () {
            Route::resource('statistics', WalewangkoStatisticController::class);
        });

        Route::middleware('can:manage products')->group(function() {
            Route::resource('products', ProductController::class);
        });
        Route::middleware('can:manage testimonials')->group(function(){
            Route::resource('principles', OurPrincipleController::class);
        });

        Route::middleware('can:manage testimonials')->group(function(){
            Route::resource('testimonials', TestimonialController::class);
        });

        Route::middleware('can:manage clients')->group(function(){
            Route::resource('clients', ProjectClientController::class);
        });
        Route::middleware('can:manage teams')->group(function(){
            Route::resource('teams', OurTeamController::class);
        });

        Route::middleware('can:manage abouts')->group(function(){
            Route::resource('abouts', WalewangkoAboutController::class);
        });

        Route::middleware('can:manage appointments')->group(function(){
            Route::resource('appointments', AppointmentController::class);
        });

        Route::middleware('can:manage hero sections')->group(function(){
            Route::resource('hero_sections', HeroSectionController::class);
        });

        Route::middleware('can:manage berita')->group(function(){
            Route::resource('berita', BeritaController::class) ->parameters([
                'berita' => 'berita'
            ]);;
        });

        Route::middleware('can:manage umkm')->group(function(){
            Route::resource('umkm', UmkmController::class);
        });

        Route::middleware('can:manage penghargaan')->group(function(){
        Route::resource('penghargaan', PenghargaanController::class);
        });

        Route::middleware('can:manage salam_kumtuas')->group(function(){
            Route::resource('salam_kumtuas', SalamKumtuaController::class);
        });

        Route::middleware('can:manage gallery')->group(function(){
            Route::resource('galleries', GalleryController::class);
        });
        
        Route::middleware('can:manage gallery')->group(function(){
            Route::resource('peta', PetaDesaController::class)->parameters([
                'peta' => 'petaDesa' // Ini penting agar route model binding berfungsi
            ]);;
        });

    });
});

require __DIR__.'/auth.php';

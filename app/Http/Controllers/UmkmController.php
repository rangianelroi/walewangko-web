<?php

namespace App\Http\Controllers;

// PASTIKAN SEMUA USE STATEMENTS INI ADA
use App\Models\Umkm;
use App\Http\Requests\StoreUmkmRequest;
use App\Http\Requests\UpdateUmkmRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // <-- Pastikan ini ada

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     * (Anda butuh ini untuk halaman /admin/umkm)
     */
    public function index()
    {
        $umkms = Umkm::orderByDesc('id')->paginate(10);
        return view('admin.umkm.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     * (INI METHOD YANG HILANG DAN MENYEBABKAN ERROR)
     */
    public function create()
    {
        return view('admin.umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUmkmRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // 1. Buat UMKM utama
            $newUmkm = Umkm::create($validated);

            // 2. Simpan galeri foto jika ada
            if ($request->hasFile('galeri_foto')) {
                foreach ($request->file('galeri_foto') as $file) {
                    $path = $file->store('umkm_galeri', 'public');
                    $newUmkm->fotos()->create(['foto_path' => $path]);
                }
            }
        });

        return redirect()->route('admin.umkm.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm)
    {
        // (Bisa dikosongkan)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUmkmRequest $request, Umkm $umkm)
    {
        DB::transaction(function () use ($request, $umkm) {
            $validated = $request->validated();
            
            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // 1. Update UMKM utama
            $umkm->update($validated);

            // 2. Tambahkan foto galeri baru jika ada
            if ($request->hasFile('galeri_foto')) {
                foreach ($request->file('galeri_foto') as $file) {
                    $path = $file->store('umkm_galeri', 'public');
                    $umkm->fotos()->create(['foto_path' => $path]);
                }
            }
        });
        
        return redirect()->route('admin.umkm.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        DB::transaction(function () use ($umkm) {
            $umkm->delete();
        });
        return redirect()->route('admin.umkm.index');
    }
}
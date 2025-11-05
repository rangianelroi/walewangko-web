<?php

// app/Http/Controllers/BeritaController.php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeritaRequest; // Gunakan request baru
use App\Http\Requests\UpdateBeritaRequest; // Gunakan request baru
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Import Str untuk membuat slug

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('penulis')->orderByDesc('id')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(StoreBeritaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Buat Slug dan tambahkan user_id
            $validated['slug'] = Str::slug($request->judul);
            $validated['user_id'] = auth()->id(); // Otomatis ambil ID admin yang login

            $newBerita = Berita::create($validated);
        });

        return redirect()->route('admin.berita.index');
    }

    public function show(Berita $berita)
    {
        // Biasanya tidak dipakai di admin, tapi biarkan saja
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(UpdateBeritaRequest $request, Berita $berita)
    {
        DB::transaction(function () use ($request, $berita) {
            $validated = $request->validated();

            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Update Slug jika judul berubah
            $validated['slug'] = Str::slug($request->judul);

            $berita->update($validated);
        });

        return redirect()->route('admin.berita.index');
    }

    public function destroy(Berita $berita)
    {
        DB::transaction(function () use ($berita) {
            $berita->delete();
        });
        return redirect()->route('admin.berita.index');
    }
}
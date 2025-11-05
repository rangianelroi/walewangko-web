<?php

namespace App\Http\Controllers;

use App\Models\PetaDesa;
use Illuminate\Http\Request; // Kita akan gunakan Request kustom
use App\Http\Requests\StorePetaDesaRequest; // (Buat ini di langkah 3)
use App\Http\Requests\UpdatePetaDesaRequest; // (Buat ini di langkah 3)
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PetaDesaController extends Controller
{
    public function index()
    {
        $petaDesaList = PetaDesa::orderByDesc('id')->paginate(10);
        return view('admin.peta.index', compact('petaDesaList'));
    }

    public function create()
    {
        return view('admin.peta.create');
    }

    public function store(StorePetaDesaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('peta_desa', 'public');
                $validated['image'] = $imagePath;
            }

            PetaDesa::create($validated);
        });

        return redirect()->route('admin.peta.index');
    }

    public function edit(PetaDesa $petaDesa) // Gunakan route model binding
    {
        // Ganti 'peta' dengan nama variabel yang benar
        return view('admin.peta.edit', ['petaDesa' => $petaDesa]);
    }

    public function update(UpdatePetaDesaRequest $request, PetaDesa $petaDesa) // Gunakan route model binding
    {
        DB::transaction(function () use ($request, $petaDesa) {
            $validated = $request->validated();

            if($request->hasFile('image')){
                // Hapus gambar lama jika ada
                if($petaDesa->image) {
                    Storage::disk('public')->delete($petaDesa->image);
                }
                
                $imagePath = $request->file('image')->store('peta_desa', 'public');
                $validated['image'] = $imagePath;
            }

            $petaDesa->update($validated);
        });

        return redirect()->route('admin.peta.index');
    }

    public function destroy(PetaDesa $petaDesa) // Gunakan route model binding
    {
        DB::transaction(function () use ($petaDesa) {
            if($petaDesa->image) {
                Storage::disk('public')->delete($petaDesa->image);
            }
            $petaDesa->delete();
        });
        
        return redirect()->route('admin.peta.index');
    }
}
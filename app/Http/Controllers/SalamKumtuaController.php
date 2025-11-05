<?php

namespace App\Http\Controllers;

use App\Models\SalamKumtua;
use App\Http\Requests\StoreSalamKumtuaRequest;
use App\Http\Requests\UpdateSalamKumtuaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SalamKumtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salamKumtuaList = SalamKumtua::orderByDesc('id')->paginate(10);
        return view('admin.salam_kumtuas.index', compact('salamKumtuaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.salam_kumtuas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalamKumtuaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('fotos_kumtua', 'public');
                $validated['foto'] = $fotoPath;
            }

            SalamKumtua::create($validated);
        });

        return redirect()->route('admin.salam_kumtuas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalamKumtua $salamKumtua)
    {
        return view('admin.salam_kumtuas.edit', compact('salamKumtua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalamKumtuaRequest $request, SalamKumtua $salamKumtua)
    {
        DB::transaction(function () use ($request, $salamKumtua) {
            $validated = $request->validated();

            if($request->hasFile('foto')){
                // Hapus foto lama jika ada
                if($salamKumtua->foto) {
                    Storage::disk('public')->delete($salamKumtua->foto);
                }
                
                $fotoPath = $request->file('foto')->store('fotos_kumtua', 'public');
                $validated['foto'] = $fotoPath;
            }

            $salamKumtua->update($validated);
        });

        return redirect()->route('admin.salam_kumtuas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalamKumtua $salamKumtua)
    {
        DB::transaction(function () use ($salamKumtua) {
            if($salamKumtua->foto) {
                Storage::disk('public')->delete($salamKumtua->foto);
            }
            $salamKumtua->delete();
        });
        
        return redirect()->route('admin.salam_kumtuas.index');
    }
}
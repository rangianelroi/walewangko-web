<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan; // Menggunakan Model baru
use Illuminate\Http\Request;
use App\Http\Requests\StorePenghargaanRequest; // Menggunakan Request baru
use App\Http\Requests\UpdatePenghargaanRequest; // Menggunakan Request baru
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; // Pastikan base controller di-import

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data penghargaan, bukan statistik
        $penghargaans = Penghargaan::orderByDesc('id')->paginate(10);
        // Mengarahkan ke view 'admin.penghargaan.index'
        return view('admin.penghargaan.index', compact('penghargaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengarahkan ke view 'admin.penghargaan.create'
        return view('admin.penghargaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenghargaanRequest $request) // Menggunakan StorePenghargaanRequest
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            // Membuat data Penghargaan baru
            $newPenghargaan = Penghargaan::create($validated);
        });

        // Kembali ke route 'admin.penghargaan.index'
        return redirect()->route('admin.penghargaan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghargaan $penghargaan) // Tipe data diubah ke Penghargaan
    {
        // Biasanya tidak digunakan di admin panel
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghargaan $penghargaan) // Tipe data diubah ke Penghargaan
    {
        // Mengarahkan ke view 'admin.penghargaan.edit'
        return view('admin.penghargaan.edit', compact('penghargaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenghargaanRequest $request, Penghargaan $penghargaan) // Request & Model diubah
    {
        DB::transaction(function () use ($request, $penghargaan) {
            $validated = $request->validated();

            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            // Update data penghargaan yang ada
            $penghargaan->update($validated);
        });

        // Kembali ke route 'admin.penghargaan.index'
        return redirect()->route('admin.penghargaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghargaan $penghargaan) // Tipe data diubah ke Penghargaan
    {
        DB::transaction(function () use ($penghargaan) {
            $penghargaan->delete();
        });
        // Kembali ke route 'admin.penghargaan.index'
        return redirect()->route('admin.penghargaan.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderByDesc('date')->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(StoreGalleryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            
            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('gallery_images', 'public');
                $validated['image'] = $imagePath;
            }

            Gallery::create($validated);
        });

        return redirect()->route('admin.galleries.index');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        DB::transaction(function () use ($request, $gallery) {
            $validated = $request->validated();

            if($request->hasFile('image')){
                // Hapus gambar lama
                if($gallery->image) {
                    Storage::disk('public')->delete($gallery->image);
                }
                
                $imagePath = $request->file('image')->store('gallery_images', 'public');
                $validated['image'] = $imagePath;
            }

            $gallery->update($validated);
        });

        return redirect()->route('admin.galleries.index');
    }

    public function destroy(Gallery $gallery)
    {
        DB::transaction(function () use ($gallery) {
            if($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->delete();
        });
        
        return redirect()->route('admin.galleries.index');
    }
}
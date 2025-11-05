<?php

namespace App\Http\Controllers;

use App\Models\WalewangkoAbout;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAboutRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateAboutRequest;



class WalewangkoAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = WalewangkoAbout::orderByDesc('id')->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        //return view('admin.statistics.create');
        //closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $newAbout = WalewangkoAbout::create($validated);

            if(!empty($validated['keypoints'])){
                foreach($validated['keypoints'] as $keypoint) {
                    // HANYA BUAT JIKA KEYPOINT TIDAK KOSONG
                    if (!is_null($keypoint) && $keypoint !== '') {
                        $newAbout->keypoints()->create([
                            'keypoint' => $keypoint
                        ]);
                    }
                }
            }
        });

        return redirect()->route('admin.abouts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WalewangkoAbout $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WalewangkoAbout $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, WalewangkoAbout $about)
    {
        DB::transaction(function () use ($request, $about) {
            $validated = $request->validated();

            if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $about->update($validated);

            //update keypoints
            if(!empty($validated['keypoints'])){
                $about->keypoints()->delete();
                foreach($validated['keypoints'] as $keypoint) {
                    // HANYA BUAT JIKA KEYPOINT TIDAK KOSONG
                    if (!is_null($keypoint) && $keypoint !== '') {
                        $about->keypoints()->create([
                            'keypoint' => $keypoint
                        ]);
                    }
                }
            }
        });

        return redirect()->route('admin.abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WalewangkoAbout $about)
    {
        DB::transaction(function () use ($about) {
            $about->delete();
        });
        return redirect()->route('admin.abouts.index');
    }
}

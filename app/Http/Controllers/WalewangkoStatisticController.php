<?php

namespace App\Http\Controllers;

use App\Models\WalewangkoStatistic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStatisticRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStatisticRequest;

class WalewangkoStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = WalewangkoStatistic::orderByDesc('id')->paginate(10);
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        //return view('admin.statistics.create');
        //closure-based transaction
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $newDataRecord = WalewangkoStatistic::create($validated);
        });

        return redirect()->route('admin.statistics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WalewangkoStatistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WalewangkoStatistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatisticRequest $request, WalewangkoStatistic $statistic)
    {
        DB::transaction(function () use ($request, $statistic) {
            $validated = $request->validated();

            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $statistic->update($validated);
        });

        return redirect()->route('admin.statistics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WalewangkoStatistic $statistic)
    {
        DB::transaction(function () use ($statistic) {
            $statistic->delete();
        });
        return redirect()->route('admin.statistics.index');
    }
}

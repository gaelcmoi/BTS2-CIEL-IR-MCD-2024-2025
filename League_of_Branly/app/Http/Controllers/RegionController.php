<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the regions.
     */
    public function index()
    {
        $regions = Region::orderBy('name')->get();
        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new region.
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created region in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:regions|max:255',
            'description' => 'nullable',
        ]);

        Region::create($validatedData);

        return redirect()->route('regions.index')->with('success', 'Region created successfully!');
    }

    /**
     * Display the specified region.
     */
    public function show(string $id)
    {
        $region = Region::find($id);
        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified region.
     */
    public function edit(string $id)
    {
        $region = Region::find($id);
        return view('regions.edit', compact('region'));
    }

    /**
     * Update the specified region in storage.
     */
    public function update(Request $request, string $id)
    {
        $region = Region::find($id);
        $region->update($request->all());
        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified region from storage.
     */
    public function destroy(string $id)
    {
        Region::find($id)->delete();
        return redirect()->route('regions.index');
    }
}

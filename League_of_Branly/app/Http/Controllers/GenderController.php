<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the genders.
     */
    public function index()
    {
        $genders = Gender::orderBy('name')->get();
        return view('genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new gender.
     */
    public function create()
    {
        return view('genders.create');
    }

    /**
     * Store a newly created gender in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:genders|max:255',
        ]);

        Gender::create($validatedData);

        return redirect()->route('genders.index')->with('success', 'Gender created successfully!');
    }

    /**
     * Display the specified gender.
     */
    public function show(string $id)
    {
        $gender = Gender::find($id);
        return view('genders.show', compact('gender'));
    }

    /**
     * Show the form for editing the specified gender.
     */
    public function edit(string $id)
    {
        $gender = Gender::find($id);
        return view('genders.edit', compact('gender'));
    }

    /**
     * Update the specified gender in storage.
     */
    public function update(Request $request, string $id)
    {
        $gender = Gender::find($id);
        $gender->update($request->all());
        return redirect()->route('genders.index');
    }

    /**
     * Remove the specified gender from storage.
     */
    public function destroy(string $id)
    {
        Gender::find($id)->delete();
        return redirect()->route('genders.index');
    }
}

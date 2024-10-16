<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use App\Models\Gender;
use App\Models\Position;
use App\Models\Specie;
use App\Models\Resource;
use App\Models\Range;
use App\Models\Region;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChampionController extends Controller
{
    /**
     * Display a listing of all champions.
     */
    public function index()
    {
        //$champions = Champion::with(['roles', 'region'])->get();
        $champions = Champion::all();
        return view('champions.index', compact('champions'));
    }

    public function classic()
    {
        $champions = Champion::with(['gender', 'species', 'resource', 'ranges', 'positions', 'regions'])->get();
    
        $genders = Gender::all();
        $species = Specie::all();
        $resources = Resource::all();
        $ranges = Range::all();
        $positions = Position::all();
        $regions = Region::all();

        dump($champions);

        return view('champions.classic', compact(
            'champions',
            'genders',
            'species',
            'resources',
            'ranges',
            'positions',
            'regions'
        ));
    }

    /**
     * Show the form for creating a new champion.
     */
    public function create()
    {
        $genders = Gender::all();
        $positions = Position::all();
        $species = Specie::all();
        $resources = Resource::all();
        $ranges = RangeType::all();
        $regions = Region::all();
        $years = Year::orderBy('year', 'desc')->get(); // Ajoutez cette ligne

        return view('champions.create', compact('genders', 'positions', 'species', 'resources', 'ranges', 'regions', 'years'));
    }

    /**
     * Store a newly created champion in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'years_id' => 'required|exists:years,years_id',
            'gender_id' => 'required|exists:genders,id',
            'resource_id' => 'required|exists:resources,id',
            'species' => 'required|array',
            'species.*' => 'exists:species,id',
            'range_type' => 'required|array',
            'range_type.*' => 'exists:range_type,id',
            'positions' => 'required|array',
            'positions.*' => 'exists:positions,id',
            'regions' => 'required|array',
            'regions.*' => 'exists:regions,id',
        ]);

        // Convert the release year to a date
        $validatedData['year_id'] = Carbon::createFromDate($validatedData['release_year'], 1, 1)->toDateString();
        unset($validatedData['release_year']);

        $champion = Champion::create($validatedData);

        $champion->positions()->attach($request->positions);
        $champion->regions()->attach($request->regions);
        $champion->rangeTypes()->attach($request->ranges);
        $champion->species()->attach($request->species);

        return redirect()->route('champions.index')->with('success', 'Champion created successfully!');
    }

    /**
     * Display the specified champion.
     */
    public function show(string $id)
    {
        $champion = Champion::find($id);
        return view('champions.show', compact('champion'));
    }

    /**
     * Show the form for editing the specified champion.
     */
    public function edit(string $id)
    {
        $champion = Champion::find($id);
        return view('champions.edit', compact('champion'));
    }

    /**
     * Update the specified champion in storage.
     */
    public function update(Request $request, string $id)
    {
        $champion = Champion::find($id);
        $champion->update($request->all());
        return redirect()->route('champions.index');
    }

    /**
     * Remove the specified champion from storage.
     */
    public function destroy(string $id)
    {
        Champion::find($id)->delete();
        return redirect()->route('champions.index');
    }

    public function filter(Request $request)
{
    $query = Champion::with(['gender', 'specie', 'resource', 'range', 'positions', 'regions']);

    // Filtres d'inclusion
    if ($request->gender) {
        $query->where('gender_id', $request->gender);
    }
    if ($request->specie) {
        $query->where('specie_id', $request->specie);
    }
    if ($request->resource) {
        $query->where('resource_id', $request->resource);
    }
    if ($request->range_type) {
        $query->where('range_id', $request->range_type);
    }
    if ($request->position) {
        $query->whereHas('positions', function ($q) use ($request) {
            $q->where('positions.id', $request->position);
        });
    }
    if ($request->region) {
        $query->whereHas('regions', function ($q) use ($request) {
            $q->where('regions.id', $request->region);
        });
    }

    // Filtres d'exclusion
    if ($request->exclude_gender) {
        $query->where('gender_id', '!=', $request->exclude_gender);
    }
    if ($request->exclude_specie) {
        $query->where('specie_id', '!=', $request->exclude_specie);
    }
    if ($request->exclude_resource) {
        $query->where('resource_id', '!=', $request->exclude_resource);
    }
    if ($request->exclude_range_type) {
        $query->where('range_id', '!=', $request->exclude_range_type);
    }
    if ($request->exclude_position) {
        $query->whereDoesntHave('positions', function ($q) use ($request) {
            $q->where('positions.id', $request->exclude_position);
        });
    }
    if ($request->exclude_region) {
        $query->whereDoesntHave('regions', function ($q) use ($request) {
            $q->where('regions.id', $request->exclude_region);
        });
    }

    $champions = $query->get();

    return response()->json($champions);
}
}

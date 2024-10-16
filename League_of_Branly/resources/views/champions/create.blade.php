@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Champion</h1>

    <form action="{{ route('champions.store') }}" method="POST" class="champion-form">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="lore" class="form-label">Lore</label>
            <textarea class="form-control" id="lore" name="lore" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="years_id" class="form-label">Release Year</label>
            <select class="form-select" id="years_id" name="years_id" required>
                <option value="" disabled selected>-</option>
                @foreach($years as $year)
                    <option value="{{ $year->years_id }}">{{ $year->year }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gender_id" class="form-label">Gender</label>
            <select class="form-select" id="gender_id" name="gender_id" required>
                <option value="" disabled selected>-</option>
                @foreach($genders as $gender)
                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="resource_id" class="form-label">Resource</label>
            <select class="form-select" id="resource_id" name="resource_id" required>
                <option value="" disabled selected>-</option>
                @foreach($resources as $resource)
                <option value="{{ $resource->id }}">{{ $resource->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Species</label>
            @foreach($species as $specie)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="species[]" value="{{ $specie->id }}" id="specie_{{ $specie->id }}">
                <label class="form-check-label" for="specie_{{ $specie->id }}">
                    {{ $specie->name }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label class="form-label">Range Types</label>
            @foreach($ranges as $range)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="ranges[]" value="{{ $range->id }}" id="range_{{ $range->id }}">
                <label class="form-check-label" for="range_{{ $range->id }}">
                    {{ $range->type }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label class="form-label">Positions</label>
            @foreach($positions as $position)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="positions[]" value="{{ $position->id }}" id="position_{{ $position->id }}">
                <label class="form-check-label" for="position_{{ $position->id }}">
                    {{ $position->name }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label class="form-label">Regions</label>
            @foreach($regions as $region)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="regions[]" value="{{ $region->id }}" id="region_{{ $region->id }}">
                <label class="form-check-label" for="region_{{ $region->id }}">
                    {{ $region->name }}
                </label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Create Champion</button>
    </form>
</div>
@endsection

@section('styles')
<style>
    .champion-form {
        background-color: var(--blue-7);
        color: var(--gold-1);
        padding: 2rem;
        border-radius: 8px;
    }

    .form-label {
        color: var(--gold-2);
    }

    .form-control,
    .form-select {
        background-color: var(--blue-6);
        color: var(--gold-1);
        border-color: var(--gold-5);
    }

    .form-control:focus,
    .form-select:focus {
        background-color: var(--blue-5);
        color: var(--gold-1);
        border-color: var(--gold-4);
        box-shadow: 0 0 0 0.2rem rgba(200, 170, 110, 0.25);
    }

    .form-check-input {
        background-color: var(--blue-6);
        border-color: var(--gold-5);
    }

    .form-check-input:checked {
        background-color: var(--gold-4);
        border-color: var(--gold-4);
    }

    .form-check-label {
        color: var(--gold-1);
    }

    .btn-primary {
        background-color: var(--gold-5);
        border-color: var(--gold-5);
        color: var(--blue-7);
    }

    .btn-primary:hover {
        background-color: var(--gold-4);
        border-color: var(--gold-4);
        color: var(--blue-7);
    }
</style>
@endsection
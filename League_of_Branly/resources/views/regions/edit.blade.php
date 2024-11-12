@extends('layouts.app')

@section('content')
<div class="container">
    <x-page-header title="Edit {{ $region->name }} Region" style="h1 heading" />

    <form action="{{ route('regions.update', $region) }}" method="POST" class="region-form border rounded p-4 gradient-blue-6-7">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="form-label">Region Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $region->name) }}" autocomplete="name" required autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        </div>
        <div class="mb-3">
            <label for="lore" class="form-label">Lore</label>
            <textarea class="form-control @error('lore') is-invalid @enderror" id="lore" name="lore" autocomplete="lore" rows="5">{{ old('lore', $region->lore) }}</textarea>
        
            @error('lore')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        </div>
        <button type="submit" class="btn btn-primary heading h5">
            <span>Update Region</span>
        </button>
    </form>
</div>
@endsection
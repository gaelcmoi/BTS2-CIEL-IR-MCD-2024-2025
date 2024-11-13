@extends('layouts.app')

@section('content')
<div class="container">
    <x-page-header title="Create New Region" style="h1 heading" />

    <form action="{{ route('regions.store') }}" method="POST" class="region-form border rounded p-4 gradient-blue-6-7">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Region Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary heading h5">
            <span>Create Region
            </span>
        </button>
    </form>
</div>
@endsection
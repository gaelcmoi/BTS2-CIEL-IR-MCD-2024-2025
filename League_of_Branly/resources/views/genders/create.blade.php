@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Gender</h1>

    <form action="{{ route('genders.store') }}" method="POST" class="gender-form">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Resource</button>
    </form>
</div>
@endsection

@section('styles')
<style>
    .gender-form {
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
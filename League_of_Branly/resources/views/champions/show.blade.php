@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center justify-content-center vh-100">
                <x-decorated-title title="{{ $champion->name }}" />
                <img src="{{ asset('img/champions/' . strtolower(str_replace(' ', '_', $champion->name)) . '.png') }}"
                    alt="{{ $champion->name }}"
                    class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <p class="p-3 text-justify"><span class="heading h2 text-gold-4">{{ substr($champion->lore, 0, 1) }}</span>{{ substr($champion->lore, 1) }}</p>
        </div>
    </div>
</div>
@endsection
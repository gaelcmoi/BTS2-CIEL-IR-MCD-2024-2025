@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center justify-content-center vh-100">
                <x-decorated-title title="{{ $region->name }}" />
                <img src="{{ asset('img/regions/' . strtolower(str_replace(' ', '_', $region->name)) . '_crest.webp') }}"
                    alt="{{ $region->name }}"
                    class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <p class="p-3 text-justify"><span class="heading h2 text-gold-4">{{ substr($region->description, 0, 1) }}</span>{{ substr($region->description, 1) }}</p>
        </div>
    </div>

    <!--<div class="vh-100">
        <h2 class="heading p-3">Images de {{ $region->name }}</h2>
        <x-carousel :name="$region->name" type="regions" />
    </div>-->

    <div class="vh-100">
        <x-table-grid-view
            :items="$region->champions"
            :columns="['name' => 'Nom', 'title' => 'Titre', 'difficulty' => 'Difficulté']"
            routePrefix="champions"
            title="Champions de {{ $region->name }}"
            style="h2 p-3" />
    </div>
</div>
@endsection
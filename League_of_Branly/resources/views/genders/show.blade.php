@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center justify-content-center vh-100">
                <x-decorated-title title="{{ $gender->name }}" />
                <img src="{{ asset('img/genders/' . strtolower(str_replace(' ', '_', $gender->name)) . '_crest.webp') }}"
                    alt="{{ $gender->name }}"
                    class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <p class="p-3 text-justify"><span class="heading h2 text-gold-4">{{ substr($gender->description, 0, 1) }}</span>{{ substr($gender->description, 1) }}</p>
        </div>
    </div>

    <!--<div class="vh-100">
        <h2 class="heading p-3">Images de {{ $gender->name }}</h2>
        <x-carousel :name="$gender->name" type="genders" />
    </div>-->

    <div class="vh-100">
        <x-table-grid-view
            :items="$gender->champions"
            :columns="['name' => 'Nom', 'title' => 'Titre', 'difficulty' => 'Difficulté']"
            routePrefix="champions"
            title="Champions de {{ $gender->name }}"
            style="h2 p-3" />
    </div>
</div>
@endsection
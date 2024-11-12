@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
        <x-decorated-title title="{{ $resource->name }}" />
        <img src="{{ asset('img/resources/' . strtolower(str_replace(' ', '_', $resource->name)) . '.webp') }}"
            alt="{{ $resource->name }}"
            class="img-fluid">
    </div>

    <div class="vh-100">
        <x-table-grid-view
            :items="$resource->champions"
            :columns="['name' => 'Nom', 'title' => 'Titre']"
            routePrefix="champions"
            title="Champions with this resource:"
            style="h2 p-3" />
    </div>
</div>
@endsection
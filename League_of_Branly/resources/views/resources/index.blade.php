{{-- resources/views/resources/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <x-table-grid-view
        title="Resources"
        style="h1"
        :items="$resources"
        :columns="['name' => 'Name']"
        :create-route="route('resources.create')"
        route-prefix="resources" />
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <x-table-grid-view
        title="Regions"
        style="h1"
        :items="$regions"
        :columns="['name' => 'Name']"
        :create-route="route('regions.create')"
        route-prefix="regions" />
</div>
@endsection
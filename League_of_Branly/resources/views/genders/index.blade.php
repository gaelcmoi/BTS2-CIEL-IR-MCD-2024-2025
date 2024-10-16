{{-- genders/views/genders/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <x-table-grid-view
        title="Genders"
        style="h1"
        :items="$genders"
        :columns="['name' => 'Name']"
        :create-route="route('genders.create')"
        route-prefix="genders" />
</div>

@endsection
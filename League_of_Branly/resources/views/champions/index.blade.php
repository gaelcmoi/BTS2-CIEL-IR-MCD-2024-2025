{{-- resources/views/champions/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <x-table-grid-view
        title="Champions"
        style="h1"
        :items="$champions"
        :columns="['name' => 'Name']"
        :create-route="route('champions.create')"
        route-prefix="champions" />
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Champions</h1>

    <!-- Barre de filtre d'inclusion -->
    <div class="filter-bar">
        <h5>Inclure les champions ayant :</h5>
        <form id="inclusionForm" class="row g-3">
            <div class="col-md-2">
                <select class="form-select" name="gender">
                    <option value="">Genre</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="specie">
                    <option value="">Espèce</option>
                    @foreach($species as $specie)
                        <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="resource">
                    <option value="">Ressource</option>
                    @foreach($resources as $resource)
                        <option value="{{ $resource->id }}">{{ $resource->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="range_type">
                    <option value="">Type de portée</option>
                    @foreach($ranges as $range)
                        <option value="{{ $range->id }}">{{ $range->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="position">
                    <option value="">Position</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="region">
                    <option value="">Région</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <!-- Barre de filtre d'exclusion -->
    <div class="filter-bar">
        <h5>Exclure les champions ayant :</h5>
        <form id="exclusionForm" class="row g-3">
            <div class="col-md-2">
                <select class="form-select" name="exclude_gender">
                    <option value="">Genre</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="exclude_specie">
                    <option value="">Espèce</option>
                    @foreach($species as $specie)
                        <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="exclude_resource">
                    <option value="">Ressource</option>
                    @foreach($resources as $resource)
                        <option value="{{ $resource->id }}">{{ $resource->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="exclude_range_type">
                    <option value="">Type de portée</option>
                    @foreach($ranges as $range)
                        <option value="{{ $range->id }}">{{ $range->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="exclude_position">
                    <option value="">Position</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="exclude_region">
                    <option value="">Région</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <!-- Tableau des champions -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Titre</th>
                <th>Genre</th>
                <th>Espèce</th>
                <th>Ressource</th>
                <th>Type de portée</th>
                <th>Positions</th>
                <th>Régions</th>
            </tr>
        </thead>
        <tbody id="championsTableBody">
            @foreach($champions as $champion)
            dump($champion);
                <tr>
                    <td>{{ $champion->name }}</td>
                    <td>{{ $champion->title }}</td>
                    <td>{{ $champion->gender->name }}</td>
                    <td>{{ $champion->specie->name }}</td>
                    <td>{{ $champion->resource->name }}</td>
                    <td>{{ $champion->range->type }}</td>
                    <td>{{ $champion->positions->pluck('name')->implode(', ') }}</td>
                    <td>{{ $champion->regions->pluck('name')->implode(', ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inclusionForm = document.getElementById('inclusionForm');
        const exclusionForm = document.getElementById('exclusionForm');
        const championsTableBody = document.getElementById('championsTableBody');

        function updateChampions() {
            const inclusionData = new FormData(inclusionForm);
            const exclusionData = new FormData(exclusionForm);

            fetch('{{ route("champions.filter") }}', {
                method: 'POST',
                body: new URLSearchParams([...inclusionData, ...exclusionData]),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                },
            })
            .then(response => response.json())
            .then(data => {
                championsTableBody.innerHTML = data.map(champion => `
                    <tr>
                        <td>${champion.name}</td>
                        <td>${champion.title}</td>
                        <td>${champion.gender.name}</td>
                        <td>${champion.specie.name}</td>
                        <td>${champion.resource.name}</td>
                        <td>${champion.range.type}</td>
                        <td>${champion.positions.map(p => p.name).join(', ')}</td>
                        <td>${champion.regions.map(r => r.name).join(', ')}</td>
                    </tr>
                `).join('');
            })
            .catch(error => console.error('Error:', error));
        }

        inclusionForm.addEventListener('change', updateChampions);
        exclusionForm.addEventListener('change', updateChampions);
    });
</script>
@endpush
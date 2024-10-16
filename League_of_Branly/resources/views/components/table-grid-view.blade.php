<x-page-header :title="$title" :createRoute="$showCreateButton ? $createRoute : null" />

<div id="viewContainer" data-view-mode="{{ $viewMode }}">
    <div id="listView" style="display:none;">
        <table class="table table-hover rounded overflow-hidden border">
            <thead>
                <tr class="gradient-gold-5-4 text-blue-7">
                    <th>Name</th>
                    <th>Image</th>
                    @foreach($columns as $column)
                    @if(strtolower($column) != 'name')
                    <th>{{ $column }}</th>
                    @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class="gradient-blue-6-7 align-middle clickable-row" data-href="{{ route($routePrefix . '.show', $item) }}">
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset('img/' . $routePrefix . '/' . strtolower(str_replace(' ', '_', $item->name)) . '.webp') }}"
                            alt="{{ $item->name }}">
                    </td>
                    @foreach($columns as $key => $column)
                    @if(strtolower($column) != 'name')
                    <td>{{ $item->$key }}</td>
                    @endif
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="gridView" class="row m-3">
        @foreach($items as $item)
        <div class="col-md-3 g-5 mb-4">
            <div class="card clickable-card" data-href="{{ route($routePrefix . '.show', $item) }}">
                <img src="{{ asset('img/' . $routePrefix . '/' . strtolower(str_replace(' ', '_', $item->name)) . '.webp') }}"
                    class="card-img-top p-3"
                    alt="{{ $item->name }}">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    @foreach($columns as $key => $column)
                    @if($key != 'name')
                    <p class="card-text"><strong>{{ $column }}:</strong> {{ $item->$key }}</p>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableViewBtn = document.getElementById('tableViewBtn');
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listView = document.getElementById('listView');
        const gridView = document.getElementById('gridView');
        const viewContainer = document.getElementById('viewContainer');
        const viewMode = viewContainer.dataset.viewMode;

        tableViewBtn.addEventListener('click', function() {
            listView.style.display = 'block';
            gridView.style.display = 'none';
            tableViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
        });

        gridViewBtn.addEventListener('click', function() {
            listView.style.display = 'none';
            gridView.style.display = 'flex';
            gridViewBtn.classList.add('active');
            tableViewBtn.classList.remove('active');
        });

        if (viewMode === "grid")
            gridViewBtn.click();
        else
            tableViewBtn.click();
    });

    // Add click event for table rows
    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function() {
            window.location.href = this.dataset.href;
        });
    });

    // Add click event for grid cards
    document.querySelectorAll('.clickable-card').forEach(card => {
        card.addEventListener('click', function() {
            window.location.href = this.dataset.href;
        });
    });
</script>
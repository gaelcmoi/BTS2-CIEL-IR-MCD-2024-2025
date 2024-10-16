<div id="carousel" class="carousel slide h-75" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($images as $index => $image)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <img src="{{ $image }}" class="d-block w-100" alt="{{ $name }} image {{ $index + 1 }}">
        </div>
        @endforeach
    </div>
    @if(count($images) > 1)
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    @endif
</div>
<div class="{{ $blockClass }}">
    <div class="container p-5">
        <h2 class="heading">{{ $title }}</h2>
        @foreach($content as $index => $item)
            <p>{!! $item !!}</p>
        @endforeach
    </div>
</div>
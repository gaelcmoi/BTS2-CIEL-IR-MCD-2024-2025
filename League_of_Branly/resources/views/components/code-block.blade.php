<div class="{{ $blockClass }} position-relative">
    <div class="container p-5">
        <h2 class="heading">{{ $title }}</h2>
        @foreach($content as $index => $item)
        <p>{!! $item !!}</p>
        @endforeach
    </div>
    <div class="position-absolute d-flex w-100 justify-content-center bot-pos z-2">
        <div>
            <img src="{{ asset('img/decorator-hr.svg') }}" class="w-100 animate-decorator decorator-hr" />
        </div>
    </div>
</div>
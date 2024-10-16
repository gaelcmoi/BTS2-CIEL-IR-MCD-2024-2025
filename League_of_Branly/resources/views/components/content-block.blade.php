<div class="{{ $blockClass }}">
    <div class="d-flex flex-column gx-5 container flex-lg-row">
        <div class="text-blue-7 d-flex justify-content-center flex-column p-5 col-lg-6">
            <h2 class="heading">{{ $title }}</h2>
            @foreach($content as $paragraph)
            <p>{!! $paragraph !!}</p>
            @endforeach
        </div>
        @if(isset($image))
        <div class="col-sm d-flex justify-content-center align-items-center pb-5 col-lg-6">
            <img class="img-fluid" id="cdm-diagram" src="{{ asset($image) }}" alt="{{ $title }}" />
        </div>
        @endif
    </div>
</div>
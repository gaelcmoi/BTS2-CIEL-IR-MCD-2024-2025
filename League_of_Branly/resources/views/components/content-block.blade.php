<div class="{{ $blockClass }} position-relative">
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
    <div class="position-absolute d-flex w-100 justify-content-center bot-pos z-2">
        <div>
            <img src="{{ asset('img/decorator-hr.svg') }}" class="w-100 animate-decorator decorator-hr" />
        </div>
    </div>
</div>
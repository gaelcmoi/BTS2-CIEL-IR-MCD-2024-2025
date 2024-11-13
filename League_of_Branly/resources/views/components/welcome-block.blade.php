<div class="{{ $blockClass }} position-relative" style="background-image: url('{{ asset($backgroundImage) }}');">
    <div class="block-opacity w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            @foreach($title as $line)
            <div class="h1 mb-0 heading text-gradient-gold-5-4">{{ $line }}</div>
            @endforeach
            <div class="block-1-subtitle mt-3 mx-5 text-blue-5">
                @foreach($subtitle as $line)
                <div class="h3">{{ $line }}</div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="position-absolute d-flex w-100 justify-content-center bot-pos z-2">
        <div>
            <img src="{{ asset('img/decorator-hr.svg') }}" class="w-100 animate-decorator decorator-hr" />
        </div>
    </div>
</div>
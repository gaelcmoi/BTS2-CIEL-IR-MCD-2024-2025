<div class="{{ $blockClass }}" style="background-image: url('{{ asset($backgroundImage) }}');">
    <div class="block-opacity w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            @foreach($title as $line)
                <div class="h1 mb-0 heading">{{ $line }}</div>
            @endforeach
            <div class="block-1-subtitle mt-3 mx-5 text-blue-5">
                @foreach($subtitle as $line)
                    <div class="h3">{{ $line }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
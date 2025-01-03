<nav class="bg-hextech-black navbar navbar-expand-lg flex-column">
    <div class="container-fluid ">
        <a class="navbar-brand text-gold-1 h1 heading d-lg-none" href="{{ url('/') }}">{{ config('app.name', 'LoB') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="position-absolute justify-content-center z-2 bot-pos decorator-hr d-block d-lg-none">
            <div>
                <img src="{{ asset('img/decorator-hr.svg') }}" class="w-100" />
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-center flex-column" id="navbarNav">
            <div class="my-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link h4 heading {{ request()->is('classic') ? 'active' : '' }} link-underline-opacity-100-hover link-offset-3" href="">CLASSIC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 heading {{ request()->is('regions') ? 'active' : '' }} link-underline-opacity-100-hover link-offset-3" href="">QUOTE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 heading {{ request()->is('roles') ? 'active' : '' }} link-underline-opacity-100-hover link-offset-3" href="">ABILITY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 heading {{ request()->is('abilities') ? 'active' : '' }} link-underline-opacity-100-hover link-offset-3" href="">EMOJI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 heading {{ request()->is('skins') ? 'active' : '' }} link-underline-opacity-100-hover link-offset-3" href="">SPLASH</a>
                    </li>
                </ul>
                <div class="d-block d-lg-none position-absolute justify-content-center" style="top: 57px; max-width: 388px;">
                    <div>
                        <img src="{{ asset('img/decorator-hr.svg') }}" class="w-100 animate-decorator" />
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block position-absolute z-2 bot-nav">
                <div>
                    <img src="{{ asset('img/decorator-hr-lg.svg') }}">
                </div>
            </div>
        </div>
    </div>
</nav>
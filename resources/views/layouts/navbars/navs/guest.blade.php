<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/Sprouts-By-Footprints-logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <!-- Collapse header -->
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('online_form') }}">
                            <span class="nav-link-inner--text">{{ __('Admission') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav mr-auto">                
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <span class="nav-link-inner--text">{{ __('Login') }}</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <span class="nav-link-inner--text">{{ __('Register') }}</span>
                    </a>
                </li> -->
                @endguest
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">
            {!! config('app.name', 'Lara(b)log2') !!}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            {!! trans('larablog.nav.menu') !!}
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if (!Request::is('/'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : null }}" href="/">
                            {!! trans('larablog.nav.home') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('authors'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('authors') ? 'active' : null }}" href="{{ route('authors') }}">
                            {!! trans('larablog.nav.authors') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('about'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : null }}" href="{{ route('about') }}">
                            {!! trans('larablog.nav.about') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('contact'))
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : null }}" href="{{ route('contact') }}">
                            {!! trans('larablog.nav.contact') !!}
                        </a>
                    </li>
                @endif
                @guest
                    {{--
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : null }}" href="{{ route('login') }}">
                                {!! trans('larablog.nav.login') !!}
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : null }}" href="{{ route('register') }}">
                                {!! trans('larablog.nav.register') !!}
                            </a>
                        </li>
                    @endif
                    --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {!! trans('larablog.nav.logout') !!}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item {{ Request::is('admin') ? 'active' : null }}" href="{{ route('admin') }}">
                                {!! trans('larablog.nav.admin') !!}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

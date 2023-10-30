<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img id="logo-sisalut" src="{{ asset('assets/img/logoSISALUTPEI1.png') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto fw-semibold">
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == 'homepage' ? 'active' : '' }}"
                        href="{{ route('homepage') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="#about">Tentang Kami</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    {{-- @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif --}}

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}

                    <li>
                        <a class="ms-md-2 btn btn-outline-secondary" href="{{ route('login') }}">Login</a>
                    </li>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('dashboard-admin') }}"><i
                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

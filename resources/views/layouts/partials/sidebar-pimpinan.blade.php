<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand my-3">
            <img src="{{ asset('assets/img/logoSISALUTPEI1.png') }}" width="180px" />
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('assets/img/logo-toga-hitam.png') }}" width="100%" />
            <p>SI SALUT PEI</p>
        </div>
        <hr class="my-md-0" style="width: 90%;" />
        <ul class="sidebar-menu pt-5">
            {{-- <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard-admin') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard-admin') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Dashboard</span>
                </a>
            </li> --}}
            <li class="menu-header">Perhitungan</li>
            <li class="{{ Request::routeIs('perhitungan') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('perhitungan') }}"><i class="fas fa-clipboard-user">
                    </i> <span>Kelola Perhitungan</span>
                </a>
            </li>
        </ul>
    </aside>
</div>


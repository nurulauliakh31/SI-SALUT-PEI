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
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard-admin') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard-admin') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Kelola</li>
            <li class="{{ Request::is('akun.index') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('akun.index') }}"><i class="far fa-user">
                    </i> <span>Kelola Data User</span>
                </a>
            </li>
            <li class="{{ Request::is('kriteria.index') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kriteria.index') }}"><i class="fas fa-clipboard-list"></i>
                    </i> <span>Kelola Data Kriteria</span>
                </a>
            </li>
            {{-- <li class="{{ Request::is('kelola-kriteria') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kelola-kriteria') }}"><i class="fas fa-clipboard-list"></i>
                    </i> <span>Kelola Kriteria</span>
                </a>
            </li> --}}
            <li class="{{ Request::is('kelola-prodi') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kelola-prodi') }}"><i class="fas fa-school"></i>
                    </i> <span>Kelola Data Prodi</span>
                </a>
            </li>
            <li class="{{ Request::is('kelola-mahasiswa') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kelola-mahasiswa') }}"><i class="fas fa-user-graduate"></i>
                    </i> <span>Kelola Data Mahasiswa</span>
                </a>
            </li>
            <li class="menu-header">Nilai</li>
            {{-- <li class="{{ Request::is('kelola-bobot') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kelola-bobot') }}"><i class="fas fa-clipboard-check">
                    </i> <span>Kelola Nilai Bobot</span>
                </a>
            </li>
            <li class="{{ Request::is('kelola-nilai-mahasiswa') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kelola-nilai-mahasiswa') }}"><i class="fas fa-clipboard-user">
                    </i> <span>Kelola Nilai Mahasiswa</span>
                </a>
            </li> --}}
            <li class="{{ Request::is('penilaian') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('penilaian') }}"><i class="fas fa-clipboard-user">
                    </i> <span>Penilaian Alternatif</span>
                </a>
            </li>
            <li class="menu-header">Perhitungan</li>
            <li class="{{ Request::is('perhitungan-admin') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('perhitungan-admin') }}"><i class="fas fa-clipboard-user">
                    </i> <span>Kelola Perhitungan</span>
                </a>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="{{ Request::is('laporan') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('laporan') }}"><i class="fas fa-clipboard-user">
                    </i> <span>Hasil Keputusan</span>
                </a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Hasil Metode SAW</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('kelola-hasil-peringkat') }}">Hasil Peringkat</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="#">Laporan</a>
                    </li>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>


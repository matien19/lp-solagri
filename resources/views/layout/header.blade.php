<header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('login') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="sarana-hijau" style="max-height: 160px; max-width: 160px;">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('beranda') }}" class="{{ Request::is('/')  ? 'active' : '' }}">Beranda</a></li>
                <li class="dropdown"><a href="#"
                        class="{{ Request::is('profil*') ? 'active' : '' }}"><span>Profil</span> <i
                            class="bi bi-chevron-down toggle-dropdown "></i></a>
                    <ul>
                        <li><a href="{{ route('profil') }}" class="{{ Request::is('/profil') ? 'active' : '' }}">Profil
                                Perusahaan</a></li>
                        <li><a href="{{ route('dokumen') }}"
                                class="{{ Request::is('/profil/dokumen') ? 'active' : '' }}">Penghargaan/Dokumen</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="{{ Request::is('layanan*') ? 'active' : '' }}"><span>Layanan
                            kami</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('produk') }}">Produk</a></li>
                        <li><a href="{{ route('jasa') }}">Jasa</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('berita') }}" class="{{ Request::is('berita*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak kami</a>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
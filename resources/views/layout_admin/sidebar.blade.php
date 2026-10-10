<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    @php
    $authUser = auth()->user();
    $userRole = $authUser->role;
    @endphp
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <div class="nav-item-wrapper">
                    <a class="nav-link {{ Request::is('admin/beranda') ? 'active' : '' }} label-1"
                        href="{{ route('admin.beranda') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="pie-chart"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Beranda</span>
                            </span>
                        </div>
                    </a>
                    <a class="nav-link {{ Request::is('admin/produk') ? 'active' : '' }} label-1"
                        href="{{ route('admin.produk') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="package"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Bibit</span>
                            </span>
                        </div>
                    </a>
                    <a class="nav-link {{ Request::is('admin/jasa') ? 'active' : '' }} label-1"
                        href="{{ route('admin.jasa') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="briefcase"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Jasa</span>
                            </span>
                        </div>
                    </a>
                    <a class="nav-link {{ Request::is('admin/berita*') ? 'active' : '' }} label-1"
                        href="{{ route('admin.berita') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="file-text"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Berita</span>
                            </span>
                        </div>
                    </a>
                </div>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
            <span class="uil uil-left-arrow-to-left fs-8"></span>
            <span class="uil uil-arrow-from-right fs-8"></span>

            <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
        </button>
    </div>
</nav>
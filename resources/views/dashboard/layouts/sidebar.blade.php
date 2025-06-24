<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">

            <img src="{{ asset('img') }}/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"

            <span class="brand-text font-weight-light">Muhammadiyah</span>
        {{-- @if ($profilPenjual)
            <span class="brand-text font-weight-light">{{ $profilPenjual->store_name }}</span>
        @else
            <span class="brand-text font-weight-light">MyStyle</span>
        @endif --}}
        {{-- <a href="{{ url('/test') }}">test</a> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="{{ asset('tema') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Default User Image">

            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{ Request::is('dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active' : '' }}"
                        href="/dashboard/posts">
                        <i class="bi bi-postcard"></i>
                        &nbsp;Postingan Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/kajian*') ? 'active' : '' }}"
                        href="/dashboard/kajian">
                        <i class="bi bi-file-post"></i>
                        &nbsp;Data Kajian
                    </a>
                </li>



                @if (Auth::check())
                    {{-- @if ($pp)
                        <li class="nav-item {{ Request::is('adminproduct') ? 'menu-open' : '' }}">
                            <a href="{{ url('/adminproduct') }}"
                                class="nav-link {{ Request::is('adminproduct') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Product
                                </p>
                            </a>
                        </li>
        
                        <li class="nav-item {{ Request::is('stokproduct') ? 'menu-open' : '' }}">
                            <a href="{{ url('/stokproduct') }}"
                                class="nav-link {{ Request::is('stokproduct') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Stok Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('pesanan') ? 'menu-open' : '' }}">
                            <a href="{{ url('/pesanan') }}"
                                class="nav-link {{ Request::is('pesanan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Order Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('penjualan') ? 'menu-open' : '' }}">
                            <a href="{{ url('/penjualan') }}"
                                class="nav-link {{ Request::is('penjualan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Penjualan
                                </p>
                            </a>
                        </li>
        
                        <li class="nav-item has-treeview {{ Request::is('pages/forms*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('pages/forms*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Konfigurasi Store
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/konfigurasiumum') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konfigurasi Umum</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/konfigurasilogo') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konfigurasi Logo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/konfigurasiicon') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konfigurasi Icon</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                    @endif --}}
                @endif

                

                {{-- @can('admin') --}}
                @can('admin')
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Administrator</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                                href="/dashboard/categories">
                                <i class="bi bi-card-list"></i>
                                &nbsp;Kategori Postingan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/user*') ? 'active' : '' }}"
                                href="/dashboard/user">
                                <i class="bi bi-person-vcard"></i>
                                &nbsp;Data Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('admin/role-requests*') ? 'active' : '' }}"
                                href="/admin/role-requests">
                                <i class="bi bi-box-arrow-in-down"></i>
                                &nbsp;Role Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/sejarah*') ? 'active' : '' }}"
                                href="/dashboard/sejarah">
                                <i class="bi bi-file-earmark-richtext"></i>
                                &nbsp;Data Sejarah
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 {{ Request::is('dashboard/sk*') || Request::is('dashboard/struktur*') || Request::is('dashboard/biodataPimpinan*') ? 'active' : '' }}"
                                href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-menu-button-wide"></i>
                                &nbsp;Data Organisasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item {{ Request::is('dashboard/sk*') ? 'active' : '' }}" href="/dashboard/sk">
                                        <i class="bi bi-file-earmark-text"></i>
                                        &nbsp;Data SK
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ Request::is('dashboard/struktur*') ? 'active' : '' }}" href="/dashboard/struktur">
                                        <i class="bi bi-newspaper"></i>
                                        &nbsp;Struktur Organisasi
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ Request::is('dashboard/biodataPimpinan*') ? 'active' : '' }}" href="/dashboard/biodataPimpinan">
                                        <i class="bi bi-person-vcard"></i>
                                        &nbsp;Biodata Pimpinan
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        {{-- <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/sk') ? 'active' : '' }}"
                                href="/dashboard/sk">
                                <i class="bi bi-file-earmark-text"></i>
                                &nbsp;Data SK
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/struktur') ? 'active' : '' }}"
                                href="/dashboard/struktur">
                                <i class="bi bi-newspaper"></i>
                                &nbsp;Struktur Organisasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/biodataPimpinan') ? 'active' : '' }}"
                                href="/dashboard/biodataPimpinan">
                                <i class="bi bi-person-vcard"></i>
                                &nbsp;Biodata Pimpinan
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/inventaris*') ? 'active' : '' }}"
                                href="/dashboard/inventaris">
                                <i class="bi bi-inboxes"></i>
                                &nbsp;Inventaris
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/pelaksanaanProgram*') ? 'active' : '' }}"
                                href="/dashboard/pelaksanaanProgram">
                                <i class="bi bi-person-video2"></i>
                                &nbsp;Pelaksanaan Program
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/musyawarah*') ? 'active' : '' }}"
                                href="/dashboard/musyawarah">
                                <i class="bi bi-journal-text"></i>
                                &nbsp;Data Musyawarah
                            </a>
                        </li>
                    </ul>
                @endcan
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

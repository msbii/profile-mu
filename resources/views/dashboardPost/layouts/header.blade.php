<!-- Main Header -->
<header class="main-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="auto-container clearfix">
            <!-- Top Left -->
            <div class="top-left">
                {{-- <div class="text">Selasa, 3 Oktober 2023</div> --}}
                <div class="text">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</div>
            </div>
            
            <!-- Top Right -->
            <div class="top-right">
                
                {{-- <!--Search Box-->
                <div class="search-box">
                    <form method="post" action="index.html">
                        <div class="form-group">
                            <input type="search" name="search" value="" placeholder="Search Your Needs Here">
                            <button type="submit" name="search" class="theme-btn search-btn"><span class="fa fa-search"></span></button>
                        </div>
                    </form>
                </div> --}}
                
                <!-- Icons Social Media -->
                <div class="flex">
                    <a class="text-white" href="#">
                     <i class="fab fa-facebook-f" style="font-size: 15px;">
                     </i>
                    </a>
                    <a class="text-white" href="#">
                     <i class="fab fa-twitter" style="font-size: 15px;">
                     </i>
                    </a>
                    <a class="text-white" href="#">
                     <i class="fab fa-instagram" style="font-size: 15px;">
                     </i>
                    </a>
                    <a class="text-white" href="#">
                     <i class="fab fa-youtube" style="font-size: 15px;">
                     </i>
                    </a>
                </div>
            </div>
            
        </div>
    </div><!-- Top Bar End -->
    
    <!--Middle Bar-->
    
    
    <!-- Lower Section -->
    <div class="lower-section">
        <div class="auto-container">
            
            <!--Outer Box-->
            <div class="outer-box clearfix">
                 
                <!-- Hidden Nav Toggler -->
                <div class="nav-toggler">
                <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                </div><!-- / Hidden Nav Toggler -->

                <!-- Main Menu -->
                <nav class="main-menu">
                            
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation">
                            <li class="current {{ Request::is('/') ? 'current' : '' }}">
                                <a href="/"><img src="{{ asset('img')}}/Logo.png" alt="">Muhammadiyah</a>
                            </li>
                            {{-- <li class="dropdown"><a href="about-us.html">About Us</a>
                                <ul>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li class="dropdown"><a href="gallery.html">Gallery</a>
                                        <ul>
                                            <li><a href="gallery.html">Gallery</a></li>
                                            <li><a href="gallery-single.html">Gallery Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="error.html">404 Page</a></li>
                                </ul>
                            </li> --}}
                            <li class="dropdown {{ Request::is('view/*') ? 'current' : '' }}"><a href="#">Lingkup</a>
                                <ul>
                                    <li><a href="/view/muhammadiyah">Muhammadiyah</a></li>
                                    <li><a href="/view/aisyiyah">‘Aisyiyah</a></li>
                                    <li><a href="/view/angkatanMuda">Angkatan Muda Muhammadiyah</a></li>
                                    <li><a href="/view/terpadu">Terpadu</a></li>
                                </ul>
                            </li>
                            <li class="dropdown {{ Request::is('kabar*') ? 'current' : '' }}"><a href="/kabar">Kabar</a></li>

                            <li class="{{ Request::is('kategori/kajian*') ? 'current' : '' }}"><a href="/kategori/kajian">Kajian</a></li>
                            <li class="dropdown {{ Request::is('sejarah-*') ? 'current' : '' }}"><a href="#">Sejarah</a>
                                {{-- Hfref perlu di atur ulang agar sesuai dengan slug sejarah --}}
                                <ul>
                                    {{-- <li><a href="/sejarah-muhammadiyah">Muhammadiyah</a></li> --}}
                                    @foreach ($sejarah as $post)
                                        <li><a href="/{{ $post->slug }}">{{ $post->title }}</a></li>
                                    
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown {{ Request::is('amal/*') ? 'current' : '' }}"><a href="#">Amal Usaha</a>
                                <ul>
                                    <li><a href="shop.html">WarMA</a></li>
                                    <li><a href="/amal/tkAba">TK ABA</a></li>
                                    <li><a href="/amal/masjidAlAmien">Masjid Al Amien</a></li>
                                    <li><a href="/amal/masjidSafinatullah">Masjid Safinatullah </a></li>
                                    <li><a href="/amal/masjidBaiturohman">Masjid Baiturohman </a></li>
                                    <li><a href="/amal/masjidAlIkhsan">Masjid Al Ikhsan</a></li>
                                    <li><a href="/amal/musholaAlKhasanah">Mushola Al Khasanah</a></li>
                                    <li><a href="/amal/musholaAlHikmah">Mushola Al Hikmah</a></li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('contact-us*') ? 'current' : '' }}"><a href="/contact-us">Hubungi kami</a></li>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->

                <!--Search Box-->
                <div class="search-box">
                    <form method="GET" action="/search">
                        {{-- query filter --}}
                        {{-- @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif --}}
                        <div class="form-group">
                            {{-- <input type="search" name="search" value="{{ request('search') }}" placeholder="Search Your Needs Here"> --}}
                            <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari yang Anda Butuhkan">
                            <button type="submit" class="theme-btn search-btn"><span class="fa fa-search"></span></button>
                        </div>
                    </form>
                </div>

                @auth
                    <div class="link-box">
                        <li class="dropdown theme-btn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Selamat Datang, <br>
                                {{-- {{ auth()->user()->name }} --}}
                                {{ implode(' ', array_slice(explode(' ', auth()->user()->name), 0, 2)) }}
                            </a>
                            <ul class="dropdown-menu">
                                @if ((auth()->user()->role == 'pengunjung'))
                                    <li>
                                        @php
                                            // Cek apakah ada request yang statusnya 'pending' untuk user yang sedang login
                                            $roleRequest = \App\Models\RoleRequest::where('user_id', auth()->id())->where('status', 'pending')->first();
                                        @endphp
                                        {{-- Tampilkan status request jika sudah ada yang pending --}}
                                        @if ($roleRequest)
                                            <button class="btn btn-secondary" disabled>Request Pending</button>
                                        @else
                                            {{-- Form untuk pengajuan request jika belum ada yang pending --}}
                                            <form action="{{ route('requestRole') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Request Admin Role</button>
                                            </form>
                                        @endif
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <li><a href="/dashboard/home"><i class="bi bi-columns"></i> My Dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="/logout" method="POST" class="logout">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </div>
                    
                @else
                {{-- <li class="nav-item">
                    <a href="/login" class="nav-link {{ ('title' === "Login")? 'active' : '' }}""><i class="bi bi-box-arrow-in-right"></i>
                    Login</a>
                </li> --}}
                <div class="link-box">
                    <a href="/login" class="theme-btn">Login</a>
                </div>
                @endauth

                {{-- <div class="link-box"><a href="#" class="theme-btn">Free Consultation</a></div> --}}
                
                
            </div>
        </div>
    </div><!-- Lower Section End-->
    
</header><!--End Main Header -->


<!-- Hidden Bar -->
<section class="hidden-bar right-align">
    
    <div class="hidden-bar-closer">
        <button class="btn"><i class="fa fa-close"></i></button>
    </div>
    <!-- Hidden Bar Wrapper -->
    <div class="hidden-bar-wrapper">
    
        <!-- .logo -->
        <div class="logo text-center">
            <a href="/"><img src="{{ asset('img')}}/Logo.png" alt="" width="200" height="150"></a>			
        </div><!-- /.logo -->
        
        <!-- .Side-menu -->
        <div class="side-menu">
        <!-- .navigation -->
            <ul class="navigation">
                <li><a href="/">Home</a></li>
                
                <li class="dropdown"><a href="practice-areas.html">Lingkup</a>
                    <ul class="submenu">
                        <li><a href="/view/muhammadiyah">Muhammadiyah</a></li>
                        <li><a href="/view/aisyiyah">‘Aisyiyah</a></li>
                        <li><a href="/view/angkatan_muda">Angkatan Muda Muhammadiyah</a></li>
                        <li><a href="/view/terpadu">Terpadu</a></li>
                    </ul>
                </li>
                <li><a href="/kabar">Kabar</a></li>
                <li><a href="/kategori/kajian">Kajian</a></li>
                <li class="dropdown"><a href="#">Sejarah</a>
                    <ul class="submenu">
                        @foreach ($sejarah as $post)
                            <li><a href="/{{ $post->slug }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Amal Usaha</a>
                    <ul class="submenu">
                        <li><a href="shop.html">WarMA</a></li>
                        <li><a href="/amal/tkAba">TK ABA</a></li>
                        <li><a href="/amal/masjidAlAmien">Masjid Al Amien</a></li>
                        <li><a href="/amal/masjidSafinatullah">Masjid Safinatullah </a></li>
                        <li><a href="/amal/masjidBaiturohman">Masjid Baiturohman </a></li>
                        <li><a href="/amal/masjidAlIkhsan">Masjid Al Ikhsan</a></li>
                        <li><a href="/amal/musholaAlKhasanah">Mushola Al Khasanah</a></li>
                        <li><a href="/amal/musholaAlHikmah">Mushola Al Hikmah</a></li>
                    </ul>
                </li>
                <li><a href="/contact-us">Hubungi Kami</a></li>
            </ul>
        </div><!-- /.Side-menu -->
    
        <div class="social-icons">
            <ul>
                <li><a href="#" class="fab fa-facebook-f"></a></li>
                <li><a href="#" class="fab fa-twitter"></a></li>
                <li><a href="#" class="fab fa-instagram"></a></li>
                <li><a href="#" class="fab fa-youtube"></a></li>
                <li><a href="#" class="fab fa-tiktok"></a></li>
            </ul>
        </div>
    
    </div><!-- / Hidden Bar Wrapper -->
</section><!-- / Hidden Bar -->

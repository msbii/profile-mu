   <nav class="main-header sticky-top navbar navbar-expand-md @if (session()->has('darkmode')) navbar-black navbar-dark @else navbar-light navbar-white @endif">
       <div class="container">



               <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                   <li class="nav-item">
                    {{-- <a href="{{ route('home') }}" class="navbar-brand font-weight-light">
                        {{ config('app.name', 'Laravel') }} --}}
                        {{-- <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span> --}}
                    </a>
                   </li>
                   <li class="nav-item">
                       {{-- <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Home</a> --}}
                       <a href="/" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
                   </li>
               </ul>

               <!-- SEARCH FORM -->
                {{-- <form class="col-md-6" action="/" method="GET">
                    @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
        
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group input-group-sm">
                        <input type="search" class="form-control form-control-navbar" placeholder="Search..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form> --}}

                
                

                
                    
                


                {{-- middleware tulisan login menghilang --}}
        {{-- <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth()->user()->name }}
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-columns"></i>
                      My Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                          Logout</button>
                      </form>
                    </li>
                  </ul>
                </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link {{ ('title' === "Login")? 'active' : '' }}""><i class="bi bi-box-arrow-in-right"></i>
                  Login</a>
              </li>
              @endauth
        </ul> --}}
           
           <ul class="navbar-nav navbar-no-expand ml">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->name }}
                        <br>
                        @if (Auth::check())
                            @if (isset($pp))
                                {{-- Jika ada user_id di tabel profile_penjual, tampilkan penjual --}}
                                <h6>(Penjual)</h6>
                            @endif
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">{{ Auth::user()->name }}</span>
                    
                        <div class="dropdown-divider"></div>
                        {{-- <a href="/myprofile">
                            <span class="dropdown-header">Akun Saya</span>
                        </a> --}}
                        {{-- <form method="POST" action="{{ route('logout') }}"> --}}
                        <form method="POST" action="/logout">
                        
                            @csrf
                            <button class="btn btn-danger btn-block" id="logout"
                                type="submit">Logout</button>
                        </form>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>
            
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ('title' === "Login")? 'active' : '' }}""><i class="bi bi-box-arrow-in-right"></i>
                      Login</a>
                  </li>
            @endauth
            </ul>
               

            {{-- <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">{{ Auth::user()->name }}</span>
                    
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-block" id="logout"
                                type="submit">Logout</button>
                        </form>
                    </div>
                </li>

            </ul> --}}
           <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
               data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
       </div>
   </nav>



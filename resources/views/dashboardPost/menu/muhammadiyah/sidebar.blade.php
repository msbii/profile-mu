<!--Sidebar-->      
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
    <aside class="sidebar">
        
        <!--Sidebar Widget / Boxed Nav-->
        <div class="widget sidebar-widget boxed-nav">
            <nav class="nav-outer">
                <ul>
                    <li class="{{ Request::is('view/muhammadiyah') ? 'current' : '' }}">
                        <a href="/view/muhammadiyah">All Practice Areas</a>
                    </li>
                    <li class="dropdown {{ Request::is('sejarah/*') ? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sejarah</a>
                        <ul class="dropdown-menu">
                            @foreach ($sejarah as $item)
                                <li><a href="/{{ $item->slug }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ Request::is('musyawarah/muhammadiyah*') ? 'current' : '' }}">
                        <a href="/musyawarah/muhammadiyah">Musyawarah Ranting</a>
                    </li>
                    
                    <li class="dropdown {{ Request::is('sk/muhammadiyah*') || Request::is('struktur/muhammadiyah*') ? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Organisasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="{{ Request::is('struktur/muhammadiyah') ? 'active' : '' }}" 
                                href="/struktur/muhammadiyah">Struktur Organisasi</a>
                            </li>
                            <li><a class="dropdown-item" href="/struktur/muhammadiyah">Biodata Pimpinan</a></li>
                            {{-- <li><a class="dropdown-item" href="">SK dari Cabang</a></li>
                            <li><a class="dropdown-item" href="">SK untuk anggota bagian</a></li> --}}
                            @foreach ($kategoriSK as $item)
                                <li><a class="{{ Request::is('sk/muhammadiyah/' . $item->slug) ? 'active' : '' }}" 
                                    href="/sk/muhammadiyah/{{ $item->slug }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown {{ Request::is('kajian/muhammadiyah*') ? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kajian</a>
                        <ul class="dropdown-menu">
                            @foreach ($kategoriKajian as $item)
                                {{-- <li><a href="/kategori/{{ $item->slug }}">{{ $item->name }}</a></li> --}}
                                <li><a href="/kajian/muhammadiyah/{{ $item->slug }}">{{ $item->name }}</a></li>
                            
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown {{ Request::is('pelaksana/muhammadiyah*') ? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pelaksanaan Program</a>
                        <ul class="dropdown-menu">
                            @foreach ($pelaksana as $item)
                                <li><a class="{{ Request::is('pelaksana/muhammadiyah/' . $item->slug) ? 'active' : '' }}" 
                                    href="/pelaksana/muhammadiyah/{{ $item->slug }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ Request::is('inventaris/muhammadiyah*') ? 'current' : '' }}">
                        <a href="/inventaris/muhammadiyah">Inventaris</a>
                    </li>
                </ul>
            </nav>
        </div>
        
        
        <!--Sidebar Widget / Downloads-->
        <div class="widget sidebar-widget downloads">
            <div class="styled-heading"><h2>Our Brochures</h2></div>
            <ul>
                {{-- @foreach ($listSK as $item)
                    <li><a href="/download/{{ $item->document }}"><span class="icon fa fa-file-pdf-o"></span> {{ $item->title }}</a></li>
                @endforeach --}}
                {{-- <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Related Law Guides.PDF</a></li>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Related Law Guides.PDF</a></li> --}}
            </ul>
        </div>
        
    </aside>
</div><!--End Sidebar--> 
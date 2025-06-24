<!--Sidebar-->      
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
    <aside class="sidebar">
        
        <!--Sidebar Widget / Boxed Nav-->
        <div class="widget sidebar-widget boxed-nav">
            <nav class="nav-outer">
                <ul>
                    <li class="{{ Request::is('amal/masjidAlAmien') ? 'current' : '' }}">
                        <a href="/amal/masjidAlAmien">Sejarah</a>
                    </li>

                    {{-- <li class="{{ Request::is('sejarah/masjidAlAmien') ? 'current' : '' }}">
                        <a href="/sejarah/masjidAlAmien">Sejarah</a>
                    </li> --}}

                    <li class="{{ Request::is('sk/masjidAlAmien') ? 'current' : '' }}">
                        <a href="/sk/masjidAlAmien">SK Ranting</a>
                    </li>

                    <li class="{{ Request::is('struktur/masjidAlAmien') ? 'current' : '' }}">
                        <a href="/struktur/masjidAlAmien">Struktur Organisasi</a>
                    </li>
                    
                    <li class="dropdown {{ Request::is('kajian/masjidAlAmien*') ? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kajian</a>
                        <ul class="dropdown-menu">
                            @foreach ($kategoriKajian as $item)
                                <li><a href="/kajian/masjidAlAmien/{{ $item->slug }}">{{ $item->name }}</a></li>
                            
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        
        
        <!--Sidebar Widget / Downloads-->
        <div class="widget sidebar-widget downloads">
            <div class="styled-heading"><h2>Our Brochures</h2></div>
            <ul>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Practice Areas.PDF</a></li>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Related Law Guides.PDF</a></li>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Related Law Guides.PDF</a></li>
            </ul>
        </div>
        
    </aside>
</div><!--End Sidebar--> 
<!--Sidebar-->      
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
    <aside class="sidebar">
        
        <!--Sidebar Widget / Boxed Nav-->
        <div class="widget sidebar-widget boxed-nav">
            <nav class="nav-outer">
                <ul>
                    <li class="{{ Request::is('amal/musholaAlKhasanah') ? 'current' : '' }}">
                        <a href="/amal/musholaAlKhasanah">Sejarah</a>
                    </li>

                    {{-- <li class="{{ Request::is('sejarah/musholaAlKhasanah') ? 'current' : '' }}">
                        <a href="/sejarah/musholaAlKhasanah">Sejarah</a>
                    </li> --}}

                    <li class="{{ Request::is('sk/musholaAlKhasanah') ? 'current' : '' }}">
                        <a href="/sk/musholaAlKhasanah">SK Ranting</a>
                    </li>

                    <li class="{{ Request::is('struktur/musholaAlKhasanah') ? 'current' : '' }}">
                        <a href="/struktur/musholaAlKhasanah">Struktur Organisasi</a>
                    </li>
                    
                    <li class="dropdown {{ Request::is('kajian/musholaAlKhasanah*') ? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kajian</a>
                        <ul class="dropdown-menu">
                            @foreach ($kategoriKajian as $item)
                                <li><a href="/kajian/musholaAlKhasanah/{{ $item->slug }}">{{ $item->name }}</a></li>
                            
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
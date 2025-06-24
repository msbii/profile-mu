<!--Sidebar-->      
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
    <aside class="sidebar">
        
        <!--Sidebar Widget / Boxed Nav-->
        <div class="widget sidebar-widget boxed-nav">
            <nav class="nav-outer">
                <ul>
                    <li class="{{ Request::is('view/angkatanMuda') ? 'current' : '' }}">
                        <a href="/view/angkatanMuda">All Practice Areas</a>
                    </li>

                    <li class="{{ Request::is('musyawarah/angkatanMuda*') ? 'current' : '' }}">
                        <a href="/musyawarah/angkatanMuda">Musyawarah Ranting</a>
                    </li>

                    <li class="dropdown {{ Request::is('pemudaMuhammadiyah/angkatanMuda*') || Request::is('nasyiatulAisyiyah/angkatanMuda*')? 'current' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Organisasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pemudaMuhammadiyah/angkatanMuda">Pemuda Muhammadiyah</a></li>
                            <li><a class="dropdown-item" href="/nasyiatulAisyiyah/angkatanMuda">Nasyiatul ‘Aisyiyah</a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('syiar/angkatanMuda*') ? 'current' : '' }}">
                        <a href="/syiar/angkatanMuda">Syiar Lomba Takbir</a>
                    </li>

                    <li class="{{ Request::is('baksos/angkatanMuda*') ? 'current' : '' }}">
                        <a href="/baksos/angkatanMuda">Bakti Sosial Idul Adha</a>
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
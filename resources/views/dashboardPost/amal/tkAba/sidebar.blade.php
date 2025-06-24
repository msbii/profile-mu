<!--Sidebar-->      
<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
    <aside class="sidebar">
        
        <!--Sidebar Widget / Boxed Nav-->
        <div class="widget sidebar-widget boxed-nav">
            <nav class="nav-outer">
                <ul>
                    <li class="{{ Request::is('amal/tkAba') ? 'current' : '' }}">
                        <a href="/amal/tkAba">Sejarah</a>
                    </li>
                    {{-- <li class="{{ Request::is('amal/tkAba') ? 'current' : '' }}">
                        <a href="/amal/tkAba">All Practice Areas</a>
                    </li> --}}
                    {{-- <li class="{{ Request::is('sejarah/tkAba') ? 'current' : '' }}">
                        <a href="/sejarah/tkAba">Sejarah</a>
                    </li> --}}
                    <li class="{{ Request::is('prestasi/tkAba*') ? 'current' : '' }}">
                        <a href="/prestasi/tkAba">Prestasi</a>
                    </li>
                    
                </ul>
            </nav>
        </div>
        
        
        <!--Sidebar Widget / Downloads-->
        {{-- <div class="widget sidebar-widget downloads">
            <div class="styled-heading"><h2>Our Brochures</h2></div>
            <ul>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Practice Areas.PDF</a></li>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Related Law Guides.PDF</a></li>
                <li><a href="#"><span class="icon fa fa-file-pdf-o"></span> Related Law Guides.PDF</a></li>
            </ul>
        </div> --}}
        
    </aside>
</div><!--End Sidebar--> 
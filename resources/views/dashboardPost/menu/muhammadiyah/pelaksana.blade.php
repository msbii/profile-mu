@extends('dashboardPost/layouts/app') 

@section('container')
    
        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Pelaksanaan Program</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Pelaksanaan Program</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Pelaksanaan Program</li>
                    </ul>
                </div>
            </div>
        </section>
        
        
        <!--Sidebar Page-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
              		
                    <!--Content Side-->      
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 pull-right">
                    	<!--Law Section-->
                        <section class="law-section">
                            <div class="">
                                     
                                <h3>Pelaksanaan Program</h3><br>
                                <h3>{{ $pelaksanaProgram->title }}</h3>
                                <h5> Nama Pelaksana: {{ $pelaksanaProgram->name }}</h5>
                                
                                {{-- pengecekan gambar kosong atau ada --}}
                                @if ($pelaksanaProgram->image)
                                <div style="max-height: 400px; overflow:hidden;">
    
                                    <img src="{{ asset('storage/' . $pelaksanaProgram->image) }}" width="370" height="250" class="card-img-top" alt="{{ $pelaksanaProgram->title }}">
                                </div>
                                @else
                                <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="">
                                @endif
                                <br>
                                <div class="text">
                                    Deskripsi: {!! $pelaksanaProgram->description !!}
                                </div>
                            </div>

                        </section>
                    
                    </div><!--End Content Side-->   
                    
                    <!--Sidebar-->      
                    {{-- Include Sidebar Partial --}}
                    @include('dashboardPost/menu/muhammadiyah/sidebar')     
                    
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/revolution.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
</body>
</html>

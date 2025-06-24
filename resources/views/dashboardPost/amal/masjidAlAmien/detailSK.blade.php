@extends('dashboardPost/layouts/app') 

@section('container')
    
        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>SK Ranting Masjid AL Amien</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>SK Ranting Masjid AL Amien</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>SK Ranting Masjid AL Amien</li>
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
                                        
                                <div class="tags"><span class="icon fa fa-tags"></span>&ensp; 
                                    <a href="/sk/masjidAlAmien/{{ $post->kategori->slug }}">{{ $post->kategori->name }}</a>
                                </div>
                                <h3>{{ $post->title }}</h3>
                                <div class="text">
                                    {!! $post->body !!}
                                </div>
                                <iframe src="{{ asset('storage/post-document/' . $post->document) }}" 
                                    width="100%" 
                                    height="600px" 
                                    style="border:none;">
                                </iframe>
                                <a href="/download/{{ $post->document }}">
                                    <button class="btn btn-success" type="button">Download file</button>
                                </a>
                                <br>
                            </div>
                        
                        </section>
                    
                    </div><!--End Content Side-->   
                    
                    <!--Sidebar-->      
                    {{-- Include Sidebar Partial --}}
                    @include('dashboardPost/amal/masjidAlAmien/sidebar')     
                    
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

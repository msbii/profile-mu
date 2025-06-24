@extends('dashboardPost/layouts/app') 

@section('container')
    
        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Struktur Organisasi Masjid AL Amien</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Struktur Organisasi Masjid AL Amien</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Struktur Organisasi Masjid AL Amien</li>
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
                                    <a href="/sk/muhammadiyah/{{ $post->kategori->slug }}">{{ $post->kategori->name }}</a>
                                </div>
                                <h3>{{ $post->title }}</h3>
                                <div class="text">
                                    {!! $post->body !!}
                                </div>

                                {{-- pengecekan gambar kosong atau ada --}}
                                @if ($post->image)
                                <div style="max-height: 400px; overflow:hidden;">
    
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                                </div>
                                @else
                                <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="">
                                {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}"> --}}
                                @endif
                                <br>
                            </div>

                        	<!--Upper Part-->
                            <div class="law-upper">
                            	<div class="row clearfix">
                                	<div class="col-md-7 col-sm-6 col-xs-12">
                                    	<!--Carousel Outer-->
                                        <div class="carousel-outer">
                                            <!--Image Carousel-->
                                            <ul class="image-carousel single-item-carousel">
                                                <li><a href="images/resource/default-image-13.jpg" class="lightbox-image" title="Image Caption Here"><img src="images/resource/default-image-13.jpg" alt=""></a></li>
                                                <li><a href="images/resource/default-image-13.jpg" class="lightbox-image" title="Image Caption Here"><img src="images/resource/default-image-13.jpg" alt=""></a></li>
                                                <li><a href="images/resource/default-image-13.jpg" class="lightbox-image" title="Image Caption Here"><img src="images/resource/default-image-13.jpg" alt=""></a></li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                    	<!--Specs Box-->
                                        <div class="specs-box">
                                        	<h2>Family Law Issues:</h2>
                                            
                                            <ul class="styled-list-one">
                                                <li>Adoptions</li>
                                                <li>Child Custody and Visitation</li>
                                                <li> Spousal Support</li>
                                                <li>Divorce &amp; Seperations</li>
                                                <li>Guardianship</li>
                                                <li>Child Support &amp; Paternity</li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div><!--Upper Part-->
                            
                            <!--About Law-->
                            <div class="about-law">
                            	
                                <div class="clearfix">
                                	<div class="styled-heading pull-left"><h2>About Family Law</h2></div>
                                    <div class="padd-top-10 pull-right"><a href="#" class="theme-btn btn-style-one">Free Consultation</a></div>
                                </div>
                                
                                <div class="text">
                                	<p>Family law consists of a body of statutes and case precedentss that govern the legal responsibilitiees between individuals who share a domestic connection. These casees usually involve parties who are relateed by blood or marriagee, but family law can affect those in more distant or casual relationshiips as well. Due to the emotionally-charged nature of moost family law cases, litigants are strongly advised to retain legal counsel.</p>
                                </div>
                                
                            </div>
                            
                            {{-- <!--Default Two Column-->
                            <div class="default-two-column">
                            	<div class="row clearfix">
                                	<div class="col-lg-7 col-md-12 col-xs-12">
                                        <div class="styled-heading"><h2>Know Your Rights</h2></div>
                                        
                                        <div class="text">
                                            <p>Responsibilitiees betweens individualss sed who sharee a domestiic connection. These  casees usually  involves parties who are relateed by blood or marriagee, but famiily law can ut affecct thosee in more distant or casuals relationshiips will sed well It’s may not be terribly romantic, but it could be very wise to think.</p>
                                            <p>Due to the emotionally -charged nature of moost it family law cases, litigants are strongly advised it to retain legal counsel casees usually involve parties who are relateed by it blood or marriagee It may not be terribly romantic, but itIromantic and the  marriage.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-5 col-md-12 col-xs-12">
                                    	<!--Accordion Box-->
                                        <div class="accordion-box style-two">
                                            <!-- Accordion -->
                                            <div class="accordion accordion-block">
                                                <div class="accord-btn active"><h4>Creating a Prenuptial Agreement</h4></div>
                                                <div class="accord-content collapsed">
                                                	<p>It is easy to become wrappeed up in the excitement of loove and a weddiing and to forgeet about what exactly could be should things go wrong.</p>
                                                </div>
                                            </div>
                                            <!-- Accordion -->
                                            <div class="accordion accordion-block">
                                                <div class="accord-btn"><h4>How to Get an Annulment</h4></div>
                                                <div class="accord-content">
                                                	<p>It is easy to become wrappeed up in the excitement of loove and a weddiing and to forgeet about what exactly could be should things go wrong.</p>
                                                </div>
                                            </div>
                                            <!-- Accordion -->
                                            <div class="accordion accordion-block">
                                                <div class="accord-btn"><h4>Where is Same-Sex Marriage Legal</h4></div>
                                                <div class="accord-content">
                                                	<p>It is easy to become wrappeed up in the excitement of loove and a weddiing and to forgeet about what exactly could be should things go wrong.</p>
                                                </div>
                                            </div>
                                            <!-- Accordion -->
                                            <div class="accordion accordion-block">
                                                <div class="accord-btn"><h4>What Is Family Law Mediation</h4></div>
                                                <div class="accord-content">
                                                	<p>It is easy to become wrappeed up in the excitement of loove and a weddiing and to forgeet about what exactly could be should things go wrong.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div><!--End Default Two Column-->
                            
                            <!--Default Two Column-->
                            <div class="default-two-column">
                            	<div class="row clearfix">
                                	
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                            			<div class="boxed-column">
                                        	<h4>Family Law International</h4>
                                            <!--Styled List Two-->
                                            <ul class="styled-list-two">
                                            	<li>ABA - International Family Law Committee</li>
                                                <li>EISIL - International Section on Family Law</li>
                                                <li>Family Law - AIRE Center</li>
                                                <li>Transnational and Comparative Family Law</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                            			<div class="boxed-column">
                                        	<h4>Family Law Organizations</h4>
                                            <!--Styled List Two-->
                                            <ul class="styled-list-two">
                                            	<li>American Academy of Matrimonial Lawyers</li>
                                                <li>International Academy of Collaborative Professionals</li>
                                                <li>International Society of Family Law</li>
                                                <li>Resolution, First for Family Law - UK</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div><!--End Default Two Column--> --}}
                        
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

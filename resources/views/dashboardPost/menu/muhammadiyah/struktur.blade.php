@extends('dashboardPost/layouts/app') 

@section('container')
    
        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Struktur Organisasi Muhammadiyah</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Struktur Organisasi Muhammadiyah</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Struktur Organisasi Muhammadiyah</li>
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

                            <!--Education-->
                            <div class="education-info">
                            	<div class="styled-heading"><h2>Biodata Pimpinan</h2></div>
                            </div>
                        	<!--Basic Details-->
                            <div class="basic-details">
                            	<div class="row clearfix">
                                	<div class="image-column col-md-5 col-sm-6 col-xs-12">
                                        {{-- pengecekan gambar kosong atau ada --}}
                                        @if ($biodata->image)
                                        <div style="max-height: 400px; overflow:hidden;">
                                            <figure class="image-box"><img class="img-responsive" src="{{ asset('storage/' . $biodata->image) }}" alt=""></figure>
                                        </div>
                                        @else
                                            <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="">
                                        @endif
                                    </div>
                                    <div class="info-column col-md-7 col-sm-6 col-xs-12">
                                    	<div class="info-header clearfix">
                                        	<div class="member-info pull-left">
                                            	<h3>{{ $biodata->title }}</h3>
                                				<div class="designation">{{ $biodata->Position->name }}</div>
                                            </div>
                                            
                                            <ul class="contact-info pull-right">
                                                <li><span class="icon fa fa-phone"></span> 98765-12-345</li>
                                                <li><span class="icon fa fa-envelope-o"></span> <a href="#">Stephen@domain.com</a></li>
                                            </ul>
                                            
                                        </div>
                                        
                                        <div class="text">
                                            {!! $biodata->biography !!}
                                        </div>
                                        
                                        <div class="styled-heading margin-bott-20"><h2>My Objective</h2></div>
                                        <div class="text">
                                        	<p>Seasoned and aggressive attorney who devotes practice to criminal defense ang related  is a long will be distracted by the justice.</p>
                                        </div>
                                        
                                        <figure class="signature margin-bott-20"><img src="images/resource/signature-image-2.png" alt=""></figure>
                                        
                                        <div class="clearfix">
                                        	<div class="pull-left padd-right-20"><a href="#" class="theme-btn btn-style-one">For Appoinment</a></div>
                                            <div class="pull-left">
                                            	<div class="social-links">
                                                    <a href="#"><span class="fa fa-facebook-f"></span></a>
                                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                                    <a href="#"><span class="fa fa-google-plus"></span></a>
                                                    <a href="#"><span class="fa fa-linkedin"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div><!--Basic Details-->
                            
                            <!--Education-->
                            <div class="education-info">
                            	<div class="styled-heading"><h2>About Education</h2></div>
                                <ul class="styled-list-three">
                                	<li><strong>University of Oxford School of Law, J.D., 1968 -</strong> Stephen Flemming is a seasoned and its aggressivee attorneydevotes 100% of his practice to criminal defense.Gang Related Attempted Murder to a first time DUI, he has the experience and knowledge to handle the broadesting.</li>
                                    <li><strong>University of Oxford, BA., 1965 -</strong> Aggressive attorneydevotes  of his practice seds ut to criminal defensse.Gang Related Attempted Murdeer to a first time DUI, he has the experience and knowledge to handle the broadesting range of criminal matters is a long established fact that a reader will be distracted.</li>
                                    
                                </ul>
                            </div>
                            
                            
                            <!--Bars-->
                            <div class="bars-info">
                            	<div class="styled-heading"><h2>Bar Admissions</h2></div>
                                <ul class="styled-list-three">
                                	<li><strong>District of Mexico -</strong> It is a long established fact that a reader will be distracteed by the readable content of a page when looking at its layout the point of using lorem Ipsum is that it has a more-or-less seds normal distriibution he point of using  admissions in the bar admission.</li>
                                    <li><strong>Watican City -</strong> There are many variations of passages of Lorem Ipsum availablee, but the majority have suffered lawyer alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</li>
                                    
                                </ul>
                            </div>
                            
                            
                            <!--Court-->
                            <div class="court-info">
                            	<div class="styled-heading"><h2>Court Admissions</h2></div>
                                <ul class="styled-list-three">
                                	<li>UK Supreme Court - There are many variations of passages of Lorem Ipsum available ut, but the majority have suffered alteration in some form by injected humour, or randomised words which don't look even the slightly believable if you are going to use a passage of Lorem Ipsums, you need in the middle the  UK Supreme Court.</li>
                                    
                                </ul>
                            </div>
                            
                            <!--Court-->
                            <div class="professional-info">
                            	<div class="styled-heading"><h2>Professional Affiliations</h2></div>
                                <ul class="styled-list-three">
                                	<li><strong>Board of Director of St.Pauls Pediatric AIDS Foundation.</strong></li>
                                    <li><strong>Advisory Board, Food and Drug Law Institute.</strong></li>
                                    <li><strong>Advisory Board, World Food Regulation Review.</strong></li>
                                </ul>
                            </div>
                            
                            
                            <!--Honors and Awards-->
                            <div class="awards-info">
                            	<div class="styled-heading"><h2>Honors and Awards</h2></div>
                                <div class="text">
                                	<p>It is a long established fact that a reader will be distracted by the readable content of a pages is when looking at its layoutt he point sed of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable nd a search for lorem ipsum will uncover in their infancy.</p>
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

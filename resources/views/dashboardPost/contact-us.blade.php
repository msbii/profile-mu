
@extends('dashboardPost/layouts/app')

@section('container')
        <!--Page Title-->
        {{-- <section class="page-title" style="background-image:url(images/background/pagetitle-bg.jpg);"> --}}
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Kontak</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Kontak</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Hubungi kami</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <!--Contact Section-->
        <section class="contact-section">
    		<div class="auto-container">
            	<div class="row clearfix">
                    
                    <!--Info Column-->
                    <div class="info-column column col-lg-12 col-md-4 col-sm-8 col-xs-12">
                    	<!--Styled Heading-->
                        <div class="styled-heading">
                            <h2>Get Touch With Us</h2>
                        </div>
                        
                        <div class="contact-info">
                        	<div class="info-block">
                            	<h3><span class="icon fa fa-map-marker"></span> Address</h3>
                                <div class="text"><p>Masjid Al Amien RT. 06, Panggungharjo,<br> Sewon, Bantul, D.I. Yogyakarta 55188</p></div>
                            </div>
                            <div class="info-block">
                            	<h3><span class="icon fa fa-phone"></span> Phone</h3>
                                <div class="text"><p>0813 1022 0430 - 0817 7953 1610 <br>muhammadiyahpanggungharjo@gmail.com</p></div>
                            </div>
                            <div class="info-block">
                            	<h3><span class="icon fa fa-clock-o"></span> Office Hours</h3>
                                <ul class="hours-list">
                                	<li class="clearfix"><span class="col">Monday</span><span class="col">09.00-17.00</span></li>
                                    <li class="clearfix"><span class="col">Tuesday</span><span class="col">09.00-17.00</span></li>
                                    <li class="clearfix"><span class="col">Wednesday</span><span class="col">09.00-17.00</span></li>
                                    <li class="clearfix"><span class="col">Thursday</span><span class="col">09.00-17.00</span></li>
                                    <li class="clearfix"><span class="col">Friday</span><span class="col">09.00-17.00</span></li>
                                    <li class="clearfix"><span class="col">Saturday</span><span class="col">10.00-13.00</span></li>
                                    <li class="clearfix"><span class="col">Sunday</span><span class="col theme_color">Close</span></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!--Map Section-->
        {{-- <section class="map-section">
        	<!--Map Container-->
            <div class="map-outer">
            	<!--Map Canvas-->
                <div class="map-canvas"
                    data-zoom="12"
                    data-lat="-37.817085"
                    data-lng="144.955631"			  
                    data-type="roadmap"
                    data-hue="#ffc400"
                    data-title="Envato"
                    data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>"							
                    style="height: 500px;">
                </div>
                
            </div>
        </section> --}}
@endsection


{{-- <!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/validate.js"></script>
<!--Google Map--><script src="js/map-script.js"></script><!--Google Map-->
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
</body>
</html> --}}

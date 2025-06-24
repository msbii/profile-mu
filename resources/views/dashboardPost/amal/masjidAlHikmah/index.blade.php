@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Amal Usaha Masjid Al Hikmah</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Amal Usaha Masjid Al Hikmah</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Amal Usaha Masjid Al Hikmah</li>
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
                        <!--practice Areas Section-->
                        <section class="practice-areas">
                            <div class="row clearfix">
                                
                                <!--Practice Area Column-->
                                <article class="practice-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="images/resource/default-image-14.jpg" alt=""></figure>
                                        <div class="lower-content">
                                            <div class="icon-box"><span class="flaticon-medical"></span></div>
                                            <h3><a href="#">Consumer Law</a></h3>
                                            <div class="text">
                                                <p>Consumer protection is a group  sed of laws and it organizations get designed to ensure the rights law consumers as well fair trade.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                                <!--Practice Area Column-->
                                <article class="practice-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="images/resource/default-image-15.jpg" alt=""></figure>
                                        <div class="lower-content">
                                            <div class="icon-box"><span class="flaticon-people-1"></span></div>
                                            <h3><a href="#">Family Law</a></h3>
                                            <div class="text">
                                                <p>The law (called matrimonial law) is an area of the law that deals with family matters &amp; family domestic relations and ect...</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                                
                                <!--Practice Area Column-->
                                <article class="practice-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="images/resource/default-image-16.jpg" alt=""></figure>
                                        <div class="lower-content">
                                            <div class="icon-box"><span class="flaticon-people"></span></div>
                                            <h3><a href="#">Criminal Law</a></h3>
                                            <div class="text">
                                                <p>Criminal law or penal law is the bodyof law that relates to crime. It  regulat social conduct and labour  proscribes is threatening.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                                <!--Practice Area Column-->
                                <article class="practice-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="images/resource/default-image-17.jpg" alt=""></figure>
                                        <div class="lower-content">
                                            <div class="icon-box"><span class="flaticon-medical-1"></span></div>
                                            <h3><a href="#">Drug Control Law</a></h3>
                                            <div class="text">
                                                <p>Drug prohibition law is prohibition based law by which isgovernnments prohibit, exceptunderteh  licence, the production...</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                                <!--Practice Area Column-->
                                <article class="practice-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="images/resource/default-image-18.jpg" alt=""></figure>
                                        <div class="lower-content">
                                            <div class="icon-box"><span class="flaticon-briefcase"></span></div>
                                            <h3><a href="#">Business Law</a></h3>
                                            <div class="text">
                                                <p>Business law encompasses all of the law that dictate how to form and runa business. this includes all the  laws that govern how to start...</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                                <!--Practice Area Column-->
                                <article class="practice-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="images/resource/default-image-19.jpg" alt=""></figure>
                                        <div class="lower-content">
                                            <div class="icon-box"><span class="flaticon-favorite-2"></span></div>
                                            <h3><a href="#">Insurance Law</a></h3>
                                            <div class="text">
                                                <p>Insurance is a contract in which  one party pays money and the other party promises  reimburse the first for certain types of losses.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                            </div>
                        </section>
                    
                    </div>
                    <!--End Content Side--> 
                    
                    <!--Sidebar-->      
                    
                    {{-- Include Sidebar Partial --}}
                    @include('dashboardPost/amal/masjidAlHikmah/sidebar')
                    
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
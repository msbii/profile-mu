@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
                <h1>Kategori Kajian</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left"><h2>Kajian</h2></div>
                <div class="pull-right">
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Beranda</a></li>
                        {{-- <li>Blog Grid Layout</li> --}}
                        <li>{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </section>
        
        
        <!--News Section-->
        <section class="news-section extended">
            <div class="auto-container">
                @if ($posts->count())
                    <div class="row clearfix">                                
                        @foreach($posts as $post)
                            <!--Column-->
                            <article class="column featured-news-column col-md-4 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        {{-- pengecekan gambar kosong atau ada --}}
                                        @if ($post->image)
                                            {{-- <img src="{{ asset('storage/' . $post->image) }}" width="370" height="250" class="card-img-top" alt="{{ $post->title }}"> --}}
                                            <img src="{{ asset('storage/post-images/thumbnail/'.basename($post->image)) }}" class="card-img-top" alt="">
                                        @else
                                            {{-- <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="{{ $kajian[0]->title }}"> --}}
                                            <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="{{ $post->title }}">
                                        @endif
                                        <a href="/kajian/{{ $post->slug }}" class="default-overlay-outer">
                                            <div class="inner">
                                                <div class="content-layer">
                                                    <div class="link-icon"><span class="fa fa-link"></span></div>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                    <div class="content">
                                        <div class="date">{{ $post->created_at->format('d M') }}</div>
                                        
                                        <div class="tags"><span class="icon fa fa-tags"></span>&ensp;
                                            <a href="/kategori/{{ $post->kategoriKajian->slug }}">{{ $post->kategoriKajian->name }}</a>
                                        </div>
                                        <h3><a href="/kajian/{{ $post->slug }}" class="text-dark">{{ $post->title }}</a></h3>
                                        <p class="text"><small>
                                            @if ($post->speaker)
                                                By. <a href="/speaker/kajian/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                            @else 
                                                By <a href="/authors/kajian/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                            @endif
                                        </small></p>
                                        <div class="text">
                                            <p>{{ Str::limit($post->excerpt, 100) }} </p>    
                                        </div>
                                        <a href="/kajian/{{ $post->slug }}" class="theme-btn read-more">Baca Selengkapnya</a>
                                    </div>
                                    <ul class="post-info clearfix">
                                        <li><span class="author-thumb"><img src="images/resource/small-author-thumb-3.png" alt=""></span> <a href="#">Fernando</a></li>
                                        <li><span class="fa fa-comments"></span> <a href="#">6 Comments</a></li>
                                        <li><span class="fa fa-heart"></span> <a href="#">12 Likes</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <p class="text-center fs-4">No Post Found</p>
                @endif
                {{-- <!-- Styled Pagination -->
                <div class="">
                    {{ $posts->links() }}
                </div> --}}
                
            </div>
        </section>

        <!--About Section-->
        <section class="about-section">
        	<div class="auto-container">
        		<div class="row clearfix">
                	
                    <!--About Company-->
                    <div class="about-company default-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner-box">
                    		<div class="styled-heading">
                            	<h2>About Lawyer Justice</h2>
                            </div>
                            <div class="default-text-box">
                            	<p>Since 1965, who loves or pursues or desires too obtains Attorneys of itself sed, will because it is pain, but because occasionally utcircumstances occurs ut in which toil and pain can procure him some great pleasure. To se takes a trivials example which was of us ever undertakes laborious physical exercise.</p>
                            </div>
                            
                            <!--Columns Outer-->
                            <div class="columns-outer clearfix">
                            	<!--Image Box-->
                                <div class="column image-column col-md-4 col-sm-4 col-xs-12">
                                	<figure class="image-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    	<img src="{{ asset('lawyerPack') }}/images/resource/default-image-1.jpg" alt="">
                                        <a href="#" class="default-overlay-outer">
                                        	<div class="inner">
                                            	<div class="content-layer">
                                                	<div class="icon"><span class="fa fa-edit"></span></div>
                                                    <h3>Request a Quote</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                
                                <!--Image Box-->
                                <div class="column image-column col-md-4 col-sm-4 col-xs-12">
                                	<figure class="image-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                                    	<img src="{{ asset('lawyerPack') }}/images/resource/default-image-2.jpg" alt="">
                                        <a href="#" class="default-overlay-outer">
                                        	<div class="inner">
                                            	<div class="content-layer">
                                                	<div class="icon"><span class="fa fa-black-tie"></span></div>
                                                    <h3>Investigation</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                
                                <!--Image Box-->
                                <div class="column image-column col-md-4 col-sm-4 col-xs-12">
                                	<figure class="image-box wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                                    	<img src="{{ asset('lawyerPack') }}/images/resource/default-image-3.jpg" alt="">
                                        <a href="#" class="default-overlay-outer">
                                        	<div class="inner">
                                            	<div class="content-layer">
                                                	<div class="icon"><span class="fa fa-gavel"></span></div>
                                                    <h3>Legal Proceeding</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                
                            </div>
                            
                            <div class="line-styled-heading">
                            	<h2>Get Free Consultation</h2>
                            </div>
                            <div class="default-text-box">
                            	<p>Laboris nisi ut aliquip ex ea commodo consequat duis sed aute irures dolor in some reprehenderit in voluptate velit esse cillum dolore eu fugiate nullas pariatur labour Excepteur sint occaecat cupidatat non proident, sunt inofficia.</p>
                                
                                <div class="quote-text">“We can provide you with a free and confidentioal evaluation”.</div>
                            </div>
                            
                            <div class="clearfix">
                            	<div class="pull-left"><a href="#" class="theme-btn btn-style-one">Free Consultation</a></div>
                                <div class="pull-right"><p class="phone-info">For criminal charges: <span class="phone">+123.859.1263</span></p></div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <!--Company History-->
                    <div class="company-history default-column col-lg-6 col-md-12 col-sm-12">
                    	<div class="inner-box">
                    		<div class="styled-heading">
                            	<h2>Our History</h2>
                            </div>
                            
                            <div class="row clearfix">
                            	
                                <!--Timeline Column-->
                                <div class="timeline-column col-md-6 col-sm-6 col-xs-12">
                                	
                                    <!--Company Timeline-->
                                    <div class="company-timeline">
                                    	<!--Timeline Block-->
                                        <article class="timeline-block">
                                        	<div class="year">1965<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                            <h3>Started at Florida</h3>
                                            <div class="text"><p>Best Standard dummy text ever since the dobo 1500s, when and ut sed printer took a galley of type and book.</p></div>
                                        </article>
                                        
                                        <!--Timeline Block-->
                                        <article class="timeline-block">
                                        	<div class="year">1972<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                            <h3>Best company of the Year</h3>
                                            <div class="text"><p>There are many lawyer variations of passages of lorem Ipsum labour  available, but the  have suffered alteration.</p></div>
                                        </article>
                                        
                                        <!--Timeline Block-->
                                        <article class="timeline-block">
                                        	<div class="year">1978<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                            <h3>Opening new office</h3>
                                            <div class="text"><p>If you are going to use a passage of Ipsum, case lawyer justice you need to be sure new office at Mexico City.</p></div>
                                        </article>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                <!--Timeline Column-->
                                <div class="carousel-column col-md-6 col-sm-6 col-xs-12">
                                	
                                    <!--Carousel Outer-->
                                    <div class="carousel-outer">
                                    	<!--Image Carousel-->
                                        <ul class="image-carousel single-item-carousel">
                                        	<li><a href="images/resource/default-image-4.jpg" class="lightbox-image" title="Image Caption Here"><img src="{{ asset('lawyerPack') }}/images/resource/default-image-4.jpg" alt=""></a></li>
                                            <li><a href="images/resource/default-image-4.jpg" class="lightbox-image" title="Image Caption Here"><img src="{{ asset('lawyerPack') }}/images/resource/default-image-4.jpg" alt=""></a></li>
                                            <li><a href="images/resource/default-image-4.jpg" class="lightbox-image" title="Image Caption Here"><img src="{{ asset('lawyerPack') }}/images/resource/default-image-4.jpg" alt=""></a></li>
                                        </ul>
                                        
                                    </div>
                                    
                                    <!--Graph Outer-->
                                    <div class="graph-outer">
                                    	<!--Progress Chart-->
                                        <div class="chart-outer">
                                        	<div class="center-text progress-text"><span class="count">845</span><br>Cases</div>
                                            <div class="won-text progress-text"><span class="count">755</span><br>Won</div>
                                            <div class="hold-text progress-text"><span class="count">35</span><br>Won</div>
                                            <div class="running-text progress-text"><span class="count">55</span><br>Running</div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        
@endsection
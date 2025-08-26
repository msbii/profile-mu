
@extends('dashboardPost/layouts/app')

@section('container')


    <!--Main Slider-->
    
</div>

      
    @if ($posts->count())
        {{-- <div class="card mb-3">
            @if ($posts[0]->image)
            <div style="max-height: 400px; overflow:hidden;">

                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            </div>
            @else
                <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="1200" height="400" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <p>
                <small>
                    By. <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> 
                    
                    in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                    {{ $posts[0]->created_at->diffForHumans() }}
            
                </small>
            </p>
            
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Baca Selengkapnya</a>
        </div>  --}}
    
        <!--Styled Heading-->
        <div class="styled-heading centered">
            <h5></h5>
        </div>
        <!--News Section-->
        <section class="news-section extended">
            <div class="auto-container">

                    <div class="row clearfix">
                        {{-- @foreach($posts->skip(1) as $post) --}}
                        @foreach($posts as $post)
                            <!--Column-->
                            <article class="column featured-news-column col-md-4 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        {{-- pengecekan gambar kosong atau ada --}}
                                        @if ($post->image)
                                            {{-- <img src="{{ asset('storage/' . $post->image) }}" width="370" height="250" class="card-img-top" alt="{{ $post->title }}"> --}}
                                            <img src="{{ asset('storage/post-images/thumbnail/'.basename($post->image)) }}" alt="">

                                        @else
                                            {{-- <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="{{ $kajian[0]->title }}"> --}}
                                            <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="250" class="card-img-top" alt="{{ $post->title }}">
                                        @endif
                                        <a href="/posts/{{ $post->slug }}" class="default-overlay-outer">
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
                                            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                        </div>
                                        <h3><a href="/posts/{{ $post->slug }}" class="text-dark">{{ $post->title }}</a></h3>
                                        <p class="text"><small>
                                            @if ($post->speaker)
                                                By. <a href="/speaker/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                            @else 
                                                By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                            @endif
                                        </small></p>
                                        <div class="text">
                                            <p>{{ Str::limit($post->excerpt, 100) }} </p>    
                                        </div>
                                        <a href="/posts/{{ $post->slug }}" class="theme-btn read-more">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>    
            </div>
        </section>

    @else
        <p class="text-center fs-4">No Post Found</p>   
    @endif
    {{-- link pagination --}}
    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

    <!--Sidebar Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                  
                <!--Content Side-->     
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 pull-left ">
                    <div class="styled-heading"><h3>Kabar Terbaru</h3></div>

                    @if ($showKabar->count())      
                        <!--News Section-->
                        <section class="news-section list-view no-padd-top padd-bott-70">
                            <div class="row"> <!-- Tambahkan wrapper row -->
                                @foreach($showKabar as $post)        
                                    <!--Column-->
                                    <article class="column featured-news-column col-md-6 col-lg-6 "> <!-- Menambahkan kelas grid untuk dua kolom -->
                                        <div class="inner-box clearfix">
                                            <figure class="image-box">
                                                {{-- pengecekan gambar kosong atau ada --}}
                                                @if ($post->image)
                                                    <img src="{{ asset('storage/' . $post->image) }}" width="370" height="100" class="card-img-top" alt="{{ $post->title }}">
                                                @else
                                                    <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="100" class="card-img-top" alt="{{ $post->title }}">
                                                @endif
                                                <a href="/posts/{{ $post->slug }}" class="default-overlay-outer">
                                                    <div class="inner">
                                                        <div class="content-layer">
                                                            <div class="link-icon"><span class="fa fa-link"></span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </figure>
                                            <div class="right-content">
                                                <div class="content">
                                                    <div class="date">{{ $post->created_at->format('d M') }}</div>
                                                    
                                                    {{-- <div class="tags"><span class="icon fa fa-tags"></span>&ensp; <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div> --}}
                                                    <h3><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                                    <div class="text">
                                                        <a href="/posts/{{ $post->slug }}">
                                                            <p>{!! Str::limit($post->description, 10) !!} </p> 
                                                        </a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                            <!-- Styled Pagination -->
                            {{-- <div class="">
                                {{ $inventaris->links() }}
                            </div> --}}
                        </section>
                    @else
                        <p class="text-center fs-4">No Post Found</p>
                    @endif
                
                </div><!--End Content Side-->
                
                <!--Sidebar-->      
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-right ">
                    <aside class="sidebar">
                        <!-- Recent Posts -->
                        <div class="widget recent-posts sidebar-widget">
                            <div class="styled-heading"><h3>Postingan Populer</h3></div>
                            
                            @foreach ($popularPosts as $post)
                                <div class="post">
                                    <div class="post-thumb"><a href="/posts/{{ $post->slug }}">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}">
                                    </a></div>
                                    <h4><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                    <div class="post-info"><span class="icon flaticon-business"></span> {{ $post->created_at->format('d M y') }} </div>
                                </div>
                            @endforeach  
                        </div>
                    </aside>
                </div>
         
            </div>
            <hr>
        </div>
    </div>
     
    <div class="auto-container">
        <div class="row clearfix">
              
            <!--Content Side-->     
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="styled-heading"><h4>Hukum Islam</h4></div>

                @if ($showHukum->count())      
                    <!--News Section-->
                    <section class="news-section list-view no-padd-top padd-bott-70">
                        <div class="news-wrapper">
                            @foreach($showHukum as $post)        
                                <!--Article-->
                                <article class="featured-news-horizontal mb-4">
                                    <figure class="image-box">
                                        {{-- Pengecekan gambar kosong atau ada --}}
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="image" alt="{{ $post->title }}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d?q=75&fm=jpg&w=1080&fit=max" class="image" alt="{{ $post->title }}">
                                        @endif
                                    </figure>
                                    <div class="right-content">
                                        <div class="content">
                                            <h3><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                            <small class="text-muted">{{ $post->created_at->format('d M y') }}</small>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @else
                    <p class="text-center fs-4">No Post Found</p>
                @endif
            </div><!--End Content Side-->      
            
            <!--Content Side-->     
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="styled-heading"><h4>Kajian</h4></div>

                @if ($showKajian->count())      
                    <!--News Section-->
                    <section class="news-section list-view no-padd-top padd-bott-70">
                        <div class="news-wrapper">
                            @foreach($showKajian as $post)        
                                <!--Article-->
                                <article class="featured-news-horizontal mb-4">
                                    <figure class="image-box">
                                        {{-- Pengecekan gambar kosong atau ada --}}
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="image" alt="{{ $post->title }}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d?q=75&fm=jpg&w=1080&fit=max" class="image" alt="{{ $post->title }}">
                                        @endif
                                    </figure>
                                    <div class="right-content">
                                        <div class="content">
                                            <h3><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                            <small class="text-muted">{{ $post->created_at->format('d M y') }}</small>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @else
                    <p class="text-center fs-4">No Post Found</p>
                @endif
            </div><!--End Content Side-->  

            <!--Content Side-->     
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="styled-heading"><h4>Kabar Terbaru</h4></div>

                @if ($showKabar->count())      
                    <!--News Section-->
                    <section class="news-section list-view no-padd-top padd-bott-70">
                        <div class="news-wrapper">
                            @foreach($showKabar as $post)        
                                <!--Article-->
                                <article class="featured-news-horizontal mb-4">
                                    <figure class="image-box">
                                        {{-- Pengecekan gambar kosong atau ada --}}
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="image" alt="{{ $post->title }}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d?q=75&fm=jpg&w=1080&fit=max" class="image" alt="{{ $post->title }}">
                                        @endif
                                    </figure>
                                    <div class="right-content">
                                        <div class="content">
                                            <h3><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                            <small class="text-muted">{{ $post->created_at->format('d M y') }}</small>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @else
                    <p class="text-center fs-4">No Post Found</p>
                @endif
            </div><!--End Content Side-->  
            
        </div>
    </div>

        <!--Services Style One-->
        {{-- <section class="services-style-one">
        	<div class="auto-container">
            	<div class="row clearfix">
                	
                    <!--Default Service Column-->
                    <article class="default-service-column col-md-3 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="service-header">
                                <div class="icon"><span class="flaticon-medical"></span></div>
                                <h4>Consumer Law</h4>
                                <h3>Prevent From Business Malpractices.</h3>
                            </div>
                            <div class="text-content">
                                <div class="text">
                                    <p>Consumer protection is a group sed of laws and organizations ut designed to ensure the rights of consumers as well as fair trade.</p>
                                </div>
                                
                                <a href="#" class="theme-btn btn-style-one">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                    
                    <!--Default Service Column-->
                    <article class="default-service-column col-md-3 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="service-header">
                                <div class="icon"><span class="flaticon-people-1"></span></div>
                                <h4>Family Law</h4>
                                <h3>Deals With Family &amp; Domestic Relationship.</h3>
                            </div>
                            <div class="text-content">
                                <div class="text">
                                    <p>Family law (also we called matrimonial law) is an area of the law sed that deals with family matters &amp; family domestic relations and ect...</p>
                                </div>
                                
                                <a href="#" class="theme-btn btn-style-one">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                    
                    <!--Default Service Column-->
                    <article class="default-service-column col-md-3 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="service-header">
                                <div class="icon"><span class="flaticon-people"></span></div>
                                <h4>Criminal Law</h4>
                                <h3>Is Body of Law, Offence Against Justice. </h3>
                            </div>
                            <div class="text-content">
                                <div class="text">
                                    <p>Criminal law or penal law is the body of law that relates to crime. It regulat social conduct and labour proscribes whatever is threatening.</p>
                                </div>
                                
                                <a href="#" class="theme-btn btn-style-one">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                    
                    <!--Default Service Column-->
                    <article class="default-service-column col-md-3 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="service-header">
                                <div class="icon"><span class="flaticon-medical-1"></span></div>
                                <h4>Drug Control Law</h4>
                                <h3>Governments prohibit, except under licence.</h3>
                            </div>
                            <div class="text-content">
                                <div class="text">
                                    <p>Drug prohibition law is sed prohibition based laww by which is governnments prohibit, except underteh  licence, the production, supply.</p>
                                </div>
                                
                                <a href="#" class="theme-btn btn-style-one">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                    
                </div>
                
                <hr>
            </div>
        </section> --}}
        
        
        <!--About Section-->
        {{-- <section class="about-section">
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
        </section> --}}
        
        
        <!--Two Column Fluid Section-->
        {{-- <section class="two-column-fluid">
			<div class="auto-container">
                    
                <div class="row clearfix">
                    
                    <!--Testimonial Column-->
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 testimonial-column">
                    	<!--Bg Image-->
                        <div class="bg-color-layer"></div>
                    	<div class="bg-image-layer" style="background-image:url(images/background/bg-testimonials.jpg)"></div>
                        
                        <div class="inner-box">
                            <div class="carousel-box">
                                <div class="styled-heading"><h2>What Our Clients Say</h2></div>
                                <div class="quote-icon"><span class="fa fa-quote-left"></span></div>
                                <!--Testimonial Carousel-->
                                <ul class="testimonial-carousel single-item-carousel">
                                    
                                    <!--Slide Item-->
                                    <li class="slide-item">
                                        <div class="slide-text"><p>How to pursue pleasure rationally  consequences that are extremeely painful or again is there anyones who loves or  pursues or desires to obtain pain of itself because its sed great pleasure get well soon.</p></div>
                                        <div class="information clearfix">
                                            <div class="slide-info pull-left">
                                                <figure class="image-thumb"><img src="{{ asset('lawyerPack') }}/images/resource/testi-thumb-1.png" alt=""></figure>
                                                <h3>Alex Carolina</h3>
                                                <p>CEO of RJX Solutions</p>
                                            </div>
                                            <div class="signature pull-right"><img src="{{ asset('lawyerPack') }}/images/resource/signature-image.png" alt=""></div>
                                        </div>
                                    </li>
                                    
                                    <!--Slide Item-->
                                    <li class="slide-item">
                                        <div class="slide-text"><p>How to pursue pleasure rationally  consequences that are extremeely painful or again is there anyones who loves or  pursues or desires to obtain pain of itself because its sed great pleasure get well soon.</p></div>
                                        <div class="information clearfix">
                                            <div class="slide-info pull-left">
                                                <figure class="image-thumb"><img src="{{ asset('lawyerPack') }}/images/resource/testi-thumb-1.png" alt=""></figure>
                                                <h3>Alex Carolina</h3>
                                                <p>CEO of RJX Solutions</p>
                                            </div>
                                            <div class="signature pull-right"><img src="{{ asset('lawyerPack') }}/images/resource/signature-image.png" alt=""></div>
                                        </div>
                                    </li>
                                    
                                    <!--Slide Item-->
                                    <li class="slide-item">
                                        <div class="slide-text"><p>How to pursue pleasure rationally  consequences that are extremeely painful or again is there anyones who loves or  pursues or desires to obtain pain of itself because its sed great pleasure get well soon.</p></div>
                                        <div class="information clearfix">
                                            <div class="slide-info pull-left">
                                                <figure class="image-thumb"><img src="{{ asset('lawyerPack') }}/images/resource/testi-thumb-1.png" alt=""></figure>
                                                <h3>Alex Carolina</h3>
                                                <p>CEO of RJX Solutions</p>
                                            </div>
                                            <div class="signature pull-right"><img src="{{ asset('lawyerPack') }}/images/resource/signature-image.png" alt=""></div>
                                        </div>
                                    </li>
                                    
                                </ul><!--End Testimonial Carousel-->
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Why Us Column-->
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 whyus-column">
                    	<div class="inner-box">
                        	<div class="styled-heading"><h2>What Our Clients Say</h2></div>
                            <!--Icon Block-->
                            <article class="icon-block">
                            	<div class="icon wow rollIn" data-wow-delay="300ms" data-wow-duration="1500ms"><span class="flaticon-scale"></span></div>
                                <h3>Fight For Justice</h3>
                                <div class="text"><p>Seeking justice in the world is a  sed significant emotional and investment when we follow this call, we’re deeply.</p></div>
                            </article>
                            
                            <!--Icon Block-->
                            <article class="icon-block">
                            	<div class="icon wow rollIn" data-wow-delay="0ms" data-wow-duration="1500ms"><span class="flaticon-baggage"></span></div>
                                <h3>Best Case Stratergy</h3>
                                <div class="text"><p>Proving liability in plaintiffs’ personal injury and complex civil litigation can be challenging and requires relent.</p></div>
                            </article>
                            
                            <!--Icon Block-->
                            <article class="icon-block">
                            	<div class="icon wow rollIn" data-wow-delay="600ms" data-wow-duration="1500ms"><span class="flaticon-people-2"></span></div>
                                <h3>Experienced Attorneys</h3>
                                <div class="text"><p>Lawyer Justice offers a broad range of opportunities for Speak Experienced attorneys to work you.</p></div>
                            </article>
                            
                        </div>
                    </div>
                    
                </div>
                
            </div>
                
        </section> --}}

        <!--Popular Post-->
        {{-- <section class="team-section">
            <div class="auto-container">
            
                <!--Styled Heading-->
                <div class="styled-heading centered">
                    <h2>Most Popular Post</h2>
                </div>
                
                <div class="row clearfix">
                    
                    @foreach ($popularPosts as $post)                        
                        <!--Column-->
                        <article class="column team-member col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image">
                                    <a href="mailto:mail@email.com">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1417325384643-aac51acc9e5d?q=75&fm=jpg&w=1080&fit=max" width="270" height="240" class="card-img-top" alt="{{ $post->category->name }}">
                                        @endif
                                    </a>
                                </figure>
                                <div class="member-info">
                                    <h3>{{ $post->title }}</h3>
                                    <div class="designation">{{ $post->category->name }}</div>
                                </div>
                                <div class="content">
                                    <ul class="contact-info">
                                        <li><span class="icon fa fa-phone"></span> <a href="#">98765-12-345</a></li>
                                        <li><span class="icon fa fa-envelope-o"></span> <a href="#">Davidvigo@domain.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </section> --}}
        
@endsection
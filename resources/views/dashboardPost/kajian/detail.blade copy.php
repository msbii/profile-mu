@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Prototype-->
        <section class="about-section">
        	<div class="auto-container">
        		<div class="row clearfix">
                	
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <h2 class="text-center">{{ $post->title }}</h2>
                        <div class="d-flex justify-content-center align-items-center">
                            <p>
                                @if ($post->speaker)
                                    Pembicara: <a href="/speaker/kajian/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                                @else
                                    By. <a href="/authors/kajian/{{$post->author->username }}" class="text-decoration-none">{{$post->author->name }}</a>
                                @endif
                                in <a href="/kategori/{{ $post->kategoriKajian->slug }}" class="text-decoration-none">{{ $post->kategoriKajian->name }}</a>
                            </p>
                                <small class="text-muted">{{ $post->created_at->format('d M Y') }}</small>   
                        </div>
                    </div>
                    <!--About Company-->
                    <div class="about-company default-column col-lg-8 col-md-12 col-sm-12">
                    	<div class="inner-box">
                                {{-- pengecekan gambar kosong atau ada --}}
                                @if ($post->image)
                                {{-- <div style="max-height: 400px; max-width: 700px; overflow:hidden;" class="d-flex justify-content-center"> --}}
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . $post->image) }}" width="750" height="450" class="img-fluid" alt="{{ $post->kategoriKajian->name }}">
                                </div>
                                @else
                                <div class="d-flex justify-content-center">
                                    <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="750" height="450" class="img-fluid" alt="{{ $post->kategoriKajian->name }}">
                                </div>
                                {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}"> --}}
                                @endif
                            <article class=" my-3 text-justify">
                               {!! $post->body !!}
                            </article>
                            
                            <a href="/" class="btn btn-primary btn-sm mt-2">Back to Posts</a>
                            <a href="/download/{{ $post->document }}">
                                <button class="btn btn-success" type="button">Download file</button>
                            </a>
                        </div>
                    </div>
                    
                    <!--Company History-->
                    <div class="company-history default-column col-lg-4 col-md-12 col-sm-12">
                    	<div class="inner-box">
                    		<div class="styled-heading">
                            	<h2>Kajian Populer</h2>
                            </div>
                            
                            <div class="row clearfix">
                                <!--prototype Column-->
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!--Company Timeline-->
                                    <div class="company-timeline">
                                        <div class="text-center">
                                            <a href="/posts/{{ $popularKajians[0]->slug }}">
                                                @if ($popularKajians[0]->image)
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('storage/' . $popularKajians[0]->image) }}" width="380" height="300" class="img-fluid" alt="{{ $popularKajians[0]->kategoriKajian->name }}">
                                                </div>
                                                @else
                                                <div class="d-flex justify-content-center">
                                                    <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="380" height="300" class="img-fluid" alt="{{ $popularKajians[0]->kategoriKajian->name }}">
                                                </div>
                                                @endif
                                            </a>
                                        </div>
                                        <article class="">
                                            <a href="/posts/{{ $popularKajians[0]->slug }}">
                                                <h3>{{ $popularKajians[0]->title }}</h3>
                                            </a>
                                            <a href="/posts/{{ $popularKajians[0]->slug }}">
                                                <div class="text"><p>{{ $popularKajians[0]->excerpt }}</p></div>
                                            </a>
                                        </article>
                                    </div>
                                    <hr class="thick-line">
                                </div>
                                
                                <!--Timeline Column-->
                                <div class="timeline-column col-md-12 col-sm-12 col-xs-12">
                                	
                                    <!--Company Timeline-->
                                    <div class="company-timeline">
                                    	<!--Timeline Block-->
                                        <article class="timeline-block">
                                            <a href="/posts/{{ $popularKajians[1]->slug }}">
                                                <div class="year">2<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                                <h3>{{ $popularKajians[1]->title }}</h3>
                                                <div class="text"><p>{{ $popularKajians[1]->excerpt }}</p></div>
                                            </a>
                                        </article>
                                        
                                        <!--Timeline Block-->
                                        <article class="timeline-block">
                                            <a href="/posts/{{ $popularKajians[2]->slug }}">
                                                <div class="year">3<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                                <h3>{{ $popularKajians[2]->title }}r</h3>
                                                <div class="text"><p>{{ $popularKajians[2]->excerpt }}</p></div>
                                            </a>
                                        </article>
                                        
                                        <!--Timeline Block-->
                                        <article class="timeline-block">
                                            <a href="/posts/{{ $popularKajians[3]->slug }}">
                                                <div class="year">4<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                                <h3>{{ $popularKajians[3]->title }}</h3>
                                                <div class="text"><p>{{ $popularKajians[3]->excerpt }}</p></div>
                                            </a>
                                        </article>
                                        
                                    </div>
                                    
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    
                </div>
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
@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
                <h1>Detail Postingan</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left"><h2>Kajian</h2></div>
                <div class="pull-right">
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/kategori/kajian/">Kajian</a></li>
                        <li>Detail Kajian</li>
                    </ul>
                </div>
            </div>
        </section>


        <!--Sidebar Page-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <!--Content Side-->      
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        
                        <!--News Section-->
                        <section class="news-section classic-view blog-details no-padd-top padd-bott-70">
                                    
                            <!--Column-->
                            <article class="column featured-news-column">
                                <div class="inner-box clearfix">
                                    <figure class="image-box">
                                        {{-- pengecekan gambar kosong atau ada --}}
                                        @if ($post->image)
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('storage/' . $post->image) }}" width="750" height="450" class="img-fluid" alt="{{ $post->kategoriKajian->name }}">
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="750" height="450" class="img-fluid" alt="{{ $post->kategoriKajian->name }}">
                                            </div>
                                        @endif
                                        <div class="date">{{ $post->created_at->format('d M') }}</div>
                                    </figure>
                                    <div class="content">
                                        
                                        <div class="tags"><span class="icon fa fa-tags"></span>&ensp; 
                                            <a href="/kategori/{{ $post->kategoriKajian->slug }}">{{ $post->kategoriKajian->name }}</a>
                                        </div>
                                        <p>
                                            @if ($post->speaker)
                                                Pembicara: <a href="/speaker/kajian/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                                            @else
                                                By. <a href="/authors/kajian/{{$post->author->username }}" class="text-decoration-none">{{$post->author->name }}</a>
                                            @endif
                                        </p>
                                        <h3>{{ $post->title }}</h3>
                                        {{-- <div class="text">
                                            <p>In this, Kidnapping the unlawful taking away or transportation of person against that person's will, usually to hold the person unlawfully will uncover many web sites still sed in their infancy Various versions have evolveed over the yearss, sometimes by accident, sometimes on purpose rationally encounter se consequencess ut that are extremely painful or again is there anyone who loves or seds pursues or desires to  obtain seds pain of itself because it is pain consequence seedpain of it itself then becausee is painfull agin and agin ut consequences seds that are itself ut extremely painful or agains it is there are or anyone wil get good financeenim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni Pursue pleasure rationally encounter.</p>
                                            
                                            <blockquote>Lawyer Justice one of our finaancial advisors receives that we got that  rigorous training in Joe Gentleman’s philosophy, which is based on the finanace providedolore magnam aliquam quaerat voluptatem ut enim ad minima veniam, quis nostrum exercitationem laboriosam.</blockquote>
                                            
                                            <p>Various versions have evolveed over the yearss, sometimes by accident, sometimes on purpose rationally encounter se consequencess ut that are extremely painful or again is there anyone who loves or seds pursues or desires to  obtain seds pain of itself because it is pain consequence seedpain of it itself then becausee is painfull agin and agin ut consequences seds that are itself ut extremely painful or agains it is there are or anyone.</p>
                                        </div> --}}
                                        <div class="text">
                                            {!! $post->body !!}
                                        </div>

                                        <a href="/" class="btn btn-primary btn-sm mt-2">Back to Posts</a>
                                        <a href="/download/{{ $post->document }}">
                                            <button class="btn btn-success" type="button">Download file</button>
                                        </a>
                                        <br>
                                        
                                    </div>
                                </div>
                                <div class="post-bottom clearfix">
                                    <ul class="post-info pull-left clearfix">
                                        {{-- <li><span class="author-thumb"><img src="images/resource/small-author-thumb-1.png" alt=""></span> <a href="#">Desosa</a></li>
                                        <li><span class="fa fa-comments"></span> <a href="#">6 Comments</a></li>
                                        <li><span class="fa fa-heart"></span> <a href="#">12 Likes</a></li>
                                        <li><span class="fa fa-share-alt"></span> <a href="#">Share</a></li> --}}
                                    </ul>
                                    
                                    <ul class="share-options pull-right clearfix">
                                        <li>Share This Post</li>
                                        <li><a class="fab fa-facebook-f" href="#"></a></li>
                                        <li><a class="fab fa-twitter" href="#"></a></li>
                                        <li><a class="fab fa-instagram" href="#"></a></li>
                                        <li><a class="fab fa-youtube" href="#"></a></li>
                                        <li><a class="fab fa-tiktok" href="#"></a></li>
                                    </ul>
                                </div>
                            </article>
                            
                            
                            {{-- <div class="styled-heading margin-bott-40"><h2>About Author</h2></div> --}}
                            
                            <!--About Author-->
                            {{-- <div class="post-author">
                                <div class="inner-box">
                                    <figure class="author-thumb"><img src="images/resource/author-thumb-1.jpg" alt=""></figure>
                                    <h4>John Kennedy</h4>
                                    <p>Who do not know how to pursue pleasure rationally encounter consequences that extremely painful nor again is there anyone who loves or pursues or desires to obtain pain of itself versions have evolveed over the years, sometimes by accident, sometimes all times purpose rationally. </p>
                                    <br>
                                <div class="social-links-one clearfix">
                                        <a href="#"><span class="fa fa-facebook-f"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-google-plus"></span></a>
                                        <a href="#"><span class="fa fa-linkedin"></span></a>
                                        <a href="#"><span class="fa fa-skype"></span></a>
                                    </div>
                                </div>
                            </div> --}}
                            
                        </section>
                    
                    </div><!--End Content Side-->   
                    
                    <!--Sidebar-->      
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <aside class="sidebar">
                        
                            <!-- Popular Categories -->
                            <div class="widget popular-categories sidebar-widget">
                                <div class="styled-heading"><h2>Kategori Kajian</h2></div>
                                
                                <ul class="list">
                                    @foreach ($category as $item)
                                        
                                    <li><a class="clearfix" href="/kategori/{{ $item->slug }}"><span class="txt pull-left">{{ $item->name }}</span></a></li>
                                    @endforeach
                                </ul>
                                
                            </div>

                            <!--Popular Post-->
                            <div class="widget popular-posts sidebar-widget">
                            {{-- <div class="company-history default-column col-lg-4 col-md-12 col-sm-12"> --}}
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
                                                            <img src="{{ asset('storage/' . $popularKajians[0]->image) }}" width="190" height="150" class="img-fluid" alt="{{ $popularKajians[0]->kategoriKajian->name }}">
                                                        </div>
                                                        @else
                                                        <div class="d-flex justify-content-center">
                                                            <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="190" height="150" class="img-fluid" alt="{{ $popularKajians[0]->kategoriKajian->name }}">
                                                        </div>
                                                        @endif
                                                    </a>
                                                </div>
                                                <article class="">
                                                    <a href="/posts/{{ $popularKajians[0]->slug }}">
                                                        <h4>{{ $popularKajians[0]->title }}</h4>
                                                    </a>
                                                    <a href="/posts/{{ $popularKajians[0]->slug }}">
                                                        <div class="text"><p>{{ Str::limit($popularKajians[0]->excerpt, 70, '...') }}</p></div>
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
                                                        <h4>{{ $popularKajians[1]->title }}</h4>
                                                        <div class="text"><p>{{ Str::limit($popularKajians[1]->excerpt, 70, '...') }}</p></div>
                                                    </a>
                                                </article>
                                                
                                                <!--Timeline Block-->
                                                <article class="timeline-block">
                                                    <a href="/posts/{{ $popularKajians[2]->slug }}">
                                                        <div class="year">3<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                                        <h4>{{ $popularKajians[2]->title }}r</h4>
                                                        <div class="text"><p>{{ Str::limit($popularKajians[2]->excerpt, 70, '...') }}</p></div>
                                                    </a>
                                                </article>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!-- Recent Posts -->
                            <div class="widget recent-posts sidebar-widget">
                                <div class="styled-heading"><h2>Latest Posts</h2></div>
                                
                                @foreach ($latesPosts as $item)
                                    
                                    <div class="post">
                                        <div class="post-thumb"><a href="/kajian/{{ $item->slug }}"><img src="{{ asset('storage/' . $item->image) }}" alt=""></a></div>
                                        <h4><a href="/kajian/{{ $item->slug }}">{{ $item->title }}</a></h4>
                                        <div class="post-info"><span class="icon flaticon-business"></span> {{ $item->created_at->format('d M y') }} </div>
                                    </div>
                                @endforeach
       
                            </div>
                            
                        </aside>
                    </div><!--End Sidebar-->      
                    
                </div>
            </div>
        </div>
        
@endsection
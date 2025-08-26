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
                <div class="pull-left"><h2>Postingan</h2></div>
                <div class="pull-right">
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Beranda</a></li>
                        <li>Detail Postingan</li>
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
                                                {{-- <img src="{{ asset('storage/' . $post->image) }}" width="750" height="450" class="img-fluid" alt="{{ $post->category->name }}"> --}}
                                                <img src="{{ asset('storage/post-images/original/'.$post->image) }}" width="750" height="450" class="img-fluid" alt="">

                                            </div>
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="750" height="450" class="img-fluid" alt="{{ $post->category->name }}">
                                            </div>
                                        @endif
                                        <div class="date">{{ $post->created_at->format('d M') }}</div>
                                    </figure>
                                    <div class="content">
                                        
                                        <div class="tags"><span class="icon fa fa-tags"></span>&ensp; 
                                            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                        </div>
                                        <h3>{{ $post->title }}</h3>
                                        <p class="text"><small>
                                            @if ($post->speaker)
                                                By. <a href="/speaker/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                            @else 
                                                By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                            @endif
                                        </small></p>
                                        {{-- <div class="text">
                                            <p>In this, Kidnapping the unlawful taking away or transportation of person against that person's will, usually to hold the person unlawfully will uncover many web sites still sed in their infancy Various versions have evolveed over the yearss, sometimes by accident, sometimes on purpose rationally encounter se consequencess ut that are extremely painful or again is there anyone who loves or seds pursues or desires to  obtain seds pain of itself because it is pain consequence seedpain of it itself then becausee is painfull agin and agin ut consequences seds that are itself ut extremely painful or agains it is there are or anyone wil get good financeenim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni Pursue pleasure rationally encounter.</p>
                                            
                                            <blockquote>Lawyer Justice one of our finaancial advisors receives that we got that  rigorous training in Joe Gentleman’s philosophy, which is based on the finanace providedolore magnam aliquam quaerat voluptatem ut enim ad minima veniam, quis nostrum exercitationem laboriosam.</blockquote>
                                            
                                            <p>Various versions have evolveed over the yearss, sometimes by accident, sometimes on purpose rationally encounter se consequencess ut that are extremely painful or again is there anyone who loves or seds pursues or desires to  obtain seds pain of itself because it is pain consequence seedpain of it itself then becausee is painfull agin and agin ut consequences seds that are itself ut extremely painful or agains it is there are or anyone.</p>
                                        </div> --}}
                                        <div class="text">
                                            {!! $post->body !!}
                                        </div>
                                        {{-- <a href="/download/{{ $post->document }}">
                                            <button class="btn btn-success" type="button">Download file</button>
                                        </a> --}}
                                        <br>

                                        
                                    </div>
                                </div>
                                <div class="post-bottom clearfix">
                                    
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
                            
                        </section>
                    
                    </div><!--End Content Side-->   
                    
                    <!--Sidebar-->      
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <aside class="sidebar">
                            
                            <!-- Popular Categories -->
                            <div class="widget popular-categories sidebar-widget">
                                <div class="styled-heading"><h2>Kategori </h2></div>
                                
                                <ul class="list">
                                    @foreach ($category as $item)
                                        
                                    <li><a class="clearfix" href="/categories/{{ $item->slug }}"><span class="txt pull-left">{{ $item->name }} </span></a></li>
                                    @endforeach
                                </ul>
                                
                            </div>

                            <!--Popular Post-->
                            <div class="widget popular-posts sidebar-widget">
                            {{-- <div class="company-history default-column col-lg-4 col-md-12 col-sm-12"> --}}
                                <div class="inner-box">
                                    <div class="styled-heading">
                                        <h2>Postingan Populer</h2>
                                    </div>
                                    
                                    <div class="row clearfix">
                                        <!--prototype Column-->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <!--Company Timeline-->
                                            <div class="company-timeline">
                                                <div class="text-center">
                                                    <a href="/posts/{{ $popularPosts[0]->slug }}">
                                                        @if ($popularPosts[0]->image)
                                                        <div class="d-flex justify-content-center">
                                                            <img src="{{ asset('storage/post-images/thumbnail/' . $popularPosts[0]->image) }}" width="190" height="150" class="img-fluid" alt="{{ $popularPosts[0]->category->name }}">
                                                        </div>
                                                        @else
                                                        <div class="d-flex justify-content-center">
                                                            <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="190" height="150" class="img-fluid" alt="{{ $popularPosts[0]->category->name }}">
                                                        </div>
                                                        @endif
                                                    </a>
                                                </div>
                                                <article class="">
                                                    <a href="/posts/{{ $popularPosts[0]->slug }}">
                                                        <h4>{{ $popularPosts[0]->title }}</h4>
                                                    </a>
                                                    <a href="/posts/{{ $popularPosts[0]->slug }}">
                                                        <div class="text"><p>{{ Str::limit($popularPosts[0]->excerpt, 70, '...') }}</p></div>
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
                                                    <a href="/posts/{{ $popularPosts[1]->slug }}">
                                                        <div class="year">2<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                                        <h4>{{ $popularPosts[1]->title }}</h4>
                                                        <div class="text"><p>{{ Str::limit($popularPosts[1]->excerpt, 70, '...') }}</p></div>
                                                    </a>
                                                </article>
                                                
                                                <!--Timeline Block-->
                                                <article class="timeline-block">
                                                    <a href="/posts/{{ $popularPosts[2]->slug }}">
                                                        <div class="year">3<div class="curve"><span class="fa fa-caret-down"></span></div></div>
                                                        <h4>{{ $popularPosts[2]->title }}r</h4>
                                                        <div class="text"><p>{{ Str::limit($popularPosts[2]->excerpt, 70, '...') }}</p></div>
                                                    </a>
                                                </article>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!-- Recent Posts -->
                            <div class="widget recent-posts sidebar-widget">
                                <div class="styled-heading"><h2>Postingan Terbaru</h2></div>
                                @foreach ($latesPosts as $item)
                                    
                                <div class="post">
                                    <div class="post-thumb"><a href="/posts/{{ $item->slug }}"><img src="{{ asset('storage/post-images/thumbnail/' . $item->image) }}" alt=""></a></div>
                                    <h4><a href="/posts/{{ $item->slug }}">{{ $item->title }}</a></h4>
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
@extends('dashboardPost/layouts/app') 

@section('container')

                <!--Page Title-->
                <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
                    <div class="auto-container">
                        <h1>Postingan Kategori Kabar</h1>
                    </div>
                </section>

                <!--Page Info-->
                <section class="page-info">
                    <div class="auto-container clearfix">
                        <div class="pull-left"><h2>Kabar</h2></div>
                        <div class="pull-right">
                            <ul class="bread-crumb clearfix">
                                <li><a href="/">Beranda</a></li>
                                <li>Kabar</li>
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

                                    @if ($posts->count())      
                                        <!--News Section-->
                                        <section class="news-section list-view no-padd-top padd-bott-70">
                                            <div class="row"> <!-- Tambahkan wrapper row -->
                                                @foreach($posts as $post)        
                                                    <!--Column-->
                                                    <article class="column featured-news-column col-md-6 col-lg-6 "> <!-- Menambahkan kelas grid untuk dua kolom -->
                                                        <div class="inner-box clearfix">
                                                            <figure class="image-box">
                                                                {{-- pengecekan gambar kosong atau ada --}}
                                                                @if ($post->image)
                                                                    <img src="{{ asset('storage/' . $post->image) }}" width="370" height="100" class="card-img-top" alt="{{ $post->title }}">
                                                                @else
                                                                    <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="327" class="card-img-top" alt="{{ $post->title }}">
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
                                                                    <p class="text" style="font-size: 12px;"><small>
                                                                        @if ($post->speaker)
                                                                            By. <a href="/speaker/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                                                                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                                                        @else 
                                                                            By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                                                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                                                        @endif
                                                                    </small></p>
                                                                    {{-- <div class="text"><p>{{ Str::limit($post->excerpt, 100) }}</p></div> --}}
                                                                    {{-- <a href="/posts/{{ $post->slug }}" class="theme-btn read-more">Read More</a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            </div>
                                            <!-- Styled Pagination -->
                                            {{-- <div class="">
                                                {{ $posts->links() }}
                                            </div> --}}
                                        </section>
                                    @else
                                        <p class="text-center fs-4">No Post Found</p>
                                    @endif
                                
                            </div><!--End Content Side-->   
                        
                            <!--Sidebar-->      
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <aside class="sidebar">
                                    
                                    {{-- <!-- Search Form -->
                                    <div class="widget search-box sidebar-widget">
                                        
                                        <form method="post" action="index.html">
                                            <div class="form-group">
                                                <input type="search" name="search-field" value="" placeholder="Search Keyword">
                                                <button type="submit"><span class="icon fa fa-search"></span></button>
                                            </div>
                                        </form>
                                        
                                    </div> --}}
                                    
                                    <!-- Popular Categories -->
                                    <div class="widget popular-categories sidebar-widget">
                                        <div class="styled-heading"><h2>Kategori Postingan</h2></div>
                                        
                                        <ul class="list">
                                            @foreach ($category as $item)
                                            <li><a class="clearfix" href="/categories/{{ $item->slug }}"><span class="txt pull-left">{{ $item->name }}</span></a></li>
                                            @endforeach
                                        </ul>
                                        
                                    </div>
                                    
                                    <!-- Recent Posts -->
                                    <div class="widget recent-posts sidebar-widget">
                                        <div class="styled-heading"><h2>Latest Posts</h2></div>
                                        
                                        @foreach ($latesPosts as $post)
                                            <div class="post">
                                                <div class="post-thumb"><a href="/posts/{{ $post->slug }}"><img src="{{ asset('storage/' . $post->image) }}" alt=""></a></div>
                                                <h4><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                                <div class="post-info"><span class="icon flaticon-business"></span> {{ $post->created_at->format('d M y') }} </div>
                                            </div>
                                        @endforeach
                                        
                                        {{-- <div class="post">
                                            <div class="post-thumb"><a href="#"><img src="images/resource/thumb-2.jpg" alt=""></a></div>
                                            <h4><a href="#">Very Well performace against consumers problem</a></h4>
                                            <div class="post-info"><span class="icon flaticon-business"></span> 21st Aug 2014 </div>
                                        </div>
                                        
                                        <div class="post">
                                            <div class="post-thumb"><a href="#"><img src="images/resource/thumb-3.jpg" alt=""></a></div>
                                            <h4><a href="#">We have won against rapped criminal case</a></h4>
                                            <div class="post-info"><span class="icon flaticon-business"></span> 21st Aug 2014 </div>
                                        </div> --}}
                                        
                                    </div>
                                    
                                    {{-- <!-- Popular Tags -->
                                    <div class="widget sidebar-widget popular-tags">
                                        <div class="styled-heading"><h2>Popular Tags</h2></div>
                                        
                                        <a href="#">Attorney</a>
                                        <a href="#">Advice</a>
                                        <a href="#">Laws</a>
                                        <a href="#">Crimes</a>
                                        <a href="#">History</a>
                                        <a href="#">Faq</a>
                                        <a href="#">Clients</a>
                                        <a href="#">Need Forms</a>
                                        
                                    </div> --}}
                                    
                                </aside>
                            </div><!--End Sidebar-->      
                            
                        </div>
                    </div>
                </div>

            </div>
            <!--Page Wrapper End-->
        </div>
@endsection

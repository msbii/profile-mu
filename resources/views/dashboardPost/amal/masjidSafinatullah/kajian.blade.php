@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Kajian Masjid Safinatullah</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Kajian Masjid Safinatullah</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Kajian Masjid Safinatullah</li>
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
                            @if ($posts->count())
                                    <div class="row clearfix">                                
                                        @foreach($posts as $post)
                                            <!--Column-->
                                            <article class="column featured-news-column col-md-4 col-sm-6 col-xs-12">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        {{-- pengecekan gambar kosong atau ada --}}
                                                        @if ($post->image)
                                                            <img src="{{ asset('storage/' . $post->image) }}" width="370" height="250" class="card-img-top" alt="{{ $post->title }}">
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
                                                    </div>
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
                        </section>
                    
                    </div>
                    <!--End Content Side--> 
                    
                    <!--Sidebar-->      
 
                    {{-- Include Sidebar Partial --}}
                    @include('dashboardPost/amal/masjidSafinatullah/sidebar')
                    
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
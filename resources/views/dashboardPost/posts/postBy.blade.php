@extends('dashboardPost/layouts/app') 

@section('container')

<!--Page Title-->
<section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
    <div class="auto-container">
        <h1>Kategori-Postingan</h1>
    </div>
</section>

<!--Page Info-->
<section class="page-info">
    <div class="auto-container clearfix">
        <div class="pull-left"><h2>Post</h2></div>
        <div class="pull-right">
            <ul class="bread-crumb clearfix">
                <li><a href="/">Beranda</a></li>
                {{-- <li>Blog Grid Layout</li> --}}
                <li>{{ $title }}</li>
            </ul>
        </div>
    </div>
</section>

<div class="container">

    @if ($posts->count())
        <div class="row clearfix">
            
            @foreach($posts as $post)

                    @if ($post instanceof \App\Models\Post)
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
                    @elseif ($post instanceof \App\Models\Kajian)
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
                            </div>
                        </article>
                    @endif
            @endforeach
               
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>   
    @endif
    {{-- link pagination --}}
    {{-- <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div> --}}
</div>

@endsection
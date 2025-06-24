@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>{{ $judul }} Angkatan Muda</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>{{ $judul }} Angkatan Muda</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>{{ $judul }} Angkatan Muda</li>
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
                                                        <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="370" height="100" class="card-img-top" alt="{{ $post->title }}">
                                                    @endif
                                                    <a href="/baksos/angkatanMuda/{{ $post->slug }}" class="default-overlay-outer">
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
                                                        <h3><a href="/baksos/angkatanMuda/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                                        <div class="text">
                                                            <a href="/baksos/angkatanMuda/{{ $post->slug }}">
                                                                <p>{!! Str::limit($post->body, 10) !!} </p> 
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
                                    {{ $posts->links() }}
                                </div> --}}
                            </section>
                        @else
                            <p class="text-center fs-4">No Post Found</p>
                        @endif
                    
                    </div><!--End Content Side-->  
                    
                    <!--Sidebar-->      
 
                    {{-- Include Sidebar Partial --}}
                    @include('dashboardPost/menu/angkatanMuda/sidebar')
                    
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
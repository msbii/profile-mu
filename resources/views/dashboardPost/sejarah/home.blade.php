@extends('dashboardPost/layouts/app') 

@section('container')

        <!--Page Title-->
        <section class="page-title" style="background-image:url('{{ asset('img/Logo3.jpg') }}');">
            <div class="auto-container">
            	<h1>Sejarah</h1>
            </div>
        </section>
        
        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
            	<div class="pull-left"><h2>Sejarah</h2></div>
                <div class="pull-right">
                	<ul class="bread-crumb clearfix">
                    	<li><a href="/">Beranda</a></li>
                        <li>Sejarah</li>
                    </ul>
                </div>
            </div>
        </section>
        
        
        <!--Gallery Single-->
        <section class="portfolio-details">
        	<div class="auto-container">
            	
                <!--Image Carousel-->
                <div class="image-carousel-outer">
                	<div class="post-option">
                    	<a href="#" class="theme-btn add-fav"><span class="fa fa-heart-o"></span><br>5</a>
                        <a href="#" class="theme-btn share-btn"><span class="fa fa-share-alt"></span><br>Share</a>
                    </div>
                    
                    <!--Image Carousel-->
                    {{-- <ul class="image-carousel single-item-carousel">
                    	<li><a class="lightbox-image" href="images/gallery/image-10.jpg" title="Image Caption Here"><img src="images/gallery/image-10.jpg" alt=""></a></li>
                        <li><a class="lightbox-image" href="images/gallery/image-10.jpg" title="Image Caption Here"><img src="images/gallery/image-10.jpg" alt=""></a></li>
                        <li><a class="lightbox-image" href="images/gallery/image-10.jpg" title="Image Caption Here"><img src="images/gallery/image-10.jpg" alt=""></a></li>
                    </ul> --}}
                    {{-- pengecekan gambar kosong atau ada --}}
                    @if ($post->image)
                    <div style="max-height: 400px; overflow:hidden;">

                        <img src="{{ asset('storage/' . $post->image) }}" width="1170" height="700" class="card-img-top" alt="{{ $post->title }}">
                    </div>
                    @else
                    <img src="https://storage.googleapis.com/a1aa/image/fYtaLxmXcWwZE6OgwpSCiZjC55SLkvIj3QQshe5WZGwAookTA.jpg" width="1170" height="700" class="card-img-top" alt="">
                    {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}"> --}}
                    @endif
                </div>
                
                <div class="post-content">
                	<div class="row clearfix">
                		<!--Text Column-->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        	<div class="styled-heading"><h2>{{ $post->title }}</h2></div>
                        	<div class="text-justify">
                            	{!! $post->body !!}
                            </div>
                            {{-- <a href="/" class"d-block mt-3"> <span class="fa fa-angle-left"></span> &ensp; Kembali ke Postingan</a> --}}
                        </div>

                    </div>
                </div>
        
                <!--Post Controls-->
                <nav class="post-controls">
                    <ul>
                        <li class="prev"><a href="/"><span class="fa fa-angle-left"></span> &ensp; Kembali ke Postingan</a></li>
                        {{-- <li><a href="#"><span class="icon fa fa-th"></span></a></li>
                        <li class="next"><a href="#">Next One &ensp; <span class="fa fa-angle-right"></span></a></li> --}}
                    </ul>
                </nav>
                
            </div>
        </section>
        
@endsection
@extends('dashboard.layouts.app')

@section('container')

        <div class="col-md-6 justify-content-center mb-5">

                    <h2>{{ $post->title }}</h2>
                    {{-- <h5>{{ $post->author->name }}</h5> --}}
                    
                    <a href="/dashboard/kajian" class="btn btn-success"><i class="bi bi-arrow-left"></i>Kembali ke Semua Kajian Saya</a>
                    <a href="/download/{{ $post->document }}">
                        <button class="btn btn-success" type="button">Unduh File</button>
                    </a>
                    <a href="/dashboard/kajian/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah</a>

                    {{-- Mengaktifkan fitur delete --}}
                    <form action="/dashboard/kajian/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-file-x bg-danger"></i>Hapus</button>
                    </form>

                    <div class="d-flex justify-content-center align-items-center">
                        <p>
                            {{-- By. <a href="/authors/kajian/{{ $post->speaker ?? $post->author->username }}" class="text-decoration-none">{{ $post->speaker ?? $post->author->username }}</a>  --}}
                            @if ($post->speaker)
                                Pembicara <a href="/speaker/kajian/{{ $post->speaker}}" class="text-decoration-none">{{ $post->speaker}}</a> 
                            @else
                                By. <a href="/authors/kajian/{{$post->author->username }}" class="text-decoration-none">{{$post->author->username }}</a> 
                            @endif
                            di <a href="/kategori/{{ $post->kategoriKajian->slug }}" class="text-decoration-none">{{ $post->kategoriKajian->name }}</a>
                        </p>
                            <small class="text-muted">{{ $post->created_at->format('d M Y') }}</small>   
                    </div>

                    {{-- pengecekan gambar kosong atau ada --}}
                    @if ($post->image)
                    <div style="max-height: 400px; overflow:hidden;">

                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="{{ $post->kategoriKajian->name }}">
                    </div>
                    @else

                    <img src="https://source.unsplash.com/1200x400?{{ $post->kategoriKajian->name }}" class="card-img-top mt-3" alt="{{ $post->kategoriKajian->name }}">
                    @endif
                    
                    <article class="my-3">
                        {!! $post->body !!}
                    </article>

                    @if ($post->document)
                        <iframe 
                            src="{{ asset('storage/post-document/' . $post->document) }}" 
                            width="100%" 
                            height="600px" 
                            style="border: none;">
                        </iframe>
                    @else
                        <div class="text-center text-gray-500 italic mt-4">
                            Tidak ada dokumen yang tersedia.
                        </div>
                    @endif
        

        </div>
    {{-- <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                    <h2>{{ $post->title }}</h2>
                    <h5>{{ $post->author }}</h5>
                    
                    <a href="/dashboard/kajian" class="btn btn-success"><i class="bi bi-arrow-left"></i>Back to all My kajian</a>
                    <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Edit</a>
                    <a href="" class="btn btn-danger"><i class="bi bi-file-x bg-danger"></i>Delete</a>
    
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
                    
                    <article class="my-3">
                        {!! $post->body !!}
                    </article>
                    
                    <a href="/blog" class"d-block mt-3">Back to kajian</a>
    
            </div>
        </div>
    </div> --}}
    
@endsection
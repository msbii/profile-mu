@extends('dashboard.layouts.app')

@section('container')

        <div class="col-md-6 justify-content-center mb-5">

                    <h2>Nama Barang : {{ $post->title }}</h2>
                    <h5>Jumlah Barang: {{ $post->quantity }}</h5>
                    <h5>Lokasi Barang :{{ $post->location }}</h5>
                    <h5>Lingkup :{{ $post->Location->name }}</h5>
                    
                    <a href="/dashboard/inventaris" class="btn btn-success"><i class="bi bi-arrow-left"></i>Kembali ke semua Postingan Saya</a>
                    <a href="/dashboard/inventaris/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah</a>

                    {{-- Mengaktifkan fitur delete --}}
                    <form action="/dashboard/inventaris/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-file-x bg-danger"></i>Hapus</button>
                    </form>

                    {{-- pengecekan gambar kosong atau ada --}}
                    @if ($post->image)
                    <div style="max-height: 400px; overflow:hidden;">

                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="{{ $post->title }}">
                    </div>
                    @else

                    <img src="https://source.unsplash.com/1200x400?{{ $post->title }}" class="card-img-top mt-3" alt="{{ $post->title }}">
                    @endif
                    
                    <article class="my-3">
                        {!! $post->description !!}
                    </article>
        

        </div>
    {{-- <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                    <h2>{{ $post->title }}</h2>
                    <h5>{{ $post->author }}</h5>
                    
                    <a href="/dashboard/inventaris" class="btn btn-success"><i class="bi bi-arrow-left"></i>Back to all My Posts</a>
                    <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Edit</a>
                    <a href="" class="btn btn-danger"><i class="bi bi-file-x bg-danger"></i>Delete</a>
    
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
                    
                    <article class="my-3">
                        {!! $post->body !!}
                    </article>
                    
                    <a href="/blog" class"d-block mt-3">Back to Posts</a>
    
            </div>
        </div>
    </div> --}}
    
@endsection
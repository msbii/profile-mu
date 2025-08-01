@extends('dashboard.layouts.app')

@section('container')

        <div class="col-md-12 justify-content-center mb-5">

                    <h2>{{ $post->title }}</h2>
                    {{-- <h5>{{ $post->author->name }}</h5> --}}
                    
                    <a href="/dashboard/struktur" class="btn btn-success"><i class="bi bi-arrow-left"></i>Kembali ke Semua SK Saya</a>
                    <a href="/download-image/{{ $post->image }}">
                        <button class="btn btn-success" type="button">Unduh Gambar</button>
                    </a>
                    <a href="/dashboard/struktur/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah</a>

                    {{-- Mengaktifkan fitur delete --}}
                    <form action="/dashboard/struktur/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-file-x bg-danger"></i>Hapus</button>
                    </form>

                    <div class="d-flex justify-content-center align-items-center">
                        <p>
                            di <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->name }}</a>
                        </p>
                            <small class="text-muted">{{ $post->created_at->format('d M Y') }}</small>   
                    </div>
                    {{-- pengecekan gambar kosong atau ada --}}
                    @if ($post->image)
                    <div style="max-height: 400px; overflow:hidden;">

                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="{{ $post->title }}">
                    </div>
                    @else

                    {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->title }}"> --}}
                    @endif
        </div>
    
@endsection
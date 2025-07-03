@extends('dashboard.layouts.app')

@section('container')

        <div class="col-md-12 justify-content-center mb-5">

                    <h2>{{ $post->title }}</h2>
                    {{-- <h5>{{ $post->author->name }}</h5> --}}
                    
                    <a href="/dashboard/sk" class="btn btn-success"><i class="bi bi-arrow-left"></i>Kembali ke Semua SK Saya</a>
                    <a href="/download/{{ $post->document }}">
                        <button class="btn btn-success" type="button">Unduh File</button>
                    </a>
                    <a href="/dashboard/sk/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Ubah</a>

                    {{-- Mengaktifkan fitur delete --}}
                    <form action="/dashboard/sk/{{ $post->slug }}" method="post" class="d-inline">
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
    
@endsection
@extends('dashboard.layouts.app')

@section('container')
<div class="col-lg-8">

    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Sejarah</h1>
    </div>
    {{-- method mempengaruhi route post akan mengarah ke store --}}
      <form method="POST" action="/dashboard/sejarah/{{ $post->slug }}" class="mb-5"
        enctype="multipart/form-data">
        @method('put')
        @csrf

        <div>
          <h3>{{ $post->title }}</h3>
        </div>

        {{-- foto --}}
        <div class="mb-3">
          <label for="image" class="form-label">Gambar</label>
          {{-- menangani penumpungan data foto lama--}}
          <input type="hidden" name="oldImage" value="{{ $post->image }}">

          {{-- tampilan old data foto --}}
          @if ($post->image)
              
          <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-2 d-block">
          @else
          <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-2">
          @endif
          {{-- Membuat preview foto --}}
          {{-- <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-2"> --}}
          <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- Editor body menggunakan trix --}}
        <div class="mb-3">
          <label for="body" class="form-label">Isi Sejarah</label>

          @error('body')
              <p class="text-danger">{{ $message }}</p>
          @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>

        </div>

        <button type="submit" class="btn btn-primary">Perbarui Sejarah</button>
      </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value) //kirim data
        .then(response => response.json())
        .then(data => slug.value = data.slug) 
    });

    // Script preview Image
    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
    </script>

@endsection
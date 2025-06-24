@extends('dashboard.layouts.app')

@section('container')
<div class="col-lg-8">

    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data</h1>
    </div>
    {{-- method mempengaruhi route post akan mengarah ke store --}}
      <form method="POST" action="/dashboard/pelaksanaanProgram/{{ $post->slug }}" class="mb-5"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Nama</label>
          <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
          @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
        </div>
        <div class="mb-3">
          {{-- <label for="slug" class="form-label">Slug</label> --}}
          <input type="hidden" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
          @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
        </div>
        {{-- select box category --}}
        <div class="mb-3">
          <label for="category" class="form-label">Lingkup</label>
          <select class="form-select" name="lingkup_id">
            @foreach ($categories as $category)
            {{-- Menampilkan inputan lama --}}
            @if (old('lingkup_id',$post->lingkup_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach

          </select>
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

        <div class="mb-3">
          <label for="name" class="form-label">Nama Pelaksana</label>
          <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $post->name) }}">
          @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
        </div>

        {{-- Editor body menggunakan trix --}}
        <div class="mb-3">
          <label for="body" class="form-label">Deskripsi pelaksanaan Program</label>

          @error('description')
              <p class="text-danger">{{ $message }}</p>
          @enderror
            <input id="description" type="hidden" name="description" value="{{ old('description', $post->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui data</button>
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
@extends('dashboard.layouts.app')

@section('container')
<div class="col-lg-8">

    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Kajian Baru</h1>
    </div>
    {{-- method mempengaruhi route post akan mengarah ke store --}}
    {{-- Untuk dapat menangani file harus ditambah enctype --}}
      <form method="POST" action="/dashboard/kajian" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
          @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
        </div>
        <div class="mb-3">
          {{-- <label for="slug" class="form-label">Slug</label> --}}
          <input type="hidden" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
          @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
        </div>
        <div class="mb-3">
          <label for="speaker" class="form-label">Pembicara</label>
          <input type="text" class="form-control @error('speaker')is-invalid @enderror" id="speaker" name="speaker" required autofocus value="{{ old('speaker') }}">
          @error('speaker')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
        </div>
        {{-- select box category --}}
        <div class="mb-3">
          <label for="category" class="form-label">Kategori</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
            {{-- Menampilkan inputan lama --}}
            @if (old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach

          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Gambar</label>

          {{-- Membuat preview foto --}}
          <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-2">
          <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- Editor body menggunakan trix editor--}}
        <div class="mb-3">
          <label for="body" class="form-label">Isi Kajian</label>

          @error('body')
              <p class="text-danger">{{ $message }}</p>
          @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="mb-3">
          <label for="document" class="form-label">Dokumen Kajian</label>

          <input class="form-control @error('document')is-invalid @enderror" type="file" id="document" name="document">
          @error('document')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Buat Kajian</button>
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

    //mematikan fitur upload file
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    });

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
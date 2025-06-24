@extends('dashboard.layouts.app')

@section('container')
<div class="col-lg-8">

    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Biodata Pimpinan Baru</h1>
    </div>
    {{-- method mempengaruhi route post akan mengarah ke store --}}
    {{-- Untuk dapat menangani file harus ditambah enctype --}}
      <form method="POST" action="/dashboard/biodataPimpinan" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Nama</label>
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
        {{-- select box category --}}
        <div class="mb-3">
          <label for="category" class="form-label">Lokasi Jabatan</label>
          <select class="form-select" name="position">
            @foreach ($categories as $category)
            {{-- Menampilkan inputan lama --}}
            @if (old('position') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach

          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>

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
          <label for="body" class="form-label">Biografi</label>

          @error('biography')
              <p class="text-danger">{{ $message }}</p>
          @enderror
            <input id="biography" type="hidden" name="biography" value="{{ old('biography') }}">
            <trix-editor input="biography"></trix-editor>

        </div>

        <button type="submit" class="btn btn-primary">Buat Biodata</button>
      </form>
</div>

<script>
    const title = document.querySelector('#title'); // Mengambil elemen input dengan id "title"
    const slug = document.querySelector('#slug'); // Mengambil elemen input dengan id "slug"

    title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value) // Mengirim permintaan ke URL dengan query parameter 'title'
        .then(response => response.json()) // Mengonversi respons ke format JSON
        .then(data => slug.value = data.slug); // Menetapkan nilai slug yang diterima ke input dengan id "slug"
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
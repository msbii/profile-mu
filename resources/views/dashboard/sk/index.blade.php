@extends('dashboard.layouts.app')

@section('content')
    <div class="container">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Halaman sk</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <a href="/dashboard/categories/create">
                                    
                                </a> --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif     
                                <a href="/dashboard/sk/create">
                                    <button type="button" class="btn btn-success my-2">
                                        <i class="fas fa-plus"></i> Buat Data sk Baru
                                    </button>
                                </a>
                                
                                <div class="row g-3 mb-3">
                                    <!-- SEARCH FORM -->
                                    <form class="col-auto" action="/sk/search" method="GET">
                                        {{-- query filter --}}
                                        @if (request('kategoriKajian'))
                                            <input type="hidden" name="kategoriKajian" value="{{ request('kategoriKajian') }}">
                                        @endif

                                        @if (request('author'))
                                            <input type="hidden" name="author" value="{{ request('author') }}">
                                        @endif
                                        <div class="input-group col-sm">
                                            <input type="search" class="form-control form-control-navbar" placeholder="Search..." name="search" value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Tahun</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                    {{-- @if (Auth::check())
                                        @if (isset($pp)) --}}
                                        
                                        @foreach ($posts as $post)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items" id="counter">{{ $loop->iteration }}</td>
                                            <td class="account__table--body__child--items">{{ Str::limit($post->title, 50) }}</td>
                                            <td class="account__table--body__child--items">{{ $post->kategori->name }}</td>
                                            <td class="account__table--body__child--items">{{ $post->tahun }}</td>
                                            <td class="account__table--body__child--items">
                                                {{-- <button class="btn btn-warning btn-edit mx-1" data-id="{{ $item->id }}" data-toggle="modal" data-target="#editProductModal"> <i class="fas fa-edit"></i> Edit</button> --}}

                                                <a href="/dashboard/sk/{{ $post->slug }}">
                                                {{-- <a href="{{ route('sk.show', ['slug' => $post->slug]) }}"> --}}
                                                    <button class="btn btn-success mx-1 btn-view ">
                                                        <i class="bi bi-file-earmark-text bg-info"></i> Lihat
                                                    </button>
                                                </a>
                                                <a href="/dashboard/sk/{{ $post->slug }}/edit">
                                                    <button class="btn btn-warning mx-1 btn-edit">
                                                        <i class="fas fa-edit"></i> Ubah
                                                    </button>
                                                </a>
                                                {{-- Mengaktifkan fitur delete --}}
                                                <form action="/dashboard/sk/{{ $post->slug }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger mx-1"  onclick="return confirm('Apakah Kamu Yakin?')">
                                                        <i class="fas fa-trash bg-danger"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>

                                        @endforeach
                                        {{-- @else
                                        <tr class="account__table--body__child">
                                            <p>No data available in table</p>
                                        </tr>
                                        @endif
                                        
                                    @endif             --}}
                                    </tbody>

                                    <tfoot>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    </div>

    </div>
    {{-- @dd($item); --}}

    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Kajian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambahkan produk -->
                    <form action="/dashboard/categories/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Kategori</label>
                            <input type="text" class="form-control" name="name" id="name" autofocus>
                        </div>
                        <!-- Input untuk upload gambar -->
                        <div class="form-group">
                            <label for="productImage">Gambar</label>
                            {{-- <input type="file" class="form-control-file" id="productImage" name="image"> --}}

                            {{-- Membuat preview foto --}}
                            <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-2">
                            <input class="form-control @error('image')is-invalid @enderror" type="file" id="productImage" name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->

    <!-- modal hapus -->
    <!-- Modal Konfirmasi Hapus -->


    <script>

        //preview image
        function previewImage(){
            const image = document.querySelector('#productImage');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        function previewImageUpdate(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview-update');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    

@endsection


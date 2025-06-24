@extends('dashboard.layouts.app')

@section('content')
    <div class="container">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kategori</h3>
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
                                <button type="button" class="btn btn-success my-2" data-toggle="modal"
                                    data-target="#addProductModal"><i class="fas fa-plus"></i> Tambah Kategori
                                </button>
                                
                                <div class="row g-3 mb-3">
                                    <!-- SEARCH FORM -->
                                    <form class="col-auto" action="/category/search" method="GET">
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
                                            <th>Kategori</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        
                                        
                                        @foreach ($categories as $item)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items" id="counter">{{ $loop->iteration }}</td>
                                            <td class="account__table--body__child--items">{{ $item->name }} </td>
                                            <td class="account__table--body__child--items">
                                                {{-- <button class="btn btn-warning btn-edit mx-1" data-id="{{ $item->id }}" data-toggle="modal" data-target="#editProductModal"> <i class="fas fa-edit"></i> Edit</button> --}}
                                                <button class="btn btn-warning mx-1 btn-edit" data-toggle="modal" data-target="#editProductModal{{ $item->id }}"> <i class="fas fa-edit"></i> Ubah</button>
                                                {{-- <button class="btn btn-danger mx-1" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"> <i class="fas fa-trash"></i> Delete</button>  --}}
                                                {{-- Mengaktifkan fitur delete --}}
                                                
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
                                        <th>Kategori</th>
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
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambahkan produk -->
                    <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Kategori</label>
                            <input type="text" class="form-control" name="name" id="name" autofocus>
                            <input type="hidden" class="form-control" name="slug" id="slug">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    @foreach ($categories as $item)
    <div class="modal fade" id="editProductModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-modal-body">
                    <!-- Form for editing the product -->
                    <form action="{{ route('items.update', $item->id) }}" method="POST" id="editProductForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Include input fields for editing product details -->
                        <input type="hidden" id="editProductId" name="id">

                        <div class="form-group">
                            <label for="nama">Kategori</label>
                            <input type="text" class="form-control" name="name" id="editname" autofocus value="{{ $item->name }}">
                            {{-- <input type="hidden" class="form-control" name="slug" id="editslug"> --}}
                        </div>

                        <!-- Add more input fields for other product details -->

                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- modal hapus -->
    <!-- Modal Konfirmasi Hapus -->
    @foreach ($categories as $item)
    <div class="modal" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus kategori ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    
                    {{-- Mengaktifkan fitur delete --}}
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>

        const title = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/dashboard/categories/checkSlug?title=' + title.value) //kirim data
            .then(response => response.json())
            .then(data => slug.value = data.slug) 
        });

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


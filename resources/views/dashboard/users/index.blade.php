@extends('dashboard.layouts.app')

@section('content')
    <div class="container">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pengguna</h3>
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
                                {{-- <button type="button" class="btn btn-success my-2" data-toggle="modal"
                                    data-target="#addProductModal"><i class="fas fa-plus"></i> Add User
                                </button> --}}
                                <div class="row g-3 mb-3">
                                    <!-- SEARCH FORM -->
                                    <form class="col-auto" action="/user/search" method="GET">
                                        <div class="input-group col-sm">
                                            <input type="search" class="form-control form-control-navbar" placeholder="Search..." name="search" value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col d-md-flex justify-content-md-end">
                                        {{-- <a class="btn btn-success " href="{{ route('export_user') }}"> --}}
                                        <a class="btn btn-success " href="/dashboard/exportUsers">
                                            Export Data
                                        </a>
                                    </div>
                                </div>
                                

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>Role</th>
                                            <th>IsAdmin</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                    {{-- @if (Auth::check())
                                        @if (isset($pp)) --}}
                                       
                                        @foreach ($user as $item)
                                        <tr class="account__table--body__child">
                                            <td class="account__table--body__child--items" id="counter">{{ $loop->iteration }}</td>
                                            {{-- <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html">
                                                            <img class="border-radius-5" src="{{ asset('storage/public/images/' . $item->image) }}" alt="cart-product" style="max-width: 70px; max-height: 60px;">
                                                        </a>
                                                    </div>
                                                </div>
                                            </td> --}}
                                            <td class="account__table--body__child--items">{{ $item->name }} </td>
                                            <td class="account__table--body__child--items">{{ $item->username }} </td>
                                            <td class="account__table--body__child--items">{{ $item->email }} </td>
                                            <td class="account__table--body__child--items">{{ $item->role }} </td>
                                            @if ( $item->is_admin == 0)
                                                <td class="account__table--body__child--items">-</td>
                                            @else
                                                <td class="account__table--body__child--items">Admin</td>
                                            @endif
                                            {{-- <td class="account__table--body__child--items">{{ $item->is_admin }} </td> --}}
                                            <td class="account__table--body__child--items">
                                                <button class="btn btn-warning btn-edit mx-1" data-toggle="modal" data-target="#editProductModal{{ $item->id }}"> <i class="fas fa-edit"></i>Ubah</button>
                                                <button class="btn btn-danger mx-1" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"> <i class="fas fa-trash"></i>Hapus</button> 
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
                                            {{-- <th>Image</th> --}}
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>Role</th>
                                            <th>IsAdmin</th>
                                            <th>Aksi</th>

                                    </tfoot>
                                </table>
                                {{-- link pagination --}}
                                <div class="d-flex justify-content-end">
                                    {{ $user->links('pagination::bootstrap-5') }}
                                </div>
                                {{-- <div>
                                    Showing
                                    {{ $item->firstItem() }}
                                    to
                                    {{ $item->lastItem() }}
                                    of
                                    {{ $item->total() }}
                                    entries
                                </div>
                                <div class="pagination justify-content-end">
                                    {{ $item->links() }}
                                </div> --}}
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

    <!-- Edit Product Modal -->
    @foreach ($user as $item)
    <div class="modal fade" id="editProductModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Ubah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing the product -->
                    <form action="{{ route('users.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Include input fields for editing product details -->
                        <input type="hidden" id="editProductId" name="id">

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" autofocus value="{{ old('name', $item->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('name', $item->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            {{-- <input type="text" class="form-control" name="role" id="role" autofocus value="{{ old('name', $item->role) }}"> --}}
                            <select class="form-select" name="role">
                                <option value="Pengunjung" {{ old('role', $item->role) == 'Pengunjung' ? 'selected' : '' }}>Pengunjung</option>
                                <option value="Author" {{ old('role', $item->role) == 'Author' ? 'selected' : '' }}>Author</option>
                                <option value="Admin" {{ old('role', $item->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_admin">Is Admin</label>
                            {{-- <input type="text" class="form-control" name="is_admin" id="is_admin" value="{{ old('name', $item->is_admin) }}"> --}}
                            <select class="form-select" name="is_admin">
                                <option value="0" {{ old('is_admin', $item->is_admin) == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ old('is_admin', $item->is_admin) == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
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
    @foreach ($user as $item)
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
                    <p>Anda yakin ingin menghapus produk ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    
                    {{-- Mengaktifkan fitur delete --}}
                    <form action="{{ route('users.destroy', $item->id) }}" method="POST">
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


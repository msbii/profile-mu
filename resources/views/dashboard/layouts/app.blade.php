<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Muhammadiyah') }}</title> --}}
    <title>Muhammadiyah Panggungharjo</title>
    {{-- My style --}}
    <!-- <link rel="stylesheet" href="/css/style.css"> -->
    <!-- Latest compiled and minified CSS -->

    <link rel="icon" type="image/x-icon" href="{{ asset('img') }}/Logo.png">
    {{-- <link rel="icon" type="image/x-icon" href="img/Logo.png"> --}}
    {{-- Bootstrap & Icon  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <!-- Latest compiled JavaScript -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('tema/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('tema/dist/css/adminlte.min.css?v=3.2.0') }}">
    <!-- DataTables -->
    <link href="{{ asset('tema/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('tema/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('tema/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/plugins/datepicker/bootstrap-datepicker.min.css') }}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('tema/plugins/daterangepicker/daterangepicker.css') }}">
    {{-- SWAL --}}
    <link href="{{ asset('tema/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" type="text/css" href="{{ asset('tema/plugins/toastr/toastr.min.css') }}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('tema/css/style.css') }}">


    <!-- include summernote css/js -->
    <link href="{{ asset('tema/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
    {{-- Material Datetimepicker --}}
    <!-- <link rel="stylesheet"
        href="{{ asset('vendor/material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"> -->
    <script src="{{ asset('tema/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Kemudian DataTables -->
    <script src="{{ asset('tema/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <!-- Lalu plugin Button untuk DataTables -->
    <script src="{{ asset('tema/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    {{-- Trix editor  --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    {{-- menghilangkan file upload --}}
    <style>
        trix-toolbar-1 [data-trix-button-group="file-tools"]{
          display: none;
        }
    </style>

    <style type="text/css">
        @font-face {
            font-family: Cerebri Sans;
            font-style: normal;
            font-weight: 400;
            src: url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Regular.eot') }}");
            src: url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Regular.eot?#iefix') }}") format("embedded-opentype"),
                url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Regular.woff') }}") format("woff"),
                url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Regular.ttf') }}") format("truetype")
        }

        @font-face {
            font-family: Cerebri Sans;
            font-style: normal;
            font-weight: 500;
            src: url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Medium.eot') }}");
            src: url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Medium.eot?#iefix') }}") format("embedded-opentype"),
                url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Medium.woff') }}") format("woff"),
                url("{{ asset('tema//fonts/cerebrisans/CerebriSans-Medium.ttf') }}") format("truetype")
        }

        @font-face {
            font-family: Cerebri Sans;
            font-style: normal;
            font-weight: 600;
            src: url("{{ asset('tema//fonts/cerebrisans/CerebriSans-SemiBold.eot') }}");
            src: url("{{ asset('tema//fonts/cerebrisans/CerebriSans-SemiBold.eot?#iefix') }}") format("embedded-opentype"),
                url("{{ asset('tema//fonts/cerebrisans/CerebriSans-SemiBold.woff') }}") format("woff"),
                url("{{ asset('tema//fonts/cerebrisans/CerebriSans-SemiBold.ttf') }}") format("truetype")
        }

        body {
            /*font-family: Roboto, sans-serif;*/
            font-family: "Cerebri Sans", sans-serif;
        }

        .cart__thumbnail {
            max-width: 10rem;
            line-height: 1;
        }


        /* Ubah warna background dan teks dropdown */
        .dropdown-menu {
            background-color: #48494b; /* Abu-abu */
        }

        .dropdown-menu .dropdown-item {
            color: #ffffff; /* Putih */
        }

        /* Ubah warna saat item dropdown di-hover */
        .dropdown-menu .dropdown-item:hover {
            background-color: #5a6268; /* Abu-abu gelap */
            color: #ffffff; /* Tetap putih */
        }

        /* Ubah warna untuk item aktif */
        .dropdown-menu .dropdown-item.active {
            background-color: #495057; /* Abu-abu lebih gelap */
            color: #ffffff; /* Tetap putih */
        }


    </style>
    <!-- ======= All CSS Plugins here ======== -->
    {{-- <link rel="stylesheet" href="{{ asset('Afurea') }}/assets/css/plugins/swiper-bundle.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('Afurea') }}/assets/css/plugins/glightbox.min.css"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet"> --}}

    <!-- Plugin css -->
    {{-- <link rel="stylesheet" href="{{ asset('Afurea') }}/assets/css/vendor/bootstrap.min.css"> --}}

    <!-- Custom Style CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('Afurea') }}/assets/css/style.css"> --}}
</head>
@if (!Auth::check())
    <script>
        window.location.href = '/';
    </script>
@endif

<body class="hold-transition sidebar-mini layout-fixed">

    <body class="hold-transition layout-top-nav  @if (session()->has('darkmode')) dark-mode @endif">

        <script>
            @if (Session::has('message'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('message') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.warning("{{ session('warning') }}");
            @endif
        </script>
        <div class="wrapper">


            @include('dashboard.layouts.navbar')


            @include('dashboard.layouts.sidebar')


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <br>
                <section class="content">
                    <div class="container-fluid">
                        {{-- @include('sweetalert::alert') --}}
                        @yield('content')
                        @yield('container')
                    </div>
                    <!--/. container-fluid -->
                </section>
                <!-- /.content-wrapper -->
            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; 2023 <a href="">Muhammadiyah Panggungharjo</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    <b>AppVersion</b>
                    1.0
                </div>
            </footer>
        </div>

        <!-- REQUIRED SCRIPTS -->
        <script src="{{ asset('tema/plugins/jquery/axios.min.js') }}"></script>
        <script src="{{ asset('tema/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('tema/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('tema/plugins/jquery-validation/additional-methods.min.js') }}"></script>
        <script src="{{ asset('js/super.js') }}"></script>
        <script src="{{ asset('js/alacarte.js') }}"></script>
        <script src="{{ asset('js/simple.money.format.js') }}"></script>

        <script src="{{ asset('tema/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('tema/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('tema/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('tema/plugins/summernote/summernote.min.js') }}"></script>
        {{-- select2 --}}
        <script src="{{ asset('tema/plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- datatable Responsive examples -->
        <script src="{{ asset('tema/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('tema/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('tema/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('tema/dist/js/adminlte.js?v=3.2.0') }}"></script>
        <!-- FILE INPUT -->
        <script src="{{ asset('tema/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('tema/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('tema/plugins/raphael/raphael.min.js ') }}"></script>
        <script src="{{ asset('tema/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('tema/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('tema/plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('tema/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
        <!-- Bootstrap Switch -->
        <script src="{{ asset('tema/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
        <!-- Moment.js -->
        <script src="{{ asset('tema/plugins/moment/moment-with-locales.min.js') }}"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('tema/plugins/daterangepicker/daterangepicker.js') }}"></script>

        {{-- Material Datetimepicker --}}
        <!-- <script src="{{ asset('vendor/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script> -->

        {{-- SWAL --}}
        <script src="{{ asset('tema/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Jquery Number -->

        <script src="{{ asset('js/jquery.number.js') }}"></script>
        <script src="{{ asset('tema/plugins/toastr/toastr.min.js') }}"></script>
        <!-- jQuery library -->

        {{-- Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


        {{-- <script src="{{ asset('tema/dist/js/pages/dashboard2.js') }}"></script> --}}
        <script>
            // var site_url = '<?= url('
            // ') ?>';
            $(document).ready(function() {
                $('.select2').select2({

                });
                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

                /* FUNGSI TOMBOL DELETE DATA */
                $('#modal-delete-data').on('show.bs.modal', function(e) {
                    var this_elem = $(this);
                    var relTarget = $(e.relatedTarget);
                    this_elem.find("form").attr('action', relTarget.attr('href'));
                    this_elem.find(".modal-body").html(
                        '<center><p>Yakin akan menghapus data ?</p></center>');
                }); /*Konfirmasi Delete*/
            });
        </script>
        <script>
            $(document).ready(function() {
                $("#logout").on('click', function(e) {
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah anda yakin keluar dari aplikasi?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Logout!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            form.submit();
                        }
                    })
                });
            });
        </script>

        <!-- <script>
            $(document).ready(function() {
                $(function() {
                    // $("#example1").DataTable({
                    //   "responsive": true, "lengthChange": false, "autoWidth": false,
                    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    var dataTable = $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                });

            });
        </script> -->
        <script>
            $(function() {

                $(".datepicker").datepicker({
                    autoclose: true,
                    todayHighlight: true
                });

                $(".datepicker_month").datepicker({
                    format: "mm-yyyy",
                    viewMode: "months",
                    minViewMode: "months"
                });

                $(".datepicker_year").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });


            });
            $(function() {
                $('.daterange').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });
            });
            // $('.delete-confirm').on('click', function(event) {
            //     event.preventDefault();
            //     const url = $(this).attr('href');
            //     swal({
            //         title: 'Are you sure?',
            //         text: 'This record and it`s details will be permanantly deleted!',
            //         icon: 'warning',
            //         buttons: ["Cancel", "Yes!"],
            //     }).then(function(value) {
            //         if (value) {
            //             window.location.href = url;
            //         }
            //     });
            // });
        </script>

        <!-- <script></script> -->

        {{-- @include('layouts.navbar')

<div class="container mt-4">
  @yield('container')
</div> --}}

        @yield('javascripts')



    </body>

</html>

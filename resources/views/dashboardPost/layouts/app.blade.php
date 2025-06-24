<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<title>Muhammadiyah | {{ $title ? $title : 'a' }} </title>
<!-- Stylesheets -->
<link href="{{ asset('lawyerPack') }}/css/bootstrap.css" rel="stylesheet">
<link href="{{ asset('lawyerPack') }}/css/revolution-slider.css" rel="stylesheet">
<link href="{{ asset('lawyerPack') }}/css/style.css" rel="stylesheet">
<!-- Link CDN Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
{{-- Bootstrap & Icon  --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<!-- Responsive -->
<link rel="shortcut icon" href="{{ asset('img') }}/Logo.png" type="image/x-icon">
<link rel="icon" href="{{ asset('img') }}/Logo.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{{ asset('lawyerPack') }}/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</head>

<body>
<div class="page-outer-container">
	<div class="page-wrapper">
 	
        <!-- Preloader -->
        <div class="preloader"></div>
        
        <!-- Main Header -->
        @include('dashboardPost.layouts.header')
    
    
        @yield('container')
        

        <!-- START FOOTER -->
		@include('dashboardPost.layouts.footer')
    
	</div><!--Page Wrapper End-->
</div>
<!--page-outer-container-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>

<script src="{{ asset('lawyerPack') }}/js/jquery.js"></script> 
<script src="{{ asset('lawyerPack') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('lawyerPack') }}/js/revolution.min.js"></script>
<script src="{{ asset('lawyerPack') }}/js/jquery.fancybox.pack.js"></script>
<script src="{{ asset('lawyerPack') }}/js/jquery.fancybox-media.js"></script>
<script src="{{ asset('lawyerPack') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('lawyerPack') }}/js/owl.js"></script>
<!--Google Map--><script src="{{ asset('lawyerPack') }}/js/map-script.js"></script><!--Google Map-->
<script src="{{ asset('lawyerPack') }}/js/wow.js"></script>
<script src="{{ asset('lawyerPack') }}/js/script.js"></script>

</body>
</html>

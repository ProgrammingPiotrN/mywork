<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('styles_frontend/assets/css/font-awesome.css') }}">

<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">   
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
@include('frontend.body.header')
@yield('content')

@include('frontend.body.footer')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('styles_frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('styles_frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('styles_frontend/assets/js/scripts.js') }}"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

@include('frontend.product_model.product_model')

</body>
</html>
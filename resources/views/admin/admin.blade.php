<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".{{ asset('styles_backend/images/favicon.ico') }}">

    <title>Sweet dream</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('styles_backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('styles_backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('styles_backend/css/skin_color.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">   

  <script type="text/javascript" src="/js/app.js"></script>

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

@include('admin.body.header') 
  
  <!-- Left side column. contains the logo and sidebar -->
@include('admin.body.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	 @yield('admin')
  </div>
  <!-- /.content-wrapper -->
 
@include('admin.body.footer')
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('styles_backend/js/vendors.min.js') }}"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	
	<!-- App -->
	<script src="{{ asset('styles_backend/js/template.js') }}"></script>
	<script src="{{ asset('styles_backend/js/pages/dashboard.js') }}"></script>
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
	<script src="{{ asset('styles_backend/js/pages/data-table.js') }}"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
  $(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      var id = $(this).data("id");


      Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {

      window.axios.post($(this).attr("href"))
      .then(function (response) {

        $($("#brand-"+id)[0]).remove();
          Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function () {
        // always executed
      });
    }
  })
    });
  });

  </script>


</body>
</html>

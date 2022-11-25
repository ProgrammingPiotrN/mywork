@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Products</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Product Image</th>
              <th>Name product</th>
              <th>Product selling price</th>
              <th>Product quantity</th>
              <th>Product discount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $item)
            <tr>
                <td><img src="{{ asset($item->thambnail_product) }}" style="width: 80px; height: 70px"></td>
                <td>{{ $item->name_product }}</td>
                <td>{{ $item->price_selling }}</td>
                <td>{{ $item->quantity_product }}</td>
                <td>{{ $item->price_discount }}</td>
                <th>

                  @if($item->status == 1)
                    <span class="badge badge-pill badge-success">Active</span>
                  @else
                    <span class="badge badge-pill badge-success">InActive</span>
                  @endif
  
                </th>
                <td>
                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info">Edit</a> 
                <a href="{{ route('product.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>  
  </div>

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
   
           $($("#products-"+id)[0]).remove();
             Swal.fire(
             'Deleted!',
             'Your file has been deleted.',
             'success'
           )
           window.location = "{{ \URL::route('product.list') }}"

         })
         .catch(function (error) {
           console.log(error);
         })
         .then(function () {
         });
       }
     })
       });
     });
   
     </script>
@endsection
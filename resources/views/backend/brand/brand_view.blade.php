@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Brand</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Brand name</th>
              <th>Brand photos</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brands as $item)
            <tr>
              <td>{{ $item->name_brand }}</td>
              <td><img src="{{ asset($item->brand_photos) }}" style="width: 70px; height: 40px;"></td>
              <td>
                <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-info">Edit</a> 
                <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Added brand</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
            @csrf					
                            <div class="form-group">
                                 <h5>Name brand <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name_brand" class="form-control">
                                     @error('name_brand')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                             </div>

                             <div class="form-group">
                                 <h5>Photos brand <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="file" name="brand_photos" class="form-control">
                                     @error('brand_photos')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                             </div>

                <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="add new brand">
             </div>
            </form>
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
   
           $($("#brand-"+id)[0]).remove();
             Swal.fire(
             'Deleted!',
             'Your file has been deleted.',
             'success',             
           )
           window.location = "{{ \URL::route('all.brand') }}"
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
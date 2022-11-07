@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Subsubcategories</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Subsubcategory</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subsubcategory as $item)
            <tr>
              <td>{{ $item['category']['name_category'] }}</td>
                <td>{{ $item['category']['name_subsubcategory' ]}}</td>
              <td>
                <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-info">Edit</a> 
                <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Added subcategories</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
            @csrf				
            
            
                              <div class="form-group">
                                <h5>Select category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control">
                                      <option value="" selected="" disabled="">Select category</option>
                                      @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                      @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span> 
                                 @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                 <h5>Name subcategory <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name_subcategory" class="form-control">
                                     @error('name_subcategory')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                             </div>

                <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="add new subcategory">
             </div>
            </form>
         </div>
       </div>
       <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  
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
   
           $($("#subcategories-"+id)[0]).remove();
             Swal.fire(
             'Deleted!',
             'Your file has been deleted.',
             'success'
           )
           window.location = "{{ \URL::route('view.subcategory') }}"

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
@endsection
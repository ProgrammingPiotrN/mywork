@extends('admin.admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">
    <section class="content">
      <div class="row">
  
      <div class="col-12">
  
       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">SubSubCategories LIST</h3>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Category</th>
                <th>SubCategory</th>
                <th>SubSubCategory</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subsubcategory as $item)
              <tr>
                  <td>{{ $item['CategoryCRUD']['name_category'] }}</td>
                  <td>{{ $item['SubCategoryCRUD']['name_subcategory'] }}</td>
                  <td>{{ $item->name_subsubcategory }}</td>
                <td>
                  <a href="{{ route('subsubcategory.edit', $item->id) }}" class="btn btn-info">Edit</a> 
                  <a href="{{ route('subsubcategory.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">Delete</a> 
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
           <h3 class="box-title">Added SubSubCategory</h3>
         </div>
         <div class="box-body">
           <div class="table-responsive">
            <form method="post" action="{{ route('subsubcategory.store') }}">
              @csrf					
                              <div class="form-group">
                                   <h5>Select category <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select category</option>
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
                                <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                <div class="controls">
                                 <select name="subcategory_id" class="form-control">
                                     <option value="">Select SubCategory</option>
                                    
                                 </select>
                                 @error('subcategory_id')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>

                               <div class="form-group">
                                <h5>Name SubSubCategory <span class="text-danger">*</span></h5>
                                <div class="controls">
                                 <input type="text" name="name_subsubcategory" class="form-control">
                                 @error('name_subsubcategory')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
  
                  <div class="text-xs-right">
  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="add new SubSubCategory">
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
     
             $($("#sub_subcategories-"+id)[0]).remove();
               Swal.fire(
               'Deleted!',
               'Your file has been deleted.',
               'success'
             )
             window.location = "{{ \URL::route('view.subsubcategory') }}"
  
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="category_id"]').on('change', function() {
                    var category_id = $(this).val();
                    if(category_id) {
                        $.ajax({
                            url: "{{ url('/category/subcategory/crud') }}/"+category_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                                var p =$('select[name="subcategory_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="subcategory_id"]').append('<option value="'+value.id + '">' + value.name_subcategory + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>

@endsection
@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Edit category</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
            @csrf	
            <input type="hidden" name="id" value="{{ $category->id }}">	

                            <div class="form-group">
                                 <h5>Name category <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name_category" class="form-control" value="{{ $category->name_category }}">
                                     @error('name_category')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                             </div>
                <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
             </div>
            </form>
         </div>
       </div>
       </div>
     </div>
    </div>
  </section>  
  </div>


@endsection
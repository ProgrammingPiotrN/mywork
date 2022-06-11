@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <!-- Main content -->
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Brand</h3>
      </div>
      <!-- /.box-header -->
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
            <tr id="brand-{{ $item->id}}">
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
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Added brand</h3>
       </div>
       <!-- /.box-header -->
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
       <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  
  </div>


@endsection
@extends('admin.admin')
@section('admin')

    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand list</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>Brand name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $item)
                           <td>{{ $item->name_brand }}</td> 
                           <td><img src="{{ asset($item->brand_photos) }}" style="width:70px; height:40px"></td> 
                           <td>
                            <a href="" class="btn btn-info">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>

                        </td> 
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
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Adding brands</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('update.change.password') }}">
                        @csrf						
     
                                         <div class="form-group">
                                             <h5>Current password <span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="password" id="current_password" name="oldpassword" class="form-control" required="">
                                             </div>
                                         </div>
                                     </div>
     
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h5>New password <span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="password" id="password" name="password" class="form-control" required="">
                                             </div>
                                         </div>
                                     </div>
     
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h5>Confirm password <span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                     </div>
                                 </div>
                                     
                            <div class="text-xs-right">
     <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
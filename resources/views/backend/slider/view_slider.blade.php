@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Slider') }}</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>{{ __('Slider image') }}</th>
              <th>{{ __('Title') }}</th>
              <th>{{ __('Description') }}</th>
              <th>{{ __('Status') }}</th>
              <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sliders as $item)
            <tr>
                <td><img src="{{ asset($item->img_slider) }}" style="width: 100px; height: 70px;"></td>
                <td>
                    @if($item->title == NULL)
                        <span class="badge badge-pill badge-danger">{{ __('No title') }}</span>
                    @else
                    {{ $item->title }}
                    @endif
                </td>
                <td>{{ $item->description }}</td>
                <td>
                    @if($item->status == 1)
                        <span class="badge badge-pill badge-success">{{ __('Active') }}</span>
                    @else
                        <span class="badge badge-pill badge-danger">{{ __('InActive') }}</span>
                    @endif
                </td>
              <td style="width: 30%">
                <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info">{{ __('Edit') }}</a> 
                <a href="{{ route('slider.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">{{ __('Delete') }}</a>
                @if($item->status == 1)
                    <a href="{{ route('slider.inactive', $item->id) }}" class="btn btn-danger" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                @else
                    <a href="{{ route('slider.active', $item->id) }}" class="btn btn-success" title="Active"><i class="fa fa-arrow-up"></i></a>
                @endif
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
         <h3 class="box-title">{{ __('Add slider') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf					
                            <div class="form-group">
                                 <h5>{{ __('Slider title') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="title" class="form-control">                                    
                                 </div>
                             </div>

                             <div class="form-group">
                                <h5>{{ __('Slider description') }} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="description" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>{{ __('Slider image') }} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="img_slider" class="form-control">
                                    @error('img_slider')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('add new slider') }}">
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
   
           $($("#sliders-"+id)[0]).remove();
             Swal.fire(
             'success'
           )
           window.location = "{{ \URL::route('slider.view') }}"

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
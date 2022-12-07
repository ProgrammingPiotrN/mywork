@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Products') }}</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>{{ __('Product Image') }}</th>
              <th>{{ __('Name product') }}</th>
              <th>{{ __('Product selling price') }}</th>
              <th>{{ __('Product quantity') }}</th>
              <th>{{ __('Product price discount') }}</th>
              <th>{{ __('Status') }}</th>
              <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $item)
            <tr>
                <td><img src="{{ asset($item->thambnail_product) }}" style="width: 80px; height: 70px"></td>
                <td>{{ $item->name_product }}</td>
                <td>{{ $item->price_selling }} PLN</td>
                <td>{{ $item->quantity_product }}</td>
                <td>  
                  @if($item->price_discount == NULL)
                      <span class="badge badge-pill badge-danger">{{ __('No discount') }}</span>
                  @else
                  @php
                   $price = $item->price_selling - $item->price_discount;
                   $discount = ($price/$item->price_selling) * 100;   
                  @endphp
                      <span class="badge badge-pill badge-success">{{ round($discount) }}%</span>
                  @endif               
                </td>
                <th>

                  @if($item->status == 1)
                    <span class="badge badge-pill badge-success">{{ __('Active') }}</span>
                  @else
                    <span class="badge badge-pill badge-danger">{{ __('InActive') }}</span>
                  @endif
  
                </th>
                <td width="30%">
                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">{{ __('Details') }}</a> 
                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info">{{ __('Edit') }}</a> 
                <a href="{{ route('product.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">{{ __('Delete') }}</a>
                  @if($item->status == 1)
                  <a href="{{ route('product.inactive', $item->id) }}" class="btn btn-danger" title="Inactive"><i class="fa fa-arrow-down"></i></a> 
                  @else
                  <a href="{{ route('product.active', $item->id) }}" class="btn btn-success" title="Active"><i class="fa fa-arrow-up"></i></a> 
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
   
           $($("#product-"+id)[0]).remove();
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
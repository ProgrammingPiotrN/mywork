<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="namep"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src=" " class="card-img-top" alt="..." style="height:200px; width:200px" id="imagep">
              <div class="card-body">
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">{{ __('Product price') }}: <strong class="text-danger"> <span id="pricep"></span> </strong><del id="pold"></del> PLN</li>
              <li class="list-group-item">{{ __('Product code') }}: <strong id="codep"></strong></li>
              <li class="list-group-item">{{ __('Category') }}: <strong id="categoryp"></strong></li>
              <li class="list-group-item">{{ __('Brand') }}: <strong id="brand"></strong></li>
              <li class="list-group-item">{{ __('In Stock') }}: 
                <span class="badge badge-pill badge-success" id="aviable" style="background: green; color:white;"></span>
                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color:white;"></span>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlSelect1">{{ __('Choose weight') }}</label>
              <select class="form-control" id="exampleFormControlSelect1" name="weight">
                <option>{{ __('Choose weight') }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">{{ __('Quantity') }}</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" value="1" min="1">
            </div>
            <button type="submit" class="btn btn-primary mb-2">{{ __('ADD TO CART') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $.ajaxSetup({
     headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  })
  function productView(id){
     $.ajax({
        type: 'GET',
        url: '/product/view/model/'+id,
        dataType: 'json',
        success:function(data){
           $('#namep').text(data.product.name_product);
           $('#price').text(data.product.price_selling);
           $('#codep').text(data.product.code_product);
           $('#categoryp').text(data.product.category.name_category);
           $('#brand').text(data.product.brand.name_brand);
           $('#imagep').attr('src', '/'+data.product.thambnail_product);

           if(data.product.price_discount == null){
            $('#pricep').text('');
            $('#pold').text('');
            $('#pricep').text(data.product.price_selling);
           }else{
            $('#pricep').text(data.product.price_discount);;
            $('#pold').text(data.product.price_selling)
           }

           if(data.product.quantity_product > 0){
            $('#aviable').text('');
            $('#stockout').text('');
            $('#aviable').text('aviable');
           }else{
            $('#aviable').text('');
            $('#stockout').text('');
            $('#stockout').text('stockout');
           }

           $('select[name="weight"]').empty();
           $.each(data.weight, function(key, value){
            $('select[name="weight"]').append('<option value=" '+value+' "> '+value+' </option>')
           })
        }
     })
  }
</script>
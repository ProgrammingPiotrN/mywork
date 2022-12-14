<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="namep"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
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
              <label for="weight">{{ __('Choose weight') }}</label>
              <select class="form-control" id="weight" name="weight">
                <option>{{ __('Choose weight') }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">{{ __('Quantity') }}</label>
              <input type="number" class="form-control" id="quantity" value="1" min="1">
            </div>
            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary mb-2" onclick="AddToCart()">{{ __('ADD TO CART') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

           $('#product_id').val(id);
           $('#quantity').val(1);

           if(data.product.price_discount == null){
            $('#pricep').text('');
            $('#pold').text('');
            $('#pricep').text(data.product.price_selling);
           }else{
            $('#pricep').text(data.product.price_discount);
            $('#pold').text(data.product.price_selling);
           }

           if(data.product.quantity_product > 0){
            $('#aviable').text('');
            $('#stockout').text('');
            $('#aviable').text('aviable / dostępne');
           }else{
            $('#aviable').text('');
            $('#stockout').text('');
            $('#stockout').text('stockout / niedostępne');
           }

           $('select[name="weight"]').empty();
           $.each(data.weight, function(key, value){
            $('select[name="weight"]').append('<option value=" '+value+' "> '+value+' </option>')
           })
        }
     })
  }
  function AddToCart(){
    var name_product = $('#namep').text();
    var id = $('#product_id').val();
    var weight = $('#weight option:selected').text();
    var quantity = $('#quantity').val();
    $.ajax({
      type: "POST",
      dataType : 'json',
      data:{
        weight:weight, quantity:quantity, name_product:name_product
      },
      url: "/cart/data/store/"+id,
      success:function(data){
        $('#closeModel').click();
        miniCart(); 

        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2800
                          })

      if($.isEmptyObject(data.error)){
        Toast.fire({
          type: 'success',
          title: data.success
        })
      }else{
        Toast.fire({
          type: 'error',
          title: data.error
        })
      }
      }
    })
  }
</script>

<script type="text/javascript">
  function miniCart(){
    $.ajax({
      type: 'GET',
      url: '/product/small/cart',
      dataType: 'json',
      success:function(response){

        $('span[id="cartTotal"]').text(response.cartTotal);
        $('span[id="cartQuantity"]').text(response.cartQuantity);

        var miniCart = ""

        $.each(response.carts, function(key, value){

          miniCart += `<div class="cart-item product-summary">
            <div class="row">
              <div class="col-xs-4">
                <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
              </div>
              <div class="col-xs-7">
                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                <div class="price">${value.price} PLN * ${value.qty}</div>
              </div>
              <div class="col-xs-1 action"> 
                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>`

        });
        $('#miniCart').html(miniCart);
      }
    })
  }
  miniCart();

  function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/smallcart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart(); 
            
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
               
            }           
        });
    }
</script>

<script type="text/javascript">
  function AddToWishlist(product_id){
        $.ajax({
            type: 'POST',
            url: '/wishlist/'+product_id,
            dataType:'json',
            success:function(data){
              const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            }
                    
        });
    }

</script>


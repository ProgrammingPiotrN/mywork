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

<script type="text/javascript">
  function Wishlist(){
    $.ajax({
      type: 'GET',
      url: '/user/wishlist/my-wishlist',
      dataType: 'json',
      success:function(response){

        var rows = ""

        $.each(response, function(key, value){

          rows += `<tr> 
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.name_product}</a></div>
						<div class="price">
              ${value.product.price_discount == null
              ? `${value.product.price_selling} PLN`
            : 
              `${value.product.price_discount} PLN <span>${value.product.price_selling} PLN</span> `  
          }
						</div>
					</td>
					<td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" 
            onclick="productView(this.id)" id="${value.product_id}"> <i class="fa fa-shopping-cart"></i> </button>
					</td>
					<td class="col-md-1 close-btn">
            <button type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class=""><i class="fa fa-times"></i></button>
            </td>
				</tr>`

        });
        $('#Wishlist').html(rows);
      }
    })
  }
  Wishlist();

  function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist/remove/'+id,
            dataType:'json',
            success:function(data){
              Wishlist(); 
            
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

<script type="text/javascript">
  function cart(){
    $.ajax({
      type: 'GET',
      url: '/user/product/cart',
      dataType: 'json',
      success:function(response){

        var rows = ""

        $.each(response.carts, function(key, value){

          rows += `<tr> 
          <td class="col-md-2"><img src="/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>  
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.name}</a></div>
						<div class="price">
              ${value.price} PLN
						</div>
					</td>
          <td class="col-md-2">
						<strong>${value.options.weight}</strong>
					</td>
          <td class="col-md-5">
            <td class="col-md-5">
              ${value.qty > 1
            ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDec(this.id)" style="padding: 15px 15px; margin: 10px;">-</button> `
            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
            }            
            <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="height:30px; width:35px; margin: 10px" ><br>     
            <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartInc(this.id)" style="padding: 15px 15px; margin: 10px;">+</button>    
            </td>					
          </td>
          <td class="col-md-2">
            <strong>${value.subtotal} PLN</strong> 
            </td> 
					<td class="col-md-1 close-btn">
            <button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class=""><i class="fa fa-times"></i></button>
            </td>
				</tr>`

        });
        $('#cartPage').html(rows);
      }
    })
  }
  cart();

  function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/cart/remove/'+id,
            dataType:'json',
            success:function(data){
              cart(); 
              miniCart();
            
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

    function cartInc(rowId){
        $.ajax({
            type:'GET',
            url: "/cart/increment/"+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }

    function cartDec(rowId){
        $.ajax({
            type:'GET',
            url: "/cart/decrement/"+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }

  </script>

<script type="text/javascript">
  function applyCoupon(){
    var coupon_name = $('#name_coupon').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {coupon_name:coupon_name},
        url: "{{ url('/apply/coupon') }}",
        success:function(data){
        }
    })
  }  
</script>


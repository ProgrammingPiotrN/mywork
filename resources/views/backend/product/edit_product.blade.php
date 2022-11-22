@extends('admin.admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
    	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('product.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <div class="row">
                      <div class="col-12">	
                        
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Select brand <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="brand_id" class="form-control" style="text-align: center" required="">
                                         <option value="">Select brand</option>
                                         @foreach($brands as $brand)
                                         <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected':''}}>{{ $brand->name_brand }}</option>
                                         @endforeach
                                     </select>
                                     @error('brand_id')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                               </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Select category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="category_id" class="form-control" style="text-align: center" required="">
                                         <option value="">Select category</option>
                                         @foreach($categories as $category)
                                         <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected':''}}>{{ $category->name_category }}</option>
                                         @endforeach
                                     </select>
                                     @error('category_id')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                               </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Select subcategory <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="subcategory_id" class="form-control" style="text-align: center" required="">
                                         <option value="">Select subcategory</option>
                                         @foreach($subcategory as $sub)
                                         <option value="{{ $sub->id }}" {{ $sub->id == $products->subcategory_id ? 'selected':''}}>{{ $sub->name_subcategory }}</option>
                                         @endforeach
                                     </select>
                                     @error('subcategory_id')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                               </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Select subsubcategory <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="subsubcategory_id" class="form-control" style="text-align: center" required="">
                                         <option value="">Select subsubcategory</option>
                                         @foreach($subsubcategory as $subsub)
                                         <option value="{{ $subsub->id }}" {{ $subsub->id == $products->subsubcategory_id ? 'selected':''}}>{{ $subsub->name_subsubcategory }}</option>
                                         @endforeach
                                     </select>
                                     @error('subsubcategory_id')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                               </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_product" class="form-control" style="text-align: center" required="" value="{{ $products->name_product }}"> 
                                    </div>
                                        @error('name_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="code_product" class="form-control" style="text-align: center" required="" value="{{ $products->code_product }}"> 
                                    </div>
                                        @error('code_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="quantity_product" class="form-control" style="text-align: center" required="" value="{{ $products->quantity_product }}"> 
                                    </div>
                                        @error('quantity_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product tags <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="tags_product" class="form-control" data-role="tagsinput" required="" value="{{ $products->tags_product }}"> 
                                    </div>
                                        @error('tags_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product weight <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="weight_product" class="form-control" data-role="tagsinput" required=""  value="{{ $products->weight_product }}">
                                     </div>
                                        @error('weight_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product price selling <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="price_selling" class="form-control" style="text-align: center" required=""  value="{{ $products->price_selling }}"> 
                                    </div>
                                        @error('price_selling')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Product price discount <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="price_discount" class="form-control" style="text-align: center" required="" value="{{ $products->price_discount }}">
                                     </div>
                                        @error('price_discount')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                                                      
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Description-short <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description_short" id="editor1" class="form-control" required placeholder="Textarea text" required="">
                                            {{ $products->description_short }}
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>Description-long <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description_long" id="editor2" class="form-control" required placeholder="Textarea text" required="">
                                            {{ $products->description_long }}
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>  
                        
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_1" name="featured"  value="1" {{ $products->featured == 1 ? 'checked': '' }}>
                                            <label for="checkbox_1">Featured</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked': '' }}>
                                            <label for="checkbox_2">Special deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="deals"  value="1" {{ $products->deals == 1 ? 'checked': '' }}>
                                            <label for="checkbox_3">Hot deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked': '' }}>
                                            <label for="checkbox_4">Special offer</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>
                         
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

      </section>

      <section class="content">
        <div class="row">
   
   <div class="col-md-12">
                   <div class="box bt-3 border-info">
                     <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                     </div>
   
   
           <form method="" action="" enctype="multipart/form-data">
   
               <div class="row row-sm">
                   @foreach($multi as $img)
                   <div class="col-md-3">
   
   <div class="card">
     <img src="{{ asset($img->name_photo) }}" class="card-img-top" style="height: 130px; width: 280px;">
     <div class="card-body">
       <h5 class="card-title">
   <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data">Delete</a>
        </h5>
       <p class="card-text"> 
           <div class="form-group">
               <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
               <input class="form-control" type="file" name="multi_image[ $img->id ]">
           </div> 
       </p>
   
     </div>
   </div> 		
   
                   </div><!--  end col md 3		 -->	
                   @endforeach
   
               </div>			
   
               <div class="text-xs-right">
   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" style="margin: 25px">
            </div>
   <br><br>
   
   
   
           </form>		   
   
   
   
   
   
                   </div>
                 </div>
   
   
   
        </div> <!-- // end row  -->
   
    </section>

    </div>

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
                            $('select[name="subsubcategory_id"]').html('empty');
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

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/subsubcategory/crud') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var p =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+value.id + '">' + value.name_subsubcategory + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>

    <script type="text/javascript">
    
        function ThamURL(input){

            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#MainThmb').attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    
    </script>

<script type="text/javascript">
    
    function ThamURL(input){

        if(input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#MainThmb').attr('src', e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
 
    $(document).ready(function(){
     $('#MultiImage').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(100); //create image element 
                        $('#prev_image').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
    </script>


@endsection
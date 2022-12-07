@extends('admin.admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
      <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">{{ __('Add Product') }}</h4>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      <div class="col-12">	
                        
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Select brand') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="brand_id" class="form-control" style="text-align: center">
                                         <option value="">{{ __('Select brand') }}</option>
                                         @foreach($brands as $brand)
                                         <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
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
                                    <h5>{{ __('Select category') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="category_id" class="form-control" style="text-align: center">
                                         <option value="">{{ __('Select category') }}</option>
                                         @foreach($categories as $category)
                                         <option value="{{ $category->id }}">{{ $category->name_category }}</option>
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
                                    <h5>{{ __('Select SubCategory') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="subcategory_id" class="form-control" style="text-align: center">
                                         <option value="">{{ __('Select SubCategory') }}</option>
                                        
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
                                    <h5>{{ __('Select SubSubCategory') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                     <select name="subsubcategory_id" class="form-control" style="text-align: center">
                                         <option value="">{{ __('Select SubSubCategory') }}</option>
                                        
                                     </select>
                                     @error('subsubcategory_id')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                               </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Name product') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name_product" class="form-control" style="text-align: center"> 
                                    </div>
                                        @error('name_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Product code') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="code_product" class="form-control" style="text-align: center"> 
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
                                    <h5>{{ __('Product quantity') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="quantity_product" class="form-control" style="text-align: center"> 
                                    </div>
                                        @error('quantity_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Product tags') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="tags_product" class="form-control" value="Cakes,Muffins,Pancakes" data-role="tagsinput"> 
                                    </div>
                                        @error('tags_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Product weight') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="weight_product" class="form-control" value="1.5 kg, 200 g, 150 dag" data-role="tagsinput">
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
                                    <h5>{{ __('Product  selling price') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="price_selling" class="form-control" style="text-align: center"> 
                                    </div>
                                        @error('price_selling')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Product price discount') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="price_discount" class="form-control" style="text-align: center">
                                     </div>
                                        @error('price_discount')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Main thambnail') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="thambnail_product" class="form-control" onChange="ThamURL(this)"> 
                                    </div>
                                        @error('thambnail_product')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                        <img src="" id="MainThmb">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Multiple image') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_image[]" class="form-control" multiple="" id="MultiImage"> 
                                    </div>
                                        @error('multi_image')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                        <div class="row" id="prev_image"></div>
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Description-short') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description_short" id="descshort" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="col-md-12">

                                <div class="form-group">
                                    <h5>{{ __('Description-long') }} <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description_long" id="desclong" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>  
                        
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_1" name="featured"  value="1">
                                            <label for="checkbox_1">{{ __('Featured') }}</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="special_deals" value="1">
                                            <label for="checkbox_2">{{ __('Special deals') }}</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="deals"  value="1">
                                            <label for="checkbox_3">{{ __('Hot deals') }}</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                            <label for="checkbox_4">{{ __('Special offer') }}</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>
                         
                      </div>
                    </div>
                      
                      <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Add Product') }}">
                    </div>
                  </form>

              </div>
            </div>
          </div>
        </div>
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
                $('#MainThmb').attr('src', e.target.result).width(400).height(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
 
    $(document).ready(function(){
     $('#MultiImage').on('change', function(){ 
        if (window.File && window.FileReader && window.FileList && window.Blob) 
        {
            var data = $(this)[0].files; 
             
            $.each(data, function(index, file){ 
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ 
                    var fRead = new FileReader(); 
                    fRead.onload = (function(file){ 
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(400)
                    .height(300); 
                        $('#prev_image').append(img); 
                    };
                    })(file);
                    fRead.readAsDataURL(file); 
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); 
        }
     });
    });
     
    </script>


@endsection
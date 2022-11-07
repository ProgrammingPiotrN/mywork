@extends('admin.admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



	<div class="container-full">
	  <!-- Content Header (Page header) -->
	 	  

	  <!-- Main content -->
	  <section class="content">

	   <!-- Basic Forms -->
		<div class="box">
		  <div class="box-header with-border">
			<h4 class="box-title">Adding products</h4>
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body">
			<div class="row">
			  <div class="col">
				  <form novalidate>
					<div class="row">
					  	<div class="col-12">
							
							<div class="row" style="padding: 10px">
								<div class="col-md-4">
									<h5>Select brand <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="brand_id" class="form-control">
										  <option value="" selected="" disabled="">Select brand</option>
										  @foreach($brands as $brand)
										  <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
										  @endforeach
										</select>
										@error('brand_id')
										<span class="text-danger">{{ $message }}</span> 
									 @enderror
									</div>
								</div>
								<div class="col-md-4">
									<h5>Select category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control">
                                      <option value="" selected="" disabled="">Select category</option>
                                      @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                      @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span> 
                                 @enderror
                                </div>
								</div>
								<div class="col-md-4">
									<h5>Select subcategory <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="subcategory_id" class="form-control">
										  <option value="" selected="" disabled="">Select subcategory</option>						
										</select>
										@error('subcategory_id')
										<span class="text-danger">{{ $message }}</span> 
									 @enderror
									</div>
								</div>
							</div>
							
							<div class="row" style="padding: 10px">
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name_product" class="form-control"> </div>
											@error('name_product')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product code <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_code" class="form-control"> </div>
											@error('product_code')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product quantity <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="quantity_product" class="form-control"> </div>
											@error('quantity_product')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
							</div>

							<div class="row" style="padding: 10px">
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product tags <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="tags_product" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> </div>
											@error('tags_product')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product weight <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="weight_product" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> </div>
											@error('weight_product')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product selling price  <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="price_selling" class="form-control"> </div>
											@error('price_selling')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
							</div>

							<div class="row" style="padding: 10px">
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product discount price  <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="price_discount" class="form-control"> </div>
											@error('price_discount')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Product thambnail  <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="thambnail_product" class="form-control"> </div>
											@error('thambnail_product')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Multiple image  <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="multi_img[]" class="form-control"> </div>
											@error('multi_img')
											<span class="text-danger">{{ $message }}</span> 
									 	 @enderror
									</div>
								</div>
							</div>

							<div class="row" style="padding: 10px">
								<div class="col-md-12">
									<div class="form-group">
										<h5>Short description  <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="description_short" id="editor1" class="form-control" required placeholder="Textarea text"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<h5>Long description  <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="description_long" id="editor2" class="form-control" required placeholder="Textarea text"></textarea>
									</div>
								</div>
								<div class="col-md-12">

								</div>
							</div>

						</div>	
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
									  <fieldset>
										  <input type="checkbox" id="checkbox_1" name="deals" value="1">
											<label for="checkbox_1">Hot deals</label>
									  </fieldset>
									  <fieldset>
										  <input type="checkbox" id="checkbox_2" name="featured" value="1">
											<label for="checkbox_2">Featured</label>
									  </fieldset> 
									</div>								
								</div>
							</div>
						</div>
						<div class="row" style="margin-left: 100px">
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
									  <fieldset>
										  <input type="checkbox" id="checkbox_3" name="special_offer"  value="single">
											<label for="checkbox_3">Special offer</label>
									  </fieldset>
									  <fieldset>
										  <input type="checkbox" id="checkbox_4" name="special_deals" value="single">
											<label for="checkbox_4">Special deals</label>
									  </fieldset> 
									</div>								
								</div>
							</div>
						</div>
					  <div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-primary mb-5" value="add product" style="margin: 140px">
					</div>
				  </form>

			  </div>
			  <!-- /.col -->
			</div>
		  <!-- /.box-body -->
		</div>
		<!-- /.box -->

	  </section>
	  <!-- /.content -->
	</div>

	
  

@endsection
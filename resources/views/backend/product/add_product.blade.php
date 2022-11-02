@extends('admin.admin')
@section('admin')


	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add product </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form novalidate>
					  <div class="row">
	<div class="col-12">	


		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-4">

	 <div class="form-group">
	<h5>Select brand <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="brand_id" class="form-control"  >
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

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
	<h5>Select category <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  >
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

			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
	<h5>Select subcategory<span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control"  >
			<option value="" selected="" disabled="">Select subcategory</option>
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 1st row  -->




		<div class="row"> <!-- start 2st row  -->
			<div class="col-md-4">

				<div class="form-group">
					<h5>Name product <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="name_product" class="form-control"> </div>
						@error('name_product') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>

			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Product code <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_code" class="form-control"> </div>
						@error('product_code') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				<div class="form-group">
					<h5>Product quantity <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="quantity_product" class="form-control"> </div>
						@error('quantity_product') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>

		</div> <!-- end 2st row  -->


		<div class="row"> <!-- start 3rd row  -->
			
			
			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Product tags <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="tags_product" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> </div>
						@error('tags_product') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				<div class="form-group">
					<h5>Weight product  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="weight_product" class="form-control" value="Small,Midium,Large" data-role="tagsinput"> </div>
						@error('weight_product') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>

			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Price selling <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="price_selling" class="form-control"> </div>
						@error('price_selling') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 3rd row  -->

		<div class="row"> <!-- start 4th row  -->
			
			
			

		</div> <!-- end 4th row  -->

		<div class="row"> <!-- start 5th row  -->
			<div class="col-md-4">

				<div class="form-group">
					<h5>Price discount  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="price_discount" class="form-control"> </div>
						@error('price_discount') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>
			
			 <!-- end col md 4 -->



		</div> <!-- end 5th row  -->

		<div class="row"> <!-- start 6th row  -->
			
			
			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Product thambnail <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="thambnail_product" class="form-control"> </div>
						@error('thambnail_product') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Multi image <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="multi_img[]" class="form-control"> </div>
						@error('multi_img') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div>

			<div class="col-md-4">

				<div class="form-group">
					<h5>Deals  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="deals" class="form-control"> </div>
						@error('deals') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>

			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Featured <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="featured" class="form-control"> </div>
						@error('featured') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 6th row  -->

		<div class="row"> <!-- start 6th row  -->

		</div> <!-- end 6th row  -->

		<div class="row"> <!-- start 7th row  -->
			<div class="col-md-4">

				<div class="form-group">
					<h5>Special offer <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="special_offer" class="form-control"> </div>
						@error('special_offer') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>
			
			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Special deals <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="special_deals" class="form-control"> </div>
						@error('special_deals') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				<div class="form-group">
					<h5>Status <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="status" class="form-control"> </div>
						@error('status') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div>

			<div class="col-md-4">

				
				<div class="form-group">
					<h5>Description short <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea type="text" id="editor1" name="description_short" required placeholder="Textarea text" class="form-control" required placeholder="Textarea text"></textarea> 
					</div>
						@error('description_short') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>

			</div>

			<div class="col-md-4">

				<div class="form-group">
					<h5>Description long  <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea type="text" id="editor2" name="description_long" class="form-control" required placeholder="Textarea text"></textarea> 
					</div>
						@error('description_long') 
	 					<span class="text-danger">{{ $message }}</span>
	 					@enderror 
				</div>


			</div>

		</div> <!-- end 7th row  -->

	</div>
  </div>
		
		
						

						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>



@endsection
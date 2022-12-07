@extends('frontend.main')
@section('content')

@section('title')
    {{ $product->name_product }}
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ '/' }}">{{ __('Home') }}</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content outer-top-xs">

	<div class='container'>
    
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
          @include('frontend.deals.hot_deals')		
				</div>
			</div>
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">

    <div class="product-item-holder size-big single-product-gallery small-gallery">
        <div id="owl-single-product">
          @foreach($multiImg as $img)
          <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->name_photo) }}">
                    <img class="img-responsive" alt="" src="{{ asset($img->name_photo) }}" data-echo="{{ asset($img->name_photo) }}" />
                </a>
          </div>
          @endforeach
        </div>
			
        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

              @foreach($multiImg as $img)
              <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
                        <img class="img-responsive" width="85" alt="" src="{{ asset($img->name_photo) }}" data-echo="{{ asset($img->name_photo) }}" />
                    </a>
              </div>
              @endforeach
            </div>
        </div>
    </div>
</div>      

					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{ $product->name_product }}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>
									</div>
								</div>		
							</div>

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">{{ __('Availability') }} :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">{{ __('In Stock') }}</span>
										</div>	
									</div>
								</div>
							</div>

							<div class="description-container m-t-20">
                {{ $product->description_short }}
              </div>

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
                      @if($product->price_discount == NULL)
											<span class="price">{{ $product->price_selling }} PLN</span>
                      @else
                      <span class="price">{{ $product->price_discount }} PLN</span>
											<span class="price-strike">{{ $product->price_selling }} PLN</span>
                      @endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>
								</div>
							</div>

              <div class="row">
									
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="info-title control-label">{{ __('Choose weight') }} <span></span></label>
                    <select class="form-control unicase-form-control selectpicker">
                      <option>{{ __('Choose weight') }}</option>
                      @foreach($weight_product as $weight)
                      <option value="{{ $weight }}">{{ ucwords($weight) }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">{{ __('Quantity') }} :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> {{ __('ADD TO CART') }}</a>
									</div>								
								</div>
							</div>				
						</div>
					</div>
				</div>
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">{{ __('DESCRIPTION') }}</a></li>
								<li><a data-toggle="tab" href="#review">{{ __('REVIEW') }}</a></li>
								<li><a data-toggle="tab" href="#tags">{{ __('TAGS') }}</a></li>
							</ul>
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">{{ $product->description_long }}</p>
									</div>	
								</div>

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">{{ __('Customer Reviews') }}</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>											
											</div>
										</div>

										<div class="product-add-review">
											<h4 class="title">{{ __('Write your own review') }}</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">{{ __('Quality') }}</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">{{ __('Price') }}</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">{{ __('Value') }}</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											
											<div class="review-form">
												<div class="form-container">
													<form role="form" class="cnt-form">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">{{ __('Your Name') }} <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div>
																<div class="form-group">
																	<label for="exampleInputSummary">{{ __('Summary') }} <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div>
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">{{ __('REVIEW') }} <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div>
															</div>
														</div>														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">{{ __('SUBMIT REVIEW') }}</button>
														</div>
													</form>
												</div>
											</div>
										</div>																			
							        </div>
								</div>
								<div id="tags" class="tab-pane">
									<div class="product-tag">										
										<h4 class="title">{{ __('Product Tags') }}</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">									
												<div class="form-group">
													<label for="exampleInputTag">{{ __('Add Your Tags:') }} </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
												</div>
												<button class="btn btn-upper btn-primary" type="submit">{{ __('ADD TAGS') }}</button>
											</div>
										</form>
										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
        @include('frontend.related_products.related_products')
			</div>
			<div class="clearfix"></div>
		</div>
    </div>
@endsection
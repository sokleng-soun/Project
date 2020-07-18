@extends('layouts.default')

@section('content')
<!-- banner -->
<div class="banner">
	<div class="container">
		<h3>Electronic Store, <span>Special Offers</span></h3>
	</div>
</div>
<!-- //banner --> 
<!-- banner-bottom -->
<div class="banner-bottom">
	<div class="container">
		<div class="col-md-5 wthree_banner_bottom_left">
			<div class="video-img">
				<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
					<span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
				</a>
			</div> 
			<!-- pop-up-box -->     
			<script src="{{ asset('js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
			<!--//pop-up-box -->
			<div id="small-dialog" class="mfp-hide">
				<iframe src="https://www.youtube.com/embed/ZQa6GUVnbNM"></iframe>
			</div>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});

				});
			</script>
		</div>
		<div class="col-md-7 wthree_banner_bottom_right">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					@if (isset($categories) && count($categories) > 0)
					@foreach ($categories as $key => $category)

					<li role="presentation" class="{{ $key == 0 ? 'active' : '' }}">
						<a href="#{{ $category->name }}" id="{{ $category->name }}-tab" role="tab" data-toggle="tab" aria-controls="home">{{ $category->name }}</a>
					</li>
					@endforeach
					@endif
				</ul>
				<div id="myTabContent" class="tab-content">

					@if (isset($categories) && count($categories) > 0)
					@foreach ($categories as $key => $category)
					<div role="tabpanel" class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}" id="{{ $category->name }}" aria-labelledby="{{ $category->name }}-tab">
						<div class="agile_ecommerce_tabs">
							@php
							$products = App\Models\Product::where('category_id', $category->id)->limit(3)->get();
							@endphp
							@if (isset($products) && count($products) > 0)
							@foreach ($products as $product)
							<div class="col-md-4 agile_ecommerce_tab_left">
								<div class="hs-wrapper">
									{!! productImageView($product['images']) !!}
									<div class="w3_hs_bottom">
										<ul>
											<li>
												<a href="javascript:void(0)" class="view_icon" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div> 
								<h5><a href="{{ route('single') }}">{{ $product->name }}</a></h5>
								{!! getProductCartPrice($product) !!}
								{{-- <div class="simpleCart_shelfItem">
									<p>
										<span>@if ($product->discount) ${{ $product->regular_price }} @endif</span> 
										<i class="item_price">${{ $product->discount ? $product->discounted_price : $product->regular_price }}</i>
									</p>
									<a href="{{ route('cart.product.add', $product->slug) }}" class="btn w3ls-cart">Add to cart</a>
								</div> --}}
							</div>
							@endforeach
							@endif

							<div class="clearfix"> </div>
						</div>
					</div>
					@endforeach
					@endif

				</div>
			</div> 
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //banner-bottom --> 
<!-- modal-video -->
<div class="modal video-modal fade productModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<section>
				<div class="modal-body">
					<div class="col-md-5 modal_body_left">
						<img src="{{ asset('images/3.jpg') }}" alt=" " class="img-responsive" />
					</div>
					<div class="col-md-7 modal_body_right">
						<h4>The Best Mobile Phone 3GB</h4>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
						commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
						<div class="rating">
							<div class="rating-left">
								<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="modal_body_right_cart simpleCart_shelfItem">
							<p><span>$380</span> <i class="item_price">$350</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Mobile Phone1"> 
								<input type="hidden" name="amount" value="350.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
								<li><a href="#"><span></span></a></li>
								<li><a href="#" class="brown"><span></span></a></li>
								<li><a href="#" class="purple"><span></span></a></li>
								<li><a href="#" class="gray"><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>

<!-- //modal-video -->
<!-- banner-bottom1 -->
<div class="banner-bottom1">
	<div class="agileinfo_banner_bottom1_grids">
		<div class="col-md-7 agileinfo_banner_bottom1_grid_left">
			<h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
			<a href="{{ route('products') }}">Shop Now</a>
		</div>
		<div class="col-md-5 agileinfo_banner_bottom1_grid_right">
			<h4>hot deal</h4>
			<div class="timer_wrap">
				<div id="counter"> </div>
			</div>
			<script src="{{ asset('js/jquery.countdown.js') }}"></script>
			<script src="{{ asset('js/script.js') }}"></script>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //banner-bottom1 --> 
<!-- special-deals -->
<div class="special-deals">
	<div class="container">
		<h2>Special Deals</h2>
		<div class="w3agile_special_deals_grids">
			<div class="col-md-7 w3agile_special_deals_grid_left">
				<div class="w3agile_special_deals_grid_left_grid">
					<img src="{{ asset('images/21.jpg') }}" alt=" " class="img-responsive" />
					<div class="w3agile_special_deals_grid_left_grid_pos1">
						<h5>30%<span>Off/-</span></h5>
					</div>
					<div class="w3agile_special_deals_grid_left_grid_pos">
						<h4>We Offer <span>Best Products</span></h4>
					</div>
				</div>
				<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="w3agile_special_deals_grid_left_grid1">
									<img src="{{ asset('images/t1.jpg') }}" alt=" " class="img-responsive" />
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
									eum fugiat quo voluptas nulla pariatur</p>
									<h4>Laura</h4>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="w3agile_special_deals_grid_left_grid1">
									<img src="{{ asset('images/t2.jpg') }}" alt=" " class="img-responsive" />
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
									eum fugiat quo voluptas nulla pariatur</p>
									<h4>Michael</h4>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="w3agile_special_deals_grid_left_grid1">
									<img src="{{ asset('images/t3.jpg') }}" alt=" " class="img-responsive" />
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
									eum fugiat quo voluptas nulla pariatur</p>
									<h4>Rosy</h4>
								</div>
							</div>
						</article>
					</div>
				</div>
				<script src="{{ asset('js/jquery.wmuSlider.js') }}"></script> 
				<script>
					$('.example1').wmuSlider();         
				</script> 
			</div>
			<div class="col-md-5 w3agile_special_deals_grid_right">
				<img src="{{ asset('images/20.jpg') }}" alt=" " class="img-responsive" />
				<div class="w3agile_special_deals_grid_right_pos">
					<h4>Women's <span>Special</span></h4>
					<h5>save up <span>to</span> 30%</h5>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //special-deals -->
<!-- new-products -->
<div class="new-products">
	<div class="container">
		<h3>New Products</h3>
		<div class="agileinfo_new_products_grids">

			@if (isset($new_products) && count($new_products) > 0)
			@foreach ($new_products as $new_product)

			<div class="col-md-3 agileinfo_new_products_grid">
				<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
					<div class="hs-wrapper hs-wrapper1">
						{!! productImageView($new_product['images']) !!} 
						<div class="w3_hs_bottom w3_hs_bottom_sub">
							<ul>
								<li>
									<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
								</li>
							</ul>
						</div>
					</div>
					<h5><a href="{{ route('single') }}">{{ $new_product->name }}</a></h5>
					{!! getProductCartPrice($new_product) !!}
					{{-- <div class="simpleCart_shelfItem">
						<p>
							<span>
								@if ($new_product->discount)${{ $new_product->regular_price }} @endif
							</span>
							<i class="item_price">${{ $new_product->discount ? $new_product->discounted_price : $new_product->regular_price }}</i>
						</p>
						<a href="{{ route('cart.product.add', $new_product->slug) }}" class="btn w3ls-cart">Add to cart</a>
					</div> --}}
				</div>
			</div>
			@endforeach
			@endif

			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //new-products -->
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h3>Top Brands</h3>
		<div class="sliderfig">
			<ul id="flexiselDemo1">			
				<li>
					<img src="{{ asset('images/tb1.jpg') }}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{ asset('images/tb2.jpg') }}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{ asset('images/tb3.jpg') }}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{ asset('images/tb4.jpg') }}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{ asset('images/tb5.jpg') }}" alt=" " class="img-responsive" />
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems:2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});

			});
		</script>
		<script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
	</div>
</div>
<!-- //top-brands --> 
<!-- newsletter -->
<div class="newsletter">
	<div class="container">
		<div class="col-md-6 w3agile_newsletter_left">
			<h3>Newsletter</h3>
			<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
		</div>
		<div class="col-md-6 w3agile_newsletter_right">
			<form action="#" method="post">
				<input type="email" name="Email" placeholder="Email" required="">
				<input type="submit" value="" />
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
@endsection
@push('script')
<script type="text/javascript">
	$(function(){
		$(document).on('click','.view_icon', function(){
			$('.productModal').modal('show');
		});
	});
</script>
@endpush
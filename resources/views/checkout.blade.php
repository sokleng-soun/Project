@extends('layouts.default')

@section('content')

<!-- banner -->
<div class="banner banner10">
	<div class="container">
		<h2>Checkout</h2>
	</div>
</div>
<!-- //banner -->    
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
	<div class="container">
		<ul>
			<li><a href="{{ route('index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
			<li>Checkout</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs --> 
<!-- mail -->
<div class="mail">
	<div class="container">
		<h3>Checkout</h3>
		<div class="agile_mail_grids">
			<div class="col-md-8 checkout-form">
				<h4>Billing Details</h4>
				<form method="post" action="{{ route('cart.order.store') }}">
					@csrf
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="control-label">Your name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter your name" required>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label">Email address</label>
							<input type="email" name="email" class="form-control" placeholder="Enter email" required>
						</div>
						<div class="form-group col-sm-12">
							<label class="control-label">Street address</label>
							<input type="text" name="address" class="form-control" placeholder="Enter address" required>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label">Phone No.</label>
							<input type="text" name="phone" class="form-control" placeholder="Enter Phone No." required>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label">Zip code</label>
							<input type="text" name="zip_code" class="form-control" placeholder="Enter Zip code" required>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label">City</label>
							<input type="text" name="city" class="form-control" placeholder="Enter City" required>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label">Countrey</label>
							<input type="text" name="countrey" class="form-control" placeholder="Enter Countrey" required>
						</div>
						
					</div>
					@if(isset($cart_items) && count($cart_items) > 0)
					<button type="submit" class="btn btn-pink">Submit Order</button>
					@else
					<p style="color: #ff5063">Yout cart is empty! go shop add items to cart</p>
					@endif
				</form>
			</div>

			<div class="col-md-4">
				<section class="panel widget widget-order-summary">
					<h4 class="widget-title">Order Summary</h4>
					<table class="table">
						<tbody>
							<tr>
								<td>Cart Subtotal:</td>
								<td class="text-gray-dark">${{ \Cart::getTotal() }}</td>
							</tr>
							<tr>
								<td class="text-lg text-primary">Order total</td>
								<td class="text-lg text-primary">${{ \Cart::getTotal() }}</td>
							</tr>
						</tbody>
					</table>
				</section>
				<section class="widget widget-featured-products">
					<h4 class="widget-title">Items In Your Cart</h4>
					@if(isset($cart_items) && count($cart_items) > 0)
					@foreach($cart_items as $cart_item)
					<div class="entry">
						<div class="entry-thumb"><a href="javascript:void(0)">
							<img src="{{ url('backend/uploads/product_images/',$cart_item->attributes->image) }}" alt="Product"></a></div>
						<div class="entry-content">
							<h4 class="entry-title"><a href="_product_detail.html">{{ $cart_item->name }}</a></h4>
							<span class="entry-meta">{{ $cart_item->quantity.' x $'. $cart_item->price }}</span>
						</div>
					</div>
					@endforeach
					@endif

				</section>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
</div>
<!-- //mail -->
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
<!-- //newsletter -->
@endsection